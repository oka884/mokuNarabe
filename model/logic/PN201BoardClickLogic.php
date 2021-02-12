<?php
@session_start();
/**
 * PN201BoardClickLogic.php.php
 *
 * 盤面をクリックしゲームを進める際のロジック
 */

// $noError = true;

if (isset($_REQUEST["line"]) && isset($_REQUEST["column"])) {
    $lineKey = $_REQUEST["line"];
    $columnKey = $_REQUEST["column"];
}

$narabeGame = unserialize($_SESSION["narabeGame"]);
$board = $narabeGame->getBoard();
$turn = $narabeGame->getTurn();
$gameSetting = $narabeGame->getGameSetting();
$record = $narabeGame->getRecord();

$record->addRecord( $columnKey, $lineKey);

$box = $board->getBoxFromBord( $record );

$box->play($turn);

$_SESSION["narabeGame"] = serialize($narabeGame);

$nexView = "PN201narabeView";

?>
