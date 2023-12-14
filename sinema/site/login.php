<?php
// SESSIONのエラー表示削除
ini_set('display_errors', 0);
session_start();
$error = $_SESSION['error'];

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
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/allpage.css">
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

    <div class="con">
      <div class="logincontainer">
        <div>
          <h2 class="login-title">ログイン</h2>
          <form class="login-form" method="POST" action="rogincheck.php">
            <div class="children">
              <label for="username">ユーザー名:</label>
              <input type="text" id="username" name="name">
              <label for="password">パスワード:</label>
              <input type="password" id="password" name="pass">
              <p style="color:red">
                <?php 
                  print($error);
                  unset($_SESSION['error']);
                ?>
              </p>
              <button class="loginbutton" type="submit">ログイン</button>
            </div>
          </form>
          <p class="register-link">会員登録がまだの方は、<a href="sinki.php">こちら</a>から</p>
        </div>
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
