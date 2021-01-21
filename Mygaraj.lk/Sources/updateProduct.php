<?php
include './Db_connection/Db_conn.php';

$id_product = $_POST['id_product'];
$productName = $_POST['productName'];
$productDescription = $_POST['productDescription'];
$productCategory = $_POST['productCategory'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$discount = $_POST['discount'];


echo $id_product . "" . $productName . "" . $productDescription . "" . $productCategory . "" . $qty . "" . $price . "" . $discount;

$sql = "UPDATE product SET productName='" . $productName . "',productDescription='" . $productDescription . "',productCategory='" . $productCategory . "',qty='" . $qty . "',price='" . $price . "',discount='" . $discount . "'WHERE id_product='" . $id_product . "'";



$isSaved = mysqli_query($connection, $sql);
if ($isSaved) {
       header("Location:./product.php");
} else {
    echo 'Error !';
}
mysqli_close($connection);
?>
