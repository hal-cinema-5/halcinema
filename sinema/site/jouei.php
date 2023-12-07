<?php 
try{

require('dbpdo.php');
session_start();
$day1_p          = $_SESSION['day1_p'];
$selected_days1  = $_POST['selected_days1'];
// $day1_p = "";
$day2_p = $_POST['selected_days2'];
$day3_p = $_POST['selected_days3'];
$day4_p = $_POST['selected_days4'];
$day5_p = $_POST['selected_days5'];


echo "1日目$day1_p  ";
echo "2日目$day2_p  ";
echo "3日目$day3_p  ";
echo "4日目$day4_p  ";
echo "5日目$day5_p  ";



unset($_SESSION['movieID']);
unset($_SESSION['movietime']);
unset($_SESSION['movieday']);


// 日付取得
$given = date('Y-m-d');
$day1 = date('H/i/s');
echo "$day1";




// $sql = ("SELECT * FROM t_movie_info where 1"); 
// $res = $dbh->prepare($sql);
// $res->execute();
// $movie = $res->fetchAll();


$sql = ("SELECT * FROM t_screen1 where f_time_day = '". $day1 ."'"); 
$res = $dbh->prepare($sql);
$res->execute();
$screen1 = $res->fetchAll();




//1日目表示
//配列を使用し、要素順に(日:0〜土:6)を設定する
$week = [
  '(日)', //0
  '(月)', //1
  '(火)', //2
  '(水)', //3
  '(木)', //4
  '(金)', //5 
  '(土)', //6
];
$date = date('w');
//日本語で曜日を出力
$week1 = $week[$date];
echo date("m/d". $week1 ."") . "\n";



//2日目表示
//配列を使用し、要素順に(日:0〜土:6)を設定する
$week = [
  '(日)', //0
  '(月)', //1
  '(火)', //2
  '(水)', //3
  '(木)', //4
  '(金)', //5 
  '(土)', //6
];
$date = date('w');
if($date <= 5){
$date = $date + 1;
} else {
  $date = 0;
} 
//日本語で曜日を出力
$week2 = $week[$date];
$Day2 = strtotime($given . ' +1 day');
echo date("m/d". $week2 ."", $Day2) . "\n";
$Day_sql2 = date("m-d", $Day2);



//3日目表示
//配列を使用し、要素順に(日:0〜土:6)を設定する
$week = [
  '(日)', //0
  '(月)', //1
  '(火)', //2
  '(水)', //3
  '(木)', //4
  '(金)', //5 
  '(土)', //6
];
$date = date('w');
if($date <= 4){
$date = $date + 2;
}else
if($date == 5){
  $date = 0;
}else
if($date == 6){
  $date = 1;
}
//日本語で曜日を出力
$week3 = $week[$date];
$Day3 = strtotime($given . ' +2 day');
echo date("m/d". $week3 ."", $Day3) . "\n";
$Day_sql3 = date("m-d", $Day3);


//4日目表示
//配列を使用し、要素順に(日:0〜土:6)を設定する
$week = [
  '(日)', //0
  '(月)', //1
  '(火)', //2
  '(水)', //3
  '(木)', //4
  '(金)', //5 
  '(土)', //6
];
$date = date('w');
if($date <= 3){
  $date = $date + 3;
  }else
  if($date == 4){
    $date = 0;
  }else
  if($date == 5){
    $date = 1;
  }else
  if($date == 6){
    $date = 2;
  }
//日本語で曜日を出力
$week4 = $week[$date];
$Day4 = strtotime($given . ' +3 day');
echo date("m/d". $week4 ."", $Day4) . "\n";
$Day_sql4 = date("m-d", $Day4);


//5日目表示
//配列を使用し、要素順に(日:0〜土:6)を設定する
$week = [
  '(日)', //0
  '(月)', //1
  '(火)', //2
  '(水)', //3
  '(木)', //4
  '(金)', //5 
  '(土)', //6
];
$date = date('w');
if($date <= 2){
  $date = $date + 4;
  }else
  if($date == 3){
    $date = 0;
  }else
  if($date == 4){
    $date = 1;
  }else
  if($date == 5){
    $date = 2;
  }else
  if($date == 6){
    $date = 3;
  }
//日本語で曜日を出力
$week5 = $week[$date];
$Day5 = strtotime($given . ' +4 day');
echo date("m/d". $week5 ."", $Day5) . "\n";
$Day_sql5 = date("m-d", $Day5);






}catch (PDOException $e) {
  exit('データベースに接続できませんでした。' . $e->getMessage());
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>映画館施設案内</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/jouei.css">
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

  <form action="" method="post">
    <input type="hidden" name="selected_days1" value="1">
    <button class="Box" type="submit"><?php echo date("m/d". $week1 ."") . "\n"; ?></button>
  </form>

  <form action="" method="post">
    <input type="hidden" name="selected_days2" value="1">
    <button class="Box" type="submit"><?php echo date("m/d". $week2 ."", $Day2) . "\n"; ?></button>
  </form>

  <form action="" method="post">
    <input type="hidden" name="selected_days3" value="1">
    <button class="Box" type="submit"><?php echo date("m/d". $week3 ."", $Day3) . "\n"; ?></button>
  </form>

  <form action="" method="post">
    <input type="hidden" name="selected_days4" value="1">
    <button class="Box" type="submit"><?php echo date("m/d". $week4 ."", $Day4) . "\n"; ?></button>
  </form>

  <form action="" method="post">
    <input type="hidden" name="selected_days5" value="1">
    <button class="Box" type="submit"><?php echo date("m/d". $week5 ."", $Day5) . "\n"; ?></button>
  </form>
  </div>



<!-- 1日目の映画スケジュール -->
<?php if($day1_p == 1 or $selected_days1 == 1){ ?>

  <?php 
  $day1 = date("m-d");
  $sql = ("SELECT * FROM t_movie_info where 1"); 
  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>
<h3>
  <time><?php echo date("Y/m/d". $week1 ."") . "\n"; ?></time>
</h3>

<?php foreach ($result as $item): ?>
<?php if(empty($item['f_movie_name'])) { } else {?>
  <?php 
    $sql = ("SELECT * FROM t_screen1 where f_movie_name = '". $item['f_movie_name'] ."' and f_time_day = '". $day1 ."'"); 
    $res = $dbh->prepare($sql);
    $res->execute();
    $movie_name = $res->fetchAll();
    $movie_name1 = $movie_name[0][1];
    // print_r($movie_name);





    ?>
  <?php if($movie_name1 == $item['f_movie_name']) { ?>
    <div class="movie-info">
        <h4>　<?php echo $item['f_movie_name']; ?>
          <a href="jouhou.php" class="info-button">映画情報へ</a>　　
        </h4>
          </div>
        <ul class="timetable">
          <div>
            <li class="theatre" >
              <a href="#" class="siata" >
                <?php echo "スクリーン1"?>
              </a>
              <br>
              <small>120分</small>
            </li>
          </div>

          <li>
          <?php
              
                $movieIDname = $item['f_movie_name'] ;
                $movieIDtime = "10:00";
                
          ?> 

              <a href="screen1.php?movieID=<?php echo $movieIDname;?>&movietime=<?php echo $movieIDtime;?>&movieday=<?php echo 1;?>" action="screen1.php" method="POST">
              
              <time class="start">10:00</time>
              ～
              <time class="end">12:00</time>
              <?php 
                  $sql = ("SELECT 
                  (CASE WHEN A1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J20 = 0 THEN 1 ELSE 0 END) 
                  AS zero_count
                    FROM t_screen1 where f_movie_name = '". $item['f_movie_name'] ."' and f_time_day = '". $day1 ."' and f_time_start = '10:00'
                    ");
                    $res = $dbh->prepare($sql);
                    $res->execute();
                    $moviecount = $res->fetchAll();
                    $moviecount1 = $moviecount[0][0];
                    echo "$moviecount1";
              ?>
              <?php if(0 == $moviecount1) {?>
              <div class="soldout">
                売り切れ
              </div>
              <?php } else if(30 >= $moviecount1) {?>
                  <div class="remaining">
                  残りわずか
                  </div>
                <?php } else { ?>
                    <div class="available">
                      購入
                    </div>
                  <?php } ?>
            </a>
        </form>
          </li>


          <li>
          <?php
              
                $movieIDname = $item['f_movie_name'] ;
                $movieIDtime = "13:00";
          ?> 

              <a href="screen1.php?movieID=<?php echo $movieIDname;?>&movietime=<?php echo $movieIDtime;?>&movieday=<?php echo 1;?>" action="screen1.php" method="POST">

              <time class="start">13:00</time>
              ～
              <time class="end">15:00</time>

              <?php 
                  $sql = ("SELECT 
                  (CASE WHEN A1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J20 = 0 THEN 1 ELSE 0 END) 
                  AS zero_count
                    FROM t_screen1 where f_movie_name = '". $item['f_movie_name'] ."' and f_time_day = '". $day1 ."' and f_time_start = '13:00'
                    ");
                    $res = $dbh->prepare($sql);
                    $res->execute();
                    $moviecount = $res->fetchAll();
                    $moviecount1 = $moviecount[0][0];
                    echo "$moviecount1";
              ?>
              <?php if(0 == $moviecount1) {?>
              <div class="soldout">
                売り切れ
              </div>
              <?php } else if(30 >= $moviecount1) {?>
                  <div class="remaining">
                  残りわずか
                  </div>
                <?php } else { ?>
                    <div class="available">
                      購入
                    </div>
                  <?php } ?>
            </a>
          </li>

          <li>
          <?php
              
                $movieIDname = $item['f_movie_name'] ;
                $movieIDtime = "16:00";
          ?> 

              <a href="screen1.php?movieID=<?php echo $movieIDname;?>&movietime=<?php echo $movieIDtime;?>&movieday=<?php echo 1;?>" action="screen1.php" method="POST">
              <time class="start">16:00</time>
              ～
              <time class="end">18:00</time>

              <?php 
                  $sql = ("SELECT 
                  (CASE WHEN A1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J20 = 0 THEN 1 ELSE 0 END) 
                  AS zero_count
                    FROM t_screen1 where f_movie_name = '". $item['f_movie_name'] ."' and f_time_day = '". $day1 ."' and f_time_start = '16:00'
                    ");
                    $res = $dbh->prepare($sql);
                    $res->execute();
                    $moviecount = $res->fetchAll();
                    $moviecount1 = $moviecount[0][0];
                    echo "$moviecount1";
              ?>
              <?php if(0 == $moviecount1) {?>
              <div class="soldout">
                売り切れ
              </div>
              <?php } else if(30 >= $moviecount1) {?>
                  <div class="remaining">
                  残りわずか
                  </div>
                <?php } else { ?>
                    <div class="available">
                      購入
                    </div>
                  <?php } ?>
            </a>
          </li>

          <li>
          <?php
              
                $movieIDname = $item['f_movie_name'] ;
                $movieIDtime = "19:00";
          ?> 

              <a href="screen1.php?movieID=<?php echo $movieIDname;?>&movietime=<?php echo $movieIDtime;?>&movieday=<?php echo 1;?>" action="screen1.php" method="POST">
              <time class="start">19:00</time>
              ～
              <time class="end">21:00</time>

              <?php 
                  $sql = ("SELECT 
                  (CASE WHEN A1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN A20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN B20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN C20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN D20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN E20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN F20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN G20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN H20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN I20 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J1 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J2 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J3 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J4 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J5 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J6 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J7 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J8 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J9 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J10 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J11 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J12 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J13 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J14 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J15 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J16 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J17 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J18 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J19 = 0 THEN 1 ELSE 0 END) +
                  (CASE WHEN J20 = 0 THEN 1 ELSE 0 END) 
                  AS zero_count
                    FROM t_screen1 where f_movie_name = '". $item['f_movie_name'] ."' and f_time_day = '". $day1 ."' and f_time_start = '19:00'
                    ");
                    $res = $dbh->prepare($sql);
                    $res->execute();
                    $moviecount = $res->fetchAll();
                    $moviecount1 = $moviecount[0][0];
                    echo "$moviecount1";
              ?>
              <?php if(0 == $moviecount1) {?>
              <div class="soldout">
                売り切れ
              </div>
              <?php } else if(30 >= $moviecount1) {?>
                  <div class="remaining">
                  残りわずか
                  </div>
                <?php } else { ?>
                    <div class="available">
                      購入
                    </div>
                  <?php } ?>
            </a>
          </li>
        </ul>
      <?php } ?>
    <?php } ?>

    <?php endforeach; ?>
    <?php unset($_SESSION['day1_p']); ?>
    <?php unset($selected_days1); ?>

<?php } ?>





<!-- 2日目の映画スケジュール -->
<?php if($day2_p == 1){ ?>

<?php 
$day1 = date("m-d");
$sql = ("SELECT * FROM t_movie_info where 1"); 
$stmt = $dbh->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h3>
<time><?php echo date("Y/m/d". $week2 ."", $Day2) . "\n"; ?></time>
</h3>

<?php foreach ($result as $item): ?>
<?php if(empty($item['f_movie_name'])) { } else {?>
<?php 
  $sql = ("SELECT * FROM t_screen1 where f_movie_name = '". $item['f_movie_name'] ."' and f_time_day = '". $Day_sql2 ."'"); 
  $res = $dbh->prepare($sql);
  $res->execute();
  $movie_name = $res->fetchAll();
  $movie_name1 = $movie_name[0][1];
  // print_r($movie_name);





  ?>
<?php if($movie_name1 == $item['f_movie_name']) { ?>
  <div class="movie-info">
      <h4>　<?php echo $item['f_movie_name']; ?>
        <a href="jouhou.php" class="info-button">映画情報へ</a>　　
      </h4>
        </div>
      <ul class="timetable">
        <div>
          <li class="theatre" >
            <a href="#" class="siata" >
              <?php echo "スクリーン1"?>
            </a>
            <br>
            <small>120分</small>
          </li>
        </div>

        <li>
        <?php
            
              $movieIDname = $item['f_movie_name'] ;
              $movieIDtime = "10:00";
              
        ?> 

            <a href="screen1.php?movieID=<?php echo $movieIDname;?>&movietime=<?php echo $movieIDtime;?>&movieday=<?php echo 2;?>" action="screen1.php" method="POST">
            
            <time class="start">10:00</time>
            ～
            <time class="end">12:00</time>
            <?php 
                $sql = ("SELECT 
                (CASE WHEN A1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J20 = 0 THEN 1 ELSE 0 END) 
                AS zero_count
                  FROM t_screen1 where f_movie_name = '". $item['f_movie_name'] ."' and f_time_day = '". $Day_sql2 ."' and f_time_start = '10:00'
                  ");
                  $res = $dbh->prepare($sql);
                  $res->execute();
                  $moviecount = $res->fetchAll();
                  $moviecount1 = $moviecount[0][0];
                  echo "$moviecount1";
            ?>
            <?php if(0 == $moviecount1) {?>
            <div class="soldout">
              売り切れ
            </div>
            <?php } else if(30 >= $moviecount1) {?>
                <div class="remaining">
                残りわずか
                </div>
              <?php } else { ?>
                  <div class="available">
                    購入
                  </div>
                <?php } ?>
          </a>
      </form>
        </li>


        <li>
        <?php
            
              $movieIDname = $item['f_movie_name'] ;
              $movieIDtime = "13:00";
        ?> 

            <a href="screen1.php?movieID=<?php echo $movieIDname;?>&movietime=<?php echo $movieIDtime;?>&movieday=<?php echo 2;?>" action="screen1.php" method="POST">

            <time class="start">13:00</time>
            ～
            <time class="end">15:00</time>

            <?php 
                $sql = ("SELECT 
                (CASE WHEN A1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J20 = 0 THEN 1 ELSE 0 END) 
                AS zero_count
                  FROM t_screen1 where f_movie_name = '". $item['f_movie_name'] ."' and f_time_day = '". $Day_sql2 ."' and f_time_start = '13:00'
                  ");
                  $res = $dbh->prepare($sql);
                  $res->execute();
                  $moviecount = $res->fetchAll();
                  $moviecount1 = $moviecount[0][0];
                  echo "$moviecount1";
            ?>
            <?php if(0 == $moviecount1) {?>
            <div class="soldout">
              売り切れ
            </div>
            <?php } else if(30 >= $moviecount1) {?>
                <div class="remaining">
                残りわずか
                </div>
              <?php } else { ?>
                  <div class="available">
                    購入
                  </div>
                <?php } ?>
          </a>
        </li>

        <li>
        <?php
            
              $movieIDname = $item['f_movie_name'] ;
              $movieIDtime = "16:00";
        ?> 

            <a href="screen1.php?movieID=<?php echo $movieIDname;?>&movietime=<?php echo $movieIDtime;?>&movieday=<?php echo 2;?>" action="screen1.php" method="POST">
            <time class="start">16:00</time>
            ～
            <time class="end">18:00</time>

            <?php 
                $sql = ("SELECT 
                (CASE WHEN A1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J20 = 0 THEN 1 ELSE 0 END) 
                AS zero_count
                  FROM t_screen1 where f_movie_name = '". $item['f_movie_name'] ."' and f_time_day = '". $Day_sql2 ."' and f_time_start = '16:00'
                  ");
                  $res = $dbh->prepare($sql);
                  $res->execute();
                  $moviecount = $res->fetchAll();
                  $moviecount1 = $moviecount[0][0];
                  echo "$moviecount1";
            ?>
            <?php if(0 == $moviecount1) {?>
            <div class="soldout">
              売り切れ
            </div>
            <?php } else if(30 >= $moviecount1) {?>
                <div class="remaining">
                残りわずか
                </div>
              <?php } else { ?>
                  <div class="available">
                    購入
                  </div>
                <?php } ?>
          </a>
        </li>

        <li>
        <?php
            
              $movieIDname = $item['f_movie_name'] ;
              $movieIDtime = "19:00";
        ?> 

            <a href="screen1.php?movieID=<?php echo $movieIDname;?>&movietime=<?php echo $movieIDtime;?>&movieday=<?php echo 2;?>" action="screen1.php" method="POST">
            <time class="start">19:00</time>
            ～
            <time class="end">21:00</time>

            <?php 
                $sql = ("SELECT 
                (CASE WHEN A1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J20 = 0 THEN 1 ELSE 0 END) 
                AS zero_count
                  FROM t_screen1 where f_movie_name = '". $item['f_movie_name'] ."' and f_time_day = '". $Day_sql2 ."' and f_time_start = '19:00'
                  ");
                  $res = $dbh->prepare($sql);
                  $res->execute();
                  $moviecount = $res->fetchAll();
                  $moviecount1 = $moviecount[0][0];
                  echo "$moviecount1";
            ?>
            <?php if(0 == $moviecount1) {?>
            <div class="soldout">
              売り切れ
            </div>
            <?php } else if(30 >= $moviecount1) {?>
                <div class="remaining">
                残りわずか
                </div>
              <?php } else { ?>
                  <div class="available">
                    購入
                  </div>
                <?php } ?>
          </a>
        </li>
      </ul>
    <?php } ?>
  <?php } ?>

  <?php endforeach; ?>
  <?php unset($_SESSION['day2_p']); ?>
  <?php unset($selected_days2); ?>

<?php } ?>




<!-- 3日目の映画スケジュール -->
<?php if($day3_p == 1){ ?>

<?php 
$day1 = date("m-d");
$sql = ("SELECT * FROM t_movie_info where 1"); 
$stmt = $dbh->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h3>
<time><?php echo date("Y/m/d". $week3 ."", $Day3) . "\n"; ?></time>
</h3>

<?php foreach ($result as $item): ?>
<?php if(empty($item['f_movie_name'])) { } else {?>
<?php 
  $sql = ("SELECT * FROM t_screen1 where f_movie_name = '". $item['f_movie_name'] ."' and f_time_day = '". $Day_sql3 ."'"); 
  $res = $dbh->prepare($sql);
  $res->execute();
  $movie_name = $res->fetchAll();
  $movie_name1 = $movie_name[0][1];
  // print_r($movie_name);





  ?>
<?php if($movie_name1 == $item['f_movie_name']) { ?>
  <div class="movie-info">
      <h4>　<?php echo $item['f_movie_name']; ?>
        <a href="jouhou.php" class="info-button">映画情報へ</a>　　
      </h4>
        </div>
      <ul class="timetable">
        <div>
          <li class="theatre" >
            <a href="#" class="siata" >
              <?php echo "スクリーン1"?>
            </a>
            <br>
            <small>120分</small>
          </li>
        </div>

        <li>
        <?php
            
              $movieIDname = $item['f_movie_name'] ;
              $movieIDtime = "10:00";
              
        ?> 

            <a href="screen1.php?movieID=<?php echo $movieIDname;?>&movietime=<?php echo $movieIDtime;?>&movieday=<?php echo 3;?>" action="screen1.php" method="POST">
            
            <time class="start">10:00</time>
            ～
            <time class="end">12:00</time>
            <?php 
                $sql = ("SELECT 
                (CASE WHEN A1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J20 = 0 THEN 1 ELSE 0 END) 
                AS zero_count
                  FROM t_screen1 where f_movie_name = '". $item['f_movie_name'] ."' and f_time_day = '". $Day_sql3 ."' and f_time_start = '10:00'
                  ");
                  $res = $dbh->prepare($sql);
                  $res->execute();
                  $moviecount = $res->fetchAll();
                  $moviecount1 = $moviecount[0][0];
                  echo "$moviecount1";
            ?>
            <?php if(0 == $moviecount1) {?>
            <div class="soldout">
              売り切れ
            </div>
            <?php } else if(30 >= $moviecount1) {?>
                <div class="remaining">
                残りわずか
                </div>
              <?php } else { ?>
                  <div class="available">
                    購入
                  </div>
                <?php } ?>
          </a>
      </form>
        </li>


        <li>
        <?php
            
              $movieIDname = $item['f_movie_name'] ;
              $movieIDtime = "13:00";
        ?> 

            <a href="screen1.php?movieID=<?php echo $movieIDname;?>&movietime=<?php echo $movieIDtime;?>&movieday=<?php echo 3;?>" action="screen1.php" method="POST">

            <time class="start">13:00</time>
            ～
            <time class="end">15:00</time>

            <?php 
                $sql = ("SELECT 
                (CASE WHEN A1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J20 = 0 THEN 1 ELSE 0 END) 
                AS zero_count
                  FROM t_screen1 where f_movie_name = '". $item['f_movie_name'] ."' and f_time_day = '". $Day_sql3 ."' and f_time_start = '13:00'
                  ");
                  $res = $dbh->prepare($sql);
                  $res->execute();
                  $moviecount = $res->fetchAll();
                  $moviecount1 = $moviecount[0][0];
                  echo "$moviecount1";
            ?>
            <?php if(0 == $moviecount1) {?>
            <div class="soldout">
              売り切れ
            </div>
            <?php } else if(30 >= $moviecount1) {?>
                <div class="remaining">
                残りわずか
                </div>
              <?php } else { ?>
                  <div class="available">
                    購入
                  </div>
                <?php } ?>
          </a>
        </li>

        <li>
        <?php
            
              $movieIDname = $item['f_movie_name'] ;
              $movieIDtime = "16:00";
        ?> 

            <a href="screen1.php?movieID=<?php echo $movieIDname;?>&movietime=<?php echo $movieIDtime;?>&movieday=<?php echo 3;?>" action="screen1.php" method="POST">
            <time class="start">16:00</time>
            ～
            <time class="end">18:00</time>

            <?php 
                $sql = ("SELECT 
                (CASE WHEN A1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J20 = 0 THEN 1 ELSE 0 END) 
                AS zero_count
                  FROM t_screen1 where f_movie_name = '". $item['f_movie_name'] ."' and f_time_day = '". $Day_sql3 ."' and f_time_start = '16:00'
                  ");
                  $res = $dbh->prepare($sql);
                  $res->execute();
                  $moviecount = $res->fetchAll();
                  $moviecount1 = $moviecount[0][0];
                  echo "$moviecount1";
            ?>
            <?php if(0 == $moviecount1) {?>
            <div class="soldout">
              売り切れ
            </div>
            <?php } else if(30 >= $moviecount1) {?>
                <div class="remaining">
                残りわずか
                </div>
              <?php } else { ?>
                  <div class="available">
                    購入
                  </div>
                <?php } ?>
          </a>
        </li>

        <li>
        <?php
            
              $movieIDname = $item['f_movie_name'] ;
              $movieIDtime = "19:00";
        ?> 

            <a href="screen1.php?movieID=<?php echo $movieIDname;?>&movietime=<?php echo $movieIDtime;?>&movieday=<?php echo 3;?>" action="screen1.php" method="POST">
            <time class="start">19:00</time>
            ～
            <time class="end">21:00</time>

            <?php 
                $sql = ("SELECT 
                (CASE WHEN A1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J20 = 0 THEN 1 ELSE 0 END) 
                AS zero_count
                  FROM t_screen1 where f_movie_name = '". $item['f_movie_name'] ."' and f_time_day = '". $Day_sql3 ."' and f_time_start = '19:00'
                  ");
                  $res = $dbh->prepare($sql);
                  $res->execute();
                  $moviecount = $res->fetchAll();
                  $moviecount1 = $moviecount[0][0];
                  echo "$moviecount1";
            ?>
            <?php if(0 == $moviecount1) {?>
            <div class="soldout">
              売り切れ
            </div>
            <?php } else if(30 >= $moviecount1) {?>
                <div class="remaining">
                残りわずか
                </div>
              <?php } else { ?>
                  <div class="available">
                    購入
                  </div>
                <?php } ?>
          </a>
        </li>
      </ul>
    <?php } ?>
  <?php } ?>

  <?php endforeach; ?>
  <?php unset($_SESSION['day3_p']); ?>
  <?php unset($selected_days3); ?>

<?php } ?>




<!-- 4日目の映画スケジュール -->
<?php if($day4_p == 1){ ?>

<?php 
$day1 = date("m-d");
$sql = ("SELECT * FROM t_movie_info where 1"); 
$stmt = $dbh->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h3>
<time><?php echo date("Y/m/d". $week4 ."", $Day4) . "\n"; ?></time>
</h3>

<?php foreach ($result as $item): ?>
<?php if(empty($item['f_movie_name'])) { } else {?>
<?php 
  $sql = ("SELECT * FROM t_screen1 where f_movie_name = '". $item['f_movie_name'] ."' and f_time_day = '". $Day_sql4 ."'"); 
  $res = $dbh->prepare($sql);
  $res->execute();
  $movie_name = $res->fetchAll();
  $movie_name1 = $movie_name[0][1];
  // print_r($movie_name);





  ?>
<?php if($movie_name1 == $item['f_movie_name']) { ?>
  <div class="movie-info">
      <h4>　<?php echo $item['f_movie_name']; ?>
        <a href="jouhou.php" class="info-button">映画情報へ</a>　　
      </h4>
        </div>
      <ul class="timetable">
        <div>
          <li class="theatre" >
            <a href="#" class="siata" >
              <?php echo "スクリーン1"?>
            </a>
            <br>
            <small>120分</small>
          </li>
        </div>

        <li>
        <?php
            
              $movieIDname = $item['f_movie_name'] ;
              $movieIDtime = "10:00";
              
        ?> 

            <a href="screen1.php?movieID=<?php echo $movieIDname;?>&movietime=<?php echo $movieIDtime;?>&movieday=<?php echo 4;?>" action="screen1.php" method="POST">
            
            <time class="start">10:00</time>
            ～
            <time class="end">12:00</time>
            <?php 
                $sql = ("SELECT 
                (CASE WHEN A1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J20 = 0 THEN 1 ELSE 0 END) 
                AS zero_count
                  FROM t_screen1 where f_movie_name = '". $item['f_movie_name'] ."' and f_time_day = '". $Day_sql4 ."' and f_time_start = '10:00'
                  ");
                  $res = $dbh->prepare($sql);
                  $res->execute();
                  $moviecount = $res->fetchAll();
                  $moviecount1 = $moviecount[0][0];
                  echo "$moviecount1";
            ?>
            <?php if(0 == $moviecount1) {?>
            <div class="soldout">
              売り切れ
            </div>
            <?php } else if(30 >= $moviecount1) {?>
                <div class="remaining">
                残りわずか
                </div>
              <?php } else { ?>
                  <div class="available">
                    購入
                  </div>
                <?php } ?>
          </a>
      </form>
        </li>


        <li>
        <?php
            
              $movieIDname = $item['f_movie_name'] ;
              $movieIDtime = "13:00";
        ?> 

            <a href="screen1.php?movieID=<?php echo $movieIDname;?>&movietime=<?php echo $movieIDtime;?>&movieday=<?php echo 4;?>" action="screen1.php" method="POST">

            <time class="start">13:00</time>
            ～
            <time class="end">15:00</time>

            <?php 
                $sql = ("SELECT 
                (CASE WHEN A1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J20 = 0 THEN 1 ELSE 0 END) 
                AS zero_count
                  FROM t_screen1 where f_movie_name = '". $item['f_movie_name'] ."' and f_time_day = '". $Day_sql4 ."' and f_time_start = '13:00'
                  ");
                  $res = $dbh->prepare($sql);
                  $res->execute();
                  $moviecount = $res->fetchAll();
                  $moviecount1 = $moviecount[0][0];
                  echo "$moviecount1";
            ?>
            <?php if(0 == $moviecount1) {?>
            <div class="soldout">
              売り切れ
            </div>
            <?php } else if(30 >= $moviecount1) {?>
                <div class="remaining">
                残りわずか
                </div>
              <?php } else { ?>
                  <div class="available">
                    購入
                  </div>
                <?php } ?>
          </a>
        </li>

        <li>
        <?php
            
              $movieIDname = $item['f_movie_name'] ;
              $movieIDtime = "16:00";
        ?> 

            <a href="screen1.php?movieID=<?php echo $movieIDname;?>&movietime=<?php echo $movieIDtime;?>&movieday=<?php echo 4;?>" action="screen1.php" method="POST">
            <time class="start">16:00</time>
            ～
            <time class="end">18:00</time>

            <?php 
                $sql = ("SELECT 
                (CASE WHEN A1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J20 = 0 THEN 1 ELSE 0 END) 
                AS zero_count
                  FROM t_screen1 where f_movie_name = '". $item['f_movie_name'] ."' and f_time_day = '". $Day_sql4 ."' and f_time_start = '16:00'
                  ");
                  $res = $dbh->prepare($sql);
                  $res->execute();
                  $moviecount = $res->fetchAll();
                  $moviecount1 = $moviecount[0][0];
                  echo "$moviecount1";
            ?>
            <?php if(0 == $moviecount1) {?>
            <div class="soldout">
              売り切れ
            </div>
            <?php } else if(30 >= $moviecount1) {?>
                <div class="remaining">
                残りわずか
                </div>
              <?php } else { ?>
                  <div class="available">
                    購入
                  </div>
                <?php } ?>
          </a>
        </li>

        <li>
        <?php
            
              $movieIDname = $item['f_movie_name'] ;
              $movieIDtime = "19:00";
        ?> 

            <a href="screen1.php?movieID=<?php echo $movieIDname;?>&movietime=<?php echo $movieIDtime;?>&movieday=<?php echo 4;?>" action="screen1.php" method="POST">
            <time class="start">19:00</time>
            ～
            <time class="end">21:00</time>

            <?php 
                $sql = ("SELECT 
                (CASE WHEN A1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J20 = 0 THEN 1 ELSE 0 END) 
                AS zero_count
                  FROM t_screen1 where f_movie_name = '". $item['f_movie_name'] ."' and f_time_day = '". $Day_sql4 ."' and f_time_start = '19:00'
                  ");
                  $res = $dbh->prepare($sql);
                  $res->execute();
                  $moviecount = $res->fetchAll();
                  $moviecount1 = $moviecount[0][0];
                  echo "$moviecount1";
            ?>
            <?php if(0 == $moviecount1) {?>
            <div class="soldout">
              売り切れ
            </div>
            <?php } else if(30 >= $moviecount1) {?>
                <div class="remaining">
                残りわずか
                </div>
              <?php } else { ?>
                  <div class="available">
                    購入
                  </div>
                <?php } ?>
          </a>
        </li>
      </ul>
    <?php } ?>
  <?php } ?>

  <?php endforeach; ?>
  <?php unset($_SESSION['day4_p']); ?>
  <?php unset($selected_days4); ?>

<?php } ?>




<!-- 5日目の映画スケジュール -->
<?php if($day5_p == 1){ ?>

<?php 
$day1 = date("m-d");
$sql = ("SELECT * FROM t_movie_info where 1"); 
$stmt = $dbh->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h3>
<time><?php echo date("Y/m/d". $week5 ."", $Day5) . "\n"; ?></time>
</h3>

<?php foreach ($result as $item): ?>
<?php if(empty($item['f_movie_name'])) { } else {?>
<?php 
  $sql = ("SELECT * FROM t_screen1 where f_movie_name = '". $item['f_movie_name'] ."' and f_time_day = '". $Day_sql5 ."'"); 
  $res = $dbh->prepare($sql);
  $res->execute();
  $movie_name = $res->fetchAll();
  $movie_name1 = $movie_name[0][1];
  // print_r($movie_name);





  ?>
<?php if($movie_name1 == $item['f_movie_name']) { ?>
  <div class="movie-info">
      <h4>　<?php echo $item['f_movie_name']; ?>
        <a href="jouhou.php" class="info-button">映画情報へ</a>　　
      </h4>
        </div>
      <ul class="timetable">
        <div>
          <li class="theatre" >
            <a href="#" class="siata" >
              <?php echo "スクリーン1"?>
            </a>
            <br>
            <small>120分</small>
          </li>
        </div>

        <li>
        <?php
            
              $movieIDname = $item['f_movie_name'] ;
              $movieIDtime = "10:00";
              
        ?> 

            <a href="screen1.php?movieID=<?php echo $movieIDname;?>&movietime=<?php echo $movieIDtime;?>&movieday=<?php echo 5;?>" action="screen1.php" method="POST">
            
            <time class="start">10:00</time>
            ～
            <time class="end">12:00</time>
            <?php 
                $sql = ("SELECT 
                (CASE WHEN A1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J20 = 0 THEN 1 ELSE 0 END) 
                AS zero_count
                  FROM t_screen1 where f_movie_name = '". $item['f_movie_name'] ."' and f_time_day = '". $Day_sql5 ."' and f_time_start = '10:00'
                  ");
                  $res = $dbh->prepare($sql);
                  $res->execute();
                  $moviecount = $res->fetchAll();
                  $moviecount1 = $moviecount[0][0];
                  echo "$moviecount1";
            ?>
            <?php if(0 == $moviecount1) {?>
            <div class="soldout">
              売り切れ
            </div>
            <?php } else if(30 >= $moviecount1) {?>
                <div class="remaining">
                残りわずか
                </div>
              <?php } else { ?>
                  <div class="available">
                    購入
                  </div>
                <?php } ?>
          </a>
      </form>
        </li>


        <li>
        <?php
            
              $movieIDname = $item['f_movie_name'] ;
              $movieIDtime = "13:00";
        ?> 

            <a href="screen1.php?movieID=<?php echo $movieIDname;?>&movietime=<?php echo $movieIDtime;?>&movieday=<?php echo 5;?>" action="screen1.php" method="POST">

            <time class="start">13:00</time>
            ～
            <time class="end">15:00</time>

            <?php 
                $sql = ("SELECT 
                (CASE WHEN A1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J20 = 0 THEN 1 ELSE 0 END) 
                AS zero_count
                  FROM t_screen1 where f_movie_name = '". $item['f_movie_name'] ."' and f_time_day = '". $Day_sql5 ."' and f_time_start = '13:00'
                  ");
                  $res = $dbh->prepare($sql);
                  $res->execute();
                  $moviecount = $res->fetchAll();
                  $moviecount1 = $moviecount[0][0];
                  echo "$moviecount1";
            ?>
            <?php if(0 == $moviecount1) {?>
            <div class="soldout">
              売り切れ
            </div>
            <?php } else if(30 >= $moviecount1) {?>
                <div class="remaining">
                残りわずか
                </div>
              <?php } else { ?>
                  <div class="available">
                    購入
                  </div>
                <?php } ?>
          </a>
        </li>

        <li>
        <?php
            
              $movieIDname = $item['f_movie_name'] ;
              $movieIDtime = "16:00";
        ?> 

            <a href="screen1.php?movieID=<?php echo $movieIDname;?>&movietime=<?php echo $movieIDtime;?>&movieday=<?php echo 5;?>" action="screen1.php" method="POST">
            <time class="start">16:00</time>
            ～
            <time class="end">18:00</time>

            <?php 
                $sql = ("SELECT 
                (CASE WHEN A1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J20 = 0 THEN 1 ELSE 0 END) 
                AS zero_count
                  FROM t_screen1 where f_movie_name = '". $item['f_movie_name'] ."' and f_time_day = '". $Day_sql5 ."' and f_time_start = '16:00'
                  ");
                  $res = $dbh->prepare($sql);
                  $res->execute();
                  $moviecount = $res->fetchAll();
                  $moviecount1 = $moviecount[0][0];
                  echo "$moviecount1";
            ?>
            <?php if(0 == $moviecount1) {?>
            <div class="soldout">
              売り切れ
            </div>
            <?php } else if(30 >= $moviecount1) {?>
                <div class="remaining">
                残りわずか
                </div>
              <?php } else { ?>
                  <div class="available">
                    購入
                  </div>
                <?php } ?>
          </a>
        </li>

        <li>
        <?php
            
              $movieIDname = $item['f_movie_name'] ;
              $movieIDtime = "19:00";
        ?> 

            <a href="screen1.php?movieID=<?php echo $movieIDname;?>&movietime=<?php echo $movieIDtime;?>&movieday=<?php echo 5;?>" action="screen1.php" method="POST">
            <time class="start">19:00</time>
            ～
            <time class="end">21:00</time>

            <?php 
                $sql = ("SELECT 
                (CASE WHEN A1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN A20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN B20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN C20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN D20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN E20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN F20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN G20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN H20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN I20 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J1 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J2 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J3 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J4 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J5 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J6 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J7 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J8 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J9 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J10 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J11 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J12 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J13 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J14 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J15 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J16 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J17 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J18 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J19 = 0 THEN 1 ELSE 0 END) +
                (CASE WHEN J20 = 0 THEN 1 ELSE 0 END) 
                AS zero_count
                  FROM t_screen1 where f_movie_name = '". $item['f_movie_name'] ."' and f_time_day = '". $Day_sql5 ."' and f_time_start = '19:00'
                  ");
                  $res = $dbh->prepare($sql);
                  $res->execute();
                  $moviecount = $res->fetchAll();
                  $moviecount1 = $moviecount[0][0];
                  echo "$moviecount1";
            ?>
            <?php if(0 == $moviecount1) {?>
            <div class="soldout">
              売り切れ
            </div>
            <?php } else if(30 >= $moviecount1) {?>
                <div class="remaining">
                残りわずか
                </div>
              <?php } else { ?>
                  <div class="available">
                    購入
                  </div>
                <?php } ?>
          </a>
        </li>
      </ul>
    <?php } ?>
  <?php } ?>

  <?php endforeach; ?>
  <?php unset($_SESSION['day5_p']); ?>
  <?php unset($selected_days5); ?>

<?php } ?>




      </div>
    </div>
  </div>


    <footer>
      <p>2023 © Copyright.</p>
    </footer>
<script src="js/sisetu.js" type="text/javascript"></script>

  </body>
</html>

<?php 



?>
