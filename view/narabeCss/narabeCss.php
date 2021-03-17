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

.boardWrap{
	max-width: calc( <?=$gameSetting->getSquareNumber()?> * 5.1rem + 2rem );
	max-height: calc( <?=$gameSetting->getSquareNumber()?> * 5.1rem + 2rem );
}


.box {
	width: calc( <?=$boxSize?>% - 0.4rem );
	padding-top: calc( <?=$boxSize?>% - 0.4rem );
}

.winPlayerName{
  color: <?=$playerDisplayBoxColor?>;
}