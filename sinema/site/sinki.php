
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
  <link rel="stylesheet" href="css/sinki.css">
<link rel="stylesheet" type="text/css" href="css/sinki.css">
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
<!-- 新規登録フォーム -->
<div class="register-container">
  <h2 class="register-title">新規登録</h2>
  <form class="register-form" method="POST" action="tourokusql.php">

    <p style="color:red">
          <?php 
            print($error);
            unset($_SESSION['error']);
          ?>
        </p>
    <label for="fullname">氏名:</label>
    <input type="text" id="fullname" name="name" required>

    <label for="phone">電話番号:</label>
    <input type="text" id="phone" name="tel" required>

    <label for="email">メールアドレス:</label>
    <input type="email" id="email" name="mail" required>

    <label for="password">パスワード:</label>
    <input type="password" id="password" name="pass" required>

    <button type="submit">新規登録</button>
  </form>
</div>

    </div>

    <footer>
      <p>2023 © Copyright.</p>
    </footer>
<script src="js/sisetu.js" type="text/javascript"></script>

  </body>
</html>
