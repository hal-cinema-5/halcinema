<!DOCTYPE html>
<html lang="ja">


<?php 
session_start();
$name = $_SESSION['name'] ;

require('db/dbpdo.php');

$sql = (" SELECT * FROM `t_user` WHERE f_user_name = '" . $name . "' "); //SQL文
$res = $dbh->prepare($sql);
$res->execute();
$user = $res->fetchAll();
$number=$user[0][5];

$sql = (" SELECT `f_rese_seat1`, `f_rese_seat2`, `f_rese_seat3` FROM `t_reservation` WHERE f_rese_number = '" . $number . "' "); //SQL文
$res = $dbh->prepare($sql);
$res->execute();
$chair = $res->fetchAll();
print $chair[0][0];
print $chair[0][1];
print $chair[0][2];

?>

<p>cancelしますか</p>
<a href="cancel.php">はい</a>
<a href="user.php">いいえ</a>
