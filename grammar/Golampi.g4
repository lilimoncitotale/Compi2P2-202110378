grammar Golampi;

//=======================
//  Programa
//========================

program: declaration* EOF;

//=======================
//  declaraciones
//========================

declaration
    : functionDecl
    | varDecl
    | constDecl
    ;

constDecl
	: CONST IDENTIFIER type? '=' expression
    ;

functionDecl
    : FUNC IDENTIFIER '(' parameterList?')' type? block
    | FUNC IDENTIFIER '(' parameterList?')' '(' type (',' type)* ')' block
    ;

parameterList
	: parameter (',' parameter)*
	;

parameter
    : IDENTIFIER type
    ;

varDecl
    : VAR IDENTIFIER (',' IDENTIFIER)* type ('=' expression (',' expression)*)?
    | VAR IDENTIFIER arrayType ('=' arrayLiteral)?
	| IDENTIFIER arrayType ('=' arrayLiteral)?
    ;
arrayType
    : '[' expression ']' arrayType
    | '[' expression ']' type
    ;

arrayLiteral
	: arrayType? '{' arrayElement (',' arrayElement)* ','? '}'
	;

arrayElement
	: '{' arrayElement (',' arrayElement)* ','? '}'
	| expression
	;

//==================================
//	BLOQUES Y SENTENCIAS
//================================

block
	: '{' statement* '}'
	;

statement
	: varDecl
	| constDecl
	| switchStmt
	| expresionStmt
	| shortVarDecl
	| assignment
	| ifStmt
	| forStmt
	| returnStmt
	| breakStmt
	| continueStmt
	| expresionStmt
	| block
	;



shortVarDecl 
	: IDENTIFIER (',' IDENTIFIER)* ASSIGN_SHORT shortValue (',' shortValue)*
	;

shortValue
	: arrayType arrayLiteral
	| expression
	;

assignment
    : IDENTIFIER ('[' expression ']')+ '=' expression      // Array access
    | IDENTIFIER '=' expression                             // Simple assignment
    | ('*')+ IDENTIFIER '=' expression                      // Pointer assignment
	| primary (PLUSPLUS | MINUSMINUS)                       // Incremento/decremento
	| IDENTIFIER (PLUSEQ | MINUSEQ | STAREQ | SLASHEQ | MODEQ) expression  // Asignación compuesta
    ;

expresionStmt
	: expression
	;

//=====================================
//		CONTROL DE FLUJO
//====================================

ifStmt
	: IF expression block (ELSE (ifStmt | block))?
	;

forStmt
    : FOR expression? block
    | FOR shortVarDecl ';' expression ';' statement? block
    ;

returnStmt
	: RETURN (expression (',' expression)*)? 
	;

// switch/case/default
switchStmt
	: SWITCH expression? '{' switchCase* (DEFAULT ':' (block | statement+))? '}'
	;

switchCase
	: CASE expression (',' expression)* ':' (block | statement+)
	;

breakStmt
	: BREAK
	;
	
continueStmt
	: CONTINUE
	;

//===============================================
// 		EXPRESIONES (PRECEDENCIA)
//==============================================

expression
	: logicalOr
	;

logicalOr
	: logicalAnd (OR logicalAnd)*
	;

logicalAnd
	: equality (AND equality)*
	;

equality
	: comparison (('==' | '!=') comparison)*
	;

comparison
	: addition (('>' | '<' | '>=' | '<=') addition)*
	;

addition
	: multiplication (('+' | '-') multiplication)*
	;

multiplication
	: unary (('*' | '/' | '%') unary)*
	;

unary
	: ('!' | '-') unary
	| '&' unary
	| '*' unary
	| primary
	;

primary
    : INTEGER
    | FLOAT
    | STRING
    | RUNE
    | TRUE
    | FALSE
    | NIL
    | LEN '(' expression ')'
	| qualified '(' argumentList? ')'
	| type '(' argumentList? ')'
	| qualified
    | '(' expression ')'
	| qualified ('[' expression ']')*
	| primary PLUSPLUS          // Incremento postfijo
	| primary MINUSMINUS        // Decremento postfijo
    ;

qualified
	: IDENTIFIER ('.' IDENTIFIER)*
	;

argumentList
	: expression (',' expression)*
	;

//==========================================
//		Tipos
//=====================================

type
	: INT
	| FLOATTYPE
	| BOOL
	| STRINGTYPE
	| RUNETYPE
	| pointerType
	| arrayType
	;

pointerType
    : '*' type
    ;

// ============================
// 7. TOKENS
// ============================

// Palabras reservadas (deben ir antes que IDENTIFIER)
CONST 		: 'const';
FUNC        : 'func';
VAR         : 'var';
SWITCH      : 'switch';
CASE        : 'case';
DEFAULT     : 'default';
IF          : 'if';
ELSE        : 'else';
FOR         : 'for';
RETURN      : 'return';
BREAK       : 'break';
CONTINUE    : 'continue';
TRUE        : 'true';
FALSE       : 'false';
LEN         : 'len';
NIL         : 'nil';

// Tipos base
INT         : 'int32';
FLOATTYPE   : 'float32';
BOOL        : 'bool';
STRINGTYPE  : 'string';
RUNETYPE    : 'rune';  

// Literales
INTEGER     : [0-9]+;
FLOAT       : [0-9]+ '.' [0-9]+;
fragment ESC : '\\' . ;
STRING      : '"' ( ESC | ~["\\\r\n] )* '"' ;
RUNE        : '\'' ( ESC | ~['\\\r\n] ) '\'' ;  // Un solo carácter o escape entre comillas simples

// Operadores de incremento/decremento y asignación compuesta
PLUSPLUS    : '++';
MINUSMINUS  : '--';
PLUSEQ      : '+=';
MINUSEQ     : '-=';
STAREQ      : '*=';
SLASHEQ     : '/=';
MODEQ       : '%=';
// Operadores lógicos y asignación corta
AND         : '&&';
OR          : '||';
ASSIGN_SHORT: ':=';

// Identificadores (cualquier cosa que no sea palabra reservada)
IDENTIFIER  : [a-zA-Z_][a-zA-Z0-9_]*;

// Espacios y comentarios
WS          : [ \t]+ -> skip;
NL          : '\r'? '\n' -> channel(HIDDEN);
COMMENT     : '//' ~[\r\n]* -> skip;
MULTILINE_COMMENT : '/*' .*? '*/' -> skip;