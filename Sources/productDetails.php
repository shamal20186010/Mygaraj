<?php
include '../web/common/heder.php';
include './Db_connection/Db_conn.php';
$pid = "";
 if(isset($_GET['pid'])){$pid = $_GET['pid'];}
  if($pid==""){     header("Location:/Mygaraj.lk/index.php");     die();}
 
 $query = "Select * from product where id_product = '".$pid."'";
 
 $result = $connection->query($query);
 
 $name;$category;$desc;$Price;$proImage;$iteamCode;
 
 if($result->num_rows > 0){
     $row=$result->fetch_assoc();
      $name = $row["productName"];
      $category= $row["productCategory"];
      $desc = $row["productDescription"];
      $Price = $row["price"];
      $iteamCode = $row["iteamCode"];
      $proImage = $row["products_profile_img"];
 }else{
     header("Location:/Mygaraj.lk/index.php?msg=Product not Found !");
 }

?>
<title>Product details</title>
<link href="web/assets/dist/css/productDetails.css" rel="stylesheet" type="text/css"/>
<div class="super_container">
    <div class="single_product">
        <div class="container-fluid" style=" background-color: #fff; padding: 11px;margin-top: 50px;">
            <div class="row"style="margin-left:10px;">
                <div class="col-lg-4 order-lg-2 order-1"style="width: 700px;">
                    
                    
                    <div class="image_selected" ><img src="Sources/uploads/<?php echo $row["productName"] ?>.jpg" alt=""style="width: 600px;"></div>
                </div>
                <div class="col-lg-6 order-3" >
                    <div class="product_description">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Accessories</li>
                            </ol>
                        </nav><br><br>
                        <div class="product_name"><?php echo $desc;?></div>
                        <div class="product-rating"><span class="badge badge-success"><i class="fa fa-star"></i></span> <span class="rating-review">Full Model :<?php echo $name;?></span></div>
                        <div class="product-rating"><span class="badge badge-success"><i class="fa fa-star"></i></span> <span class="rating-review">Category :<?php echo $category;?></span></div>
                        <div class="product-rating"><span class="badge badge-success"><i class="fa fa-star"></i></span> <span class="rating-review">Iteam code:<?php echo $iteamCode;?></span></div>
                        <div> <span class="product_price">Rs:<?php echo $Price;?></span> <strike class="product_discount"> <span style='color:black'><span> </strike> </div>
                        
                        <hr class="singleline">
                        <br><br>
                        <hr class="singleline">
                        <div class="order_info d-flex flex-row">
                            <form action="#">
                        </div>
                        <div class="row">
                            <div class="col-xs-6" style="margin-left: 13px;">
                                <div class="product_quantity"> <span>QTY: </span> <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                                </div>
                            </div>
                            <div class="col-xs-6"style="margin-right: 50px;"> <button type="button" class="btn btn-primary shop-button"onclick="location.href='/Mygaraj.lk/Sources/addToCart.php?pid=<?php echo $row['id_product'];?>'">Add to Cart</button>
                                <button type="button" class="btn btn-success shop-button"onclick="location.href='/Mygaraj.lk/Sources/checkout.php'">Buy Now</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<?php
include '../web/common/footer.php';
?>