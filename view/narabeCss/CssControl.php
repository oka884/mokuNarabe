<?php
/**
 * CssControl.php
 * 
 * cssを変数でコントロールするための変数定義ファイル
 *
 */


$boxSize = 100 / $gameSetting->getSquareNumber(); // %を求める
$playerName = "";
$flexDirection = "";
$textAlign = "";
$playerDisplayBoxColor = "";
$clipPath = "";
$boxBorder = "";
$positionAbsolute = "";
$transformRotate = "";

switch ( $turn->whichTurn() ){
	case 1:
		$playerName = "Player1";
		$flexDirection = "row";
		$textAlign = "start";
		$playerDisplayBoxColor = $gameSetting->getP1Color();
		$clipPath = "0 0, 100% 0, 80% 100%, 0 100%";
		$boxBorder = "border-left: solid 0.6rem " . $gameSetting->getP1AccentColor();
		$positionAbsolute = "left";
		$transformRotate = "-10deg";
		break;
	case 2:
		$playerName = "Player2";
		$flexDirection = "row-reverse";
		$textAlign = "end";
		$playerDisplayBoxColor = $gameSetting->getP2Color();
		$clipPath = "0 0, 100% 0, 100% 100%, 20% 100%";
		$boxBorder = "border-right: solid 0.6rem " . $gameSetting->getP2AccentColor();
		$positionAbsolute = "right";
		$transformRotate = "10deg";
		break;
	default:
		break;
}
?>