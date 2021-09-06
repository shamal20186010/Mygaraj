<?php
session_start();
include './Db_connection/Db_conn.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>

    <body>
        <?php include '../web/common/heder.php'; ?>
        <div align="center"> 
            <h2>Shopping Cart</h2> <br>
            <table border="1" class="table table-striped">


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
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th>Items</th>
                                    <th class="center">Product Name</th>
                                    <th class="center">Product Description</th>
                                    <th class="center">Product Price</th>
                                    <th class="center">Qty</th>
                                    <th class="center">Total</th>
                                    <th class="right">Remove</th>
                                </tr>
                            </thead>
                            <tr>
                                <td><?php echo $cartItem[0]; ?></td>
                                <td><img  src="Sources/uploads/<?php echo $row["productName"] ?>.jpg" width="90" height="90" /> </td> 
                                <td><?php echo $row['productName']; ?></td>
                                <td><?php echo $row['productDescription']; ?></td> 
                                <td><?php echo $row['price']; ?></td> 
                                <td><?php echo $cartItem[1]; ?></td> 
                                <td><?php echo ($rowamu); ?></td> 
                                <td><a href="Sources/removeFromCart.php?pid=<?php echo $cartItem[0]; ?>">
                                        <input type="button"  value="Remove"></a></td> 
                            </tr>       <?php
                        }
                    }
                }
                if (!$isProduct) {
                    echo 'cart Empty';
                }
                ?>
            </table>
            <br>
            <label>Products Total : <?php echo $totalAmu ?></label>
            <a href="/Mygaraj.lk/Sources/checkout.php"><input type="button" name="Checkout" value="Checkout"></a>

        </div>
    </body>
</html>
