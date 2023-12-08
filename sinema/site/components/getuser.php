<?php

function getLoginUser() {
    session_start();

    $loginuser = $_SESSION['name'];
    echo $loginuser;

    if (isset($_SESSION['name'])) {
        if (isset($_SESSION['f_user_name'])) {
            return $_SESSION['f_user_name'];
        } else {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "halcinema";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("接続エラー: " . $conn->connect_error);
            }

            $user_name = $_SESSION['name'];
            $sql = "SELECT f_user_name FROM t_user WHERE f_user_name = $user_name";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION['f_user_name'] = $row["f_user_name"];
                return $row["f_user_name"];
            } else {
                return "ユーザーが見つかりませんでした";
            }

            $conn->close();
        }
    } else {
        return "ログインしていません";
    }
}
?>
