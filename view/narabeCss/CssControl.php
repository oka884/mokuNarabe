<?php
/**
 * CssControl.php
 * 
 * cssを変数でコントロールするための変数定義ファイル
 *
 */


$boxSize = 100 / $gameSetting->getSquareNumber(); // %を求める
$flexDirection = "";
$textAlign = "";
$playerName = "";
$playerDisplayBoxColor = "";

switch ( $turn->whichTurn() ){
	case 1:
		$flexDirection = "row";
		$textAlign = "start";
		$playerDisplayBoxColor = $gameSetting->getP1Color();
		$playerName = "プレイヤー1";
		break;
	case 2:
		$flexDirection = "row-reverse";
		$textAlign = "end";
		$playerDisplayBoxColor = $gameSetting->getP2Color();
		$playerName = "プレイヤー2";
		break;
	default:
		break;
}
?>