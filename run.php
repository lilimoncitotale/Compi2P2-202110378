<?php
require_once __DIR__ . '/vendor/autoload.php';

use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\Error\BailErrorStrategy;
use Antlr\Antlr4\Runtime\Error\DefaultErrorStrategy;
use Antlr\Antlr4\Runtime\InputStream;
use Antlr\Antlr4\Runtime\Tree\ParseTreeWalker;

// Cargar las clases generadas
require_once __DIR__ . '/generated/GolampiLexer.php';
require_once __DIR__ . '/generated/GolampiParser.php';
require_once __DIR__ . '/generated/GolampiVisitor.php';
require_once __DIR__ . '/generated/GolampiBaseVisitor.php';

require_once __DIR__ . '/src/Enviroment.php';
require_once __DIR__ . '/src/SyntaxErrorListener.php';
require_once __DIR__ . '/src/compiler.php';  // NUEVO: compilador ARM64

// Verificar si se proporcionó un archivo
if ($argc < 2) {
    echo "Uso: php run.php <archivo>\n";
    exit(1);
}

$file = $argv[1];
if (!file_exists($file)) {
    echo "Error: Archivo '$file' no encontrado\n";
    exit(1);
}

echo "=== COMPILADOR GOLAMPI -> ARM64 ===\n";
echo "Archivo: $file\n";
echo "Tamaño: " . filesize($file) . " bytes\n";
echo "Iniciando proceso de compilación...\n";

// Leer el archivo
$input = file_get_contents($file);
echo "Archivo leído: " . strlen($input) . " caracteres\n";

// Preprocesar (mismo código que tenías - mantenerlo)
$input = (function($input){
    $lines = preg_split('/\r?\n/', $input);
    $inMultilineComment = false;
    $topLines = [];
    $otherLines = [];

    $firstFuncIdx = null;
    foreach ($lines as $i => $ln) {
        if (preg_match('/\/\*/', $ln)) $inMultilineComment = true;
        if ($inMultilineComment && preg_match('/\*\//', $ln)) { $inMultilineComment = false; }
        if (!$inMultilineComment && preg_match('/^\s*func\s+main\b/', $ln)) { $firstFuncIdx = $i; break; }
    }

    if ($firstFuncIdx === null) return $input;

    $top = array_slice($lines, 0, $firstFuncIdx);
    $rest = array_slice($lines, $firstFuncIdx);

    $move = [];
    $keepTop = [];
    $inMulti = false;
    $braceLevel = 0;
    foreach ($top as $ln) {
        $trim = ltrim($ln);
        if ($inMulti) {
            $keepTop[] = $ln;
            if (strpos($ln, '*/') !== false) $inMulti = false;
            if (strpos($ln, '{') !== false) $braceLevel += substr_count($ln, '{');
            if (strpos($ln, '}') !== false) $braceLevel -= substr_count($ln, '}');
            continue;
        }
        if (strpos($trim, '/*') === 0) { $inMulti = true; $keepTop[] = $ln; continue; }
        if ($trim === '' || strpos($trim, '//') === 0) { $keepTop[] = $ln; continue; }

        if ($braceLevel > 0) {
            $keepTop[] = $ln;
            if (strpos($ln, '{') !== false) $braceLevel += substr_count($ln, '{');
            if (strpos($ln, '}') !== false) $braceLevel -= substr_count($ln, '}');
            continue;
        }

        if (preg_match('/^\s*(var|const)\b/', $ln)) {
            if (preg_match('/^\s*var\s+([^\s].*?)\s+(\[.*\]|[A-Za-z_][A-Za-z0-9_]*(?:[0-9]*)?)\s*(?:=\s*(.*))?$/', $ln, $m)) {
                $idList = $m[1];
                $typePart = $m[2];
                $rhs = isset($m[3]) ? $m[3] : null;
                $ids = array_map('trim', explode(',', $idList));
                $exprs = $rhs !== null ? array_map('trim', explode(',', $rhs)) : [];
                foreach ($ids as $idx => $id) {
                    $expr = isset($exprs[$idx]) ? $exprs[$idx] : null;
                    if ($expr !== null && $expr !== '') {
                        $keepTop[] = "var $id $typePart = $expr";
                    } else {
                        $keepTop[] = "var $id $typePart";
                    }
                }
                if (strpos($ln, '{') !== false) $braceLevel += substr_count($ln, '{');
                if (strpos($ln, '}') !== false) $braceLevel -= substr_count($ln, '}');
                continue;
            }
            $keepTop[] = $ln; continue;
        }

        if (preg_match('/^\s*[A-Za-z_][A-Za-z0-9_]*(\s*,\s*[A-Za-z_][A-Za-z0-9_]*)*\s*(:=|=)/', $ln)) { $move[] = $ln; continue; }
        if (preg_match('/^\s*[A-Za-z_][A-Za-z0-9_]*\s*\(.*\)\s*;?\s*$/', $ln)) { $move[] = $ln; continue; }
        $keepTop[] = $ln;

        if (strpos($ln, '{') !== false) $braceLevel += substr_count($ln, '{');
        if (strpos($ln, '}') !== false) $braceLevel -= substr_count($ln, '}');
    }

    if (empty($move)) return $input;

    $mainOpenIdx = null;
    $braceIdx = null;
    for ($i = 0; $i < count($rest); $i++) {
        if (preg_match('/^\s*func\s+main\s*\(/', $rest[$i])) {
            $mainOpenIdx = $i;
            for ($j = $i; $j < count($rest); $j++) {
                if (strpos($rest[$j], '{') !== false) { $braceIdx = $j; break; }
            }
            break;
        }
    }
    if ($mainOpenIdx === null || $braceIdx === null) return $input;

    $newRest = [];
    for ($i = 0; $i < count($rest); $i++) {
        $line = $rest[$i];
        $newRest[] = $line;
        if ($i === $braceIdx) {
            foreach ($move as $m) $newRest[] = $m;
        }
    }

    $outLines = array_merge($keepTop, $newRest);

    $wrapped = [];
    $n = count($outLines);
    for ($i = 0; $i < $n; $i++) {
        $line = $outLines[$i];
        if (preg_match('/^(\s*)case\b.*:\s*$/', $line, $m)) {
            $indent = $m[1];
            $wrapped[] = rtrim($line) . ' {';
            $j = $i + 1;
            while ($j < $n) {
                $next = $outLines[$j];
                if (preg_match('/^\s*(case\b|default\b|})/', $next)) {
                    $wrapped[] = $indent . '}';
                    break;
                }
                $wrapped[] = $next;
                $j++;
            }
            if ($j >= $n) {
                $wrapped[] = $indent . '}';
                $i = $n;
            } else {
                $i = $j - 1;
            }
            continue;
        }
        $wrapped[] = $line;
    }

    $text = implode("\n", $wrapped);

    $text = preg_replace_callback('/(^\\s*case[^:]*:)([\\s\\S]*?)(?=^\\s*(?:case\\b|default\\b|\\}))/m', function($m){
        $header = rtrim($m[1]);
        preg_match('/^(\\s*)/', $m[1], $im);
        $indent = isset($im[1]) ? $im[1] : '';
        $body = $m[2];
        return $header . ' {' . $body . $indent . '}';
    }, $text);

    $text = preg_replace_callback('/(=\s*)(\[[0-9]+\](?:\[[0-9]+\])*[A-Za-z_][A-Za-z0-9_]*)\s*(\{\{+)/', function($m){
        $eq = $m[1];
        $type = $m[2];
        $braces = $m[3];
        $numBraces = strlen($braces);
        $dims = substr_count($type, '[');
        if ($numBraces <= 1 || $dims <= 1) {
            return $m[0];
        }
        $prefix = '';
        $current = $type;
        for ($i = 1; $i < $numBraces; $i++) {
            $current = preg_replace('/^\[[^\]]+\]/', '', $current, 1);
            if ($current === $type) break;
            $prefix .= $current . '{';
        }
        return $eq . $type . '{' . $prefix;
    }, $text);

    // Permitir short declaration con literal de arreglo tipado:
    // nombre := [N]tipo{...}  =>  var nombre [N]tipo = [N]tipo{...}
    $text = preg_replace_callback(
        '/^\s*([A-Za-z_][A-Za-z0-9_]*)\s*:=\s*(\[[0-9]+\](?:\[[0-9]+\])*[A-Za-z_][A-Za-z0-9_]*)\s*(\{.*\})\s*$/m',
        function($m) {
            $name = $m[1];
            $arrayType = $m[2];
            $arrayLiteral = $m[3];
            return "var {$name} {$arrayType} = {$arrayType}{$arrayLiteral}";
        },
        $text
    );

    return $text;
})($input);

// Guardar preprocesado para depuración
file_put_contents('/tmp/preprocessed_input.golampi', $input);

// Crear el stream de entrada
echo "Creando InputStream...\n";
$input = preg_replace('/\\bint\\b/', 'int32', $input);
$input = preg_replace('/\\bfloat\\b/', 'float32', $input);
$stream = InputStream::fromString($input);

// Crear el lexer
echo "Creando Lexer...\n";
$lexer = new GolampiLexer($stream);

// Crear el token stream
echo "Creando TokenStream...\n";
$tokenStream = new CommonTokenStream($lexer);

// Crear el parser
echo "Creando Parser...\n";
$parser = new GolampiParser($tokenStream);

// Usar estrategia por defecto que intenta recuperar errores
$parser->setErrorHandler(new DefaultErrorStrategy());

// Añadir listener para capturar errores sintácticos
$syntaxListener = new SyntaxErrorListener();
$parser->removeErrorListeners();
$parser->addErrorListener($syntaxListener);

// Intentar parsear
echo "Intentando parsear programa...\n";
$tree = null;
try {
    $tree = $parser->program();
    echo "Parseo completado\n";
} catch (Exception $e) {
    echo "Excepción durante parseo: " . $e->getMessage() . "\n";
}

// Si hubo errores sintácticos, reportarlos
if ($syntaxListener->hasErrors()) {
    echo "\n❌ ERRORES SINTÁCTICOS detectados:\n";
    foreach ($syntaxListener->getErrors() as $err) {
        echo sprintf("  Línea: %d, Col: %d, Msg: %s\n", $err['line'], $err['column'], $err['message']);
    }
    exit(1);
}

if ($tree === null) {
    echo "Error: No se pudo generar el árbol sintáctico\n";
    exit(1);
}

// ============================================
// NUEVO: COMPILAR A ARM64 (en lugar de interpretar)
// ============================================
echo "\n=== COMPILANDO A ARM64 ===\n";

// Crear el compilador
$compiler = new Compiler();

// Configurar debug opcional
// $compiler->setDebug(true);

// Generar código ensamblador
echo "Generando código ARM64...\n";
$assembly = $compiler->visit($tree);

// Mostrar resumen de la compilación
echo "\n--- Resumen de compilación ---\n";
$errors = $compiler->getErrors();
$symbols = $compiler->getSymbolTable();

if (!empty($errors)) {
    echo "❌ Errores semánticos:\n";
    foreach ($errors as $err) {
        echo "  [{$err['type']}] Línea {$err['line']}: {$err['msg']}\n";
    }
    exit(1);
}

echo "✅ Compilación exitosa\n";
echo "📊 Símbolos encontrados: " . count($symbols) . "\n";

// Guardar el código ensamblador
$outputFile = 'output.s';
file_put_contents($outputFile, $assembly);
echo "💾 Código ensamblador guardado en: $outputFile\n";

// Mostrar primeras líneas del ensamblador
echo "\n--- Primeras líneas del código ARM64 generado ---\n";
$assemblyLines = explode("\n", $assembly);
for ($i = 0; $i < min(20, count($assemblyLines)); $i++) {
    echo $assemblyLines[$i] . "\n";
}
if (count($assemblyLines) > 20) {
    echo "... (" . (count($assemblyLines) - 20) . " líneas más)\n";
}

// ============================================
// COMPILAR CON GCC ARM64 Y EJECUTAR CON QEMU
// ============================================
echo "\n=== COMPILANDO CON GCC ARM64 ===\n";

// Verificar que las herramientas existen
$gccPath = trim(shell_exec("which aarch64-linux-gnu-gcc 2>/dev/null"));
$qemuPath = trim(shell_exec("which qemu-aarch64 2>/dev/null"));

if (empty($gccPath)) {
    echo "⚠️  ADVERTENCIA: aarch64-linux-gnu-gcc no encontrado\n";
    echo "   Instalar con: sudo apt install gcc-aarch64-linux-gnu\n";
    echo "   Mostrando solo el código ensamblador generado\n";
    
    // Mostrar tabla de símbolos si hay
    if (!empty($symbols)) {
        echo "\n--- TABLA DE SÍMBOLOS ---\n";
        echo str_pad("Identificador", 20) . str_pad("Tipo", 12) . str_pad("Ámbito", 12) . str_pad("Valor", 15) . "Línea\n";
        echo str_repeat("-", 65) . "\n";
        foreach ($symbols as $sym) {
            echo str_pad($sym['identifier'] ?? '', 20) 
               . str_pad($sym['type'] ?? '', 12) 
               . str_pad($sym['scope'] ?? '', 12) 
               . str_pad(substr($sym['value'] ?? '', 0, 12), 15) 
               . ($sym['line'] ?? '') . "\n";
        }
    }
    exit(0);
}

if (empty($qemuPath)) {
    echo "⚠️  ADVERTENCIA: qemu-aarch64 no encontrado\n";
    echo "   Instalar con: sudo apt install qemu-user\n";
}

// Compilar el ensamblador
echo "Ensamblando con aarch64-linux-gnu-gcc...\n";
$compileCmd = "aarch64-linux-gnu-gcc -static -nostdlib $outputFile -o output 2>&1";
exec($compileCmd, $gccOutput, $gccReturnCode);

if ($gccReturnCode !== 0) {
    echo "❌ Error en la compilación con GCC:\n";
    echo implode("\n", $gccOutput) . "\n";
    exit(1);
}

echo "✅ Compilación exitosa. Ejecutable generado: output\n";

// Ejecutar con QEMU
echo "\n=== EJECUTANDO CON QEMU ===\n";
echo "--- Salida del programa ---\n";
exec("qemu-aarch64 ./output 2>&1", $programOutput, $qemuReturnCode);

if ($qemuReturnCode !== 0) {
    echo "❌ Error en la ejecución:\n";
    echo implode("\n", $programOutput) . "\n";
} else {
    echo implode("\n", $programOutput) . "\n";
}
echo "--- Fin de la salida ---\n";

// ============================================
// GENERAR REPORTES
// ============================================
echo "\n=== REPORTES ===\n";

// Guardar tabla de símbolos
if (!empty($symbols)) {
    $symbolsJson = json_encode($symbols, JSON_PRETTY_PRINT);
    file_put_contents('symbols_report.json', $symbolsJson);
    echo "📋 Tabla de símbolos guardada en: symbols_report.json\n";
    
    // Mostrar en consola
    echo "\n--- TABLA DE SÍMBOLOS ---\n";
    echo str_pad("Identificador", 20) . str_pad("Tipo", 12) . str_pad("Ámbito", 12) . str_pad("Valor", 15) . "Línea\n";
    echo str_repeat("-", 65) . "\n";
    foreach ($symbols as $sym) {
        echo str_pad($sym['identifier'] ?? '', 20) 
           . str_pad($sym['type'] ?? '', 12) 
           . str_pad($sym['scope'] ?? '', 12) 
           . str_pad(substr($sym['value'] ?? '', 0, 12), 15) 
           . ($sym['line'] ?? '') . "\n";
    }
}

// Guardar errores
if (!empty($errors)) {
    $errorsJson = json_encode($errors, JSON_PRETTY_PRINT);
    file_put_contents('errors_report.json', $errorsJson);
    echo "⚠️  Reporte de errores guardado en: errors_report.json\n";
}

echo "\n=== FIN DEL PROCESO ===\n";
echo "Archivos generados:\n";
echo "  - output.s (código ensamblador ARM64)\n";
echo "  - output (ejecutable ARM64)\n";
if (!empty($symbols)) echo "  - symbols_report.json\n";
if (!empty($errors)) echo "  - errors_report.json\n";
?>