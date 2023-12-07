<?php
session_start();


if($_SESSION['movieID']){
  $movie_name = $_SESSION['movieID'];
  $movie_time = $_SESSION['movietime'];
  $movie_day = $_SESSION['movieday'];
} else {
  $movie_name = $_GET['movieID'];
  $movie_time = $_GET['movietime'];
  $movie_day = $_GET['movieday'];
}

$_SESSION['movieID'] = $movie_name;
$_SESSION['movietime'] = $movie_time;
$_SESSION['movieday'] = $movie_day;




print($movie_name);
print($movie_time);
print($movie_day);
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
?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>映画館施設案内</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/kounyu.css">
<link rel="stylesheet" type="text/css" href="css/kounyu.css">
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
      <h2 id="facility-info">座席選択</h2>

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
              <td><?php echo "$movie_name" ?></td>
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
              <td>
                <?php if($movie_day == 1){
                          echo date("Y/m/d". $week1 ."") . "\n"; 
                          $f_time_day = date("m-d");
                        } else if($movie_day == 2){
                          echo date("m/d". $week2 ."", $Day2) . "\n";
                          $f_time_day = date("m-d", $Day2);
                          } else if($movie_day == 3){
                            echo date("m/d". $week3 ."", $Day3) . "\n";
                            $f_time_day = date("m-d", $Day3);
                            } else if($movie_day == 4){
                              echo date("m/d". $week4 ."", $Day4) . "\n";
                              $f_time_day = date("m-d", $Day4);
                              } else if($movie_day == 5){
                                echo date("m/d". $week5 ."", $Day5) . "\n";
                                $f_time_day = date("m-d", $Day5);
                                }
                ?>
              </td>
            </tr>
            <tr>
              <th>
                <div>時間</div>
              </th>
              <td><?php 
                  if($movie_time == "10:00"){
                    echo "10時00分-12時00分";
                  } else if($movie_time == "13:00"){
                      echo "13時00分-15時00分";
                    } else if($movie_time == "16:00"){
                        echo "16時00分-19時00分";
                      }else if($movie_time == "19:00"){
                          echo "19時00分-21時00分";
                        }
              ?></td>
            </tr>
            <!-- <tr>
              <th>
                <div>枚数</div>
              </th>
              <td></td>
            </tr> -->
          </tbody>
        </table>
      </div>

      <div id="seat-selection">
        <h3 class="scrn">-スクリーン-</h3>
        <br>
        <form action="karitouroku1.php" method="post">
          <ul class="seat-list">
            <li class="aokikuso">
              <div class="example2">

              <?php
                require('db/dbpdo.php');
                $sql = ("select * from t_screen1 where f_movie_name = '". $movie_name ."' and f_time_day = '". $f_time_day ."' and f_time_start = '". $movie_time ."'"); //SQL文
                $res = $dbh->prepare($sql);
                $res->execute();
                $data = $res->fetchAll();
                // print_r($data);

                if($data[0][2] == 0){ ?>
                  <input type="checkbox" id="A1" value="A1" name="seki[]"><label for="A1"><p> 1 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A1" name="seki[]"><label id="ng" for="A1"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][3] == 0){ ?>
                  <input type="checkbox" id="A2" value="A2" name="seki[]"><label for="A2"><p> 2 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A2" name="seki[]"><label id="ng" for="A2"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][4] == 0){ ?>
                  <input type="checkbox" id="A3" value="A3" name="seki[]"><label for="A3"><p> 3 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A3" name="seki[]"><label id="ng" for="A3"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][5] == 0){ ?>
                  <input type="checkbox" id="A4" value="A4" name="seki[]"><label for="A4"><p> 4 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A4" name="seki[]"><label id="ng" for="A4"><p>X</p></label>
               <?php  }
              ?>
                <p class="aoki">Ⓐ</p>
                <?php
                if($data[0][6] == 0){ ?>
                  <input type="checkbox" id="A5" value="A5" name="seki[]"><label for="A5"><p> 5 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A5" name="seki[]"><label id="ng" for="A5"><p>X</p></label>
               <?php  }
              ?>    
               <?php
                if($data[0][7] == 0){ ?>
                  <input type="checkbox" id="A6" value="A6" name="seki[]"><label for="A6"><p> 6 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A6" name="seki[]"><label id="ng" for="A6"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][8] == 0){ ?>
                  <input type="checkbox" id="A7" value="A7" name="seki[]"><label for="A7"><p> 7 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A7" name="seki[]"><label id="ng" for="A7"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][9] == 0){ ?>
                  <input type="checkbox" id="A8" value="A8" name="seki[]"><label for="A8"><p> 8 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A8" name="seki[]"><label id="ng" for="A8"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][10] == 0){ ?>
                  <input type="checkbox" id="A9" value="A9" name="seki[]"><label for="A9"><p> 9 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A9" name="seki[]"><label id="ng" for="A9"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][11] == 0){ ?>
                  <input type="checkbox" id="A10" value="A10" name="seki[]"><label for="A10"><p> 10 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A10" name="seki[]"><label id="ng" for="A10"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][12] == 0){ ?>
                  <input type="checkbox" id="A11" value="A11" name="seki[]"><label for="A11"><p> 11 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A11" name="seki[]"><label id="ng" for="A11"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][13] == 0){ ?>
                  <input type="checkbox" id="A12" value="A12" name="seki[]"><label for="A12"><p> 12 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A12" name="seki[]"><label id="ng" for="A12"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][14] == 0){ ?>
                  <input type="checkbox" id="A13" value="A13" name="seki[]"><label for="A13"><p> 13 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A13" name="seki[]"><label id="ng" for="A13"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][15] == 0){ ?>
                  <input type="checkbox" id="A14" value="A14" name="seki[]"><label for="A14"><p> 14 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A14" name="seki[]"><label id="ng" for="A14"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][16] == 0){ ?>
                  <input type="checkbox" id="A15" value="A15" name="seki[]"><label for="A15"><p> 15 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A15" name="seki[]"><label id="ng" for="A15"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][17] == 0){ ?>
                  <input type="checkbox" id="A16" value="A16" name="seki[]"><label for="A16"><p> 16 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A16" name="seki[]"><label id="ng" for="A16"><p>X</p></label>
               <?php  }
              ?> 
                <p class="aoki">Ⓐ</p>
                
                <?php
                if($data[0][18] == 0){ ?>
                  <input type="checkbox" id="A17" value="A17" name="seki[]"><label for="A17"><p> 17 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A17" name="seki[]"><label id="ng" for="A17"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][19] == 0){ ?>
                  <input type="checkbox" id="A18" value="A18" name="seki[]"><label for="A18"><p> 18 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A18" name="seki[]"><label id="ng" for="A18"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][20] == 0){ ?>
                  <input type="checkbox" id="A19" value="A19" name="seki[]"><label for="A19"><p> 19 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A19" name="seki[]"><label id="ng" for="A19"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][21] == 0){ ?>
                  <input type="checkbox" id="A20" value="A20" name="seki[]"><label for="A20"><p> 20 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A20" name="seki[]"><label id="ng" for="A20"><p>X</p></label>
               <?php  }
              ?> 
            </div>
            </li>

            <li class="aokikuso">
              <div class="example2">
              <?php

                if($data[0][22] == 0){ ?>
                  <input type="checkbox" id="B1" value="B1" name="seki[]"><label for="B1"><p> 1 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="B1" name="seki[]"><label id="ng" for="B1"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][23] == 0){ ?>
                  <input type="checkbox" id="B2" value="B2" name="seki[]"><label for="B2"><p> 2 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="B2" name="seki[]"><label id="ng" for="B2"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][24] == 0){ ?>
                  <input type="checkbox" id="B3" value="B3" name="seki[]"><label for="B3"><p> 3 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="B3" name="seki[]"><label id="ng" for="B3"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][25] == 0){ ?>
                  <input type="checkbox" id="B4" value="B4" name="seki[]"><label for="B4"><p> 4 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="B4" name="seki[]"><label id="ng" for="B4"><p>X</p></label>
               <?php  }
              ?>
                <p class="aoki">Ⓑ</p>
                <?php
                if($data[0][26] == 0){ ?>
                  <input type="checkbox" id="B5" value="B5" name="seki[]"><label for="B5"><p> 5 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="B5" name="seki[]"><label id="ng" for="B5"><p>X</p></label>
               <?php  }
              ?>    
               <?php
                if($data[0][27] == 0){ ?>
                  <input type="checkbox" id="B6" value="B6" name="seki[]"><label for="B6"><p> 6 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="B6" name="seki[]"><label id="ng" for="B6"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][28] == 0){ ?>
                  <input type="checkbox" id="B7" value="B7" name="seki[]"><label for="B7"><p> 7 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="B7" name="seki[]"><label id="ng" for="B7"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][29] == 0){ ?>
                  <input type="checkbox" id="B8" value="B8" name="seki[]"><label for="B8"><p> 8 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A8" name="seki[]"><label id="ng" for="B8"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][30] == 0){ ?>
                  <input type="checkbox" id="B9" value="B9" name="seki[]"><label for="B9"><p> 9 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="B9" name="seki[]"><label id="ng" for="B9"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][31] == 0){ ?>
                  <input type="checkbox" id="B10" value="B10" name="seki[]"><label for="B10"><p> 10 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="B10" name="seki[]"><label id="ng" for="B10"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][32] == 0){ ?>
                  <input type="checkbox" id="B11" value="B11" name="seki[]"><label for="B11"><p> 11 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="B11" name="seki[]"><label id="ng" for="B11"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][33] == 0){ ?>
                  <input type="checkbox" id="B12" value="B12" name="seki[]"><label for="B12"><p> 12 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="B12" name="seki[]"><label id="ng" for="B12"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][34] == 0){ ?>
                  <input type="checkbox" id="B13" value="B13" name="seki[]"><label for="B13"><p> 13 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="B13" name="seki[]"><label id="ng" for="B13"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][35] == 0){ ?>
                  <input type="checkbox" id="B14" value="B14" name="seki[]"><label for="B14"><p> 14 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="B14" name="seki[]"><label id="ng" for="B14"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][36] == 0){ ?>
                  <input type="checkbox" id="B15" value="B15" name="seki[]"><label for="B15"><p> 15 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="B15" name="seki[]"><label id="ng" for="B15"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][37] == 0){ ?>
                  <input type="checkbox" id="B16" value="B16" name="seki[]"><label for="B16"><p> 16 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="B16" name="seki[]"><label id="ng" for="B16"><p>X</p></label>
               <?php  }
              ?> 
                <p class="aoki">Ⓑ</p>
                
                <?php
                if($data[0][38] == 0){ ?>
                  <input type="checkbox" id="B17" value="B17" name="seki[]"><label for="B17"><p> 17 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="B17" name="seki[]"><label id="ng" for="B17"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][39] == 0){ ?>
                  <input type="checkbox" id="B18" value="B18" name="seki[]"><label for="B18"><p> 18 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="B18" name="seki[]"><label id="ng" for="B18"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][40] == 0){ ?>
                  <input type="checkbox" id="B19" value="B19" name="seki[]"><label for="B19"><p> 19 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="B19" name="seki[]"><label id="ng" for="B19"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][41] == 0){ ?>
                  <input type="checkbox" id="B20" value="B20" name="seki[]"><label for="B20"><p> 20 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="B20" name="seki[]"><label id="ng" for="B20"><p>X</p></label>
               <?php  }
              ?> 
            </div>
            </li>
            <li class="aokikuso">
              <div class="example2">
              <?php

                if($data[0][42] == 0){ ?>
                  <input type="checkbox" id="C1" value="C1" name="seki[]"><label for="C1"><p> 1 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="C1" name="seki[]"><label id="ng" for="C1"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][43] == 0){ ?>
                  <input type="checkbox" id="C2" value="C2" name="seki[]"><label for="C2"><p> 2 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="C2" name="seki[]"><label id="ng" for="C2"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][44] == 0){ ?>
                  <input type="checkbox" id="C3" value="C3" name="seki[]"><label for="C3"><p> 3 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="C3" name="seki[]"><label id="ng" for="C3"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][45] == 0){ ?>
                  <input type="checkbox" id="C4" value="C4" name="seki[]"><label for="C4"><p> 4 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="C4" name="seki[]"><label id="ng" for="C4"><p>X</p></label>
               <?php  }
              ?>
                <p class="aoki">Ⓒ</p>
                <?php
                if($data[0][46] == 0){ ?>
                  <input type="checkbox" id="C5" value="C5" name="seki[]"><label for="C5"><p> 5 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="C5" name="seki[]"><label id="ng" for="C5"><p>X</p></label>
               <?php  }
              ?>    
               <?php
                if($data[0][47] == 0){ ?>
                  <input type="checkbox" id="C6" value="C6" name="seki[]"><label for="C6"><p> 6 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="C6" name="seki[]"><label id="ng" for="C6"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][48] == 0){ ?>
                  <input type="checkbox" id="C7" value="C7" name="seki[]"><label for="C7"><p> 7 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="C7" name="seki[]"><label id="ng" for="C7"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][49] == 0){ ?>
                  <input type="checkbox" id="C8" value="C8" name="seki[]"><label for="C8"><p> 8 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A8" name="seki[]"><label id="ng" for="C8"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][50] == 0){ ?>
                  <input type="checkbox" id="C9" value="C9" name="seki[]"><label for="C9"><p> 9 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="C9" name="seki[]"><label id="ng" for="C9"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][51] == 0){ ?>
                  <input type="checkbox" id="C10" value="C10" name="seki[]"><label for="C10"><p> 10 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="C10" name="seki[]"><label id="ng" for="C10"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][52] == 0){ ?>
                  <input type="checkbox" id="C11" value="C11" name="seki[]"><label for="C11"><p> 11 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="C11" name="seki[]"><label id="ng" for="C11"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][53] == 0){ ?>
                  <input type="checkbox" id="C12" value="C12" name="seki[]"><label for="C12"><p> 12 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="C12" name="seki[]"><label id="ng" for="C12"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][54] == 0){ ?>
                  <input type="checkbox" id="C13" value="C13" name="seki[]"><label for="C13"><p> 13 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="C13" name="seki[]"><label id="ng" for="C13"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][55] == 0){ ?>
                  <input type="checkbox" id="C14" value="C14" name="seki[]"><label for="C14"><p> 14 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="C14" name="seki[]"><label id="ng" for="C14"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][56] == 0){ ?>
                  <input type="checkbox" id="C15" value="C15" name="seki[]"><label for="C15"><p> 15 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="C15" name="seki[]"><label id="ng" for="C15"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][57] == 0){ ?>
                  <input type="checkbox" id="C16" value="C16" name="seki[]"><label for="C16"><p> 16 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="C16" name="seki[]"><label id="ng" for="C16"><p>X</p></label>
               <?php  }
              ?> 
                <p class="aoki">Ⓒ</p>
                
                <?php
                if($data[0][58] == 0){ ?>
                  <input type="checkbox" id="C17" value="C17" name="seki[]"><label for="C17"><p> 17 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="C17" name="seki[]"><label id="ng" for="C17"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][59] == 0){ ?>
                  <input type="checkbox" id="C18" value="C18" name="seki[]"><label for="C18"><p> 18 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="C18" name="seki[]"><label id="ng" for="C18"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][60] == 0){ ?>
                  <input type="checkbox" id="C19" value="C19" name="seki[]"><label for="C19"><p> 19 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="C19" name="seki[]"><label id="ng" for="C19"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][61] == 0){ ?>
                  <input type="checkbox" id="C20" value="C20" name="seki[]"><label for="C20"><p> 20 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="C20" name="seki[]"><label id="ng" for="C20"><p>X</p></label>
               <?php  }
              ?>            
              </div>
            </li>
            &nbsp;&nbsp;&nbsp;
            <li class="aokikuso">
              <div class="example2">
              <?php

                if($data[0][62] == 0){ ?>
                  <input type="checkbox" id="D1" value="D1" name="seki[]"><label for="D1"><p> 1 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="D1" name="seki[]"><label id="ng" for="D1"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][63] == 0){ ?>
                  <input type="checkbox" id="D2" value="D2" name="seki[]"><label for="D2"><p> 2 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="D2" name="seki[]"><label id="ng" for="D2"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][64] == 0){ ?>
                  <input type="checkbox" id="D3" value="D3" name="seki[]"><label for="D3"><p> 3 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="D3" name="seki[]"><label id="ng" for="D3"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][65] == 0){ ?>
                  <input type="checkbox" id="D4" value="D4" name="seki[]"><label for="D4"><p> 4 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="D4" name="seki[]"><label id="ng" for="D4"><p>X</p></label>
               <?php  }
              ?>
                <p class="aoki">Ⓓ</p>
                <?php
                if($data[0][66] == 0){ ?>
                  <input type="checkbox" id="D5" value="D5" name="seki[]"><label for="D5"><p> 5 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="D5" name="seki[]"><label id="ng" for="D5"><p>X</p></label>
               <?php  }
              ?>    
               <?php
                if($data[0][67] == 0){ ?>
                  <input type="checkbox" id="D6" value="D6" name="seki[]"><label for="D6"><p> 6 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="D6" name="seki[]"><label id="ng" for="D6"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][68] == 0){ ?>
                  <input type="checkbox" id="D7" value="D7" name="seki[]"><label for="D7"><p> 7 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="D7" name="seki[]"><label id="ng" for="D7"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][69] == 0){ ?>
                  <input type="checkbox" id="D8" value="D8" name="seki[]"><label for="D8"><p> 8 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A8" name="seki[]"><label id="ng" for="D8"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][70] == 0){ ?>
                  <input type="checkbox" id="D9" value="D9" name="seki[]"><label for="D9"><p> 9 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="D9" name="seki[]"><label id="ng" for="D9"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][71] == 0){ ?>
                  <input type="checkbox" id="D10" value="D10" name="seki[]"><label for="D10"><p> 10 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="D10" name="seki[]"><label id="ng" for="D10"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][72] == 0){ ?>
                  <input type="checkbox" id="D11" value="D11" name="seki[]"><label for="D11"><p> 11 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="D11" name="seki[]"><label id="ng" for="D11"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][73] == 0){ ?>
                  <input type="checkbox" id="D12" value="D12" name="seki[]"><label for="D12"><p> 12 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="D12" name="seki[]"><label id="ng" for="D12"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][74] == 0){ ?>
                  <input type="checkbox" id="D13" value="D13" name="seki[]"><label for="D13"><p> 13 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="D13" name="seki[]"><label id="ng" for="D13"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][75] == 0){ ?>
                  <input type="checkbox" id="D14" value="D14" name="seki[]"><label for="D14"><p> 14 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="D14" name="seki[]"><label id="ng" for="D14"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][76] == 0){ ?>
                  <input type="checkbox" id="D15" value="D15" name="seki[]"><label for="D15"><p> 15 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="D15" name="seki[]"><label id="ng" for="D15"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][77] == 0){ ?>
                  <input type="checkbox" id="D16" value="D16" name="seki[]"><label for="D16"><p> 16 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="D16" name="seki[]"><label id="ng" for="D16"><p>X</p></label>
               <?php  }
              ?> 
                <p class="aoki">Ⓓ</p>
                
                <?php
                if($data[0][78] == 0){ ?>
                  <input type="checkbox" id="D17" value="D17" name="seki[]"><label for="D17"><p> 17 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="D17" name="seki[]"><label id="ng" for="D17"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][79] == 0){ ?>
                  <input type="checkbox" id="D18" value="D18" name="seki[]"><label for="D18"><p> 18 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="D18" name="seki[]"><label id="ng" for="D18"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][80] == 0){ ?>
                  <input type="checkbox" id="D19" value="D19" name="seki[]"><label for="D19"><p> 19 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="D19" name="seki[]"><label id="ng" for="D19"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][81] == 0){ ?>
                  <input type="checkbox" id="D20" value="D20" name="seki[]"><label for="D20"><p> 20 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="D20" name="seki[]"><label id="ng" for="D20"><p>X</p></label>
               <?php  }
              ?>              
               </div>
            </li>
            <li class="aokikuso">
              <div class="example2">
              <?php

                if($data[0][82] == 0){ ?>
                  <input type="checkbox" id="E1" value="E1" name="seki[]"><label for="E1"><p> 1 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="E1" name="seki[]"><label id="ng" for="E1"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][83] == 0){ ?>
                  <input type="checkbox" id="E2" value="E2" name="seki[]"><label for="E2"><p> 2 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="E2" name="seki[]"><label id="ng" for="E2"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][84] == 0){ ?>
                  <input type="checkbox" id="E3" value="E3" name="seki[]"><label for="E3"><p> 3 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="E3" name="seki[]"><label id="ng" for="E3"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][85] == 0){ ?>
                  <input type="checkbox" id="E4" value="E4" name="seki[]"><label for="E4"><p> 4 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="E4" name="seki[]"><label id="ng" for="E4"><p>X</p></label>
               <?php  }
              ?>
                <p class="aoki">Ⓔ</p>
                <?php
                if($data[0][86] == 0){ ?>
                  <input type="checkbox" id="E5" value="E5" name="seki[]"><label for="E5"><p> 5 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="E5" name="seki[]"><label id="ng" for="E5"><p>X</p></label>
               <?php  }
              ?>    
               <?php
                if($data[0][87] == 0){ ?>
                  <input type="checkbox" id="E6" value="E6" name="seki[]"><label for="E6"><p> 6 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="E6" name="seki[]"><label id="ng" for="E6"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][88] == 0){ ?>
                  <input type="checkbox" id="E7" value="E7" name="seki[]"><label for="E7"><p> 7 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="E7" name="seki[]"><label id="ng" for="E7"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][89] == 0){ ?>
                  <input type="checkbox" id="E8" value="E8" name="seki[]"><label for="E8"><p> 8 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A8" name="seki[]"><label id="ng" for="E8"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][90] == 0){ ?>
                  <input type="checkbox" id="E9" value="E9" name="seki[]"><label for="E9"><p> 9 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="E9" name="seki[]"><label id="ng" for="E9"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][91] == 0){ ?>
                  <input type="checkbox" id="E10" value="E10" name="seki[]"><label for="E10"><p> 10 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="E10" name="seki[]"><label id="ng" for="E10"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][92] == 0){ ?>
                  <input type="checkbox" id="E11" value="E11" name="seki[]"><label for="E11"><p> 11 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="E11" name="seki[]"><label id="ng" for="E11"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][93] == 0){ ?>
                  <input type="checkbox" id="E12" value="E12" name="seki[]"><label for="E12"><p> 12 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="E12" name="seki[]"><label id="ng" for="E12"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][94] == 0){ ?>
                  <input type="checkbox" id="E13" value="E13" name="seki[]"><label for="E13"><p> 13 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="E13" name="seki[]"><label id="ng" for="E13"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][95] == 0){ ?>
                  <input type="checkbox" id="E14" value="E14" name="seki[]"><label for="E14"><p> 14 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="E14" name="seki[]"><label id="ng" for="E14"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][96] == 0){ ?>
                  <input type="checkbox" id="E15" value="E15" name="seki[]"><label for="E15"><p> 15 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="E15" name="seki[]"><label id="ng" for="E15"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][97] == 0){ ?>
                  <input type="checkbox" id="E16" value="E16" name="seki[]"><label for="E16"><p> 16 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="E16" name="seki[]"><label id="ng" for="E16"><p>X</p></label>
               <?php  }
              ?> 
                <p class="aoki">Ⓔ</p>
                
                <?php
                if($data[0][98] == 0){ ?>
                  <input type="checkbox" id="E17" value="E17" name="seki[]"><label for="E17"><p> 17 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="E17" name="seki[]"><label id="ng" for="E17"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][99] == 0){ ?>
                  <input type="checkbox" id="E18" value="E18" name="seki[]"><label for="E18"><p> 18 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="E18" name="seki[]"><label id="ng" for="E18"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][100] == 0){ ?>
                  <input type="checkbox" id="E19" value="E19" name="seki[]"><label for="E19"><p> 19 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="E19" name="seki[]"><label id="ng" for="E19"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][101] == 0){ ?>
                  <input type="checkbox" id="E20" value="E20" name="seki[]"><label for="E20"><p> 20 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="E20" name="seki[]"><label id="ng" for="E20"><p>X</p></label>
               <?php  }
              ?>   
                         </div>
            </li>
            <li class="aokikuso">
              <div class="example2">
                
              <?php

                if($data[0][102] == 0){ ?>
                  <input type="checkbox" id="F1" value="F1" name="seki[]"><label for="F1"><p> 1 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="F1" name="seki[]"><label id="ng" for="F1"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][103] == 0){ ?>
                  <input type="checkbox" id="F2" value="F2" name="seki[]"><label for="F2"><p> 2 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="F2" name="seki[]"><label id="ng" for="F2"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][104] == 0){ ?>
                  <input type="checkbox" id="F3" value="F3" name="seki[]"><label for="F3"><p> 3 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="F3" name="seki[]"><label id="ng" for="F3"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][105] == 0){ ?>
                  <input type="checkbox" id="F4" value="F4" name="seki[]"><label for="F4"><p> 4 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="F4" name="seki[]"><label id="ng" for="F4"><p>X</p></label>
               <?php  }
              ?>
                <p class="aoki">Ⓕ</p>
                <?php
                if($data[0][106] == 0){ ?>
                  <input type="checkbox" id="F5" value="F5" name="seki[]"><label for="F5"><p> 5 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="F5" name="seki[]"><label id="ng" for="F5"><p>X</p></label>
               <?php  }
              ?>    
               <?php
                if($data[0][107] == 0){ ?>
                  <input type="checkbox" id="F6" value="F6" name="seki[]"><label for="F6"><p> 6 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="F6" name="seki[]"><label id="ng" for="F6"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][108] == 0){ ?>
                  <input type="checkbox" id="F7" value="F7" name="seki[]"><label for="F7"><p> 7 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="F7" name="seki[]"><label id="ng" for="F7"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][109] == 0){ ?>
                  <input type="checkbox" id="F8" value="F8" name="seki[]"><label for="F8"><p> 8 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A8" name="seki[]"><label id="ng" for="F8"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][110] == 0){ ?>
                  <input type="checkbox" id="F9" value="F9" name="seki[]"><label for="F9"><p> 9 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="F9" name="seki[]"><label id="ng" for="F9"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][111] == 0){ ?>
                  <input type="checkbox" id="F10" value="F10" name="seki[]"><label for="F10"><p> 10 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="F10" name="seki[]"><label id="ng" for="F10"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][112] == 0){ ?>
                  <input type="checkbox" id="F11" value="F11" name="seki[]"><label for="F11"><p> 11 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="F11" name="seki[]"><label id="ng" for="F11"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][113] == 0){ ?>
                  <input type="checkbox" id="F12" value="F12" name="seki[]"><label for="F12"><p> 12 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="F12" name="seki[]"><label id="ng" for="F12"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][114] == 0){ ?>
                  <input type="checkbox" id="F13" value="F13" name="seki[]"><label for="F13"><p> 13 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="F13" name="seki[]"><label id="ng" for="F13"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][115] == 0){ ?>
                  <input type="checkbox" id="F14" value="F14" name="seki[]"><label for="F14"><p> 14 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="F14" name="seki[]"><label id="ng" for="F14"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][116] == 0){ ?>
                  <input type="checkbox" id="F15" value="F15" name="seki[]"><label for="F15"><p> 15 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="F15" name="seki[]"><label id="ng" for="F15"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][117] == 0){ ?>
                  <input type="checkbox" id="F16" value="F16" name="seki[]"><label for="F16"><p> 16 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="F16" name="seki[]"><label id="ng" for="F16"><p>X</p></label>
               <?php  }
              ?> 
                <p class="aoki">Ⓕ</p>
                
                <?php
                if($data[0][118] == 0){ ?>
                  <input type="checkbox" id="F17" value="F17" name="seki[]"><label for="F17"><p> 17 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="F17" name="seki[]"><label id="ng" for="F17"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][119] == 0){ ?>
                  <input type="checkbox" id="F18" value="F18" name="seki[]"><label for="F18"><p> 18 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="F18" name="seki[]"><label id="ng" for="F18"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][120] == 0){ ?>
                  <input type="checkbox" id="F19" value="F19" name="seki[]"><label for="F19"><p> 19 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="F19" name="seki[]"><label id="ng" for="F19"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][121] == 0){ ?>
                  <input type="checkbox" id="F20" value="F20" name="seki[]"><label for="F20"><p> 20 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="F20" name="seki[]"><label id="ng" for="F20"><p>X</p></label>
               <?php  }
              ?>   
             
              </div>
            </li>
            <li class="aokikuso">
              <div class="example2">
                
              <?php

                if($data[0][122] == 0){ ?>
                  <input type="checkbox" id="G1" value="G1" name="seki[]"><label for="G1"><p> 1 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="G1" name="seki[]"><label id="ng" for="G1"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][123] == 0){ ?>
                  <input type="checkbox" id="G2" value="G2" name="seki[]"><label for="G2"><p> 2 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="G2" name="seki[]"><label id="ng" for="G2"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][124] == 0){ ?>
                  <input type="checkbox" id="G3" value="G3" name="seki[]"><label for="G3"><p> 3 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="G3" name="seki[]"><label id="ng" for="G3"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][125] == 0){ ?>
                  <input type="checkbox" id="G4" value="G4" name="seki[]"><label for="G4"><p> 4 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="G4" name="seki[]"><label id="ng" for="G4"><p>X</p></label>
               <?php  }
              ?>
                <p class="aoki">Ⓖ</p>
                <?php
                if($data[0][126] == 0){ ?>
                  <input type="checkbox" id="G5" value="G5" name="seki[]"><label for="G5"><p> 5 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="G5" name="seki[]"><label id="ng" for="G5"><p>X</p></label>
               <?php  }
              ?>    
               <?php
                if($data[0][127] == 0){ ?>
                  <input type="checkbox" id="G6" value="G6" name="seki[]"><label for="G6"><p> 6 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="G6" name="seki[]"><label id="ng" for="G6"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][128] == 0){ ?>
                  <input type="checkbox" id="G7" value="G7" name="seki[]"><label for="G7"><p> 7 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="G7" name="seki[]"><label id="ng" for="G7"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][129] == 0){ ?>
                  <input type="checkbox" id="G8" value="G8" name="seki[]"><label for="G8"><p> 8 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A8" name="seki[]"><label id="ng" for="G8"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][130] == 0){ ?>
                  <input type="checkbox" id="G9" value="G9" name="seki[]"><label for="G9"><p> 9 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="G9" name="seki[]"><label id="ng" for="G9"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][131] == 0){ ?>
                  <input type="checkbox" id="G10" value="G10" name="seki[]"><label for="G10"><p> 10 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="G10" name="seki[]"><label id="ng" for="G10"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][132] == 0){ ?>
                  <input type="checkbox" id="G11" value="G11" name="seki[]"><label for="G11"><p> 11 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="G11" name="seki[]"><label id="ng" for="G11"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][133] == 0){ ?>
                  <input type="checkbox" id="G12" value="G12" name="seki[]"><label for="G12"><p> 12 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="G12" name="seki[]"><label id="ng" for="G12"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][134] == 0){ ?>
                  <input type="checkbox" id="G13" value="G13" name="seki[]"><label for="G13"><p> 13 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="G13" name="seki[]"><label id="ng" for="G13"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][135] == 0){ ?>
                  <input type="checkbox" id="G14" value="G14" name="seki[]"><label for="G14"><p> 14 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="G14" name="seki[]"><label id="ng" for="G14"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][136] == 0){ ?>
                  <input type="checkbox" id="G15" value="G15" name="seki[]"><label for="G15"><p> 15 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="G15" name="seki[]"><label id="ng" for="G15"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][137] == 0){ ?>
                  <input type="checkbox" id="G16" value="G16" name="seki[]"><label for="G16"><p> 16 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="G16" name="seki[]"><label id="ng" for="G16"><p>X</p></label>
               <?php  }
              ?> 
                <p class="aoki">Ⓖ</p>
                
                <?php
                if($data[0][138] == 0){ ?>
                  <input type="checkbox" id="G17" value="G17" name="seki[]"><label for="G17"><p> 17 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="G17" name="seki[]"><label id="ng" for="G17"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][139] == 0){ ?>
                  <input type="checkbox" id="G18" value="G18" name="seki[]"><label for="G18"><p> 18 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="G18" name="seki[]"><label id="ng" for="G18"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][140] == 0){ ?>
                  <input type="checkbox" id="G19" value="G19" name="seki[]"><label for="G19"><p> 19 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="G19" name="seki[]"><label id="ng" for="G19"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][141] == 0){ ?>
                  <input type="checkbox" id="G20" value="G20" name="seki[]"><label for="G20"><p> 20 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="G20" name="seki[]"><label id="ng" for="G20"><p>X</p></label>
               <?php  }
              ?>   
             
            </div>
            </li>
            <li class="aokikuso">
              <div class="example2">
                
              <?php

                if($data[0][142] == 0){ ?>
                  <input type="checkbox" id="H1" value="H1" name="seki[]"><label for="H1"><p> 1 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="H1" name="seki[]"><label id="ng" for="H1"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][143] == 0){ ?>
                  <input type="checkbox" id="H2" value="H2" name="seki[]"><label for="H2"><p> 2 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="H2" name="seki[]"><label id="ng" for="H2"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][144] == 0){ ?>
                  <input type="checkbox" id="H3" value="H3" name="seki[]"><label for="H3"><p> 3 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="H3" name="seki[]"><label id="ng" for="H3"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][145] == 0){ ?>
                  <input type="checkbox" id="H4" value="H4" name="seki[]"><label for="H4"><p> 4 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="H4" name="seki[]"><label id="ng" for="H4"><p>X</p></label>
               <?php  }
              ?>
                <p class="aoki">Ⓗ</p>
                <?php
                if($data[0][146] == 0){ ?>
                  <input type="checkbox" id="H5" value="H5" name="seki[]"><label for="H5"><p> 5 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="H5" name="seki[]"><label id="ng" for="H5"><p>X</p></label>
               <?php  }
              ?>    
               <?php
                if($data[0][147] == 0){ ?>
                  <input type="checkbox" id="H6" value="H6" name="seki[]"><label for="H6"><p> 6 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="H6" name="seki[]"><label id="ng" for="H6"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][148] == 0){ ?>
                  <input type="checkbox" id="H7" value="H7" name="seki[]"><label for="H7"><p> 7 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="H7" name="seki[]"><label id="ng" for="H7"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][149] == 0){ ?>
                  <input type="checkbox" id="H8" value="H8" name="seki[]"><label for="H8"><p> 8 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A8" name="seki[]"><label id="ng" for="H8"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][150] == 0){ ?>
                  <input type="checkbox" id="H9" value="H9" name="seki[]"><label for="H9"><p> 9 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="H9" name="seki[]"><label id="ng" for="H9"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][151] == 0){ ?>
                  <input type="checkbox" id="H10" value="H10" name="seki[]"><label for="H10"><p> 10 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="H10" name="seki[]"><label id="ng" for="H10"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][152] == 0){ ?>
                  <input type="checkbox" id="H11" value="H11" name="seki[]"><label for="H11"><p> 11 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="H11" name="seki[]"><label id="ng" for="H11"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][153] == 0){ ?>
                  <input type="checkbox" id="H12" value="H12" name="seki[]"><label for="H12"><p> 12 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="H12" name="seki[]"><label id="ng" for="H12"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][154] == 0){ ?>
                  <input type="checkbox" id="H13" value="H13" name="seki[]"><label for="H13"><p> 13 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="H13" name="seki[]"><label id="ng" for="H13"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][155] == 0){ ?>
                  <input type="checkbox" id="H14" value="H14" name="seki[]"><label for="H14"><p> 14 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="H14" name="seki[]"><label id="ng" for="H14"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][156] == 0){ ?>
                  <input type="checkbox" id="H15" value="H15" name="seki[]"><label for="H15"><p> 15 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="H15" name="seki[]"><label id="ng" for="H15"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][157] == 0){ ?>
                  <input type="checkbox" id="H16" value="H16" name="seki[]"><label for="H16"><p> 16 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="H16" name="seki[]"><label id="ng" for="H16"><p>X</p></label>
               <?php  }
              ?> 
                <p class="aoki">Ⓗ</p>
                
                <?php
                if($data[0][158] == 0){ ?>
                  <input type="checkbox" id="H17" value="H17" name="seki[]"><label for="H17"><p> 17 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="H17" name="seki[]"><label id="ng" for="H17"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][159] == 0){ ?>
                  <input type="checkbox" id="H18" value="H18" name="seki[]"><label for="H18"><p> 18 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="H18" name="seki[]"><label id="ng" for="H18"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][160] == 0){ ?>
                  <input type="checkbox" id="H19" value="H19" name="seki[]"><label for="H19"><p> 19 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="H19" name="seki[]"><label id="ng" for="H19"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][161] == 0){ ?>
                  <input type="checkbox" id="H20" value="H20" name="seki[]"><label for="H20"><p> 20 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="H20" name="seki[]"><label id="ng" for="H20"><p>X</p></label>
               <?php  }
              ?>   
             
            </div>
            </li>
            <li class="aokikuso">
              <div class="example2">
                
              <?php

                if($data[0][162] == 0){ ?>
                  <input type="checkbox" id="I1" value="I1" name="seki[]"><label for="I1"><p> 1 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="I1" name="seki[]"><label id="ng" for="I1"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][163] == 0){ ?>
                  <input type="checkbox" id="I2" value="I2" name="seki[]"><label for="I2"><p> 2 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="I2" name="seki[]"><label id="ng" for="I2"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][164] == 0){ ?>
                  <input type="checkbox" id="I3" value="I3" name="seki[]"><label for="I3"><p> 3 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="I3" name="seki[]"><label id="ng" for="I3"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][165] == 0){ ?>
                  <input type="checkbox" id="I4" value="I4" name="seki[]"><label for="I4"><p> 4 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="I4" name="seki[]"><label id="ng" for="I4"><p>X</p></label>
               <?php  }
              ?>
                <p class="aoki">Ⓘ</p>
                <?php
                if($data[0][166] == 0){ ?>
                  <input type="checkbox" id="I5" value="I5" name="seki[]"><label for="I5"><p> 5 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="I5" name="seki[]"><label id="ng" for="I5"><p>X</p></label>
               <?php  }
              ?>    
               <?php
                if($data[0][167] == 0){ ?>
                  <input type="checkbox" id="I6" value="I6" name="seki[]"><label for="I6"><p> 6 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="I6" name="seki[]"><label id="ng" for="I6"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][168] == 0){ ?>
                  <input type="checkbox" id="I7" value="I7" name="seki[]"><label for="I7"><p> 7 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="I7" name="seki[]"><label id="ng" for="I7"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][169] == 0){ ?>
                  <input type="checkbox" id="I8" value="I8" name="seki[]"><label for="I8"><p> 8 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A8" name="seki[]"><label id="ng" for="I8"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][170] == 0){ ?>
                  <input type="checkbox" id="I9" value="I9" name="seki[]"><label for="I9"><p> 9 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="I9" name="seki[]"><label id="ng" for="I9"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][171] == 0){ ?>
                  <input type="checkbox" id="I10" value="I10" name="seki[]"><label for="I10"><p> 10 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="I10" name="seki[]"><label id="ng" for="I10"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][172] == 0){ ?>
                  <input type="checkbox" id="I11" value="I11" name="seki[]"><label for="I11"><p> 11 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="I11" name="seki[]"><label id="ng" for="I11"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][173] == 0){ ?>
                  <input type="checkbox" id="I12" value="I12" name="seki[]"><label for="I12"><p> 12 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="I12" name="seki[]"><label id="ng" for="I12"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][174] == 0){ ?>
                  <input type="checkbox" id="I13" value="I13" name="seki[]"><label for="I13"><p> 13 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="I13" name="seki[]"><label id="ng" for="I13"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][175] == 0){ ?>
                  <input type="checkbox" id="I14" value="I14" name="seki[]"><label for="I14"><p> 14 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="I14" name="seki[]"><label id="ng" for="I14"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][176] == 0){ ?>
                  <input type="checkbox" id="I15" value="I15" name="seki[]"><label for="I15"><p> 15 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="I15" name="seki[]"><label id="ng" for="I15"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][177] == 0){ ?>
                  <input type="checkbox" id="I16" value="I16" name="seki[]"><label for="I16"><p> 16 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="I16" name="seki[]"><label id="ng" for="I16"><p>X</p></label>
               <?php  }
              ?> 
                <p class="aoki">Ⓘ</p>
                
                <?php
                if($data[0][178] == 0){ ?>
                  <input type="checkbox" id="I17" value="I17" name="seki[]"><label for="I17"><p> 17 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="I17" name="seki[]"><label id="ng" for="I17"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][179] == 0){ ?>
                  <input type="checkbox" id="I18" value="I18" name="seki[]"><label for="I18"><p> 18 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="I18" name="seki[]"><label id="ng" for="I18"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][180] == 0){ ?>
                  <input type="checkbox" id="I19" value="I19" name="seki[]"><label for="I19"><p> 19 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="I19" name="seki[]"><label id="ng" for="I19"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][181] == 0){ ?>
                  <input type="checkbox" id="I20" value="I20" name="seki[]"><label for="I20"><p> 20 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="I20" name="seki[]"><label id="ng" for="I20"><p>X</p></label>
               <?php  }
              ?>   
             
            </div>
            </li>
            <li class="aokikuso">
              <div class="example2">
                
              <?php

                if($data[0][182] == 0){ ?>
                  <input type="checkbox" id="J1" value="J1" name="seki[]"><label for="J1"><p> 1 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="J1" name="seki[]"><label id="ng" for="J1"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][183] == 0){ ?>
                  <input type="checkbox" id="J2" value="J2" name="seki[]"><label for="J2"><p> 2 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="J2" name="seki[]"><label id="ng" for="J2"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][184] == 0){ ?>
                  <input type="checkbox" id="J3" value="J3" name="seki[]"><label for="J3"><p> 3 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="J3" name="seki[]"><label id="ng" for="J3"><p>X</p></label>
               <?php  }
              ?>
               <?php
                if($data[0][185] == 0){ ?>
                  <input type="checkbox" id="J4" value="J4" name="seki[]"><label for="J4"><p> 4 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="J4" name="seki[]"><label id="ng" for="J4"><p>X</p></label>
               <?php  }
              ?>
                <p class="aoki">Ⓙ</p>
                <?php
                if($data[0][186] == 0){ ?>
                  <input type="checkbox" id="J5" value="J5" name="seki[]"><label for="J5"><p> 5 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="J5" name="seki[]"><label id="ng" for="J5"><p>X</p></label>
               <?php  }
              ?>    
               <?php
                if($data[0][187] == 0){ ?>
                  <input type="checkbox" id="J6" value="J6" name="seki[]"><label for="J6"><p> 6 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="J6" name="seki[]"><label id="ng" for="J6"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][188] == 0){ ?>
                  <input type="checkbox" id="J7" value="J7" name="seki[]"><label for="J7"><p> 7 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="J7" name="seki[]"><label id="ng" for="J7"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][189] == 0){ ?>
                  <input type="checkbox" id="J8" value="J8" name="seki[]"><label for="J8"><p> 8 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="A8" name="seki[]"><label id="ng" for="J8"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][190] == 0){ ?>
                  <input type="checkbox" id="J9" value="J9" name="seki[]"><label for="J9"><p> 9 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="J9" name="seki[]"><label id="ng" for="J9"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][191] == 0){ ?>
                  <input type="checkbox" id="J10" value="J10" name="seki[]"><label for="J10"><p> 10 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="J10" name="seki[]"><label id="ng" for="J10"><p>X</p></label>
               <?php  }
              ?>                
               <?php
                if($data[0][192] == 0){ ?>
                  <input type="checkbox" id="J11" value="J11" name="seki[]"><label for="J11"><p> 11 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="J11" name="seki[]"><label id="ng" for="J11"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][193] == 0){ ?>
                  <input type="checkbox" id="J12" value="J12" name="seki[]"><label for="J12"><p> 12 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="J12" name="seki[]"><label id="ng" for="J12"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][194] == 0){ ?>
                  <input type="checkbox" id="J13" value="J13" name="seki[]"><label for="J13"><p> 13 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="J13" name="seki[]"><label id="ng" for="J13"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][195] == 0){ ?>
                  <input type="checkbox" id="J14" value="J14" name="seki[]"><label for="J14"><p> 14 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="J14" name="seki[]"><label id="ng" for="J14"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][196] == 0){ ?>
                  <input type="checkbox" id="J15" value="J15" name="seki[]"><label for="J15"><p> 15 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="J15" name="seki[]"><label id="ng" for="J15"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][197] == 0){ ?>
                  <input type="checkbox" id="J16" value="J16" name="seki[]"><label for="J16"><p> 16 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="J16" name="seki[]"><label id="ng" for="J16"><p>X</p></label>
               <?php  }
              ?> 
                <p class="aoki">Ⓙ</p>
                
                <?php
                if($data[0][198] == 0){ ?>
                  <input type="checkbox" id="J17" value="J17" name="seki[]"><label for="J17"><p> 17 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="J17" name="seki[]"><label id="ng" for="J17"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][199] == 0){ ?>
                  <input type="checkbox" id="J18" value="J18" name="seki[]"><label for="J18"><p> 18 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="J18" name="seki[]"><label id="ng" for="J18"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][200] == 0){ ?>
                  <input type="checkbox" id="J19" value="J19" name="seki[]"><label for="J19"><p> 19 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="J19" name="seki[]"><label id="ng" for="J19"><p>X</p></label>
               <?php  }
              ?> 
                
                <?php
                if($data[0][201] == 0){ ?>
                  <input type="checkbox" id="J20" value="J20" name="seki[]"><label for="J20"><p> 20 </p></label>
                <?php }else{ ?>
                  
                  <input type="button" id="ng" value="J20" name="seki[]"><label id="ng" for="J20"><p>X</p></label>
               <?php  }
              ?>   
             
            </div>
            </li>
          </ul>
        </div>
        <br>
      <div class="button-container">
      <button type="submit">確認画面へ</button>
        <a href="jouei.php" class="btn btn-back">戻る</a>
      </div>

    </div>


    <footer>
      <p>2023 © Copyright.</p>
    </footer>
<script src="js/kounyu.js" type="text/javascript"></script>

  </body>
</html>
