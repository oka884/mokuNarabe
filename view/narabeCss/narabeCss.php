<?php
/**
 * narabeCss.php
 * 
 * headのstyleタグに記述するCSSのファイル
 *
 */
?>
.playerDisplay{
	flex-direction: <?=$flexDirection?>;
}
.playerDisplayBox{
	clip-path: polygon(<?=$clipPath?>);
	<?=$boxBorder?>;
	background-color: <?=$playerDisplayBoxColor?>; 
}
.turn{
	<?=$positionAbsolute?>: -5%;
	transform: rotate( <?=$transformRotate?> );
}
.playerName{
	<?=$positionAbsolute?>: 4%;
}
.box {
	width: calc( <?=$boxSize?>% - 0.4rem );
	height: calc( ( 70vw / <?=$gameSetting->getSquareNumber()?> ) - 0.4rem );
}