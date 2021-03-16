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
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
</head>

<body>
  <div class="wrap">
    <div class="cover">
      <h1 class="title">n目ならべ</h1>
    </div>
    <div class="narabeForm">
      <form class="narabeForm" action="narabe.php" method="get">
        <div class="narabeSelect">
          <input type="hidden" name="request" value="PN101GameStart">
          <div class="selectSection">
            <div class="numberSelectSection">
              <p>なん目ならべ？</p>
              <select name="moku">
                <option value="2">2</option>
                <option value="3" selected>3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              <!-- 目数は5~11を選択できるようにする -->
            </div>
            <div class="numberSelectSection">
              <p>なんマス？</p>
              <select name="masu">
                <?php
                for ($i = 0; $i < 7; $i++) {
                  $num = $i + 5;
                ?>
                  <option value="<?= $num; ?>"><?= $num; ?>マス</option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          <!-- 色を選択できる機能。カラー被りが起こる点が不完全 -->
          <div class="selectSection">
            <div class="colorSelectSection">
              <p>1Pカラー</p>
              <select name="p1Color">
                <option value="c01" selected> 青</option>
                <option value="c02"> 赤</option>
                <option value="c03"> 緑</option>
                <option value="c04"> 黄</option>
              </select>
            </div>
            <div class="colorSelectSection">
              <p>2Pカラー</p>
              <select name="p2Color">
                <option value="c01"> 青</option>
                <option value="c02" selected> 赤</option>
                <option value="c03"> 緑</option>
                <option value="c04"> 黃</option>
              </select>
            </div>
          </div>
        </div>
        <p class="submitBotton"><input type="submit" value="スタート" class="submitBotton"></p>
      </form>
    </div>
    <br>
    <!-- <p><a href="narabe.php?request=PN999GoTestView">テストページへ</a></p> -->
  </div>

</body>

</html>