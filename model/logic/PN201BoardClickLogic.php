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

// narabeGameから中のものを取り出しているが本来これはいらない
$board = $narabeGame->getBoard();
$turn = $narabeGame->getTurn();
$gameSetting = $narabeGame->getGameSetting();
$record = $narabeGame->getRecord();

// プレイヤーの入力を検査し、正しければボックスが持つ座標オブジェクトを返させている
$coordinate = $narabeGame->checkAndGetCoodinate( $columnKey, $lineKey );

if ( $coordinate ){
    $record->addRecord( $coordinate );

    $box = $board->getBox( $coordinate );

    $box->play($turn);
}



$_SESSION["narabeGame"] = serialize($narabeGame);

$nexView = "PN201narabeView";
