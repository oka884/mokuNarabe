<?php
/**
 * PN101narabeStartView.php
 *
 * 『n目ならべ』の開始画面
 */
//  var_dump($_REQUEST);
//  echo $requestID;
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../view/narabeCss/reset.css" type="text/css">
    <link rel="stylesheet" href="../view/narabeCss/common.css" type="text/css">
    <link rel="stylesheet" href="../view/narabeCss/narabeStart.css" type="text/css">
  </head>
  <body>
    <div class="wrap">
   		<div class="cover">
    		<h1 class="title">n目ならべ</h1>
    	</div>
    	<div>
        	<form action="narabe.php" method="get">
	        	<input type="hidden" name="request" value="PN101GameStart">
            	<div>
            		<p>なん目ならべ？</p>
            		<select name="moku">
                        <option value="2">2</option>
                        <option value="3" selected>3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
<!--                     目数は5~11を選択できるようにする -->
                    <p>なんマス？</p>
                    <select name="masu">
                    	<?php
                    	for( $i = 0; $i < 7; $i++ ){
                    	    $num = $i + 5;
                    	    ?>
                            <option value="<?=$num;?>"><?=$num;?>マス</option>
                            <?php
                    	}
                    	?>
                    </select>
                </div>
<!--                 色を選択できる機能。不完全 -->
                <div>
                	<p>1Pカラー</p>
                	<select name="p1Color">
                        <option value="c01" selected>青</option>
                        <option value="c02">赤</option>
                        <option value="c03">緑</option>
                        <option value="c04">黄</option>
                    </select>
                    <p>2Pカラー</p>
                	<select name="p2Color">
                        <option value="c01">青</option>
                        <option value="c02" selected>赤</option>
                        <option value="c03">緑</option>
                        <option value="c04">黃</option>
                    </select>
                </div>
                <p><input type="submit" value="スタート"></p>
        	</form>
        </div>
    </div>

  </body>
</html>
