<a href="index.php">ホームに戻る</a>

<?php

session_start();
$name = $_SESSION['name'] ;


require('db/dbpdo.php');

$sql = (" SELECT * FROM `t_user` WHERE f_user_name = '" . $name . "' "); //SQL文
$res = $dbh->prepare($sql);
$res->execute();
$user = $res->fetchAll();
$number=$user[0][5];

$sql = (" SELECT * FROM `t_reservation` WHERE f_rese_number = '" . $number . "' "); //SQL文
$res = $dbh->prepare($sql);
$res->execute();
$data = $res->fetchAll();



print("下記の予約をキャンセルしました <br>");
print("タイトル：" .$data[0][1]. "<br>");
print("年月日：" .$data[0][2]. "<br>");
print("時間：" .$data[0][3]. "<br>");
print("screenナンバー: " .$data[0][4]. "<br>");
print("席1:" .$data[0][5]. "<br>");
print("席2:" .$data[0][6]. "<br>");
print("席3:" .$data[0][7]. "<br>");

$one = $data[0][5];
$two = $data[0][6];
$three = $data[0][7];

//座席戻す
$sql = (" UPDATE `t_screen1` SET `" . $one . "`='0' , `" . $two . "`='0' , `" . $three . "`='0' "); //SQL文
$res = $dbh->prepare($sql);
$res->execute();

//予約情報消す
$sql = (" DELETE FROM `t_reservation` WHERE f_rese_number = '" . $number . "' "); //SQL文
$res = $dbh->prepare($sql);
$res->execute();

$sql = (" DELETE FROM `t_reservation` WHERE f_rese_number = '" . $number . "' "); //SQL文
$res = $dbh->prepare($sql);
$res->execute();

$sql = (" UPDATE `t_user` SET `f_user_reseid`='0' WHERE f_user_name = '" . $name . "' "); //SQL文
$res = $dbh->prepare($sql);
$res->execute();


?>


