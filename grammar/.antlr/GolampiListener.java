// Generated from /home/lilimon/Documentos/Compiladores 2/proyectoC2/P1Compi2202110378/grammar/Golampi.g4 by ANTLR 4.13.1
import org.antlr.v4.runtime.tree.ParseTreeListener;

/**
 * This interface defines a complete listener for a parse tree produced by
 * {@link GolampiParser}.
 */
public interface GolampiListener extends ParseTreeListener {
	/**
	 * Enter a parse tree produced by {@link GolampiParser#program}.
	 * @param ctx the parse tree
	 */
	void enterProgram(GolampiParser.ProgramContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#program}.
	 * @param ctx the parse tree
	 */
	void exitProgram(GolampiParser.ProgramContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#declaration}.
	 * @param ctx the parse tree
	 */
	void enterDeclaration(GolampiParser.DeclarationContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#declaration}.
	 * @param ctx the parse tree
	 */
	void exitDeclaration(GolampiParser.DeclarationContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#constDecl}.
	 * @param ctx the parse tree
	 */
	void enterConstDecl(GolampiParser.ConstDeclContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#constDecl}.
	 * @param ctx the parse tree
	 */
	void exitConstDecl(GolampiParser.ConstDeclContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#functionDecl}.
	 * @param ctx the parse tree
	 */
	void enterFunctionDecl(GolampiParser.FunctionDeclContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#functionDecl}.
	 * @param ctx the parse tree
	 */
	void exitFunctionDecl(GolampiParser.FunctionDeclContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#parameterList}.
	 * @param ctx the parse tree
	 */
	void enterParameterList(GolampiParser.ParameterListContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#parameterList}.
	 * @param ctx the parse tree
	 */
	void exitParameterList(GolampiParser.ParameterListContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#parameter}.
	 * @param ctx the parse tree
	 */
	void enterParameter(GolampiParser.ParameterContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#parameter}.
	 * @param ctx the parse tree
	 */
	void exitParameter(GolampiParser.ParameterContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#varDecl}.
	 * @param ctx the parse tree
	 */
	void enterVarDecl(GolampiParser.VarDeclContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#varDecl}.
	 * @param ctx the parse tree
	 */
	void exitVarDecl(GolampiParser.VarDeclContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#arrayType}.
	 * @param ctx the parse tree
	 */
	void enterArrayType(GolampiParser.ArrayTypeContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#arrayType}.
	 * @param ctx the parse tree
	 */
	void exitArrayType(GolampiParser.ArrayTypeContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#arrayLiteral}.
	 * @param ctx the parse tree
	 */
	void enterArrayLiteral(GolampiParser.ArrayLiteralContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#arrayLiteral}.
	 * @param ctx the parse tree
	 */
	void exitArrayLiteral(GolampiParser.ArrayLiteralContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#arrayElement}.
	 * @param ctx the parse tree
	 */
	void enterArrayElement(GolampiParser.ArrayElementContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#arrayElement}.
	 * @param ctx the parse tree
	 */
	void exitArrayElement(GolampiParser.ArrayElementContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#block}.
	 * @param ctx the parse tree
	 */
	void enterBlock(GolampiParser.BlockContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#block}.
	 * @param ctx the parse tree
	 */
	void exitBlock(GolampiParser.BlockContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#statement}.
	 * @param ctx the parse tree
	 */
	void enterStatement(GolampiParser.StatementContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#statement}.
	 * @param ctx the parse tree
	 */
	void exitStatement(GolampiParser.StatementContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#shortVarDecl}.
	 * @param ctx the parse tree
	 */
	void enterShortVarDecl(GolampiParser.ShortVarDeclContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#shortVarDecl}.
	 * @param ctx the parse tree
	 */
	void exitShortVarDecl(GolampiParser.ShortVarDeclContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#assignment}.
	 * @param ctx the parse tree
	 */
	void enterAssignment(GolampiParser.AssignmentContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#assignment}.
	 * @param ctx the parse tree
	 */
	void exitAssignment(GolampiParser.AssignmentContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#expresionStmt}.
	 * @param ctx the parse tree
	 */
	void enterExpresionStmt(GolampiParser.ExpresionStmtContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#expresionStmt}.
	 * @param ctx the parse tree
	 */
	void exitExpresionStmt(GolampiParser.ExpresionStmtContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#ifStmt}.
	 * @param ctx the parse tree
	 */
	void enterIfStmt(GolampiParser.IfStmtContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#ifStmt}.
	 * @param ctx the parse tree
	 */
	void exitIfStmt(GolampiParser.IfStmtContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#forStmt}.
	 * @param ctx the parse tree
	 */
	void enterForStmt(GolampiParser.ForStmtContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#forStmt}.
	 * @param ctx the parse tree
	 */
	void exitForStmt(GolampiParser.ForStmtContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#returnStmt}.
	 * @param ctx the parse tree
	 */
	void enterReturnStmt(GolampiParser.ReturnStmtContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#returnStmt}.
	 * @param ctx the parse tree
	 */
	void exitReturnStmt(GolampiParser.ReturnStmtContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#switchStmt}.
	 * @param ctx the parse tree
	 */
	void enterSwitchStmt(GolampiParser.SwitchStmtContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#switchStmt}.
	 * @param ctx the parse tree
	 */
	void exitSwitchStmt(GolampiParser.SwitchStmtContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#switchCase}.
	 * @param ctx the parse tree
	 */
	void enterSwitchCase(GolampiParser.SwitchCaseContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#switchCase}.
	 * @param ctx the parse tree
	 */
	void exitSwitchCase(GolampiParser.SwitchCaseContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#breakStmt}.
	 * @param ctx the parse tree
	 */
	void enterBreakStmt(GolampiParser.BreakStmtContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#breakStmt}.
	 * @param ctx the parse tree
	 */
	void exitBreakStmt(GolampiParser.BreakStmtContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#continueStmt}.
	 * @param ctx the parse tree
	 */
	void enterContinueStmt(GolampiParser.ContinueStmtContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#continueStmt}.
	 * @param ctx the parse tree
	 */
	void exitContinueStmt(GolampiParser.ContinueStmtContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#expression}.
	 * @param ctx the parse tree
	 */
	void enterExpression(GolampiParser.ExpressionContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#expression}.
	 * @param ctx the parse tree
	 */
	void exitExpression(GolampiParser.ExpressionContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#logicalOr}.
	 * @param ctx the parse tree
	 */
	void enterLogicalOr(GolampiParser.LogicalOrContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#logicalOr}.
	 * @param ctx the parse tree
	 */
	void exitLogicalOr(GolampiParser.LogicalOrContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#logicalAnd}.
	 * @param ctx the parse tree
	 */
	void enterLogicalAnd(GolampiParser.LogicalAndContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#logicalAnd}.
	 * @param ctx the parse tree
	 */
	void exitLogicalAnd(GolampiParser.LogicalAndContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#equality}.
	 * @param ctx the parse tree
	 */
	void enterEquality(GolampiParser.EqualityContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#equality}.
	 * @param ctx the parse tree
	 */
	void exitEquality(GolampiParser.EqualityContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#comparison}.
	 * @param ctx the parse tree
	 */
	void enterComparison(GolampiParser.ComparisonContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#comparison}.
	 * @param ctx the parse tree
	 */
	void exitComparison(GolampiParser.ComparisonContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#addition}.
	 * @param ctx the parse tree
	 */
	void enterAddition(GolampiParser.AdditionContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#addition}.
	 * @param ctx the parse tree
	 */
	void exitAddition(GolampiParser.AdditionContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#multiplication}.
	 * @param ctx the parse tree
	 */
	void enterMultiplication(GolampiParser.MultiplicationContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#multiplication}.
	 * @param ctx the parse tree
	 */
	void exitMultiplication(GolampiParser.MultiplicationContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#unary}.
	 * @param ctx the parse tree
	 */
	void enterUnary(GolampiParser.UnaryContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#unary}.
	 * @param ctx the parse tree
	 */
	void exitUnary(GolampiParser.UnaryContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#primary}.
	 * @param ctx the parse tree
	 */
	void enterPrimary(GolampiParser.PrimaryContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#primary}.
	 * @param ctx the parse tree
	 */
	void exitPrimary(GolampiParser.PrimaryContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#qualified}.
	 * @param ctx the parse tree
	 */
	void enterQualified(GolampiParser.QualifiedContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#qualified}.
	 * @param ctx the parse tree
	 */
	void exitQualified(GolampiParser.QualifiedContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#argumentList}.
	 * @param ctx the parse tree
	 */
	void enterArgumentList(GolampiParser.ArgumentListContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#argumentList}.
	 * @param ctx the parse tree
	 */
	void exitArgumentList(GolampiParser.ArgumentListContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#type}.
	 * @param ctx the parse tree
	 */
	void enterType(GolampiParser.TypeContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#type}.
	 * @param ctx the parse tree
	 */
	void exitType(GolampiParser.TypeContext ctx);
	/**
	 * Enter a parse tree produced by {@link GolampiParser#pointerType}.
	 * @param ctx the parse tree
	 */
	void enterPointerType(GolampiParser.PointerTypeContext ctx);
	/**
	 * Exit a parse tree produced by {@link GolampiParser#pointerType}.
	 * @param ctx the parse tree
	 */
	void exitPointerType(GolampiParser.PointerTypeContext ctx);
}