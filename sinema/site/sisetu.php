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
  <link rel="stylesheet" href="css/sisetu.css">
<link rel="stylesheet" type="text/css" href="css/sisetu.css">
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
      <h2 class="facility-info">施設情報</h2>
      <img src="images/sisetu.jpg" alt="画像" class="cinema-image">
      <p class="gyoukan">最高の映画体験を提供する映画館へようこそ！<br>最新作や人気映画を豪華な施設でお楽しみいただけます。快適な座席と最新の音響システムで、鮮明な映像とサウンドを存分に楽しんでください。私たちの目標は、あなたの心を揺さぶる映画体験を提供することです。ぜひ、素晴らしい時間をお過ごしください！</p>
      <div class="screen-table">
        <a href="images/scr.pdf" class="screen-link" onmouseover="showImage(event, 'images/scr1.png')" onmouseout="hideImage()">
          <div class="screen">
            <div class="screen-name">スクリーン 1,2,3</div>
            <div class="screen-info">座席数： 200</div>
          </div>
        </a>
        <a href="images/scr2.pdf" class="screen-link" onmouseover="showImage(event, 'images/scr2.png')" onmouseout="hideImage()">
          <div class="screen">
            <div class="screen-name">スクリーン 4,5</div>
            <div class="screen-info">座席数： 120</div>
          </div>
        </a>
        <a href="images/scr3.pdf" class="screen-link" onmouseover="showImage(event, 'images/scr3.png')" onmouseout="hideImage()">
          <div class="screen">
            <div class="screen-name">スクリーン 6,7,8</div>
            <div class="screen-info">座席数： 70</div>
          </div>
        </a>
      </div>

      <script>
        // 画像を表示する関数
        function showImage(event, imageUrl) {
          event.preventDefault();
          var img = document.createElement('img');
          img.setAttribute('src', imageUrl);
          img.setAttribute('id', 'preview-image');
          img.style.position = 'fixed';
          img.style.width = '400px';
          img.style.height = '400px';
          img.style.border = '2px solid #9ca3af';
          img.style.top = (event.clientY + -400) + 'px';
          img.style.left = (event.clientX + -100) + 'px';
          document.body.appendChild(img);
        }

        // 画像を非表示にする関数
        function hideImage() {
          var img = document.getElementById('preview-image');
          if (img) {
            img.parentNode.removeChild(img);
          }
        }
      </script>

      <br><br>
      <div class="image-text-container">
        <img src="images/seki.jpg" width="300">
        <div class="gyoukan">最高の快適さと視聴体験を提供する広々とした座席。柔軟なクッションと適切な間隔で、プライベートな空間を確保。<br>優れた視界と音響効果で、映画を最大限に楽しめます。リラックスして映画に没頭しましょう。ゆったりとした座席で、身を寄せ合うことなく自由にリラックスできます。<br>思い切り映画に没頭し、特別な時間をお楽しみください。</div>
      </div>
      <br><br><br>
      <div class="image-text-container">
        <img src="images/kafe.jpg" width="300">
        <div class="gyoukan">映画館のカフェでは、美味しい飲み物とくつろぎのひとときを提供します。映画の前後にお楽しみください。</div>
      </div>
      
      <div class="access">
        <h2 class="facility-info">交通アクセス</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3261.491621137893!2d136.88103012565347!3d35.169297472756874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600376de618547db%3A0x76435e49b7e59323!2zSEFM5ZCN5Y-k5bGL!5e0!3m2!1sja!2sjp!4v1686097577019!5m2!1sja!2sjp" width="760" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <div class="accesscon"></div>
          <h3 class="accessname">HALシネマ</h3>
          <p class="address">〒450-0002<br/>愛知県名古屋市中村区名駅４丁目２７−１<br>総合校舎スパイラルタワーズ<hr></p>
          <p class="description">当映画館のアクセスは便利な場所に位置しています。お気軽にお越しください。</p>
      </div>
        
      <div class="businesshours">
          <h2 class="facility-info">営業時間</h2>
          <p>・平日：9:30～最終上映開始時刻まで</p>
          <p>・土日祝：9:00～最終上映開始時刻まで</p>
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
