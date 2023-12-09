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
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
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
      <ul class="slider">
        <a href="jouhou.php" class="topjo">
          <li class="slider-item"><img src="images/makko.jpg" class="topga" alt="Slide 1"></li>
        </a>
        <a href="jouhou.php" class="topjo">
          <li class="slider-item"><img src="images/konan.jpg" class="topga" alt="Slide 2"></li>
        </a>
        <a href="jouhou.php" class="topjo">
          <li class="slider-item"><img src="images/jinmengyo.jpg" class="topga" alt="Slide 3"></li>
        </a>
      </ul>
      <div class="twitter">
        <h2 class="info"><p>お知らせ</p></h2>
        <a class="twitter-timeline" href="https://twitter.com/hal_nagoya?ref_src=twsrc%5Etfw">Tweets by hal_nagoya</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
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

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="js/index.js" type="text/javascript"></script>

  </body>
</html>
