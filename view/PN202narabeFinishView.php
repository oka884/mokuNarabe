<?php

/**
 * PN202narabeFinishView.php
 * n目ならべゲームの画面
 */
// var_dump($narabePlay->getBoardInspection()->getVerticalLines()[4][2]);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../view/narabeCss/reset.css" type="text/css">
	<link rel="stylesheet" href="../view/narabeCss/common.css" type="text/css">
	<link rel="stylesheet" href="../view/narabeCss/narabe.css" type="text/css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&family=M+PLUS+Rounded+1c&family=Ranchers&display=swap" rel="stylesheet">
	<style type="text/css">
		<?php require_once(dirname(__FILE__) . "/../view/narabeCss/narabeCss.php"); ?>
	</style>
</head>

<body>
	<div class="wrap">
		<h1 class="title"><?= $gameSetting->getVictoryConditions() ?>目並べ</h1>
		<div class="playerDisplay">
			<div class="playerDisplayBox">
				<p class="turn">Turn</p>
				<p class="playerName"><?= $playerName ?></p>
			</div>
		</div>
		<!-- ここから盤面 -->
		<div class="boardWrap">
			<div class="board">
				<?php
				foreach ($board->getBoard() as $lineKey => $line) {
				?>
					<div class="line">
						<?php
						foreach ($line->getLine() as $columnKey => $box) {
						?>
							<div class="box" style="background-color:<?= $box->getColor($gameSetting); ?> ;">
								<p>　</p>
							</div>
						<?php
						}
						?>
					</div>
				<?php
				}
				?>
			</div>
			<div class="winDisplay">
				<p class="winPlayerName"><?= $playerName ?></p>
				<p class="win">WIN</p>
			</div>
		</div>
		<div class="buttoSection">
			<form action="narabe.php" method="get">
				<input type="hidden" name="request" value="PN201BoardReset">
				<p class="submitBotton"><input class="submitBotton" type="submit" value="ゲームをやめる"></p>
			</form>
		</div>

	</div>
</body>

</html>