<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../generated/GolampiLexer.php';
require_once __DIR__ . '/../generated/GolampiParser.php';
require_once __DIR__ . '/../generated/GolampiVisitor.php';
require_once __DIR__ . '/../generated/GolampiBaseVisitor.php';
require_once __DIR__ . '/../src/Enviroment.php';
require_once __DIR__ . '/../src/compiler.php';  // ← CAMBIADO: usar Compiler en lugar de Interpreter

use Antlr\Antlr4\Runtime\InputStream;
use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\Error\DefaultErrorStrategy;
require_once __DIR__ . '/../src/SyntaxErrorListener.php';

$input = json_decode(file_get_contents('php://input'), true);
$codigo = $input['codigo'] ?? '';

// Preprocesar el código (mover declaraciones top-level dentro de main)
$codigo = (function($input){
    $lines = preg_split('/\r?\n/', $input);
    $inMultilineComment = false;
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
    $braceLevel = 0;
    $inMulti = false;
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
    if (!empty($move)) {
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
        if ($mainOpenIdx !== null && $braceIdx !== null) {
            $newRest = [];
            for ($i = 0; $i < count($rest); $i++) {
                $newRest[] = $rest[$i];
                if ($i === $braceIdx) {
                    foreach ($move as $m) $newRest[] = $m;
                }
            }
            $rest = $newRest;
        }
    }
    $outLines = array_merge($keepTop, $rest);
    return implode("\n", $outLines);
})($codigo);

// Crear stream y lexer
$inputStream = InputStream::fromString($codigo);
$lexer = new GolampiLexer($inputStream);
$tokens = new CommonTokenStream($lexer);

// Tokens para reporte
$tokens->fill();
$allTokens = $tokens->getAllTokens();
$tokensList = [];
foreach ($allTokens as $t) {
    $tokensList[] = [
        'index' => $t->getTokenIndex(),
        'text' => $t->getText(),
        'type' => $t->getType(),
        'line' => $t->getLine(),
        'pos' => $t->getCharPositionInLine()
    ];
}
$tokenRows = [['Index','Text','Type','Line','Pos']];
foreach ($tokensList as $tk) {
    $tokenRows[] = [$tk['index'],$tk['text'],$tk['type'],$tk['line'],$tk['pos']];
}
$tokenLines = [];
foreach ($tokenRows as $r) {
    $escaped = array_map(function($f){
        $s = (string)$f;
        if (strpos($s, ',') !== false || strpos($s, '"') !== false || strpos($s, "\n") !== false) {
            return '"' . str_replace('"', '""', $s) . '"';
        }
        return $s;
    }, $r);
    $tokenLines[] = implode(',', $escaped);
}
$tokensCsv = implode("\n", $tokenLines);

$parser = new GolampiParser($tokens);
$parser->setErrorHandler(new DefaultErrorStrategy());
$syntaxListener = new SyntaxErrorListener();
$parser->removeErrorListeners();
$parser->addErrorListener($syntaxListener);

$tree = null;
try {
    $tree = $parser->program();
} catch (Exception $e) {
    // continuar
}

// Si hay errores sintácticos, devolverlos
if ($syntaxListener->hasErrors()) {
    $response = [
        'success' => false,
        'salida' => '',
        'syntax' => $syntaxListener->getErrors(),
        'semantic' => [],
        'tabla' => [],
        'tokens' => $tokensList,
        'tokens_csv' => $tokensCsv,
        'assembly' => '',
        'errors_csv' => ''
    ];
    
    // Generar CSV de errores
    $rows = [["Index","Type","Message","Line","Column","Offending"]];
    $i = 1;
    foreach ($response['syntax'] as $err) {
        $rows[] = [
            $i++,
            'Sintáctico',
            str_replace(["\r","\n"],[' ',' '], $err['message'] ?? ''),
            $err['line'] ?? '',
            $err['column'] ?? '',
            $err['offending'] ?? ''
        ];
    }
    $lines = [];
    foreach ($rows as $r) {
        $escaped = array_map(function($f) {
            $s = (string)$f;
            if (strpos($s, ',') !== false || strpos($s, '"') !== false || strpos($s, "\n") !== false) {
                return '"' . str_replace('"', '""', $s) . '"';
            }
            return $s;
        }, $r);
        $lines[] = implode(',', $escaped);
    }
    $response['errors_csv'] = implode("\n", $lines);
    
    echo json_encode($response);
    exit;
}

// Usar el COMPILADOR en lugar del intérprete
try {
    $compiler = new Compiler();
    $compiler->setDebug(false);
    
    // Generar código ensamblador ARM64
    $assembly = $compiler->visit($tree);
    
    // Obtener reportes
    $errors = $compiler->getErrors();
    $symbols = $compiler->getSymbolTable();
    
    $response = [
        'success' => empty($errors),
        'salida' => $assembly,  // ← El código ARM64 se muestra en la consola
        'syntax' => [],
        'semantic' => $errors,
        'tabla' => $symbols,
        'tokens' => $tokensList,
        'tokens_csv' => $tokensCsv,
        'assembly' => $assembly,
        'errors_csv' => ''
    ];
    
    // Generar CSV de errores
    $rows = [["Index","Type","Message","Line","Column","Offending"]];
    $i = 1;
    foreach ($response['semantic'] as $err) {
        $rows[] = [
            $i++,
            $err['type'] ?? 'Semántico',
            str_replace(["\r","\n"],[' ',' '], $err['msg'] ?? ''),
            $err['line'] ?? '',
            $err['col'] ?? '',
            ''
        ];
    }
    $lines = [];
    foreach ($rows as $r) {
        $escaped = array_map(function($f) {
            $s = (string)$f;
            if (strpos($s, ',') !== false || strpos($s, '"') !== false || strpos($s, "\n") !== false) {
                return '"' . str_replace('"', '""', $s) . '"';
            }
            return $s;
        }, $r);
        $lines[] = implode(',', $escaped);
    }
    $response['errors_csv'] = implode("\n", $lines);

    
    $response['assembly'] = $assembly;
    $response['salida'] = $assembly;
    
    echo json_encode($response);
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'salida' => 'Error: ' . $e->getMessage(),
        'syntax' => [],
        'semantic' => [],
        'tabla' => [],
        'tokens' => $tokensList,
        'tokens_csv' => $tokensCsv,
        'assembly' => '',
        'errors_csv' => ''
    ]);
}
?>