<?php
/**
 * PN201narabeView.php
 * コメント
 */
var_dump($_REQUEST);
echo $requestID;
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../view/narabeCss/reset.css" type="text/css">
        <link rel="stylesheet" href="../view/narabeCss/common.css" type="text/css">
        <link rel="stylesheet" href="../view/narabeCss/narabe.css" type="text/css">
        <script type="text/javascript">
            function pushResetButton(){
                let result = confirm("ゲームを終了します");
                return result;
        	}
    	</script>
	</head>
 	<body>
    <div class="wrap">
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
        			<a href="narabe.php?line=<?=$lineKey;?>&column=<?=$columnKey;?>&request=PN201BoardClick" <?=$box->getNoneCSS();?> >　</a>
        		</div>
        		<?php
    		    }
    		    ?>
    		</div>
            <?php
    		}
            ?>
    	</div>
    	<div>
    		<form action="narabe.php" method="get">
    			<input type="hidden" name="request" value="PN201BoardReset"
    			onClick="pushResetButton();">
    			<p><input type="submit" value="ゲームをやめる"></p>
    		</form>
    	</div>

	</div>
	</body>
</html>
