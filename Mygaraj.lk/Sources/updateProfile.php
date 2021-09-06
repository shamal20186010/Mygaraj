<?php
session_start();
include './Db_connection/Db_conn.php';
$is_login = "";
$userid = "";
if(isset($_SESSION['is_login'])){$is_login = $_SESSION['is_login'];}
if(isset($_SESSION['userid'])){$userid = $_SESSION['userid'];}
if($is_login!=true){header("Location:/Mygaraj.lk/web/login/login.php?msg= Please Login Again!");die();}
$Fname = "";
$Lname = "";
$address = "";
$contactNo = "";
$email = ""; 
$password = "";
                 
if(isset($_POST['inputFirstName'])){$Fname = $_POST['inputFirstName']; }
if(isset($_POST['inputLastName'])){$Lname = $_POST['inputLastName']; }
if(isset($_POST['address'])){$address = $_POST['address']; }
if(isset($_POST['inputMobile'])){$contactNo = $_POST['inputMobile']; }
if(isset($_POST['inputEmail'])){$email = $_POST['inputEmail']; }
if(isset($_POST['inputPassword'])){$password = $_POST['inputPassword']; }

if($Fname==''){header("Location:../profile.php?msg= First Name not Found ! ");die();}
if($Lname==''){header("Location:../profile.php?msg= Last Name not Found ! ");die();}
if($address==''){header("Location:../profile.php?msg=Address not Found ! ");die();}
if($contactNo==''){header("Location:../profile.php?msg=Contact No not Found ! ");die();}
if($email==''){header("Location:../profile.php?msg=Email not Found ! ");die();}
if($password==''){header("Location:../profile.php?msg=Password not Found ! ");die();}

$updateProfile = "Update users set firstName = '".$Fname."' ,lastName = '".$Lname."' ,email='".$email."', address='".$address."', "
                            . "mobile= '".$contactNo."', password='".$password."' where id_user= '".$userid."' ";

$result = $connection->query($updateProfile);
if($result===TRUE){
    header("Location:/Mygaraj.lk/Sources/profile.php?msg=Update Success !"); 
           $_SESSION['firstName'] =$Fname;
           die();
} else {
    header("Location:/Mygaraj.lk/Sources/profile.php?msg=Update Failed !");die(); 
}