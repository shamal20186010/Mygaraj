<?php
session_start();
include './Db_connection/Db_conn.php';
$orderID = "";
if (isset($_SESSION['current_invoice_id'])) {
    $orderID = $_SESSION['current_invoice_id'];
}
if ($orderID == "") {
    header("Location:/Mygaraj.lk/Sources/cart.php?msg=Cart Requre to process payment");
    die();
}

$user_ID = "";
if (isset($_SESSION['userid'])) {
    $user_ID = $_SESSION['userid'];
}
if ($user_ID == "") {
    header("Location:/Mygaraj.lk/index.php?msg=Please Login or Register before Continue");
    die();
}
?>


<base href ="http://localhost/Mygaraj.lk/">

<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/starter-template/">
<!-- Bootstrap core CSS -->
<link href="web/assets/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="web/assets/dist/css/invoice.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<html>
    <title>Invoice</title>
    <body>
        <div class="container">
            <div class="card">
                <div class="card-header">
                   <?php
                    $query3 = "select * from invoice where invoiced_to = '" . $user_ID . "'";
                    $resultInvoice = $connection->query($query3);
                    $record1 = $resultInvoice->fetch_assoc();
                    ?>
                    Invoice
                    <strong><?php echo $record1['inv_date']?></strong> 
                    <span class="float-right"> <strong>Status:</strong> Pending</span>

                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <div>
                                <h3>Mygaraj.lk</h3>
                            </div>
                            <div>132/5 Colombo 07</div>
                            <div>Email:mygaraj@gmail.com</div>
                            <div>Phone:0769257284</div>
                        </div>

                        <div class="col-sm-6">
                            <div>
                                <h3 style="font-family: Impact;color: #666666;">INVOICE</h3>
                            </div>
                            <div>Invoice No:<?php echo $orderID; ?></div>
                            <div>Invoice Date:</div>
                        </div>

                    </div>
                    <hr>
                    <?php
                    $query2 = "select * from users where id_user = '" . $user_ID . "'";
                    $resultUser = $connection->query($query2);
                    $record = $resultUser->fetch_assoc();
                    ?>
                    <div class="col-sm-6">
                        <h6 class="mb-3">BILL To:</h6>
                        <div><?php echo $record['firstName']?></div>
                         <div><?php echo $record['lastName']?></div>
                        <div><?php echo $record['email']?></div>
                        <div><?php echo $record['mobile']?></div>
                        <div><?php echo $record['address']?></div>
                    </div>
                    <br>
                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th class="center">Product Name</th>
                                    <th class="center">Product Description</th>
                                    <th class="center">Product Price</th>
                                    <th class="center">Qty</th>
                                    <th class="center">Total</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                 <?php
                $totalAmu = 0.0;
                $isProduct = false;
                if (isset($_SESSION['cart'])) {
                    $cart = $_SESSION['cart'];
                    foreach ($cart as $cartItem) {
                        $productQuery = "select * from product where id_product = '" . $cartItem[0] . "' ";
                        $result = $connection->query($productQuery);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $rowamu = ($row['price'] * $cartItem[1]);
                            $totalAmu = $totalAmu + $rowamu;
                            $isProduct = TRUE;
                            ?>
                            
                            <tr>
                                <td><?php echo $cartItem[0]; ?></td>
                                <td><?php echo $row['productName']; ?></td>
                                <td><?php echo $row['productDescription']; ?></td> 
                                <td><?php echo $row['price']; ?></td> 
                                <td><?php echo $cartItem[1]; ?></td> 
                                <td><?php echo ($rowamu); ?></td> 
                               
                            </tr>       <?php
                        }
                    }
                }
                if (!$isProduct) {
                    echo 'cart Empty';
                }
                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5">

                        </div>

                        <div class="col-lg-4 col-sm-5 ml-auto">
                            <table class="table table-clear">
                                <tbody >
                                <th>
                                <tr>
                                    <td class="left">
                                        <strong>Subtotal</strong>
                                    </td>
                                    <td class="right">$8.497,00</td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong>Discount (20%)</strong>
                                    </td>
                                    <td class="right">$1,699,40</td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong>VAT (10%)</strong>
                                    </td>
                                    <td class="right">$679,76</td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong>Total</strong>
                                    </td>
                                    <td class="right">
                                        <strong><?php echo $totalAmu;?></strong>
                                    </td>
                                </tr>
                                </th>

                                </tbody>
                            </table>

                        </div>
                        <div class="row">
                            <div class="col-xs-6 margintop">
                                <p class="lead marginbottom">THANK YOU!</p>

                                <button class="btn btn-success" id="invoice-print"><i class="fa fa-print"></i> Print Invoice</button>
                                <button class="btn btn-danger"><i class="fa fa-envelope-o"></i> Mail Invoice</button>
                            </div>
                        </div>
                        <hr class="my-4">
                    </div>
                </div>
            </div>    </body>
</html>
