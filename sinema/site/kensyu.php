<!DOCTYPE html>
<html lang="ja">
  <script src="js/kensyu.js" type="text/javascript"></script>
<head>
  <meta charset="UTF-8">
  <title>映画館施設案内</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/kensyu.css">
<link rel="stylesheet" type="text/css" href="css/kensyu.css">
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
      <h2 id="facility-info">券種選択</h2>

      <h3>
        <span>座席選択内容</span>
      </h3>
<br>
      <div class="tiketInfoBody">
        <table border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <th>
                <div>作品名</div>
              </th>
              <td>ザ・スーパーマリオブラザーズ・ムービー</td>
            </tr>
            <tr>
              <th>
                <div>劇場名</div>
              </th>
              <td>HALシネマ</td>
            </tr>
            <tr>
              <th>
                <div>シアター</div>
              </th>
              <td>シアター1</td>
            </tr>
            <tr>
              <th>
                <div>鑑賞日</div>
              </th>
              <td>2023年06月13日(日)</td>
            </tr>
            <tr>
              <th>
                <div>時間</div>
              </th>
              <td>13時00分　-　15時00分</td>
            </tr>
            <tr>
              <th>
                <div>枚数</div>
              </th>
              <td>1枚</td>
            </tr>
            <tr>
              <th>
                <div>座席</div>
              </th>
              <td id="zaseki"></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="ticketSelection">
        <!-- 枚数に応じてセレクトボックスを動的に生成 -->
        <label for="ticket-select">券種をお選びください:</label>
        <select id="ticket-select">
          <option value="">選択してください</option>
          <option value="adult">大人 (1000円)</option>
          <option value="child">子供 (無料)</option>
        </select>
      </div>

      <br>
      <div class="button-container">
        <a href="kakunin.php" class="btn btn-next">次へ</a>
        <a href="kounyu.php" class="btn btn-back">戻る</a>
      </div>

    </div>


    <footer>
      <p>2023 © Copyright.</p>
    </footer>
<script src="js/sisetu.js" type="text/javascript"></script>

  </body>
</html>
