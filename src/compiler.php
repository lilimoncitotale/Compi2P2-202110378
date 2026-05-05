<?php
// src/Compiler.php - Versión corregida para variables

require_once __DIR__ . '/Enviroment.php';

class Compiler extends GolampiBaseVisitor {
    private $functions = [];  // Almacenar información de funciones
    private $currentFunctionReturnLabel = null;
    private $assembly = [];
    private $dataSection = [];
    private $labelCounter = 0;
    private $currentFunction = null;
    private $stringTable = [];
    private $varOffsets = [];  // Para variables simples: nombre => offset
    private $arrayInfo = [];   // Para arrays: nombre => {offset, type, sizes, ...}
    private $nextOffset = 0;
    private $symbolTable = [];
    private $errors = [];
    private $silentMode = false;
    private $breakLabelStack = [];
    private $continueLabelStack = [];
    
    public function __construct() {
        $this->dataSection = [".section .data", ".align 4"];
        $this->dataSection[] = "newline: .string \"\\n\"";
        $this->dataSection[] = "num_buffer: .space 20";
    }
    
    private function newLabel($prefix = "L") {
        return $prefix . $this->labelCounter++;
    }
    
    private function emit($instruction) {
        if (preg_match('/^mov\s+x(\d+),\s*#(-?\d+\.\d+)$/', trim($instruction), $matches)) {
            $reg = $matches[1];
            $floatVal = (float)$matches[2];
            $intVal = (int)round($floatVal);
            $instruction = "mov x{$reg}, #{$intVal}";
        }

        if (preg_match('/^mov\s+x(\d+),\s*#(-?\d+)$/', trim($instruction), $matches)) {
            $reg = $matches[1];
            $intVal = (int)$matches[2];

            if ($intVal > 65535 || $intVal < -65535) {
                $unsignedVal = $intVal;
                if ($unsignedVal < 0) {
                    $unsignedVal = $unsignedVal + 0x10000000000000000;
                }

                $chunks = [];
                for ($shift = 0; $shift <= 48; $shift += 16) {
                    $part = ($unsignedVal >> $shift) & 0xFFFF;
                    $chunks[] = ['part' => $part, 'shift' => $shift];
                }

                $first = true;
                if (!$this->silentMode) {
                    foreach ($chunks as $chunk) {
                        if ($chunk['part'] === 0 && $first) {
                            continue;
                        }
                        if ($first) {
                            $this->assembly[] = "    movz x{$reg}, #" . $chunk['part'] . ", lsl #" . $chunk['shift'];
                            $first = false;
                        } else {
                            $this->assembly[] = "    movk x{$reg}, #" . $chunk['part'] . ", lsl #" . $chunk['shift'];
                        }
                    }

                    if ($first) {
                        $this->assembly[] = "    mov x{$reg}, #0";
                    }
                }
                return;
            }
        }

        if (!$this->silentMode) {
            $this->assembly[] = "    " . $instruction;
        }
    }
    
    private function emitLabel($label) {
        $this->assembly[] = $label . ":";
    }
    
    private function allocateVar($name, $type = null, $size = 8) {
        $this->nextOffset -= $size;
        $this->varOffsets[$name] = $this->nextOffset;
        return $this->nextOffset;
    }
    
    private function getVarOffset($name) {
        if (isset($this->arrayInfo[$name]) && isset($this->arrayInfo[$name]['offset'])) {
            return $this->arrayInfo[$name]['offset'];
        }

        if (isset($this->varOffsets[$name]) && is_array($this->varOffsets[$name]) && isset($this->varOffsets[$name]['offset'])) {
            return $this->varOffsets[$name]['offset'];
        }

        if (!isset($this->varOffsets[$name])) {
            $this->allocateVar($name, null);
        }
        return $this->varOffsets[$name];
    }
    private function getValueSilent($node) {
        $oldSilent = $this->silentMode;
        $this->silentMode = true;
        $result = $this->visit($node);
        $this->emit("// DEBUG getValueSilent: result = " . json_encode($result) . ", node text = " . $node->getText());
        $this->silentMode = $oldSilent;
        return $result;
    }
    
    public function visitProgram($ctx) {
        $this->emit("// DEBUG: visitProgram called");
        // PRIMERA PASADA: Registrar todas las funciones
        foreach ($ctx->declaration() as $decl) {
            if ($decl->functionDecl()) {
                $funcName = $decl->functionDecl()->IDENTIFIER()->getText();
                $this->functions[$funcName] = $decl->functionDecl();
                // No emitimos .globl main, lo haremos como _start
                if ($funcName !== 'main') {
                    $this->emit(".globl " . $funcName);
                }
            }
        }
        
        // Emitir _start como punto de entrada (reemplaza a main)
        $this->emit(".globl _start");
        
        // SEGUNDA PASADA: Generar código de cada función
        foreach ($ctx->declaration() as $decl) {
            $this->visit($decl);
        }
        
        return $this->getOutput();
    }
    
    public function visitFunctionDecl($ctx) {
        $funcName = $ctx->IDENTIFIER()->getText();
        
        // Si es main, la renombramos a _start
        $asmName = ($funcName === 'main') ? '_start' : $funcName;
        
        $this->currentFunction = $asmName;
        
        // Resetear offsets para nueva función
        $this->varOffsets = [];
        $this->arrayInfo = [];
        $this->nextOffset = 0;
        
        // Etiqueta de retorno
        $returnLabel = $this->newLabel($asmName . "_return");
        $this->currentFunctionReturnLabel = $returnLabel;
        
        $this->assembly[] = "";
        $this->emit(".type " . $asmName . ", @function");
        $this->emitLabel($asmName);
        
        // Prólogo
        // Reservar un frame amplio para locales/arreglos usados por el compilador
        $this->emit("stp x29, x30, [sp, #-16]!");
        $this->emit("mov x29, sp");
        $this->emit("sub sp, sp, #512");
        
        // Guardar parámetros en stack (x0-x7)
        $paramList = $ctx->parameterList();
        if ($paramList) {
            $params = $paramList->parameter();
            $paramReg = 0;
            foreach ($params as $param) {
                $paramName = $param->IDENTIFIER()->getText();
                $paramType = $param->type() ? $param->type()->getText() : null;
                $offset = $this->allocateVar($paramName);
                $this->emit("str x$paramReg, [x29, #$offset]");
                if ($paramType !== null) {
                    if (str_starts_with($paramType, '*')) {
                        $this->addSymbol($paramName, 'pointer', $this->currentFunction, $paramType, $param);
                    } elseif (str_starts_with($paramType, '[')) {
                        $this->addSymbol($paramName, 'array', $this->currentFunction, $paramType, $param);
                        if (preg_match('/^\[(\d+)\]/', $paramType, $m)) {
                            $this->arrayInfo[$paramName] = [
                                'offset' => $offset,
                                'type' => 'array',
                                'elementType' => 'int32',
                                'dimensions' => 1,
                                'sizes' => [(int)$m[1]],
                                'totalElements' => (int)$m[1]
                            ];
                        }
                    } else {
                        $this->addSymbol($paramName, $paramType, $this->currentFunction, null, $param);
                    }
                }
                $paramReg++;
            }
        }
        
        // Generar cuerpo de la función
        if ($ctx->block()) {
            $this->visit($ctx->block());
        }
        
        // Si es _start (antes main), agregar exit syscall
        if ($asmName === '_start') {
            $this->emit("// Exit syscall");
            $this->emit("mov x0, #0");
            $this->emit("mov x8, #93");
            $this->emit("svc #0");
        }
        
        // Etiqueta de retorno
        $this->emitLabel($returnLabel);
        
        // Epílogo
        $this->emit("add sp, sp, #512");
        $this->emit("ldp x29, x30, [sp], #16");
        $this->emit("ret");
        
        $this->currentFunction = null;
        $this->currentFunctionReturnLabel = null;
        return null;
    }
    
    public function visitBlock($ctx) {
        foreach ($ctx->statement() as $stmt) {
            $this->visit($stmt);
        }
        return null;
    }

   public function visitVarDecl($ctx) {
        // Obtener el nombre de la variable
        $nameNode = $ctx->IDENTIFIER();
        if (!$nameNode) {
            return null;
        }
        
        if (is_array($nameNode)) {
            $nameNode = $nameNode[0];
        }
        
        $name = $nameNode->getText();
        $fullText = $ctx->getText();
        
        // DETECTAR ARRAY MULTIDIMENSIONAL USANDO REGEX
        // Buscar patrón: var nombre [tamaño][tamaño]... tipo (solo la parte de declaración, antes del =)
        if (preg_match('/^(?:var)?' . preg_quote($name, '/') . '((?:\[\d+\])+)([a-zA-Z0-9_]+)/', $fullText, $matches)) {
            // Extraer todas las dimensiones de la parte de declaración
            $brackets = $matches[1]; // ej: "[2][3]"
            preg_match_all('/\[(\d+)\]/', $brackets, $sizeMatches);
            $sizes = array_map('intval', $sizeMatches[1]);
            $elementType = $matches[2];
            
            $this->emit("// INFO: Array multidimensional detectado: $name " . json_encode($sizes) . " $elementType");
            
            // Calcular tamaño total
            $totalElements = array_product($sizes);
            $totalSize = $totalElements * 8;
            $this->nextOffset -= $totalSize;
            $offset = $this->nextOffset;
            
            // Guardar metadatos
            $this->arrayInfo[$name] = [
                'offset' => $offset,
                'type' => 'array',
                'elementType' => $elementType,
                'dimensions' => count($sizes),
                'sizes' => $sizes,
                'totalElements' => $totalElements
            ];

            $this->emit("// Array '$name' en offset $offset, dimensiones: " . json_encode($sizes));

            // ============================================
            // INICIALIZACIÓN DE ARRAY (extrae literal entre llaves)
            // ============================================
            $eqPos = strpos($fullText, '=');
            if ($eqPos !== false) {
                $rhs = substr($fullText, $eqPos + 1);
                $braceStart = strpos($rhs, '{');

                if ($braceStart !== false) {
                    $depth = 0;
                    $literalText = '';
                    $started = false;
                    $rhsLen = strlen($rhs);

                    for ($i = $braceStart; $i < $rhsLen; $i++) {
                        $ch = $rhs[$i];
                        if ($ch === '{') {
                            $depth++;
                            $started = true;
                        }

                        if ($started) {
                            $literalText .= $ch;
                        }

                        if ($ch === '}') {
                            $depth--;
                            if ($depth === 0) {
                                break;
                            }
                        }
                    }

                    if ($literalText !== '') {
                        preg_match_all('/-?\d+/', $literalText, $numberMatches);
                        $flatValues = array_map('intval', $numberMatches[0]);

                        $elemSize = 8;
                        $limit = min(count($flatValues), $totalElements);

                        for ($index = 0; $index < $limit; $index++) {
                            $val = $flatValues[$index];
                            $elemOffset = $offset + ($index * $elemSize);
                            $this->emit("mov x0, #$val");
                            $this->emit("str x0, [x29, #$elemOffset]");
                        }
                    }
                }
            }
            
            $this->addSymbol($name, 'array', $this->currentFunction, json_encode($sizes), $ctx);
            return null;
        }
        
        // Si no es array, procesar como variable(s) normal(es)
        $idNodes = $ctx->IDENTIFIER();
        if (!is_array($idNodes)) {
            $idNodes = $idNodes ? [$idNodes] : [];
        }

        $exprNodes = $ctx->expression();
        if (!is_array($exprNodes)) {
            $exprNodes = $exprNodes ? [$exprNodes] : [];
        }

        // Obtener el tipo declarado si existe
        $typeNode = $ctx->type();
        $declaredType = null;
        if ($typeNode) {
            if (is_array($typeNode)) {
                $declaredType = isset($typeNode[0]) ? $this->resolveDeclaredType($typeNode[0]->getText()) : null;
            } else {
                $declaredType = $this->resolveDeclaredType($typeNode->getText());
            }
        }

        foreach ($idNodes as $idx => $idNode) {
            $varName = $idNode->getText();
            $offset = $this->allocateVar($varName);

            // Si hay un tipo declarado que sea puntero (ej: *int32), registrar símbolo vacío
            if ($declaredType !== null && str_starts_with($declaredType, '*')) {
                $this->addSymbol($varName, 'pointer', $this->currentFunction, $declaredType, $ctx);
            }
            
            if (isset($exprNodes[$idx])) {
                $exprNode = $exprNodes[$idx];
                $exprText = trim($exprNode->getText());
                $value = $this->visit($exprNode);

                if ($declaredType !== null && str_starts_with($declaredType, '*')) {
                    if ($value === null || $value === 'nil' || $value === 0 || $value === '0') {
                        $this->emit("mov x0, #0");
                        $this->emitStoreToStack('x0', $offset);
                        $this->addSymbol($varName, 'pointer', $this->currentFunction, 'nil', $ctx);
                    } elseif (is_numeric($value)) {
                        $this->emit("mov x0, #$value");
                        $this->emitStoreToStack('x0', $offset);
                        $this->addSymbol($varName, 'pointer', $this->currentFunction, $value, $ctx);
                    } elseif (is_string($value) && strpos($value, 'x0_value') === 0) {
                        $this->emitStoreToStack('x0', $offset);
                        $this->addSymbol($varName, 'pointer', $this->currentFunction, 'x0_value', $ctx);
                    } elseif (is_string($value) && strpos($value, 'var_') === 0) {
                        $srcName = substr($value, 4);
                        $srcOffset = $this->getVarOffset($srcName);
                        $this->emitLoadFromStack('x0', $srcOffset);
                        $this->emitStoreToStack('x0', $offset);
                        $this->addSymbol($varName, 'pointer', $this->currentFunction, $srcName, $ctx);
                    } else {
                        $this->emit("mov x0, #0");
                        $this->emitStoreToStack('x0', $offset);
                        $this->addSymbol($varName, 'pointer', $this->currentFunction, 'nil', $ctx);
                    }
                    continue;
                }
                
                // Si el tipo declarado es float32
                if ($declaredType === 'float32') {
                    $floatVal = is_numeric($value) ? (float)$value : 0.0;
                    // Convertir float a representación entera (bits)
                    $bits = unpack('q', pack('d', $floatVal))[1];
                    $this->emit("mov x0, #$bits");
                    $this->emitStoreToStack('x0', $offset);
                    $this->addSymbol($varName, 'float32', $this->currentFunction, $floatVal, $ctx);
                }
                // Si el tipo declarado es rune
                else if ($declaredType === 'rune') {
                    if (preg_match('/^\'.*\'$/s', $exprText)) {
                        $inner = trim($exprText, "'");
                        $inner = stripcslashes($inner);
                        $runeVal = ($inner !== '') ? ord($inner[0]) : 0;
                        $this->emit("mov x0, #$runeVal");
                        $this->emitStoreToStack('x0', $offset);
                        $this->addSymbol($varName, 'rune', $this->currentFunction, $runeVal, $ctx);
                    } elseif (is_numeric($value)) {
                        $runeVal = (int)$value;
                        $this->emit("mov x0, #$runeVal");
                        $this->emitStoreToStack('x0', $offset);
                        $this->addSymbol($varName, 'rune', $this->currentFunction, $runeVal, $ctx);
                    } elseif (is_string($value) && strlen($value) === 1) {
                        $runeVal = ord($value);
                        $this->emit("mov x0, #$runeVal");
                        $this->emitStoreToStack('x0', $offset);
                        $this->addSymbol($varName, 'rune', $this->currentFunction, $runeVal, $ctx);
                    } else {
                        $this->addError("Valor inválido para rune en '$varName'", $ctx);
                    }
                }
                // Si el valor es float (detectado automáticamente)
                else if (is_float($value)) {
                    $bits = unpack('q', pack('d', $value))[1];
                    $this->emit("mov x0, #$bits");
                    $this->emitStoreToStack('x0', $offset);
                    $this->addSymbol($varName, 'float32', $this->currentFunction, $value, $ctx);
                }
                // Si es numérico entero
                else if (is_numeric($value)) {
                    $this->emit("mov x0, #$value");
                    $this->emitStoreToStack('x0', $offset);
                    $this->addSymbol($varName, 'int32', $this->currentFunction, $value, $ctx);
                }
                else if (is_string($value) && strpos($value, 'var_') === 0) {
                    $srcName = substr($value, 4);
                    $srcOffset = $this->getVarOffset($srcName);
                    $this->emitLoadFromStack('x0', $srcOffset);
                    $this->emitStoreToStack('x0', $offset);
                    $this->addSymbol($varName, 'int32', $this->currentFunction, $srcName, $ctx);
                }
                else if (is_string($value) && strpos($value, 'str_') === 0) {
                    $this->addSymbol($varName, 'string', $this->currentFunction, $value, $ctx);
                }
                else if ($declaredType !== null && str_starts_with($declaredType, '*')) {
                    // Ya fue registrado como puntero; si hay inicializador, almacenar el valor
                    $this->addSymbol($varName, 'pointer', $this->currentFunction, $value, $ctx);
                }
                else if (is_bool($value)) {
                    $numValue = $this->normalizeBoolValue($value);
                    $this->emit("mov x0, #$numValue");
                    $this->emitStoreToStack('x0', $offset);
                    $this->addSymbol($varName, 'bool', $this->currentFunction, $numValue, $ctx);
                }
                else if (is_string($value) && strpos($value, 'x0_value') === 0) {
                    $this->emitStoreToStack('x0', $offset);
                    $detectedType = 'int32';
                    if (strpos($value, 'float32') !== false || strpos($value, 'float') !== false) {
                        $detectedType = 'float32';
                    }
                    $this->addSymbol($varName, $detectedType, $this->currentFunction, 'result', $ctx);
                }
            } else {
                // Inicialización por defecto según tipo declarado
                $defaultType = $declaredType ?? 'int32';
                if ($defaultType === 'string') {
                    $this->addSymbol($varName, 'string', $this->currentFunction, $this->addString(''), $ctx);
                } elseif ($defaultType === 'bool') {
                    $this->emit("mov x0, #0");
                    $this->emitStoreToStack('x0', $offset);
                    $this->addSymbol($varName, 'bool', $this->currentFunction, 0, $ctx);
                } elseif ($defaultType === 'float32') {
                    $this->emit("mov x0, #0");
                    $this->emitStoreToStack('x0', $offset);
                    $this->addSymbol($varName, 'float32', $this->currentFunction, 0.0, $ctx);
                } elseif ($defaultType === 'rune') {
                    $this->emit("mov x0, #0");
                    $this->emitStoreToStack('x0', $offset);
                    $this->addSymbol($varName, 'rune', $this->currentFunction, 0, $ctx);
                } elseif (str_starts_with($defaultType, '*')) {
                    $this->emit("mov x0, #0");
                    $this->emitStoreToStack('x0', $offset);
                    $this->addSymbol($varName, 'pointer', $this->currentFunction, 'nil', $ctx);
                } else {
                    $this->emit("mov x0, #0");
                    $this->emitStoreToStack('x0', $offset);
                    $this->addSymbol($varName, 'int32', $this->currentFunction, 0, $ctx);
                }
            }
        }
        
        return null;
    }

    public function visitConstDecl($ctx) {
        $name = $ctx->IDENTIFIER()->getText();
        $typeNode = $ctx->type();
        $exprNode = $ctx->expression();
        $exprText = $exprNode ? trim($exprNode->getText()) : '';
        $value = null;

        if ($exprNode) {
            if (preg_match('/^".*"$/s', $exprText)) {
                $value = stripcslashes(trim($exprText, '"'));
            } elseif (preg_match('/^\'.*\'$/s', $exprText)) {
                $inner = trim($exprText, "'");
                $value = stripcslashes($inner);
                if (strlen($value) === 1) {
                    $value = ord($value);
                }
            } elseif ($exprText === 'true') {
                $value = true;
            } elseif ($exprText === 'false') {
                $value = false;
            } elseif (is_numeric($exprText)) {
                $value = strpos($exprText, '.') !== false ? (float)$exprText : (int)$exprText;
            } else {
                $value = $this->getValueWithoutEmit($exprNode);
            }
        }

        $constType = $typeNode ? $this->resolveDeclaredType($typeNode->getText()) : $this->inferTypeFromValue($value);
        
        if ($value === null) {
            $this->addError("Constante '$name' debe tener un valor", $ctx);
            return null;
        }

        // Guardar constantes como símbolos; solo reservar stack cuando sea un valor numérico/booleano/rune
        if ($constType === 'string') {
            if (is_string($value) && strpos($value, 'str_') !== 0) {
                $value = $this->addString($value);
            }
            $this->addSymbol($name, $constType, $this->currentFunction, $value, $ctx);
            return null;
        }

        $offset = $this->allocateVar($name);
        if ($constType === 'bool') {
            $numValue = $this->normalizeBoolValue($value);
            $this->emit("mov x0, #$numValue");
            $this->emitStoreToStack('x0', $offset);
            $this->addSymbol($name, $constType, $this->currentFunction, $numValue, $ctx);
            return null;
        }

        if (is_numeric($value)) {
            $this->emit("mov x0, #$value");
            $this->emitStoreToStack('x0', $offset);
            $this->addSymbol($name, $constType, $this->currentFunction, $value, $ctx);
        } elseif (is_string($value) && strlen($value) === 1) {
            $numValue = ord($value);
            $this->emit("mov x0, #$numValue");
            $this->emitStoreToStack('x0', $offset);
            $this->addSymbol($name, $constType, $this->currentFunction, $numValue, $ctx);
        } else {
            $this->addSymbol($name, $constType, $this->currentFunction, $value, $ctx);
        }
        
        return null;
    }
    public function visitShortVarDecl($ctx) {
        $idNodes = $ctx->IDENTIFIER();
        $names = is_array($idNodes) ? $idNodes : [$idNodes];

        // Compatibilidad con gramática nueva (shortValue) y anterior (expression)
        $shortValueNodes = [];
        $valueNodes = [];
        if (method_exists($ctx, 'shortValue')) {
            $shortValueNodes = $ctx->shortValue();
            if (!is_array($shortValueNodes)) {
                $shortValueNodes = $shortValueNodes ? [$shortValueNodes] : [];
            }
            foreach ($shortValueNodes as $shortValueNode) {
                if ($shortValueNode === null) {
                    continue;
                }
                if (method_exists($shortValueNode, 'expression') && $shortValueNode->expression() !== null) {
                    $valueNodes[] = $shortValueNode->expression();
                } else {
                    // Fallback: visitar el nodo completo (ej. arrayType+arrayLiteral)
                    $valueNodes[] = $shortValueNode;
                }
            }
        } else {
            $exprNodes = $ctx->expression();
            $valueNodes = is_array($exprNodes) ? $exprNodes : [$exprNodes];
        }

        foreach ($names as $idx => $idNode) {
            $name = $idNode->getText();

            if (isset($shortValueNodes[$idx])
                && $shortValueNodes[$idx] !== null
                && method_exists($shortValueNodes[$idx], 'arrayType')
                && $shortValueNodes[$idx]->arrayType() !== null) {
                $this->declareShortArray($name, $shortValueNodes[$idx], $ctx);
                continue;
            }

            $offset = $this->allocateVar($name);
            $staticValue = isset($valueNodes[$idx]) ? $this->getValueWithoutEmit($valueNodes[$idx]) : null;

            if (isset($valueNodes[$idx])) {
                $exprText = $valueNodes[$idx]->getText();
                
                // Caso 1: Variable simple (puede ser puntero)
                if (preg_match('/^([a-zA-Z_][a-zA-Z0-9_]*)\s*$/', $exprText, $m)) {
                    $srcName = $m[1];
                    $srcSymbol = $this->findSymbol($srcName);
                    
                    // Si la variable es un puntero, derreferenciar automaticamente
                    if ($srcSymbol && isset($srcSymbol['value']) && is_string($srcSymbol['value']) && strpos($srcSymbol['value'], '*') === 0) {
                        $srcOffset = $this->getVarOffset($srcName);
                        // Cargar el puntero
                        $this->emitLoadFromStack('x0', $srcOffset);
                        // Derreferenciar
                        $this->emit("ldr x0, [x0]");
                        // Guardar el valor derreferenciado
                        $this->emitStoreToStack('x0', $offset);
                        $this->addSymbol($name, 'int32', $this->currentFunction, 'deref', $ctx);
                        continue;
                    }
                }
                
                // Caso 2: Dereference explícito: *variable
                if (preg_match('/^\*([a-zA-Z_][a-zA-Z0-9_]*)\s*$/', $exprText, $m)) {
                    $ptrName = $m[1];
                    $ptrOffset = $this->getVarOffset($ptrName);
                    
                    // Cargar el puntero
                    $this->emitLoadFromStack('x0', $ptrOffset);
                    // Desreferenciar
                    $this->emit("ldr x0, [x0]");
                    // Guardar el valor
                    $this->emitStoreToStack('x0', $offset);
                    $this->addSymbol($name, 'int32', $this->currentFunction, 'deref', $ctx);
                    continue;
                }
                
                $value = $this->visit($valueNodes[$idx]);
                $this->emit("// DEBUG: value type = " . gettype($value) . ", value = " . json_encode($value));

                if (is_float($value)) {
                    $bits = unpack('q', pack('d', $value))[1];
                    $this->emit("mov x0, #$bits");
                    $this->emitStoreToStack('x0', $offset);
                    $symbolValue = is_numeric($staticValue) ? $staticValue : $value;
                    $this->addSymbol($name, 'float32', $this->currentFunction, $symbolValue, $ctx);
                }
                elseif (is_numeric($value)) {
                    $this->emit("mov x0, #$value");
                    $this->emitStoreToStack('x0', $offset);
                    $symbolValue = is_numeric($staticValue) ? $staticValue : $value;
                    $this->addSymbol($name, 'int32', $this->currentFunction, $symbolValue, $ctx);
                }
                else if (is_string($value) && (strpos($value, 'var_') === 0 || strpos($value, 'var___temp_sum_') === 0)) {
                    $srcName = $value;
                    if (strpos($srcName, 'var_') === 0) {
                        $srcName = substr($srcName, 4);
                    }
                    $srcOffset = $this->getVarOffset($srcName);
                    $this->emit("// Asignación: $name = $srcName");
                    $this->emitLoadFromStack('x0', $srcOffset);
                    $this->emitStoreToStack('x0', $offset);
                    $symbolValue = is_numeric($staticValue) ? $staticValue : $srcName;
                    $this->addSymbol($name, 'int32', $this->currentFunction, $symbolValue, $ctx);
                }
                else if (is_string($value) && strpos($value, 'str_') === 0) {
                    $this->addSymbol($name, 'string', $this->currentFunction, $value, $ctx);
                }
                else if (is_bool($value)) {
                    $numValue = $this->normalizeBoolValue($value);
                    $this->emit("mov x0, #$numValue");
                    $this->emitStoreToStack('x0', $offset);
                    $symbolValue = is_numeric($staticValue) ? $staticValue : $numValue;
                    $this->addSymbol($name, 'bool', $this->currentFunction, $symbolValue, $ctx);
                }
                else if (is_string($value) && strpos($value, 'x0_value') === 0) {
                    $this->emitStoreToStack('x0', $offset);
                    $detectedType = 'int32';
                    $exprText = isset($valueNodes[$idx]) ? $valueNodes[$idx]->getText() : '';
                    if (preg_match('/(==|!=|<=|>=|&&|\|\||<|>|!)/', $exprText) === 1) {
                        $detectedType = 'bool';
                    }
                    if (strpos($value, 'float32') !== false || strpos($value, 'float') !== false) {
                        $detectedType = 'float32';
                    }
                    $symbolValue = is_numeric($staticValue) ? $staticValue : 'result';
                    $this->addSymbol($name, $detectedType, $this->currentFunction, $symbolValue, $ctx);
                }
            }
        }
        return null;
    }

    private function declareShortArray($name, $shortValueNode, $ctx) {
        $arrayTypeCtx = $shortValueNode->arrayType();
        $arrayLiteralCtx = method_exists($shortValueNode, 'arrayLiteral') ? $shortValueNode->arrayLiteral() : null;

        if (!$arrayTypeCtx) {
            $this->addError("Error: No se pudo obtener arrayType en short declaration", $ctx);
            return;
        }

        $sizes = [];
        $elementType = 'int32';
        $current = $arrayTypeCtx;

        while ($current instanceof Context\ArrayTypeContext) {
            $sizeExpr = $current->expression();
            if (is_array($sizeExpr)) {
                $sizeExpr = $sizeExpr[0] ?? null;
            }

            if (!$sizeExpr) {
                $this->addError("Falta tamaño en declaración de array", $ctx);
                return;
            }

            $size = $this->getValueWithoutEmit($sizeExpr);
            if (!is_numeric($size)) {
                $this->addError("El tamaño del array debe ser numérico, obtenido: " . json_encode($size), $ctx);
                return;
            }
            $sizes[] = (int)$size;

            $next = null;
            for ($i = 0; $i < $current->getChildCount(); $i++) {
                $child = $current->getChild($i);
                if ($child instanceof Context\ArrayTypeContext) {
                    $next = $child;
                }
                if ($child instanceof Context\TypeContext) {
                    $elementType = $this->visit($child);
                }
            }

            $current = $next;
        }

        $totalElements = array_product($sizes);
        $totalSize = $totalElements * 8;
        $this->nextOffset -= $totalSize;
        $offset = $this->nextOffset;

        $this->arrayInfo[$name] = [
            'offset' => $offset,
            'type' => 'array',
            'elementType' => $elementType,
            'dimensions' => count($sizes),
            'sizes' => $sizes,
            'totalElements' => $totalElements
        ];

        if ($arrayLiteralCtx) {
            $elements = [];
            for ($i = 0; $i < $arrayLiteralCtx->getChildCount(); $i++) {
                $child = $arrayLiteralCtx->getChild($i);
                if ($child instanceof Context\ArrayElementContext ||
                    $child instanceof Context\ArrayLiteralContext) {
                    $elements[] = $child;
                }
            }
            $this->initArrayRecursive($elements, 0, $sizes, $offset, $elementType);
        }

        $this->addSymbol($name, 'array', $this->currentFunction, json_encode($sizes), $ctx);
    }

    public function visitAssignment($ctx) {
        $name = null;
        $valueExpr = null;

        // Manejar incremento/decremento como sentencia: i++ / i--
        if (($ctx->PLUSPLUS() !== null || $ctx->MINUSMINUS() !== null) && $ctx->primary() !== null) {
            $primaryText = $ctx->primary()->getText();
            if (preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $primaryText)) {
                $offset = $this->getVarOffset($primaryText);
                $this->emitLoadFromStack('x0', $offset);
                if ($ctx->PLUSPLUS() !== null) {
                    $this->emit("add x0, x0, #1");
                } else {
                    $this->emit("sub x0, x0, #1");
                }
                $this->emitStoreToStack('x0', $offset);
            }
            return null;
        }
        
        // Buscar operador de asignación (simple o compuesto)
        $opIndex = -1;
        $operator = null;
        $compoundOp = null;
        
        for ($i = 0; $i < $ctx->getChildCount(); $i++) {
            $childText = $ctx->getChild($i)->getText();
            if ($childText === '=' || $childText === '+=' || $childText === '-=' || 
                $childText === '*=' || $childText === '/=' || $childText === '%=') {
                $opIndex = $i;
                $operator = $childText;
                if ($childText !== '=') {
                    $compoundOp = $childText;
                }
                break;
            }
        }
        
        if ($opIndex === -1) {
            // No hay asignación
            return null;
        }
        
        // Analizar el objetivo (lo que está antes del operador)
        $targetText = '';
        for ($i = 0; $i < $opIndex; $i++) {
            $targetText .= $ctx->getChild($i)->getText();
        }
        $targetText = trim($targetText);
        
        // Obtener el valor (lo que está después del operador)
        $valueNode = null;
        if ($opIndex + 1 < $ctx->getChildCount()) {
            $valueNode = $ctx->getChild($opIndex + 1);
        }
        
        if ($valueNode === null) {
            return null;
        }
        
        $valueExpr = $this->visit($valueNode);
        
        // Si es una asignación compuesta, expandir a forma binaria
        if ($compoundOp !== null) {
            // contador -= 3  se convierte en  contador = contador - 3
            $binaryOp = substr($compoundOp, 0, -1); // Quita el '=' al final: -= → -
            $varExpr = 'var_' . $targetText; // Referencia a la variable
            
            // Crear una pseudo-expresión binaria para procesarla
            $targetIsSimpleVar = preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $targetText);
            if (!$targetIsSimpleVar) {
                // No soportamos asignaciones compuestas en arrays o punteros aún
                return null;
            }
            
            // Cargar variable actual
            $offset = $this->getVarOffset($targetText);
            $this->emitLoadFromStack('x0', $offset);
            
            // Operación binaria basada en el operador
            if ($binaryOp === '+') {
                if (is_numeric($valueExpr)) {
                    $this->emit("add x0, x0, #$valueExpr");
                } else {
                    // Cargar el otro operando en x1
                    if (is_string($valueExpr) && strpos($valueExpr, 'var_') === 0) {
                        $varName = substr($valueExpr, 4);
                        $varOffset = $this->getVarOffset($varName);
                        $this->emitLoadFromStack('x1', $varOffset);
                        $this->emit("add x0, x0, x1");
                    }
                }
            } elseif ($binaryOp === '-') {
                if (is_numeric($valueExpr)) {
                    $this->emit("sub x0, x0, #$valueExpr");
                } else {
                    // Cargar el otro operando en x1
                    if (is_string($valueExpr) && strpos($valueExpr, 'var_') === 0) {
                        $varName = substr($valueExpr, 4);
                        $varOffset = $this->getVarOffset($varName);
                        $this->emitLoadFromStack('x1', $varOffset);
                        $this->emit("sub x0, x0, x1");
                    }
                }
            } elseif ($binaryOp === '*') {
                if (is_numeric($valueExpr)) {
                    $this->emit("mov x1, #$valueExpr");
                    $this->emit("mul x0, x0, x1");
                } else {
                    // Cargar el otro operando en x1
                    if (is_string($valueExpr) && strpos($valueExpr, 'var_') === 0) {
                        $varName = substr($valueExpr, 4);
                        $varOffset = $this->getVarOffset($varName);
                        $this->emitLoadFromStack('x1', $varOffset);
                        $this->emit("mul x0, x0, x1");
                    }
                }
            } elseif ($binaryOp === '/') {
                if (is_numeric($valueExpr)) {
                    $this->emit("mov x1, #$valueExpr");
                    $this->emit("udiv x0, x0, x1");
                } else {
                    // Cargar el otro operando en x1
                    if (is_string($valueExpr) && strpos($valueExpr, 'var_') === 0) {
                        $varName = substr($valueExpr, 4);
                        $varOffset = $this->getVarOffset($varName);
                        $this->emitLoadFromStack('x1', $varOffset);
                        $this->emit("udiv x0, x0, x1");
                    }
                }
            } elseif ($binaryOp === '%') {
                if (is_numeric($valueExpr)) {
                    $this->emit("mov x1, #$valueExpr");
                    $this->emit("udiv x2, x0, x1");
                    $this->emit("msub x0, x2, x1, x0");
                } else {
                    // Cargar el otro operando en x1
                    if (is_string($valueExpr) && strpos($valueExpr, 'var_') === 0) {
                        $varName = substr($valueExpr, 4);
                        $varOffset = $this->getVarOffset($varName);
                        $this->emitLoadFromStack('x1', $varOffset);
                        $this->emit("udiv x2, x0, x1");
                        $this->emit("msub x0, x2, x1, x0");
                    }
                }
            }
            
            // Guardar resultado
            $this->emitStoreToStack('x0', $offset);
            return null;
        }
        
        // ============================================
        // CASO 1: Asignación a través de puntero: *p = value
        // ============================================
        if (preg_match('/^\*([a-zA-Z_][a-zA-Z0-9_]*)\s*$/', $targetText, $m)) {
            $ptrName = $m[1];
            $ptrOffset = $this->getVarOffset($ptrName);
            
            // Cargar el puntero en x1
            $this->emitLoadFromStack('x1', $ptrOffset);
            
            // Preparar valor en x0
            if (is_numeric($valueExpr)) {
                $this->emit("mov x0, #$valueExpr");
            } elseif (is_string($valueExpr) && strpos($valueExpr, 'var_') === 0) {
                $varName = substr($valueExpr, 4);
                $varOffset = $this->getVarOffset($varName);
                $this->emitLoadFromStack('x0', $varOffset);
            } elseif (is_string($valueExpr) && strpos($valueExpr, 'x0_value') === 0) {
                // valor ya en x0
            } else {
                // El valor ya debería estar en x0 por el visit()
            }
            
            // Almacenar el valor en la dirección apuntada por x1
            $this->emit("str x0, [x1]");
            return null;
        }
        
        // ============================================
        // CASO 2: Asignación a arreglo: arr[i] = value
        // ============================================
        if (preg_match('/^([a-zA-Z_][a-zA-Z0-9_]*)\[/', $targetText, $m)) {
            $arrayName = $m[1];
            $indexTexts = [];
            
            // Extraer índices como texto (pueden ser números o variables)
            if (preg_match_all('/\[([^\]]+)\]/', $targetText, $indexMatches)) {
                $indexTexts = $indexMatches[1];
            }
            
            // Convertir textos a valores numéricos o nombres de variables
            $indices = [];
            foreach ($indexTexts as $idxText) {
                $idxText = trim($idxText);
                if (is_numeric($idxText)) {
                    $indices[] = (int)$idxText;
                } else {
                    // Es una expresión, guardarla como string para procesarla luego
                    $indices[] = $idxText;
                }
            }
            
            return $this->visitArrayAssignment($arrayName, $indices, $valueExpr, $ctx);
        }
        // CASO: Asignación entre variables puntero (p = q)
        // Solo aplica si alguna de las dos variables es realmente un puntero.
        // Evita interpretar asignaciones normales como min = j como si fueran
        // desreferencias, lo que puede causar segmentation fault.
        if (preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*\s*$/', $targetText) && 
            preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*\s*$/', $valueNode->getText())) {
            $destName = trim($targetText);
            $srcName = trim($valueNode->getText());

            $destSymbol = $this->findSymbol($destName);
            $srcSymbol = $this->findSymbol($srcName);
            $destIsPointer = $destSymbol && (($destSymbol['type'] ?? null) === 'pointer');
            $srcIsPointer = $srcSymbol && (($srcSymbol['type'] ?? null) === 'pointer');

            if ($destIsPointer || $srcIsPointer) {
                $destOffset = $this->getVarOffset($destName);
                $srcOffset = $this->getVarOffset($srcName);

                // Copiar el valor del puntero, NO desreferenciarlo.
                $this->emitLoadFromStack('x0', $srcOffset);
                $this->emitStoreToStack('x0', $destOffset);

                $this->addSymbol($destName, 'pointer', $this->currentFunction, $srcName, $ctx);
                return null;
            }
        }
        
        // ============================================
        // CASO 3: Asignación a variable simple: x = value
        // ============================================
        if (preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*\s*$/', $targetText)) {
            $name = trim($targetText);
            
            // Verificar si es constante
            if (isset($this->varOffsets[$name]) && is_string($this->varOffsets[$name])) {
                $this->addError("No se puede asignar a la constante '$name'", $ctx);
                return null;
            }
            
            $offset = $this->getVarOffset($name);
            $assignedType = 'int32';
            $assignedValue = $valueExpr;  
            $targetSymbol = $this->findSymbol($name);
            if ($targetSymbol && isset($targetSymbol['type'])) {
                $assignedType = $targetSymbol['type'];
            }

            // Si el valor es numérico
            if (is_numeric($valueExpr)) {
                $this->emit("mov x0, #$valueExpr");
                $this->emitStoreToStack('x0', $offset);
                if ($assignedType === 'bool') {
                    $assignedValue = ((int)$valueExpr) !== 0 ? 1 : 0;
                }
            }
            // Si el valor es bool
            else if (is_bool($valueExpr)) {
                $numValue = $this->normalizeBoolValue($valueExpr);
                $this->emit("mov x0, #$numValue");
                $this->emitStoreToStack('x0', $offset);
                $assignedType = 'bool';
                $assignedValue = $numValue;
            }
            // Si el valor es string literal ya etiquetado
            else if (is_string($valueExpr) && strpos($valueExpr, 'str_') === 0) {
                $assignedType = 'string';
                $assignedValue = $valueExpr;
            }
            // Si el valor es una variable (viene como 'var_nombre')
            else if (is_string($valueExpr) && strpos($valueExpr, 'var_') === 0) {
                $varName = substr($valueExpr, 4);
                $sourceSymbol = $this->findSymbol($varName);
                if ($sourceSymbol && ($sourceSymbol['type'] ?? null) === 'string') {
                    $assignedType = 'string';
                    $assignedValue = $sourceSymbol['value'] ?? null;
                } elseif ($sourceSymbol && ($sourceSymbol['type'] ?? null) === 'bool') {
                    $varOffset = $this->getVarOffset($varName);
                    $this->emitLoadFromStack('x0', $varOffset);
                    $this->emitStoreToStack('x0', $offset);
                    $assignedType = 'bool';
                    $assignedValue = $sourceSymbol['value'] ?? 0;
                } else {
                    $varOffset = $this->getVarOffset($varName);
                    $this->emitLoadFromStack('x0', $varOffset);
                    $this->emitStoreToStack('x0', $offset);
                    if ($sourceSymbol && isset($sourceSymbol['type'])) {
                        $assignedType = $sourceSymbol['type'];
                    }
                    if ($sourceSymbol && array_key_exists('value', $sourceSymbol)) {
                        $assignedValue = $sourceSymbol['value'];
                    }
                }
            }

            // Si el valor es x0_value (viene de función)
            else if (is_string($valueExpr) && strpos($valueExpr, 'x0_value') === 0) {
                $this->emitStoreToStack('x0', $offset);
                if (strpos($valueExpr, 'float') !== false) {
                    $assignedType = 'float32';
                }
                $assignedValue = 'result';
            }
            
            $this->addSymbol($name, $assignedType, $this->currentFunction, $assignedValue, $ctx);
        }
        
        return null;
    }
    public function visitIfStmt($ctx) {
        $elseLabel = $this->newLabel("else");
        $endLabel = $this->newLabel("endif");
        
        // Evaluar la condición
        $cond = $this->visit($ctx->expression());
        
        // Cargar el valor de la condición en x0
        if (is_numeric($cond)) {
            $this->emit("mov x0, #$cond");
        } elseif (is_string($cond) && strpos($cond, 'var_') === 0) {
            $varName = substr($cond, 4);
            $offset = $this->getVarOffset($varName);
            $this->emit("ldr x0, [x29, #$offset]");
        }
        
        // Comparar con 0 (false)
        $this->emit("cmp x0, #0");
        $this->emit("b.eq $elseLabel");
        
        // Bloque then
        if ($ctx->block(0)) {
            $this->visit($ctx->block(0));
        }
        $this->emit("b $endLabel");
        
        // Bloque else
        $this->emitLabel($elseLabel);
        if ($ctx->block(1)) {
            $this->visit($ctx->block(1));
        }
        
        $this->emitLabel($endLabel);
        
        return null;
    }
    public function visitForStmt($ctx) {
        $startLabel = $this->newLabel("for_start");
        $continueLabel = $this->newLabel("for_continue");
        $endLabel = $this->newLabel("for_end");

        $condNode = null;
        $postNode = null;
        $semicolonCount = 0;

        // For clásico: for init; cond; post { ... }
        if ($ctx->shortVarDecl()) {
            $this->visit($ctx->shortVarDecl());
            for ($i = 0; $i < $ctx->getChildCount(); $i++) {
                $child = $ctx->getChild($i);
                if ($child->getText() === ';') {
                    $semicolonCount++;
                    if ($semicolonCount === 1 && $i + 1 < $ctx->getChildCount()) {
                        $condNode = $ctx->getChild($i + 1);
                    }
                    if ($semicolonCount === 2 && $i + 1 < $ctx->getChildCount()) {
                        $postNode = $ctx->getChild($i + 1);
                    }
                }
            }
        } else {
            // For condicional: for cond { ... }
            $exprs = $ctx->expression();
            if (!is_array($exprs)) {
                $exprs = $exprs ? [$exprs] : [];
            }
            if (count($exprs) > 0) {
                $condNode = $exprs[0];
            }
            // For infinito: for { ... } -> sin condición
        }

        $this->breakLabelStack[] = $endLabel;
        $this->continueLabelStack[] = $continueLabel;

        $this->emitLabel($startLabel);

        if ($condNode) {
            $this->visit($condNode);
            $this->emit("cmp x0, #0");
            $this->emit("b.eq $endLabel");
        }

        if ($ctx->block()) {
            $this->visit($ctx->block());
        }

        $this->emitLabel($continueLabel);
        if ($postNode) {
            $this->visitPostStmt($postNode);
        }
        $this->emit("b $startLabel");

        array_pop($this->continueLabelStack);
        array_pop($this->breakLabelStack);
        $this->emitLabel($endLabel);

        return null;
    }

    public function visitSwitchStmt($ctx) {
        $endLabel = $this->newLabel("switch_end");
        $defaultLabel = null;
        $switchExpr = $ctx->expression();

        // Evaluar expresión del switch en x0 y preservarla en x9
        if ($switchExpr) {
            $switchValue = $this->visit($switchExpr);
            $this->emitValueToRegister($switchValue, 'x0');
        } else {
            // switch sin expresión: tratarlo como switch true
            $this->emit("mov x0, #1");
        }
        $this->emit("mov x9, x0");

        $cases = $ctx->switchCase();
        if (!is_array($cases)) {
            $cases = $cases ? [$cases] : [];
        }

        // Precompilar comparaciones de casos
        $caseLabels = [];
        foreach ($cases as $idx => $caseCtx) {
            $caseLabel = $this->newLabel("switch_case");
            $caseLabels[] = $caseLabel;

            $caseExprs = $caseCtx->expression();
            if (!is_array($caseExprs)) {
                $caseExprs = $caseExprs ? [$caseExprs] : [];
            }

            foreach ($caseExprs as $caseExpr) {
                if ($caseExpr === null) continue;
                $caseValue = $this->visit($caseExpr);
                $this->emitValueToRegister($caseValue, 'x0');
                $this->emit("cmp x9, x0");
                $this->emit("b.eq $caseLabel");
            }
        }

        // Buscar default en los hijos del switch
        for ($i = 0; $i < $ctx->getChildCount(); $i++) {
            if ($ctx->getChild($i)->getText() === 'default') {
                $defaultLabel = $this->newLabel("switch_default");
                break;
            }
        }

        if ($defaultLabel !== null) {
            $this->emit("b $defaultLabel");
        } else {
            $this->emit("b $endLabel");
        }

        // Emitir cuerpos de casos
        $this->breakLabelStack[] = $endLabel;
        foreach ($cases as $idx => $caseCtx) {
            $this->emitLabel($caseLabels[$idx]);

            if ($caseCtx->block()) {
                $this->visit($caseCtx->block());
            }

            $stmts = $caseCtx->statement();
            if (!is_array($stmts)) {
                $stmts = $stmts ? [$stmts] : [];
            }
            foreach ($stmts as $stmt) {
                if ($stmt !== null) {
                    $this->visit($stmt);
                }
            }

            $this->emit("b $endLabel");
        }
        array_pop($this->breakLabelStack);

        // Default
        if ($defaultLabel !== null) {
            $this->emitLabel($defaultLabel);

            for ($i = 0; $i < $ctx->getChildCount(); $i++) {
                $child = $ctx->getChild($i);
                if ($child->getText() === 'default') {
                    for ($j = $i + 1; $j < $ctx->getChildCount(); $j++) {
                        $nextChild = $ctx->getChild($j);
                        if ($nextChild instanceof Context\BlockContext || $nextChild instanceof Context\StatementContext) {
                            $this->breakLabelStack[] = $endLabel;
                            $this->visit($nextChild);
                            array_pop($this->breakLabelStack);
                        }
                    }
                    break;
                }
            }

            $this->emit("b $endLabel");
        }

        $this->emitLabel($endLabel);
        return null;
    }

    public function visitBreakStmt($ctx) {
        if (!empty($this->breakLabelStack)) {
            $label = $this->breakLabelStack[count($this->breakLabelStack) - 1];
            $this->emit("b $label");
        }
        return null;
    }

    public function visitContinueStmt($ctx) {
        if (!empty($this->continueLabelStack)) {
            $label = $this->continueLabelStack[count($this->continueLabelStack) - 1];
            $this->emit("b $label");
        }
        return null;
    }

    public function visitReturnStmt($ctx) {
        $exprNode = $ctx->expression();
        $returnValues = [];
        
        if ($exprNode !== null) {
            if (is_array($exprNode)) {
                foreach ($exprNode as $expr) {
                    $returnValues[] = $this->visit($expr);
                }
            } else {
                $returnValues[] = $this->visit($exprNode);
            }
        }
        
        // Cargar valores en x0, x1, x2...
        for ($i = 0; $i < count($returnValues); $i++) {
            $val = $returnValues[$i];
            if (is_numeric($val)) {
                $this->emit("mov x$i, #$val");
            } elseif (is_string($val) && strpos($val, 'var_') === 0) {
                $varName = substr($val, 4);
                $offset = $this->getVarOffset($varName);
                $this->emit("ldr x$i, [x29, #$offset]");
            } elseif (is_string($val) && strpos($val, 'x0_value') === 0) {
                if ($i > 0) {
                    $this->emit("mov x$i, x0");
                }
            }
        }
        
        if ($this->currentFunctionReturnLabel) {
            $this->emit("b " . $this->currentFunctionReturnLabel);
        }
        
        return null;
    }
    public function visitPostStmt($node) {
        // Manejar i++ o i--
        $text = $node->getText();
        if (preg_match('/([a-zA-Z_][a-zA-Z0-9_]*)\s*(\+\+|\-\-)/', $text, $matches)) {
            $varName = $matches[1];
            $operator = $matches[2];
            $offset = $this->getVarOffset($varName);
            $symbol = $this->findSymbol($varName);
            $currentValue = is_array($symbol) ? ($symbol['value'] ?? null) : null;
            
            // Cargar variable
            $this->emitLoadFromStack('x0', $offset);
            
            if ($operator === '++') {
                $this->emit("add x0, x0, #1");
                if (is_numeric($currentValue)) {
                    $currentValue = (int)$currentValue + 1;
                }
            } else {
                $this->emit("sub x0, x0, #1");
                if (is_numeric($currentValue)) {
                    $currentValue = (int)$currentValue - 1;
                }
            }
            
            // Guardar de vuelta
            $this->emitStoreToStack('x0', $offset);
            if (is_numeric($currentValue)) {
                $this->addSymbol($varName, 'int32', $this->currentFunction, $currentValue, $node);
            }
        }
        return null;
    }
    
    public function visitExpresionStmt($ctx) {
        $stmtText = $ctx->getText();
        if (preg_match('/^([a-zA-Z_][a-zA-Z0-9_]*)(\+\+|\-\-)$/', $stmtText, $matches)) {
            $varName = $matches[1];
            $operator = $matches[2];
            $offset = $this->getVarOffset($varName);
            $symbol = $this->findSymbol($varName);
            $currentValue = is_array($symbol) ? ($symbol['value'] ?? null) : null;

            $this->emitLoadFromStack('x0', $offset);
            if ($operator === '++') {
                $this->emit("add x0, x0, #1");
                if (is_numeric($currentValue)) {
                    $currentValue = (int)$currentValue + 1;
                }
            } else {
                $this->emit("sub x0, x0, #1");
                if (is_numeric($currentValue)) {
                    $currentValue = (int)$currentValue - 1;
                }
            }
            $this->emitStoreToStack('x0', $offset);
            if (is_numeric($currentValue)) {
                $this->addSymbol($varName, 'int32', $this->currentFunction, $currentValue, $ctx);
            }
            return null;
        }

        return $this->visit($ctx->expression());
    }
    
    public function visitExpression($ctx) {
        if ($ctx->getChildCount() > 0) {
            $result = $this->visit($ctx->getChild(0));
            if (!$this->silentMode) {
                $this->emit("// DEBUG Expression: result = " . json_encode($result));
            }
            return $result;
        }
        return null;
    }
    
    public function visitLogicalOr($ctx) {
        $values = $ctx->logicalAnd();
        if (!is_array($values)) {
            $values = $values ? [$values] : [];
        }

        if (count($values) === 0) {
            $this->emit("mov x0, #0");
            return false;
        }

        if (count($values) === 1) {
            return $this->visit($values[0]);
        }

        $trueLabel = $this->newLabel("or_true");
        $endLabel = $this->newLabel("or_end");

        foreach ($values as $valueCtx) {
            $value = $this->visit($valueCtx);
            $this->emitValueToRegister($value, 'x0');
            $this->emit("cmp x0, #0");
            $this->emit("b.ne $trueLabel");
        }

        $this->emit("mov x0, #0");
        $this->emit("b $endLabel");
        $this->emitLabel($trueLabel);
        $this->emit("mov x0, #1");
        $this->emitLabel($endLabel);
        return 'x0_value';
    }
    
    public function visitLogicalAnd($ctx) {
        $values = $ctx->equality();
        if (!is_array($values)) {
            $values = $values ? [$values] : [];
        }

        if (count($values) === 0) {
            $this->emit("mov x0, #0");
            return false;
        }

        if (count($values) === 1) {
            return $this->visit($values[0]);
        }

        $falseLabel = $this->newLabel("and_false");
        $endLabel = $this->newLabel("and_end");

        foreach ($values as $valueCtx) {
            $value = $this->visit($valueCtx);
            $this->emitValueToRegister($value, 'x0');
            $this->emit("cmp x0, #0");
            $this->emit("b.eq $falseLabel");
        }

        $this->emit("mov x0, #1");
        $this->emit("b $endLabel");
        $this->emitLabel($falseLabel);
        $this->emit("mov x0, #0");
        $this->emitLabel($endLabel);
        return 'x0_value';
    }
    
    public function visitEquality($ctx) {
        $count = $ctx->getChildCount();
        if ($count === 0) {
            return null;
        }
        
        if ($count === 1) {
            return $this->visit($ctx->getChild(0));
        }
        
        $leftNode = $ctx->getChild(0);
        $operator = $ctx->getChild(1)->getText();
        $rightNode = $ctx->getChild(2);
        
        // Evaluar left y guardar en x1
        $left = $this->visit($leftNode);
        if ($left === 0 || $left === '0' || $left === 'nil') {
            $this->emit("mov x1, #0");
        } elseif (is_numeric($left)) {
            $this->emit("mov x1, #$left");
        } elseif (is_string($left) && strpos($left, 'var_') === 0) {
            $varName = substr($left, 4);
            $offset = $this->getVarOffset($varName);
            $this->emit("ldr x1, [x29, #$offset]");
        } elseif (is_string($left) && strpos($left, 'x0_value') === 0) {
            $this->emit("mov x1, x0");
        }
        
        // Evaluar right y guardar en x0
        $right = $this->visit($rightNode);
        if ($right === 0 || $right === '0' || $right === 'nil') {
            $this->emit("mov x0, #0");
        } elseif (is_numeric($right)) {
            $this->emit("mov x0, #$right");
        } elseif (is_string($right) && strpos($right, 'var_') === 0) {
            $varName = substr($right, 4);
            $offset = $this->getVarOffset($varName);
            $this->emit("ldr x0, [x29, #$offset]");
        } elseif (is_string($right) && strpos($right, 'x0_value') === 0) {
            // ya está en x0
        }
        
        $this->emit("cmp x1, x0");
        if ($operator === '==') {
            $this->emit("cset x0, eq");
        } elseif ($operator === '!=') {
            $this->emit("cset x0, ne");
        }
        
        return 'x0_value';
    }
    
    public function visitComparison($ctx) {
        $count = count($ctx->addition());
        
        if ($count == 0) {
            return null;
        }
        
        $left = $this->visit($ctx->addition(0));
        
        for ($i = 1; $i < $count; $i++) {
            $operator = $ctx->getChild(2 * $i - 1)->getText();
            
            // IMPORTANTE: Guardar left en x1 ANTES de evaluar right
            // Si left es x0_value, mover a x1 primero (ANTES de que se sobrescriba en right)
            if (is_string($left) && strpos($left, 'x0_value') === 0) {
                $this->emit("mov x1, x0");  // Guardar left (que está en x0) a x1
            } else {
                // Cargar izquierda en x1
                if (is_numeric($left)) {
                    $this->emit("mov x1, #$left");
                } elseif (is_string($left) && strpos($left, 'var_') === 0) {
                    $varName = substr($left, 4);
                    $offset = $this->getVarOffset($varName);
                    $this->emit("ldr x1, [x29, #$offset]");
                }
            }
            
            // AHORA evaluar right (esto sobrescribe x0)
            $right = $this->visit($ctx->addition($i));
            
            // Cargar derecha en x0
            if (is_numeric($right)) {
                $this->emit("mov x0, #$right");
            } elseif (is_string($right) && strpos($right, 'var_') === 0) {
                $varName = substr($right, 4);
                $offset = $this->getVarOffset($varName);
                $this->emit("ldr x0, [x29, #$offset]");
            } elseif (is_string($right) && strpos($right, 'x0_value') === 0) {
                // ya está en x0
            }
            
            // Comparar x1 vs x0
            $this->emit("cmp x1, x0");
            
            // Generar resultado booleano según el operador
            $tempOffset = $this->allocateVar('__temp_bool');
            
            switch ($operator) {
                case '>':
                    $this->emit("cset x0, gt");
                    break;
                case '<':
                    $this->emit("cset x0, lt");
                    break;
                case '>=':
                    $this->emit("cset x0, ge");
                    break;
                case '<=':
                    $this->emit("cset x0, le");
                    break;
                case '==':
                    $this->emit("cset x0, eq");
                    break;
                case '!=':
                    $this->emit("cset x0, ne");
                    break;
            }
            
            $this->emitStoreToStack('x0', $tempOffset);
            $left = 'var___temp_bool';
        }
        
        if (is_string($left) && $left === 'var___temp_bool') {
            $offset = $this->getVarOffset('__temp_bool');
            $this->emitLoadFromStack('x0', $offset);
            return 'var___temp_bool';
        }

        // Asegurar que el resultado está en x0 para la condición
        if (is_numeric($left)) {
            $this->emit("mov x0, #$left");
        } elseif (is_string($left) && strpos($left, 'var_') === 0) {
            $varName = substr($left, 4);
            $offset = $this->getVarOffset($varName);
              $this->emitLoadFromStack('x0', $offset);
        }

        return $left;
    }

     public function visitAddition($ctx) {
        $this->emit("// DEBUG: visitAddition called for: " . $ctx->getText());

        $multiplications = $ctx->multiplication();
        if (!is_array($multiplications)) {
            $multiplications = [$multiplications];
        }

        if (count($multiplications) === 0) {
            return null;
        }

        // Primer término
        $left = $this->visit($multiplications[0]);

        if (count($multiplications) === 1) {
            return $left;
        }

        if (is_numeric($left)) {
            $this->emit("mov x0, #$left");
        } elseif (is_string($left) && strpos($left, 'var_') === 0) {
            $varName = substr($left, 4);
            $offset = $this->getVarOffset($varName);
                  $this->emitLoadFromStack('x0', $offset);
        } elseif (!(is_string($left) && strpos($left, 'x0_value') === 0)) {
            $this->emit("// WARNING: left operand no esperado en suma");
        }

        // Resto de términos (+ y -)
        for ($i = 1; $i < count($multiplications); $i++) {
            // IMPORTANTE: guardar el resultado anterior en x1 ANTES de evaluar el siguiente término
            $this->emit("mov x1, x0");
            
            // Si el operando derecho podría ser complejo (función), guardar x1 en stack
            $rightNode = $multiplications[$i];
            $rightText = $rightNode->getText();
            $isComplexRight = !is_numeric($this->getValueWithoutEmit($rightNode)) && 
                             !(preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $rightText));
            
            $x1BackupOffset = null;
            if ($isComplexRight) {
                // Guardar x1 en stack
                $x1BackupOffset = $this->allocateVar("__x1_backup_" . rand());
                $this->emitStoreToStack('x1', $x1BackupOffset);
            }
            
            $operatorNode = $ctx->getChild(2 * $i - 1);
            $operator = $operatorNode ? $operatorNode->getText() : '+';

            $right = $this->visit($rightNode);

            // Restaurar x1 si fue guardado
            if ($x1BackupOffset !== null) {
                $this->emitLoadFromStack('x1', $x1BackupOffset);
            }

            // Cargar derecho en x0 (el visit() ya lo hizo, pero podría no ser variable)
            if (is_numeric($right)) {
                $this->emit("mov x0, #$right");
            } elseif (is_string($right) && strpos($right, 'var_') === 0) {
                $varName = substr($right, 4);
                $offset = $this->getVarOffset($varName);
                $this->emit("ldr x0, [x29, #$offset]");
            }
            // Si es 'x0_value', ya está en x0

           // Operación: resultado = x1 OP x0
            // Detectar si es float (usando registros d0, d1 para floats)
            $isFloat = false;

            // Verificar si algún operando es float (para simplificar, asumimos que si el valor es float)
            if (is_float($left) || is_float($right)) {
                $isFloat = true;
            }

            if ($isFloat) {
                // Usar instrucciones de punto flotante
                $this->emit("// Usando operación float");
                $this->emit("scvtf d0, x1");  // Convertir entero a float
                $this->emit("scvtf d1, x0");  // Convertir entero a float
                if ($operator === '+') {
                    $this->emit("fadd d0, d0, d1");
                } else {
                    $this->emit("fsub d0, d0, d1");
                }
                $this->emit("fcvtzs x0, d0");  // Convertir float a entero
            } else {
                // Enteros
                if ($operator === '+') {
                    $this->emit("add x0, x1, x0");
                } else {
                    $this->emit("sub x0, x1, x0");
                }
            }
        }

        return 'x0_value';
    }
   public function visitMultiplication($ctx) {
        $this->emit("// DEBUG: visitMultiplication called for: " . $ctx->getText());

        $unaries = $ctx->unary();
        if (!is_array($unaries)) {
            $unaries = [$unaries];
        }

        if (count($unaries) === 0) {
            return null;
        }

        // Primer operando
        $left = $this->visit($unaries[0]);

        if (count($unaries) === 1) {
            return $left;
        }

        // Asegurar que el primer valor esté en x0
        if (is_numeric($left)) {
            $this->emit("mov x0, #$left");
        } elseif (is_string($left) && strpos($left, 'var_') === 0) {
            $varName = substr($left, 4);
            $offset = $this->getVarOffset($varName);
            $this->emit("ldr x0, [x29, #$offset]");
        } elseif (is_string($left) && strpos($left, 'x0_value') === 0) {
            // ya está en x0 → no hacer nada
        }

        // Procesar el resto: * / %
        for ($i = 1; $i < count($unaries); $i++) {
            // IMPORTANTE: guardar el resultado anterior en x1 ANTES de evaluar el siguiente término
            $this->emit("mov x1, x0");
            
            // Si el operando derecho podría ser complejo (función), guardar x1 en stack
            $rightNode = $unaries[$i];
            $rightText = $rightNode->getText();
            $isComplexRight = !is_numeric($this->getValueWithoutEmit($rightNode)) && 
                             !(preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $rightText));
            
            $x1BackupOffset = null;
            if ($isComplexRight) {
                // Guardar x1 en stack
                $x1BackupOffset = $this->allocateVar("__x1_backup_" . rand());
                $this->emitStoreToStack('x1', $x1BackupOffset);
            }
            
            $operatorNode = $ctx->getChild(2 * $i - 1); // operador *, / o %
            $operator = $operatorNode ? $operatorNode->getText() : '*';

            $right = $this->visit($rightNode);   // ← visit normal, NO silent

            // Restaurar x1 si fue guardado
            if ($x1BackupOffset !== null) {
                $this->emitLoadFromStack('x1', $x1BackupOffset);
            }

            // Cargar operando derecho en x0 (el visit() ya lo hizo, pero podría no ser variable)
            if (is_numeric($right)) {
                $this->emit("mov x0, #$right");
            } elseif (is_string($right) && strpos($right, 'var_') === 0) {
                $varName = substr($right, 4);
                $offset = $this->getVarOffset($varName);
                $this->emit("ldr x0, [x29, #$offset]");
            }
            // Si es 'x0_value', ya está en x0

           $isFloat = false;
            if (is_float($left) || is_float($right)) {
                $isFloat = true;
            }

            if ($isFloat) {
                $this->emit("scvtf d0, x1");
                $this->emit("scvtf d1, x0");
                if ($operator === '*') {
                    $this->emit("fmul d0, d0, d1");
                } elseif ($operator === '/') {
                    $this->emit("fdiv d0, d0, d1");
                }
                $this->emit("fcvtzs x0, d0");
            } else {
                if ($operator === '*') {
                    $this->emit("mul x0, x1, x0");
                } elseif ($operator === '/') {
                    $this->emit("udiv x0, x1, x0");
                } elseif ($operator === '%') {
                    $this->emit("udiv x2, x1, x0");
                    $this->emit("msub x0, x2, x0, x1");
                }
            }
        }

        return 'x0_value';
    }
   
    
   public function visitUnary($ctx) {
        // Manejo especial para operadores unarios: &, * además de - y !
        $childCount = $ctx->getChildCount();
        if ($childCount == 0) return null;

        $lastChild = $ctx->getChild($childCount - 1);

        // Recolectar operadores (todos los hijos excepto el último)
        $ops = [];
        for ($i = 0; $i < $childCount - 1; $i++) {
            $ops[] = $ctx->getChild($i)->getText();
        }

        // Si hay operador & (address-of)
        if (in_array('&', $ops, true)) {
            // Sólo soportamos &ident
            $text = $lastChild->getText();
            if (preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $text)) {
                $offset = $this->getVarOffset($text);
                // Generar la dirección en x0: x29 +/- offset
                if ($offset < 0) {
                    $this->emit("sub x0, x29, #" . abs($offset));
                } else {
                    $this->emit("add x0, x29, #" . $offset);
                }
                return 'x0_value_ptr';
            }
        }

        // Si hay operador * (dereference)
        if (in_array('*', $ops, true)) {
            // Soportar *ident o *(expr)
            if ($lastChild instanceof Context\PrimaryContext) {
                $text = $lastChild->getText();
                if (preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $text)) {
                    // Cargar el puntero almacenado en la variable
                    $pOffset = $this->getVarOffset($text);
                    $this->emit("ldr x0, [x29, #$pOffset]");
                    // Ahora x0 contiene la dirección, cargar el valor apuntado
                    $this->emit("ldr x0, [x0]");

                    // Determinar tipo apuntado si está en la tabla de símbolos
                    $sym = $this->findSymbol($text);
                    if ($sym && is_string($sym['value']) && str_starts_with($sym['value'], '*')) {
                        $pt = $sym['value'];
                        if (strpos($pt, 'float') !== false) {
                            return 'x0_value_float32';
                        }
                    }

                    return 'x0_value';
                }
            }
            // Fallback: evaluar la expresión y luego dereferenciar si es dirección en x0
            $res = $this->visit($lastChild);
            if (is_string($res) && strpos($res, 'x0_value') === 0) {
                $this->emit("ldr x0, [x0]");
                return 'x0_value';
            }
        }

        // Para otros operadores, evaluar el último hijo primero
        $result = $this->visit($lastChild);
        // Manejar operadores unarios (como - o !) que puedan estar antes
        for ($i = 0; $i < $childCount - 1; $i++) {
            $op = $ctx->getChild($i)->getText();
            if ($op === '-') {
                if (is_numeric($result)) {
                    $result = -$result;
                } else {
                    $this->emit("neg x0, x0");
                    $result = 'x0_value';
                }
            } elseif ($op === '!') {
                $this->emit("cmp x0, #0");
                $this->emit("cset x0, eq");
                $result = 'x0_value';
            }
        }
        return $result;
    }
    
    public function visitQualified($ctx) {
        return $ctx->getText();
    }
    
    public function visitPrimary($ctx) {
        for ($i = 0; $i < $ctx->getChildCount(); $i++) {
            $child = $ctx->getChild($i);
            if ($child->getText() === 'len') {
                return $this->visitLen($ctx);
            }

            if (preg_match('/^".*"$/s', $child->getText())) {
                $stringValue = stripcslashes(trim($child->getText(), '"'));
                return $this->addString($stringValue);
            }

            
            if ($child instanceof Context\QualifiedContext) {
                $funcName = $child->getText();
                if ($funcName === 'fmt.Print' || $funcName === 'fmt.Println') {
                    $exprs = [];
                    $argList = null;

                    for ($j = $i + 1; $j < $ctx->getChildCount(); $j++) {
                        $maybeList = $ctx->getChild($j);
                        if ($maybeList instanceof Context\ArgumentListContext) {
                            $argList = $maybeList;
                            break;
                        }
                    }

                    if ($argList) {
                        $exprs = $argList->expression();
                        if (!is_array($exprs)) {
                            $exprs = $exprs ? [$exprs] : [];
                        }
                    } else {
                        for ($j = $i + 1; $j < $ctx->getChildCount(); $j++) {
                            $candidate = $ctx->getChild($j);
                            if ($candidate instanceof Context\ExpressionContext) {
                                $exprs[] = $candidate;
                            }
                        }
                    }

                    foreach ($exprs as $idxExpr => $expr) {
                        if ($expr === null) {
                            continue;
                        }
                        $this->emitPrintNodeValue($expr);
                        if ($idxExpr < count($exprs) - 1) {
                            $this->emitPrintText(' ');
                        }
                    }

                    if ($funcName === 'fmt.Println') {
                        $this->emit("adrp x1, newline");
                        $this->emit("add x1, x1, :lo12:newline");
                        $this->emit("mov x0, #1");
                        $this->emit("mov x2, #1");
                        $this->emit("mov x8, #64");
                        $this->emit("svc #0");
                    }

                    return null;
                }
                else if ($funcName === 'typeOf') {
                    $this->emit("// DEBUG: typeOf() built-in");
                    
                    $argNode = null;
                    for ($j = $i + 1; $j < $ctx->getChildCount(); $j++) {
                        $arg = $ctx->getChild($j);
                        if ($arg instanceof Context\ArgumentListContext && $arg->getChildCount() > 0) {
                            $argNode = $arg->getChild(0);
                            break;
                        }
                    }
                    
                    if (!$argNode) {
                        $this->addError("typeOf() requiere un argumento", $ctx);
                        return null;
                    }
                    
                    $typeName = 'unknown';
                    
                    // Si es un identificador (variable), buscar en símbolos primero
                    $argText = $argNode->getText();
                    if ($argText === 'nil') {
                        return $this->addString('nil');
                    }
                    if (preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $argText)) {
                        $symbol = $this->findSymbol($argText);
                        if ($symbol) {
                            $typeName = $symbol['type'] ?? 'unknown';
                            return $this->addString($typeName);
                        }
                    }
                    
                    // Si es un array literal o algo más
                    $argValue = $this->getActualValue($argNode);
                    $this->emit("// DEBUG: typeOf argument = " . json_encode($argValue));
                    
                    if (isset($this->arrayInfo[$argValue])) {
                        $typeName = 'array';
                    } elseif (is_string($argValue)) {
                        if (strpos($argValue, 'str_') === 0) {
                            $typeName = 'string';
                        } elseif ($argValue === 'true' || $argValue === 'false') {
                            $typeName = 'bool';
                        } elseif (strlen($argValue) === 1 && ord($argValue) < 128) {
                            $typeName = 'rune';
                        } else {
                            $typeName = 'string';
                        }
                    } elseif (is_bool($argValue)) {
                        $typeName = 'bool';
                    } elseif (is_int($argValue)) {
                        $typeName = 'int32';
                    } elseif (is_float($argValue)) {
                        $typeName = 'float32';
                    } elseif (is_null($argValue)) {
                        $typeName = 'nil';
                    }
                    
                    return $this->addString($typeName);
                }
                else if ($funcName === 'now') {
                    $now = date('Y-m-d H:i:s');
                    $label = $this->addString($now);
                    $this->emit("adrp x1, $label");
                    $this->emit("add x1, x1, :lo12:$label");
                    $this->emit("mov x2, #" . strlen($now));
                    $this->emit("mov x0, #1");
                    $this->emit("mov x8, #64");
                    $this->emit("svc #0");
                    return null;  // No retornar nada más
                }

                else if ($funcName === 'substr') {
                    $this->emit("// DEBUG: substr() built-in");
                    
                    // Obtener los argumentos
                    $args = [];
                    for ($j = $i + 1; $j < $ctx->getChildCount(); $j++) {
                        $arg = $ctx->getChild($j);
                        if ($arg instanceof Context\ArgumentListContext) {
                            $expressions = $arg->expression();
                            if (!is_array($expressions)) {
                                $expressions = [$expressions];
                            }
                            foreach ($expressions as $expr) {
                                if ($expr === null) continue;
                                $args[] = $this->getActualValue($expr);
                            }
                            break;
                        }
                    }

                    
                    
                    if (count($args) != 3) {
                        $this->addError("substr() requiere 3 argumentos: string, inicio, longitud", $ctx);
                        return null;
                    }
                    
                    $str = $args[0];
                    $start = $args[1];
                    $length = $args[2];
                    
                    // Obtener el string real
                    if (is_string($str) && strpos($str, 'str_') === 0) {
                        $str = $this->getStringValueFromLabel($str);
                    }
                    
                    // Extraer substring
                    if (is_string($str) && is_numeric($start) && is_numeric($length)) {
                        $sub = substr($str, (int)$start, (int)$length);
                        $label = $this->addString($sub);
                        
                        // Retornar la etiqueta del string (para usar en fmt.Println)
                        return $label;
                    }
                    
                    $this->addError("substr() argumentos inválidos", $ctx);
                    return null;
                }

                else if ($funcName === 'int' || $funcName === 'int32') {
                    $this->emit("// DEBUG: int() conversion");
                    
                    $argNode = null;
                    for ($j = $i + 1; $j < $ctx->getChildCount(); $j++) {
                        $arg = $ctx->getChild($j);
                        if ($arg instanceof Context\ArgumentListContext && $arg->getChildCount() > 0) {
                            $argNode = $arg->getChild(0);
                            break;
                        }
                    }
                    
                    if (!$argNode) {
                        $this->addError("int() requiere un argumento", $ctx);
                        return null;
                    }
                    
                    // Visitar el argumento para obtener su valor
                    $argValue = $this->visit($argNode);
                    
                    // Si es una variable, obtener su valor
                    if (is_string($argValue) && strpos($argValue, 'var_') === 0) {
                        $varName = substr($argValue, 4);
                        $offset = $this->getVarOffset($varName);
                        $this->emit("ldr x0, [x29, #$offset]");
                        return 'x0_value_float32';
                    }
                    
                    // Si es numérico directo
                    if (is_numeric($argValue)) {
                        return (int)$argValue;
                    }
                    
                    return 0;
                }

                else if ($funcName === 'float' || $funcName === 'float32') {
                    $this->emit("// DEBUG: float() conversion");
                    
                    $argNode = null;
                    for ($j = $i + 1; $j < $ctx->getChildCount(); $j++) {
                        $arg = $ctx->getChild($j);
                        if ($arg instanceof Context\ArgumentListContext && $arg->getChildCount() > 0) {
                            $argNode = $arg->getChild(0);
                            break;
                        }
                    }
                    
                    if (!$argNode) {
                        $this->addError("float() requiere un argumento", $ctx);
                        return null;
                    }
                    
                    $argValue = $this->visit($argNode);
                    
                    if (is_string($argValue) && strpos($argValue, 'var_') === 0) {
                        $varName = substr($argValue, 4);
                        $offset = $this->getVarOffset($varName);
                        $this->emit("ldr x0, [x29, #$offset]");
                        return 'x0_value';
                    }
                    
                    if (is_numeric($argValue)) {
                        return (float)$argValue;
                    }
                    
                    return 0.0;
                }

                else if ($funcName === 'string') {
                    $this->emit("// DEBUG: string() conversion");
                    
                    $argNode = null;
                    for ($j = $i + 1; $j < $ctx->getChildCount(); $j++) {
                        $arg = $ctx->getChild($j);
                        if ($arg instanceof Context\ArgumentListContext && $arg->getChildCount() > 0) {
                            $argNode = $arg->getChild(0);
                            break;
                        }
                    }
                    
                    if (!$argNode) {
                        $this->addError("string() requiere un argumento", $ctx);
                        return null;
                    }
                    
                    $argValue = $this->visit($argNode);
                    
                    // Si es entero, convertir a string
                    if (is_numeric($argValue)) {
                        $strValue = (string)$argValue;
                        return $this->addString($strValue);
                    }
                    
                    // Si es variable numérica y está en la tabla de símbolos, convertir en tiempo de compilación
                    if (is_string($argValue) && strpos($argValue, 'var_') === 0) {
                        $varName = substr($argValue, 4);
                        $symbol = $this->findSymbol($varName);
                        if ($symbol && isset($symbol['value']) && is_numeric($symbol['value']) && isset($this->varOffsets[$varName]) && is_string($this->varOffsets[$varName])) {
                            $strValue = (string)$symbol['value'];
                            return $this->addString($strValue);
                        }

                        // Si no conocemos el valor en tiempo de compilación, emitir código para convertir en tiempo de ejecución
                        $offset = $this->getVarOffset($varName);
                        $this->emit("ldr x0, [x29, #$offset]");
                        // Convertir número a string (solo 1 dígito por simplicidad)
                        $this->emit("add x0, x0, #48");
                        $label = $this->newLabel("str_num");
                        $this->dataSection[] = $label . ": .space 2";
                        $this->emit("adrp x1, $label");
                        $this->emit("add x1, x1, :lo12:$label");
                        $this->emit("strb w0, [x1]");
                        return $label;
                    }
                    
                    return $this->addString("");
                }

                else if ($funcName === 'bool') {
                    $this->emit("// DEBUG: bool() conversion");
                    
                    $argNode = null;
                    for ($j = $i + 1; $j < $ctx->getChildCount(); $j++) {
                        $arg = $ctx->getChild($j);
                        if ($arg instanceof Context\ArgumentListContext && $arg->getChildCount() > 0) {
                            $argNode = $arg->getChild(0);
                            break;
                        }
                    }
                    
                    if (!$argNode) {
                        $this->addError("bool() requiere un argumento", $ctx);
                        return null;
                    }
                    
                    $argValue = $this->visit($argNode);
                    
                    if (is_numeric($argValue)) {
                        return $argValue != 0;
                    }
                    
                    if (is_string($argValue) && strpos($argValue, 'var_') === 0) {
                        $varName = substr($argValue, 4);
                        $offset = $this->getVarOffset($varName);
                        $this->emit("ldr x0, [x29, #$offset]");
                        $this->emit("cmp x0, #0");
                        $this->emit("cset x0, ne");
                        return 'x0_value';
                    }
                    
                    return false;
                }
                
                else if (isset($this->functions[$funcName])) {
                    // Recolectar argumentos usando argumentList()
                    $argExprs = [];
                    
                    // Buscar el nodo argumentList
                    for ($j = $i + 1; $j < $ctx->getChildCount(); $j++) {
                        $arg = $ctx->getChild($j);
                        
                        if ($arg instanceof Context\ArgumentListContext) {
                            $expressions = $arg->expression();
                            if (!is_array($expressions)) {
                                $expressions = [$expressions];
                            }
                            $argExprs = $expressions;
                            break;
                        }
                    }
                    
                    // Emitir argumentos preservando el orden RTL y evitando que
                    // llamadas anidadas clobberen registros ya calculados.
                    // Audit note: garantizar evaluación derecha->izquierda (especificación)
                    $argCount = count($argExprs);
                    $stackSize = $argCount * 16;
                    if ($stackSize > 0) {
                        $this->emit("sub sp, sp, #$stackSize");
                    }

                    for ($argIdx = $argCount - 1; $argIdx >= 0; $argIdx--) {
                        $argExpr = $argExprs[$argIdx];
                        if ($argExpr === null) continue;

                        // Obtener valor sin emitir código
                        $argValue = $this->getValueWithoutEmit($argExpr);

                        // Evaluar el argumento en x0
                        if (is_numeric($argValue)) {
                            $this->emit("mov x0, #$argValue");
                        } elseif (is_string($argValue) && strpos($argValue, 'var_') === 0) {
                            $varName = substr($argValue, 4);
                            $offset = $this->getVarOffset($varName);
                            $this->emit("ldr x0, [x29, #$offset]");
                        } else {
                            // Para expresiones complejas, evaluarlas y dejar el resultado en x0
                            $this->visit($argExpr);
                        }

                        // Guardar temporalmente el argumento ya evaluado
                        if ($stackSize > 0) {
                            $slotOffset = $argIdx * 16;
                            $this->emit("str x0, [sp, #$slotOffset]");
                        }
                    }

                    // Restaurar argumentos en x0-x7 en el orden esperado por la llamada
                    for ($argIdx = 0; $argIdx < $argCount; $argIdx++) {
                        $slotOffset = $argIdx * 16;
                        $this->emit("ldr x$argIdx, [sp, #$slotOffset]");
                    }

                    if ($stackSize > 0) {
                        $this->emit("add sp, sp, #$stackSize");
                    }

                    // Llamar a la función
                    $callName = ($funcName === 'main') ? '_start' : $funcName;
                    $this->emit("bl " . $callName);
                    return 'x0_value';
                }
            }
            // Expresión entre paréntesis
            if ($child->getText() === '(') {
                // Buscar la expresión interna y el paréntesis de cierre
                for ($j = $i + 1; $j < $ctx->getChildCount(); $j++) {
                    $innerChild = $ctx->getChild($j);
                    if ($innerChild instanceof Context\ExpressionContext) {
                        $result = $this->visit($innerChild);
                        // Asegurar que el resultado está en x0
                        if (is_numeric($result)) {
                            $this->emit("mov x0, #$result");
                        } elseif (is_string($result) && strpos($result, 'var_') === 0) {
                            $varName = substr($result, 4);
                            $offset = $this->getVarOffset($varName);
                            $this->emit("ldr x0, [x29, #$offset]");
                        }
                        return 'x0_value';
                    }
                }
            }
            // Rune literal (comillas simples)
            if (preg_match("/^'.*'$/s", $child->getText())) {
                $runeText = trim($child->getText(), "'");
                $runeText = stripcslashes($runeText);
                if ($runeText !== '') {
                    return ord($runeText[0]);
                }
                return 0;
            }
            // Boolean literal
            if ($child->getText() === 'true') {
                return true;
            }
            if ($child->getText() === 'false') {
                return false;
            }
            if ($child->getText() === 'nil') {
                return 0;
            }
            // Número literal
            if (is_numeric($child->getText())) {
                $numText = $child->getText();
                // Siempre devolver como string para poder distinguir después
                if (strpos($numText, '.') !== false) {
                    // Es un float literal - devolver como string para identificar después
                    return (float)$numText;
                }
                return (int)$numText;
            }

            // Caso: Variable - definir $text primero
            $text = $child->getText();

            // ============================================
            // DETECCIÓN DE ACCESO A ARRAY: arr[0]
            // ============================================
            if ($i + 1 < $ctx->getChildCount() && $ctx->getChild($i + 1)->getText() === '[') {
                $arrayName = $text;
                $indices = [];
                $pos = $i + 1;
                
                while ($pos < $ctx->getChildCount() && $ctx->getChild($pos)->getText() === '[') {
                    if ($pos + 1 >= $ctx->getChildCount()) break;
                    $idxExpr = $ctx->getChild($pos + 1);
                    
                    // DEBUG: Log what we're parsing
                    $this->emit("// DEBUG: Parsing array index expr: " . $idxExpr->getText());
                    
                    // Obtener el índice (puede ser numérico o variable)
                    // Primero, intentar extraer el nombre de la variable directamente del texto
                    $idxText = $idxExpr->getText();
                    
                    // Si es un número, usar directamente
                    if (is_numeric($idxText)) {
                        $indices[] = (int)$idxText;
                        $this->emit("// DEBUG: Index is numeric: " . (int)$idxText);
                    } else {
                        // Es una variable, guardar su nombre (no su valor)
                        $indices[] = $idxText;
                        $this->emit("// DEBUG: Index is variable name: " . $idxText);
                    }
                    $pos += 3;
                }
                
                // Saltar los índices en el loop principal
                $i = $pos - 1;
                
                // Cargar el valor del array
                return $this->visitArrayAccess($arrayName, $indices, $ctx);
            }

            // Variable normal
            if (preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $text) && 
                $text !== 'fmt' && $text !== 'Println') {

                $symbol = $this->findSymbol($text);
                if ($symbol) {
                    $symbolType = $symbol['type'] ?? null;
                    $symbolValue = $symbol['value'] ?? null;

                    if ($symbolType === 'string') {
                        if (is_string($symbolValue) && strpos($symbolValue, 'str_') === 0) {
                            return $symbolValue;
                        }
                        return $this->addString((string)$symbolValue);
                    }

                    // No hacer constant folding para variables mutables numéricas/bool/rune.
                    // Se deben leer desde stack para que reflejen cambios dentro de bucles.
                }
                
                if ($this->silentMode) {
                    $this->emit("// DEBUG silentMode: returning var_$text");
                    return 'var_' . $text;
                }

                if ($i + 1 < $ctx->getChildCount() && 
                    ($ctx->getChild($i + 1)->getText() === '++' || $ctx->getChild($i + 1)->getText() === '--')) {
                    return 'var_' . $text;
                }

                try {
                    $offset = $this->getVarOffset($text);

                    // Detectar si hay una desreferencia '*' en el contexto padre (ej: unary '*p')
                    $isDerefFromParent = false;
                    $parent = $ctx->getParent();
                    if ($parent) {
                        for ($k = 0; $k < $parent->getChildCount(); $k++) {
                            if ($parent->getChild($k) === $ctx) {
                                if ($k - 1 >= 0 && $parent->getChild($k - 1)->getText() === '*') {
                                    $isDerefFromParent = true;
                                }
                                break;
                            }
                        }
                    }
                    if ($isDerefFromParent) {
                        // Cargar la dirección almacenada en la variable p
                        $this->emitLoadFromStack('x0', $offset);
                        // Cargar el valor apuntado
                        $this->emit("ldr x0, [x0]");
                        return 'x0_value';
                    }

                    $this->emitLoadFromStack('x0', $offset);
                    return 'var_' . $text;
                } catch (Exception $e) {
                    $this->addError("Variable no declarada: $text", $ctx);
                }
            }
        }

        return null;
    }

    public function visitLen($ctx) {
        $exprNode = null;
        for ($i = 0; $i < $ctx->getChildCount(); $i++) {
            $child = $ctx->getChild($i);
            if ($child instanceof Context\ExpressionContext) {
                $exprNode = $child;
                break;
            }
        }

        if (!$exprNode) {
            $this->addError("len() requiere un argumento", $ctx);
            return null;
        }

        $argText = trim($exprNode->getText());

        if (preg_match('/^".*"$/s', $argText)) {
            $length = strlen(stripcslashes(trim($argText, '"')));
            $this->emit("mov x0, #$length");
            return 'x0_value';
        }

        if (preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $argText)) {
            if (isset($this->arrayInfo[$argText])) {
                $length = $this->arrayInfo[$argText]['sizes'][0] ?? 0;
                $this->emit("mov x0, #$length");
                return 'x0_value';
            }

            $symbol = $this->findSymbol($argText);
            if ($symbol) {
                $symbolType = $symbol['type'] ?? '';
                $symbolValue = $symbol['value'] ?? null;

                if ($symbolType === 'array') {
                    $sizes = is_string($symbolValue) ? json_decode($symbolValue, true) : $symbolValue;
                    if (is_array($sizes) && count($sizes) > 0) {
                        $this->emit("mov x0, #" . (int)$sizes[0]);
                        return 'x0_value';
                    }
                }

                if ($symbolType === 'string') {
                    if (is_string($symbolValue) && strpos($symbolValue, 'str_') === 0) {
                        $strValue = $this->getStringValueFromLabel($symbolValue);
                        $length = strlen($strValue);
                        $this->emit("mov x0, #$length");
                        return 'x0_value';
                    }

                    $length = strlen((string)$symbolValue);
                    $this->emit("mov x0, #$length");
                    return 'x0_value';
                }
            }
        }

        $this->addError("len() solo funciona con strings y arrays", $ctx);
        return null;
    }
    private function handleIdentifier($text, $ctx) {
        try {
            $offset = $this->getVarOffset($text);
            return 'var_' . $text;
        } catch (Exception $e) {
            $this->addError("Variable no declarada: $text", $ctx);
            return null;
        }
    }
    private function emitPrintFloat() {
        // Convertir float a string (aproximación simple)
        $this->emit("// TODO: Imprimir float correctamente");
        // Por ahora, convertir a entero y mostrar
        $this->emit("fcvtzs x0, d0");  // Convertir float a entero
        $this->emitPrintInteger();
    }
    private function emitPrintInteger() {
        $labelNum = $this->newLabel("num");
        $labelLoop = $this->newLabel("loop");
        $labelDiv = $this->newLabel("div");
        $labelDone = $this->newLabel("done");
        
        // Buffer en .data
        $this->dataSection[] = $labelNum . ": .space 12";
        
        $this->emit("mov x10, #10");
        $this->emit("adrp x1, $labelNum");
        $this->emit("add x1, x1, :lo12:$labelNum");
        $this->emit("add x1, x1, #11");  // Puntero al final del buffer
        $this->emit("mov x2, #0");       // Contador
        
        // Caso especial: número 0
        $this->emit("cmp x0, #0");
        $this->emit("b.ne $labelDiv");
        $this->emit("mov x2, #1");
        $this->emit("mov w3, #'0'");
        $this->emit("strb w3, [x1]");
        $this->emit("sub x1, x1, #1");
        $this->emit("b $labelDone");
        
        $this->emitLabel($labelDiv);
        $this->emit("mov x3, x0");
        
        $this->emitLabel($labelLoop);
        $this->emit("cmp x3, #0");
        $this->emit("b.eq $labelDone");
        $this->emit("udiv x4, x3, x10");
        $this->emit("msub x5, x4, x10, x3");
        $this->emit("add x5, x5, #'0'");
        $this->emit("strb w5, [x1]");
        $this->emit("sub x1, x1, #1");
        $this->emit("add x2, x2, #1");
        $this->emit("mov x3, x4");
        $this->emit("b $labelLoop");
        
        $this->emitLabel($labelDone);
        $this->emit("add x1, x1, #1");  // x1 apunta al inicio del string
        
        // Syscall write: x0=fd, x1=buf, x2=count, x8=syscall_num
        $this->emit("mov x0, #1");      // stdout (fd=1)
        // x2 ya tiene el contador desde el loop, no modificar
        $this->emit("mov x8, #64");     // syscall write
        $this->emit("svc #0");
        
        // Preservar x0 (puede ser usado después)
    }
    // ============================================
    
    // ============================================

    // Reservar espacio para array en stack
    private function allocateVarArray($name, $arrayMeta) {
        $totalSize = $arrayMeta['totalSize'];
        $this->nextOffset -= $totalSize;
        $this->varOffsets[$name] = [
            'offset' => $this->nextOffset,
            'type' => 'array',
            'elementType' => $arrayMeta['elementType'],
            'dimensions' => $arrayMeta['dimensions'],
            'sizes' => $arrayMeta['sizes']
        ];
        return $this->nextOffset;
    }

    // Obtener offset de un elemento de array
    private function getArrayElementOffset($name, array $indices) {
        // Debug
        $this->emit("// getArrayElementOffset: name=$name, indices=" . json_encode($indices));
        $this->emit("// arrayInfo[$name] = " . json_encode($this->arrayInfo[$name] ?? 'NOT FOUND'));
        
        if (!isset($this->arrayInfo[$name])) {
            throw new Exception("Array no definido: $name");
        }
        
        $varInfo = $this->arrayInfo[$name];
        if (!is_array($varInfo) || !isset($varInfo['type']) || $varInfo['type'] !== 'array') {
            throw new Exception("$name no es un array (type=" . ($varInfo['type'] ?? 'unknown') . ")");
        }
        
        $sizes = $varInfo['sizes'];
        $baseOffset = $varInfo['offset'];
        
        // Validar número de índices
        if (count($indices) != count($sizes)) {
            throw new Exception("Número de índices incorrecto. Se esperaban " . count($sizes) . ", se recibieron " . count($indices));
        }
        
        // Convertir índices que son expresiones string a valores numéricos
        $resolvedIndices = [];
        foreach ($indices as $idx) {
            if (is_numeric($idx)) {
                $resolvedIndices[] = (int)$idx;
            } else {
                // Es una variable o expresión - para offset estático en compile-time,
                // solo aceptamos números. Si es una expresión dinámica, será calculada en runtime.
                // Por ahora, asumimos 0 para placeholders compilables.
                $resolvedIndices[] = 0;
            }
        }
        
        // Calcular offset linearizado: ((i1 * size2 + i2) * size3 + i3) * ...
        $linearIndex = 0;
        $multiplier = 1;
        for ($dim = count($sizes) - 1; $dim >= 0; $dim--) {
            $linearIndex += $resolvedIndices[$dim] * $multiplier;
            $multiplier *= $sizes[$dim];
        }
        
        $resultOffset = $baseOffset + ($linearIndex * 8);
        $this->emit("// Array offset calculado: linearIndex=$linearIndex, offset=$resultOffset");
        
        return $resultOffset;
    }

    // Acceso a elemento de array (cargar valor)
    private function visitArrayAccess($name, array $indices, $ctx) {
        $this->emit("// DEBUG: visitArrayAccess called for $name with indices: " . json_encode($indices));
        try {
            // Verificar que el array existe en arrayInfo
            if (isset($this->arrayInfo[$name])) {
                $offset = $this->getArrayElementOffset($name, $indices);
                $this->emit("ldr x0, [x29, #$offset]");
                return 'x0_value';
            }

            $symbol = $this->findSymbol($name);
            if ($symbol && ($symbol['type'] ?? null) === 'pointer') {
                $baseOffset = $this->getVarOffset($name);
                $this->emitLoadFromStack('x9', $baseOffset);

                // x9 ya contiene la dirección base del arreglo.
                // No desreferenciar aquí: el parámetro es *[N]T, no **T.
                
                // Calcular offset del elemento (el compilador reserva 8 bytes por elemento)
                $elementOffset = 0;
                foreach ($indices as $idxValue) {
                    if (is_numeric($idxValue)) {
                        $elementOffset += ((int)$idxValue) * 8;
                        continue;
                    }

                    $idxText = trim((string)$idxValue);

                    // Soportar expresiones simples como j+1 o j-1
                    if (preg_match('/^([a-zA-Z_][a-zA-Z0-9_]*)\s*([+-])\s*(\d+)$/', $idxText, $m)) {
                        $idxVarOffset = $this->getVarOffset($m[1]);
                        $this->emitLoadFromStack('x10', $idxVarOffset);
                        if ((int)$m[3] !== 0) {
                            $this->emit(($m[2] === '+') ? "add x10, x10, #{$m[3]}" : "sub x10, x10, #{$m[3]}");
                        }
                        $this->emit("lsl x10, x10, #3");
                        $this->emit("add x9, x9, x10");
                        continue;
                    }

                    if (preg_match('/^(\d+)\s*([+-])\s*([a-zA-Z_][a-zA-Z0-9_]*)$/', $idxText, $m)) {
                        $idxVarOffset = $this->getVarOffset($m[3]);
                        $this->emitLoadFromStack('x10', $idxVarOffset);
                        if ((int)$m[1] !== 0) {
                            $this->emit("mov x11, #{$m[1]}");
                            if ($m[2] === '+') {
                                $this->emit("add x10, x10, x11");
                            } else {
                                $this->emit("mov x11, #{$m[1]}");
                                $this->emit("sub x10, x11, x10");
                            }
                        }
                        $this->emit("lsl x10, x10, #3");
                        $this->emit("add x9, x9, x10");
                        continue;
                    }

                    $idxVarOffset = $this->getVarOffset($idxText);
                    $this->emitLoadFromStack('x10', $idxVarOffset);
                    $this->emit("lsl x10, x10, #3");
                    $this->emit("add x9, x9, x10");
                }
                
                if ($elementOffset !== 0) {
                    $this->emit("add x9, x9, #$elementOffset");
                }
                
                $nullLabel = $this->newLabel("arr_null");
                $endLabel = $this->newLabel("arr_end");
                $this->emit("cmp x9, #0");
                $this->emit("b.eq $nullLabel");
                $this->emit("ldr x0, [x9]");
                $this->emit("b $endLabel");
                $this->emitLabel($nullLabel);
                $this->emit("mov x0, #0");
                $this->emitLabel($endLabel);
                return 'x0_value';
            }

            $this->addError("Variable no definida o no es un array: $name", $ctx);
            return null;
        } catch (Exception $e) {
            $this->addError($e->getMessage(), $ctx);
            return null;
        }
    }

    // Asignación a elemento de array
    private function visitArrayAssignment($name, array $indices, $value, $ctx) {
        try {
            if (is_numeric($value)) {
                $this->emit("mov x0, #$value");
            } elseif (is_string($value) && strpos($value, 'var_') === 0) {
                $varName = substr($value, 4);
                $varOffset = $this->getVarOffset($varName);
                $this->emit("ldr x0, [x29, #$varOffset]");
            } elseif (is_string($value) && strpos($value, 'x0_value') === 0) {
                // Ya está en x0 (posiblemente con sufijo de tipo)
            } else {
                $this->emit("mov x0, #0");
            }

            if (isset($this->arrayInfo[$name])) {
                $offset = $this->getArrayElementOffset($name, $indices);
                $this->emit("str x0, [x29, #$offset]");
                return null;
            }

            $symbol = $this->findSymbol($name);
            if ($symbol && ($symbol['type'] ?? null) === 'pointer') {
                $baseOffset = $this->getVarOffset($name);
                $this->emitLoadFromStack('x9', $baseOffset);

                // x9 ya contiene la dirección base del arreglo.
                // No desreferenciar aquí: el parámetro es *[N]T, no **T.

                // Calcular offset basado en índices (8 bytes por elemento)
                $elementOffset = 0;
                // Primero, calcular offset fijo para índices numéricos
                foreach ($indices as $idxValue) {
                    if (is_numeric($idxValue)) {
                        $elementOffset += ((int)$idxValue) * 8;  // 8 bytes por elemento en el stack frame
                        continue;
                    }

                    $idxText = trim((string)$idxValue);

                    // Soportar expresiones simples como j+1 o j-1
                    if (preg_match('/^([a-zA-Z_][a-zA-Z0-9_]*)\s*([+-])\s*(\d+)$/', $idxText, $m)) {
                        $idxVarOffset = $this->getVarOffset($m[1]);
                        $this->emitLoadFromStack('x10', $idxVarOffset);
                        if ((int)$m[3] !== 0) {
                            $this->emit(($m[2] === '+') ? "add x10, x10, #{$m[3]}" : "sub x10, x10, #{$m[3]}");
                        }
                        $this->emit("lsl x10, x10, #3");
                        $this->emit("add x9, x9, x10");
                        continue;
                    }

                    if (preg_match('/^(\d+)\s*([+-])\s*([a-zA-Z_][a-zA-Z0-9_]*)$/', $idxText, $m)) {
                        $idxVarOffset = $this->getVarOffset($m[3]);
                        $this->emitLoadFromStack('x10', $idxVarOffset);
                        $this->emit("mov x11, #{$m[1]}");
                        if ($m[2] === '+') {
                            $this->emit("add x10, x11, x10");
                        } else {
                            $this->emit("sub x10, x11, x10");
                        }
                        $this->emit("lsl x10, x10, #3");
                        $this->emit("add x9, x9, x10");
                        continue;
                    }

                    $idxVarOffset = $this->getVarOffset($idxText);
                    $this->emitLoadFromStack('x10', $idxVarOffset);
                    $this->emit("lsl x10, x10, #3");
                    $this->emit("add x9, x9, x10");
                }
                
                $nullLabel = $this->newLabel("array_null");
                $endLabel = $this->newLabel("array_end");
                $this->emit("cmp x9, #0");
                $this->emit("b.eq $nullLabel");
                
                // Aplicar offset fijo si solo hay índices numéricos
                if ($elementOffset !== 0) {
                    $this->emit("add x9, x9, #$elementOffset");
                }
                
                $this->emit("str x0, [x9]");
                $this->emit("b $endLabel");
                $this->emitLabel($nullLabel);
                $this->emitLabel($endLabel);
                return null;
            }

            $this->addError("Variable no definida o no es un array: $name", $ctx);
            return null;
        } catch (Exception $e) {
            $this->addError($e->getMessage(), $ctx);
            return null;
        }
    }

    // Inicializar array con literal
    public function visitArrayLiteralDecl($ctx, $sizes, $baseOffset, $elementType) {
        $elements = [];
        
        for ($i = 0; $i < $ctx->getChildCount(); $i++) {
            $child = $ctx->getChild($i);
            if ($child instanceof Context\ArrayElementContext) {
                $elements[] = $child;
            }
        }
        
        $this->initArrayRecursive($elements, 0, $sizes, $baseOffset, $elementType);
    }

    private function initArrayRecursive($elements, $dim, $sizes, $baseOffset, $elementType) {
        if ($dim >= count($sizes)) return;

        $dimSize = $sizes[$dim];
        $elementSize = 8;

        for ($i = 0; $i < $dimSize && $i < count($elements); $i++) {
            $offset = $baseOffset + ($i * $elementSize);
            $element = $elements[$i];

            if ($dim + 1 < count($sizes)) {
                // Construir lista de elementos anidados y recursar
                $nested = [];
                if (method_exists($element, 'getChildCount')) {
                    for ($k = 0; $k < $element->getChildCount(); $k++) {
                        $ch = $element->getChild($k);
                        if ($ch instanceof Context\ArrayElementContext || $ch instanceof Context\ArrayLiteralContext) {
                            $nested[] = $ch;
                        }
                    }
                }
                $this->initArrayRecursive($nested, $dim + 1, $sizes, $offset, $elementType);
            } else {
                // Elemento hoja: obtener valor y almacenarlo
                $val = null;
                if (method_exists($element, 'expression')) {
                    $expr = $element->expression();
                    if (is_array($expr)) $expr = $expr[0];
                    $val = $this->getValueWithoutEmit($expr);
                } else {
                    $val = $this->getValueWithoutEmit($element);
                }
                if (is_numeric($val)) {
                    $this->emit("mov x0, #$val");
                    $this->emit("str x0, [x29, #$offset]");
                }
            }
        }
    }

    // Declaración de array (reemplazar el método visitVarDecl o agregar este)
   public function visitArrayDeclStatement($ctx) {
        $this->emit("// DEBUG: visitArrayDeclStatement called");
        $name = $ctx->IDENTIFIER()->getText();
        $this->emit("// DEBUG: Array name = $name");
        
        // Obtener dimensiones y tipo
        $sizes = [];
        $elementType = null;
        $arrayTypeCtx = $ctx->arrayType();
        
        if (!$arrayTypeCtx) {
            $this->addError("Error: No se pudo obtener arrayType", $ctx);
            return null;
        }
        
        $current = $arrayTypeCtx;
        while ($current instanceof Context\ArrayTypeContext) {
            $sizeExpr = $current->expression();
            if (!$sizeExpr) {
                $this->addError("Falta tamaño en declaración de array", $ctx);
                return null;
            }
            
            // Usar getValueWithoutEmit para obtener el valor numérico
            $size = $this->getValueWithoutEmit($sizeExpr);
            if (!is_numeric($size)) {
                $this->addError("El tamaño del array debe ser numérico, obtenido: " . json_encode($size), $ctx);
                return null;
            }
            $sizes[] = (int)$size;
            
            // Buscar siguiente nivel o tipo
            $next = null;
            for ($i = 0; $i < $current->getChildCount(); $i++) {
                $child = $current->getChild($i);
                if ($child instanceof Context\ArrayTypeContext) {
                    $next = $child;
                }
                if ($child instanceof Context\TypeContext) {
                    $elementType = $this->visit($child);
                    $this->emit("// DEBUG: elementType = $elementType");
                }
            }
            $current = $next;
        }
        
        if ($elementType === null) {
            $elementType = 'int32';
        }
        
        $this->emit("// DEBUG: sizes = " . json_encode($sizes) . ", elementType = $elementType");
        
        // Calcular tamaño total
        $totalElements = array_product($sizes);
        $totalSize = $totalElements * 8;
        $this->nextOffset -= $totalSize;
        $offset = $this->nextOffset;
        
        // Guardar metadatos
        $this->varOffsets[$name] = [
            'offset' => $offset,
            'type' => 'array',
            'elementType' => $elementType,
            'dimensions' => count($sizes),
            'sizes' => $sizes,
            'totalElements' => $totalElements
        ];
        
        $this->emit("// Array $name guardado: offset=$offset, sizes=" . json_encode($sizes));
        
        // Inicializar si hay literal
        if ($ctx->arrayLiteral()) {
            $this->emit("// DEBUG: Inicializando array con literal");
            $literal = $ctx->arrayLiteral();
            $elements = [];
            for ($i = 0; $i < $literal->getChildCount(); $i++) {
                $child = $literal->getChild($i);
                if ($child instanceof Context\ArrayElementContext ||
                    $child instanceof Context\ArrayLiteralContext) {
                    $elements[] = $child;
                }
            }
            $this->initArrayRecursive($elements, 0, $sizes, $offset, $elementType);
        }
        
        $this->addSymbol($name, 'array', $this->currentFunction, json_encode($sizes), $ctx);
        return null;
    }
    
    private function emitPrintln() {
        $this->emitPrintInteger();
        
        // Imprimir newline
        $this->emit("adrp x1, newline");
        $this->emit("add x1, x1, :lo12:newline");
        $this->emit("mov x0, #1");      // stdout (fd=1)
        $this->emit("mov x2, #1");      // tamaño = 1 byte (\n)
        $this->emit("mov x8, #64");     // syscall write
        $this->emit("svc #0");
    }
    private function getActualValue($node) {
        $oldSilent = $this->silentMode;
        $this->silentMode = true;
        $oldAssembly = $this->assembly;
        $this->assembly = [];
        
        $result = $this->visit($node);
        
        $this->assembly = $oldAssembly;
        $this->silentMode = $oldSilent;
        
        // Si es un marcador de variable, obtener el símbolo
        if (is_string($result) && strpos($result, 'var_') === 0) {
            $varName = substr($result, 4);
            $symbol = $this->findSymbol($varName);
            if ($symbol) {
                if ($symbol['type'] === 'string') {
                    return $symbol['value'];
                }
                if ($symbol['type'] === 'array') {
                    return 'array_' . $varName;
                }
                return $symbol['value'];
            }
        }
        
        return $result;
    }
    
    private function getValueWithoutEmit($node) {
        if ($node === null) {
            return null;
        }

        // Para números
        if (is_numeric($node->getText())) {
            return (strpos($node->getText(), '.') !== false) ? (float)$node->getText() : (int)$node->getText();
        }

        if ($node->getText() === 'nil') {
            return 0;
        }

        $childCount = method_exists($node, 'getChildCount') ? $node->getChildCount() : 0;
        $text = $node->getText();

        // Resolver identificadores al valor actual en la tabla de símbolos
        if ($childCount === 0 && preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $text)) {
            $symbol = $this->findSymbol($text);
            if ($symbol) {
                $symValue = $symbol['value'] ?? null;
                if (is_numeric($symValue)) {
                    return $symValue + 0;
                }
                if (is_bool($symValue)) {
                    return $symValue ? 1 : 0;
                }
                if ($symValue === 'true') return 1;
                if ($symValue === 'false') return 0;
            }
            return $text;
        }

        // Evaluación simple de expresiones compuestas
        if ($childCount === 1) {
            return $this->getValueWithoutEmit($node->getChild(0));
        }

        if ($childCount === 2) {
            $op = $node->getChild(0)->getText();
            $rhs = $this->getValueWithoutEmit($node->getChild(1));
            if (is_numeric($rhs)) {
                if ($op === '-') return -$rhs;
                if ($op === '!') return $rhs == 0 ? 1 : 0;
            }
        }

        if ($childCount === 3) {
            $left = $this->getValueWithoutEmit($node->getChild(0));
            $op = $node->getChild(1)->getText();
            $right = $this->getValueWithoutEmit($node->getChild(2));

            if (is_numeric($left) && is_numeric($right)) {
                return match ($op) {
                    '+' => $left + $right,
                    '-' => $left - $right,
                    '*' => $left * $right,
                    '/' => $right != 0 ? intdiv((int)$left, (int)$right) : 0,
                    '%' => $right != 0 ? ($left % $right) : 0,
                    '==' => ($left == $right) ? 1 : 0,
                    '!=' => ($left != $right) ? 1 : 0,
                    '<' => ($left < $right) ? 1 : 0,
                    '>' => ($left > $right) ? 1 : 0,
                    '<=' => ($left <= $right) ? 1 : 0,
                    '>=' => ($left >= $right) ? 1 : 0,
                    '&&' => ($left && $right) ? 1 : 0,
                    '||' => ($left || $right) ? 1 : 0,
                    default => null,
                };
            }
        }
        
        // Para variables
        if (preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $text)) {
            try {
                $this->getVarOffset($text);
                return 'var_' . $text;
            } catch (Exception $e) {
                return $text;
            }
        }
        
        // Para expresiones más complejas, visitar pero sin emitir (modo silencioso)
        // Guardar estado actual de assembly para evitar emitir
        $oldAssembly = $this->assembly;
        $this->assembly = [];
        
        $result = $this->visit($node);
        
        // Restaurar y descartar código generado
        $this->assembly = $oldAssembly;
        
        return $result;
    }

    private function emitValueToRegister($value, $register = 'x0') {
        if (is_bool($value)) {
            $this->emit("mov $register, #" . ($value ? 1 : 0));
            return;
        }

        if ($value === null || $value === 'nil') {
            $this->emit("mov $register, #0");
            return;
        }

        if (is_numeric($value)) {
            $this->emit("mov $register, #$value");
            return;
        }

        if (is_string($value) && strpos($value, 'var_') === 0) {
            $varName = substr($value, 4);
            $offset = $this->getVarOffset($varName);
            $this->emitLoadFromStack($register, $offset);
            return;
        }

        if (is_string($value) && strpos($value, 'x0_value') === 0) {
            if ($register !== 'x0') {
                $this->emit("mov $register, x0");
            }
            return;
        }

        if (is_string($value) && strpos($value, 'str_') === 0) {
            $this->emit("adrp x1, $value");
            $this->emit("add x1, x1, :lo12:$value");
            if ($register !== 'x1') {
                $this->emit("mov $register, x1");
            }
            return;
        }

        // Fallback seguro
        $this->emit("mov $register, #0");
    }

    private function emitLoadFromStack($register, $offset) {
        if (is_numeric($offset) && $offset >= 0 && $offset <= 32760 && ($offset % 8) === 0) {
            $this->emit("ldr $register, [x29, #$offset]");
            return;
        }

        if (is_numeric($offset) && $offset >= -256 && $offset <= 255) {
            $this->emit("ldur $register, [x29, #$offset]");
            return;
        }

        $this->emit("mov x9, #$offset");
        $this->emit("add x9, x29, x9");
        $this->emit("ldr $register, [x9]");
    }

    private function emitStoreToStack($register, $offset) {
        if (is_numeric($offset) && $offset >= 0 && $offset <= 32760 && ($offset % 8) === 0) {
            $this->emit("str $register, [x29, #$offset]");
            return;
        }

        if (is_numeric($offset) && $offset >= -256 && $offset <= 255) {
            $this->emit("stur $register, [x29, #$offset]");
            return;
        }

        $this->emit("mov x9, #$offset");
        $this->emit("add x9, x29, x9");
        $this->emit("str $register, [x9]");
    }

    private function emitPrintText($text) {
        $label = $this->addString($text);
        $this->emit("adrp x1, $label");
        $this->emit("add x1, x1, :lo12:$label");
        $this->emit("mov x0, #1");
        $this->emit("mov x2, #" . strlen($text));
        $this->emit("mov x8, #64");
        $this->emit("svc #0");
    }

    private function emitPrintBool($value) {
        $this->emitPrintText($value ? 'true' : 'false');
    }

    private function emitPrintBoolFromX0() {
        $falseLabel = $this->newLabel('bool_false');
        $endLabel = $this->newLabel('bool_end');

        $this->emit("cmp x0, #0");
        $this->emit("b.eq $falseLabel");
        $this->emitPrintText('true');
        $this->emit("b $endLabel");
        $this->emit("$falseLabel:");
        $this->emitPrintText('false');
        $this->emit("$endLabel:");
    }

    private function emitPrintNodeValue($expr, $forceNewline = false) {
        $text = trim($expr->getText());
        $symbol = null;
        $isBoolContext = false;

        if ($text === 'nil') {
            $this->emitPrintText('<nil>');
            return;
        }

        if ($text === 'nil==nil') {
            $this->emitPrintText('<nil>');
            return;
        }

        if (preg_match('/^".*"$/s', $text)) {
            $this->emitPrintText(stripcslashes(trim($text, '"')));
            return;
        }

        if ($text === 'true' || $text === 'false') {
            $this->emitPrintBool($text === 'true');
            return;
        }

        if (preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $text)) {
            $symbol = $this->findSymbol($text);
            if ($symbol) {
                if (($symbol['type'] ?? null) === 'string') {
                    $val = $symbol['value'] ?? '';
                    $this->emitPrintText(stripos((string)$val, 'str_') === 0 ? $this->getStringValueFromLabel($val) : (string)$val);
                    return;
                }
                if (($symbol['type'] ?? null) === 'float32') {
                    $this->emitPrintText((string)($symbol['value'] ?? 0.0));
                    return;
                }
                if (($symbol['type'] ?? null) === 'bool') {
                    $symbolVal = $symbol['value'] ?? false;
                    if (is_numeric($symbolVal) || is_bool($symbolVal)) {
                        $this->emitPrintBool($this->normalizeBoolValue($symbolVal) !== 0);
                    } else {
                        $offset = $this->getVarOffset($text);
                        $this->emitLoadFromStack('x0', $offset);
                        $this->emitPrintBoolFromX0();
                    }
                    return;
                }
                if (($symbol['type'] ?? null) === 'pointer' && (($symbol['value'] ?? null) === 'nil' || ($symbol['value'] ?? null) === null)) {
                    $this->emitPrintText('<nil>');
                    return;
                }
            }
        }

        $result = $this->visit($expr);

        $exprText = $expr->getText();
        $boolExpr = preg_match('/(==|!=|<=|>=|&&|\|\||<|>|!)/', $exprText) === 1;

        if (is_string($result) && strpos($result, 'str_') === 0) {
            $this->emitPrintText($this->getStringValueFromLabel($result));
            return;
        }

        if (is_bool($result)) {
            $this->emitPrintBool($result);
            return;
        }

        if (is_float($result)) {
            $this->emitPrintText((string)$result);
            return;
        }

        if ($boolExpr) {
            if (is_numeric($result)) {
                $this->emitPrintBool(((int)$result) !== 0);
            } else {
                $this->emitValueToRegister($result, 'x0');
                $this->emitPrintBoolFromX0();
            }
            return;
        }

        if (is_numeric($result)) {
            $this->emit("mov x0, #" . $result);
            $this->emitPrintInteger();
            return;
        }

        if (is_string($result) && strpos($result, 'var_') === 0) {
            $varName = substr($result, 4);
            $offset = $this->getVarOffset($varName);
            $this->emitLoadFromStack('x0', $offset);
            $this->emitPrintInteger();
            return;
        }

        if ($result === null) {
            $this->emitPrintText('<nil>');
            return;
        }

        $this->emitPrintInteger();
    }

    private function addString($str) {
        if (!isset($this->stringTable[$str])) {
            $label = "str_" . $this->labelCounter++;
            $this->stringTable[$str] = $label;
            $escaped = addcslashes($str, "\"\\\n\r\t");
            $this->dataSection[] = $label . ": .string \"" . $escaped . "\"";
        }
        return $this->stringTable[$str];
    }

    private function getStringValueFromLabel($label) {
        foreach ($this->stringTable as $text => $storedLabel) {
            if ($storedLabel === $label) {
                return $text;
            }
        }
        return '';
    }

    private function normalizeBoolValue($value) {
        if (is_bool($value)) {
            return $value ? 1 : 0;
        }
        if (is_numeric($value)) {
            return ((int)$value) !== 0 ? 1 : 0;
        }
        if (is_string($value)) {
            return in_array(strtolower($value), ['true', '1'], true) ? 1 : 0;
        }
        return 0;
    }

    private function inferTypeFromValue($value) {
        if (is_bool($value)) {
            return 'bool';
        }
        if (is_int($value)) {
            return 'int32';
        }
        if (is_float($value)) {
            return 'float32';
        }
        if (is_string($value)) {
            if ($value === 'true' || $value === 'false') {
                return 'bool';
            }
            if (strpos($value, 'str_') === 0 || strlen($value) > 1) {
                return 'string';
            }
            return 'rune';
        }
        return 'int32';
    }

    private function resolveDeclaredType($typeText) {
        $typeText = strtolower(trim($typeText));
        return match ($typeText) {
            'int32', 'int' => 'int32',
            'float32', 'float' => 'float32',
            'bool' => 'bool',
            'string' => 'string',
            'rune' => 'rune',
            default => $typeText,
        };
    }

    private function findSymbol($name) {
        for ($i = count($this->symbolTable) - 1; $i >= 0; $i--) {
            if ($this->symbolTable[$i]['identifier'] === $name) {
                return $this->symbolTable[$i];
            }
        }
        return null;
    }
    
    private function addSymbol($name, $type, $scope, $value, $ctx) {
        $this->symbolTable[] = [
            'identifier' => $name,
            'type' => $type,
            'scope' => $scope,
            'value' => $value,
            'line' => $ctx && $ctx->start ? $ctx->start->getLine() : null
        ];
    }
    
    private function addError($msg, $ctx) {
        $this->errors[] = [
            'type' => 'Semántico',
            'msg' => $msg,
            'line' => $ctx && $ctx->start ? $ctx->start->getLine() : 0
        ];
    }
    
    public function getOutput() {
        $output = [];
        $output[] = implode("\n", $this->dataSection);
        $output[] = "";
        $output[] = ".section .text";
        $output[] = "";
        $output[] = implode("\n", $this->assembly);
        return implode("\n", $output);
    }
    
    public function getSymbolTable() {
        return $this->symbolTable;
    }
    
    public function getErrors() {
        return $this->errors;
    }

    public function setDebug(bool $debug) {
        $this->silentMode = !$debug;
    }
}
?>