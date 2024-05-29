<?php
include './Db_connection/Db_conn.php';
?>
<html lang="en">
    <head>
        <title>Product</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <!-- Bootstrap core CSS -->
        <link href="../web/assets/dist/css/bootstrap.min.css" rel="stylesheet">


        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>
    </head>
    <body>

        <div class="container">


            <form method="POST" action="doProduct_register.php" ><br><br>
                <h1>Register Producct</h1><br><br>
                <label>Product name</label>
                <label for="productName" class="visually-hidden">Product name</label>
                <input type="text" id="productName" name="productName"class="form-control" placeholder="Product name" style="width:450px;" required autofocus ><br>
                <label>Product description</label>
                <label for="productDescription" class="visually-hidden">Product description</label>
                <input type="text" id="productDescription" name="productDescription"class="form-control" placeholder="Product description"style="width:450px;" required autofocus><br>
                <label>Product category</label>
                <label for="productCategory" class="visually-hidden">Product category</label>
                <input type="text" id="productCategory" name="productCategory" class="form-control" placeholder="Product category"style="width:450px;" required autofocus><br>
                <label>Qty</label>
                <label for="qty" class="visually-hidden">Qty</label>
                <input type="text" id="qty" name="qty" class="form-control" placeholder="Qty" style="width:450px;"required autofocus><br>
                <label>Price</label>
                <label for="price" class="visually-hidden">Price</label>
                <input type="text" id="price" name="price" class="form-control" placeholder="Price" style="width:450px;"required autofocus><br>
                <label>Discount</label>
                <label for="discount" class="visually-hidden">Discount</label>
                <input type="text" id="discount" name="discount"class="form-control" placeholder="Discount" style="width:450px;"required autofocus><br>


                <br>
                <button style="width:450px;"class=" btn btn-lg btn-primary" type="submit"name="submitButton">Save</button><br><br>

            </form><br><br>
            <form action="upload.php" method="POST"  enctype="multipart/form-data" >
                <select name="prod_list"class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"style="width: 450px;">
                    <?php
                    $sql = "SELECT * FROM mygaraj.product;";
                    $result = $connection->query($sql);

                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <option selected><?php echo $row["productName"] ?></option>
                        <?php
                    }
                    ?>
                </select>
                <input type="file" id="fileToUpload" name="fileToUpload" class="form-control" style="width:450px;height:20px;"required autofocus>
                <input type="submit" value="Upload"style="width:450px;"class=" btn btn-lg btn-primary" />
            </form>
            <br><br>
            <h1>Product Table</h1><br>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Iteam code</th>
                        <th>Product name</th>
                        <th>Product description</th>
                        <th>Product category</th>
                        <th>Qty</th>
                        <th>price</th>
                        <th>Discount</th>
                        <th>Update</th>
                        <th>Delete </th>
                    </tr>
                </thead>

                <?php
                $query = "SELECT id_product,iteamCode,productName,productDescription,productCategory,qty,price,discount FROM product";
                $result = $connection->query($query);
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <form action="updateProduct.php" method="POST">
                        <tr>
                            <td><input type="text"name="id_product" id="id_product"value="<?php echo $row["id_product"]; ?>"style="width: 60px;"></td>
                            <td><input type="text"name="iteamCode"id="iteamCode"value="<?php echo $row["iteamCode"]; ?>"style="width: 60px;"></td>
                            <td><input type="text" name="productName"id="productName"value="<?php echo $row["productName"]; ?>"style="width:200px;"></td>
                            <td><input type="text"name="productDescription"id="productDescription"value="<?php echo $row["productDescription"]; ?>"style="width:410px;"></td>
                            <td><input type="text"name="productCategory"id="productCategory"value="<?php echo $row["productCategory"]; ?>"style="width:100px;"></td>
                            <td><input type="text"name="qty"id="qty"value="<?php echo $row["qty"]; ?>"style="width: 60px;"></td>
                            <td><input type="text"name="price"id="price"value="<?php echo $row["price"]; ?>"style="width:100px;"></td>
                            <td><input type="text"name="discount"id="discount"value="<?php echo $row["discount"]; ?>"style="width: 40px;"></td>
                            <td><input type="submit" value="UPDATE"/></td>
                            <td><a href="deleteProduct.php?id_product=<?php echo $row["id_product"]; ?>">DELETE</a></td>
                        </tr>
                    </form>
                    <?php
                }
                ?>
            </table>
        </div>

    </body>
</html>
