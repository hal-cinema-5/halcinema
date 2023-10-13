<?php
try {
  $dsn = 'mysql:dbname=halcinema;host=127.0.0.1;charset=utf8';
  $user = 'root';
  $password = '';
 
  $PDO = new PDO($dsn, $user, $password); 
  $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
 
  $name = $_POST['name'];
  $pass = $_POST['pass'];
  $mail = $_POST['mail'];
  $tel = $_POST['tel'];



  $sql1 = "SELECT f_user_name FROM t_user WHERE f_user_name = '". $name ."'";
  $stmt1 = $PDO->prepare($sql1);  
  $stmt1->execute();
  $name1 = $stmt1->fetchAll();
  if(empty($name1)){
    $name1 = NULL;
  }


  $sql2 = "SELECT f_user_mail FROM t_user WHERE f_user_mail = '". $mail ."'";
  $stmt2 = $PDO->prepare($sql2); 
  $stmt2->execute();
  $mail1 = $stmt2->fetchAll();
  if(empty($mail1)){
    $mail1 = NULL;
  }


  $sql3 = "SELECT f_user_tel FROM t_user WHERE f_user_tel = '". $tel ."'";
  $stmt3 = $PDO->prepare($sql3); 
  $stmt3->execute();
  $tel1 = $stmt3->fetchAll();
  if(empty($tel1)){
    $tel1 = NULL;
  }





  if (isset($name1)) {
    print("NG");
    session_start();
    $error = "このアカウント名は既に登録されています";
    $_SESSION['error'] = $error;
    header('Location: sinki.php');
} else 
  if (isset($mail1)){
      print("NG");
      session_start();
      $error = "このメールアドレスは既に登録されています";
      $_SESSION['error'] = $error;
      header('Location: sinki.php');
  } else {
    if (isset($tel1)){
      print("NG");
      session_start();
      $error = "この電話番号は既に登録されています";
      $_SESSION['error'] = $error;
      header('Location: sinki.php');
  } else {
    $sql = "INSERT INTO t_user (f_user_name, f_user_pass, f_user_mail, f_user_tel) VALUES (:name, :pass, :mail, :tel)"; 
    $stmt = $PDO->prepare($sql); 
    $params = array(':name' => $name, ':pass' => $pass, ':mail' => $mail, ':tel' => $tel); 
    $stmt->execute($params); 
  }

}
 
 

  echo "<p>名前: " . $name . "</p>";
  echo "<p>パスワード: " . $pass . "</p>";
  echo "<p>メール: " . $mail . "</p>";
  echo "<p>電話番号: " . $tel . "</p>";
  echo '<p>上記の内容でアカウントを作成しました。</p>';
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。' . $e->getMessage());
}
?>
<meta http-equiv="refresh" content="5; URL=login.php">

