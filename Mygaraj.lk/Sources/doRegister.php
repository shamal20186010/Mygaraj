<?php
include './Db_connection/Db_conn.php';

$inFirstName = $_POST['inputFirstName'];
$inLastName = $_POST['inputLastName'];
$inEmail = $_POST['inputEmail'];
$inPassword = $_POST['inputPassword'];
$inConfirmPassword = $_POST['inputConfirmPassword'];

if ($inPassword != $inConfirmPassword) {
    ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    
     <?php
     header("Location:/../Mygaraj.lk/login/register.php"); 
     ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function()
 {
        swal({
            title: 'Error',
            text: 'Password is not equal !',
            type: 'error',
            button: {
                text: "Continue",
                value: true,
                visible: true,
                className: "btn btn-primary"
            }
        })
    
    })</script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<?php
    exit();
    ?>
    <?php
} else {
    $sql = "INSERT INTO users(firstName,lastName,email,password) "
            . "values('" . $inFirstName . "','" . $inLastName . "',"
            . "'" . $inEmail . "','" . $inPassword . "')";



    $isSaved = mysqli_query($connection, $sql);
    if ($isSaved) {
        
         header("Location:/Mygaraj.lk/index.php");
    } else {
        echo 'Error !';
    }
    mysqli_close($connection);
}
?>
