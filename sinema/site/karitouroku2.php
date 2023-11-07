<?php
require('db/dbpdo.php');

$name = "user1";

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
        $sql = ("INSERT INTO `t_reservation`(`f_rese_number`, `f_rese_moviename`, `f_rese_date`, `f_rese_time`, `f_rese_screen`, `f_rese_seat1`) VALUES ('" . $yoyaku . "','マリオ','23/07/06','17:30:00','1','" . $one . "')"); //SQL文
        $res = $dbh->prepare($sql);
        $res->execute();
      //予約番号をユーザーに追加
        $sql = ("UPDATE `t_user` SET `f_user_reseid`='" . $yoyaku . "' WHERE f_user_name = '" . $name . "'"); //SQL文
        $res = $dbh->prepare($sql);
        $res->execute();
      //座席を予約済みに変更
      $sql = (" UPDATE `t_screen2` SET `" . $one . "`='1' "); //SQL文
      $res = $dbh->prepare($sql);
      $res->execute();
      
    }elseif(empty($chair[2])){
      //予約番号
      $yoyaku = rand(1000,9999);

      //座席が2つ選択
        $one = $chair[0];
        $two = $chair[1];
        $sql = ("INSERT INTO `t_reservation`( `f_rese_number`, `f_rese_moviename`, `f_rese_date`, `f_rese_time`, `f_rese_screen`, `f_rese_seat1`, `f_rese_seat2`) VALUES ('" . $yoyaku . "','マリオ','23/07/06','17:30:00','1','" . $one . "','" . $two . "')"); //SQL文
        $res = $dbh->prepare($sql);
        $res->execute();

        $sql = ("UPDATE `t_user` SET `f_user_reseid`='" . $yoyaku . "' WHERE f_user_name = '" . $name . "'"); //SQL文
        $res = $dbh->prepare($sql);
        $res->execute();
        //座席を予約済みに変更
        $sql = (" UPDATE `t_screen2` SET `" . $one . "`='1' , `" . $two . "`='1' "); //SQL文
        $res = $dbh->prepare($sql);
        $res->execute();
    }else{
      //予約番号
      $yoyaku = rand(1000,9999);

      //座席3つ選択
        $one = $chair[0];
        $two = $chair[1];
        $three = $chair[2];
        $sql = ("INSERT INTO `t_reservation`(`f_rese_number`, `f_rese_moviename`, `f_rese_date`, `f_rese_time`, `f_rese_screen`, `f_rese_seat1`, `f_rese_seat2`, `f_rese_seat3`) VALUES ('" . $yoyaku . "','マリオ','23/07/06','17:30:00','1','" . $one . "','" . $two . "','" . $three . "')"); //SQL文
        $res = $dbh->prepare($sql);
        $res->execute();

        $sql = ("UPDATE `t_user` SET `f_user_reseid`='" . $yoyaku . "' WHERE f_user_name = '" . $name . "'"); //SQL文
        $res = $dbh->prepare($sql);
        $res->execute();
        //座席を予約済みに変更
        $sql = (" UPDATE `t_screen2` SET `" . $one . "`='1' , `" . $two . "`='1' , `" . $three . "`='1'"); //SQL文
        $res = $dbh->prepare($sql);
        $res->execute();
    }

  ?>
  <form action="kakutei.html" method="post">
  <button type="submit">購入</button>
  <a href="kounyu.php">戻る</a>
  

