<?php

/**
 * PN201narabeView.php
 * n目ならべゲームの画面
 */
// var_dump($narabePlay->getBoardInspection()->getVerticalLines()[4][2]);
// echo $requestID;
?>
<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../view/narabeCss/reset.css" type="text/css">
	<link rel="stylesheet" href="../view/narabeCss/common.css" type="text/css">
	<link rel="stylesheet" href="../view/narabeCss/narabe.css" type="text/css">
	<style type="text/css">
		<?php require_once(dirname(__FILE__) . "/../view/narabeCss/narabeCss.php"); ?>
	</style>
	<script type="text/javascript">
		let pushResetButton = function() {
			confirm("ゲームを終了します");
		}
	</script>
</head>

<body>
	<div class="wrap">
		<h1 class="title">n目並べ</h1>
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
								<a href="narabe.php?line=<?= $lineKey; ?>&column=<?= $columnKey; ?>&request=PN201BoardClick" <?= $box->getNoneCSS(); ?>>　</a>
							</div>
						<?php
						}
						?>
					</div>
				<?php
				}
				?>
			</div>
		</div>
		<div class="buttoSection">
			<form action="narabe.php" method="get">
				<input type="hidden" name="request" value="PN201BoardReset" onClick="pushResetButton();">
				<p class="submitBotton"><input class="submitBotton" type="submit" value="ゲームをやめる"></p>
			</form>
		</div>

	</div>
</body>

</html>