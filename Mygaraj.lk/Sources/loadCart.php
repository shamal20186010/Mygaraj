<?php

include './Db_connection/Db_conn.php';
$loadCartQuery = "select * from invoice i join invoice_items j on i.id_invoice = j.id_invoice"
        . " where i.invoiced_to = '".$row['id_user']."' and status='2' ";

$res = $connection->query($loadCartQuery);

    $cart = array();
    $currentInvoiceId = "";
if ($res->num_rows > 0) {
    while($rows = $res->fetch_assoc()){
       $cartItem = array($rows['id_product'],$rows['quantity']); 
       array_push($cart, $cartItem);
       $currentInvoiceId = $rows['id_invoice'];
   }
   }
 
$_SESSION['current_invoice_id'] = $currentInvoiceId;
$_SESSION['cart'] = $cart;