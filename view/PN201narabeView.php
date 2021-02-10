<?php
/**
 * View.php
 * コメント
 */
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="narabeCss/reset.css" type="text/css">
    <link rel="stylesheet" href="narabeCss/narabe.css" type="text/css">
  </head>
  <body>
    <h1 class="title">三目並べ</h1>

	<div class="board">
		<?php
		foreach( $board->getBord() as $lineKey => $line){
		?>
		<div class="line">
			<?php
			foreach( $line->getLine() as $columnKey => $box){
			?>
    		<div class="box" style="background-color:<?=$box->getColor();?> ;">
    			<a href="narabe.php?line=<?=$lineKey;?>&column=<?=$columnKey;?>" <?=$box->getNoneCSS();?> >　</a>
    		</div>
    		<?php
		    }
		    ?>
		</div>
        <?php
		}
        ?>
	</div>


  </body>
</html>