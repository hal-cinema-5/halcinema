<?php
 try {
  //pdoを読み込む
  require('db/dbpdo.php');
 
  $name = $_POST['name'];
  $pass = $_POST['pass'];

 
  $sql1 = "SELECT f_user_name FROM t_user WHERE f_user_name = '". $name ."'";
  $stmt1 = $dbh->prepare($sql1);  
  $stmt1->execute();
  $name1 = $stmt1->fetchAll();
  
  
  $sql2 = "SELECT f_user_pass FROM t_user WHERE f_user_pass = '". $pass ."'";
  $stmt2 = $dbh->prepare($sql2);
  $stmt2->execute();
  $pass1 = $stmt2->fetchAll();

 
  if (empty($name1)) {
        print("NG");
        session_start();
        $error = "アカウント名又はパスワードが間違っています";
        $_SESSION['error'] = $error;
        header('Location: login.php');
    } else {
      if (empty($pass1)){
          print("NG");
          session_start();
          $error = "アカウント名又はパスワードが間違っています";
          $_SESSION['error'] = $error;
          header('Location: login.php');
      } else {
        session_start();
        $_SESSION['name'] = $name;
            // ログイン成功後index.phpに飛ばす
            header('Location: index.php');
      }

  }




} catch (PDOException $e) {
  exit('データベースに接続できませんでした。' . $e->getMessage());
}
?>

 
