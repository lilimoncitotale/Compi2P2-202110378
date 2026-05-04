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
               RULE_shortVarDecl = 12, RULE_assignment = 13, RULE_expresionStmt = 14, 
               RULE_ifStmt = 15, RULE_forStmt = 16, RULE_returnStmt = 17, 
               RULE_switchStmt = 18, RULE_switchCase = 19, RULE_breakStmt = 20, 
               RULE_continueStmt = 21, RULE_expression = 22, RULE_logicalOr = 23, 
               RULE_logicalAnd = 24, RULE_equality = 25, RULE_comparison = 26, 
               RULE_addition = 27, RULE_multiplication = 28, RULE_unary = 29, 
               RULE_primary = 30, RULE_qualified = 31, RULE_argumentList = 32, 
               RULE_type = 33, RULE_pointerType = 34;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'program', 'declaration', 'constDecl', 'functionDecl', 'parameterList', 
			'parameter', 'varDecl', 'arrayType', 'arrayLiteral', 'arrayElement', 
			'block', 'statement', 'shortVarDecl', 'assignment', 'expresionStmt', 
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
			[4, 1, 64, 510, 2, 0, 7, 0, 2, 1, 7, 1, 2, 2, 7, 2, 2, 3, 7, 3, 2, 4, 
		    7, 4, 2, 5, 7, 5, 2, 6, 7, 6, 2, 7, 7, 7, 2, 8, 7, 8, 2, 9, 7, 9, 
		    2, 10, 7, 10, 2, 11, 7, 11, 2, 12, 7, 12, 2, 13, 7, 13, 2, 14, 7, 
		    14, 2, 15, 7, 15, 2, 16, 7, 16, 2, 17, 7, 17, 2, 18, 7, 18, 2, 19, 
		    7, 19, 2, 20, 7, 20, 2, 21, 7, 21, 2, 22, 7, 22, 2, 23, 7, 23, 2, 
		    24, 7, 24, 2, 25, 7, 25, 2, 26, 7, 26, 2, 27, 7, 27, 2, 28, 7, 28, 
		    2, 29, 7, 29, 2, 30, 7, 30, 2, 31, 7, 31, 2, 32, 7, 32, 2, 33, 7, 
		    33, 2, 34, 7, 34, 1, 0, 5, 0, 72, 8, 0, 10, 0, 12, 0, 75, 9, 0, 1, 
		    0, 1, 0, 1, 1, 1, 1, 1, 1, 3, 1, 82, 8, 1, 1, 2, 1, 2, 1, 2, 3, 2, 
		    87, 8, 2, 1, 2, 1, 2, 1, 2, 1, 3, 1, 3, 1, 3, 1, 3, 3, 3, 96, 8, 3, 
		    1, 3, 1, 3, 3, 3, 100, 8, 3, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 3, 3, 107, 
		    8, 3, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 5, 3, 114, 8, 3, 10, 3, 12, 3, 
		    117, 9, 3, 1, 3, 1, 3, 1, 3, 3, 3, 122, 8, 3, 1, 4, 1, 4, 1, 4, 5, 
		    4, 127, 8, 4, 10, 4, 12, 4, 130, 9, 4, 1, 5, 1, 5, 1, 5, 1, 6, 1, 
		    6, 1, 6, 1, 6, 5, 6, 139, 8, 6, 10, 6, 12, 6, 142, 9, 6, 1, 6, 1, 
		    6, 1, 6, 1, 6, 1, 6, 5, 6, 149, 8, 6, 10, 6, 12, 6, 152, 9, 6, 3, 
		    6, 154, 8, 6, 1, 6, 1, 6, 1, 6, 1, 6, 1, 6, 3, 6, 161, 8, 6, 3, 6, 
		    163, 8, 6, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 
		    7, 3, 7, 175, 8, 7, 1, 8, 3, 8, 178, 8, 8, 1, 8, 1, 8, 1, 8, 1, 8, 
		    5, 8, 184, 8, 8, 10, 8, 12, 8, 187, 9, 8, 1, 8, 3, 8, 190, 8, 8, 1, 
		    8, 1, 8, 1, 9, 1, 9, 1, 9, 1, 9, 5, 9, 198, 8, 9, 10, 9, 12, 9, 201, 
		    9, 9, 1, 9, 3, 9, 204, 8, 9, 1, 9, 1, 9, 1, 9, 3, 9, 209, 8, 9, 1, 
		    10, 1, 10, 5, 10, 213, 8, 10, 10, 10, 12, 10, 216, 9, 10, 1, 10, 1, 
		    10, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 
		    1, 11, 1, 11, 1, 11, 1, 11, 3, 11, 233, 8, 11, 1, 12, 1, 12, 1, 12, 
		    5, 12, 238, 8, 12, 10, 12, 12, 12, 241, 9, 12, 1, 12, 1, 12, 1, 12, 
		    1, 12, 5, 12, 247, 8, 12, 10, 12, 12, 12, 250, 9, 12, 1, 13, 1, 13, 
		    1, 13, 1, 13, 1, 13, 4, 13, 257, 8, 13, 11, 13, 12, 13, 258, 1, 13, 
		    1, 13, 1, 13, 1, 13, 1, 13, 1, 13, 1, 13, 4, 13, 268, 8, 13, 11, 13, 
		    12, 13, 269, 1, 13, 1, 13, 1, 13, 1, 13, 1, 13, 1, 13, 1, 13, 1, 13, 
		    1, 13, 3, 13, 281, 8, 13, 1, 14, 1, 14, 1, 15, 1, 15, 1, 15, 1, 15, 
		    1, 15, 1, 15, 3, 15, 291, 8, 15, 3, 15, 293, 8, 15, 1, 16, 1, 16, 
		    3, 16, 297, 8, 16, 1, 16, 1, 16, 1, 16, 1, 16, 1, 16, 1, 16, 1, 16, 
		    3, 16, 306, 8, 16, 1, 16, 1, 16, 3, 16, 310, 8, 16, 1, 17, 1, 17, 
		    1, 17, 1, 17, 5, 17, 316, 8, 17, 10, 17, 12, 17, 319, 9, 17, 3, 17, 
		    321, 8, 17, 1, 18, 1, 18, 3, 18, 325, 8, 18, 1, 18, 1, 18, 5, 18, 
		    329, 8, 18, 10, 18, 12, 18, 332, 9, 18, 1, 18, 1, 18, 1, 18, 1, 18, 
		    4, 18, 338, 8, 18, 11, 18, 12, 18, 339, 3, 18, 342, 8, 18, 3, 18, 
		    344, 8, 18, 1, 18, 1, 18, 1, 19, 1, 19, 1, 19, 1, 19, 5, 19, 352, 
		    8, 19, 10, 19, 12, 19, 355, 9, 19, 1, 19, 1, 19, 1, 19, 4, 19, 360, 
		    8, 19, 11, 19, 12, 19, 361, 3, 19, 364, 8, 19, 1, 20, 1, 20, 1, 21, 
		    1, 21, 1, 22, 1, 22, 1, 23, 1, 23, 1, 23, 5, 23, 375, 8, 23, 10, 23, 
		    12, 23, 378, 9, 23, 1, 24, 1, 24, 1, 24, 5, 24, 383, 8, 24, 10, 24, 
		    12, 24, 386, 9, 24, 1, 25, 1, 25, 1, 25, 5, 25, 391, 8, 25, 10, 25, 
		    12, 25, 394, 9, 25, 1, 26, 1, 26, 1, 26, 5, 26, 399, 8, 26, 10, 26, 
		    12, 26, 402, 9, 26, 1, 27, 1, 27, 1, 27, 5, 27, 407, 8, 27, 10, 27, 
		    12, 27, 410, 9, 27, 1, 28, 1, 28, 1, 28, 5, 28, 415, 8, 28, 10, 28, 
		    12, 28, 418, 9, 28, 1, 29, 1, 29, 1, 29, 1, 29, 1, 29, 1, 29, 1, 29, 
		    3, 29, 427, 8, 29, 1, 30, 1, 30, 1, 30, 1, 30, 1, 30, 1, 30, 1, 30, 
		    1, 30, 1, 30, 1, 30, 1, 30, 1, 30, 1, 30, 1, 30, 1, 30, 1, 30, 3, 
		    30, 445, 8, 30, 1, 30, 1, 30, 1, 30, 1, 30, 1, 30, 3, 30, 452, 8, 
		    30, 1, 30, 1, 30, 1, 30, 1, 30, 1, 30, 1, 30, 1, 30, 1, 30, 1, 30, 
		    1, 30, 1, 30, 1, 30, 5, 30, 466, 8, 30, 10, 30, 12, 30, 469, 9, 30, 
		    3, 30, 471, 8, 30, 1, 30, 1, 30, 1, 30, 1, 30, 5, 30, 477, 8, 30, 
		    10, 30, 12, 30, 480, 9, 30, 1, 31, 1, 31, 1, 31, 5, 31, 485, 8, 31, 
		    10, 31, 12, 31, 488, 9, 31, 1, 32, 1, 32, 1, 32, 5, 32, 493, 8, 32, 
		    10, 32, 12, 32, 496, 9, 32, 1, 33, 1, 33, 1, 33, 1, 33, 1, 33, 1, 
		    33, 1, 33, 3, 33, 505, 8, 33, 1, 34, 1, 34, 1, 34, 1, 34, 0, 1, 60, 
		    35, 0, 2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 26, 28, 30, 32, 
		    34, 36, 38, 40, 42, 44, 46, 48, 50, 52, 54, 56, 58, 60, 62, 64, 66, 
		    68, 0, 7, 1, 0, 50, 51, 1, 0, 52, 56, 1, 0, 12, 13, 1, 0, 14, 17, 
		    1, 0, 18, 19, 2, 0, 9, 9, 20, 21, 2, 0, 19, 19, 22, 22, 566, 0, 73, 
		    1, 0, 0, 0, 2, 81, 1, 0, 0, 0, 4, 83, 1, 0, 0, 0, 6, 121, 1, 0, 0, 
		    0, 8, 123, 1, 0, 0, 0, 10, 131, 1, 0, 0, 0, 12, 162, 1, 0, 0, 0, 14, 
		    174, 1, 0, 0, 0, 16, 177, 1, 0, 0, 0, 18, 208, 1, 0, 0, 0, 20, 210, 
		    1, 0, 0, 0, 22, 232, 1, 0, 0, 0, 24, 234, 1, 0, 0, 0, 26, 280, 1, 
		    0, 0, 0, 28, 282, 1, 0, 0, 0, 30, 284, 1, 0, 0, 0, 32, 309, 1, 0, 
		    0, 0, 34, 311, 1, 0, 0, 0, 36, 322, 1, 0, 0, 0, 38, 347, 1, 0, 0, 
		    0, 40, 365, 1, 0, 0, 0, 42, 367, 1, 0, 0, 0, 44, 369, 1, 0, 0, 0, 
		    46, 371, 1, 0, 0, 0, 48, 379, 1, 0, 0, 0, 50, 387, 1, 0, 0, 0, 52, 
		    395, 1, 0, 0, 0, 54, 403, 1, 0, 0, 0, 56, 411, 1, 0, 0, 0, 58, 426, 
		    1, 0, 0, 0, 60, 470, 1, 0, 0, 0, 62, 481, 1, 0, 0, 0, 64, 489, 1, 
		    0, 0, 0, 66, 504, 1, 0, 0, 0, 68, 506, 1, 0, 0, 0, 70, 72, 3, 2, 1, 
		    0, 71, 70, 1, 0, 0, 0, 72, 75, 1, 0, 0, 0, 73, 71, 1, 0, 0, 0, 73, 
		    74, 1, 0, 0, 0, 74, 76, 1, 0, 0, 0, 75, 73, 1, 0, 0, 0, 76, 77, 5, 
		    0, 0, 1, 77, 1, 1, 0, 0, 0, 78, 82, 3, 6, 3, 0, 79, 82, 3, 12, 6, 
		    0, 80, 82, 3, 4, 2, 0, 81, 78, 1, 0, 0, 0, 81, 79, 1, 0, 0, 0, 81, 
		    80, 1, 0, 0, 0, 82, 3, 1, 0, 0, 0, 83, 84, 5, 25, 0, 0, 84, 86, 5, 
		    60, 0, 0, 85, 87, 3, 66, 33, 0, 86, 85, 1, 0, 0, 0, 86, 87, 1, 0, 
		    0, 0, 87, 88, 1, 0, 0, 0, 88, 89, 5, 1, 0, 0, 89, 90, 3, 44, 22, 0, 
		    90, 5, 1, 0, 0, 0, 91, 92, 5, 26, 0, 0, 92, 93, 5, 60, 0, 0, 93, 95, 
		    5, 2, 0, 0, 94, 96, 3, 8, 4, 0, 95, 94, 1, 0, 0, 0, 95, 96, 1, 0, 
		    0, 0, 96, 97, 1, 0, 0, 0, 97, 99, 5, 3, 0, 0, 98, 100, 3, 66, 33, 
		    0, 99, 98, 1, 0, 0, 0, 99, 100, 1, 0, 0, 0, 100, 101, 1, 0, 0, 0, 
		    101, 122, 3, 20, 10, 0, 102, 103, 5, 26, 0, 0, 103, 104, 5, 60, 0, 
		    0, 104, 106, 5, 2, 0, 0, 105, 107, 3, 8, 4, 0, 106, 105, 1, 0, 0, 
		    0, 106, 107, 1, 0, 0, 0, 107, 108, 1, 0, 0, 0, 108, 109, 5, 3, 0, 
		    0, 109, 110, 5, 2, 0, 0, 110, 115, 3, 66, 33, 0, 111, 112, 5, 4, 0, 
		    0, 112, 114, 3, 66, 33, 0, 113, 111, 1, 0, 0, 0, 114, 117, 1, 0, 0, 
		    0, 115, 113, 1, 0, 0, 0, 115, 116, 1, 0, 0, 0, 116, 118, 1, 0, 0, 
		    0, 117, 115, 1, 0, 0, 0, 118, 119, 5, 3, 0, 0, 119, 120, 3, 20, 10, 
		    0, 120, 122, 1, 0, 0, 0, 121, 91, 1, 0, 0, 0, 121, 102, 1, 0, 0, 0, 
		    122, 7, 1, 0, 0, 0, 123, 128, 3, 10, 5, 0, 124, 125, 5, 4, 0, 0, 125, 
		    127, 3, 10, 5, 0, 126, 124, 1, 0, 0, 0, 127, 130, 1, 0, 0, 0, 128, 
		    126, 1, 0, 0, 0, 128, 129, 1, 0, 0, 0, 129, 9, 1, 0, 0, 0, 130, 128, 
		    1, 0, 0, 0, 131, 132, 5, 60, 0, 0, 132, 133, 3, 66, 33, 0, 133, 11, 
		    1, 0, 0, 0, 134, 135, 5, 27, 0, 0, 135, 140, 5, 60, 0, 0, 136, 137, 
		    5, 4, 0, 0, 137, 139, 5, 60, 0, 0, 138, 136, 1, 0, 0, 0, 139, 142, 
		    1, 0, 0, 0, 140, 138, 1, 0, 0, 0, 140, 141, 1, 0, 0, 0, 141, 143, 
		    1, 0, 0, 0, 142, 140, 1, 0, 0, 0, 143, 153, 3, 66, 33, 0, 144, 145, 
		    5, 1, 0, 0, 145, 150, 3, 44, 22, 0, 146, 147, 5, 4, 0, 0, 147, 149, 
		    3, 44, 22, 0, 148, 146, 1, 0, 0, 0, 149, 152, 1, 0, 0, 0, 150, 148, 
		    1, 0, 0, 0, 150, 151, 1, 0, 0, 0, 151, 154, 1, 0, 0, 0, 152, 150, 
		    1, 0, 0, 0, 153, 144, 1, 0, 0, 0, 153, 154, 1, 0, 0, 0, 154, 163, 
		    1, 0, 0, 0, 155, 156, 5, 27, 0, 0, 156, 157, 5, 60, 0, 0, 157, 160, 
		    3, 14, 7, 0, 158, 159, 5, 1, 0, 0, 159, 161, 3, 16, 8, 0, 160, 158, 
		    1, 0, 0, 0, 160, 161, 1, 0, 0, 0, 161, 163, 1, 0, 0, 0, 162, 134, 
		    1, 0, 0, 0, 162, 155, 1, 0, 0, 0, 163, 13, 1, 0, 0, 0, 164, 165, 5, 
		    5, 0, 0, 165, 166, 3, 44, 22, 0, 166, 167, 5, 6, 0, 0, 167, 168, 3, 
		    14, 7, 0, 168, 175, 1, 0, 0, 0, 169, 170, 5, 5, 0, 0, 170, 171, 3, 
		    44, 22, 0, 171, 172, 5, 6, 0, 0, 172, 173, 3, 66, 33, 0, 173, 175, 
		    1, 0, 0, 0, 174, 164, 1, 0, 0, 0, 174, 169, 1, 0, 0, 0, 175, 15, 1, 
		    0, 0, 0, 176, 178, 3, 14, 7, 0, 177, 176, 1, 0, 0, 0, 177, 178, 1, 
		    0, 0, 0, 178, 179, 1, 0, 0, 0, 179, 180, 5, 7, 0, 0, 180, 185, 3, 
		    18, 9, 0, 181, 182, 5, 4, 0, 0, 182, 184, 3, 18, 9, 0, 183, 181, 1, 
		    0, 0, 0, 184, 187, 1, 0, 0, 0, 185, 183, 1, 0, 0, 0, 185, 186, 1, 
		    0, 0, 0, 186, 189, 1, 0, 0, 0, 187, 185, 1, 0, 0, 0, 188, 190, 5, 
		    4, 0, 0, 189, 188, 1, 0, 0, 0, 189, 190, 1, 0, 0, 0, 190, 191, 1, 
		    0, 0, 0, 191, 192, 5, 8, 0, 0, 192, 17, 1, 0, 0, 0, 193, 194, 5, 7, 
		    0, 0, 194, 199, 3, 18, 9, 0, 195, 196, 5, 4, 0, 0, 196, 198, 3, 18, 
		    9, 0, 197, 195, 1, 0, 0, 0, 198, 201, 1, 0, 0, 0, 199, 197, 1, 0, 
		    0, 0, 199, 200, 1, 0, 0, 0, 200, 203, 1, 0, 0, 0, 201, 199, 1, 0, 
		    0, 0, 202, 204, 5, 4, 0, 0, 203, 202, 1, 0, 0, 0, 203, 204, 1, 0, 
		    0, 0, 204, 205, 1, 0, 0, 0, 205, 206, 5, 8, 0, 0, 206, 209, 1, 0, 
		    0, 0, 207, 209, 3, 44, 22, 0, 208, 193, 1, 0, 0, 0, 208, 207, 1, 0, 
		    0, 0, 209, 19, 1, 0, 0, 0, 210, 214, 5, 7, 0, 0, 211, 213, 3, 22, 
		    11, 0, 212, 211, 1, 0, 0, 0, 213, 216, 1, 0, 0, 0, 214, 212, 1, 0, 
		    0, 0, 214, 215, 1, 0, 0, 0, 215, 217, 1, 0, 0, 0, 216, 214, 1, 0, 
		    0, 0, 217, 218, 5, 8, 0, 0, 218, 21, 1, 0, 0, 0, 219, 233, 3, 12, 
		    6, 0, 220, 233, 3, 4, 2, 0, 221, 233, 3, 36, 18, 0, 222, 233, 3, 28, 
		    14, 0, 223, 233, 3, 24, 12, 0, 224, 233, 3, 26, 13, 0, 225, 233, 3, 
		    30, 15, 0, 226, 233, 3, 32, 16, 0, 227, 233, 3, 34, 17, 0, 228, 233, 
		    3, 40, 20, 0, 229, 233, 3, 42, 21, 0, 230, 233, 3, 28, 14, 0, 231, 
		    233, 3, 20, 10, 0, 232, 219, 1, 0, 0, 0, 232, 220, 1, 0, 0, 0, 232, 
		    221, 1, 0, 0, 0, 232, 222, 1, 0, 0, 0, 232, 223, 1, 0, 0, 0, 232, 
		    224, 1, 0, 0, 0, 232, 225, 1, 0, 0, 0, 232, 226, 1, 0, 0, 0, 232, 
		    227, 1, 0, 0, 0, 232, 228, 1, 0, 0, 0, 232, 229, 1, 0, 0, 0, 232, 
		    230, 1, 0, 0, 0, 232, 231, 1, 0, 0, 0, 233, 23, 1, 0, 0, 0, 234, 239, 
		    5, 60, 0, 0, 235, 236, 5, 4, 0, 0, 236, 238, 5, 60, 0, 0, 237, 235, 
		    1, 0, 0, 0, 238, 241, 1, 0, 0, 0, 239, 237, 1, 0, 0, 0, 239, 240, 
		    1, 0, 0, 0, 240, 242, 1, 0, 0, 0, 241, 239, 1, 0, 0, 0, 242, 243, 
		    5, 59, 0, 0, 243, 248, 3, 44, 22, 0, 244, 245, 5, 4, 0, 0, 245, 247, 
		    3, 44, 22, 0, 246, 244, 1, 0, 0, 0, 247, 250, 1, 0, 0, 0, 248, 246, 
		    1, 0, 0, 0, 248, 249, 1, 0, 0, 0, 249, 25, 1, 0, 0, 0, 250, 248, 1, 
		    0, 0, 0, 251, 256, 5, 60, 0, 0, 252, 253, 5, 5, 0, 0, 253, 254, 3, 
		    44, 22, 0, 254, 255, 5, 6, 0, 0, 255, 257, 1, 0, 0, 0, 256, 252, 1, 
		    0, 0, 0, 257, 258, 1, 0, 0, 0, 258, 256, 1, 0, 0, 0, 258, 259, 1, 
		    0, 0, 0, 259, 260, 1, 0, 0, 0, 260, 261, 5, 1, 0, 0, 261, 262, 3, 
		    44, 22, 0, 262, 281, 1, 0, 0, 0, 263, 264, 5, 60, 0, 0, 264, 265, 
		    5, 1, 0, 0, 265, 281, 3, 44, 22, 0, 266, 268, 5, 9, 0, 0, 267, 266, 
		    1, 0, 0, 0, 268, 269, 1, 0, 0, 0, 269, 267, 1, 0, 0, 0, 269, 270, 
		    1, 0, 0, 0, 270, 271, 1, 0, 0, 0, 271, 272, 5, 60, 0, 0, 272, 273, 
		    5, 1, 0, 0, 273, 281, 3, 44, 22, 0, 274, 275, 3, 60, 30, 0, 275, 276, 
		    7, 0, 0, 0, 276, 281, 1, 0, 0, 0, 277, 278, 5, 60, 0, 0, 278, 279, 
		    7, 1, 0, 0, 279, 281, 3, 44, 22, 0, 280, 251, 1, 0, 0, 0, 280, 263, 
		    1, 0, 0, 0, 280, 267, 1, 0, 0, 0, 280, 274, 1, 0, 0, 0, 280, 277, 
		    1, 0, 0, 0, 281, 27, 1, 0, 0, 0, 282, 283, 3, 44, 22, 0, 283, 29, 
		    1, 0, 0, 0, 284, 285, 5, 31, 0, 0, 285, 286, 3, 44, 22, 0, 286, 292, 
		    3, 20, 10, 0, 287, 290, 5, 32, 0, 0, 288, 291, 3, 30, 15, 0, 289, 
		    291, 3, 20, 10, 0, 290, 288, 1, 0, 0, 0, 290, 289, 1, 0, 0, 0, 291, 
		    293, 1, 0, 0, 0, 292, 287, 1, 0, 0, 0, 292, 293, 1, 0, 0, 0, 293, 
		    31, 1, 0, 0, 0, 294, 296, 5, 33, 0, 0, 295, 297, 3, 44, 22, 0, 296, 
		    295, 1, 0, 0, 0, 296, 297, 1, 0, 0, 0, 297, 298, 1, 0, 0, 0, 298, 
		    310, 3, 20, 10, 0, 299, 300, 5, 33, 0, 0, 300, 301, 3, 24, 12, 0, 
		    301, 302, 5, 10, 0, 0, 302, 303, 3, 44, 22, 0, 303, 305, 5, 10, 0, 
		    0, 304, 306, 3, 22, 11, 0, 305, 304, 1, 0, 0, 0, 305, 306, 1, 0, 0, 
		    0, 306, 307, 1, 0, 0, 0, 307, 308, 3, 20, 10, 0, 308, 310, 1, 0, 0, 
		    0, 309, 294, 1, 0, 0, 0, 309, 299, 1, 0, 0, 0, 310, 33, 1, 0, 0, 0, 
		    311, 320, 5, 34, 0, 0, 312, 317, 3, 44, 22, 0, 313, 314, 5, 4, 0, 
		    0, 314, 316, 3, 44, 22, 0, 315, 313, 1, 0, 0, 0, 316, 319, 1, 0, 0, 
		    0, 317, 315, 1, 0, 0, 0, 317, 318, 1, 0, 0, 0, 318, 321, 1, 0, 0, 
		    0, 319, 317, 1, 0, 0, 0, 320, 312, 1, 0, 0, 0, 320, 321, 1, 0, 0, 
		    0, 321, 35, 1, 0, 0, 0, 322, 324, 5, 28, 0, 0, 323, 325, 3, 44, 22, 
		    0, 324, 323, 1, 0, 0, 0, 324, 325, 1, 0, 0, 0, 325, 326, 1, 0, 0, 
		    0, 326, 330, 5, 7, 0, 0, 327, 329, 3, 38, 19, 0, 328, 327, 1, 0, 0, 
		    0, 329, 332, 1, 0, 0, 0, 330, 328, 1, 0, 0, 0, 330, 331, 1, 0, 0, 
		    0, 331, 343, 1, 0, 0, 0, 332, 330, 1, 0, 0, 0, 333, 334, 5, 30, 0, 
		    0, 334, 341, 5, 11, 0, 0, 335, 342, 3, 20, 10, 0, 336, 338, 3, 22, 
		    11, 0, 337, 336, 1, 0, 0, 0, 338, 339, 1, 0, 0, 0, 339, 337, 1, 0, 
		    0, 0, 339, 340, 1, 0, 0, 0, 340, 342, 1, 0, 0, 0, 341, 335, 1, 0, 
		    0, 0, 341, 337, 1, 0, 0, 0, 342, 344, 1, 0, 0, 0, 343, 333, 1, 0, 
		    0, 0, 343, 344, 1, 0, 0, 0, 344, 345, 1, 0, 0, 0, 345, 346, 5, 8, 
		    0, 0, 346, 37, 1, 0, 0, 0, 347, 348, 5, 29, 0, 0, 348, 353, 3, 44, 
		    22, 0, 349, 350, 5, 4, 0, 0, 350, 352, 3, 44, 22, 0, 351, 349, 1, 
		    0, 0, 0, 352, 355, 1, 0, 0, 0, 353, 351, 1, 0, 0, 0, 353, 354, 1, 
		    0, 0, 0, 354, 356, 1, 0, 0, 0, 355, 353, 1, 0, 0, 0, 356, 363, 5, 
		    11, 0, 0, 357, 364, 3, 20, 10, 0, 358, 360, 3, 22, 11, 0, 359, 358, 
		    1, 0, 0, 0, 360, 361, 1, 0, 0, 0, 361, 359, 1, 0, 0, 0, 361, 362, 
		    1, 0, 0, 0, 362, 364, 1, 0, 0, 0, 363, 357, 1, 0, 0, 0, 363, 359, 
		    1, 0, 0, 0, 364, 39, 1, 0, 0, 0, 365, 366, 5, 35, 0, 0, 366, 41, 1, 
		    0, 0, 0, 367, 368, 5, 36, 0, 0, 368, 43, 1, 0, 0, 0, 369, 370, 3, 
		    46, 23, 0, 370, 45, 1, 0, 0, 0, 371, 376, 3, 48, 24, 0, 372, 373, 
		    5, 58, 0, 0, 373, 375, 3, 48, 24, 0, 374, 372, 1, 0, 0, 0, 375, 378, 
		    1, 0, 0, 0, 376, 374, 1, 0, 0, 0, 376, 377, 1, 0, 0, 0, 377, 47, 1, 
		    0, 0, 0, 378, 376, 1, 0, 0, 0, 379, 384, 3, 50, 25, 0, 380, 381, 5, 
		    57, 0, 0, 381, 383, 3, 50, 25, 0, 382, 380, 1, 0, 0, 0, 383, 386, 
		    1, 0, 0, 0, 384, 382, 1, 0, 0, 0, 384, 385, 1, 0, 0, 0, 385, 49, 1, 
		    0, 0, 0, 386, 384, 1, 0, 0, 0, 387, 392, 3, 52, 26, 0, 388, 389, 7, 
		    2, 0, 0, 389, 391, 3, 52, 26, 0, 390, 388, 1, 0, 0, 0, 391, 394, 1, 
		    0, 0, 0, 392, 390, 1, 0, 0, 0, 392, 393, 1, 0, 0, 0, 393, 51, 1, 0, 
		    0, 0, 394, 392, 1, 0, 0, 0, 395, 400, 3, 54, 27, 0, 396, 397, 7, 3, 
		    0, 0, 397, 399, 3, 54, 27, 0, 398, 396, 1, 0, 0, 0, 399, 402, 1, 0, 
		    0, 0, 400, 398, 1, 0, 0, 0, 400, 401, 1, 0, 0, 0, 401, 53, 1, 0, 0, 
		    0, 402, 400, 1, 0, 0, 0, 403, 408, 3, 56, 28, 0, 404, 405, 7, 4, 0, 
		    0, 405, 407, 3, 56, 28, 0, 406, 404, 1, 0, 0, 0, 407, 410, 1, 0, 0, 
		    0, 408, 406, 1, 0, 0, 0, 408, 409, 1, 0, 0, 0, 409, 55, 1, 0, 0, 0, 
		    410, 408, 1, 0, 0, 0, 411, 416, 3, 58, 29, 0, 412, 413, 7, 5, 0, 0, 
		    413, 415, 3, 58, 29, 0, 414, 412, 1, 0, 0, 0, 415, 418, 1, 0, 0, 0, 
		    416, 414, 1, 0, 0, 0, 416, 417, 1, 0, 0, 0, 417, 57, 1, 0, 0, 0, 418, 
		    416, 1, 0, 0, 0, 419, 420, 7, 6, 0, 0, 420, 427, 3, 58, 29, 0, 421, 
		    422, 5, 23, 0, 0, 422, 427, 3, 58, 29, 0, 423, 424, 5, 9, 0, 0, 424, 
		    427, 3, 58, 29, 0, 425, 427, 3, 60, 30, 0, 426, 419, 1, 0, 0, 0, 426, 
		    421, 1, 0, 0, 0, 426, 423, 1, 0, 0, 0, 426, 425, 1, 0, 0, 0, 427, 
		    59, 1, 0, 0, 0, 428, 429, 6, 30, -1, 0, 429, 471, 5, 46, 0, 0, 430, 
		    471, 5, 47, 0, 0, 431, 471, 5, 48, 0, 0, 432, 471, 5, 49, 0, 0, 433, 
		    471, 5, 37, 0, 0, 434, 471, 5, 38, 0, 0, 435, 471, 5, 40, 0, 0, 436, 
		    437, 5, 39, 0, 0, 437, 438, 5, 2, 0, 0, 438, 439, 3, 44, 22, 0, 439, 
		    440, 5, 3, 0, 0, 440, 471, 1, 0, 0, 0, 441, 442, 3, 62, 31, 0, 442, 
		    444, 5, 2, 0, 0, 443, 445, 3, 64, 32, 0, 444, 443, 1, 0, 0, 0, 444, 
		    445, 1, 0, 0, 0, 445, 446, 1, 0, 0, 0, 446, 447, 5, 3, 0, 0, 447, 
		    471, 1, 0, 0, 0, 448, 449, 3, 66, 33, 0, 449, 451, 5, 2, 0, 0, 450, 
		    452, 3, 64, 32, 0, 451, 450, 1, 0, 0, 0, 451, 452, 1, 0, 0, 0, 452, 
		    453, 1, 0, 0, 0, 453, 454, 5, 3, 0, 0, 454, 471, 1, 0, 0, 0, 455, 
		    471, 3, 62, 31, 0, 456, 457, 5, 2, 0, 0, 457, 458, 3, 44, 22, 0, 458, 
		    459, 5, 3, 0, 0, 459, 471, 1, 0, 0, 0, 460, 467, 3, 62, 31, 0, 461, 
		    462, 5, 5, 0, 0, 462, 463, 3, 44, 22, 0, 463, 464, 5, 6, 0, 0, 464, 
		    466, 1, 0, 0, 0, 465, 461, 1, 0, 0, 0, 466, 469, 1, 0, 0, 0, 467, 
		    465, 1, 0, 0, 0, 467, 468, 1, 0, 0, 0, 468, 471, 1, 0, 0, 0, 469, 
		    467, 1, 0, 0, 0, 470, 428, 1, 0, 0, 0, 470, 430, 1, 0, 0, 0, 470, 
		    431, 1, 0, 0, 0, 470, 432, 1, 0, 0, 0, 470, 433, 1, 0, 0, 0, 470, 
		    434, 1, 0, 0, 0, 470, 435, 1, 0, 0, 0, 470, 436, 1, 0, 0, 0, 470, 
		    441, 1, 0, 0, 0, 470, 448, 1, 0, 0, 0, 470, 455, 1, 0, 0, 0, 470, 
		    456, 1, 0, 0, 0, 470, 460, 1, 0, 0, 0, 471, 478, 1, 0, 0, 0, 472, 
		    473, 10, 2, 0, 0, 473, 477, 5, 50, 0, 0, 474, 475, 10, 1, 0, 0, 475, 
		    477, 5, 51, 0, 0, 476, 472, 1, 0, 0, 0, 476, 474, 1, 0, 0, 0, 477, 
		    480, 1, 0, 0, 0, 478, 476, 1, 0, 0, 0, 478, 479, 1, 0, 0, 0, 479, 
		    61, 1, 0, 0, 0, 480, 478, 1, 0, 0, 0, 481, 486, 5, 60, 0, 0, 482, 
		    483, 5, 24, 0, 0, 483, 485, 5, 60, 0, 0, 484, 482, 1, 0, 0, 0, 485, 
		    488, 1, 0, 0, 0, 486, 484, 1, 0, 0, 0, 486, 487, 1, 0, 0, 0, 487, 
		    63, 1, 0, 0, 0, 488, 486, 1, 0, 0, 0, 489, 494, 3, 44, 22, 0, 490, 
		    491, 5, 4, 0, 0, 491, 493, 3, 44, 22, 0, 492, 490, 1, 0, 0, 0, 493, 
		    496, 1, 0, 0, 0, 494, 492, 1, 0, 0, 0, 494, 495, 1, 0, 0, 0, 495, 
		    65, 1, 0, 0, 0, 496, 494, 1, 0, 0, 0, 497, 505, 5, 41, 0, 0, 498, 
		    505, 5, 42, 0, 0, 499, 505, 5, 43, 0, 0, 500, 505, 5, 44, 0, 0, 501, 
		    505, 5, 45, 0, 0, 502, 505, 3, 68, 34, 0, 503, 505, 3, 14, 7, 0, 504, 
		    497, 1, 0, 0, 0, 504, 498, 1, 0, 0, 0, 504, 499, 1, 0, 0, 0, 504, 
		    500, 1, 0, 0, 0, 504, 501, 1, 0, 0, 0, 504, 502, 1, 0, 0, 0, 504, 
		    503, 1, 0, 0, 0, 505, 67, 1, 0, 0, 0, 506, 507, 5, 9, 0, 0, 507, 508, 
		    3, 66, 33, 0, 508, 69, 1, 0, 0, 0, 59, 73, 81, 86, 95, 99, 106, 115, 
		    121, 128, 140, 150, 153, 160, 162, 174, 177, 185, 189, 199, 203, 208, 
		    214, 232, 239, 248, 258, 269, 280, 290, 292, 296, 305, 309, 317, 320, 
		    324, 330, 339, 341, 343, 353, 361, 363, 376, 384, 392, 400, 408, 416, 
		    426, 444, 451, 467, 470, 476, 478, 486, 494, 504];
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
		        $this->setState(73);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 234881024) !== 0)) {
		        	$this->setState(70);
		        	$this->declaration();
		        	$this->setState(75);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(76);
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
		        $this->setState(81);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::FUNC:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(78);
		            	$this->functionDecl();
		            	break;

		            case self::VAR:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(79);
		            	$this->varDecl();
		            	break;

		            case self::CONST:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(80);
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
		        $this->setState(83);
		        $this->match(self::CONST);
		        $this->setState(84);
		        $this->match(self::IDENTIFIER);
		        $this->setState(86);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 68169720922656) !== 0)) {
		        	$this->setState(85);
		        	$this->type();
		        }
		        $this->setState(88);
		        $this->match(self::T__0);
		        $this->setState(89);
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
		        $this->setState(121);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 7, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(91);
		        	    $this->match(self::FUNC);
		        	    $this->setState(92);
		        	    $this->match(self::IDENTIFIER);
		        	    $this->setState(93);
		        	    $this->match(self::T__1);
		        	    $this->setState(95);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::IDENTIFIER) {
		        	    	$this->setState(94);
		        	    	$this->parameterList();
		        	    }
		        	    $this->setState(97);
		        	    $this->match(self::T__2);
		        	    $this->setState(99);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 68169720922656) !== 0)) {
		        	    	$this->setState(98);
		        	    	$this->type();
		        	    }
		        	    $this->setState(101);
		        	    $this->block();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(102);
		        	    $this->match(self::FUNC);
		        	    $this->setState(103);
		        	    $this->match(self::IDENTIFIER);
		        	    $this->setState(104);
		        	    $this->match(self::T__1);
		        	    $this->setState(106);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::IDENTIFIER) {
		        	    	$this->setState(105);
		        	    	$this->parameterList();
		        	    }
		        	    $this->setState(108);
		        	    $this->match(self::T__2);
		        	    $this->setState(109);
		        	    $this->match(self::T__1);
		        	    $this->setState(110);
		        	    $this->type();
		        	    $this->setState(115);
		        	    $this->errorHandler->sync($this);

		        	    $_la = $this->input->LA(1);
		        	    while ($_la === self::T__3) {
		        	    	$this->setState(111);
		        	    	$this->match(self::T__3);
		        	    	$this->setState(112);
		        	    	$this->type();
		        	    	$this->setState(117);
		        	    	$this->errorHandler->sync($this);
		        	    	$_la = $this->input->LA(1);
		        	    }
		        	    $this->setState(118);
		        	    $this->match(self::T__2);
		        	    $this->setState(119);
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
		        $this->setState(123);
		        $this->parameter();
		        $this->setState(128);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__3) {
		        	$this->setState(124);
		        	$this->match(self::T__3);
		        	$this->setState(125);
		        	$this->parameter();
		        	$this->setState(130);
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
		        $this->setState(131);
		        $this->match(self::IDENTIFIER);
		        $this->setState(132);
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
		        $this->setState(162);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 13, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(134);
		        	    $this->match(self::VAR);
		        	    $this->setState(135);
		        	    $this->match(self::IDENTIFIER);
		        	    $this->setState(140);
		        	    $this->errorHandler->sync($this);

		        	    $_la = $this->input->LA(1);
		        	    while ($_la === self::T__3) {
		        	    	$this->setState(136);
		        	    	$this->match(self::T__3);
		        	    	$this->setState(137);
		        	    	$this->match(self::IDENTIFIER);
		        	    	$this->setState(142);
		        	    	$this->errorHandler->sync($this);
		        	    	$_la = $this->input->LA(1);
		        	    }
		        	    $this->setState(143);
		        	    $this->type();
		        	    $this->setState(153);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__0) {
		        	    	$this->setState(144);
		        	    	$this->match(self::T__0);
		        	    	$this->setState(145);
		        	    	$this->expression();
		        	    	$this->setState(150);
		        	    	$this->errorHandler->sync($this);

		        	    	$_la = $this->input->LA(1);
		        	    	while ($_la === self::T__3) {
		        	    		$this->setState(146);
		        	    		$this->match(self::T__3);
		        	    		$this->setState(147);
		        	    		$this->expression();
		        	    		$this->setState(152);
		        	    		$this->errorHandler->sync($this);
		        	    		$_la = $this->input->LA(1);
		        	    	}
		        	    }
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(155);
		        	    $this->match(self::VAR);
		        	    $this->setState(156);
		        	    $this->match(self::IDENTIFIER);
		        	    $this->setState(157);
		        	    $this->arrayType();
		        	    $this->setState(160);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__0) {
		        	    	$this->setState(158);
		        	    	$this->match(self::T__0);
		        	    	$this->setState(159);
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
		        $this->setState(174);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 14, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(164);
		        	    $this->match(self::T__4);
		        	    $this->setState(165);
		        	    $this->expression();
		        	    $this->setState(166);
		        	    $this->match(self::T__5);
		        	    $this->setState(167);
		        	    $this->arrayType();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(169);
		        	    $this->match(self::T__4);
		        	    $this->setState(170);
		        	    $this->expression();
		        	    $this->setState(171);
		        	    $this->match(self::T__5);
		        	    $this->setState(172);
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
		        $this->setState(177);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__4) {
		        	$this->setState(176);
		        	$this->arrayType();
		        }
		        $this->setState(179);
		        $this->match(self::T__6);
		        $this->setState(180);
		        $this->arrayElement();
		        $this->setState(185);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 16, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(181);
		        		$this->match(self::T__3);
		        		$this->setState(182);
		        		$this->arrayElement(); 
		        	}

		        	$this->setState(187);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 16, $this->ctx);
		        }
		        $this->setState(189);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__3) {
		        	$this->setState(188);
		        	$this->match(self::T__3);
		        }
		        $this->setState(191);
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
		        $this->setState(208);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__6:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(193);
		            	$this->match(self::T__6);
		            	$this->setState(194);
		            	$this->arrayElement();
		            	$this->setState(199);
		            	$this->errorHandler->sync($this);

		            	$alt = $this->getInterpreter()->adaptivePredict($this->input, 18, $this->ctx);

		            	while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		            		if ($alt === 1) {
		            			$this->setState(195);
		            			$this->match(self::T__3);
		            			$this->setState(196);
		            			$this->arrayElement(); 
		            		}

		            		$this->setState(201);
		            		$this->errorHandler->sync($this);

		            		$alt = $this->getInterpreter()->adaptivePredict($this->input, 18, $this->ctx);
		            	}
		            	$this->setState(203);
		            	$this->errorHandler->sync($this);
		            	$_la = $this->input->LA(1);

		            	if ($_la === self::T__3) {
		            		$this->setState(202);
		            		$this->match(self::T__3);
		            	}
		            	$this->setState(205);
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
		            	$this->setState(207);
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
		        $this->setState(210);
		        $this->match(self::T__6);
		        $this->setState(214);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 1154047398520554148) !== 0)) {
		        	$this->setState(211);
		        	$this->statement();
		        	$this->setState(216);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(217);
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
		        $this->setState(232);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 22, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(219);
		        	    $this->varDecl();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(220);
		        	    $this->constDecl();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(221);
		        	    $this->switchStmt();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(222);
		        	    $this->expresionStmt();
		        	break;

		        	case 5:
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(223);
		        	    $this->shortVarDecl();
		        	break;

		        	case 6:
		        	    $this->enterOuterAlt($localContext, 6);
		        	    $this->setState(224);
		        	    $this->assignment();
		        	break;

		        	case 7:
		        	    $this->enterOuterAlt($localContext, 7);
		        	    $this->setState(225);
		        	    $this->ifStmt();
		        	break;

		        	case 8:
		        	    $this->enterOuterAlt($localContext, 8);
		        	    $this->setState(226);
		        	    $this->forStmt();
		        	break;

		        	case 9:
		        	    $this->enterOuterAlt($localContext, 9);
		        	    $this->setState(227);
		        	    $this->returnStmt();
		        	break;

		        	case 10:
		        	    $this->enterOuterAlt($localContext, 10);
		        	    $this->setState(228);
		        	    $this->breakStmt();
		        	break;

		        	case 11:
		        	    $this->enterOuterAlt($localContext, 11);
		        	    $this->setState(229);
		        	    $this->continueStmt();
		        	break;

		        	case 12:
		        	    $this->enterOuterAlt($localContext, 12);
		        	    $this->setState(230);
		        	    $this->expresionStmt();
		        	break;

		        	case 13:
		        	    $this->enterOuterAlt($localContext, 13);
		        	    $this->setState(231);
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
		        $this->setState(234);
		        $this->match(self::IDENTIFIER);
		        $this->setState(239);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__3) {
		        	$this->setState(235);
		        	$this->match(self::T__3);
		        	$this->setState(236);
		        	$this->match(self::IDENTIFIER);
		        	$this->setState(241);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(242);
		        $this->match(self::ASSIGN_SHORT);
		        $this->setState(243);
		        $this->expression();
		        $this->setState(248);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__3) {
		        	$this->setState(244);
		        	$this->match(self::T__3);
		        	$this->setState(245);
		        	$this->expression();
		        	$this->setState(250);
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
		public function assignment(): Context\AssignmentContext
		{
		    $localContext = new Context\AssignmentContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 26, self::RULE_assignment);

		    try {
		        $this->setState(280);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 27, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(251);
		        	    $this->match(self::IDENTIFIER);
		        	    $this->setState(256); 
		        	    $this->errorHandler->sync($this);

		        	    $_la = $this->input->LA(1);
		        	    do {
		        	    	$this->setState(252);
		        	    	$this->match(self::T__4);
		        	    	$this->setState(253);
		        	    	$this->expression();
		        	    	$this->setState(254);
		        	    	$this->match(self::T__5);
		        	    	$this->setState(258); 
		        	    	$this->errorHandler->sync($this);
		        	    	$_la = $this->input->LA(1);
		        	    } while ($_la === self::T__4);
		        	    $this->setState(260);
		        	    $this->match(self::T__0);
		        	    $this->setState(261);
		        	    $this->expression();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(263);
		        	    $this->match(self::IDENTIFIER);
		        	    $this->setState(264);
		        	    $this->match(self::T__0);
		        	    $this->setState(265);
		        	    $this->expression();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(267); 
		        	    $this->errorHandler->sync($this);

		        	    $_la = $this->input->LA(1);
		        	    do {
		        	    	$this->setState(266);
		        	    	$this->match(self::T__8);
		        	    	$this->setState(269); 
		        	    	$this->errorHandler->sync($this);
		        	    	$_la = $this->input->LA(1);
		        	    } while ($_la === self::T__8);
		        	    $this->setState(271);
		        	    $this->match(self::IDENTIFIER);
		        	    $this->setState(272);
		        	    $this->match(self::T__0);
		        	    $this->setState(273);
		        	    $this->expression();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(274);
		        	    $this->recursivePrimary(0);
		        	    $this->setState(275);

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
		        	    $this->setState(277);
		        	    $this->match(self::IDENTIFIER);
		        	    $this->setState(278);

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
		        	    $this->setState(279);
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

		    $this->enterRule($localContext, 28, self::RULE_expresionStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(282);
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

		    $this->enterRule($localContext, 30, self::RULE_ifStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(284);
		        $this->match(self::IF);
		        $this->setState(285);
		        $this->expression();
		        $this->setState(286);
		        $this->block();
		        $this->setState(292);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::ELSE) {
		        	$this->setState(287);
		        	$this->match(self::ELSE);
		        	$this->setState(290);
		        	$this->errorHandler->sync($this);

		        	switch ($this->input->LA(1)) {
		        	    case self::IF:
		        	    	$this->setState(288);
		        	    	$this->ifStmt();
		        	    	break;

		        	    case self::T__6:
		        	    	$this->setState(289);
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

		    $this->enterRule($localContext, 32, self::RULE_forStmt);

		    try {
		        $this->setState(309);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 32, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(294);
		        	    $this->match(self::FOR);
		        	    $this->setState(296);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 1154047267087843876) !== 0)) {
		        	    	$this->setState(295);
		        	    	$this->expression();
		        	    }
		        	    $this->setState(298);
		        	    $this->block();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(299);
		        	    $this->match(self::FOR);
		        	    $this->setState(300);
		        	    $this->shortVarDecl();
		        	    $this->setState(301);
		        	    $this->match(self::T__9);
		        	    $this->setState(302);
		        	    $this->expression();
		        	    $this->setState(303);
		        	    $this->match(self::T__9);
		        	    $this->setState(305);
		        	    $this->errorHandler->sync($this);

		        	    switch ($this->getInterpreter()->adaptivePredict($this->input, 31, $this->ctx)) {
		        	        case 1:
		        	    	    $this->setState(304);
		        	    	    $this->statement();
		        	    	break;
		        	    }
		        	    $this->setState(307);
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

		    $this->enterRule($localContext, 34, self::RULE_returnStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(311);
		        $this->match(self::RETURN);
		        $this->setState(320);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 34, $this->ctx)) {
		            case 1:
		        	    $this->setState(312);
		        	    $this->expression();
		        	    $this->setState(317);
		        	    $this->errorHandler->sync($this);

		        	    $_la = $this->input->LA(1);
		        	    while ($_la === self::T__3) {
		        	    	$this->setState(313);
		        	    	$this->match(self::T__3);
		        	    	$this->setState(314);
		        	    	$this->expression();
		        	    	$this->setState(319);
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

		    $this->enterRule($localContext, 36, self::RULE_switchStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(322);
		        $this->match(self::SWITCH);
		        $this->setState(324);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 1154047267087843876) !== 0)) {
		        	$this->setState(323);
		        	$this->expression();
		        }
		        $this->setState(326);
		        $this->match(self::T__6);
		        $this->setState(330);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::CASE) {
		        	$this->setState(327);
		        	$this->switchCase();
		        	$this->setState(332);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(343);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::DEFAULT) {
		        	$this->setState(333);
		        	$this->match(self::DEFAULT);
		        	$this->setState(334);
		        	$this->match(self::T__10);
		        	$this->setState(341);
		        	$this->errorHandler->sync($this);

		        	switch ($this->getInterpreter()->adaptivePredict($this->input, 38, $this->ctx)) {
		        		case 1:
		        		    $this->setState(335);
		        		    $this->block();
		        		break;

		        		case 2:
		        		    $this->setState(337); 
		        		    $this->errorHandler->sync($this);

		        		    $_la = $this->input->LA(1);
		        		    do {
		        		    	$this->setState(336);
		        		    	$this->statement();
		        		    	$this->setState(339); 
		        		    	$this->errorHandler->sync($this);
		        		    	$_la = $this->input->LA(1);
		        		    } while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 1154047398520554148) !== 0));
		        		break;
		        	}
		        }
		        $this->setState(345);
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

		    $this->enterRule($localContext, 38, self::RULE_switchCase);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(347);
		        $this->match(self::CASE);
		        $this->setState(348);
		        $this->expression();
		        $this->setState(353);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__3) {
		        	$this->setState(349);
		        	$this->match(self::T__3);
		        	$this->setState(350);
		        	$this->expression();
		        	$this->setState(355);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(356);
		        $this->match(self::T__10);
		        $this->setState(363);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 42, $this->ctx)) {
		        	case 1:
		        	    $this->setState(357);
		        	    $this->block();
		        	break;

		        	case 2:
		        	    $this->setState(359); 
		        	    $this->errorHandler->sync($this);

		        	    $_la = $this->input->LA(1);
		        	    do {
		        	    	$this->setState(358);
		        	    	$this->statement();
		        	    	$this->setState(361); 
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

		    $this->enterRule($localContext, 40, self::RULE_breakStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(365);
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

		    $this->enterRule($localContext, 42, self::RULE_continueStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(367);
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

		    $this->enterRule($localContext, 44, self::RULE_expression);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(369);
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

		    $this->enterRule($localContext, 46, self::RULE_logicalOr);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(371);
		        $this->logicalAnd();
		        $this->setState(376);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::OR) {
		        	$this->setState(372);
		        	$this->match(self::OR);
		        	$this->setState(373);
		        	$this->logicalAnd();
		        	$this->setState(378);
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

		    $this->enterRule($localContext, 48, self::RULE_logicalAnd);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(379);
		        $this->equality();
		        $this->setState(384);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::AND) {
		        	$this->setState(380);
		        	$this->match(self::AND);
		        	$this->setState(381);
		        	$this->equality();
		        	$this->setState(386);
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

		    $this->enterRule($localContext, 50, self::RULE_equality);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(387);
		        $this->comparison();
		        $this->setState(392);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__11 || $_la === self::T__12) {
		        	$this->setState(388);

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
		        	$this->setState(389);
		        	$this->comparison();
		        	$this->setState(394);
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

		    $this->enterRule($localContext, 52, self::RULE_comparison);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(395);
		        $this->addition();
		        $this->setState(400);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 245760) !== 0)) {
		        	$this->setState(396);

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
		        	$this->setState(397);
		        	$this->addition();
		        	$this->setState(402);
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

		    $this->enterRule($localContext, 54, self::RULE_addition);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(403);
		        $this->multiplication();
		        $this->setState(408);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 47, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(404);

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
		        		$this->setState(405);
		        		$this->multiplication(); 
		        	}

		        	$this->setState(410);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 47, $this->ctx);
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

		    $this->enterRule($localContext, 56, self::RULE_multiplication);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(411);
		        $this->unary();
		        $this->setState(416);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 48, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(412);

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
		        		$this->setState(413);
		        		$this->unary(); 
		        	}

		        	$this->setState(418);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 48, $this->ctx);
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

		    $this->enterRule($localContext, 58, self::RULE_unary);

		    try {
		        $this->setState(426);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 49, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(419);

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
		        	    $this->setState(420);
		        	    $this->unary();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(421);
		        	    $this->match(self::T__22);
		        	    $this->setState(422);
		        	    $this->unary();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(423);
		        	    $this->match(self::T__8);
		        	    $this->setState(424);
		        	    $this->unary();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(425);
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
			$startState = 60;
			$this->enterRecursionRule($localContext, 60, self::RULE_primary, $precedence);

			try {
				$this->enterOuterAlt($localContext, 1);
				$this->setState(470);
				$this->errorHandler->sync($this);

				switch ($this->getInterpreter()->adaptivePredict($this->input, 53, $this->ctx)) {
					case 1:
					    $this->setState(429);
					    $this->match(self::INTEGER);
					break;

					case 2:
					    $this->setState(430);
					    $this->match(self::FLOAT);
					break;

					case 3:
					    $this->setState(431);
					    $this->match(self::STRING);
					break;

					case 4:
					    $this->setState(432);
					    $this->match(self::RUNE);
					break;

					case 5:
					    $this->setState(433);
					    $this->match(self::TRUE);
					break;

					case 6:
					    $this->setState(434);
					    $this->match(self::FALSE);
					break;

					case 7:
					    $this->setState(435);
					    $this->match(self::NIL);
					break;

					case 8:
					    $this->setState(436);
					    $this->match(self::LEN);
					    $this->setState(437);
					    $this->match(self::T__1);
					    $this->setState(438);
					    $this->expression();
					    $this->setState(439);
					    $this->match(self::T__2);
					break;

					case 9:
					    $this->setState(441);
					    $this->qualified();
					    $this->setState(442);
					    $this->match(self::T__1);
					    $this->setState(444);
					    $this->errorHandler->sync($this);
					    $_la = $this->input->LA(1);

					    if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 1154047267087843876) !== 0)) {
					    	$this->setState(443);
					    	$this->argumentList();
					    }
					    $this->setState(446);
					    $this->match(self::T__2);
					break;

					case 10:
					    $this->setState(448);
					    $this->type();
					    $this->setState(449);
					    $this->match(self::T__1);
					    $this->setState(451);
					    $this->errorHandler->sync($this);
					    $_la = $this->input->LA(1);

					    if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 1154047267087843876) !== 0)) {
					    	$this->setState(450);
					    	$this->argumentList();
					    }
					    $this->setState(453);
					    $this->match(self::T__2);
					break;

					case 11:
					    $this->setState(455);
					    $this->qualified();
					break;

					case 12:
					    $this->setState(456);
					    $this->match(self::T__1);
					    $this->setState(457);
					    $this->expression();
					    $this->setState(458);
					    $this->match(self::T__2);
					break;

					case 13:
					    $this->setState(460);
					    $this->qualified();
					    $this->setState(467);
					    $this->errorHandler->sync($this);

					    $alt = $this->getInterpreter()->adaptivePredict($this->input, 52, $this->ctx);

					    while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					    	if ($alt === 1) {
					    		$this->setState(461);
					    		$this->match(self::T__4);
					    		$this->setState(462);
					    		$this->expression();
					    		$this->setState(463);
					    		$this->match(self::T__5); 
					    	}

					    	$this->setState(469);
					    	$this->errorHandler->sync($this);

					    	$alt = $this->getInterpreter()->adaptivePredict($this->input, 52, $this->ctx);
					    }
					break;
				}
				$this->ctx->stop = $this->input->LT(-1);
				$this->setState(478);
				$this->errorHandler->sync($this);

				$alt = $this->getInterpreter()->adaptivePredict($this->input, 55, $this->ctx);

				while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					if ($alt === 1) {
						if ($this->getParseListeners() !== null) {
						    $this->triggerExitRuleEvent();
						}

						$previousContext = $localContext;
						$this->setState(476);
						$this->errorHandler->sync($this);

						switch ($this->getInterpreter()->adaptivePredict($this->input, 54, $this->ctx)) {
							case 1:
							    $localContext = new Context\PrimaryContext($parentContext, $parentState);
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_primary);
							    $this->setState(472);

							    if (!($this->precpred($this->ctx, 2))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 2)");
							    }
							    $this->setState(473);
							    $this->match(self::PLUSPLUS);
							break;

							case 2:
							    $localContext = new Context\PrimaryContext($parentContext, $parentState);
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_primary);
							    $this->setState(474);

							    if (!($this->precpred($this->ctx, 1))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 1)");
							    }
							    $this->setState(475);
							    $this->match(self::MINUSMINUS);
							break;
						} 
					}

					$this->setState(480);
					$this->errorHandler->sync($this);

					$alt = $this->getInterpreter()->adaptivePredict($this->input, 55, $this->ctx);
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

		    $this->enterRule($localContext, 62, self::RULE_qualified);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(481);
		        $this->match(self::IDENTIFIER);
		        $this->setState(486);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 56, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(482);
		        		$this->match(self::T__23);
		        		$this->setState(483);
		        		$this->match(self::IDENTIFIER); 
		        	}

		        	$this->setState(488);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 56, $this->ctx);
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

		    $this->enterRule($localContext, 64, self::RULE_argumentList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(489);
		        $this->expression();
		        $this->setState(494);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__3) {
		        	$this->setState(490);
		        	$this->match(self::T__3);
		        	$this->setState(491);
		        	$this->expression();
		        	$this->setState(496);
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

		    $this->enterRule($localContext, 66, self::RULE_type);

		    try {
		        $this->setState(504);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::INT:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(497);
		            	$this->match(self::INT);
		            	break;

		            case self::FLOATTYPE:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(498);
		            	$this->match(self::FLOATTYPE);
		            	break;

		            case self::BOOL:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(499);
		            	$this->match(self::BOOL);
		            	break;

		            case self::STRINGTYPE:
		            	$this->enterOuterAlt($localContext, 4);
		            	$this->setState(500);
		            	$this->match(self::STRINGTYPE);
		            	break;

		            case self::RUNETYPE:
		            	$this->enterOuterAlt($localContext, 5);
		            	$this->setState(501);
		            	$this->match(self::RUNETYPE);
		            	break;

		            case self::T__8:
		            	$this->enterOuterAlt($localContext, 6);
		            	$this->setState(502);
		            	$this->pointerType();
		            	break;

		            case self::T__4:
		            	$this->enterOuterAlt($localContext, 7);
		            	$this->setState(503);
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

		    $this->enterRule($localContext, 68, self::RULE_pointerType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(506);
		        $this->match(self::T__8);
		        $this->setState(507);
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
					case 30:
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