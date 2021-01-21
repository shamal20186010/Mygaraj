<?php
include './Db_connection/Db_conn.php';
include '../web/common/heder.php';
?>
<html lang="en">
    <head>
        <title>Orders</title>
        
    
              
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      
    </head>
    <body style="background-color: #cccccc;">

        <div class="container"style="background-color: #ffffff;margin-top: 20px;">
            <form method="POST" action=""><br>
               
                <h3>Address</h3>
                    <label for="productName" class="visually-hidden">Address</label>
                       <input type="text" id="productName" name="productName" class="form-control" style="width:450px;padding-right:50px;"required autofocus><br><br>
             <hr class="my-4">
                <form>
                    <h2>Order Iterm</h2>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Iterm code</th>
                                <th>Iterm name</th>
                                <th>Qty</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                    </table>
                </form><br><br><br><br>
            </form>
            <hr class="my-4">
            <h2>Order Table</h2><br>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Order number</th>
                        <th>Shippin status</th>


                    </tr>
                </thead>
                <?php
                $query = "SELECT id_order,orderNumber,shippinStatus FROM orders";
                $result = $connection->query($query);
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row["id_order"]; ?></td>
                        <td><?php echo $row["orderNumber"]; ?></td>
                        <td><?php echo $row["shippinStatus"]; ?></td>

                    </tr>
                    <?php
                }
                ?>
            </table><br><br>
        </div>

    </body>
</html>
