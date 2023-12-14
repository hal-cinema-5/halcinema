<?php
require('db/dbpdo.php');

session_start();
$name = $_SESSION['name'] ;
$movie_name = $_SESSION['movieID'];
$movie_time = $_SESSION['movietime'];
$movie_day = $_SESSION['movieday'];

$given = date('Y-m-d');
// $_SESSION['movieID'] = $movie_id;



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
echo date("Y/m/d". $week1 ."") . "\n";


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

if($movie_day == 1){
  echo date("Y/m/d". $week1 ."") . "\n"; 
  $f_time_day = date("Y/m/d");
  $f_time_day1 = date("m-d");
} else if($movie_day == 2){
  echo date("m/d". $week2 ."", $Day2) . "\n";
  $f_time_day = date("Y/m/d", $Day2);
  $f_time_day1 = date("m-d", $Day2);
  } else if($movie_day == 3){
    echo date("m/d". $week3 ."", $Day3) . "\n";
    $f_time_day = date("Y/m/d", $Day3);
    $f_time_day1 = date("m-d", $Day3);
    } else if($movie_day == 4){
      echo date("m/d". $week4 ."", $Day4) . "\n";
      $f_time_day = date("Y/m/d", $Day4);
      $f_time_day1 = date("m-d", $Day4);
      } else if($movie_day == 5){
        echo date("m/d". $week5 ."", $Day5) . "\n";
        $f_time_day = date("Y/m/d", $Day5);
        $f_time_day1 = date("m-d", $Day5);
        }



if (isset($_POST['seki'])) {
    $chair = $_POST['seki'];

    print "<p>選択した席:</p>";
    print "<ul>";
    foreach ($chair as $item) {
      print "<li>" . htmlspecialchars($item) . "</li>";
    }
    print "</ul>";
  } else {
    print "<h1>席未選択</h1>";
  }


  if( empty($chair[0]) ){  
    echo '座席が選択されていません';  
    }elseif(empty($chair[1])){
      //予約番号
      $yoyaku = rand(1000,9999);
      //座席が1つ選択
        $one = $chair[0];
        $sql = ("INSERT INTO `t_reservation`(`f_rese_number`, `f_rese_moviename`, `f_rese_date`, `f_rese_time`, `f_rese_screen`, `f_rese_seat1`) VALUES ('" . $yoyaku . "','$movie_name','$f_time_day','$movie_time','1','" . $one . "')"); //SQL文
        $res = $dbh->prepare($sql);
        $res->execute();
      //予約番号をユーザーに追加
        $sql = ("UPDATE `t_user` SET `f_user_reseid`='" . $yoyaku . "' WHERE f_user_name = '" . $name . "'"); //SQL文
        $res = $dbh->prepare($sql);
        $res->execute();
      //座席を予約済みに変更
      $sql = (" UPDATE `t_screen1` SET `" . $one . "`='1' where f_movie_name = '". $movie_name ."' and f_time_day = '". $f_time_day1 ."' and f_time_start = '". $movie_time ."' "); //SQL文
      $res = $dbh->prepare($sql);
      $res->execute();
      

      
    }elseif(empty($chair[2])){
      //予約番号
      $yoyaku = rand(1000,9999);

      //座席が2つ選択
        $one = $chair[0];
        $two = $chair[1];
        $sql = ("INSERT INTO `t_reservation`( `f_rese_number`, `f_rese_moviename`, `f_rese_date`, `f_rese_time`, `f_rese_screen`, `f_rese_seat1`, `f_rese_seat2`) VALUES ('" . $yoyaku . "','$movie_name','$f_time_day','$movie_time','1','" . $one . "','" . $two . "')"); //SQL文
        $res = $dbh->prepare($sql);
        $res->execute();

        $sql = ("UPDATE `t_user` SET `f_user_reseid`='" . $yoyaku . "' WHERE f_user_name = '" . $name . "'"); //SQL文
        $res = $dbh->prepare($sql);
        $res->execute();
        //座席を予約済みに変更
        $sql = (" UPDATE `t_screen1` SET `" . $one . "`='1' , `" . $two . "`='1'  where f_movie_name = '". $movie_name ."' and f_time_day = '". $f_time_day1 ."' and f_time_start = '". $movie_time ."'"); //SQL文
        $res = $dbh->prepare($sql);
        $res->execute();
    }else{
      //予約番号
      $yoyaku = rand(1000,9999);

      //座席3つ選択
        $one = $chair[0];
        $two = $chair[1];
        $three = $chair[2];
        $sql = ("INSERT INTO `t_reservation`(`f_rese_number`, `f_rese_moviename`, `f_rese_date`, `f_rese_time`, `f_rese_screen`, `f_rese_seat1`, `f_rese_seat2`, `f_rese_seat3`) VALUES ('" . $yoyaku . "','$movie_name','$f_time_day','$movie_time','1','" . $one . "','" . $two . "','" . $three . "')"); //SQL文
        $res = $dbh->prepare($sql);
        $res->execute();

        $sql = ("UPDATE `t_user` SET `f_user_reseid`='" . $yoyaku . "' WHERE f_user_name = '" . $name . "'"); //SQL文
        $res = $dbh->prepare($sql);
        $res->execute();
        //座席を予約済みに変更
        $sql = (" UPDATE `t_screen1` SET `" . $one . "`='1' , `" . $two . "`='1' , `" . $three . "`='1'  where f_movie_name = '". $movie_name ."' and f_time_day = '". $f_time_day1 ."' and f_time_start = '". $movie_time ."' "); //SQL文
        $res = $dbh->prepare($sql);
        $res->execute();
    }

    unset($_SESSION['movieID']);
    unset($_SESSION['movietime']);
    unset($_SESSION['movieday']);

    echo '<script>
        setTimeout(function() {
          window.location.href = "index.php";
        }, 1000); // 3000ミリ秒 = 3秒
      </script>';

  ?>
  <script>alert("予約が完了しました。")</script>
  

