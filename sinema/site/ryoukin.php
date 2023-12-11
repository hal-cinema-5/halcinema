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
      <div class="foodprice">
        <h1>セットメニュー</h1>
        <div class="foodpriceinfo">
          <div>
            <h2>スタンダードセット</h2>
            <p>ポップコーンL + フリードリンク</p>
          </div>
          <p>1100円</p>
        </div>
        <div class="foodpriceinfo">
          <div>
            <h2>ペアセット</h2>
            <p>ポップコーンK + フリードリンク×2</p>
          </div>
          <p>1700円</p>
        </div>
        <div class="foodpriceinfo">
          <div>
            <h2>ホットドッグセット</h2>
            <p>お好きなホットドッグ + フリードリンク</p>
          </div>
          <p>1050円</p>
        </div>
        <div class="foodpriceinfo">
          <div>
            <h2>唐揚げ(5個)セット</h2>
            <h2>唐揚げ(3個)＆ポテトセット</h2>
            <h2>フライドポテトセット</h2>
          </div>
          <p>1050円</p>
        </div>
        <div class="foodpriceinfolast">
          <div>
            <h2>ドーナツセット</h2>
            <p>お好きなドーナツ + フリードリンク</p>
          </div>
          <p>700円</p>
        </div>
        <h1>単品</h1>
        <div class="foodpriceinfo">
          <div>
            <h2>ドーナツ</h2>
            <p>プレーン・抹茶ホワイト・アーモンドチョコ・クッキー＆クリーム・フランポワーズショコラ・シナモン＆カレンツくるみ</p>
          </div>
          <p>260~300円</p>
        </div>
        <div class="foodpriceinfo">
          <div>
            <h2>アイスクリーム</h2>
            <p>バニラ・チョコ・ミックス</p>
          </div>
          <p>650円</p>
        </div>
        <div class="foodpriceinfo">
          <div>
            <h2>ソフトドリンク</h2>
            <p>S・M・L・フリードリンク</p>
          </div>
          <p>450~600円</p>
        </div>
        <div class="foodpriceinfo">
          <div>
            <h2>ポップコーン</h2>
            <p>塩・キャラメル・ハーフ＆ハーフ</p>
          </div>
          <p>600~800円</p>
        </div>
        <div class="foodpriceinfo">
          <div>
            <h2>ホットドッグ</h2>
            <p>サルサ・チーズ</p>
          </div>
          <p>650円</p>
        </div>
        <div class="foodpriceinfo">
          <div>
            <h2>フライドポテト</h2>
            <h2>唐揚げ(5個)</h2>
            <h2>唐揚げ(3個)＆ポテト</h2>
          </div>
          <p>600円</p>
        </div>
        <div class="foodpriceinfolast">
          <div>
            <h2>生ビール</h2>
            <p>M・L</p>
          </div>
          <p>750~800円</p>
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
