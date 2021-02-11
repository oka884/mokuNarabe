<?php
/**
 * PN201BoardResetLogic.php.php
 *
 * ゲームをやめるボタンが押された際のロジック
 */

$_SESSION = [];
session_destroy();

$nexView = "PN101narabeStartView";

?>