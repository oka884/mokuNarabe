<?php
@session_start();
/**
 * PN101GameStartLogic.php
 *
 * ゲーム開始時のロジック
 */

if( isset( $_REQUEST["p1Color"] )){
    $p1Color = $_REQUEST["p1Color"];
}
if( isset( $_REQUEST["p2Color"] )){
    $p2Color = $_REQUEST["p2Color"];
}
if( isset( $_REQUEST["masu"] )){
    $squareNumber = $_REQUEST["masu"];
}
if( isset( $_REQUEST["moku"] )){
    $victoryConditions = $_REQUEST["moku"];
}

// デフォルト値でgameSettingを作り、クライアントからのリクエストはセッターで入力する
// これでクライアントから送られた値がおかしくてもデフォルト値でゲームが始まる
$gameSetting = new GameSetting();

$gameSetting->setP1Color( $p1Color );
$gameSetting->setP2Color( $p2Color );
$gameSetting->setSquareNumber( $squareNumber );
$gameSetting->setVictoryConditions( $victoryConditions );

$board = new Board( $gameSetting );
$turn = new Turn();
$record = new Record();

$narabeGame = new NarabeGame();
$narabeGame->setAll( $gameSetting, $board, $turn, $record);

// CSSのコントロール用
require_once ( dirname(__FILE__). "/../../view/narabeCss/CssControl.php");

$_SESSION["narabeGame"] = serialize($narabeGame);

$nexView = "PN201narabeView";
?>