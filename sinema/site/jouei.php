<?php 

require('dbpdo.php');

$sql = ("SELECT * FROM t_movie_info where 1"); //SQL文
// SQL実行
$res = $dbh->prepare($sql);
$res->execute();
$movie = $res->fetchAll();

$sql = ("SELECT * FROM t_screen where 1"); //SQL文
// SQL実行
$res = $dbh->prepare($sql);
$res->execute();
$screen = $res->fetchAll();

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>映画館施設案内</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/jouei.css">
  <script>
    function toggleContent1() {
      var content1 = document.getElementById("content1");
      var content2 = document.getElementById("content2");
      var content3 = document.getElementById("content3");

      // content1を表示、content2を非表示、content3を非表示にする
      if (content1.style.display === "none") {
        content1.style.display = "block";
        content2.style.display = "none";
        content3.style.display = "none";
      } 
    }
  </script>

    <script>
    function toggleContent2() {
      var content1 = document.getElementById("content1");
      var content2 = document.getElementById("content2");
      var content3 = document.getElementById("content3");

      // content2を表示、content1を非表示、content3を非表示にする
      if (content2.style.display === "none") {
        content1.style.display = "none";
        content2.style.display = "block";
        content3.style.display = "none";
      } 
    }
  </script>


<script>
    function toggleContent3() {
      var content1 = document.getElementById("content1");
      var content2 = document.getElementById("content2");
      var content3 = document.getElementById("content3");

      // content2を表示、content1を非表示、content3を非表示にする
      if (content3.style.display === "none") {
        content1.style.display = "none";
        content2.style.display = "none";
        content3.style.display = "block";
      } 
    }
  </script>

</head>



<div id="content1" style="display: block;">
<body>
  <div class="sidebar">
    <ul>
      <li><a href="index.php">トップページ</a></li>
      <li><a href="jouei.php">上映スケジュール</a></li>
      <li><a href="sisetu.php">施設情報</a></li>
      <li><a href="ryoukin.php">料金一覧</a></li>
      <li><a href="login.php">ログイン</a></li>
    </ul>
<button id="sidebar-close-menu">閉じる</button>
  </div>

  <div class="content">
    <header>
      <button id="sidebar-toggle" class="m">メニュー</button>
      <h1>HALシネマ</h1>
    </header>

    
    <div class="container">
      <h2 id="facility-info">上映スケジュール</h2>

  <div class="schedule-buttons">
    <a href="#" class="schedule-button">
      <time class="schedule-date" datetime="2023-06-13">6/13 (日)</time>
    </a>
    <a href="#" class="schedule-button">
      <!-- <time class="schedule-date" datetime="2023-06-14">6/14 (月)</time> -->
      <button onclick="toggleContent2()">切り替え</button>
    </a>
    <a href="#" class="schedule-button">
      <!-- <time class="schedule-date" datetime="2023-06-15">6/15 (火)</time> -->
      <button onclick="toggleContent3()">切り替え</button>
    </a>
    <a href="#" class="schedule-button">
      <time class="schedule-date" datetime="2023-06-16">6/16 (水)</time>
    </a>
    <a href="#" class="schedule-button">
      <time class="schedule-date" datetime="2023-06-17">6/17 (木)</time>
    </a>
  </div>



<h3>
  <time>2023/6/13 (日)</time>
</h3>

<div class="movie-info">
    <h4>　<?php echo $movie[0][2]; ?>　　　　　
      <a href="jouhou.php" class="info-button">映画情報へ</a>　　
    </h4>
      </div>
    <ul class="timetable">
      <div>
        <li class="theatre" >
          <a href="#" class="siata" >
            <?php echo $screen[0][1]; ?>
          </a>
          <br>
          <small>120分</small>
        </li>
      </div>

      <li>
        <a href="kounyu.php" method="post" value="ボタン1">
          <time class="start">10:00</time>
          ～
          <time class="end">12:00</time>
          <div class="close">
            販売終了
          </div>
        </a>
      </li>

      <li>
        <a href="kounyu.php">
          <time class="start">13:00</time>
          ～
          <time class="end">15:00</time>
          <div class="available">
            購入
          </div>
        </a>
      </li>

      <li>
        <a href="#">
          <time class="start">16:00</time>
          ～
          <time class="end">18:00</time>
          <div class="soldout">
            売り切れ
          </div>
        </a>
      </li>

      <li>
        <a href="kounyu.php">
          <time class="start">19:00</time>
          ～
          <time class="end">21:00</time>
          <div class="remaining">
            残りわずか
          </div>
        </a>
      </li>
    </ul>


    <div class="movie-info">
    <h4>　<?php echo $movie[1][2]; ?>　　　　　　　　　
      <a href="jouhou.php" class="info-button">映画情報へ</a>　　
    </h4>
      </div>
    <ul class="timetable">
      <div>
        <li class="theatre">
          <a href="#" class="siata">
            <?php echo $screen[0][1]; ?>
          </a>
          <br>
          <small>120分</small>
        </li>
      </div>

      <li>
        <a href="#">
          <time class="start">10:00</time>
          ～
          <time class="end">12:00</time>
          <div class="close">
            販売終了
          </div>
        </a>
      </li>

      <li>
        <a href="kounyu.php">
          <time class="start">13:00</time>
          ～
          <time class="end">15:00</time>
          <div class="available">
            購入
          </div>
        </a>
      </li>

      <li>
        <a href="#">
          <time class="start">16:00</time>
          ～
          <time class="end">18:00</time>
          <div class="soldout">
            売り切れ
          </div>
        </a>
      </li>

      <li>
        <a href="#">
          <time class="start">19:00</time>
          ～
          <time class="end">21:00</time>
          <div class="remaining">
            残りわずか
          </div>
        </a>
      </li>
    </ul>

    </div>
    </div>
  </div>



  <div id="content2" style="display: block;">
<body>
  <div class="sidebar">
    <ul>
      <li><a href="index.php">トップページ</a></li>
      <li><a href="jouei.php">上映スケジュール</a></li>
      <li><a href="sisetu.php">施設情報</a></li>
      <li><a href="ryoukin.php">料金一覧</a></li>
      <li><a href="login.php">ログイン</a></li>
    </ul>
<button id="sidebar-close-menu">閉じる</button>
  </div>

  <div class="content">
    <header>
      <button id="sidebar-toggle" class="m">メニュー</button>
      <h1>HALシネマ</h1>
    </header>

    
    <div class="container">
      <h2 id="facility-info">上映スケジュール</h2>

  <div class="schedule-buttons">
    <a href="#" class="schedule-button">
      <time class="schedule-date" datetime="2023-06-13">6/13 (日)</time>
    </a>
    <a href="#" class="schedule-button">
      <!-- <time class="schedule-date" datetime="2023-06-14">6/14 (月)</time> -->
      <button onclick="toggleContent2()">切り替え</button>
    </a>
    <a href="#" class="schedule-button">
      <!-- <time class="schedule-date" datetime="2023-06-15">6/15 (火)</time> -->
      <button onclick="toggleContent3()">切り替え</button>
    </a>
    <a href="#" class="schedule-button">
      <time class="schedule-date" datetime="2023-06-16">6/16 (水)</time>
    </a>
    <a href="#" class="schedule-button">
      <time class="schedule-date" datetime="2023-06-17">6/17 (木)</time>
    </a>
  </div>



<h3>
  <time>2023/6/14 (月)</time>
</h3>

<div class="movie-info">
    <h4>　<?php echo $movie[0][2]; ?>　　　　　
      <a href="jouhou.php" class="info-button">映画情報へ</a>　　
    </h4>
      </div>
    <ul class="timetable">
      <div>
        <li class="theatre" >
          <a href="#" class="siata" >
            <?php echo $screen[0][1]; ?>
          </a>
          <br>
          <small>120分</small>
        </li>
      </div>

      <li>
        <a href="kounyu.php" method="post" value="ボタン1">
          <time class="start">10:00</time>
          ～
          <time class="end">12:00</time>
          <div class="close">
            販売終了
          </div>
        </a>
      </li>

      <li>
        <a href="kounyu.php">
          <time class="start">13:00</time>
          ～
          <time class="end">15:00</time>
          <div class="available">
            購入
          </div>
        </a>
      </li>

      <li>
        <a href="#">
          <time class="start">16:00</time>
          ～
          <time class="end">18:00</time>
          <div class="soldout">
            売り切れ
          </div>
        </a>
      </li>

      <li>
        <a href="kounyu.php">
          <time class="start">19:00</time>
          ～
          <time class="end">21:00</time>
          <div class="remaining">
            残りわずか
          </div>
        </a>
      </li>
    </ul>


    <div class="movie-info">
    <h4>　<?php echo $movie[1][2]; ?>　　　　　　　　　
      <a href="jouhou.php" class="info-button">映画情報へ</a>　　
    </h4>
      </div>
    <ul class="timetable">
      <div>
        <li class="theatre">
          <a href="#" class="siata">
            <?php echo $screen[0][1]; ?>
          </a>
          <br>
          <small>120分</small>
        </li>
      </div>

      <li>
        <a href="#">
          <time class="start">10:00</time>
          ～
          <time class="end">12:00</time>
          <div class="close">
            販売終了
          </div>
        </a>
      </li>

      <li>
        <a href="kounyu.php">
          <time class="start">13:00</time>
          ～
          <time class="end">15:00</time>
          <div class="available">
            購入
          </div>
        </a>
      </li>

      <li>
        <a href="#">
          <time class="start">16:00</time>
          ～
          <time class="end">18:00</time>
          <div class="soldout">
            売り切れ
          </div>
        </a>
      </li>

      <li>
        <a href="#">
          <time class="start">19:00</time>
          ～
          <time class="end">21:00</time>
          <div class="remaining">
            残りわずか
          </div>
        </a>
      </li>
    </ul>

    </div>
    </div>
  </div>




  <div id="content3" style="display: block;">
<body>
  <div class="sidebar">
    <ul>
      <li><a href="index.php">トップページ</a></li>
      <li><a href="jouei.php">上映スケジュール</a></li>
      <li><a href="sisetu.php">施設情報</a></li>
      <li><a href="ryoukin.php">料金一覧</a></li>
      <li><a href="login.php">ログイン</a></li>
    </ul>
<button id="sidebar-close-menu">閉じる</button>
  </div>

  <div class="content">
    <header>
      <button id="sidebar-toggle" class="m">メニュー</button>
      <h1>HALシネマ</h1>
    </header>

    
    <div class="container">
      <h2 id="facility-info">上映スケジュール</h2>

  <div class="schedule-buttons">
    <a href="#" class="schedule-button">
      <time class="schedule-date" datetime="2023-06-13">6/13 (日)</time>
    </a>
    <a href="#" class="schedule-button">
      <!-- <time class="schedule-date" datetime="2023-06-14">6/14 (月)</time> -->
      <button onclick="toggleContent2()">切り替え</button>
    </a>
    <a href="#" class="schedule-button">
      <!-- <time class="schedule-date" datetime="2023-06-15">6/15 (火)</time> -->
      <button onclick="toggleContent3()">切り替え</button>
    </a>
    <a href="#" class="schedule-button">
      <time class="schedule-date" datetime="2023-06-16">6/16 (水)</time>
    </a>
    <a href="#" class="schedule-button">
      <time class="schedule-date" datetime="2023-06-17">6/17 (木)</time>
    </a>
  </div>



<h3>
  <time>2023/6/15 (火)</time>
</h3>

<div class="movie-info">
    <h4>　<?php echo $movie[0][2]; ?>　　　　　
      <a href="jouhou.php" class="info-button">映画情報へ</a>　　
    </h4>
      </div>
    <ul class="timetable">
      <div>
        <li class="theatre" >
          <a href="#" class="siata" >
            <?php echo $screen[0][1]; ?>
          </a>
          <br>
          <small>120分</small>
        </li>
      </div>

      <li>
        <a href="kounyu.php" method="post" value="ボタン1">
          <time class="start">10:00</time>
          ～
          <time class="end">12:00</time>
          <div class="close">
            販売終了
          </div>
        </a>
      </li>

      <li>
        <a href="kounyu.php">
          <time class="start">13:00</time>
          ～
          <time class="end">15:00</time>
          <div class="available">
            購入
          </div>
        </a>
      </li>

      <li>
        <a href="#">
          <time class="start">16:00</time>
          ～
          <time class="end">18:00</time>
          <div class="soldout">
            売り切れ
          </div>
        </a>
      </li>

      <li>
        <a href="kounyu.php">
          <time class="start">19:00</time>
          ～
          <time class="end">21:00</time>
          <div class="remaining">
            残りわずか
          </div>
        </a>
      </li>
    </ul>


    <div class="movie-info">
    <h4>　<?php echo $movie[1][2]; ?>　　　　　　　　　
      <a href="jouhou.php" class="info-button">映画情報へ</a>　　
    </h4>
      </div>
    <ul class="timetable">
      <div>
        <li class="theatre">
          <a href="#" class="siata">
            <?php echo $screen[0][1]; ?>
          </a>
          <br>
          <small>120分</small>
        </li>
      </div>

      <li>
        <a href="#">
          <time class="start">10:00</time>
          ～
          <time class="end">12:00</time>
          <div class="close">
            販売終了
          </div>
        </a>
      </li>

      <li>
        <a href="kounyu.php">
          <time class="start">13:00</time>
          ～
          <time class="end">15:00</time>
          <div class="available">
            購入
          </div>
        </a>
      </li>

      <li>
        <a href="#">
          <time class="start">16:00</time>
          ～
          <time class="end">18:00</time>
          <div class="soldout">
            売り切れ
          </div>
        </a>
      </li>

      <li>
        <a href="#">
          <time class="start">19:00</time>
          ～
          <time class="end">21:00</time>
          <div class="remaining">
            残りわずか
          </div>
        </a>
      </li>
    </ul>

    </div>
    </div>
  </div>




    <footer>
      <p>2023 © Copyright.</p>
    </footer>
<script src="js/sisetu.js" type="text/javascript"></script>

  </body>
</html>
