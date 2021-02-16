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
	background-color: <?=$playerDisplayBoxColor?>; 
}

.playerDisplayBox p{
	text-align: <?=$textAlign?>;
}

.box {
	width: calc( <?=$boxSize?>% - 0.4rem );
	height: calc( ( 70vw / <?=$gameSetting->getSquareNumber()?> ) - 0.4rem );
}


