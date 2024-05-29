<!doctype html>
<?php
include '../Mygaraj.lk/Sources/Db_connection/Db_conn.php';
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.79.0">
        <title>Mygaraj.lk</title>

    </head>
    <body>

        <?php
        include "../Mygaraj.lk/web/common/heder.php";
        ?>

        <main class="container">

            <div class="starter-template text-center py-5 px-3">
                <h1>Mygaraj.lk</h1>
                <p class="lead">MOST POPULAR WITH USERS<br>  Buy the best spare parrts at mygaraj.lk visit the web page.</p>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php
                $sql = "SELECT * FROM mygaraj.product;";
                $result = $connection->query($sql);

                while ($row = $result->fetch_assoc()) {

                    $iteamCodeq = "SELECT MAX(id_product) As iteamCode FROM product";
                    $productName = $connection->query($iteamCodeq);

                    $resultS = mysqli_fetch_array($productName);
                    ?>
             
                    <div class="col" >
                        <div class="card shadow-sm"style="width:420px;">
                            <a href='/Mygaraj.lk/Sources/productDetails.php?pid=<?php echo $row['id_product']?>'> <img src="Sources/uploads/<?php echo $row["productName"] ?>.jpg" style="height:350px;width: 418px;"></a>
                            <div class="card-body"> 
                                <p class="card-text"><?php echo $row["productDescription"] ?></p>
                                <p class="card-text">Full Model :<?php echo $row["productName"] ?></p>
                                <p class="card-text">Category :<?php echo $row["productCategory"] ?></p>
                                <p class="card-text">Iteam code:<?php echo $row["iteamCode"] ?></p>
                                <h4>Rs:<?php echo $row["price"] ?></h4>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" style="background-color: #cccccc;"onclick="location.href = '/Mygaraj.lk/Sources/productDetails.php?pid=<?php echo $row['id_product']?>'">Buy it Now</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary" style="background-color: #ffff66" onclick="location.href='Sources/addToCart.php?pid=<?php echo $row['id_product'];?>'">Add to cart</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                ?>
                </div>
            <br>
            <br><br><br>
        </main>
        <hr class="my-4">

        <?php
        include "../Mygaraj.lk/web/common/footer.php";
        ?>

    </body>
</html>
