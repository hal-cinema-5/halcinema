<!DOCTYPE html>
<html lang="ja">

<?php

session_start();
$name = $_SESSION['name'] ;
print("ユーザー:".$name);
?>

<head>
  <meta charset="UTF-8">
  <title>映画館施設案内</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
</head>
<body>
  <div class="sidebar">
    <ul>
      <li><a href="index.html">トップページ</a></li>
      <li><a href="jouei.html">上映スケジュール</a></li>
      <li><a href="sisetu.html">施設情報</a></li>
      <li><a href="ryoukin.html">料金一覧</a></li>
      <li><a href="login.php">ログイン</a></li>
      <li><a href="user.php">ユーザーページ</a></li>
    </ul>
<button id="sidebar-close-menu">閉じる</button>
  </div>

  <div class="content">
    <header>
      <button id="sidebar-toggle" class="m">メニュー</button>
      <h1>HALシネマ</h1>
    </header>

    <div class="container">
   <ul class="slider">
    <a href="jouhou.html" class="topjo">
    <li class="slider-item"><img src="images/makko.jpg" class="topga" alt="Slide 1"></li>
    </a>
    <a href="jouhou.html" class="topjo">
    <li class="slider-item"><img src="images/konan.jpg" class="topga" alt="Slide 2"></li>
  </a>
  <a href="jouhou.html" class="topjo">
    <li class="slider-item"><img src="images/jinmengyo.jpg" class="topga" alt="Slide 3"></li>
  </a>
  </ul>
<br><br><br><br>
  <h2>お知らせ</h2>
<a class="twitter-timeline" href="https://twitter.com/hal_nagoya?ref_src=twsrc%5Etfw">Tweets by hal_nagoya</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

    </div>



    <footer>
      <p>2023 © Copyright.</p>
    </footer>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="js/index.js" type="text/javascript"></script>

  </body>
</html>
