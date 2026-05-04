// Generated from /home/lilimon/Documentos/Compiladores 2/proyectoC2/P1Compi2202110378/grammar/Golampi.g4 by ANTLR 4.13.1
import org.antlr.v4.runtime.atn.*;
import org.antlr.v4.runtime.dfa.DFA;
import org.antlr.v4.runtime.*;
import org.antlr.v4.runtime.misc.*;
import org.antlr.v4.runtime.tree.*;
import java.util.List;
import java.util.Iterator;
import java.util.ArrayList;

@SuppressWarnings({"all", "warnings", "unchecked", "unused", "cast", "CheckReturnValue"})
public class GolampiParser extends Parser {
	static { RuntimeMetaData.checkVersion("4.13.1", RuntimeMetaData.VERSION); }

	protected static final DFA[] _decisionToDFA;
	protected static final PredictionContextCache _sharedContextCache =
		new PredictionContextCache();
	public static final int
		T__0=1, T__1=2, T__2=3, T__3=4, T__4=5, T__5=6, T__6=7, T__7=8, T__8=9, 
		T__9=10, T__10=11, T__11=12, T__12=13, T__13=14, T__14=15, T__15=16, T__16=17, 
		T__17=18, T__18=19, T__19=20, T__20=21, T__21=22, T__22=23, T__23=24, 
		CONST=25, FUNC=26, VAR=27, SWITCH=28, CASE=29, DEFAULT=30, IF=31, ELSE=32, 
		FOR=33, RETURN=34, BREAK=35, CONTINUE=36, TRUE=37, FALSE=38, LEN=39, NIL=40, 
		INT=41, FLOATTYPE=42, BOOL=43, STRINGTYPE=44, RUNETYPE=45, INTEGER=46, 
		FLOAT=47, STRING=48, RUNE=49, PLUSPLUS=50, MINUSMINUS=51, PLUSEQ=52, MINUSEQ=53, 
		STAREQ=54, SLASHEQ=55, MODEQ=56, AND=57, OR=58, ASSIGN_SHORT=59, IDENTIFIER=60, 
		WS=61, NL=62, COMMENT=63, MULTILINE_COMMENT=64;
	public static final int
		RULE_program = 0, RULE_declaration = 1, RULE_constDecl = 2, RULE_functionDecl = 3, 
		RULE_parameterList = 4, RULE_parameter = 5, RULE_varDecl = 6, RULE_arrayType = 7, 
		RULE_arrayLiteral = 8, RULE_arrayElement = 9, RULE_block = 10, RULE_statement = 11, 
		RULE_shortVarDecl = 12, RULE_shortValue = 13, RULE_assignment = 14, RULE_expresionStmt = 15, 
		RULE_ifStmt = 16, RULE_forStmt = 17, RULE_returnStmt = 18, RULE_switchStmt = 19, 
		RULE_switchCase = 20, RULE_breakStmt = 21, RULE_continueStmt = 22, RULE_expression = 23, 
		RULE_logicalOr = 24, RULE_logicalAnd = 25, RULE_equality = 26, RULE_comparison = 27, 
		RULE_addition = 28, RULE_multiplication = 29, RULE_unary = 30, RULE_primary = 31, 
		RULE_qualified = 32, RULE_argumentList = 33, RULE_type = 34, RULE_pointerType = 35;
	private static String[] makeRuleNames() {
		return new String[] {
			"program", "declaration", "constDecl", "functionDecl", "parameterList", 
			"parameter", "varDecl", "arrayType", "arrayLiteral", "arrayElement", 
			"block", "statement", "shortVarDecl", "shortValue", "assignment", "expresionStmt", 
			"ifStmt", "forStmt", "returnStmt", "switchStmt", "switchCase", "breakStmt", 
			"continueStmt", "expression", "logicalOr", "logicalAnd", "equality", 
			"comparison", "addition", "multiplication", "unary", "primary", "qualified", 
			"argumentList", "type", "pointerType"
		};
	}
	public static final String[] ruleNames = makeRuleNames();

	private static String[] makeLiteralNames() {
		return new String[] {
			null, "'='", "'('", "')'", "','", "'['", "']'", "'{'", "'}'", "'*'", 
			"';'", "':'", "'=='", "'!='", "'>'", "'<'", "'>='", "'<='", "'+'", "'-'", 
			"'/'", "'%'", "'!'", "'&'", "'.'", "'const'", "'func'", "'var'", "'switch'", 
			"'case'", "'default'", "'if'", "'else'", "'for'", "'return'", "'break'", 
			"'continue'", "'true'", "'false'", "'len'", "'nil'", "'int32'", "'float32'", 
			"'bool'", "'string'", "'rune'", null, null, null, null, "'++'", "'--'", 
			"'+='", "'-='", "'*='", "'/='", "'%='", "'&&'", "'||'", "':='"
		};
	}
	private static final String[] _LITERAL_NAMES = makeLiteralNames();
	private static String[] makeSymbolicNames() {
		return new String[] {
			null, null, null, null, null, null, null, null, null, null, null, null, 
			null, null, null, null, null, null, null, null, null, null, null, null, 
			null, "CONST", "FUNC", "VAR", "SWITCH", "CASE", "DEFAULT", "IF", "ELSE", 
			"FOR", "RETURN", "BREAK", "CONTINUE", "TRUE", "FALSE", "LEN", "NIL", 
			"INT", "FLOATTYPE", "BOOL", "STRINGTYPE", "RUNETYPE", "INTEGER", "FLOAT", 
			"STRING", "RUNE", "PLUSPLUS", "MINUSMINUS", "PLUSEQ", "MINUSEQ", "STAREQ", 
			"SLASHEQ", "MODEQ", "AND", "OR", "ASSIGN_SHORT", "IDENTIFIER", "WS", 
			"NL", "COMMENT", "MULTILINE_COMMENT"
		};
	}
	private static final String[] _SYMBOLIC_NAMES = makeSymbolicNames();
	public static final Vocabulary VOCABULARY = new VocabularyImpl(_LITERAL_NAMES, _SYMBOLIC_NAMES);

	/**
	 * @deprecated Use {@link #VOCABULARY} instead.
	 */
	@Deprecated
	public static final String[] tokenNames;
	static {
		tokenNames = new String[_SYMBOLIC_NAMES.length];
		for (int i = 0; i < tokenNames.length; i++) {
			tokenNames[i] = VOCABULARY.getLiteralName(i);
			if (tokenNames[i] == null) {
				tokenNames[i] = VOCABULARY.getSymbolicName(i);
			}

			if (tokenNames[i] == null) {
				tokenNames[i] = "<INVALID>";
			}
		}
	}

	@Override
	@Deprecated
	public String[] getTokenNames() {
		return tokenNames;
	}

	@Override

	public Vocabulary getVocabulary() {
		return VOCABULARY;
	}

	@Override
	public String getGrammarFileName() { return "Golampi.g4"; }

	@Override
	public String[] getRuleNames() { return ruleNames; }

	@Override
	public String getSerializedATN() { return _serializedATN; }

	@Override
	public ATN getATN() { return _ATN; }

	public GolampiParser(TokenStream input) {
		super(input);
		_interp = new ParserATNSimulator(this,_ATN,_decisionToDFA,_sharedContextCache);
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ProgramContext extends ParserRuleContext {
		public TerminalNode EOF() { return getToken(GolampiParser.EOF, 0); }
		public List<DeclarationContext> declaration() {
			return getRuleContexts(DeclarationContext.class);
		}
		public DeclarationContext declaration(int i) {
			return getRuleContext(DeclarationContext.class,i);
		}
		public ProgramContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_program; }
	}

	public final ProgramContext program() throws RecognitionException {
		ProgramContext _localctx = new ProgramContext(_ctx, getState());
		enterRule(_localctx, 0, RULE_program);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(75);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while ((((_la) & ~0x3f) == 0 && ((1L << _la) & 1152921504841728000L) != 0)) {
				{
				{
				setState(72);
				declaration();
				}
				}
				setState(77);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			setState(78);
			match(EOF);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class DeclarationContext extends ParserRuleContext {
		public FunctionDeclContext functionDecl() {
			return getRuleContext(FunctionDeclContext.class,0);
		}
		public VarDeclContext varDecl() {
			return getRuleContext(VarDeclContext.class,0);
		}
		public ConstDeclContext constDecl() {
			return getRuleContext(ConstDeclContext.class,0);
		}
		public DeclarationContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_declaration; }
	}

	public final DeclarationContext declaration() throws RecognitionException {
		DeclarationContext _localctx = new DeclarationContext(_ctx, getState());
		enterRule(_localctx, 2, RULE_declaration);
		try {
			setState(83);
			_errHandler.sync(this);
			switch (_input.LA(1)) {
			case FUNC:
				enterOuterAlt(_localctx, 1);
				{
				setState(80);
				functionDecl();
				}
				break;
			case VAR:
			case IDENTIFIER:
				enterOuterAlt(_localctx, 2);
				{
				setState(81);
				varDecl();
				}
				break;
			case CONST:
				enterOuterAlt(_localctx, 3);
				{
				setState(82);
				constDecl();
				}
				break;
			default:
				throw new NoViableAltException(this);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ConstDeclContext extends ParserRuleContext {
		public TerminalNode CONST() { return getToken(GolampiParser.CONST, 0); }
		public TerminalNode IDENTIFIER() { return getToken(GolampiParser.IDENTIFIER, 0); }
		public ExpressionContext expression() {
			return getRuleContext(ExpressionContext.class,0);
		}
		public TypeContext type() {
			return getRuleContext(TypeContext.class,0);
		}
		public ConstDeclContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_constDecl; }
	}

	public final ConstDeclContext constDecl() throws RecognitionException {
		ConstDeclContext _localctx = new ConstDeclContext(_ctx, getState());
		enterRule(_localctx, 4, RULE_constDecl);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(85);
			match(CONST);
			setState(86);
			match(IDENTIFIER);
			setState(88);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if ((((_la) & ~0x3f) == 0 && ((1L << _la) & 68169720922656L) != 0)) {
				{
				setState(87);
				type();
				}
			}

			setState(90);
			match(T__0);
			setState(91);
			expression();
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class FunctionDeclContext extends ParserRuleContext {
		public TerminalNode FUNC() { return getToken(GolampiParser.FUNC, 0); }
		public TerminalNode IDENTIFIER() { return getToken(GolampiParser.IDENTIFIER, 0); }
		public BlockContext block() {
			return getRuleContext(BlockContext.class,0);
		}
		public ParameterListContext parameterList() {
			return getRuleContext(ParameterListContext.class,0);
		}
		public List<TypeContext> type() {
			return getRuleContexts(TypeContext.class);
		}
		public TypeContext type(int i) {
			return getRuleContext(TypeContext.class,i);
		}
		public FunctionDeclContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_functionDecl; }
	}

	public final FunctionDeclContext functionDecl() throws RecognitionException {
		FunctionDeclContext _localctx = new FunctionDeclContext(_ctx, getState());
		enterRule(_localctx, 6, RULE_functionDecl);
		int _la;
		try {
			setState(123);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,7,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(93);
				match(FUNC);
				setState(94);
				match(IDENTIFIER);
				setState(95);
				match(T__1);
				setState(97);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==IDENTIFIER) {
					{
					setState(96);
					parameterList();
					}
				}

				setState(99);
				match(T__2);
				setState(101);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if ((((_la) & ~0x3f) == 0 && ((1L << _la) & 68169720922656L) != 0)) {
					{
					setState(100);
					type();
					}
				}

				setState(103);
				block();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(104);
				match(FUNC);
				setState(105);
				match(IDENTIFIER);
				setState(106);
				match(T__1);
				setState(108);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==IDENTIFIER) {
					{
					setState(107);
					parameterList();
					}
				}

				setState(110);
				match(T__2);
				setState(111);
				match(T__1);
				setState(112);
				type();
				setState(117);
				_errHandler.sync(this);
				_la = _input.LA(1);
				while (_la==T__3) {
					{
					{
					setState(113);
					match(T__3);
					setState(114);
					type();
					}
					}
					setState(119);
					_errHandler.sync(this);
					_la = _input.LA(1);
				}
				setState(120);
				match(T__2);
				setState(121);
				block();
				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ParameterListContext extends ParserRuleContext {
		public List<ParameterContext> parameter() {
			return getRuleContexts(ParameterContext.class);
		}
		public ParameterContext parameter(int i) {
			return getRuleContext(ParameterContext.class,i);
		}
		public ParameterListContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_parameterList; }
	}

	public final ParameterListContext parameterList() throws RecognitionException {
		ParameterListContext _localctx = new ParameterListContext(_ctx, getState());
		enterRule(_localctx, 8, RULE_parameterList);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(125);
			parameter();
			setState(130);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__3) {
				{
				{
				setState(126);
				match(T__3);
				setState(127);
				parameter();
				}
				}
				setState(132);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ParameterContext extends ParserRuleContext {
		public TerminalNode IDENTIFIER() { return getToken(GolampiParser.IDENTIFIER, 0); }
		public TypeContext type() {
			return getRuleContext(TypeContext.class,0);
		}
		public ParameterContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_parameter; }
	}

	public final ParameterContext parameter() throws RecognitionException {
		ParameterContext _localctx = new ParameterContext(_ctx, getState());
		enterRule(_localctx, 10, RULE_parameter);
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(133);
			match(IDENTIFIER);
			setState(134);
			type();
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class VarDeclContext extends ParserRuleContext {
		public TerminalNode VAR() { return getToken(GolampiParser.VAR, 0); }
		public List<TerminalNode> IDENTIFIER() { return getTokens(GolampiParser.IDENTIFIER); }
		public TerminalNode IDENTIFIER(int i) {
			return getToken(GolampiParser.IDENTIFIER, i);
		}
		public TypeContext type() {
			return getRuleContext(TypeContext.class,0);
		}
		public List<ExpressionContext> expression() {
			return getRuleContexts(ExpressionContext.class);
		}
		public ExpressionContext expression(int i) {
			return getRuleContext(ExpressionContext.class,i);
		}
		public ArrayTypeContext arrayType() {
			return getRuleContext(ArrayTypeContext.class,0);
		}
		public ArrayLiteralContext arrayLiteral() {
			return getRuleContext(ArrayLiteralContext.class,0);
		}
		public VarDeclContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_varDecl; }
	}

	public final VarDeclContext varDecl() throws RecognitionException {
		VarDeclContext _localctx = new VarDeclContext(_ctx, getState());
		enterRule(_localctx, 12, RULE_varDecl);
		int _la;
		try {
			setState(170);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,14,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(136);
				match(VAR);
				setState(137);
				match(IDENTIFIER);
				setState(142);
				_errHandler.sync(this);
				_la = _input.LA(1);
				while (_la==T__3) {
					{
					{
					setState(138);
					match(T__3);
					setState(139);
					match(IDENTIFIER);
					}
					}
					setState(144);
					_errHandler.sync(this);
					_la = _input.LA(1);
				}
				setState(145);
				type();
				setState(155);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__0) {
					{
					setState(146);
					match(T__0);
					setState(147);
					expression();
					setState(152);
					_errHandler.sync(this);
					_la = _input.LA(1);
					while (_la==T__3) {
						{
						{
						setState(148);
						match(T__3);
						setState(149);
						expression();
						}
						}
						setState(154);
						_errHandler.sync(this);
						_la = _input.LA(1);
					}
					}
				}

				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(157);
				match(VAR);
				setState(158);
				match(IDENTIFIER);
				setState(159);
				arrayType();
				setState(162);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__0) {
					{
					setState(160);
					match(T__0);
					setState(161);
					arrayLiteral();
					}
				}

				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(164);
				match(IDENTIFIER);
				setState(165);
				arrayType();
				setState(168);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__0) {
					{
					setState(166);
					match(T__0);
					setState(167);
					arrayLiteral();
					}
				}

				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ArrayTypeContext extends ParserRuleContext {
		public ExpressionContext expression() {
			return getRuleContext(ExpressionContext.class,0);
		}
		public ArrayTypeContext arrayType() {
			return getRuleContext(ArrayTypeContext.class,0);
		}
		public TypeContext type() {
			return getRuleContext(TypeContext.class,0);
		}
		public ArrayTypeContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_arrayType; }
	}

	public final ArrayTypeContext arrayType() throws RecognitionException {
		ArrayTypeContext _localctx = new ArrayTypeContext(_ctx, getState());
		enterRule(_localctx, 14, RULE_arrayType);
		try {
			setState(182);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,15,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(172);
				match(T__4);
				setState(173);
				expression();
				setState(174);
				match(T__5);
				setState(175);
				arrayType();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(177);
				match(T__4);
				setState(178);
				expression();
				setState(179);
				match(T__5);
				setState(180);
				type();
				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ArrayLiteralContext extends ParserRuleContext {
		public List<ArrayElementContext> arrayElement() {
			return getRuleContexts(ArrayElementContext.class);
		}
		public ArrayElementContext arrayElement(int i) {
			return getRuleContext(ArrayElementContext.class,i);
		}
		public ArrayTypeContext arrayType() {
			return getRuleContext(ArrayTypeContext.class,0);
		}
		public ArrayLiteralContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_arrayLiteral; }
	}

	public final ArrayLiteralContext arrayLiteral() throws RecognitionException {
		ArrayLiteralContext _localctx = new ArrayLiteralContext(_ctx, getState());
		enterRule(_localctx, 16, RULE_arrayLiteral);
		int _la;
		try {
			int _alt;
			enterOuterAlt(_localctx, 1);
			{
			setState(185);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__4) {
				{
				setState(184);
				arrayType();
				}
			}

			setState(187);
			match(T__6);
			setState(188);
			arrayElement();
			setState(193);
			_errHandler.sync(this);
			_alt = getInterpreter().adaptivePredict(_input,17,_ctx);
			while ( _alt!=2 && _alt!=org.antlr.v4.runtime.atn.ATN.INVALID_ALT_NUMBER ) {
				if ( _alt==1 ) {
					{
					{
					setState(189);
					match(T__3);
					setState(190);
					arrayElement();
					}
					} 
				}
				setState(195);
				_errHandler.sync(this);
				_alt = getInterpreter().adaptivePredict(_input,17,_ctx);
			}
			setState(197);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__3) {
				{
				setState(196);
				match(T__3);
				}
			}

			setState(199);
			match(T__7);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ArrayElementContext extends ParserRuleContext {
		public List<ArrayElementContext> arrayElement() {
			return getRuleContexts(ArrayElementContext.class);
		}
		public ArrayElementContext arrayElement(int i) {
			return getRuleContext(ArrayElementContext.class,i);
		}
		public ExpressionContext expression() {
			return getRuleContext(ExpressionContext.class,0);
		}
		public ArrayElementContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_arrayElement; }
	}

	public final ArrayElementContext arrayElement() throws RecognitionException {
		ArrayElementContext _localctx = new ArrayElementContext(_ctx, getState());
		enterRule(_localctx, 18, RULE_arrayElement);
		int _la;
		try {
			int _alt;
			setState(216);
			_errHandler.sync(this);
			switch (_input.LA(1)) {
			case T__6:
				enterOuterAlt(_localctx, 1);
				{
				setState(201);
				match(T__6);
				setState(202);
				arrayElement();
				setState(207);
				_errHandler.sync(this);
				_alt = getInterpreter().adaptivePredict(_input,19,_ctx);
				while ( _alt!=2 && _alt!=org.antlr.v4.runtime.atn.ATN.INVALID_ALT_NUMBER ) {
					if ( _alt==1 ) {
						{
						{
						setState(203);
						match(T__3);
						setState(204);
						arrayElement();
						}
						} 
					}
					setState(209);
					_errHandler.sync(this);
					_alt = getInterpreter().adaptivePredict(_input,19,_ctx);
				}
				setState(211);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if (_la==T__3) {
					{
					setState(210);
					match(T__3);
					}
				}

				setState(213);
				match(T__7);
				}
				break;
			case T__1:
			case T__4:
			case T__8:
			case T__18:
			case T__21:
			case T__22:
			case TRUE:
			case FALSE:
			case LEN:
			case NIL:
			case INT:
			case FLOATTYPE:
			case BOOL:
			case STRINGTYPE:
			case RUNETYPE:
			case INTEGER:
			case FLOAT:
			case STRING:
			case RUNE:
			case IDENTIFIER:
				enterOuterAlt(_localctx, 2);
				{
				setState(215);
				expression();
				}
				break;
			default:
				throw new NoViableAltException(this);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class BlockContext extends ParserRuleContext {
		public List<StatementContext> statement() {
			return getRuleContexts(StatementContext.class);
		}
		public StatementContext statement(int i) {
			return getRuleContext(StatementContext.class,i);
		}
		public BlockContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_block; }
	}

	public final BlockContext block() throws RecognitionException {
		BlockContext _localctx = new BlockContext(_ctx, getState());
		enterRule(_localctx, 20, RULE_block);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(218);
			match(T__6);
			setState(222);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while ((((_la) & ~0x3f) == 0 && ((1L << _la) & 1154047398520554148L) != 0)) {
				{
				{
				setState(219);
				statement();
				}
				}
				setState(224);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			setState(225);
			match(T__7);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class StatementContext extends ParserRuleContext {
		public VarDeclContext varDecl() {
			return getRuleContext(VarDeclContext.class,0);
		}
		public ConstDeclContext constDecl() {
			return getRuleContext(ConstDeclContext.class,0);
		}
		public SwitchStmtContext switchStmt() {
			return getRuleContext(SwitchStmtContext.class,0);
		}
		public ExpresionStmtContext expresionStmt() {
			return getRuleContext(ExpresionStmtContext.class,0);
		}
		public ShortVarDeclContext shortVarDecl() {
			return getRuleContext(ShortVarDeclContext.class,0);
		}
		public AssignmentContext assignment() {
			return getRuleContext(AssignmentContext.class,0);
		}
		public IfStmtContext ifStmt() {
			return getRuleContext(IfStmtContext.class,0);
		}
		public ForStmtContext forStmt() {
			return getRuleContext(ForStmtContext.class,0);
		}
		public ReturnStmtContext returnStmt() {
			return getRuleContext(ReturnStmtContext.class,0);
		}
		public BreakStmtContext breakStmt() {
			return getRuleContext(BreakStmtContext.class,0);
		}
		public ContinueStmtContext continueStmt() {
			return getRuleContext(ContinueStmtContext.class,0);
		}
		public BlockContext block() {
			return getRuleContext(BlockContext.class,0);
		}
		public StatementContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_statement; }
	}

	public final StatementContext statement() throws RecognitionException {
		StatementContext _localctx = new StatementContext(_ctx, getState());
		enterRule(_localctx, 22, RULE_statement);
		try {
			setState(240);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,23,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(227);
				varDecl();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(228);
				constDecl();
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(229);
				switchStmt();
				}
				break;
			case 4:
				enterOuterAlt(_localctx, 4);
				{
				setState(230);
				expresionStmt();
				}
				break;
			case 5:
				enterOuterAlt(_localctx, 5);
				{
				setState(231);
				shortVarDecl();
				}
				break;
			case 6:
				enterOuterAlt(_localctx, 6);
				{
				setState(232);
				assignment();
				}
				break;
			case 7:
				enterOuterAlt(_localctx, 7);
				{
				setState(233);
				ifStmt();
				}
				break;
			case 8:
				enterOuterAlt(_localctx, 8);
				{
				setState(234);
				forStmt();
				}
				break;
			case 9:
				enterOuterAlt(_localctx, 9);
				{
				setState(235);
				returnStmt();
				}
				break;
			case 10:
				enterOuterAlt(_localctx, 10);
				{
				setState(236);
				breakStmt();
				}
				break;
			case 11:
				enterOuterAlt(_localctx, 11);
				{
				setState(237);
				continueStmt();
				}
				break;
			case 12:
				enterOuterAlt(_localctx, 12);
				{
				setState(238);
				expresionStmt();
				}
				break;
			case 13:
				enterOuterAlt(_localctx, 13);
				{
				setState(239);
				block();
				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ShortVarDeclContext extends ParserRuleContext {
		public List<TerminalNode> IDENTIFIER() { return getTokens(GolampiParser.IDENTIFIER); }
		public TerminalNode IDENTIFIER(int i) {
			return getToken(GolampiParser.IDENTIFIER, i);
		}
		public TerminalNode ASSIGN_SHORT() { return getToken(GolampiParser.ASSIGN_SHORT, 0); }
		public List<ShortValueContext> shortValue() {
			return getRuleContexts(ShortValueContext.class);
		}
		public ShortValueContext shortValue(int i) {
			return getRuleContext(ShortValueContext.class,i);
		}
		public ShortVarDeclContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_shortVarDecl; }
	}

	public final ShortVarDeclContext shortVarDecl() throws RecognitionException {
		ShortVarDeclContext _localctx = new ShortVarDeclContext(_ctx, getState());
		enterRule(_localctx, 24, RULE_shortVarDecl);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(242);
			match(IDENTIFIER);
			setState(247);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__3) {
				{
				{
				setState(243);
				match(T__3);
				setState(244);
				match(IDENTIFIER);
				}
				}
				setState(249);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			setState(250);
			match(ASSIGN_SHORT);
			setState(251);
			shortValue();
			setState(256);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__3) {
				{
				{
				setState(252);
				match(T__3);
				setState(253);
				shortValue();
				}
				}
				setState(258);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ShortValueContext extends ParserRuleContext {
		public ArrayTypeContext arrayType() {
			return getRuleContext(ArrayTypeContext.class,0);
		}
		public ArrayLiteralContext arrayLiteral() {
			return getRuleContext(ArrayLiteralContext.class,0);
		}
		public ExpressionContext expression() {
			return getRuleContext(ExpressionContext.class,0);
		}
		public ShortValueContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_shortValue; }
	}

	public final ShortValueContext shortValue() throws RecognitionException {
		ShortValueContext _localctx = new ShortValueContext(_ctx, getState());
		enterRule(_localctx, 26, RULE_shortValue);
		try {
			setState(263);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,26,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(259);
				arrayType();
				setState(260);
				arrayLiteral();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(262);
				expression();
				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class AssignmentContext extends ParserRuleContext {
		public TerminalNode IDENTIFIER() { return getToken(GolampiParser.IDENTIFIER, 0); }
		public List<ExpressionContext> expression() {
			return getRuleContexts(ExpressionContext.class);
		}
		public ExpressionContext expression(int i) {
			return getRuleContext(ExpressionContext.class,i);
		}
		public PrimaryContext primary() {
			return getRuleContext(PrimaryContext.class,0);
		}
		public TerminalNode PLUSPLUS() { return getToken(GolampiParser.PLUSPLUS, 0); }
		public TerminalNode MINUSMINUS() { return getToken(GolampiParser.MINUSMINUS, 0); }
		public TerminalNode PLUSEQ() { return getToken(GolampiParser.PLUSEQ, 0); }
		public TerminalNode MINUSEQ() { return getToken(GolampiParser.MINUSEQ, 0); }
		public TerminalNode STAREQ() { return getToken(GolampiParser.STAREQ, 0); }
		public TerminalNode SLASHEQ() { return getToken(GolampiParser.SLASHEQ, 0); }
		public TerminalNode MODEQ() { return getToken(GolampiParser.MODEQ, 0); }
		public AssignmentContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_assignment; }
	}

	public final AssignmentContext assignment() throws RecognitionException {
		AssignmentContext _localctx = new AssignmentContext(_ctx, getState());
		enterRule(_localctx, 28, RULE_assignment);
		int _la;
		try {
			setState(294);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,29,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(265);
				match(IDENTIFIER);
				setState(270); 
				_errHandler.sync(this);
				_la = _input.LA(1);
				do {
					{
					{
					setState(266);
					match(T__4);
					setState(267);
					expression();
					setState(268);
					match(T__5);
					}
					}
					setState(272); 
					_errHandler.sync(this);
					_la = _input.LA(1);
				} while ( _la==T__4 );
				setState(274);
				match(T__0);
				setState(275);
				expression();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(277);
				match(IDENTIFIER);
				setState(278);
				match(T__0);
				setState(279);
				expression();
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(281); 
				_errHandler.sync(this);
				_la = _input.LA(1);
				do {
					{
					{
					setState(280);
					match(T__8);
					}
					}
					setState(283); 
					_errHandler.sync(this);
					_la = _input.LA(1);
				} while ( _la==T__8 );
				setState(285);
				match(IDENTIFIER);
				setState(286);
				match(T__0);
				setState(287);
				expression();
				}
				break;
			case 4:
				enterOuterAlt(_localctx, 4);
				{
				setState(288);
				primary(0);
				setState(289);
				_la = _input.LA(1);
				if ( !(_la==PLUSPLUS || _la==MINUSMINUS) ) {
				_errHandler.recoverInline(this);
				}
				else {
					if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
					_errHandler.reportMatch(this);
					consume();
				}
				}
				break;
			case 5:
				enterOuterAlt(_localctx, 5);
				{
				setState(291);
				match(IDENTIFIER);
				setState(292);
				_la = _input.LA(1);
				if ( !((((_la) & ~0x3f) == 0 && ((1L << _la) & 139611588448485376L) != 0)) ) {
				_errHandler.recoverInline(this);
				}
				else {
					if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
					_errHandler.reportMatch(this);
					consume();
				}
				setState(293);
				expression();
				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ExpresionStmtContext extends ParserRuleContext {
		public ExpressionContext expression() {
			return getRuleContext(ExpressionContext.class,0);
		}
		public ExpresionStmtContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_expresionStmt; }
	}

	public final ExpresionStmtContext expresionStmt() throws RecognitionException {
		ExpresionStmtContext _localctx = new ExpresionStmtContext(_ctx, getState());
		enterRule(_localctx, 30, RULE_expresionStmt);
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(296);
			expression();
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class IfStmtContext extends ParserRuleContext {
		public TerminalNode IF() { return getToken(GolampiParser.IF, 0); }
		public ExpressionContext expression() {
			return getRuleContext(ExpressionContext.class,0);
		}
		public List<BlockContext> block() {
			return getRuleContexts(BlockContext.class);
		}
		public BlockContext block(int i) {
			return getRuleContext(BlockContext.class,i);
		}
		public TerminalNode ELSE() { return getToken(GolampiParser.ELSE, 0); }
		public IfStmtContext ifStmt() {
			return getRuleContext(IfStmtContext.class,0);
		}
		public IfStmtContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_ifStmt; }
	}

	public final IfStmtContext ifStmt() throws RecognitionException {
		IfStmtContext _localctx = new IfStmtContext(_ctx, getState());
		enterRule(_localctx, 32, RULE_ifStmt);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(298);
			match(IF);
			setState(299);
			expression();
			setState(300);
			block();
			setState(306);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==ELSE) {
				{
				setState(301);
				match(ELSE);
				setState(304);
				_errHandler.sync(this);
				switch (_input.LA(1)) {
				case IF:
					{
					setState(302);
					ifStmt();
					}
					break;
				case T__6:
					{
					setState(303);
					block();
					}
					break;
				default:
					throw new NoViableAltException(this);
				}
				}
			}

			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ForStmtContext extends ParserRuleContext {
		public TerminalNode FOR() { return getToken(GolampiParser.FOR, 0); }
		public BlockContext block() {
			return getRuleContext(BlockContext.class,0);
		}
		public ExpressionContext expression() {
			return getRuleContext(ExpressionContext.class,0);
		}
		public ShortVarDeclContext shortVarDecl() {
			return getRuleContext(ShortVarDeclContext.class,0);
		}
		public StatementContext statement() {
			return getRuleContext(StatementContext.class,0);
		}
		public ForStmtContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_forStmt; }
	}

	public final ForStmtContext forStmt() throws RecognitionException {
		ForStmtContext _localctx = new ForStmtContext(_ctx, getState());
		enterRule(_localctx, 34, RULE_forStmt);
		int _la;
		try {
			setState(323);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,34,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(308);
				match(FOR);
				setState(310);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if ((((_la) & ~0x3f) == 0 && ((1L << _la) & 1154047267087843876L) != 0)) {
					{
					setState(309);
					expression();
					}
				}

				setState(312);
				block();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(313);
				match(FOR);
				setState(314);
				shortVarDecl();
				setState(315);
				match(T__9);
				setState(316);
				expression();
				setState(317);
				match(T__9);
				setState(319);
				_errHandler.sync(this);
				switch ( getInterpreter().adaptivePredict(_input,33,_ctx) ) {
				case 1:
					{
					setState(318);
					statement();
					}
					break;
				}
				setState(321);
				block();
				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ReturnStmtContext extends ParserRuleContext {
		public TerminalNode RETURN() { return getToken(GolampiParser.RETURN, 0); }
		public List<ExpressionContext> expression() {
			return getRuleContexts(ExpressionContext.class);
		}
		public ExpressionContext expression(int i) {
			return getRuleContext(ExpressionContext.class,i);
		}
		public ReturnStmtContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_returnStmt; }
	}

	public final ReturnStmtContext returnStmt() throws RecognitionException {
		ReturnStmtContext _localctx = new ReturnStmtContext(_ctx, getState());
		enterRule(_localctx, 36, RULE_returnStmt);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(325);
			match(RETURN);
			setState(334);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,36,_ctx) ) {
			case 1:
				{
				setState(326);
				expression();
				setState(331);
				_errHandler.sync(this);
				_la = _input.LA(1);
				while (_la==T__3) {
					{
					{
					setState(327);
					match(T__3);
					setState(328);
					expression();
					}
					}
					setState(333);
					_errHandler.sync(this);
					_la = _input.LA(1);
				}
				}
				break;
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class SwitchStmtContext extends ParserRuleContext {
		public TerminalNode SWITCH() { return getToken(GolampiParser.SWITCH, 0); }
		public ExpressionContext expression() {
			return getRuleContext(ExpressionContext.class,0);
		}
		public List<SwitchCaseContext> switchCase() {
			return getRuleContexts(SwitchCaseContext.class);
		}
		public SwitchCaseContext switchCase(int i) {
			return getRuleContext(SwitchCaseContext.class,i);
		}
		public TerminalNode DEFAULT() { return getToken(GolampiParser.DEFAULT, 0); }
		public BlockContext block() {
			return getRuleContext(BlockContext.class,0);
		}
		public List<StatementContext> statement() {
			return getRuleContexts(StatementContext.class);
		}
		public StatementContext statement(int i) {
			return getRuleContext(StatementContext.class,i);
		}
		public SwitchStmtContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_switchStmt; }
	}

	public final SwitchStmtContext switchStmt() throws RecognitionException {
		SwitchStmtContext _localctx = new SwitchStmtContext(_ctx, getState());
		enterRule(_localctx, 38, RULE_switchStmt);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(336);
			match(SWITCH);
			setState(338);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if ((((_la) & ~0x3f) == 0 && ((1L << _la) & 1154047267087843876L) != 0)) {
				{
				setState(337);
				expression();
				}
			}

			setState(340);
			match(T__6);
			setState(344);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==CASE) {
				{
				{
				setState(341);
				switchCase();
				}
				}
				setState(346);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			setState(357);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==DEFAULT) {
				{
				setState(347);
				match(DEFAULT);
				setState(348);
				match(T__10);
				setState(355);
				_errHandler.sync(this);
				switch ( getInterpreter().adaptivePredict(_input,40,_ctx) ) {
				case 1:
					{
					setState(349);
					block();
					}
					break;
				case 2:
					{
					setState(351); 
					_errHandler.sync(this);
					_la = _input.LA(1);
					do {
						{
						{
						setState(350);
						statement();
						}
						}
						setState(353); 
						_errHandler.sync(this);
						_la = _input.LA(1);
					} while ( (((_la) & ~0x3f) == 0 && ((1L << _la) & 1154047398520554148L) != 0) );
					}
					break;
				}
				}
			}

			setState(359);
			match(T__7);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class SwitchCaseContext extends ParserRuleContext {
		public TerminalNode CASE() { return getToken(GolampiParser.CASE, 0); }
		public List<ExpressionContext> expression() {
			return getRuleContexts(ExpressionContext.class);
		}
		public ExpressionContext expression(int i) {
			return getRuleContext(ExpressionContext.class,i);
		}
		public BlockContext block() {
			return getRuleContext(BlockContext.class,0);
		}
		public List<StatementContext> statement() {
			return getRuleContexts(StatementContext.class);
		}
		public StatementContext statement(int i) {
			return getRuleContext(StatementContext.class,i);
		}
		public SwitchCaseContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_switchCase; }
	}

	public final SwitchCaseContext switchCase() throws RecognitionException {
		SwitchCaseContext _localctx = new SwitchCaseContext(_ctx, getState());
		enterRule(_localctx, 40, RULE_switchCase);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(361);
			match(CASE);
			setState(362);
			expression();
			setState(367);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__3) {
				{
				{
				setState(363);
				match(T__3);
				setState(364);
				expression();
				}
				}
				setState(369);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			setState(370);
			match(T__10);
			setState(377);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,44,_ctx) ) {
			case 1:
				{
				setState(371);
				block();
				}
				break;
			case 2:
				{
				setState(373); 
				_errHandler.sync(this);
				_la = _input.LA(1);
				do {
					{
					{
					setState(372);
					statement();
					}
					}
					setState(375); 
					_errHandler.sync(this);
					_la = _input.LA(1);
				} while ( (((_la) & ~0x3f) == 0 && ((1L << _la) & 1154047398520554148L) != 0) );
				}
				break;
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class BreakStmtContext extends ParserRuleContext {
		public TerminalNode BREAK() { return getToken(GolampiParser.BREAK, 0); }
		public BreakStmtContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_breakStmt; }
	}

	public final BreakStmtContext breakStmt() throws RecognitionException {
		BreakStmtContext _localctx = new BreakStmtContext(_ctx, getState());
		enterRule(_localctx, 42, RULE_breakStmt);
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(379);
			match(BREAK);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ContinueStmtContext extends ParserRuleContext {
		public TerminalNode CONTINUE() { return getToken(GolampiParser.CONTINUE, 0); }
		public ContinueStmtContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_continueStmt; }
	}

	public final ContinueStmtContext continueStmt() throws RecognitionException {
		ContinueStmtContext _localctx = new ContinueStmtContext(_ctx, getState());
		enterRule(_localctx, 44, RULE_continueStmt);
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(381);
			match(CONTINUE);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ExpressionContext extends ParserRuleContext {
		public LogicalOrContext logicalOr() {
			return getRuleContext(LogicalOrContext.class,0);
		}
		public ExpressionContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_expression; }
	}

	public final ExpressionContext expression() throws RecognitionException {
		ExpressionContext _localctx = new ExpressionContext(_ctx, getState());
		enterRule(_localctx, 46, RULE_expression);
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(383);
			logicalOr();
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class LogicalOrContext extends ParserRuleContext {
		public List<LogicalAndContext> logicalAnd() {
			return getRuleContexts(LogicalAndContext.class);
		}
		public LogicalAndContext logicalAnd(int i) {
			return getRuleContext(LogicalAndContext.class,i);
		}
		public List<TerminalNode> OR() { return getTokens(GolampiParser.OR); }
		public TerminalNode OR(int i) {
			return getToken(GolampiParser.OR, i);
		}
		public LogicalOrContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_logicalOr; }
	}

	public final LogicalOrContext logicalOr() throws RecognitionException {
		LogicalOrContext _localctx = new LogicalOrContext(_ctx, getState());
		enterRule(_localctx, 48, RULE_logicalOr);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(385);
			logicalAnd();
			setState(390);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==OR) {
				{
				{
				setState(386);
				match(OR);
				setState(387);
				logicalAnd();
				}
				}
				setState(392);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class LogicalAndContext extends ParserRuleContext {
		public List<EqualityContext> equality() {
			return getRuleContexts(EqualityContext.class);
		}
		public EqualityContext equality(int i) {
			return getRuleContext(EqualityContext.class,i);
		}
		public List<TerminalNode> AND() { return getTokens(GolampiParser.AND); }
		public TerminalNode AND(int i) {
			return getToken(GolampiParser.AND, i);
		}
		public LogicalAndContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_logicalAnd; }
	}

	public final LogicalAndContext logicalAnd() throws RecognitionException {
		LogicalAndContext _localctx = new LogicalAndContext(_ctx, getState());
		enterRule(_localctx, 50, RULE_logicalAnd);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(393);
			equality();
			setState(398);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==AND) {
				{
				{
				setState(394);
				match(AND);
				setState(395);
				equality();
				}
				}
				setState(400);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class EqualityContext extends ParserRuleContext {
		public List<ComparisonContext> comparison() {
			return getRuleContexts(ComparisonContext.class);
		}
		public ComparisonContext comparison(int i) {
			return getRuleContext(ComparisonContext.class,i);
		}
		public EqualityContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_equality; }
	}

	public final EqualityContext equality() throws RecognitionException {
		EqualityContext _localctx = new EqualityContext(_ctx, getState());
		enterRule(_localctx, 52, RULE_equality);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(401);
			comparison();
			setState(406);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__11 || _la==T__12) {
				{
				{
				setState(402);
				_la = _input.LA(1);
				if ( !(_la==T__11 || _la==T__12) ) {
				_errHandler.recoverInline(this);
				}
				else {
					if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
					_errHandler.reportMatch(this);
					consume();
				}
				setState(403);
				comparison();
				}
				}
				setState(408);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ComparisonContext extends ParserRuleContext {
		public List<AdditionContext> addition() {
			return getRuleContexts(AdditionContext.class);
		}
		public AdditionContext addition(int i) {
			return getRuleContext(AdditionContext.class,i);
		}
		public ComparisonContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_comparison; }
	}

	public final ComparisonContext comparison() throws RecognitionException {
		ComparisonContext _localctx = new ComparisonContext(_ctx, getState());
		enterRule(_localctx, 54, RULE_comparison);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(409);
			addition();
			setState(414);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while ((((_la) & ~0x3f) == 0 && ((1L << _la) & 245760L) != 0)) {
				{
				{
				setState(410);
				_la = _input.LA(1);
				if ( !((((_la) & ~0x3f) == 0 && ((1L << _la) & 245760L) != 0)) ) {
				_errHandler.recoverInline(this);
				}
				else {
					if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
					_errHandler.reportMatch(this);
					consume();
				}
				setState(411);
				addition();
				}
				}
				setState(416);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class AdditionContext extends ParserRuleContext {
		public List<MultiplicationContext> multiplication() {
			return getRuleContexts(MultiplicationContext.class);
		}
		public MultiplicationContext multiplication(int i) {
			return getRuleContext(MultiplicationContext.class,i);
		}
		public AdditionContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_addition; }
	}

	public final AdditionContext addition() throws RecognitionException {
		AdditionContext _localctx = new AdditionContext(_ctx, getState());
		enterRule(_localctx, 56, RULE_addition);
		int _la;
		try {
			int _alt;
			enterOuterAlt(_localctx, 1);
			{
			setState(417);
			multiplication();
			setState(422);
			_errHandler.sync(this);
			_alt = getInterpreter().adaptivePredict(_input,49,_ctx);
			while ( _alt!=2 && _alt!=org.antlr.v4.runtime.atn.ATN.INVALID_ALT_NUMBER ) {
				if ( _alt==1 ) {
					{
					{
					setState(418);
					_la = _input.LA(1);
					if ( !(_la==T__17 || _la==T__18) ) {
					_errHandler.recoverInline(this);
					}
					else {
						if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
						_errHandler.reportMatch(this);
						consume();
					}
					setState(419);
					multiplication();
					}
					} 
				}
				setState(424);
				_errHandler.sync(this);
				_alt = getInterpreter().adaptivePredict(_input,49,_ctx);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class MultiplicationContext extends ParserRuleContext {
		public List<UnaryContext> unary() {
			return getRuleContexts(UnaryContext.class);
		}
		public UnaryContext unary(int i) {
			return getRuleContext(UnaryContext.class,i);
		}
		public MultiplicationContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_multiplication; }
	}

	public final MultiplicationContext multiplication() throws RecognitionException {
		MultiplicationContext _localctx = new MultiplicationContext(_ctx, getState());
		enterRule(_localctx, 58, RULE_multiplication);
		int _la;
		try {
			int _alt;
			enterOuterAlt(_localctx, 1);
			{
			setState(425);
			unary();
			setState(430);
			_errHandler.sync(this);
			_alt = getInterpreter().adaptivePredict(_input,50,_ctx);
			while ( _alt!=2 && _alt!=org.antlr.v4.runtime.atn.ATN.INVALID_ALT_NUMBER ) {
				if ( _alt==1 ) {
					{
					{
					setState(426);
					_la = _input.LA(1);
					if ( !((((_la) & ~0x3f) == 0 && ((1L << _la) & 3146240L) != 0)) ) {
					_errHandler.recoverInline(this);
					}
					else {
						if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
						_errHandler.reportMatch(this);
						consume();
					}
					setState(427);
					unary();
					}
					} 
				}
				setState(432);
				_errHandler.sync(this);
				_alt = getInterpreter().adaptivePredict(_input,50,_ctx);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class UnaryContext extends ParserRuleContext {
		public UnaryContext unary() {
			return getRuleContext(UnaryContext.class,0);
		}
		public PrimaryContext primary() {
			return getRuleContext(PrimaryContext.class,0);
		}
		public UnaryContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_unary; }
	}

	public final UnaryContext unary() throws RecognitionException {
		UnaryContext _localctx = new UnaryContext(_ctx, getState());
		enterRule(_localctx, 60, RULE_unary);
		int _la;
		try {
			setState(440);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,51,_ctx) ) {
			case 1:
				enterOuterAlt(_localctx, 1);
				{
				setState(433);
				_la = _input.LA(1);
				if ( !(_la==T__18 || _la==T__21) ) {
				_errHandler.recoverInline(this);
				}
				else {
					if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
					_errHandler.reportMatch(this);
					consume();
				}
				setState(434);
				unary();
				}
				break;
			case 2:
				enterOuterAlt(_localctx, 2);
				{
				setState(435);
				match(T__22);
				setState(436);
				unary();
				}
				break;
			case 3:
				enterOuterAlt(_localctx, 3);
				{
				setState(437);
				match(T__8);
				setState(438);
				unary();
				}
				break;
			case 4:
				enterOuterAlt(_localctx, 4);
				{
				setState(439);
				primary(0);
				}
				break;
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class PrimaryContext extends ParserRuleContext {
		public TerminalNode INTEGER() { return getToken(GolampiParser.INTEGER, 0); }
		public TerminalNode FLOAT() { return getToken(GolampiParser.FLOAT, 0); }
		public TerminalNode STRING() { return getToken(GolampiParser.STRING, 0); }
		public TerminalNode RUNE() { return getToken(GolampiParser.RUNE, 0); }
		public TerminalNode TRUE() { return getToken(GolampiParser.TRUE, 0); }
		public TerminalNode FALSE() { return getToken(GolampiParser.FALSE, 0); }
		public TerminalNode NIL() { return getToken(GolampiParser.NIL, 0); }
		public TerminalNode LEN() { return getToken(GolampiParser.LEN, 0); }
		public List<ExpressionContext> expression() {
			return getRuleContexts(ExpressionContext.class);
		}
		public ExpressionContext expression(int i) {
			return getRuleContext(ExpressionContext.class,i);
		}
		public QualifiedContext qualified() {
			return getRuleContext(QualifiedContext.class,0);
		}
		public ArgumentListContext argumentList() {
			return getRuleContext(ArgumentListContext.class,0);
		}
		public TypeContext type() {
			return getRuleContext(TypeContext.class,0);
		}
		public PrimaryContext primary() {
			return getRuleContext(PrimaryContext.class,0);
		}
		public TerminalNode PLUSPLUS() { return getToken(GolampiParser.PLUSPLUS, 0); }
		public TerminalNode MINUSMINUS() { return getToken(GolampiParser.MINUSMINUS, 0); }
		public PrimaryContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_primary; }
	}

	public final PrimaryContext primary() throws RecognitionException {
		return primary(0);
	}

	private PrimaryContext primary(int _p) throws RecognitionException {
		ParserRuleContext _parentctx = _ctx;
		int _parentState = getState();
		PrimaryContext _localctx = new PrimaryContext(_ctx, _parentState);
		PrimaryContext _prevctx = _localctx;
		int _startState = 62;
		enterRecursionRule(_localctx, 62, RULE_primary, _p);
		int _la;
		try {
			int _alt;
			enterOuterAlt(_localctx, 1);
			{
			setState(484);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,55,_ctx) ) {
			case 1:
				{
				setState(443);
				match(INTEGER);
				}
				break;
			case 2:
				{
				setState(444);
				match(FLOAT);
				}
				break;
			case 3:
				{
				setState(445);
				match(STRING);
				}
				break;
			case 4:
				{
				setState(446);
				match(RUNE);
				}
				break;
			case 5:
				{
				setState(447);
				match(TRUE);
				}
				break;
			case 6:
				{
				setState(448);
				match(FALSE);
				}
				break;
			case 7:
				{
				setState(449);
				match(NIL);
				}
				break;
			case 8:
				{
				setState(450);
				match(LEN);
				setState(451);
				match(T__1);
				setState(452);
				expression();
				setState(453);
				match(T__2);
				}
				break;
			case 9:
				{
				setState(455);
				qualified();
				setState(456);
				match(T__1);
				setState(458);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if ((((_la) & ~0x3f) == 0 && ((1L << _la) & 1154047267087843876L) != 0)) {
					{
					setState(457);
					argumentList();
					}
				}

				setState(460);
				match(T__2);
				}
				break;
			case 10:
				{
				setState(462);
				type();
				setState(463);
				match(T__1);
				setState(465);
				_errHandler.sync(this);
				_la = _input.LA(1);
				if ((((_la) & ~0x3f) == 0 && ((1L << _la) & 1154047267087843876L) != 0)) {
					{
					setState(464);
					argumentList();
					}
				}

				setState(467);
				match(T__2);
				}
				break;
			case 11:
				{
				setState(469);
				qualified();
				}
				break;
			case 12:
				{
				setState(470);
				match(T__1);
				setState(471);
				expression();
				setState(472);
				match(T__2);
				}
				break;
			case 13:
				{
				setState(474);
				qualified();
				setState(481);
				_errHandler.sync(this);
				_alt = getInterpreter().adaptivePredict(_input,54,_ctx);
				while ( _alt!=2 && _alt!=org.antlr.v4.runtime.atn.ATN.INVALID_ALT_NUMBER ) {
					if ( _alt==1 ) {
						{
						{
						setState(475);
						match(T__4);
						setState(476);
						expression();
						setState(477);
						match(T__5);
						}
						} 
					}
					setState(483);
					_errHandler.sync(this);
					_alt = getInterpreter().adaptivePredict(_input,54,_ctx);
				}
				}
				break;
			}
			_ctx.stop = _input.LT(-1);
			setState(492);
			_errHandler.sync(this);
			_alt = getInterpreter().adaptivePredict(_input,57,_ctx);
			while ( _alt!=2 && _alt!=org.antlr.v4.runtime.atn.ATN.INVALID_ALT_NUMBER ) {
				if ( _alt==1 ) {
					if ( _parseListeners!=null ) triggerExitRuleEvent();
					_prevctx = _localctx;
					{
					setState(490);
					_errHandler.sync(this);
					switch ( getInterpreter().adaptivePredict(_input,56,_ctx) ) {
					case 1:
						{
						_localctx = new PrimaryContext(_parentctx, _parentState);
						pushNewRecursionContext(_localctx, _startState, RULE_primary);
						setState(486);
						if (!(precpred(_ctx, 2))) throw new FailedPredicateException(this, "precpred(_ctx, 2)");
						setState(487);
						match(PLUSPLUS);
						}
						break;
					case 2:
						{
						_localctx = new PrimaryContext(_parentctx, _parentState);
						pushNewRecursionContext(_localctx, _startState, RULE_primary);
						setState(488);
						if (!(precpred(_ctx, 1))) throw new FailedPredicateException(this, "precpred(_ctx, 1)");
						setState(489);
						match(MINUSMINUS);
						}
						break;
					}
					} 
				}
				setState(494);
				_errHandler.sync(this);
				_alt = getInterpreter().adaptivePredict(_input,57,_ctx);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			unrollRecursionContexts(_parentctx);
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class QualifiedContext extends ParserRuleContext {
		public List<TerminalNode> IDENTIFIER() { return getTokens(GolampiParser.IDENTIFIER); }
		public TerminalNode IDENTIFIER(int i) {
			return getToken(GolampiParser.IDENTIFIER, i);
		}
		public QualifiedContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_qualified; }
	}

	public final QualifiedContext qualified() throws RecognitionException {
		QualifiedContext _localctx = new QualifiedContext(_ctx, getState());
		enterRule(_localctx, 64, RULE_qualified);
		try {
			int _alt;
			enterOuterAlt(_localctx, 1);
			{
			setState(495);
			match(IDENTIFIER);
			setState(500);
			_errHandler.sync(this);
			_alt = getInterpreter().adaptivePredict(_input,58,_ctx);
			while ( _alt!=2 && _alt!=org.antlr.v4.runtime.atn.ATN.INVALID_ALT_NUMBER ) {
				if ( _alt==1 ) {
					{
					{
					setState(496);
					match(T__23);
					setState(497);
					match(IDENTIFIER);
					}
					} 
				}
				setState(502);
				_errHandler.sync(this);
				_alt = getInterpreter().adaptivePredict(_input,58,_ctx);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class ArgumentListContext extends ParserRuleContext {
		public List<ExpressionContext> expression() {
			return getRuleContexts(ExpressionContext.class);
		}
		public ExpressionContext expression(int i) {
			return getRuleContext(ExpressionContext.class,i);
		}
		public ArgumentListContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_argumentList; }
	}

	public final ArgumentListContext argumentList() throws RecognitionException {
		ArgumentListContext _localctx = new ArgumentListContext(_ctx, getState());
		enterRule(_localctx, 66, RULE_argumentList);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(503);
			expression();
			setState(508);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__3) {
				{
				{
				setState(504);
				match(T__3);
				setState(505);
				expression();
				}
				}
				setState(510);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class TypeContext extends ParserRuleContext {
		public TerminalNode INT() { return getToken(GolampiParser.INT, 0); }
		public TerminalNode FLOATTYPE() { return getToken(GolampiParser.FLOATTYPE, 0); }
		public TerminalNode BOOL() { return getToken(GolampiParser.BOOL, 0); }
		public TerminalNode STRINGTYPE() { return getToken(GolampiParser.STRINGTYPE, 0); }
		public TerminalNode RUNETYPE() { return getToken(GolampiParser.RUNETYPE, 0); }
		public PointerTypeContext pointerType() {
			return getRuleContext(PointerTypeContext.class,0);
		}
		public ArrayTypeContext arrayType() {
			return getRuleContext(ArrayTypeContext.class,0);
		}
		public TypeContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_type; }
	}

	public final TypeContext type() throws RecognitionException {
		TypeContext _localctx = new TypeContext(_ctx, getState());
		enterRule(_localctx, 68, RULE_type);
		try {
			setState(518);
			_errHandler.sync(this);
			switch (_input.LA(1)) {
			case INT:
				enterOuterAlt(_localctx, 1);
				{
				setState(511);
				match(INT);
				}
				break;
			case FLOATTYPE:
				enterOuterAlt(_localctx, 2);
				{
				setState(512);
				match(FLOATTYPE);
				}
				break;
			case BOOL:
				enterOuterAlt(_localctx, 3);
				{
				setState(513);
				match(BOOL);
				}
				break;
			case STRINGTYPE:
				enterOuterAlt(_localctx, 4);
				{
				setState(514);
				match(STRINGTYPE);
				}
				break;
			case RUNETYPE:
				enterOuterAlt(_localctx, 5);
				{
				setState(515);
				match(RUNETYPE);
				}
				break;
			case T__8:
				enterOuterAlt(_localctx, 6);
				{
				setState(516);
				pointerType();
				}
				break;
			case T__4:
				enterOuterAlt(_localctx, 7);
				{
				setState(517);
				arrayType();
				}
				break;
			default:
				throw new NoViableAltException(this);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	@SuppressWarnings("CheckReturnValue")
	public static class PointerTypeContext extends ParserRuleContext {
		public TypeContext type() {
			return getRuleContext(TypeContext.class,0);
		}
		public PointerTypeContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_pointerType; }
	}

	public final PointerTypeContext pointerType() throws RecognitionException {
		PointerTypeContext _localctx = new PointerTypeContext(_ctx, getState());
		enterRule(_localctx, 70, RULE_pointerType);
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(520);
			match(T__8);
			setState(521);
			type();
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	public boolean sempred(RuleContext _localctx, int ruleIndex, int predIndex) {
		switch (ruleIndex) {
		case 31:
			return primary_sempred((PrimaryContext)_localctx, predIndex);
		}
		return true;
	}
	private boolean primary_sempred(PrimaryContext _localctx, int predIndex) {
		switch (predIndex) {
		case 0:
			return precpred(_ctx, 2);
		case 1:
			return precpred(_ctx, 1);
		}
		return true;
	}

	public static final String _serializedATN =
		"\u0004\u0001@\u020c\u0002\u0000\u0007\u0000\u0002\u0001\u0007\u0001\u0002"+
		"\u0002\u0007\u0002\u0002\u0003\u0007\u0003\u0002\u0004\u0007\u0004\u0002"+
		"\u0005\u0007\u0005\u0002\u0006\u0007\u0006\u0002\u0007\u0007\u0007\u0002"+
		"\b\u0007\b\u0002\t\u0007\t\u0002\n\u0007\n\u0002\u000b\u0007\u000b\u0002"+
		"\f\u0007\f\u0002\r\u0007\r\u0002\u000e\u0007\u000e\u0002\u000f\u0007\u000f"+
		"\u0002\u0010\u0007\u0010\u0002\u0011\u0007\u0011\u0002\u0012\u0007\u0012"+
		"\u0002\u0013\u0007\u0013\u0002\u0014\u0007\u0014\u0002\u0015\u0007\u0015"+
		"\u0002\u0016\u0007\u0016\u0002\u0017\u0007\u0017\u0002\u0018\u0007\u0018"+
		"\u0002\u0019\u0007\u0019\u0002\u001a\u0007\u001a\u0002\u001b\u0007\u001b"+
		"\u0002\u001c\u0007\u001c\u0002\u001d\u0007\u001d\u0002\u001e\u0007\u001e"+
		"\u0002\u001f\u0007\u001f\u0002 \u0007 \u0002!\u0007!\u0002\"\u0007\"\u0002"+
		"#\u0007#\u0001\u0000\u0005\u0000J\b\u0000\n\u0000\f\u0000M\t\u0000\u0001"+
		"\u0000\u0001\u0000\u0001\u0001\u0001\u0001\u0001\u0001\u0003\u0001T\b"+
		"\u0001\u0001\u0002\u0001\u0002\u0001\u0002\u0003\u0002Y\b\u0002\u0001"+
		"\u0002\u0001\u0002\u0001\u0002\u0001\u0003\u0001\u0003\u0001\u0003\u0001"+
		"\u0003\u0003\u0003b\b\u0003\u0001\u0003\u0001\u0003\u0003\u0003f\b\u0003"+
		"\u0001\u0003\u0001\u0003\u0001\u0003\u0001\u0003\u0001\u0003\u0003\u0003"+
		"m\b\u0003\u0001\u0003\u0001\u0003\u0001\u0003\u0001\u0003\u0001\u0003"+
		"\u0005\u0003t\b\u0003\n\u0003\f\u0003w\t\u0003\u0001\u0003\u0001\u0003"+
		"\u0001\u0003\u0003\u0003|\b\u0003\u0001\u0004\u0001\u0004\u0001\u0004"+
		"\u0005\u0004\u0081\b\u0004\n\u0004\f\u0004\u0084\t\u0004\u0001\u0005\u0001"+
		"\u0005\u0001\u0005\u0001\u0006\u0001\u0006\u0001\u0006\u0001\u0006\u0005"+
		"\u0006\u008d\b\u0006\n\u0006\f\u0006\u0090\t\u0006\u0001\u0006\u0001\u0006"+
		"\u0001\u0006\u0001\u0006\u0001\u0006\u0005\u0006\u0097\b\u0006\n\u0006"+
		"\f\u0006\u009a\t\u0006\u0003\u0006\u009c\b\u0006\u0001\u0006\u0001\u0006"+
		"\u0001\u0006\u0001\u0006\u0001\u0006\u0003\u0006\u00a3\b\u0006\u0001\u0006"+
		"\u0001\u0006\u0001\u0006\u0001\u0006\u0003\u0006\u00a9\b\u0006\u0003\u0006"+
		"\u00ab\b\u0006\u0001\u0007\u0001\u0007\u0001\u0007\u0001\u0007\u0001\u0007"+
		"\u0001\u0007\u0001\u0007\u0001\u0007\u0001\u0007\u0001\u0007\u0003\u0007"+
		"\u00b7\b\u0007\u0001\b\u0003\b\u00ba\b\b\u0001\b\u0001\b\u0001\b\u0001"+
		"\b\u0005\b\u00c0\b\b\n\b\f\b\u00c3\t\b\u0001\b\u0003\b\u00c6\b\b\u0001"+
		"\b\u0001\b\u0001\t\u0001\t\u0001\t\u0001\t\u0005\t\u00ce\b\t\n\t\f\t\u00d1"+
		"\t\t\u0001\t\u0003\t\u00d4\b\t\u0001\t\u0001\t\u0001\t\u0003\t\u00d9\b"+
		"\t\u0001\n\u0001\n\u0005\n\u00dd\b\n\n\n\f\n\u00e0\t\n\u0001\n\u0001\n"+
		"\u0001\u000b\u0001\u000b\u0001\u000b\u0001\u000b\u0001\u000b\u0001\u000b"+
		"\u0001\u000b\u0001\u000b\u0001\u000b\u0001\u000b\u0001\u000b\u0001\u000b"+
		"\u0001\u000b\u0003\u000b\u00f1\b\u000b\u0001\f\u0001\f\u0001\f\u0005\f"+
		"\u00f6\b\f\n\f\f\f\u00f9\t\f\u0001\f\u0001\f\u0001\f\u0001\f\u0005\f\u00ff"+
		"\b\f\n\f\f\f\u0102\t\f\u0001\r\u0001\r\u0001\r\u0001\r\u0003\r\u0108\b"+
		"\r\u0001\u000e\u0001\u000e\u0001\u000e\u0001\u000e\u0001\u000e\u0004\u000e"+
		"\u010f\b\u000e\u000b\u000e\f\u000e\u0110\u0001\u000e\u0001\u000e\u0001"+
		"\u000e\u0001\u000e\u0001\u000e\u0001\u000e\u0001\u000e\u0004\u000e\u011a"+
		"\b\u000e\u000b\u000e\f\u000e\u011b\u0001\u000e\u0001\u000e\u0001\u000e"+
		"\u0001\u000e\u0001\u000e\u0001\u000e\u0001\u000e\u0001\u000e\u0001\u000e"+
		"\u0003\u000e\u0127\b\u000e\u0001\u000f\u0001\u000f\u0001\u0010\u0001\u0010"+
		"\u0001\u0010\u0001\u0010\u0001\u0010\u0001\u0010\u0003\u0010\u0131\b\u0010"+
		"\u0003\u0010\u0133\b\u0010\u0001\u0011\u0001\u0011\u0003\u0011\u0137\b"+
		"\u0011\u0001\u0011\u0001\u0011\u0001\u0011\u0001\u0011\u0001\u0011\u0001"+
		"\u0011\u0001\u0011\u0003\u0011\u0140\b\u0011\u0001\u0011\u0001\u0011\u0003"+
		"\u0011\u0144\b\u0011\u0001\u0012\u0001\u0012\u0001\u0012\u0001\u0012\u0005"+
		"\u0012\u014a\b\u0012\n\u0012\f\u0012\u014d\t\u0012\u0003\u0012\u014f\b"+
		"\u0012\u0001\u0013\u0001\u0013\u0003\u0013\u0153\b\u0013\u0001\u0013\u0001"+
		"\u0013\u0005\u0013\u0157\b\u0013\n\u0013\f\u0013\u015a\t\u0013\u0001\u0013"+
		"\u0001\u0013\u0001\u0013\u0001\u0013\u0004\u0013\u0160\b\u0013\u000b\u0013"+
		"\f\u0013\u0161\u0003\u0013\u0164\b\u0013\u0003\u0013\u0166\b\u0013\u0001"+
		"\u0013\u0001\u0013\u0001\u0014\u0001\u0014\u0001\u0014\u0001\u0014\u0005"+
		"\u0014\u016e\b\u0014\n\u0014\f\u0014\u0171\t\u0014\u0001\u0014\u0001\u0014"+
		"\u0001\u0014\u0004\u0014\u0176\b\u0014\u000b\u0014\f\u0014\u0177\u0003"+
		"\u0014\u017a\b\u0014\u0001\u0015\u0001\u0015\u0001\u0016\u0001\u0016\u0001"+
		"\u0017\u0001\u0017\u0001\u0018\u0001\u0018\u0001\u0018\u0005\u0018\u0185"+
		"\b\u0018\n\u0018\f\u0018\u0188\t\u0018\u0001\u0019\u0001\u0019\u0001\u0019"+
		"\u0005\u0019\u018d\b\u0019\n\u0019\f\u0019\u0190\t\u0019\u0001\u001a\u0001"+
		"\u001a\u0001\u001a\u0005\u001a\u0195\b\u001a\n\u001a\f\u001a\u0198\t\u001a"+
		"\u0001\u001b\u0001\u001b\u0001\u001b\u0005\u001b\u019d\b\u001b\n\u001b"+
		"\f\u001b\u01a0\t\u001b\u0001\u001c\u0001\u001c\u0001\u001c\u0005\u001c"+
		"\u01a5\b\u001c\n\u001c\f\u001c\u01a8\t\u001c\u0001\u001d\u0001\u001d\u0001"+
		"\u001d\u0005\u001d\u01ad\b\u001d\n\u001d\f\u001d\u01b0\t\u001d\u0001\u001e"+
		"\u0001\u001e\u0001\u001e\u0001\u001e\u0001\u001e\u0001\u001e\u0001\u001e"+
		"\u0003\u001e\u01b9\b\u001e\u0001\u001f\u0001\u001f\u0001\u001f\u0001\u001f"+
		"\u0001\u001f\u0001\u001f\u0001\u001f\u0001\u001f\u0001\u001f\u0001\u001f"+
		"\u0001\u001f\u0001\u001f\u0001\u001f\u0001\u001f\u0001\u001f\u0001\u001f"+
		"\u0003\u001f\u01cb\b\u001f\u0001\u001f\u0001\u001f\u0001\u001f\u0001\u001f"+
		"\u0001\u001f\u0003\u001f\u01d2\b\u001f\u0001\u001f\u0001\u001f\u0001\u001f"+
		"\u0001\u001f\u0001\u001f\u0001\u001f\u0001\u001f\u0001\u001f\u0001\u001f"+
		"\u0001\u001f\u0001\u001f\u0001\u001f\u0005\u001f\u01e0\b\u001f\n\u001f"+
		"\f\u001f\u01e3\t\u001f\u0003\u001f\u01e5\b\u001f\u0001\u001f\u0001\u001f"+
		"\u0001\u001f\u0001\u001f\u0005\u001f\u01eb\b\u001f\n\u001f\f\u001f\u01ee"+
		"\t\u001f\u0001 \u0001 \u0001 \u0005 \u01f3\b \n \f \u01f6\t \u0001!\u0001"+
		"!\u0001!\u0005!\u01fb\b!\n!\f!\u01fe\t!\u0001\"\u0001\"\u0001\"\u0001"+
		"\"\u0001\"\u0001\"\u0001\"\u0003\"\u0207\b\"\u0001#\u0001#\u0001#\u0001"+
		"#\u0000\u0001>$\u0000\u0002\u0004\u0006\b\n\f\u000e\u0010\u0012\u0014"+
		"\u0016\u0018\u001a\u001c\u001e \"$&(*,.02468:<>@BDF\u0000\u0007\u0001"+
		"\u000023\u0001\u000048\u0001\u0000\f\r\u0001\u0000\u000e\u0011\u0001\u0000"+
		"\u0012\u0013\u0002\u0000\t\t\u0014\u0015\u0002\u0000\u0013\u0013\u0016"+
		"\u0016\u0246\u0000K\u0001\u0000\u0000\u0000\u0002S\u0001\u0000\u0000\u0000"+
		"\u0004U\u0001\u0000\u0000\u0000\u0006{\u0001\u0000\u0000\u0000\b}\u0001"+
		"\u0000\u0000\u0000\n\u0085\u0001\u0000\u0000\u0000\f\u00aa\u0001\u0000"+
		"\u0000\u0000\u000e\u00b6\u0001\u0000\u0000\u0000\u0010\u00b9\u0001\u0000"+
		"\u0000\u0000\u0012\u00d8\u0001\u0000\u0000\u0000\u0014\u00da\u0001\u0000"+
		"\u0000\u0000\u0016\u00f0\u0001\u0000\u0000\u0000\u0018\u00f2\u0001\u0000"+
		"\u0000\u0000\u001a\u0107\u0001\u0000\u0000\u0000\u001c\u0126\u0001\u0000"+
		"\u0000\u0000\u001e\u0128\u0001\u0000\u0000\u0000 \u012a\u0001\u0000\u0000"+
		"\u0000\"\u0143\u0001\u0000\u0000\u0000$\u0145\u0001\u0000\u0000\u0000"+
		"&\u0150\u0001\u0000\u0000\u0000(\u0169\u0001\u0000\u0000\u0000*\u017b"+
		"\u0001\u0000\u0000\u0000,\u017d\u0001\u0000\u0000\u0000.\u017f\u0001\u0000"+
		"\u0000\u00000\u0181\u0001\u0000\u0000\u00002\u0189\u0001\u0000\u0000\u0000"+
		"4\u0191\u0001\u0000\u0000\u00006\u0199\u0001\u0000\u0000\u00008\u01a1"+
		"\u0001\u0000\u0000\u0000:\u01a9\u0001\u0000\u0000\u0000<\u01b8\u0001\u0000"+
		"\u0000\u0000>\u01e4\u0001\u0000\u0000\u0000@\u01ef\u0001\u0000\u0000\u0000"+
		"B\u01f7\u0001\u0000\u0000\u0000D\u0206\u0001\u0000\u0000\u0000F\u0208"+
		"\u0001\u0000\u0000\u0000HJ\u0003\u0002\u0001\u0000IH\u0001\u0000\u0000"+
		"\u0000JM\u0001\u0000\u0000\u0000KI\u0001\u0000\u0000\u0000KL\u0001\u0000"+
		"\u0000\u0000LN\u0001\u0000\u0000\u0000MK\u0001\u0000\u0000\u0000NO\u0005"+
		"\u0000\u0000\u0001O\u0001\u0001\u0000\u0000\u0000PT\u0003\u0006\u0003"+
		"\u0000QT\u0003\f\u0006\u0000RT\u0003\u0004\u0002\u0000SP\u0001\u0000\u0000"+
		"\u0000SQ\u0001\u0000\u0000\u0000SR\u0001\u0000\u0000\u0000T\u0003\u0001"+
		"\u0000\u0000\u0000UV\u0005\u0019\u0000\u0000VX\u0005<\u0000\u0000WY\u0003"+
		"D\"\u0000XW\u0001\u0000\u0000\u0000XY\u0001\u0000\u0000\u0000YZ\u0001"+
		"\u0000\u0000\u0000Z[\u0005\u0001\u0000\u0000[\\\u0003.\u0017\u0000\\\u0005"+
		"\u0001\u0000\u0000\u0000]^\u0005\u001a\u0000\u0000^_\u0005<\u0000\u0000"+
		"_a\u0005\u0002\u0000\u0000`b\u0003\b\u0004\u0000a`\u0001\u0000\u0000\u0000"+
		"ab\u0001\u0000\u0000\u0000bc\u0001\u0000\u0000\u0000ce\u0005\u0003\u0000"+
		"\u0000df\u0003D\"\u0000ed\u0001\u0000\u0000\u0000ef\u0001\u0000\u0000"+
		"\u0000fg\u0001\u0000\u0000\u0000g|\u0003\u0014\n\u0000hi\u0005\u001a\u0000"+
		"\u0000ij\u0005<\u0000\u0000jl\u0005\u0002\u0000\u0000km\u0003\b\u0004"+
		"\u0000lk\u0001\u0000\u0000\u0000lm\u0001\u0000\u0000\u0000mn\u0001\u0000"+
		"\u0000\u0000no\u0005\u0003\u0000\u0000op\u0005\u0002\u0000\u0000pu\u0003"+
		"D\"\u0000qr\u0005\u0004\u0000\u0000rt\u0003D\"\u0000sq\u0001\u0000\u0000"+
		"\u0000tw\u0001\u0000\u0000\u0000us\u0001\u0000\u0000\u0000uv\u0001\u0000"+
		"\u0000\u0000vx\u0001\u0000\u0000\u0000wu\u0001\u0000\u0000\u0000xy\u0005"+
		"\u0003\u0000\u0000yz\u0003\u0014\n\u0000z|\u0001\u0000\u0000\u0000{]\u0001"+
		"\u0000\u0000\u0000{h\u0001\u0000\u0000\u0000|\u0007\u0001\u0000\u0000"+
		"\u0000}\u0082\u0003\n\u0005\u0000~\u007f\u0005\u0004\u0000\u0000\u007f"+
		"\u0081\u0003\n\u0005\u0000\u0080~\u0001\u0000\u0000\u0000\u0081\u0084"+
		"\u0001\u0000\u0000\u0000\u0082\u0080\u0001\u0000\u0000\u0000\u0082\u0083"+
		"\u0001\u0000\u0000\u0000\u0083\t\u0001\u0000\u0000\u0000\u0084\u0082\u0001"+
		"\u0000\u0000\u0000\u0085\u0086\u0005<\u0000\u0000\u0086\u0087\u0003D\""+
		"\u0000\u0087\u000b\u0001\u0000\u0000\u0000\u0088\u0089\u0005\u001b\u0000"+
		"\u0000\u0089\u008e\u0005<\u0000\u0000\u008a\u008b\u0005\u0004\u0000\u0000"+
		"\u008b\u008d\u0005<\u0000\u0000\u008c\u008a\u0001\u0000\u0000\u0000\u008d"+
		"\u0090\u0001\u0000\u0000\u0000\u008e\u008c\u0001\u0000\u0000\u0000\u008e"+
		"\u008f\u0001\u0000\u0000\u0000\u008f\u0091\u0001\u0000\u0000\u0000\u0090"+
		"\u008e\u0001\u0000\u0000\u0000\u0091\u009b\u0003D\"\u0000\u0092\u0093"+
		"\u0005\u0001\u0000\u0000\u0093\u0098\u0003.\u0017\u0000\u0094\u0095\u0005"+
		"\u0004\u0000\u0000\u0095\u0097\u0003.\u0017\u0000\u0096\u0094\u0001\u0000"+
		"\u0000\u0000\u0097\u009a\u0001\u0000\u0000\u0000\u0098\u0096\u0001\u0000"+
		"\u0000\u0000\u0098\u0099\u0001\u0000\u0000\u0000\u0099\u009c\u0001\u0000"+
		"\u0000\u0000\u009a\u0098\u0001\u0000\u0000\u0000\u009b\u0092\u0001\u0000"+
		"\u0000\u0000\u009b\u009c\u0001\u0000\u0000\u0000\u009c\u00ab\u0001\u0000"+
		"\u0000\u0000\u009d\u009e\u0005\u001b\u0000\u0000\u009e\u009f\u0005<\u0000"+
		"\u0000\u009f\u00a2\u0003\u000e\u0007\u0000\u00a0\u00a1\u0005\u0001\u0000"+
		"\u0000\u00a1\u00a3\u0003\u0010\b\u0000\u00a2\u00a0\u0001\u0000\u0000\u0000"+
		"\u00a2\u00a3\u0001\u0000\u0000\u0000\u00a3\u00ab\u0001\u0000\u0000\u0000"+
		"\u00a4\u00a5\u0005<\u0000\u0000\u00a5\u00a8\u0003\u000e\u0007\u0000\u00a6"+
		"\u00a7\u0005\u0001\u0000\u0000\u00a7\u00a9\u0003\u0010\b\u0000\u00a8\u00a6"+
		"\u0001\u0000\u0000\u0000\u00a8\u00a9\u0001\u0000\u0000\u0000\u00a9\u00ab"+
		"\u0001\u0000\u0000\u0000\u00aa\u0088\u0001\u0000\u0000\u0000\u00aa\u009d"+
		"\u0001\u0000\u0000\u0000\u00aa\u00a4\u0001\u0000\u0000\u0000\u00ab\r\u0001"+
		"\u0000\u0000\u0000\u00ac\u00ad\u0005\u0005\u0000\u0000\u00ad\u00ae\u0003"+
		".\u0017\u0000\u00ae\u00af\u0005\u0006\u0000\u0000\u00af\u00b0\u0003\u000e"+
		"\u0007\u0000\u00b0\u00b7\u0001\u0000\u0000\u0000\u00b1\u00b2\u0005\u0005"+
		"\u0000\u0000\u00b2\u00b3\u0003.\u0017\u0000\u00b3\u00b4\u0005\u0006\u0000"+
		"\u0000\u00b4\u00b5\u0003D\"\u0000\u00b5\u00b7\u0001\u0000\u0000\u0000"+
		"\u00b6\u00ac\u0001\u0000\u0000\u0000\u00b6\u00b1\u0001\u0000\u0000\u0000"+
		"\u00b7\u000f\u0001\u0000\u0000\u0000\u00b8\u00ba\u0003\u000e\u0007\u0000"+
		"\u00b9\u00b8\u0001\u0000\u0000\u0000\u00b9\u00ba\u0001\u0000\u0000\u0000"+
		"\u00ba\u00bb\u0001\u0000\u0000\u0000\u00bb\u00bc\u0005\u0007\u0000\u0000"+
		"\u00bc\u00c1\u0003\u0012\t\u0000\u00bd\u00be\u0005\u0004\u0000\u0000\u00be"+
		"\u00c0\u0003\u0012\t\u0000\u00bf\u00bd\u0001\u0000\u0000\u0000\u00c0\u00c3"+
		"\u0001\u0000\u0000\u0000\u00c1\u00bf\u0001\u0000\u0000\u0000\u00c1\u00c2"+
		"\u0001\u0000\u0000\u0000\u00c2\u00c5\u0001\u0000\u0000\u0000\u00c3\u00c1"+
		"\u0001\u0000\u0000\u0000\u00c4\u00c6\u0005\u0004\u0000\u0000\u00c5\u00c4"+
		"\u0001\u0000\u0000\u0000\u00c5\u00c6\u0001\u0000\u0000\u0000\u00c6\u00c7"+
		"\u0001\u0000\u0000\u0000\u00c7\u00c8\u0005\b\u0000\u0000\u00c8\u0011\u0001"+
		"\u0000\u0000\u0000\u00c9\u00ca\u0005\u0007\u0000\u0000\u00ca\u00cf\u0003"+
		"\u0012\t\u0000\u00cb\u00cc\u0005\u0004\u0000\u0000\u00cc\u00ce\u0003\u0012"+
		"\t\u0000\u00cd\u00cb\u0001\u0000\u0000\u0000\u00ce\u00d1\u0001\u0000\u0000"+
		"\u0000\u00cf\u00cd\u0001\u0000\u0000\u0000\u00cf\u00d0\u0001\u0000\u0000"+
		"\u0000\u00d0\u00d3\u0001\u0000\u0000\u0000\u00d1\u00cf\u0001\u0000\u0000"+
		"\u0000\u00d2\u00d4\u0005\u0004\u0000\u0000\u00d3\u00d2\u0001\u0000\u0000"+
		"\u0000\u00d3\u00d4\u0001\u0000\u0000\u0000\u00d4\u00d5\u0001\u0000\u0000"+
		"\u0000\u00d5\u00d6\u0005\b\u0000\u0000\u00d6\u00d9\u0001\u0000\u0000\u0000"+
		"\u00d7\u00d9\u0003.\u0017\u0000\u00d8\u00c9\u0001\u0000\u0000\u0000\u00d8"+
		"\u00d7\u0001\u0000\u0000\u0000\u00d9\u0013\u0001\u0000\u0000\u0000\u00da"+
		"\u00de\u0005\u0007\u0000\u0000\u00db\u00dd\u0003\u0016\u000b\u0000\u00dc"+
		"\u00db\u0001\u0000\u0000\u0000\u00dd\u00e0\u0001\u0000\u0000\u0000\u00de"+
		"\u00dc\u0001\u0000\u0000\u0000\u00de\u00df\u0001\u0000\u0000\u0000\u00df"+
		"\u00e1\u0001\u0000\u0000\u0000\u00e0\u00de\u0001\u0000\u0000\u0000\u00e1"+
		"\u00e2\u0005\b\u0000\u0000\u00e2\u0015\u0001\u0000\u0000\u0000\u00e3\u00f1"+
		"\u0003\f\u0006\u0000\u00e4\u00f1\u0003\u0004\u0002\u0000\u00e5\u00f1\u0003"+
		"&\u0013\u0000\u00e6\u00f1\u0003\u001e\u000f\u0000\u00e7\u00f1\u0003\u0018"+
		"\f\u0000\u00e8\u00f1\u0003\u001c\u000e\u0000\u00e9\u00f1\u0003 \u0010"+
		"\u0000\u00ea\u00f1\u0003\"\u0011\u0000\u00eb\u00f1\u0003$\u0012\u0000"+
		"\u00ec\u00f1\u0003*\u0015\u0000\u00ed\u00f1\u0003,\u0016\u0000\u00ee\u00f1"+
		"\u0003\u001e\u000f\u0000\u00ef\u00f1\u0003\u0014\n\u0000\u00f0\u00e3\u0001"+
		"\u0000\u0000\u0000\u00f0\u00e4\u0001\u0000\u0000\u0000\u00f0\u00e5\u0001"+
		"\u0000\u0000\u0000\u00f0\u00e6\u0001\u0000\u0000\u0000\u00f0\u00e7\u0001"+
		"\u0000\u0000\u0000\u00f0\u00e8\u0001\u0000\u0000\u0000\u00f0\u00e9\u0001"+
		"\u0000\u0000\u0000\u00f0\u00ea\u0001\u0000\u0000\u0000\u00f0\u00eb\u0001"+
		"\u0000\u0000\u0000\u00f0\u00ec\u0001\u0000\u0000\u0000\u00f0\u00ed\u0001"+
		"\u0000\u0000\u0000\u00f0\u00ee\u0001\u0000\u0000\u0000\u00f0\u00ef\u0001"+
		"\u0000\u0000\u0000\u00f1\u0017\u0001\u0000\u0000\u0000\u00f2\u00f7\u0005"+
		"<\u0000\u0000\u00f3\u00f4\u0005\u0004\u0000\u0000\u00f4\u00f6\u0005<\u0000"+
		"\u0000\u00f5\u00f3\u0001\u0000\u0000\u0000\u00f6\u00f9\u0001\u0000\u0000"+
		"\u0000\u00f7\u00f5\u0001\u0000\u0000\u0000\u00f7\u00f8\u0001\u0000\u0000"+
		"\u0000\u00f8\u00fa\u0001\u0000\u0000\u0000\u00f9\u00f7\u0001\u0000\u0000"+
		"\u0000\u00fa\u00fb\u0005;\u0000\u0000\u00fb\u0100\u0003\u001a\r\u0000"+
		"\u00fc\u00fd\u0005\u0004\u0000\u0000\u00fd\u00ff\u0003\u001a\r\u0000\u00fe"+
		"\u00fc\u0001\u0000\u0000\u0000\u00ff\u0102\u0001\u0000\u0000\u0000\u0100"+
		"\u00fe\u0001\u0000\u0000\u0000\u0100\u0101\u0001\u0000\u0000\u0000\u0101"+
		"\u0019\u0001\u0000\u0000\u0000\u0102\u0100\u0001\u0000\u0000\u0000\u0103"+
		"\u0104\u0003\u000e\u0007\u0000\u0104\u0105\u0003\u0010\b\u0000\u0105\u0108"+
		"\u0001\u0000\u0000\u0000\u0106\u0108\u0003.\u0017\u0000\u0107\u0103\u0001"+
		"\u0000\u0000\u0000\u0107\u0106\u0001\u0000\u0000\u0000\u0108\u001b\u0001"+
		"\u0000\u0000\u0000\u0109\u010e\u0005<\u0000\u0000\u010a\u010b\u0005\u0005"+
		"\u0000\u0000\u010b\u010c\u0003.\u0017\u0000\u010c\u010d\u0005\u0006\u0000"+
		"\u0000\u010d\u010f\u0001\u0000\u0000\u0000\u010e\u010a\u0001\u0000\u0000"+
		"\u0000\u010f\u0110\u0001\u0000\u0000\u0000\u0110\u010e\u0001\u0000\u0000"+
		"\u0000\u0110\u0111\u0001\u0000\u0000\u0000\u0111\u0112\u0001\u0000\u0000"+
		"\u0000\u0112\u0113\u0005\u0001\u0000\u0000\u0113\u0114\u0003.\u0017\u0000"+
		"\u0114\u0127\u0001\u0000\u0000\u0000\u0115\u0116\u0005<\u0000\u0000\u0116"+
		"\u0117\u0005\u0001\u0000\u0000\u0117\u0127\u0003.\u0017\u0000\u0118\u011a"+
		"\u0005\t\u0000\u0000\u0119\u0118\u0001\u0000\u0000\u0000\u011a\u011b\u0001"+
		"\u0000\u0000\u0000\u011b\u0119\u0001\u0000\u0000\u0000\u011b\u011c\u0001"+
		"\u0000\u0000\u0000\u011c\u011d\u0001\u0000\u0000\u0000\u011d\u011e\u0005"+
		"<\u0000\u0000\u011e\u011f\u0005\u0001\u0000\u0000\u011f\u0127\u0003.\u0017"+
		"\u0000\u0120\u0121\u0003>\u001f\u0000\u0121\u0122\u0007\u0000\u0000\u0000"+
		"\u0122\u0127\u0001\u0000\u0000\u0000\u0123\u0124\u0005<\u0000\u0000\u0124"+
		"\u0125\u0007\u0001\u0000\u0000\u0125\u0127\u0003.\u0017\u0000\u0126\u0109"+
		"\u0001\u0000\u0000\u0000\u0126\u0115\u0001\u0000\u0000\u0000\u0126\u0119"+
		"\u0001\u0000\u0000\u0000\u0126\u0120\u0001\u0000\u0000\u0000\u0126\u0123"+
		"\u0001\u0000\u0000\u0000\u0127\u001d\u0001\u0000\u0000\u0000\u0128\u0129"+
		"\u0003.\u0017\u0000\u0129\u001f\u0001\u0000\u0000\u0000\u012a\u012b\u0005"+
		"\u001f\u0000\u0000\u012b\u012c\u0003.\u0017\u0000\u012c\u0132\u0003\u0014"+
		"\n\u0000\u012d\u0130\u0005 \u0000\u0000\u012e\u0131\u0003 \u0010\u0000"+
		"\u012f\u0131\u0003\u0014\n\u0000\u0130\u012e\u0001\u0000\u0000\u0000\u0130"+
		"\u012f\u0001\u0000\u0000\u0000\u0131\u0133\u0001\u0000\u0000\u0000\u0132"+
		"\u012d\u0001\u0000\u0000\u0000\u0132\u0133\u0001\u0000\u0000\u0000\u0133"+
		"!\u0001\u0000\u0000\u0000\u0134\u0136\u0005!\u0000\u0000\u0135\u0137\u0003"+
		".\u0017\u0000\u0136\u0135\u0001\u0000\u0000\u0000\u0136\u0137\u0001\u0000"+
		"\u0000\u0000\u0137\u0138\u0001\u0000\u0000\u0000\u0138\u0144\u0003\u0014"+
		"\n\u0000\u0139\u013a\u0005!\u0000\u0000\u013a\u013b\u0003\u0018\f\u0000"+
		"\u013b\u013c\u0005\n\u0000\u0000\u013c\u013d\u0003.\u0017\u0000\u013d"+
		"\u013f\u0005\n\u0000\u0000\u013e\u0140\u0003\u0016\u000b\u0000\u013f\u013e"+
		"\u0001\u0000\u0000\u0000\u013f\u0140\u0001\u0000\u0000\u0000\u0140\u0141"+
		"\u0001\u0000\u0000\u0000\u0141\u0142\u0003\u0014\n\u0000\u0142\u0144\u0001"+
		"\u0000\u0000\u0000\u0143\u0134\u0001\u0000\u0000\u0000\u0143\u0139\u0001"+
		"\u0000\u0000\u0000\u0144#\u0001\u0000\u0000\u0000\u0145\u014e\u0005\""+
		"\u0000\u0000\u0146\u014b\u0003.\u0017\u0000\u0147\u0148\u0005\u0004\u0000"+
		"\u0000\u0148\u014a\u0003.\u0017\u0000\u0149\u0147\u0001\u0000\u0000\u0000"+
		"\u014a\u014d\u0001\u0000\u0000\u0000\u014b\u0149\u0001\u0000\u0000\u0000"+
		"\u014b\u014c\u0001\u0000\u0000\u0000\u014c\u014f\u0001\u0000\u0000\u0000"+
		"\u014d\u014b\u0001\u0000\u0000\u0000\u014e\u0146\u0001\u0000\u0000\u0000"+
		"\u014e\u014f\u0001\u0000\u0000\u0000\u014f%\u0001\u0000\u0000\u0000\u0150"+
		"\u0152\u0005\u001c\u0000\u0000\u0151\u0153\u0003.\u0017\u0000\u0152\u0151"+
		"\u0001\u0000\u0000\u0000\u0152\u0153\u0001\u0000\u0000\u0000\u0153\u0154"+
		"\u0001\u0000\u0000\u0000\u0154\u0158\u0005\u0007\u0000\u0000\u0155\u0157"+
		"\u0003(\u0014\u0000\u0156\u0155\u0001\u0000\u0000\u0000\u0157\u015a\u0001"+
		"\u0000\u0000\u0000\u0158\u0156\u0001\u0000\u0000\u0000\u0158\u0159\u0001"+
		"\u0000\u0000\u0000\u0159\u0165\u0001\u0000\u0000\u0000\u015a\u0158\u0001"+
		"\u0000\u0000\u0000\u015b\u015c\u0005\u001e\u0000\u0000\u015c\u0163\u0005"+
		"\u000b\u0000\u0000\u015d\u0164\u0003\u0014\n\u0000\u015e\u0160\u0003\u0016"+
		"\u000b\u0000\u015f\u015e\u0001\u0000\u0000\u0000\u0160\u0161\u0001\u0000"+
		"\u0000\u0000\u0161\u015f\u0001\u0000\u0000\u0000\u0161\u0162\u0001\u0000"+
		"\u0000\u0000\u0162\u0164\u0001\u0000\u0000\u0000\u0163\u015d\u0001\u0000"+
		"\u0000\u0000\u0163\u015f\u0001\u0000\u0000\u0000\u0164\u0166\u0001\u0000"+
		"\u0000\u0000\u0165\u015b\u0001\u0000\u0000\u0000\u0165\u0166\u0001\u0000"+
		"\u0000\u0000\u0166\u0167\u0001\u0000\u0000\u0000\u0167\u0168\u0005\b\u0000"+
		"\u0000\u0168\'\u0001\u0000\u0000\u0000\u0169\u016a\u0005\u001d\u0000\u0000"+
		"\u016a\u016f\u0003.\u0017\u0000\u016b\u016c\u0005\u0004\u0000\u0000\u016c"+
		"\u016e\u0003.\u0017\u0000\u016d\u016b\u0001\u0000\u0000\u0000\u016e\u0171"+
		"\u0001\u0000\u0000\u0000\u016f\u016d\u0001\u0000\u0000\u0000\u016f\u0170"+
		"\u0001\u0000\u0000\u0000\u0170\u0172\u0001\u0000\u0000\u0000\u0171\u016f"+
		"\u0001\u0000\u0000\u0000\u0172\u0179\u0005\u000b\u0000\u0000\u0173\u017a"+
		"\u0003\u0014\n\u0000\u0174\u0176\u0003\u0016\u000b\u0000\u0175\u0174\u0001"+
		"\u0000\u0000\u0000\u0176\u0177\u0001\u0000\u0000\u0000\u0177\u0175\u0001"+
		"\u0000\u0000\u0000\u0177\u0178\u0001\u0000\u0000\u0000\u0178\u017a\u0001"+
		"\u0000\u0000\u0000\u0179\u0173\u0001\u0000\u0000\u0000\u0179\u0175\u0001"+
		"\u0000\u0000\u0000\u017a)\u0001\u0000\u0000\u0000\u017b\u017c\u0005#\u0000"+
		"\u0000\u017c+\u0001\u0000\u0000\u0000\u017d\u017e\u0005$\u0000\u0000\u017e"+
		"-\u0001\u0000\u0000\u0000\u017f\u0180\u00030\u0018\u0000\u0180/\u0001"+
		"\u0000\u0000\u0000\u0181\u0186\u00032\u0019\u0000\u0182\u0183\u0005:\u0000"+
		"\u0000\u0183\u0185\u00032\u0019\u0000\u0184\u0182\u0001\u0000\u0000\u0000"+
		"\u0185\u0188\u0001\u0000\u0000\u0000\u0186\u0184\u0001\u0000\u0000\u0000"+
		"\u0186\u0187\u0001\u0000\u0000\u0000\u01871\u0001\u0000\u0000\u0000\u0188"+
		"\u0186\u0001\u0000\u0000\u0000\u0189\u018e\u00034\u001a\u0000\u018a\u018b"+
		"\u00059\u0000\u0000\u018b\u018d\u00034\u001a\u0000\u018c\u018a\u0001\u0000"+
		"\u0000\u0000\u018d\u0190\u0001\u0000\u0000\u0000\u018e\u018c\u0001\u0000"+
		"\u0000\u0000\u018e\u018f\u0001\u0000\u0000\u0000\u018f3\u0001\u0000\u0000"+
		"\u0000\u0190\u018e\u0001\u0000\u0000\u0000\u0191\u0196\u00036\u001b\u0000"+
		"\u0192\u0193\u0007\u0002\u0000\u0000\u0193\u0195\u00036\u001b\u0000\u0194"+
		"\u0192\u0001\u0000\u0000\u0000\u0195\u0198\u0001\u0000\u0000\u0000\u0196"+
		"\u0194\u0001\u0000\u0000\u0000\u0196\u0197\u0001\u0000\u0000\u0000\u0197"+
		"5\u0001\u0000\u0000\u0000\u0198\u0196\u0001\u0000\u0000\u0000\u0199\u019e"+
		"\u00038\u001c\u0000\u019a\u019b\u0007\u0003\u0000\u0000\u019b\u019d\u0003"+
		"8\u001c\u0000\u019c\u019a\u0001\u0000\u0000\u0000\u019d\u01a0\u0001\u0000"+
		"\u0000\u0000\u019e\u019c\u0001\u0000\u0000\u0000\u019e\u019f\u0001\u0000"+
		"\u0000\u0000\u019f7\u0001\u0000\u0000\u0000\u01a0\u019e\u0001\u0000\u0000"+
		"\u0000\u01a1\u01a6\u0003:\u001d\u0000\u01a2\u01a3\u0007\u0004\u0000\u0000"+
		"\u01a3\u01a5\u0003:\u001d\u0000\u01a4\u01a2\u0001\u0000\u0000\u0000\u01a5"+
		"\u01a8\u0001\u0000\u0000\u0000\u01a6\u01a4\u0001\u0000\u0000\u0000\u01a6"+
		"\u01a7\u0001\u0000\u0000\u0000\u01a79\u0001\u0000\u0000\u0000\u01a8\u01a6"+
		"\u0001\u0000\u0000\u0000\u01a9\u01ae\u0003<\u001e\u0000\u01aa\u01ab\u0007"+
		"\u0005\u0000\u0000\u01ab\u01ad\u0003<\u001e\u0000\u01ac\u01aa\u0001\u0000"+
		"\u0000\u0000\u01ad\u01b0\u0001\u0000\u0000\u0000\u01ae\u01ac\u0001\u0000"+
		"\u0000\u0000\u01ae\u01af\u0001\u0000\u0000\u0000\u01af;\u0001\u0000\u0000"+
		"\u0000\u01b0\u01ae\u0001\u0000\u0000\u0000\u01b1\u01b2\u0007\u0006\u0000"+
		"\u0000\u01b2\u01b9\u0003<\u001e\u0000\u01b3\u01b4\u0005\u0017\u0000\u0000"+
		"\u01b4\u01b9\u0003<\u001e\u0000\u01b5\u01b6\u0005\t\u0000\u0000\u01b6"+
		"\u01b9\u0003<\u001e\u0000\u01b7\u01b9\u0003>\u001f\u0000\u01b8\u01b1\u0001"+
		"\u0000\u0000\u0000\u01b8\u01b3\u0001\u0000\u0000\u0000\u01b8\u01b5\u0001"+
		"\u0000\u0000\u0000\u01b8\u01b7\u0001\u0000\u0000\u0000\u01b9=\u0001\u0000"+
		"\u0000\u0000\u01ba\u01bb\u0006\u001f\uffff\uffff\u0000\u01bb\u01e5\u0005"+
		".\u0000\u0000\u01bc\u01e5\u0005/\u0000\u0000\u01bd\u01e5\u00050\u0000"+
		"\u0000\u01be\u01e5\u00051\u0000\u0000\u01bf\u01e5\u0005%\u0000\u0000\u01c0"+
		"\u01e5\u0005&\u0000\u0000\u01c1\u01e5\u0005(\u0000\u0000\u01c2\u01c3\u0005"+
		"\'\u0000\u0000\u01c3\u01c4\u0005\u0002\u0000\u0000\u01c4\u01c5\u0003."+
		"\u0017\u0000\u01c5\u01c6\u0005\u0003\u0000\u0000\u01c6\u01e5\u0001\u0000"+
		"\u0000\u0000\u01c7\u01c8\u0003@ \u0000\u01c8\u01ca\u0005\u0002\u0000\u0000"+
		"\u01c9\u01cb\u0003B!\u0000\u01ca\u01c9\u0001\u0000\u0000\u0000\u01ca\u01cb"+
		"\u0001\u0000\u0000\u0000\u01cb\u01cc\u0001\u0000\u0000\u0000\u01cc\u01cd"+
		"\u0005\u0003\u0000\u0000\u01cd\u01e5\u0001\u0000\u0000\u0000\u01ce\u01cf"+
		"\u0003D\"\u0000\u01cf\u01d1\u0005\u0002\u0000\u0000\u01d0\u01d2\u0003"+
		"B!\u0000\u01d1\u01d0\u0001\u0000\u0000\u0000\u01d1\u01d2\u0001\u0000\u0000"+
		"\u0000\u01d2\u01d3\u0001\u0000\u0000\u0000\u01d3\u01d4\u0005\u0003\u0000"+
		"\u0000\u01d4\u01e5\u0001\u0000\u0000\u0000\u01d5\u01e5\u0003@ \u0000\u01d6"+
		"\u01d7\u0005\u0002\u0000\u0000\u01d7\u01d8\u0003.\u0017\u0000\u01d8\u01d9"+
		"\u0005\u0003\u0000\u0000\u01d9\u01e5\u0001\u0000\u0000\u0000\u01da\u01e1"+
		"\u0003@ \u0000\u01db\u01dc\u0005\u0005\u0000\u0000\u01dc\u01dd\u0003."+
		"\u0017\u0000\u01dd\u01de\u0005\u0006\u0000\u0000\u01de\u01e0\u0001\u0000"+
		"\u0000\u0000\u01df\u01db\u0001\u0000\u0000\u0000\u01e0\u01e3\u0001\u0000"+
		"\u0000\u0000\u01e1\u01df\u0001\u0000\u0000\u0000\u01e1\u01e2\u0001\u0000"+
		"\u0000\u0000\u01e2\u01e5\u0001\u0000\u0000\u0000\u01e3\u01e1\u0001\u0000"+
		"\u0000\u0000\u01e4\u01ba\u0001\u0000\u0000\u0000\u01e4\u01bc\u0001\u0000"+
		"\u0000\u0000\u01e4\u01bd\u0001\u0000\u0000\u0000\u01e4\u01be\u0001\u0000"+
		"\u0000\u0000\u01e4\u01bf\u0001\u0000\u0000\u0000\u01e4\u01c0\u0001\u0000"+
		"\u0000\u0000\u01e4\u01c1\u0001\u0000\u0000\u0000\u01e4\u01c2\u0001\u0000"+
		"\u0000\u0000\u01e4\u01c7\u0001\u0000\u0000\u0000\u01e4\u01ce\u0001\u0000"+
		"\u0000\u0000\u01e4\u01d5\u0001\u0000\u0000\u0000\u01e4\u01d6\u0001\u0000"+
		"\u0000\u0000\u01e4\u01da\u0001\u0000\u0000\u0000\u01e5\u01ec\u0001\u0000"+
		"\u0000\u0000\u01e6\u01e7\n\u0002\u0000\u0000\u01e7\u01eb\u00052\u0000"+
		"\u0000\u01e8\u01e9\n\u0001\u0000\u0000\u01e9\u01eb\u00053\u0000\u0000"+
		"\u01ea\u01e6\u0001\u0000\u0000\u0000\u01ea\u01e8\u0001\u0000\u0000\u0000"+
		"\u01eb\u01ee\u0001\u0000\u0000\u0000\u01ec\u01ea\u0001\u0000\u0000\u0000"+
		"\u01ec\u01ed\u0001\u0000\u0000\u0000\u01ed?\u0001\u0000\u0000\u0000\u01ee"+
		"\u01ec\u0001\u0000\u0000\u0000\u01ef\u01f4\u0005<\u0000\u0000\u01f0\u01f1"+
		"\u0005\u0018\u0000\u0000\u01f1\u01f3\u0005<\u0000\u0000\u01f2\u01f0\u0001"+
		"\u0000\u0000\u0000\u01f3\u01f6\u0001\u0000\u0000\u0000\u01f4\u01f2\u0001"+
		"\u0000\u0000\u0000\u01f4\u01f5\u0001\u0000\u0000\u0000\u01f5A\u0001\u0000"+
		"\u0000\u0000\u01f6\u01f4\u0001\u0000\u0000\u0000\u01f7\u01fc\u0003.\u0017"+
		"\u0000\u01f8\u01f9\u0005\u0004\u0000\u0000\u01f9\u01fb\u0003.\u0017\u0000"+
		"\u01fa\u01f8\u0001\u0000\u0000\u0000\u01fb\u01fe\u0001\u0000\u0000\u0000"+
		"\u01fc\u01fa\u0001\u0000\u0000\u0000\u01fc\u01fd\u0001\u0000\u0000\u0000"+
		"\u01fdC\u0001\u0000\u0000\u0000\u01fe\u01fc\u0001\u0000\u0000\u0000\u01ff"+
		"\u0207\u0005)\u0000\u0000\u0200\u0207\u0005*\u0000\u0000\u0201\u0207\u0005"+
		"+\u0000\u0000\u0202\u0207\u0005,\u0000\u0000\u0203\u0207\u0005-\u0000"+
		"\u0000\u0204\u0207\u0003F#\u0000\u0205\u0207\u0003\u000e\u0007\u0000\u0206"+
		"\u01ff\u0001\u0000\u0000\u0000\u0206\u0200\u0001\u0000\u0000\u0000\u0206"+
		"\u0201\u0001\u0000\u0000\u0000\u0206\u0202\u0001\u0000\u0000\u0000\u0206"+
		"\u0203\u0001\u0000\u0000\u0000\u0206\u0204\u0001\u0000\u0000\u0000\u0206"+
		"\u0205\u0001\u0000\u0000\u0000\u0207E\u0001\u0000\u0000\u0000\u0208\u0209"+
		"\u0005\t\u0000\u0000\u0209\u020a\u0003D\"\u0000\u020aG\u0001\u0000\u0000"+
		"\u0000=KSXaelu{\u0082\u008e\u0098\u009b\u00a2\u00a8\u00aa\u00b6\u00b9"+
		"\u00c1\u00c5\u00cf\u00d3\u00d8\u00de\u00f0\u00f7\u0100\u0107\u0110\u011b"+
		"\u0126\u0130\u0132\u0136\u013f\u0143\u014b\u014e\u0152\u0158\u0161\u0163"+
		"\u0165\u016f\u0177\u0179\u0186\u018e\u0196\u019e\u01a6\u01ae\u01b8\u01ca"+
		"\u01d1\u01e1\u01e4\u01ea\u01ec\u01f4\u01fc\u0206";
	public static final ATN _ATN =
		new ATNDeserializer().deserialize(_serializedATN.toCharArray());
	static {
		_decisionToDFA = new DFA[_ATN.getNumberOfDecisions()];
		for (int i = 0; i < _ATN.getNumberOfDecisions(); i++) {
			_decisionToDFA[i] = new DFA(_ATN.getDecisionState(i), i);
		}
	}
}