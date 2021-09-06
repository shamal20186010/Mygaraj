<?php
session_start();
include './Db_connection/Db_conn.php';

$user_ID = "";
if (isset($_SESSION['userid'])) {
    $user_ID = $_SESSION['userid'];
}

$is_login = false;
if (isset($_SESSION['is_login'])) {
    $is_login = $_SESSION['is_login'];
}


$Fname = "";
$Lname = "";
$address = "";
$city = "Colombo";
$contactNo = "";
$email = "";
if ($is_login) {
    $query2 = "select * from users where id_user = '" . $user_ID . "'";
    $resultUser = $connection->query($query2);
    $record = $resultUser->fetch_assoc();
    $Fname = $record['firstName'];
    $Lname = $record['lastName'];
    $address = $record['address'];
    $contactNo = $record['mobile'];
    $email = $record['email'];
}
?>
<?php
include '../web/common/heder.php';
?>
<title>Provide delivery address</title>
<link href="web/assets/dist/css/checkout.css"rel="stylesheet"/>
<html lang="en">

    <body class="bg-light">

        <div class="container">
            <main>
                <div class="py-5 text-center">
                    <h2>Checkout form</h2>
                </div>
                <div class="row g-3">
                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">Billing address</h4>
                        <form class="needs-validation" novalidate method="post"action="/Mygaraj.lk/Sources/doCheckout.php">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="firstName" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName"placeholder="" value="<?php echo $Fname; ?>" required>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="lastName" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName"placeholder="" value="<?php echo $Lname; ?>" required>
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">Email </label>
                                    <input type="email" class="form-control" id="email" name="email"placeholder="Email"value="<?php echo $email; ?>">
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"placeholder="Address" value="<?php echo $address; ?>" required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="contact_number" class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" id="contact_number" name="contact_number"placeholder="Contact Number" value="<?php echo $contactNo; ?>" required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>
                                 <?php if (!$is_login) { ?>   
                                <div class="col-sm-6">
                                    <label for="username" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="firstName" name="username"placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="lastName" name="password"placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>
                            <?php } ?>
                                <div class="col-md-5">
                                    <label for="country" class="form-label">Country</label>
                                    <select class="form-select" id="country" required>
                                        <option value="Sri lanka">Sri lanka</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid country.
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="state" class="form-label">State</label>
                                    <select class="form-select" id="state" required>
                                        <option value="Province">Province</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>
                                
                                
                                
                            </div>
                            <hr class="my-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="same-address">
                                <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="save-info">
                                <label class="form-check-label" for="save-info">Save this information for next time</label>
                            </div>
                            <hr class="my-4">
                            <h4 class="mb-3">Payment</h4>
                            <div class="my-3">
                                <div class="form-check">
                                    <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                                    <label class="form-check-label" for="credit">Credit card</label>
                                </div>
                                <div class="form-check">
                                    <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                                    <label class="form-check-label" for="debit">Debit card</label>
                                </div>
                                <div class="form-check">
                                    <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
                                    <label class="form-check-label" for="paypal">PayPal</label>
                                </div>
                            </div>
                            <div class="row gy-3">
                                <div class="col-md-6">
                                    <label for="cc-name" class="form-label">Name on card</label>
                                    <input type="text" class="form-control" id="cc-name" placeholder="" required>
                                    <small class="text-muted">Full name as displayed on card</small>
                                    <div class="invalid-feedback">
                                        Name on card is required
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="cc-number" class="form-label">Credit card number</label>
                                    <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Credit card number is required
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="cc-expiration" class="form-label">Expiration</label>
                                    <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Expiration date required
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="cc-cvv" class="form-label">CVV</label>
                                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Security code required
                                    </div>
                                </div>
                            </div><br>
                            <!--                           table -->
                           
                                   
                            <table class="table table-striped">
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
                                     </tbody>
                            </table>
                                        
                            <hr class="my-4">
                            <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button><br><br><br><br>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
<script src="web/assets/dist/js/checkout.js"></script>
<?php
include '../web/common/footer.php';
?>