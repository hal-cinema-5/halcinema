<?php
require('db/dbpdo.php');

session_start();
$name = $_SESSION['name'] ;
print( $name."さん" );

$sql = (" SELECT * FROM `t_user` WHERE f_user_name = '" . $name . "' "); //SQL文
$res = $dbh->prepare($sql);
$res->execute();
$data = $res->fetchAll();

print("予約番号".$data[0][5]);
?>

<a href="cancelcheck.php">cancel</a>