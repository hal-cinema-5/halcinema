<?php
require('db/dbpdo.php');

//情報配列格納
$sql = ("SELECT * from t_movie_info where f_movie_name = 'ザ・スーパーマリオブラザーズ・ムービー'");
  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  $info = $stmt->fetchAll();
  print($info[0][0]);
?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>映画館施設案内</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/sisetu.css">
<link rel="stylesheet" type="text/css" href="css/sisetu.css">
</head>
<body>
  <div class="sidebar">
    <ul>
      <li><a href="index.html">トップページ</a></li>
      <li><a href="jouei.html">上映スケジュール</a></li>
      <li><a href="sisetu.html">施設情報</a></li>
      <li><a href="ryoukin.html">料金一覧</a></li>
      <li><a href="login.html">ログイン</a></li>
    </ul>
<button id="sidebar-close-menu">閉じる</button>
  </div>

  <div class="content">
    <header>
      <button id="sidebar-toggle" class="m">メニュー</button>
      <h1>HALシネマ</h1>
    </header>

    <div class="container">
      <h2 id="facility-info">映画情報</h2>
      <h3><?php print($info[0][0]); ?></h3>
      <img src="images/jouei1.jpg" alt="画像" class="cinema-image">
      <p class="gyoukan">
        <?php print($info[0][1]); ?>
      </p>

    </div>

    <footer>
      <p>2023 © Copyright.</p>
    </footer>
<script src="js/sisetu.js" type="text/javascript"></script>

  </body>
</html>
