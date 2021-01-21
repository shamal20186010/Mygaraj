<?php

include './Db_connection/Db_conn.php';
session_start();

$inEmail = $_POST['inEmail'];
$inPassword = $_POST['inPassword'];



if (isset($_SESSION ["is_login"])) {

    if ($_SESSION["is_login"]) {
        header("Location:/../Mygaraj.lk/index.php");
    }
} else {

    if (isset($_POST["inEmail"]) && isset($_POST["inPassword"])) {

        if ($inEmail == 'admin@gmail.com' && $inPassword == '1234') {

            $_SESSION["name"] = $inEmail;
            $_SESSION["is_login"] = true;
            header("Location:/../Mygaraj.lk/index.php");
            exit();
        } else {
            $sql = "SELECT `password` FROM users WHERE email='" . $inEmail . "'";

            $result = mysqli_query($connection, $sql);
            $row = $result->fetch_assoc();
            echo $inPassword == $row;
            if ($inPassword == $row["password"]){
                 $_SESSION["name"] = $inEmail;
            $_SESSION["is_login"] = true;
            header("Location:/../Mygaraj.lk/index.php");
            exit();
                
                echo "id: " .$row["password"];
            } else {
                
                header("Location:/Mygaraj.lk/web/login/login.php");
            }

        }
    } else {

        echo "<script> alert('please enter your username and password and try again');window.location='../web/login/login.php'</script>";
    }
}
?>


