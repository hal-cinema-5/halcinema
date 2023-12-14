<?php

require('db/dbpdo.php');

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
  <link rel="stylesheet" type="text/css" href="css/user.css">
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

    <div class="container">
    <?php

      $sql = (" SELECT * FROM `t_user` WHERE f_user_name = '" . $name . "' "); 
      $res = $dbh->prepare($sql);
      $res->execute();
      $data = $res->fetchAll();

      print("予約番号".$data[0][5]);

      ?>

      <div class="usercon">
        <h2>マイページ</h2>
        <div class="children">
          <h3>ユーザー名</h3>
          <p>ああああ</p>
          <h3>メールアドレス</h3>
          <p>ああああ</p>
          <h3>電話番号</h3>
          <p>ああああ</p>
        </div>
      </div>

      <div class="reservation">
        <h2>予約中の映画</h2>
        <p><?php print("予約番号".$data[0][5]); ?></p>
      </div>
      <a href="cancelcheck.php">cancel</a>
      <a href="components/logout.php">ログアウト</a>
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
