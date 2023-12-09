<?php
// SESSIONのエラー表示削除
ini_set('display_errors', 0);
session_start();
$error = $_SESSION['error'];

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>映画館施設案内</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
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

<!-- ログインフォーム -->
<div class="login-container">
  <h2 class="login-title">会員の方</h2>
  <form class="login-form" method="POST" action="rogincheck.php">
      <p style="color:red">
        <?php 
          print($error);
          unset($_SESSION['error']);
        ?>
      </p>
    <label for="username">ログインID/会員番号:</label>
    <input type="text" id="username" name="name">
    <label for="password">パスワード:</label>
    <input type="password" id="password" name="pass">

    <button type="submit">ログイン</button>
  </form>
  <p class="register-link">会員登録がまだの方は、<a href="sinki.php">こちら</a>から</p>
</div>


    </div>

    <footer>
      <p>2023 © Copyright.</p>
    </footer>
<script src="js/sisetu.js" type="text/javascript"></script>

  </body>
</html>
