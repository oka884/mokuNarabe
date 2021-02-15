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

$narabePlay = new NarabePlay( $narabeGame );

// 入力が正しかった時の処理
while ( $coordinate ){
    $record->addRecord( $coordinate );

    $is_win = false;
    $is_end = false;
    
    // マスの所有処理
    $narabePlay->ownSquare( $coordinate );

    // 勝利判定
    $is_win = $narabePlay->checkIsVictory( $coordinate );

    // 勝利判定が終わったからターン加算処理
    $turn->turnChanges();

    if( $is_win ){
        $nexView = "";
        break;
    }

    // 引き分けでの終了判定
    $is_end = $narabePlay->checkIsEnd();

    if( $is_end ){
        $nexView = "";
        break;
    }

    // プレイの継続
    $nexView = "PN201narabeView";
    break;
}

// 入力が不正だった時の処理
if ( ! $coordinate ){
    $nexView = "PN201narabeView";
}


$_SESSION["narabeGame"] = serialize($narabeGame);

