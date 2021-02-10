<?php
@session_start();

if( isset($_REQUEST["line"]) && isset($_REQUEST["column"]) ){
    $lineKey = $_REQUEST["line"];
    $columnKey = $_REQUEST["column"];
}


if( isset( $_SESSION["turn"] ) && isset( $_SESSION["board"] ) ){
    $turn = unserialize($_SESSION["turn"]);
    $board = unserialize($_SESSION["board"]);
}


$box = $board->getBoxFromBord($lineKey, $columnKey);

$box->play($turn);






$_SESSION["turn"] = serialize($turn);
$_SESSION["board"] = serialize($board);

?>