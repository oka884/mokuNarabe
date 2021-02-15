<?php
/**
 * PN002ComeBackGameLogic.php.php
 *
 * サイトを離れた人がセッションがまだある状態で戻ってきた時のロジック
 */


$narabeGame = unserialize($_SESSION["narabeGame"]);

// narabeGameから中のものを取り出している（省略可能そうな記述）
$board = $narabeGame->getBoard();
$turn = $narabeGame->getTurn();
$gameSetting = $narabeGame->getGameSetting();
$record = $narabeGame->getRecord();


$nexView = "PN201narabeView";



$_SESSION["narabeGame"] = serialize($narabeGame);


?>