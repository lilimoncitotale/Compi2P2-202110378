<?php

/*
 * Generated from grammar/Golampi.g4 by ANTLR 4.13.1
 */

namespace {
	use Antlr\Antlr4\Runtime\Atn\ATN;
	use Antlr\Antlr4\Runtime\Atn\ATNDeserializer;
	use Antlr\Antlr4\Runtime\Atn\ParserATNSimulator;
	use Antlr\Antlr4\Runtime\Dfa\DFA;
	use Antlr\Antlr4\Runtime\Error\Exceptions\FailedPredicateException;
	use Antlr\Antlr4\Runtime\Error\Exceptions\NoViableAltException;
	use Antlr\Antlr4\Runtime\PredictionContexts\PredictionContextCache;
	use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
	use Antlr\Antlr4\Runtime\RuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\TokenStream;
	use Antlr\Antlr4\Runtime\Vocabulary;
	use Antlr\Antlr4\Runtime\VocabularyImpl;
	use Antlr\Antlr4\Runtime\RuntimeMetaData;
	use Antlr\Antlr4\Runtime\Parser;

	final class GolampiParser extends Parser
	{
		public const T__0 = 1, T__1 = 2, T__2 = 3, T__3 = 4, T__4 = 5, T__5 = 6, 
               T__6 = 7, T__7 = 8, T__8 = 9, T__9 = 10, T__10 = 11, T__11 = 12, 
               T__12 = 13, T__13 = 14, T__14 = 15, T__15 = 16, T__16 = 17, 
               T__17 = 18, T__18 = 19, T__19 = 20, T__20 = 21, T__21 = 22, 
               T__22 = 23, T__23 = 24, CONST = 25, FUNC = 26, VAR = 27, 
               SWITCH = 28, CASE = 29, DEFAULT = 30, IF = 31, ELSE = 32, 
               FOR = 33, RETURN = 34, BREAK = 35, CONTINUE = 36, TRUE = 37, 
               FALSE = 38, LEN = 39, NIL = 40, INT = 41, FLOATTYPE = 42, 
               BOOL = 43, STRINGTYPE = 44, RUNETYPE = 45, INTEGER = 46, 
               FLOAT = 47, STRING = 48, RUNE = 49, PLUSPLUS = 50, MINUSMINUS = 51, 
               PLUSEQ = 52, MINUSEQ = 53, STAREQ = 54, SLASHEQ = 55, MODEQ = 56, 
               AND = 57, OR = 58, ASSIGN_SHORT = 59, IDENTIFIER = 60, WS = 61, 
               NL = 62, COMMENT = 63, MULTILINE_COMMENT = 64;

		public const RULE_program = 0, RULE_declaration = 1, RULE_constDecl = 2, 
               RULE_functionDecl = 3, RULE_parameterList = 4, RULE_parameter = 5, 
               RULE_varDecl = 6, RULE_arrayType = 7, RULE_arrayLiteral = 8, 
               RULE_arrayElement = 9, RULE_block = 10, RULE_statement = 11, 
               RULE_shortVarDecl = 12, RULE_shortValue = 13, RULE_assignment = 14, 
               RULE_expresionStmt = 15, RULE_ifStmt = 16, RULE_forStmt = 17, 
               RULE_returnStmt = 18, RULE_switchStmt = 19, RULE_switchCase = 20, 
               RULE_breakStmt = 21, RULE_continueStmt = 22, RULE_expression = 23, 
               RULE_logicalOr = 24, RULE_logicalAnd = 25, RULE_equality = 26, 
               RULE_comparison = 27, RULE_addition = 28, RULE_multiplication = 29, 
               RULE_unary = 30, RULE_primary = 31, RULE_qualified = 32, 
               RULE_argumentList = 33, RULE_type = 34, RULE_pointerType = 35;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'program', 'declaration', 'constDecl', 'functionDecl', 'parameterList', 
			'parameter', 'varDecl', 'arrayType', 'arrayLiteral', 'arrayElement', 
			'block', 'statement', 'shortVarDecl', 'shortValue', 'assignment', 'expresionStmt', 
			'ifStmt', 'forStmt', 'returnStmt', 'switchStmt', 'switchCase', 'breakStmt', 
			'continueStmt', 'expression', 'logicalOr', 'logicalAnd', 'equality', 
			'comparison', 'addition', 'multiplication', 'unary', 'primary', 'qualified', 
			'argumentList', 'type', 'pointerType'
		];

		/**
		 * @var array<string|null>
		 */
		private const LITERAL_NAMES = [
		    null, "'='", "'('", "')'", "','", "'['", "']'", "'{'", "'}'", "'*'", 
		    "';'", "':'", "'=='", "'!='", "'>'", "'<'", "'>='", "'<='", "'+'", 
		    "'-'", "'/'", "'%'", "'!'", "'&'", "'.'", "'const'", "'func'", "'var'", 
		    "'switch'", "'case'", "'default'", "'if'", "'else'", "'for'", "'return'", 
		    "'break'", "'continue'", "'true'", "'false'", "'len'", "'nil'", "'int32'", 
		    "'float32'", "'bool'", "'string'", "'rune'", null, null, null, null, 
		    "'++'", "'--'", "'+='", "'-='", "'*='", "'/='", "'%='", "'&&'", "'||'", 
		    "':='"
		];

		/**
		 * @var array<string>
		 */
		private const SYMBOLIC_NAMES = [
		    null, null, null, null, null, null, null, null, null, null, null, 
		    null, null, null, null, null, null, null, null, null, null, null, 
		    null, null, null, "CONST", "FUNC", "VAR", "SWITCH", "CASE", "DEFAULT", 
		    "IF", "ELSE", "FOR", "RETURN", "BREAK", "CONTINUE", "TRUE", "FALSE", 
		    "LEN", "NIL", "INT", "FLOATTYPE", "BOOL", "STRINGTYPE", "RUNETYPE", 
		    "INTEGER", "FLOAT", "STRING", "RUNE", "PLUSPLUS", "MINUSMINUS", "PLUSEQ", 
		    "MINUSEQ", "STAREQ", "SLASHEQ", "MODEQ", "AND", "OR", "ASSIGN_SHORT", 
		    "IDENTIFIER", "WS", "NL", "COMMENT", "MULTILINE_COMMENT"
		];

		private const SERIALIZED_ATN =
			[4, 1, 64, 524, 2, 0, 7, 0, 2, 1, 7, 1, 2, 2, 7, 2, 2, 3, 7, 3, 2, 4, 
		    7, 4, 2, 5, 7, 5, 2, 6, 7, 6, 2, 7, 7, 7, 2, 8, 7, 8, 2, 9, 7, 9, 
		    2, 10, 7, 10, 2, 11, 7, 11, 2, 12, 7, 12, 2, 13, 7, 13, 2, 14, 7, 
		    14, 2, 15, 7, 15, 2, 16, 7, 16, 2, 17, 7, 17, 2, 18, 7, 18, 2, 19, 
		    7, 19, 2, 20, 7, 20, 2, 21, 7, 21, 2, 22, 7, 22, 2, 23, 7, 23, 2, 
		    24, 7, 24, 2, 25, 7, 25, 2, 26, 7, 26, 2, 27, 7, 27, 2, 28, 7, 28, 
		    2, 29, 7, 29, 2, 30, 7, 30, 2, 31, 7, 31, 2, 32, 7, 32, 2, 33, 7, 
		    33, 2, 34, 7, 34, 2, 35, 7, 35, 1, 0, 5, 0, 74, 8, 0, 10, 0, 12, 0, 
		    77, 9, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 3, 1, 84, 8, 1, 1, 2, 1, 2, 
		    1, 2, 3, 2, 89, 8, 2, 1, 2, 1, 2, 1, 2, 1, 3, 1, 3, 1, 3, 1, 3, 3, 
		    3, 98, 8, 3, 1, 3, 1, 3, 3, 3, 102, 8, 3, 1, 3, 1, 3, 1, 3, 1, 3, 
		    1, 3, 3, 3, 109, 8, 3, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 5, 3, 116, 8, 
		    3, 10, 3, 12, 3, 119, 9, 3, 1, 3, 1, 3, 1, 3, 3, 3, 124, 8, 3, 1, 
		    4, 1, 4, 1, 4, 5, 4, 129, 8, 4, 10, 4, 12, 4, 132, 9, 4, 1, 5, 1, 
		    5, 1, 5, 1, 6, 1, 6, 1, 6, 1, 6, 5, 6, 141, 8, 6, 10, 6, 12, 6, 144, 
		    9, 6, 1, 6, 1, 6, 1, 6, 1, 6, 1, 6, 5, 6, 151, 8, 6, 10, 6, 12, 6, 
		    154, 9, 6, 3, 6, 156, 8, 6, 1, 6, 1, 6, 1, 6, 1, 6, 1, 6, 3, 6, 163, 
		    8, 6, 1, 6, 1, 6, 1, 6, 1, 6, 3, 6, 169, 8, 6, 3, 6, 171, 8, 6, 1, 
		    7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 3, 7, 183, 
		    8, 7, 1, 8, 3, 8, 186, 8, 8, 1, 8, 1, 8, 1, 8, 1, 8, 5, 8, 192, 8, 
		    8, 10, 8, 12, 8, 195, 9, 8, 1, 8, 3, 8, 198, 8, 8, 1, 8, 1, 8, 1, 
		    9, 1, 9, 1, 9, 1, 9, 5, 9, 206, 8, 9, 10, 9, 12, 9, 209, 9, 9, 1, 
		    9, 3, 9, 212, 8, 9, 1, 9, 1, 9, 1, 9, 3, 9, 217, 8, 9, 1, 10, 1, 10, 
		    5, 10, 221, 8, 10, 10, 10, 12, 10, 224, 9, 10, 1, 10, 1, 10, 1, 11, 
		    1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 
		    11, 1, 11, 1, 11, 3, 11, 241, 8, 11, 1, 12, 1, 12, 1, 12, 5, 12, 246, 
		    8, 12, 10, 12, 12, 12, 249, 9, 12, 1, 12, 1, 12, 1, 12, 1, 12, 5, 
		    12, 255, 8, 12, 10, 12, 12, 12, 258, 9, 12, 1, 13, 1, 13, 1, 13, 1, 
		    13, 3, 13, 264, 8, 13, 1, 14, 1, 14, 1, 14, 1, 14, 1, 14, 4, 14, 271, 
		    8, 14, 11, 14, 12, 14, 272, 1, 14, 1, 14, 1, 14, 1, 14, 1, 14, 1, 
		    14, 1, 14, 4, 14, 282, 8, 14, 11, 14, 12, 14, 283, 1, 14, 1, 14, 1, 
		    14, 1, 14, 1, 14, 1, 14, 1, 14, 1, 14, 1, 14, 3, 14, 295, 8, 14, 1, 
		    15, 1, 15, 1, 16, 1, 16, 1, 16, 1, 16, 1, 16, 1, 16, 3, 16, 305, 8, 
		    16, 3, 16, 307, 8, 16, 1, 17, 1, 17, 3, 17, 311, 8, 17, 1, 17, 1, 
		    17, 1, 17, 1, 17, 1, 17, 1, 17, 1, 17, 3, 17, 320, 8, 17, 1, 17, 1, 
		    17, 3, 17, 324, 8, 17, 1, 18, 1, 18, 1, 18, 1, 18, 5, 18, 330, 8, 
		    18, 10, 18, 12, 18, 333, 9, 18, 3, 18, 335, 8, 18, 1, 19, 1, 19, 3, 
		    19, 339, 8, 19, 1, 19, 1, 19, 5, 19, 343, 8, 19, 10, 19, 12, 19, 346, 
		    9, 19, 1, 19, 1, 19, 1, 19, 1, 19, 4, 19, 352, 8, 19, 11, 19, 12, 
		    19, 353, 3, 19, 356, 8, 19, 3, 19, 358, 8, 19, 1, 19, 1, 19, 1, 20, 
		    1, 20, 1, 20, 1, 20, 5, 20, 366, 8, 20, 10, 20, 12, 20, 369, 9, 20, 
		    1, 20, 1, 20, 1, 20, 4, 20, 374, 8, 20, 11, 20, 12, 20, 375, 3, 20, 
		    378, 8, 20, 1, 21, 1, 21, 1, 22, 1, 22, 1, 23, 1, 23, 1, 24, 1, 24, 
		    1, 24, 5, 24, 389, 8, 24, 10, 24, 12, 24, 392, 9, 24, 1, 25, 1, 25, 
		    1, 25, 5, 25, 397, 8, 25, 10, 25, 12, 25, 400, 9, 25, 1, 26, 1, 26, 
		    1, 26, 5, 26, 405, 8, 26, 10, 26, 12, 26, 408, 9, 26, 1, 27, 1, 27, 
		    1, 27, 5, 27, 413, 8, 27, 10, 27, 12, 27, 416, 9, 27, 1, 28, 1, 28, 
		    1, 28, 5, 28, 421, 8, 28, 10, 28, 12, 28, 424, 9, 28, 1, 29, 1, 29, 
		    1, 29, 5, 29, 429, 8, 29, 10, 29, 12, 29, 432, 9, 29, 1, 30, 1, 30, 
		    1, 30, 1, 30, 1, 30, 1, 30, 1, 30, 3, 30, 441, 8, 30, 1, 31, 1, 31, 
		    1, 31, 1, 31, 1, 31, 1, 31, 1, 31, 1, 31, 1, 31, 1, 31, 1, 31, 1, 
		    31, 1, 31, 1, 31, 1, 31, 1, 31, 3, 31, 459, 8, 31, 1, 31, 1, 31, 1, 
		    31, 1, 31, 1, 31, 3, 31, 466, 8, 31, 1, 31, 1, 31, 1, 31, 1, 31, 1, 
		    31, 1, 31, 1, 31, 1, 31, 1, 31, 1, 31, 1, 31, 1, 31, 5, 31, 480, 8, 
		    31, 10, 31, 12, 31, 483, 9, 31, 3, 31, 485, 8, 31, 1, 31, 1, 31, 1, 
		    31, 1, 31, 5, 31, 491, 8, 31, 10, 31, 12, 31, 494, 9, 31, 1, 32, 1, 
		    32, 1, 32, 5, 32, 499, 8, 32, 10, 32, 12, 32, 502, 9, 32, 1, 33, 1, 
		    33, 1, 33, 5, 33, 507, 8, 33, 10, 33, 12, 33, 510, 9, 33, 1, 34, 1, 
		    34, 1, 34, 1, 34, 1, 34, 1, 34, 1, 34, 3, 34, 519, 8, 34, 1, 35, 1, 
		    35, 1, 35, 1, 35, 0, 1, 62, 36, 0, 2, 4, 6, 8, 10, 12, 14, 16, 18, 
		    20, 22, 24, 26, 28, 30, 32, 34, 36, 38, 40, 42, 44, 46, 48, 50, 52, 
		    54, 56, 58, 60, 62, 64, 66, 68, 70, 0, 7, 1, 0, 50, 51, 1, 0, 52, 
		    56, 1, 0, 12, 13, 1, 0, 14, 17, 1, 0, 18, 19, 2, 0, 9, 9, 20, 21, 
		    2, 0, 19, 19, 22, 22, 582, 0, 75, 1, 0, 0, 0, 2, 83, 1, 0, 0, 0, 4, 
		    85, 1, 0, 0, 0, 6, 123, 1, 0, 0, 0, 8, 125, 1, 0, 0, 0, 10, 133, 1, 
		    0, 0, 0, 12, 170, 1, 0, 0, 0, 14, 182, 1, 0, 0, 0, 16, 185, 1, 0, 
		    0, 0, 18, 216, 1, 0, 0, 0, 20, 218, 1, 0, 0, 0, 22, 240, 1, 0, 0, 
		    0, 24, 242, 1, 0, 0, 0, 26, 263, 1, 0, 0, 0, 28, 294, 1, 0, 0, 0, 
		    30, 296, 1, 0, 0, 0, 32, 298, 1, 0, 0, 0, 34, 323, 1, 0, 0, 0, 36, 
		    325, 1, 0, 0, 0, 38, 336, 1, 0, 0, 0, 40, 361, 1, 0, 0, 0, 42, 379, 
		    1, 0, 0, 0, 44, 381, 1, 0, 0, 0, 46, 383, 1, 0, 0, 0, 48, 385, 1, 
		    0, 0, 0, 50, 393, 1, 0, 0, 0, 52, 401, 1, 0, 0, 0, 54, 409, 1, 0, 
		    0, 0, 56, 417, 1, 0, 0, 0, 58, 425, 1, 0, 0, 0, 60, 440, 1, 0, 0, 
		    0, 62, 484, 1, 0, 0, 0, 64, 495, 1, 0, 0, 0, 66, 503, 1, 0, 0, 0, 
		    68, 518, 1, 0, 0, 0, 70, 520, 1, 0, 0, 0, 72, 74, 3, 2, 1, 0, 73, 
		    72, 1, 0, 0, 0, 74, 77, 1, 0, 0, 0, 75, 73, 1, 0, 0, 0, 75, 76, 1, 
		    0, 0, 0, 76, 78, 1, 0, 0, 0, 77, 75, 1, 0, 0, 0, 78, 79, 5, 0, 0, 
		    1, 79, 1, 1, 0, 0, 0, 80, 84, 3, 6, 3, 0, 81, 84, 3, 12, 6, 0, 82, 
		    84, 3, 4, 2, 0, 83, 80, 1, 0, 0, 0, 83, 81, 1, 0, 0, 0, 83, 82, 1, 
		    0, 0, 0, 84, 3, 1, 0, 0, 0, 85, 86, 5, 25, 0, 0, 86, 88, 5, 60, 0, 
		    0, 87, 89, 3, 68, 34, 0, 88, 87, 1, 0, 0, 0, 88, 89, 1, 0, 0, 0, 89, 
		    90, 1, 0, 0, 0, 90, 91, 5, 1, 0, 0, 91, 92, 3, 46, 23, 0, 92, 5, 1, 
		    0, 0, 0, 93, 94, 5, 26, 0, 0, 94, 95, 5, 60, 0, 0, 95, 97, 5, 2, 0, 
		    0, 96, 98, 3, 8, 4, 0, 97, 96, 1, 0, 0, 0, 97, 98, 1, 0, 0, 0, 98, 
		    99, 1, 0, 0, 0, 99, 101, 5, 3, 0, 0, 100, 102, 3, 68, 34, 0, 101, 
		    100, 1, 0, 0, 0, 101, 102, 1, 0, 0, 0, 102, 103, 1, 0, 0, 0, 103, 
		    124, 3, 20, 10, 0, 104, 105, 5, 26, 0, 0, 105, 106, 5, 60, 0, 0, 106, 
		    108, 5, 2, 0, 0, 107, 109, 3, 8, 4, 0, 108, 107, 1, 0, 0, 0, 108, 
		    109, 1, 0, 0, 0, 109, 110, 1, 0, 0, 0, 110, 111, 5, 3, 0, 0, 111, 
		    112, 5, 2, 0, 0, 112, 117, 3, 68, 34, 0, 113, 114, 5, 4, 0, 0, 114, 
		    116, 3, 68, 34, 0, 115, 113, 1, 0, 0, 0, 116, 119, 1, 0, 0, 0, 117, 
		    115, 1, 0, 0, 0, 117, 118, 1, 0, 0, 0, 118, 120, 1, 0, 0, 0, 119, 
		    117, 1, 0, 0, 0, 120, 121, 5, 3, 0, 0, 121, 122, 3, 20, 10, 0, 122, 
		    124, 1, 0, 0, 0, 123, 93, 1, 0, 0, 0, 123, 104, 1, 0, 0, 0, 124, 7, 
		    1, 0, 0, 0, 125, 130, 3, 10, 5, 0, 126, 127, 5, 4, 0, 0, 127, 129, 
		    3, 10, 5, 0, 128, 126, 1, 0, 0, 0, 129, 132, 1, 0, 0, 0, 130, 128, 
		    1, 0, 0, 0, 130, 131, 1, 0, 0, 0, 131, 9, 1, 0, 0, 0, 132, 130, 1, 
		    0, 0, 0, 133, 134, 5, 60, 0, 0, 134, 135, 3, 68, 34, 0, 135, 11, 1, 
		    0, 0, 0, 136, 137, 5, 27, 0, 0, 137, 142, 5, 60, 0, 0, 138, 139, 5, 
		    4, 0, 0, 139, 141, 5, 60, 0, 0, 140, 138, 1, 0, 0, 0, 141, 144, 1, 
		    0, 0, 0, 142, 140, 1, 0, 0, 0, 142, 143, 1, 0, 0, 0, 143, 145, 1, 
		    0, 0, 0, 144, 142, 1, 0, 0, 0, 145, 155, 3, 68, 34, 0, 146, 147, 5, 
		    1, 0, 0, 147, 152, 3, 46, 23, 0, 148, 149, 5, 4, 0, 0, 149, 151, 3, 
		    46, 23, 0, 150, 148, 1, 0, 0, 0, 151, 154, 1, 0, 0, 0, 152, 150, 1, 
		    0, 0, 0, 152, 153, 1, 0, 0, 0, 153, 156, 1, 0, 0, 0, 154, 152, 1, 
		    0, 0, 0, 155, 146, 1, 0, 0, 0, 155, 156, 1, 0, 0, 0, 156, 171, 1, 
		    0, 0, 0, 157, 158, 5, 27, 0, 0, 158, 159, 5, 60, 0, 0, 159, 162, 3, 
		    14, 7, 0, 160, 161, 5, 1, 0, 0, 161, 163, 3, 16, 8, 0, 162, 160, 1, 
		    0, 0, 0, 162, 163, 1, 0, 0, 0, 163, 171, 1, 0, 0, 0, 164, 165, 5, 
		    60, 0, 0, 165, 168, 3, 14, 7, 0, 166, 167, 5, 1, 0, 0, 167, 169, 3, 
		    16, 8, 0, 168, 166, 1, 0, 0, 0, 168, 169, 1, 0, 0, 0, 169, 171, 1, 
		    0, 0, 0, 170, 136, 1, 0, 0, 0, 170, 157, 1, 0, 0, 0, 170, 164, 1, 
		    0, 0, 0, 171, 13, 1, 0, 0, 0, 172, 173, 5, 5, 0, 0, 173, 174, 3, 46, 
		    23, 0, 174, 175, 5, 6, 0, 0, 175, 176, 3, 14, 7, 0, 176, 183, 1, 0, 
		    0, 0, 177, 178, 5, 5, 0, 0, 178, 179, 3, 46, 23, 0, 179, 180, 5, 6, 
		    0, 0, 180, 181, 3, 68, 34, 0, 181, 183, 1, 0, 0, 0, 182, 172, 1, 0, 
		    0, 0, 182, 177, 1, 0, 0, 0, 183, 15, 1, 0, 0, 0, 184, 186, 3, 14, 
		    7, 0, 185, 184, 1, 0, 0, 0, 185, 186, 1, 0, 0, 0, 186, 187, 1, 0, 
		    0, 0, 187, 188, 5, 7, 0, 0, 188, 193, 3, 18, 9, 0, 189, 190, 5, 4, 
		    0, 0, 190, 192, 3, 18, 9, 0, 191, 189, 1, 0, 0, 0, 192, 195, 1, 0, 
		    0, 0, 193, 191, 1, 0, 0, 0, 193, 194, 1, 0, 0, 0, 194, 197, 1, 0, 
		    0, 0, 195, 193, 1, 0, 0, 0, 196, 198, 5, 4, 0, 0, 197, 196, 1, 0, 
		    0, 0, 197, 198, 1, 0, 0, 0, 198, 199, 1, 0, 0, 0, 199, 200, 5, 8, 
		    0, 0, 200, 17, 1, 0, 0, 0, 201, 202, 5, 7, 0, 0, 202, 207, 3, 18, 
		    9, 0, 203, 204, 5, 4, 0, 0, 204, 206, 3, 18, 9, 0, 205, 203, 1, 0, 
		    0, 0, 206, 209, 1, 0, 0, 0, 207, 205, 1, 0, 0, 0, 207, 208, 1, 0, 
		    0, 0, 208, 211, 1, 0, 0, 0, 209, 207, 1, 0, 0, 0, 210, 212, 5, 4, 
		    0, 0, 211, 210, 1, 0, 0, 0, 211, 212, 1, 0, 0, 0, 212, 213, 1, 0, 
		    0, 0, 213, 214, 5, 8, 0, 0, 214, 217, 1, 0, 0, 0, 215, 217, 3, 46, 
		    23, 0, 216, 201, 1, 0, 0, 0, 216, 215, 1, 0, 0, 0, 217, 19, 1, 0, 
		    0, 0, 218, 222, 5, 7, 0, 0, 219, 221, 3, 22, 11, 0, 220, 219, 1, 0, 
		    0, 0, 221, 224, 1, 0, 0, 0, 222, 220, 1, 0, 0, 0, 222, 223, 1, 0, 
		    0, 0, 223, 225, 1, 0, 0, 0, 224, 222, 1, 0, 0, 0, 225, 226, 5, 8, 
		    0, 0, 226, 21, 1, 0, 0, 0, 227, 241, 3, 12, 6, 0, 228, 241, 3, 4, 
		    2, 0, 229, 241, 3, 38, 19, 0, 230, 241, 3, 30, 15, 0, 231, 241, 3, 
		    24, 12, 0, 232, 241, 3, 28, 14, 0, 233, 241, 3, 32, 16, 0, 234, 241, 
		    3, 34, 17, 0, 235, 241, 3, 36, 18, 0, 236, 241, 3, 42, 21, 0, 237, 
		    241, 3, 44, 22, 0, 238, 241, 3, 30, 15, 0, 239, 241, 3, 20, 10, 0, 
		    240, 227, 1, 0, 0, 0, 240, 228, 1, 0, 0, 0, 240, 229, 1, 0, 0, 0, 
		    240, 230, 1, 0, 0, 0, 240, 231, 1, 0, 0, 0, 240, 232, 1, 0, 0, 0, 
		    240, 233, 1, 0, 0, 0, 240, 234, 1, 0, 0, 0, 240, 235, 1, 0, 0, 0, 
		    240, 236, 1, 0, 0, 0, 240, 237, 1, 0, 0, 0, 240, 238, 1, 0, 0, 0, 
		    240, 239, 1, 0, 0, 0, 241, 23, 1, 0, 0, 0, 242, 247, 5, 60, 0, 0, 
		    243, 244, 5, 4, 0, 0, 244, 246, 5, 60, 0, 0, 245, 243, 1, 0, 0, 0, 
		    246, 249, 1, 0, 0, 0, 247, 245, 1, 0, 0, 0, 247, 248, 1, 0, 0, 0, 
		    248, 250, 1, 0, 0, 0, 249, 247, 1, 0, 0, 0, 250, 251, 5, 59, 0, 0, 
		    251, 256, 3, 26, 13, 0, 252, 253, 5, 4, 0, 0, 253, 255, 3, 26, 13, 
		    0, 254, 252, 1, 0, 0, 0, 255, 258, 1, 0, 0, 0, 256, 254, 1, 0, 0, 
		    0, 256, 257, 1, 0, 0, 0, 257, 25, 1, 0, 0, 0, 258, 256, 1, 0, 0, 0, 
		    259, 260, 3, 14, 7, 0, 260, 261, 3, 16, 8, 0, 261, 264, 1, 0, 0, 0, 
		    262, 264, 3, 46, 23, 0, 263, 259, 1, 0, 0, 0, 263, 262, 1, 0, 0, 0, 
		    264, 27, 1, 0, 0, 0, 265, 270, 5, 60, 0, 0, 266, 267, 5, 5, 0, 0, 
		    267, 268, 3, 46, 23, 0, 268, 269, 5, 6, 0, 0, 269, 271, 1, 0, 0, 0, 
		    270, 266, 1, 0, 0, 0, 271, 272, 1, 0, 0, 0, 272, 270, 1, 0, 0, 0, 
		    272, 273, 1, 0, 0, 0, 273, 274, 1, 0, 0, 0, 274, 275, 5, 1, 0, 0, 
		    275, 276, 3, 46, 23, 0, 276, 295, 1, 0, 0, 0, 277, 278, 5, 60, 0, 
		    0, 278, 279, 5, 1, 0, 0, 279, 295, 3, 46, 23, 0, 280, 282, 5, 9, 0, 
		    0, 281, 280, 1, 0, 0, 0, 282, 283, 1, 0, 0, 0, 283, 281, 1, 0, 0, 
		    0, 283, 284, 1, 0, 0, 0, 284, 285, 1, 0, 0, 0, 285, 286, 5, 60, 0, 
		    0, 286, 287, 5, 1, 0, 0, 287, 295, 3, 46, 23, 0, 288, 289, 3, 62, 
		    31, 0, 289, 290, 7, 0, 0, 0, 290, 295, 1, 0, 0, 0, 291, 292, 5, 60, 
		    0, 0, 292, 293, 7, 1, 0, 0, 293, 295, 3, 46, 23, 0, 294, 265, 1, 0, 
		    0, 0, 294, 277, 1, 0, 0, 0, 294, 281, 1, 0, 0, 0, 294, 288, 1, 0, 
		    0, 0, 294, 291, 1, 0, 0, 0, 295, 29, 1, 0, 0, 0, 296, 297, 3, 46, 
		    23, 0, 297, 31, 1, 0, 0, 0, 298, 299, 5, 31, 0, 0, 299, 300, 3, 46, 
		    23, 0, 300, 306, 3, 20, 10, 0, 301, 304, 5, 32, 0, 0, 302, 305, 3, 
		    32, 16, 0, 303, 305, 3, 20, 10, 0, 304, 302, 1, 0, 0, 0, 304, 303, 
		    1, 0, 0, 0, 305, 307, 1, 0, 0, 0, 306, 301, 1, 0, 0, 0, 306, 307, 
		    1, 0, 0, 0, 307, 33, 1, 0, 0, 0, 308, 310, 5, 33, 0, 0, 309, 311, 
		    3, 46, 23, 0, 310, 309, 1, 0, 0, 0, 310, 311, 1, 0, 0, 0, 311, 312, 
		    1, 0, 0, 0, 312, 324, 3, 20, 10, 0, 313, 314, 5, 33, 0, 0, 314, 315, 
		    3, 24, 12, 0, 315, 316, 5, 10, 0, 0, 316, 317, 3, 46, 23, 0, 317, 
		    319, 5, 10, 0, 0, 318, 320, 3, 22, 11, 0, 319, 318, 1, 0, 0, 0, 319, 
		    320, 1, 0, 0, 0, 320, 321, 1, 0, 0, 0, 321, 322, 3, 20, 10, 0, 322, 
		    324, 1, 0, 0, 0, 323, 308, 1, 0, 0, 0, 323, 313, 1, 0, 0, 0, 324, 
		    35, 1, 0, 0, 0, 325, 334, 5, 34, 0, 0, 326, 331, 3, 46, 23, 0, 327, 
		    328, 5, 4, 0, 0, 328, 330, 3, 46, 23, 0, 329, 327, 1, 0, 0, 0, 330, 
		    333, 1, 0, 0, 0, 331, 329, 1, 0, 0, 0, 331, 332, 1, 0, 0, 0, 332, 
		    335, 1, 0, 0, 0, 333, 331, 1, 0, 0, 0, 334, 326, 1, 0, 0, 0, 334, 
		    335, 1, 0, 0, 0, 335, 37, 1, 0, 0, 0, 336, 338, 5, 28, 0, 0, 337, 
		    339, 3, 46, 23, 0, 338, 337, 1, 0, 0, 0, 338, 339, 1, 0, 0, 0, 339, 
		    340, 1, 0, 0, 0, 340, 344, 5, 7, 0, 0, 341, 343, 3, 40, 20, 0, 342, 
		    341, 1, 0, 0, 0, 343, 346, 1, 0, 0, 0, 344, 342, 1, 0, 0, 0, 344, 
		    345, 1, 0, 0, 0, 345, 357, 1, 0, 0, 0, 346, 344, 1, 0, 0, 0, 347, 
		    348, 5, 30, 0, 0, 348, 355, 5, 11, 0, 0, 349, 356, 3, 20, 10, 0, 350, 
		    352, 3, 22, 11, 0, 351, 350, 1, 0, 0, 0, 352, 353, 1, 0, 0, 0, 353, 
		    351, 1, 0, 0, 0, 353, 354, 1, 0, 0, 0, 354, 356, 1, 0, 0, 0, 355, 
		    349, 1, 0, 0, 0, 355, 351, 1, 0, 0, 0, 356, 358, 1, 0, 0, 0, 357, 
		    347, 1, 0, 0, 0, 357, 358, 1, 0, 0, 0, 358, 359, 1, 0, 0, 0, 359, 
		    360, 5, 8, 0, 0, 360, 39, 1, 0, 0, 0, 361, 362, 5, 29, 0, 0, 362, 
		    367, 3, 46, 23, 0, 363, 364, 5, 4, 0, 0, 364, 366, 3, 46, 23, 0, 365, 
		    363, 1, 0, 0, 0, 366, 369, 1, 0, 0, 0, 367, 365, 1, 0, 0, 0, 367, 
		    368, 1, 0, 0, 0, 368, 370, 1, 0, 0, 0, 369, 367, 1, 0, 0, 0, 370, 
		    377, 5, 11, 0, 0, 371, 378, 3, 20, 10, 0, 372, 374, 3, 22, 11, 0, 
		    373, 372, 1, 0, 0, 0, 374, 375, 1, 0, 0, 0, 375, 373, 1, 0, 0, 0, 
		    375, 376, 1, 0, 0, 0, 376, 378, 1, 0, 0, 0, 377, 371, 1, 0, 0, 0, 
		    377, 373, 1, 0, 0, 0, 378, 41, 1, 0, 0, 0, 379, 380, 5, 35, 0, 0, 
		    380, 43, 1, 0, 0, 0, 381, 382, 5, 36, 0, 0, 382, 45, 1, 0, 0, 0, 383, 
		    384, 3, 48, 24, 0, 384, 47, 1, 0, 0, 0, 385, 390, 3, 50, 25, 0, 386, 
		    387, 5, 58, 0, 0, 387, 389, 3, 50, 25, 0, 388, 386, 1, 0, 0, 0, 389, 
		    392, 1, 0, 0, 0, 390, 388, 1, 0, 0, 0, 390, 391, 1, 0, 0, 0, 391, 
		    49, 1, 0, 0, 0, 392, 390, 1, 0, 0, 0, 393, 398, 3, 52, 26, 0, 394, 
		    395, 5, 57, 0, 0, 395, 397, 3, 52, 26, 0, 396, 394, 1, 0, 0, 0, 397, 
		    400, 1, 0, 0, 0, 398, 396, 1, 0, 0, 0, 398, 399, 1, 0, 0, 0, 399, 
		    51, 1, 0, 0, 0, 400, 398, 1, 0, 0, 0, 401, 406, 3, 54, 27, 0, 402, 
		    403, 7, 2, 0, 0, 403, 405, 3, 54, 27, 0, 404, 402, 1, 0, 0, 0, 405, 
		    408, 1, 0, 0, 0, 406, 404, 1, 0, 0, 0, 406, 407, 1, 0, 0, 0, 407, 
		    53, 1, 0, 0, 0, 408, 406, 1, 0, 0, 0, 409, 414, 3, 56, 28, 0, 410, 
		    411, 7, 3, 0, 0, 411, 413, 3, 56, 28, 0, 412, 410, 1, 0, 0, 0, 413, 
		    416, 1, 0, 0, 0, 414, 412, 1, 0, 0, 0, 414, 415, 1, 0, 0, 0, 415, 
		    55, 1, 0, 0, 0, 416, 414, 1, 0, 0, 0, 417, 422, 3, 58, 29, 0, 418, 
		    419, 7, 4, 0, 0, 419, 421, 3, 58, 29, 0, 420, 418, 1, 0, 0, 0, 421, 
		    424, 1, 0, 0, 0, 422, 420, 1, 0, 0, 0, 422, 423, 1, 0, 0, 0, 423, 
		    57, 1, 0, 0, 0, 424, 422, 1, 0, 0, 0, 425, 430, 3, 60, 30, 0, 426, 
		    427, 7, 5, 0, 0, 427, 429, 3, 60, 30, 0, 428, 426, 1, 0, 0, 0, 429, 
		    432, 1, 0, 0, 0, 430, 428, 1, 0, 0, 0, 430, 431, 1, 0, 0, 0, 431, 
		    59, 1, 0, 0, 0, 432, 430, 1, 0, 0, 0, 433, 434, 7, 6, 0, 0, 434, 441, 
		    3, 60, 30, 0, 435, 436, 5, 23, 0, 0, 436, 441, 3, 60, 30, 0, 437, 
		    438, 5, 9, 0, 0, 438, 441, 3, 60, 30, 0, 439, 441, 3, 62, 31, 0, 440, 
		    433, 1, 0, 0, 0, 440, 435, 1, 0, 0, 0, 440, 437, 1, 0, 0, 0, 440, 
		    439, 1, 0, 0, 0, 441, 61, 1, 0, 0, 0, 442, 443, 6, 31, -1, 0, 443, 
		    485, 5, 46, 0, 0, 444, 485, 5, 47, 0, 0, 445, 485, 5, 48, 0, 0, 446, 
		    485, 5, 49, 0, 0, 447, 485, 5, 37, 0, 0, 448, 485, 5, 38, 0, 0, 449, 
		    485, 5, 40, 0, 0, 450, 451, 5, 39, 0, 0, 451, 452, 5, 2, 0, 0, 452, 
		    453, 3, 46, 23, 0, 453, 454, 5, 3, 0, 0, 454, 485, 1, 0, 0, 0, 455, 
		    456, 3, 64, 32, 0, 456, 458, 5, 2, 0, 0, 457, 459, 3, 66, 33, 0, 458, 
		    457, 1, 0, 0, 0, 458, 459, 1, 0, 0, 0, 459, 460, 1, 0, 0, 0, 460, 
		    461, 5, 3, 0, 0, 461, 485, 1, 0, 0, 0, 462, 463, 3, 68, 34, 0, 463, 
		    465, 5, 2, 0, 0, 464, 466, 3, 66, 33, 0, 465, 464, 1, 0, 0, 0, 465, 
		    466, 1, 0, 0, 0, 466, 467, 1, 0, 0, 0, 467, 468, 5, 3, 0, 0, 468, 
		    485, 1, 0, 0, 0, 469, 485, 3, 64, 32, 0, 470, 471, 5, 2, 0, 0, 471, 
		    472, 3, 46, 23, 0, 472, 473, 5, 3, 0, 0, 473, 485, 1, 0, 0, 0, 474, 
		    481, 3, 64, 32, 0, 475, 476, 5, 5, 0, 0, 476, 477, 3, 46, 23, 0, 477, 
		    478, 5, 6, 0, 0, 478, 480, 1, 0, 0, 0, 479, 475, 1, 0, 0, 0, 480, 
		    483, 1, 0, 0, 0, 481, 479, 1, 0, 0, 0, 481, 482, 1, 0, 0, 0, 482, 
		    485, 1, 0, 0, 0, 483, 481, 1, 0, 0, 0, 484, 442, 1, 0, 0, 0, 484, 
		    444, 1, 0, 0, 0, 484, 445, 1, 0, 0, 0, 484, 446, 1, 0, 0, 0, 484, 
		    447, 1, 0, 0, 0, 484, 448, 1, 0, 0, 0, 484, 449, 1, 0, 0, 0, 484, 
		    450, 1, 0, 0, 0, 484, 455, 1, 0, 0, 0, 484, 462, 1, 0, 0, 0, 484, 
		    469, 1, 0, 0, 0, 484, 470, 1, 0, 0, 0, 484, 474, 1, 0, 0, 0, 485, 
		    492, 1, 0, 0, 0, 486, 487, 10, 2, 0, 0, 487, 491, 5, 50, 0, 0, 488, 
		    489, 10, 1, 0, 0, 489, 491, 5, 51, 0, 0, 490, 486, 1, 0, 0, 0, 490, 
		    488, 1, 0, 0, 0, 491, 494, 1, 0, 0, 0, 492, 490, 1, 0, 0, 0, 492, 
		    493, 1, 0, 0, 0, 493, 63, 1, 0, 0, 0, 494, 492, 1, 0, 0, 0, 495, 500, 
		    5, 60, 0, 0, 496, 497, 5, 24, 0, 0, 497, 499, 5, 60, 0, 0, 498, 496, 
		    1, 0, 0, 0, 499, 502, 1, 0, 0, 0, 500, 498, 1, 0, 0, 0, 500, 501, 
		    1, 0, 0, 0, 501, 65, 1, 0, 0, 0, 502, 500, 1, 0, 0, 0, 503, 508, 3, 
		    46, 23, 0, 504, 505, 5, 4, 0, 0, 505, 507, 3, 46, 23, 0, 506, 504, 
		    1, 0, 0, 0, 507, 510, 1, 0, 0, 0, 508, 506, 1, 0, 0, 0, 508, 509, 
		    1, 0, 0, 0, 509, 67, 1, 0, 0, 0, 510, 508, 1, 0, 0, 0, 511, 519, 5, 
		    41, 0, 0, 512, 519, 5, 42, 0, 0, 513, 519, 5, 43, 0, 0, 514, 519, 
		    5, 44, 0, 0, 515, 519, 5, 45, 0, 0, 516, 519, 3, 70, 35, 0, 517, 519, 
		    3, 14, 7, 0, 518, 511, 1, 0, 0, 0, 518, 512, 1, 0, 0, 0, 518, 513, 
		    1, 0, 0, 0, 518, 514, 1, 0, 0, 0, 518, 515, 1, 0, 0, 0, 518, 516, 
		    1, 0, 0, 0, 518, 517, 1, 0, 0, 0, 519, 69, 1, 0, 0, 0, 520, 521, 5, 
		    9, 0, 0, 521, 522, 3, 68, 34, 0, 522, 71, 1, 0, 0, 0, 61, 75, 83, 
		    88, 97, 101, 108, 117, 123, 130, 142, 152, 155, 162, 168, 170, 182, 
		    185, 193, 197, 207, 211, 216, 222, 240, 247, 256, 263, 272, 283, 294, 
		    304, 306, 310, 319, 323, 331, 334, 338, 344, 353, 355, 357, 367, 375, 
		    377, 390, 398, 406, 414, 422, 430, 440, 458, 465, 481, 484, 490, 492, 
		    500, 508, 518];
		protected static $atn;
		protected static $decisionToDFA;
		protected static $sharedContextCache;

		public function __construct(TokenStream $input)
		{
			parent::__construct($input);

			self::initialize();

			$this->interp = new ParserATNSimulator($this, self::$atn, self::$decisionToDFA, self::$sharedContextCache);
		}

		private static function initialize(): void
		{
			if (self::$atn !== null) {
				return;
			}

			RuntimeMetaData::checkVersion('4.13.1', RuntimeMetaData::VERSION);

			$atn = (new ATNDeserializer())->deserialize(self::SERIALIZED_ATN);

			$decisionToDFA = [];
			for ($i = 0, $count = $atn->getNumberOfDecisions(); $i < $count; $i++) {
				$decisionToDFA[] = new DFA($atn->getDecisionState($i), $i);
			}

			self::$atn = $atn;
			self::$decisionToDFA = $decisionToDFA;
			self::$sharedContextCache = new PredictionContextCache();
		}

		public function getGrammarFileName(): string
		{
			return "Golampi.g4";
		}

		public function getRuleNames(): array
		{
			return self::RULE_NAMES;
		}

		public function getSerializedATN(): array
		{
			return self::SERIALIZED_ATN;
		}

		public function getATN(): ATN
		{
			return self::$atn;
		}

		public function getVocabulary(): Vocabulary
        {
            static $vocabulary;

			return $vocabulary = $vocabulary ?? new VocabularyImpl(self::LITERAL_NAMES, self::SYMBOLIC_NAMES);
        }

		/**
		 * @throws RecognitionException
		 */
		public function program(): Context\ProgramContext
		{
		    $localContext = new Context\ProgramContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 0, self::RULE_program);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(75);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 1152921504841728000) !== 0)) {
		        	$this->setState(72);
		        	$this->declaration();
		        	$this->setState(77);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(78);
		        $this->match(self::EOF);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function declaration(): Context\DeclarationContext
		{
		    $localContext = new Context\DeclarationContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 2, self::RULE_declaration);

		    try {
		        $this->setState(83);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::FUNC:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(80);
		            	$this->functionDecl();
		            	break;

		            case self::VAR:
		            case self::IDENTIFIER:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(81);
		            	$this->varDecl();
		            	break;

		            case self::CONST:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(82);
		            	$this->constDecl();
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function constDecl(): Context\ConstDeclContext
		{
		    $localContext = new Context\ConstDeclContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 4, self::RULE_constDecl);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(85);
		        $this->match(self::CONST);
		        $this->setState(86);
		        $this->match(self::IDENTIFIER);
		        $this->setState(88);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 68169720922656) !== 0)) {
		        	$this->setState(87);
		        	$this->type();
		        }
		        $this->setState(90);
		        $this->match(self::T__0);
		        $this->setState(91);
		        $this->expression();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function functionDecl(): Context\FunctionDeclContext
		{
		    $localContext = new Context\FunctionDeclContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 6, self::RULE_functionDecl);

		    try {
		        $this->setState(123);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 7, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(93);
		        	    $this->match(self::FUNC);
		        	    $this->setState(94);
		        	    $this->match(self::IDENTIFIER);
		        	    $this->setState(95);
		        	    $this->match(self::T__1);
		        	    $this->setState(97);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::IDENTIFIER) {
		        	    	$this->setState(96);
		        	    	$this->parameterList();
		        	    }
		        	    $this->setState(99);
		        	    $this->match(self::T__2);
		        	    $this->setState(101);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 68169720922656) !== 0)) {
		        	    	$this->setState(100);
		        	    	$this->type();
		        	    }
		        	    $this->setState(103);
		        	    $this->block();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(104);
		        	    $this->match(self::FUNC);
		        	    $this->setState(105);
		        	    $this->match(self::IDENTIFIER);
		        	    $this->setState(106);
		        	    $this->match(self::T__1);
		        	    $this->setState(108);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::IDENTIFIER) {
		        	    	$this->setState(107);
		        	    	$this->parameterList();
		        	    }
		        	    $this->setState(110);
		        	    $this->match(self::T__2);
		        	    $this->setState(111);
		        	    $this->match(self::T__1);
		        	    $this->setState(112);
		        	    $this->type();
		        	    $this->setState(117);
		        	    $this->errorHandler->sync($this);

		        	    $_la = $this->input->LA(1);
		        	    while ($_la === self::T__3) {
		        	    	$this->setState(113);
		        	    	$this->match(self::T__3);
		        	    	$this->setState(114);
		        	    	$this->type();
		        	    	$this->setState(119);
		        	    	$this->errorHandler->sync($this);
		        	    	$_la = $this->input->LA(1);
		        	    }
		        	    $this->setState(120);
		        	    $this->match(self::T__2);
		        	    $this->setState(121);
		        	    $this->block();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function parameterList(): Context\ParameterListContext
		{
		    $localContext = new Context\ParameterListContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 8, self::RULE_parameterList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(125);
		        $this->parameter();
		        $this->setState(130);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__3) {
		        	$this->setState(126);
		        	$this->match(self::T__3);
		        	$this->setState(127);
		        	$this->parameter();
		        	$this->setState(132);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function parameter(): Context\ParameterContext
		{
		    $localContext = new Context\ParameterContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 10, self::RULE_parameter);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(133);
		        $this->match(self::IDENTIFIER);
		        $this->setState(134);
		        $this->type();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function varDecl(): Context\VarDeclContext
		{
		    $localContext = new Context\VarDeclContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 12, self::RULE_varDecl);

		    try {
		        $this->setState(170);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 14, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(136);
		        	    $this->match(self::VAR);
		        	    $this->setState(137);
		        	    $this->match(self::IDENTIFIER);
		        	    $this->setState(142);
		        	    $this->errorHandler->sync($this);

		        	    $_la = $this->input->LA(1);
		        	    while ($_la === self::T__3) {
		        	    	$this->setState(138);
		        	    	$this->match(self::T__3);
		        	    	$this->setState(139);
		        	    	$this->match(self::IDENTIFIER);
		        	    	$this->setState(144);
		        	    	$this->errorHandler->sync($this);
		        	    	$_la = $this->input->LA(1);
		        	    }
		        	    $this->setState(145);
		        	    $this->type();
		        	    $this->setState(155);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__0) {
		        	    	$this->setState(146);
		        	    	$this->match(self::T__0);
		        	    	$this->setState(147);
		        	    	$this->expression();
		        	    	$this->setState(152);
		        	    	$this->errorHandler->sync($this);

		        	    	$_la = $this->input->LA(1);
		        	    	while ($_la === self::T__3) {
		        	    		$this->setState(148);
		        	    		$this->match(self::T__3);
		        	    		$this->setState(149);
		        	    		$this->expression();
		        	    		$this->setState(154);
		        	    		$this->errorHandler->sync($this);
		        	    		$_la = $this->input->LA(1);
		        	    	}
		        	    }
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(157);
		        	    $this->match(self::VAR);
		        	    $this->setState(158);
		        	    $this->match(self::IDENTIFIER);
		        	    $this->setState(159);
		        	    $this->arrayType();
		        	    $this->setState(162);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__0) {
		        	    	$this->setState(160);
		        	    	$this->match(self::T__0);
		        	    	$this->setState(161);
		        	    	$this->arrayLiteral();
		        	    }
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(164);
		        	    $this->match(self::IDENTIFIER);
		        	    $this->setState(165);
		        	    $this->arrayType();
		        	    $this->setState(168);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__0) {
		        	    	$this->setState(166);
		        	    	$this->match(self::T__0);
		        	    	$this->setState(167);
		        	    	$this->arrayLiteral();
		        	    }
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayType(): Context\ArrayTypeContext
		{
		    $localContext = new Context\ArrayTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 14, self::RULE_arrayType);

		    try {
		        $this->setState(182);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 15, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(172);
		        	    $this->match(self::T__4);
		        	    $this->setState(173);
		        	    $this->expression();
		        	    $this->setState(174);
		        	    $this->match(self::T__5);
		        	    $this->setState(175);
		        	    $this->arrayType();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(177);
		        	    $this->match(self::T__4);
		        	    $this->setState(178);
		        	    $this->expression();
		        	    $this->setState(179);
		        	    $this->match(self::T__5);
		        	    $this->setState(180);
		        	    $this->type();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayLiteral(): Context\ArrayLiteralContext
		{
		    $localContext = new Context\ArrayLiteralContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 16, self::RULE_arrayLiteral);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(185);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__4) {
		        	$this->setState(184);
		        	$this->arrayType();
		        }
		        $this->setState(187);
		        $this->match(self::T__6);
		        $this->setState(188);
		        $this->arrayElement();
		        $this->setState(193);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 17, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(189);
		        		$this->match(self::T__3);
		        		$this->setState(190);
		        		$this->arrayElement(); 
		        	}

		        	$this->setState(195);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 17, $this->ctx);
		        }
		        $this->setState(197);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__3) {
		        	$this->setState(196);
		        	$this->match(self::T__3);
		        }
		        $this->setState(199);
		        $this->match(self::T__7);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayElement(): Context\ArrayElementContext
		{
		    $localContext = new Context\ArrayElementContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 18, self::RULE_arrayElement);

		    try {
		        $this->setState(216);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__6:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(201);
		            	$this->match(self::T__6);
		            	$this->setState(202);
		            	$this->arrayElement();
		            	$this->setState(207);
		            	$this->errorHandler->sync($this);

		            	$alt = $this->getInterpreter()->adaptivePredict($this->input, 19, $this->ctx);

		            	while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		            		if ($alt === 1) {
		            			$this->setState(203);
		            			$this->match(self::T__3);
		            			$this->setState(204);
		            			$this->arrayElement(); 
		            		}

		            		$this->setState(209);
		            		$this->errorHandler->sync($this);

		            		$alt = $this->getInterpreter()->adaptivePredict($this->input, 19, $this->ctx);
		            	}
		            	$this->setState(211);
		            	$this->errorHandler->sync($this);
		            	$_la = $this->input->LA(1);

		            	if ($_la === self::T__3) {
		            		$this->setState(210);
		            		$this->match(self::T__3);
		            	}
		            	$this->setState(213);
		            	$this->match(self::T__7);
		            	break;

		            case self::T__1:
		            case self::T__4:
		            case self::T__8:
		            case self::T__18:
		            case self::T__21:
		            case self::T__22:
		            case self::TRUE:
		            case self::FALSE:
		            case self::LEN:
		            case self::NIL:
		            case self::INT:
		            case self::FLOATTYPE:
		            case self::BOOL:
		            case self::STRINGTYPE:
		            case self::RUNETYPE:
		            case self::INTEGER:
		            case self::FLOAT:
		            case self::STRING:
		            case self::RUNE:
		            case self::IDENTIFIER:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(215);
		            	$this->expression();
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function block(): Context\BlockContext
		{
		    $localContext = new Context\BlockContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 20, self::RULE_block);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(218);
		        $this->match(self::T__6);
		        $this->setState(222);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 1154047398520554148) !== 0)) {
		        	$this->setState(219);
		        	$this->statement();
		        	$this->setState(224);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(225);
		        $this->match(self::T__7);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function statement(): Context\StatementContext
		{
		    $localContext = new Context\StatementContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 22, self::RULE_statement);

		    try {
		        $this->setState(240);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 23, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(227);
		        	    $this->varDecl();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(228);
		        	    $this->constDecl();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(229);
		        	    $this->switchStmt();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(230);
		        	    $this->expresionStmt();
		        	break;

		        	case 5:
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(231);
		        	    $this->shortVarDecl();
		        	break;

		        	case 6:
		        	    $this->enterOuterAlt($localContext, 6);
		        	    $this->setState(232);
		        	    $this->assignment();
		        	break;

		        	case 7:
		        	    $this->enterOuterAlt($localContext, 7);
		        	    $this->setState(233);
		        	    $this->ifStmt();
		        	break;

		        	case 8:
		        	    $this->enterOuterAlt($localContext, 8);
		        	    $this->setState(234);
		        	    $this->forStmt();
		        	break;

		        	case 9:
		        	    $this->enterOuterAlt($localContext, 9);
		        	    $this->setState(235);
		        	    $this->returnStmt();
		        	break;

		        	case 10:
		        	    $this->enterOuterAlt($localContext, 10);
		        	    $this->setState(236);
		        	    $this->breakStmt();
		        	break;

		        	case 11:
		        	    $this->enterOuterAlt($localContext, 11);
		        	    $this->setState(237);
		        	    $this->continueStmt();
		        	break;

		        	case 12:
		        	    $this->enterOuterAlt($localContext, 12);
		        	    $this->setState(238);
		        	    $this->expresionStmt();
		        	break;

		        	case 13:
		        	    $this->enterOuterAlt($localContext, 13);
		        	    $this->setState(239);
		        	    $this->block();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function shortVarDecl(): Context\ShortVarDeclContext
		{
		    $localContext = new Context\ShortVarDeclContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 24, self::RULE_shortVarDecl);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(242);
		        $this->match(self::IDENTIFIER);
		        $this->setState(247);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__3) {
		        	$this->setState(243);
		        	$this->match(self::T__3);
		        	$this->setState(244);
		        	$this->match(self::IDENTIFIER);
		        	$this->setState(249);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(250);
		        $this->match(self::ASSIGN_SHORT);
		        $this->setState(251);
		        $this->shortValue();
		        $this->setState(256);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__3) {
		        	$this->setState(252);
		        	$this->match(self::T__3);
		        	$this->setState(253);
		        	$this->shortValue();
		        	$this->setState(258);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function shortValue(): Context\ShortValueContext
		{
		    $localContext = new Context\ShortValueContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 26, self::RULE_shortValue);

		    try {
		        $this->setState(263);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 26, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(259);
		        	    $this->arrayType();
		        	    $this->setState(260);
		        	    $this->arrayLiteral();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(262);
		        	    $this->expression();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function assignment(): Context\AssignmentContext
		{
		    $localContext = new Context\AssignmentContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 28, self::RULE_assignment);

		    try {
		        $this->setState(294);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 29, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(265);
		        	    $this->match(self::IDENTIFIER);
		        	    $this->setState(270); 
		        	    $this->errorHandler->sync($this);

		        	    $_la = $this->input->LA(1);
		        	    do {
		        	    	$this->setState(266);
		        	    	$this->match(self::T__4);
		        	    	$this->setState(267);
		        	    	$this->expression();
		        	    	$this->setState(268);
		        	    	$this->match(self::T__5);
		        	    	$this->setState(272); 
		        	    	$this->errorHandler->sync($this);
		        	    	$_la = $this->input->LA(1);
		        	    } while ($_la === self::T__4);
		        	    $this->setState(274);
		        	    $this->match(self::T__0);
		        	    $this->setState(275);
		        	    $this->expression();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(277);
		        	    $this->match(self::IDENTIFIER);
		        	    $this->setState(278);
		        	    $this->match(self::T__0);
		        	    $this->setState(279);
		        	    $this->expression();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(281); 
		        	    $this->errorHandler->sync($this);

		        	    $_la = $this->input->LA(1);
		        	    do {
		        	    	$this->setState(280);
		        	    	$this->match(self::T__8);
		        	    	$this->setState(283); 
		        	    	$this->errorHandler->sync($this);
		        	    	$_la = $this->input->LA(1);
		        	    } while ($_la === self::T__8);
		        	    $this->setState(285);
		        	    $this->match(self::IDENTIFIER);
		        	    $this->setState(286);
		        	    $this->match(self::T__0);
		        	    $this->setState(287);
		        	    $this->expression();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(288);
		        	    $this->recursivePrimary(0);
		        	    $this->setState(289);

		        	    $_la = $this->input->LA(1);

		        	    if (!($_la === self::PLUSPLUS || $_la === self::MINUSMINUS)) {
		        	    $this->errorHandler->recoverInline($this);
		        	    } else {
		        	    	if ($this->input->LA(1) === Token::EOF) {
		        	    	    $this->matchedEOF = true;
		        	        }

		        	    	$this->errorHandler->reportMatch($this);
		        	    	$this->consume();
		        	    }
		        	break;

		        	case 5:
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(291);
		        	    $this->match(self::IDENTIFIER);
		        	    $this->setState(292);

		        	    $_la = $this->input->LA(1);

		        	    if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 139611588448485376) !== 0))) {
		        	    $this->errorHandler->recoverInline($this);
		        	    } else {
		        	    	if ($this->input->LA(1) === Token::EOF) {
		        	    	    $this->matchedEOF = true;
		        	        }

		        	    	$this->errorHandler->reportMatch($this);
		        	    	$this->consume();
		        	    }
		        	    $this->setState(293);
		        	    $this->expression();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function expresionStmt(): Context\ExpresionStmtContext
		{
		    $localContext = new Context\ExpresionStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 30, self::RULE_expresionStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(296);
		        $this->expression();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function ifStmt(): Context\IfStmtContext
		{
		    $localContext = new Context\IfStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 32, self::RULE_ifStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(298);
		        $this->match(self::IF);
		        $this->setState(299);
		        $this->expression();
		        $this->setState(300);
		        $this->block();
		        $this->setState(306);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::ELSE) {
		        	$this->setState(301);
		        	$this->match(self::ELSE);
		        	$this->setState(304);
		        	$this->errorHandler->sync($this);

		        	switch ($this->input->LA(1)) {
		        	    case self::IF:
		        	    	$this->setState(302);
		        	    	$this->ifStmt();
		        	    	break;

		        	    case self::T__6:
		        	    	$this->setState(303);
		        	    	$this->block();
		        	    	break;

		        	default:
		        		throw new NoViableAltException($this);
		        	}
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function forStmt(): Context\ForStmtContext
		{
		    $localContext = new Context\ForStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 34, self::RULE_forStmt);

		    try {
		        $this->setState(323);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 34, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(308);
		        	    $this->match(self::FOR);
		        	    $this->setState(310);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 1154047267087843876) !== 0)) {
		        	    	$this->setState(309);
		        	    	$this->expression();
		        	    }
		        	    $this->setState(312);
		        	    $this->block();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(313);
		        	    $this->match(self::FOR);
		        	    $this->setState(314);
		        	    $this->shortVarDecl();
		        	    $this->setState(315);
		        	    $this->match(self::T__9);
		        	    $this->setState(316);
		        	    $this->expression();
		        	    $this->setState(317);
		        	    $this->match(self::T__9);
		        	    $this->setState(319);
		        	    $this->errorHandler->sync($this);

		        	    switch ($this->getInterpreter()->adaptivePredict($this->input, 33, $this->ctx)) {
		        	        case 1:
		        	    	    $this->setState(318);
		        	    	    $this->statement();
		        	    	break;
		        	    }
		        	    $this->setState(321);
		        	    $this->block();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function returnStmt(): Context\ReturnStmtContext
		{
		    $localContext = new Context\ReturnStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 36, self::RULE_returnStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(325);
		        $this->match(self::RETURN);
		        $this->setState(334);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 36, $this->ctx)) {
		            case 1:
		        	    $this->setState(326);
		        	    $this->expression();
		        	    $this->setState(331);
		        	    $this->errorHandler->sync($this);

		        	    $_la = $this->input->LA(1);
		        	    while ($_la === self::T__3) {
		        	    	$this->setState(327);
		        	    	$this->match(self::T__3);
		        	    	$this->setState(328);
		        	    	$this->expression();
		        	    	$this->setState(333);
		        	    	$this->errorHandler->sync($this);
		        	    	$_la = $this->input->LA(1);
		        	    }
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function switchStmt(): Context\SwitchStmtContext
		{
		    $localContext = new Context\SwitchStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 38, self::RULE_switchStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(336);
		        $this->match(self::SWITCH);
		        $this->setState(338);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 1154047267087843876) !== 0)) {
		        	$this->setState(337);
		        	$this->expression();
		        }
		        $this->setState(340);
		        $this->match(self::T__6);
		        $this->setState(344);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::CASE) {
		        	$this->setState(341);
		        	$this->switchCase();
		        	$this->setState(346);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(357);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::DEFAULT) {
		        	$this->setState(347);
		        	$this->match(self::DEFAULT);
		        	$this->setState(348);
		        	$this->match(self::T__10);
		        	$this->setState(355);
		        	$this->errorHandler->sync($this);

		        	switch ($this->getInterpreter()->adaptivePredict($this->input, 40, $this->ctx)) {
		        		case 1:
		        		    $this->setState(349);
		        		    $this->block();
		        		break;

		        		case 2:
		        		    $this->setState(351); 
		        		    $this->errorHandler->sync($this);

		        		    $_la = $this->input->LA(1);
		        		    do {
		        		    	$this->setState(350);
		        		    	$this->statement();
		        		    	$this->setState(353); 
		        		    	$this->errorHandler->sync($this);
		        		    	$_la = $this->input->LA(1);
		        		    } while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 1154047398520554148) !== 0));
		        		break;
		        	}
		        }
		        $this->setState(359);
		        $this->match(self::T__7);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function switchCase(): Context\SwitchCaseContext
		{
		    $localContext = new Context\SwitchCaseContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 40, self::RULE_switchCase);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(361);
		        $this->match(self::CASE);
		        $this->setState(362);
		        $this->expression();
		        $this->setState(367);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__3) {
		        	$this->setState(363);
		        	$this->match(self::T__3);
		        	$this->setState(364);
		        	$this->expression();
		        	$this->setState(369);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(370);
		        $this->match(self::T__10);
		        $this->setState(377);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 44, $this->ctx)) {
		        	case 1:
		        	    $this->setState(371);
		        	    $this->block();
		        	break;

		        	case 2:
		        	    $this->setState(373); 
		        	    $this->errorHandler->sync($this);

		        	    $_la = $this->input->LA(1);
		        	    do {
		        	    	$this->setState(372);
		        	    	$this->statement();
		        	    	$this->setState(375); 
		        	    	$this->errorHandler->sync($this);
		        	    	$_la = $this->input->LA(1);
		        	    } while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 1154047398520554148) !== 0));
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function breakStmt(): Context\BreakStmtContext
		{
		    $localContext = new Context\BreakStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 42, self::RULE_breakStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(379);
		        $this->match(self::BREAK);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function continueStmt(): Context\ContinueStmtContext
		{
		    $localContext = new Context\ContinueStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 44, self::RULE_continueStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(381);
		        $this->match(self::CONTINUE);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function expression(): Context\ExpressionContext
		{
		    $localContext = new Context\ExpressionContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 46, self::RULE_expression);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(383);
		        $this->logicalOr();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function logicalOr(): Context\LogicalOrContext
		{
		    $localContext = new Context\LogicalOrContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 48, self::RULE_logicalOr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(385);
		        $this->logicalAnd();
		        $this->setState(390);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::OR) {
		        	$this->setState(386);
		        	$this->match(self::OR);
		        	$this->setState(387);
		        	$this->logicalAnd();
		        	$this->setState(392);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function logicalAnd(): Context\LogicalAndContext
		{
		    $localContext = new Context\LogicalAndContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 50, self::RULE_logicalAnd);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(393);
		        $this->equality();
		        $this->setState(398);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::AND) {
		        	$this->setState(394);
		        	$this->match(self::AND);
		        	$this->setState(395);
		        	$this->equality();
		        	$this->setState(400);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function equality(): Context\EqualityContext
		{
		    $localContext = new Context\EqualityContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 52, self::RULE_equality);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(401);
		        $this->comparison();
		        $this->setState(406);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__11 || $_la === self::T__12) {
		        	$this->setState(402);

		        	$_la = $this->input->LA(1);

		        	if (!($_la === self::T__11 || $_la === self::T__12)) {
		        	$this->errorHandler->recoverInline($this);
		        	} else {
		        		if ($this->input->LA(1) === Token::EOF) {
		        		    $this->matchedEOF = true;
		        	    }

		        		$this->errorHandler->reportMatch($this);
		        		$this->consume();
		        	}
		        	$this->setState(403);
		        	$this->comparison();
		        	$this->setState(408);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function comparison(): Context\ComparisonContext
		{
		    $localContext = new Context\ComparisonContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 54, self::RULE_comparison);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(409);
		        $this->addition();
		        $this->setState(414);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 245760) !== 0)) {
		        	$this->setState(410);

		        	$_la = $this->input->LA(1);

		        	if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 245760) !== 0))) {
		        	$this->errorHandler->recoverInline($this);
		        	} else {
		        		if ($this->input->LA(1) === Token::EOF) {
		        		    $this->matchedEOF = true;
		        	    }

		        		$this->errorHandler->reportMatch($this);
		        		$this->consume();
		        	}
		        	$this->setState(411);
		        	$this->addition();
		        	$this->setState(416);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function addition(): Context\AdditionContext
		{
		    $localContext = new Context\AdditionContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 56, self::RULE_addition);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(417);
		        $this->multiplication();
		        $this->setState(422);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 49, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(418);

		        		$_la = $this->input->LA(1);

		        		if (!($_la === self::T__17 || $_la === self::T__18)) {
		        		$this->errorHandler->recoverInline($this);
		        		} else {
		        			if ($this->input->LA(1) === Token::EOF) {
		        			    $this->matchedEOF = true;
		        		    }

		        			$this->errorHandler->reportMatch($this);
		        			$this->consume();
		        		}
		        		$this->setState(419);
		        		$this->multiplication(); 
		        	}

		        	$this->setState(424);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 49, $this->ctx);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function multiplication(): Context\MultiplicationContext
		{
		    $localContext = new Context\MultiplicationContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 58, self::RULE_multiplication);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(425);
		        $this->unary();
		        $this->setState(430);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 50, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(426);

		        		$_la = $this->input->LA(1);

		        		if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 3146240) !== 0))) {
		        		$this->errorHandler->recoverInline($this);
		        		} else {
		        			if ($this->input->LA(1) === Token::EOF) {
		        			    $this->matchedEOF = true;
		        		    }

		        			$this->errorHandler->reportMatch($this);
		        			$this->consume();
		        		}
		        		$this->setState(427);
		        		$this->unary(); 
		        	}

		        	$this->setState(432);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 50, $this->ctx);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function unary(): Context\UnaryContext
		{
		    $localContext = new Context\UnaryContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 60, self::RULE_unary);

		    try {
		        $this->setState(440);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 51, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(433);

		        	    $_la = $this->input->LA(1);

		        	    if (!($_la === self::T__18 || $_la === self::T__21)) {
		        	    $this->errorHandler->recoverInline($this);
		        	    } else {
		        	    	if ($this->input->LA(1) === Token::EOF) {
		        	    	    $this->matchedEOF = true;
		        	        }

		        	    	$this->errorHandler->reportMatch($this);
		        	    	$this->consume();
		        	    }
		        	    $this->setState(434);
		        	    $this->unary();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(435);
		        	    $this->match(self::T__22);
		        	    $this->setState(436);
		        	    $this->unary();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(437);
		        	    $this->match(self::T__8);
		        	    $this->setState(438);
		        	    $this->unary();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(439);
		        	    $this->recursivePrimary(0);
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function primary(): Context\PrimaryContext
		{
			return $this->recursivePrimary(0);
		}

		/**
		 * @throws RecognitionException
		 */
		private function recursivePrimary(int $precedence): Context\PrimaryContext
		{
			$parentContext = $this->ctx;
			$parentState = $this->getState();
			$localContext = new Context\PrimaryContext($this->ctx, $parentState);
			$previousContext = $localContext;
			$startState = 62;
			$this->enterRecursionRule($localContext, 62, self::RULE_primary, $precedence);

			try {
				$this->enterOuterAlt($localContext, 1);
				$this->setState(484);
				$this->errorHandler->sync($this);

				switch ($this->getInterpreter()->adaptivePredict($this->input, 55, $this->ctx)) {
					case 1:
					    $this->setState(443);
					    $this->match(self::INTEGER);
					break;

					case 2:
					    $this->setState(444);
					    $this->match(self::FLOAT);
					break;

					case 3:
					    $this->setState(445);
					    $this->match(self::STRING);
					break;

					case 4:
					    $this->setState(446);
					    $this->match(self::RUNE);
					break;

					case 5:
					    $this->setState(447);
					    $this->match(self::TRUE);
					break;

					case 6:
					    $this->setState(448);
					    $this->match(self::FALSE);
					break;

					case 7:
					    $this->setState(449);
					    $this->match(self::NIL);
					break;

					case 8:
					    $this->setState(450);
					    $this->match(self::LEN);
					    $this->setState(451);
					    $this->match(self::T__1);
					    $this->setState(452);
					    $this->expression();
					    $this->setState(453);
					    $this->match(self::T__2);
					break;

					case 9:
					    $this->setState(455);
					    $this->qualified();
					    $this->setState(456);
					    $this->match(self::T__1);
					    $this->setState(458);
					    $this->errorHandler->sync($this);
					    $_la = $this->input->LA(1);

					    if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 1154047267087843876) !== 0)) {
					    	$this->setState(457);
					    	$this->argumentList();
					    }
					    $this->setState(460);
					    $this->match(self::T__2);
					break;

					case 10:
					    $this->setState(462);
					    $this->type();
					    $this->setState(463);
					    $this->match(self::T__1);
					    $this->setState(465);
					    $this->errorHandler->sync($this);
					    $_la = $this->input->LA(1);

					    if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 1154047267087843876) !== 0)) {
					    	$this->setState(464);
					    	$this->argumentList();
					    }
					    $this->setState(467);
					    $this->match(self::T__2);
					break;

					case 11:
					    $this->setState(469);
					    $this->qualified();
					break;

					case 12:
					    $this->setState(470);
					    $this->match(self::T__1);
					    $this->setState(471);
					    $this->expression();
					    $this->setState(472);
					    $this->match(self::T__2);
					break;

					case 13:
					    $this->setState(474);
					    $this->qualified();
					    $this->setState(481);
					    $this->errorHandler->sync($this);

					    $alt = $this->getInterpreter()->adaptivePredict($this->input, 54, $this->ctx);

					    while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					    	if ($alt === 1) {
					    		$this->setState(475);
					    		$this->match(self::T__4);
					    		$this->setState(476);
					    		$this->expression();
					    		$this->setState(477);
					    		$this->match(self::T__5); 
					    	}

					    	$this->setState(483);
					    	$this->errorHandler->sync($this);

					    	$alt = $this->getInterpreter()->adaptivePredict($this->input, 54, $this->ctx);
					    }
					break;
				}
				$this->ctx->stop = $this->input->LT(-1);
				$this->setState(492);
				$this->errorHandler->sync($this);

				$alt = $this->getInterpreter()->adaptivePredict($this->input, 57, $this->ctx);

				while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					if ($alt === 1) {
						if ($this->getParseListeners() !== null) {
						    $this->triggerExitRuleEvent();
						}

						$previousContext = $localContext;
						$this->setState(490);
						$this->errorHandler->sync($this);

						switch ($this->getInterpreter()->adaptivePredict($this->input, 56, $this->ctx)) {
							case 1:
							    $localContext = new Context\PrimaryContext($parentContext, $parentState);
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_primary);
							    $this->setState(486);

							    if (!($this->precpred($this->ctx, 2))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 2)");
							    }
							    $this->setState(487);
							    $this->match(self::PLUSPLUS);
							break;

							case 2:
							    $localContext = new Context\PrimaryContext($parentContext, $parentState);
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_primary);
							    $this->setState(488);

							    if (!($this->precpred($this->ctx, 1))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 1)");
							    }
							    $this->setState(489);
							    $this->match(self::MINUSMINUS);
							break;
						} 
					}

					$this->setState(494);
					$this->errorHandler->sync($this);

					$alt = $this->getInterpreter()->adaptivePredict($this->input, 57, $this->ctx);
				}
			} catch (RecognitionException $exception) {
				$localContext->exception = $exception;
				$this->errorHandler->reportError($this, $exception);
				$this->errorHandler->recover($this, $exception);
			} finally {
				$this->unrollRecursionContexts($parentContext);
			}

			return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function qualified(): Context\QualifiedContext
		{
		    $localContext = new Context\QualifiedContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 64, self::RULE_qualified);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(495);
		        $this->match(self::IDENTIFIER);
		        $this->setState(500);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 58, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(496);
		        		$this->match(self::T__23);
		        		$this->setState(497);
		        		$this->match(self::IDENTIFIER); 
		        	}

		        	$this->setState(502);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 58, $this->ctx);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function argumentList(): Context\ArgumentListContext
		{
		    $localContext = new Context\ArgumentListContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 66, self::RULE_argumentList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(503);
		        $this->expression();
		        $this->setState(508);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__3) {
		        	$this->setState(504);
		        	$this->match(self::T__3);
		        	$this->setState(505);
		        	$this->expression();
		        	$this->setState(510);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function type(): Context\TypeContext
		{
		    $localContext = new Context\TypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 68, self::RULE_type);

		    try {
		        $this->setState(518);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::INT:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(511);
		            	$this->match(self::INT);
		            	break;

		            case self::FLOATTYPE:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(512);
		            	$this->match(self::FLOATTYPE);
		            	break;

		            case self::BOOL:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(513);
		            	$this->match(self::BOOL);
		            	break;

		            case self::STRINGTYPE:
		            	$this->enterOuterAlt($localContext, 4);
		            	$this->setState(514);
		            	$this->match(self::STRINGTYPE);
		            	break;

		            case self::RUNETYPE:
		            	$this->enterOuterAlt($localContext, 5);
		            	$this->setState(515);
		            	$this->match(self::RUNETYPE);
		            	break;

		            case self::T__8:
		            	$this->enterOuterAlt($localContext, 6);
		            	$this->setState(516);
		            	$this->pointerType();
		            	break;

		            case self::T__4:
		            	$this->enterOuterAlt($localContext, 7);
		            	$this->setState(517);
		            	$this->arrayType();
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function pointerType(): Context\PointerTypeContext
		{
		    $localContext = new Context\PointerTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 70, self::RULE_pointerType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(520);
		        $this->match(self::T__8);
		        $this->setState(521);
		        $this->type();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		public function sempred(?RuleContext $localContext, int $ruleIndex, int $predicateIndex): bool
		{
			switch ($ruleIndex) {
					case 31:
						return $this->sempredPrimary($localContext, $predicateIndex);

				default:
					return true;
				}
		}

		private function sempredPrimary(?Context\PrimaryContext $localContext, int $predicateIndex): bool
		{
			switch ($predicateIndex) {
			    case 0:
			        return $this->precpred($this->ctx, 2);

			    case 1:
			        return $this->precpred($this->ctx, 1);
			}

			return true;
		}
	}
}

namespace Context {
	use Antlr\Antlr4\Runtime\ParserRuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;
	use Antlr\Antlr4\Runtime\Tree\TerminalNode;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;
	use GolampiParser;
	use GolampiVisitor;
	use GolampiListener;

	class ProgramContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_program;
	    }

	    public function EOF(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::EOF, 0);
	    }

	    /**
	     * @return array<DeclarationContext>|DeclarationContext|null
	     */
	    public function declaration(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(DeclarationContext::class);
	    	}

	        return $this->getTypedRuleContext(DeclarationContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterProgram($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitProgram($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitProgram($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class DeclarationContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_declaration;
	    }

	    public function functionDecl(): ?FunctionDeclContext
	    {
	    	return $this->getTypedRuleContext(FunctionDeclContext::class, 0);
	    }

	    public function varDecl(): ?VarDeclContext
	    {
	    	return $this->getTypedRuleContext(VarDeclContext::class, 0);
	    }

	    public function constDecl(): ?ConstDeclContext
	    {
	    	return $this->getTypedRuleContext(ConstDeclContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterDeclaration($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitDeclaration($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitDeclaration($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ConstDeclContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_constDecl;
	    }

	    public function CONST(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::CONST, 0);
	    }

	    public function IDENTIFIER(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::IDENTIFIER, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterConstDecl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitConstDecl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitConstDecl($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class FunctionDeclContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_functionDecl;
	    }

	    public function FUNC(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::FUNC, 0);
	    }

	    public function IDENTIFIER(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::IDENTIFIER, 0);
	    }

	    public function block(): ?BlockContext
	    {
	    	return $this->getTypedRuleContext(BlockContext::class, 0);
	    }

	    public function parameterList(): ?ParameterListContext
	    {
	    	return $this->getTypedRuleContext(ParameterListContext::class, 0);
	    }

	    /**
	     * @return array<TypeContext>|TypeContext|null
	     */
	    public function type(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(TypeContext::class);
	    	}

	        return $this->getTypedRuleContext(TypeContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterFunctionDecl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitFunctionDecl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitFunctionDecl($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ParameterListContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_parameterList;
	    }

	    /**
	     * @return array<ParameterContext>|ParameterContext|null
	     */
	    public function parameter(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ParameterContext::class);
	    	}

	        return $this->getTypedRuleContext(ParameterContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterParameterList($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitParameterList($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitParameterList($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ParameterContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_parameter;
	    }

	    public function IDENTIFIER(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::IDENTIFIER, 0);
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterParameter($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitParameter($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitParameter($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class VarDeclContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_varDecl;
	    }

	    public function VAR(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::VAR, 0);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function IDENTIFIER(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::IDENTIFIER);
	    	}

	        return $this->getToken(GolampiParser::IDENTIFIER, $index);
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    public function arrayType(): ?ArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(ArrayTypeContext::class, 0);
	    }

	    public function arrayLiteral(): ?ArrayLiteralContext
	    {
	    	return $this->getTypedRuleContext(ArrayLiteralContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterVarDecl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitVarDecl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitVarDecl($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_arrayType;
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function arrayType(): ?ArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(ArrayTypeContext::class, 0);
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterArrayType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitArrayType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitArrayType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayLiteralContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_arrayLiteral;
	    }

	    /**
	     * @return array<ArrayElementContext>|ArrayElementContext|null
	     */
	    public function arrayElement(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ArrayElementContext::class);
	    	}

	        return $this->getTypedRuleContext(ArrayElementContext::class, $index);
	    }

	    public function arrayType(): ?ArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(ArrayTypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterArrayLiteral($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitArrayLiteral($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitArrayLiteral($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayElementContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_arrayElement;
	    }

	    /**
	     * @return array<ArrayElementContext>|ArrayElementContext|null
	     */
	    public function arrayElement(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ArrayElementContext::class);
	    	}

	        return $this->getTypedRuleContext(ArrayElementContext::class, $index);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterArrayElement($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitArrayElement($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitArrayElement($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class BlockContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_block;
	    }

	    /**
	     * @return array<StatementContext>|StatementContext|null
	     */
	    public function statement(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(StatementContext::class);
	    	}

	        return $this->getTypedRuleContext(StatementContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterBlock($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitBlock($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitBlock($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class StatementContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_statement;
	    }

	    public function varDecl(): ?VarDeclContext
	    {
	    	return $this->getTypedRuleContext(VarDeclContext::class, 0);
	    }

	    public function constDecl(): ?ConstDeclContext
	    {
	    	return $this->getTypedRuleContext(ConstDeclContext::class, 0);
	    }

	    public function switchStmt(): ?SwitchStmtContext
	    {
	    	return $this->getTypedRuleContext(SwitchStmtContext::class, 0);
	    }

	    public function expresionStmt(): ?ExpresionStmtContext
	    {
	    	return $this->getTypedRuleContext(ExpresionStmtContext::class, 0);
	    }

	    public function shortVarDecl(): ?ShortVarDeclContext
	    {
	    	return $this->getTypedRuleContext(ShortVarDeclContext::class, 0);
	    }

	    public function assignment(): ?AssignmentContext
	    {
	    	return $this->getTypedRuleContext(AssignmentContext::class, 0);
	    }

	    public function ifStmt(): ?IfStmtContext
	    {
	    	return $this->getTypedRuleContext(IfStmtContext::class, 0);
	    }

	    public function forStmt(): ?ForStmtContext
	    {
	    	return $this->getTypedRuleContext(ForStmtContext::class, 0);
	    }

	    public function returnStmt(): ?ReturnStmtContext
	    {
	    	return $this->getTypedRuleContext(ReturnStmtContext::class, 0);
	    }

	    public function breakStmt(): ?BreakStmtContext
	    {
	    	return $this->getTypedRuleContext(BreakStmtContext::class, 0);
	    }

	    public function continueStmt(): ?ContinueStmtContext
	    {
	    	return $this->getTypedRuleContext(ContinueStmtContext::class, 0);
	    }

	    public function block(): ?BlockContext
	    {
	    	return $this->getTypedRuleContext(BlockContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterStatement($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitStatement($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitStatement($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ShortVarDeclContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_shortVarDecl;
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function IDENTIFIER(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::IDENTIFIER);
	    	}

	        return $this->getToken(GolampiParser::IDENTIFIER, $index);
	    }

	    public function ASSIGN_SHORT(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ASSIGN_SHORT, 0);
	    }

	    /**
	     * @return array<ShortValueContext>|ShortValueContext|null
	     */
	    public function shortValue(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ShortValueContext::class);
	    	}

	        return $this->getTypedRuleContext(ShortValueContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterShortVarDecl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitShortVarDecl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitShortVarDecl($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ShortValueContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_shortValue;
	    }

	    public function arrayType(): ?ArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(ArrayTypeContext::class, 0);
	    }

	    public function arrayLiteral(): ?ArrayLiteralContext
	    {
	    	return $this->getTypedRuleContext(ArrayLiteralContext::class, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterShortValue($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitShortValue($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitShortValue($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class AssignmentContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_assignment;
	    }

	    public function IDENTIFIER(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::IDENTIFIER, 0);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    public function primary(): ?PrimaryContext
	    {
	    	return $this->getTypedRuleContext(PrimaryContext::class, 0);
	    }

	    public function PLUSPLUS(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::PLUSPLUS, 0);
	    }

	    public function MINUSMINUS(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::MINUSMINUS, 0);
	    }

	    public function PLUSEQ(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::PLUSEQ, 0);
	    }

	    public function MINUSEQ(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::MINUSEQ, 0);
	    }

	    public function STAREQ(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::STAREQ, 0);
	    }

	    public function SLASHEQ(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::SLASHEQ, 0);
	    }

	    public function MODEQ(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::MODEQ, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterAssignment($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitAssignment($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitAssignment($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ExpresionStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_expresionStmt;
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterExpresionStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitExpresionStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitExpresionStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class IfStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_ifStmt;
	    }

	    public function IF(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::IF, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    /**
	     * @return array<BlockContext>|BlockContext|null
	     */
	    public function block(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(BlockContext::class);
	    	}

	        return $this->getTypedRuleContext(BlockContext::class, $index);
	    }

	    public function ELSE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ELSE, 0);
	    }

	    public function ifStmt(): ?IfStmtContext
	    {
	    	return $this->getTypedRuleContext(IfStmtContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterIfStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitIfStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitIfStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ForStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_forStmt;
	    }

	    public function FOR(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::FOR, 0);
	    }

	    public function block(): ?BlockContext
	    {
	    	return $this->getTypedRuleContext(BlockContext::class, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function shortVarDecl(): ?ShortVarDeclContext
	    {
	    	return $this->getTypedRuleContext(ShortVarDeclContext::class, 0);
	    }

	    public function statement(): ?StatementContext
	    {
	    	return $this->getTypedRuleContext(StatementContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterForStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitForStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitForStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ReturnStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_returnStmt;
	    }

	    public function RETURN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::RETURN, 0);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterReturnStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitReturnStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitReturnStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class SwitchStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_switchStmt;
	    }

	    public function SWITCH(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::SWITCH, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    /**
	     * @return array<SwitchCaseContext>|SwitchCaseContext|null
	     */
	    public function switchCase(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(SwitchCaseContext::class);
	    	}

	        return $this->getTypedRuleContext(SwitchCaseContext::class, $index);
	    }

	    public function DEFAULT(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::DEFAULT, 0);
	    }

	    public function block(): ?BlockContext
	    {
	    	return $this->getTypedRuleContext(BlockContext::class, 0);
	    }

	    /**
	     * @return array<StatementContext>|StatementContext|null
	     */
	    public function statement(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(StatementContext::class);
	    	}

	        return $this->getTypedRuleContext(StatementContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterSwitchStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitSwitchStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitSwitchStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class SwitchCaseContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_switchCase;
	    }

	    public function CASE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::CASE, 0);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    public function block(): ?BlockContext
	    {
	    	return $this->getTypedRuleContext(BlockContext::class, 0);
	    }

	    /**
	     * @return array<StatementContext>|StatementContext|null
	     */
	    public function statement(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(StatementContext::class);
	    	}

	        return $this->getTypedRuleContext(StatementContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterSwitchCase($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitSwitchCase($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitSwitchCase($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class BreakStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_breakStmt;
	    }

	    public function BREAK(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::BREAK, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterBreakStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitBreakStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitBreakStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ContinueStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_continueStmt;
	    }

	    public function CONTINUE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::CONTINUE, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterContinueStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitContinueStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitContinueStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ExpressionContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_expression;
	    }

	    public function logicalOr(): ?LogicalOrContext
	    {
	    	return $this->getTypedRuleContext(LogicalOrContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterExpression($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitExpression($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class LogicalOrContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_logicalOr;
	    }

	    /**
	     * @return array<LogicalAndContext>|LogicalAndContext|null
	     */
	    public function logicalAnd(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(LogicalAndContext::class);
	    	}

	        return $this->getTypedRuleContext(LogicalAndContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function OR(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::OR);
	    	}

	        return $this->getToken(GolampiParser::OR, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterLogicalOr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitLogicalOr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitLogicalOr($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class LogicalAndContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_logicalAnd;
	    }

	    /**
	     * @return array<EqualityContext>|EqualityContext|null
	     */
	    public function equality(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(EqualityContext::class);
	    	}

	        return $this->getTypedRuleContext(EqualityContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function AND(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::AND);
	    	}

	        return $this->getToken(GolampiParser::AND, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterLogicalAnd($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitLogicalAnd($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitLogicalAnd($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class EqualityContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_equality;
	    }

	    /**
	     * @return array<ComparisonContext>|ComparisonContext|null
	     */
	    public function comparison(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ComparisonContext::class);
	    	}

	        return $this->getTypedRuleContext(ComparisonContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterEquality($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitEquality($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitEquality($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ComparisonContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_comparison;
	    }

	    /**
	     * @return array<AdditionContext>|AdditionContext|null
	     */
	    public function addition(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(AdditionContext::class);
	    	}

	        return $this->getTypedRuleContext(AdditionContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterComparison($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitComparison($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitComparison($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class AdditionContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_addition;
	    }

	    /**
	     * @return array<MultiplicationContext>|MultiplicationContext|null
	     */
	    public function multiplication(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(MultiplicationContext::class);
	    	}

	        return $this->getTypedRuleContext(MultiplicationContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterAddition($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitAddition($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitAddition($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class MultiplicationContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_multiplication;
	    }

	    /**
	     * @return array<UnaryContext>|UnaryContext|null
	     */
	    public function unary(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(UnaryContext::class);
	    	}

	        return $this->getTypedRuleContext(UnaryContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterMultiplication($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitMultiplication($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitMultiplication($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class UnaryContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_unary;
	    }

	    public function unary(): ?UnaryContext
	    {
	    	return $this->getTypedRuleContext(UnaryContext::class, 0);
	    }

	    public function primary(): ?PrimaryContext
	    {
	    	return $this->getTypedRuleContext(PrimaryContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterUnary($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitUnary($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitUnary($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class PrimaryContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_primary;
	    }

	    public function INTEGER(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::INTEGER, 0);
	    }

	    public function FLOAT(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::FLOAT, 0);
	    }

	    public function STRING(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::STRING, 0);
	    }

	    public function RUNE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::RUNE, 0);
	    }

	    public function TRUE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::TRUE, 0);
	    }

	    public function FALSE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::FALSE, 0);
	    }

	    public function NIL(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::NIL, 0);
	    }

	    public function LEN(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::LEN, 0);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    public function qualified(): ?QualifiedContext
	    {
	    	return $this->getTypedRuleContext(QualifiedContext::class, 0);
	    }

	    public function argumentList(): ?ArgumentListContext
	    {
	    	return $this->getTypedRuleContext(ArgumentListContext::class, 0);
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

	    public function primary(): ?PrimaryContext
	    {
	    	return $this->getTypedRuleContext(PrimaryContext::class, 0);
	    }

	    public function PLUSPLUS(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::PLUSPLUS, 0);
	    }

	    public function MINUSMINUS(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::MINUSMINUS, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterPrimary($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitPrimary($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitPrimary($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class QualifiedContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_qualified;
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function IDENTIFIER(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::IDENTIFIER);
	    	}

	        return $this->getToken(GolampiParser::IDENTIFIER, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterQualified($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitQualified($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitQualified($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArgumentListContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_argumentList;
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterArgumentList($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitArgumentList($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitArgumentList($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class TypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_type;
	    }

	    public function INT(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::INT, 0);
	    }

	    public function FLOATTYPE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::FLOATTYPE, 0);
	    }

	    public function BOOL(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::BOOL, 0);
	    }

	    public function STRINGTYPE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::STRINGTYPE, 0);
	    }

	    public function RUNETYPE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::RUNETYPE, 0);
	    }

	    public function pointerType(): ?PointerTypeContext
	    {
	    	return $this->getTypedRuleContext(PointerTypeContext::class, 0);
	    }

	    public function arrayType(): ?ArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(ArrayTypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class PointerTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_pointerType;
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterPointerType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitPointerType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitPointerType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 
}