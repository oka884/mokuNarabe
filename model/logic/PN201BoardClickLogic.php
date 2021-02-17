<?php
@session_start();
/**
 * PN201BoardClickLogic.php.php
 *
 * 盤面をクリックしゲームを進める際のロジック
 */


if (isset($_REQUEST["line"]) && isset($_REQUEST["column"])) {
    $lineKey = $_REQUEST["line"];
    $columnKey = $_REQUEST["column"];
}

$narabeGame = unserialize($_SESSION["narabeGame"]);

// narabeGameから中のものを取り出している（省略可能そうな記述）
$board = $narabeGame->getBoard();
$turn = $narabeGame->getTurn();
$gameSetting = $narabeGame->getGameSetting();
$record = $narabeGame->getRecord();

// プレイヤーの入力を検査し、正しければボックスが持つ座標オブジェクトを返させている
$coordinate = $narabeGame->checkAndGetCoodinate( $columnKey, $lineKey );

// 入力が正しかった時の処理
while ( $coordinate ){
    $record->addRecord( $coordinate );

    $is_win = false;
    $is_end = false;
    $narabePlay = new NarabePlay( $narabeGame );
    
    // マスの所有処理
    $narabePlay->ownSquare( $coordinate );

    // 勝利判定
    $is_win = $narabePlay->checkIsVictory( $coordinate );
    if( $is_win ){
        $nexView = "PN202narabeFinishView";
        break;
    }
    
    // 引き分けでの終了判定
    $is_end = $narabePlay->checkIsEnd();
    if( $is_end ){
        $nexView = "PN202narabeFinishView";
        break;
    }

    // プレイの継続
    $nexView = "PN201narabeView";
    
    // ターン加算処理
    $turn->turnChanges();

    break;
}

// 入力が不正だった時の処理
if ( ! $coordinate ){
    $nexView = "PN201narabeView";
}

// CSSのコントロール用
require_once ( dirname(__FILE__). "/../../view/narabeCss/CssControl.php");


$_SESSION["narabeGame"] = serialize($narabeGame);

