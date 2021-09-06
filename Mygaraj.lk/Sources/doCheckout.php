<?php
session_start();
include './Db_connection/Db_conn.php';
$Fname = "";
$Lname ="";
$address = "";
$city="";
$contactNo = "";
$email = "";
$username = "";
$password = "";
$cart = "";


$user_ID = "";
if (isset($_SESSION['userid'])) {
    $user_ID = $_SESSION['userid'];
}

$is_login = false;
if (isset($_SESSION['is_login'])) {
    $is_login = $_SESSION['is_login'];
}
$last_id_invoice = "";
if (isset($_SESSION['current_invoice_id'])) {$last_id_invoice = $_SESSION['current_invoice_id'];
}



if(isset($_POST['firstName'])){$Fname = $_POST['firstName'];}
if(isset($_POST['lastName'])){$Lname = $_POST['lastName'];}
if(isset($_POST['address'])){$address = $_POST['address'];}
if(isset($_POST['city'])){$city = $_POST['city'];}
if(isset($_POST['contact_number'])){$contactNo = $_POST['contact_number'];}
if(isset($_POST['email'])){$email = $_POST['email'];}

if(isset($_POST['username'])){$email = $_POST['username'];}
if(isset($_POST['password'])){$password = $_POST['password'];}

//cart data
if(isset($_SESSION['cart'])){$cart = $_SESSION['cart'];}

    if($cart==''){header("Location:/Mygaraj.lk/Sources/cart.php?msg=Cart not found !");die();}

 
    if(!$is_login){
    ///register new user part not require for registerd and logged in users !
$insertQuery = "INSERT INTO `users`
(
`firstName`,`lastName`,
`address`,
`mobile`,
`email`,
`password`,
`user_type`,
`is_active`)
VALUES
('".$Fname."','".$Lname."','".$address."','".$contactNo."',
'".$email."',
'".$password."',
'2',
'1')";
// echo $insertQuery;
 $result = $connection->query($insertQuery); 
 
   $user_ID =0;
   if($result===TRUE){
      $user_ID =  $connection->insert_id;
       $_SESSION["userid"] = $user_ID;
   }else{
       echo "ERROR ".mysqli_error($connection);
   }
  }
   
   
    if($last_id_invoice!=""){
        //remove previous temp carts
        $dropCartQuery = "delete from invoice_items  where id_invoice = '".$last_id_invoice."' ";

$res = $connection->query($dropCartQuery);
    }
       $totalAmu = 0.0; 
               
  if($last_id_invoice==""){
   $saveInvoice = "insert into "
           . "invoice(inv_date,total,invoiced_to,invoiced_check_by,status) values"
           . "(now(),'".$totalAmu."','".$user_ID."',null,'2')";   
   
//   echo $saveInvoice;
   $resultx = $connection->query($saveInvoice);
       echo "invoice saved Successfully !";
     $last_id_invoice = $connection->insert_id;
     $_SESSION["current_invoice_id"] = $last_id_invoice;     
       echo "Invoice ID : ".$last_id_invoice; 
  }
       
       
       
       //save all the items !!!
           foreach ($cart as $cartItem){
               $querySaveItem = "insert into invoice_items(id_product,id_invoice,quantity,price)"
              . " values('".$cartItem[0]."', '".$last_id_invoice."', '".$cartItem[1].
                       "',(select price from product where id_product ='".$cartItem[0]."' ) )"; 
              $pitem = $connection->query($querySaveItem);
              if($pitem===true){
                  echo $cartItem[0]." saved success";
               }else{
                   echo "error".mysqli_error($connection);
                   }      
   } 
   
   
             $updateInvoiceTotal = "update invoice i set i.total = (select sum(ii.price*ii.quantity) from 
invoice_items ii where ii.id_invoice = i.id_invoice) where i.id_invoice =  '".$last_id_invoice."' ";
   
              if($connection->query($updateInvoiceTotal)===true){
                  echo " invoice total updated successfully !";
               }else{
                   echo "error".mysqli_error($connection);
                   }      
     
               
               //payment Confirmation page
               header("Location:/Mygaraj.lk/Sources/invoice.php");
   
   ?>