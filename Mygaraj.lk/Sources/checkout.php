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
                        <form class="needs-validation" novalidate>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="firstName" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="lastName" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="username" class="form-label">Username</label>
                                    <div class="input-group">
                                        <span class="input-group-text">@</span>
                                        <input type="text" class="form-control" id="username" placeholder="Username" required>
                                        <div class="invalid-feedback">
                                            Your username is required.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">Email </label>
                                    <input type="email" class="form-control" id="email" placeholder="Email">
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" placeholder="Address" required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>
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
<!--                                <div class="col-md-3">
                                    <label for="zip" class="form-label">Zip</label>
                                    <input type="text" class="form-control" id="zip" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Zip code required.
                                    </div>
                                </div>-->
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
                            </div>
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