<?php
$username = "root";
$password = "root";
$databaseName = "mygaraj";
$HostUrl = "localhost";
$Hostport = "3306";

$inProdList = $_POST['prod_list'];

$connection = new mysqli($HostUrl, $username, $password, $databaseName, $Hostport);

//$iteamCodeq = "SELECT MAX(id_product) As a FROM product";
//$iteamCode = $connection->query($iteamCodeq);
//$result = mysqli_fetch_array($iteamCode);

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$iteamCodeq= "SELECT MAX(id_product) As iteamCode FROM product";
$iteamCode=  $connection->query($iteamCodeq);
  
$result = mysqli_fetch_array($iteamCode);
// echo $result['iteaCode'];
         
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"uploads/".$inProdList.".".$imageFileType)) {
        echo $_FILES["fileToUpload"]["tmp_name"];
        header("Location:./product.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>