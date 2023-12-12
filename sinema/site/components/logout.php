<?php
session_start();

$_SESSION = array();
session_destroy();

echo '<script>
        setTimeout(function() {
          window.location.href = "../login.php";
        }, 1000);
      </script>';

?>
  <script>alert("ログアウトしました。")</script>
