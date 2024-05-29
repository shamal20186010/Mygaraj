<?php
include './Db_connection/Db_conn.php';

$productID = $_GET['id_product'];

$sql ="DELETE FROM product WHERE id_product= ".$productID."";

$isDelete = mysqli_query($connection,$sql);

if($isDelete){
    header("Location:./product.php");
} else {
echo 'Error !';}
?>



