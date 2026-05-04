<?php

/*
 * Generated from Golampi.g4 by ANTLR 4.13.1
 */

use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;

/**
 * This interface defines a complete listener for a parse tree produced by
 * {@see GolampiParser}.
 */
interface GolampiListener extends ParseTreeListener {
	/**
	 * Enter a parse tree produced by {@see GolampiParser::program()}.
	 * @param $context The parse tree.
	 */
	public function enterProgram(Context\ProgramContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::program()}.
	 * @param $context The parse tree.
	 */
	public function exitProgram(Context\ProgramContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::declaration()}.
	 * @param $context The parse tree.
	 */
	public function enterDeclaration(Context\DeclarationContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::declaration()}.
	 * @param $context The parse tree.
	 */
	public function exitDeclaration(Context\DeclarationContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::constDecl()}.
	 * @param $context The parse tree.
	 */
	public function enterConstDecl(Context\ConstDeclContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::constDecl()}.
	 * @param $context The parse tree.
	 */
	public function exitConstDecl(Context\ConstDeclContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::functionDecl()}.
	 * @param $context The parse tree.
	 */
	public function enterFunctionDecl(Context\FunctionDeclContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::functionDecl()}.
	 * @param $context The parse tree.
	 */
	public function exitFunctionDecl(Context\FunctionDeclContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::parameterList()}.
	 * @param $context The parse tree.
	 */
	public function enterParameterList(Context\ParameterListContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::parameterList()}.
	 * @param $context The parse tree.
	 */
	public function exitParameterList(Context\ParameterListContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::parameter()}.
	 * @param $context The parse tree.
	 */
	public function enterParameter(Context\ParameterContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::parameter()}.
	 * @param $context The parse tree.
	 */
	public function exitParameter(Context\ParameterContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::varDecl()}.
	 * @param $context The parse tree.
	 */
	public function enterVarDecl(Context\VarDeclContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::varDecl()}.
	 * @param $context The parse tree.
	 */
	public function exitVarDecl(Context\VarDeclContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::arrayType()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayType(Context\ArrayTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::arrayType()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayType(Context\ArrayTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::arrayLiteral()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayLiteral(Context\ArrayLiteralContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::arrayLiteral()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayLiteral(Context\ArrayLiteralContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::arrayElement()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayElement(Context\ArrayElementContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::arrayElement()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayElement(Context\ArrayElementContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::block()}.
	 * @param $context The parse tree.
	 */
	public function enterBlock(Context\BlockContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::block()}.
	 * @param $context The parse tree.
	 */
	public function exitBlock(Context\BlockContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function enterStatement(Context\StatementContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function exitStatement(Context\StatementContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::shortVarDecl()}.
	 * @param $context The parse tree.
	 */
	public function enterShortVarDecl(Context\ShortVarDeclContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::shortVarDecl()}.
	 * @param $context The parse tree.
	 */
	public function exitShortVarDecl(Context\ShortVarDeclContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::shortValue()}.
	 * @param $context The parse tree.
	 */
	public function enterShortValue(Context\ShortValueContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::shortValue()}.
	 * @param $context The parse tree.
	 */
	public function exitShortValue(Context\ShortValueContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::assignment()}.
	 * @param $context The parse tree.
	 */
	public function enterAssignment(Context\AssignmentContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::assignment()}.
	 * @param $context The parse tree.
	 */
	public function exitAssignment(Context\AssignmentContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::expresionStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterExpresionStmt(Context\ExpresionStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::expresionStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitExpresionStmt(Context\ExpresionStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::ifStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterIfStmt(Context\IfStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::ifStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitIfStmt(Context\IfStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::forStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterForStmt(Context\ForStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::forStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitForStmt(Context\ForStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::returnStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterReturnStmt(Context\ReturnStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::returnStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitReturnStmt(Context\ReturnStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::switchStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterSwitchStmt(Context\SwitchStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::switchStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitSwitchStmt(Context\SwitchStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::switchCase()}.
	 * @param $context The parse tree.
	 */
	public function enterSwitchCase(Context\SwitchCaseContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::switchCase()}.
	 * @param $context The parse tree.
	 */
	public function exitSwitchCase(Context\SwitchCaseContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::breakStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterBreakStmt(Context\BreakStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::breakStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitBreakStmt(Context\BreakStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::continueStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterContinueStmt(Context\ContinueStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::continueStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitContinueStmt(Context\ContinueStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function enterExpression(Context\ExpressionContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function exitExpression(Context\ExpressionContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::logicalOr()}.
	 * @param $context The parse tree.
	 */
	public function enterLogicalOr(Context\LogicalOrContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::logicalOr()}.
	 * @param $context The parse tree.
	 */
	public function exitLogicalOr(Context\LogicalOrContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::logicalAnd()}.
	 * @param $context The parse tree.
	 */
	public function enterLogicalAnd(Context\LogicalAndContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::logicalAnd()}.
	 * @param $context The parse tree.
	 */
	public function exitLogicalAnd(Context\LogicalAndContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::equality()}.
	 * @param $context The parse tree.
	 */
	public function enterEquality(Context\EqualityContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::equality()}.
	 * @param $context The parse tree.
	 */
	public function exitEquality(Context\EqualityContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::comparison()}.
	 * @param $context The parse tree.
	 */
	public function enterComparison(Context\ComparisonContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::comparison()}.
	 * @param $context The parse tree.
	 */
	public function exitComparison(Context\ComparisonContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::addition()}.
	 * @param $context The parse tree.
	 */
	public function enterAddition(Context\AdditionContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::addition()}.
	 * @param $context The parse tree.
	 */
	public function exitAddition(Context\AdditionContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::multiplication()}.
	 * @param $context The parse tree.
	 */
	public function enterMultiplication(Context\MultiplicationContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::multiplication()}.
	 * @param $context The parse tree.
	 */
	public function exitMultiplication(Context\MultiplicationContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::unary()}.
	 * @param $context The parse tree.
	 */
	public function enterUnary(Context\UnaryContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::unary()}.
	 * @param $context The parse tree.
	 */
	public function exitUnary(Context\UnaryContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::primary()}.
	 * @param $context The parse tree.
	 */
	public function enterPrimary(Context\PrimaryContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::primary()}.
	 * @param $context The parse tree.
	 */
	public function exitPrimary(Context\PrimaryContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::qualified()}.
	 * @param $context The parse tree.
	 */
	public function enterQualified(Context\QualifiedContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::qualified()}.
	 * @param $context The parse tree.
	 */
	public function exitQualified(Context\QualifiedContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::argumentList()}.
	 * @param $context The parse tree.
	 */
	public function enterArgumentList(Context\ArgumentListContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::argumentList()}.
	 * @param $context The parse tree.
	 */
	public function exitArgumentList(Context\ArgumentListContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::type()}.
	 * @param $context The parse tree.
	 */
	public function enterType(Context\TypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::type()}.
	 * @param $context The parse tree.
	 */
	public function exitType(Context\TypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::pointerType()}.
	 * @param $context The parse tree.
	 */
	public function enterPointerType(Context\PointerTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::pointerType()}.
	 * @param $context The parse tree.
	 */
	public function exitPointerType(Context\PointerTypeContext $context): void;
}