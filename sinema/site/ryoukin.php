<?php

session_start();
if(isset($_SESSION['name'])){
  $loginuser = $_SESSION['name'];
}else{
  $loginuser = "なし";
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>映画館施設案内</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/allpage.css">
  <link rel="stylesheet" href="css/ryoukin.css">
<link rel="stylesheet" type="text/css" href="css/ryoukin.css">
</head>
<body>
  <div class="sidebar">
    <div class="closemenu">
      <p class="menu">メニュー</p>
      <button id="sidebar-close-menu">×</button>
    </div>
    <ul>
      <li><a href="index.php">トップページ</a></li>
      <li><a href="jouei.php">上映スケジュール</a></li>
      <li><a href="sisetu.php">施設情報</a></li>
      <li><a href="ryoukin.php">料金一覧</a></li>
      <li><a href="login.php">ログイン</a></li>
      <li><a href="user.php">ユーザーページ</a></li>
    </ul>
    <div class="loginuser">
      <p>ユーザー：</p>
      <p class="user">
        <?php
          echo $loginuser;
        ?>
      </p>
    </div>
  </div>

  <div class="content">
    <header>
      <h1>HALシネマ</h1>
      <button id="sidebar-toggle" class="m"><p>メニュー</p></button>
    </header>

    <div class="container">
      <h2 id="facility-info">チケット料金</h2>
      <div class="price">
        <div class="priceinfo">
          <h2>大人</h2>
          <p>1800円</p>
        </div>
        <div class="priceinfo">
          <h2>大学生・専門学生※</h2>
          <p>1600円</p>
        </div>
        <div class="priceinfo">
          <h2>中学生・高校生※</h2>
          <p>1400円</p>
        </div>
        <div class="priceinfolast">
          <h2>小学生・幼児</h2>
          <p>1000円</p>
        </div>
      </div>
      <div class="note">
        <p>※学生証の提示が必要です。</p>
      </div>

      <h2 id="facility-info">フード料金</h2>
      <div class="price">
        <div class="priceinfo">
          <h2>ああああ</h2>
          <p>円</p>
        </div>
        <div class="priceinfo">
          <h2>ああああ</h2>
          <p>円</p>
        </div>
        <div class="priceinfo">
          <h2>ああああ</h2>
          <p>円</p>
        </div>
        <div class="priceinfo">
          <h2>ああああ</h2>
          <p>円</p>
        </div>
        <div class="priceinfo">
          <h2>ああああ</h2>
          <p>円</p>
        </div>
        <div class="priceinfolast">
          <h2>ああああ</h2>
          <p>円</p>
        </div>
      </div>
    </div>

    <footer class="footer">
      <div class="md-flex md-justify-between">
        <p class="footerp">HALシネマ</p>
        <ul class="footer__navi flex">
          <li><a href="index.php">TOP</a></li>
          <li><a href="https://twitter.com/hal_nagoya?ref_src=twsrc%5Etfw">TWITTER</a></li>
          <li><a href="sisetu.php">ABOUT</a></li>
        </ul>
      </div>
      <hr />
      <p class="copyright">
        © 2023 halcinema All Rights Reserved.
      </p>
    </footer>
<script src="js/sisetu.js" type="text/javascript"></script>

  </body>
</html>
