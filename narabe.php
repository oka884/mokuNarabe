<?php
@session_start();
/**
 * narabe.php
 * クライアントからのリクエストにより処理を振り分ける
 */

require_once("propertyDefine.php");

//セッション切れの処理の予定地
// if( !isset( $_SESSION["turn"] ) || !isset( $_SESSION["board"] ) ){
//     $buttonID =
// }


if( isset($_REQUEST["board"]) ){
    $board = $_REQUEST["board"];
    $turn = $_REQUEST["turn"];
}else {
    $board = new Board();
    $turn = new Turn();
}



require_once("logic/PN201BoardClickLogic.php");



require_once("view/PN201narabeView.php");

?>