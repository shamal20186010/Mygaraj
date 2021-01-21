<?php

include './Db_connection/Db_conn.php';


$productName = $_POST['productName'];
$productDescription = $_POST['productDescription'];
$productCategory = $_POST['productCategory'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$discount = $_POST['discount'];

echo  $productName . "" . $productDescription . "" . $productCategory . "" . $qty . "" . $price . "" . $discount;

$iteamCodeq= "SELECT MAX(id_product) As iteamCode FROM product";
$iteamCode=  $connection->query($iteamCodeq);
  
$result = mysqli_fetch_array($iteamCode);
// echo $result['iteaCode'];
         
$sql ="INSERT INTO product(productName,iteamCode,productDescription,productCategory,qty,price,discount) "."values('".$productName."', ".(int)$result["iteamCode"].",'".$productDescription."',"
        . "'".$productCategory."','".$qty."','".$price."','".$discount."')";

echo $sql;

$isSaved = mysqli_query($connection, $sql);

if ($isSaved) {
    header("Location:./product.php");
} else {
    echo 'Error !';
}
mysqli_close($connection);

?>
