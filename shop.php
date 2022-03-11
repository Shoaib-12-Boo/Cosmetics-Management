<?php
  
  include 'header.php';
  include 'admin/includes/conn.php';
  session_start();
  $products=[];
  if(isset($_SESSION["products"]))
  $products= explode(',',$_SESSION["products"]);  
  include 'navbar.php';

?>
<style type="text/css">
    .ftco-section{
        overflow: hidden;
    }
    .selected-item{
        background-color: red !important;
    }
</style>
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.png');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Products</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-5 mb-5 text-center">
    				<ul class="product-category  nav nav-pills" role="tablist">
                        <li><a class="nav-link active" data-toggle="pill" href="#all_items">All</a></li>
                        <li><a class="nav-link" data-toggle="pill" href="#Perfumes">Perfumes</a></li>
                        <li><a class="nav-link" data-toggle="pill" href="#Jewery">Jewelry</a></li>
                        <li><a class="nav-link" data-toggle="pill" href="#Mackup">Mackup</a></li>
                        <li><a class="nav-link"data-toggle="pill" href="#Brands">Brands</a></li>
                    </ul>
    			</div>
    		</div>
            <div class="tab-content row">
                <div id="all_items" class="container tab-pane active">
                    <div class="row">
                        <?php
                            $sql = "SELECT * FROM product_description ";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $dis = $row['discount'];
                                $product_img = $row['product_img'];
                                $pri = $row['product_prize'];
                                // $priz = $dis*$pri;
                                // $prize = $priz/100;
                                $prize= 1000;
                            ?>
                                <div class="col-md-6 col-lg-3 ftco-animate cart-item" data-product="<?= $row['id'] ?>">
                                    <div class="product">
                                        <a href="#" class="img-prod">
                                          <img class="img-fluid" src="<?php echo 'admin/'.$product_img; ?>" alt="Product Image" height='100px' > 
                                          <span class="status"><?php echo $row["discount"]; ?>%</span>
                                            <div class="overlay"></div>
                                        </a>
                                        <div class="text py-3 pb-4 px-3 text-center">
                                            <h3><a href="#"><?php echo $row["product_name"]; ?></a></h3>
                                            <div class="d-flex">
                                                <div class="pricing">
                                                    <p class="price"><span class="mr-2 price-dc"><?php echo $row["product_prize"]; ?></span><span class="price-sale"><?php
                                                    echo number_format($row["product_prize"] - $prize , 2) ;
                                                    ?></span></p>
                                                    <p class="price"><span class="mr-2 ">Date</span><?php
                                                    echo date('d-M-Y' , strtotime($row["dates"])) ?></p>
                                                    <p class="price"><span class="mr-2 ">Quantity</span><?php
                                                    echo $row["product_quantity"];?>kg</p>
                                                </div>
                                            </div>
                                            <div class="bottom-area d-flex px-3">
                                                <div class="m-auto d-flex" >
                                                    <a href="view_product.php?id=<?php echo $row['id'];?>" class="add-to-cart d-flex justify-content-center align-items-center text-center" target="_blank">
                                                        <span><i class="ion-ios-menu"></i></span>
                                                    </a>
                                                    <a href="#" class="buy-now <?= (in_array($row['id'],$products))?'selected-item':'select-item' ?> d-flex justify-content-center align-items-center mx-1" >
                                                        <span><i class="ion-ios-cart"></i></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }
                                } else {
                                    echo "0 results";
                                }
                        ?>
                    </div>
                </div>
                <div id="vagetables" class="container tab-pane">
                    <div class="row">
                        <?php
                            $sql = "SELECT * FROM product_description WHERE product_type = 'Perfumes'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $dis = $row['discount'];
                                $product_img = $row['product_img'];
                                $pri = $row['product_prize'];
                                $priz = $dis*$pri;
                                $prize = $priz/100;
                        ?>
                        <div class="col-md-6 col-lg-3 ftco-animate cart-item" data-product="<?= $row['id'] ?>">
                            <div class="product">
                                <a href="#" class="img-prod">
                                  <img class="img-fluid" src="<?php echo 'admin/'.$product_img; ?>" alt="Product Image" height='100px' > 
                                  <span class="status"><?php echo $row["discount"]; ?>%</span>
                                    <div class="overlay"></div>
                                </a>
                                <div class="text py-3 pb-4 px-3 text-center">
                                    <h3><a href="#"><?php echo $row["product_name"]; ?></a></h3>
                                    <div class="d-flex">
                                        <div class="pricing">
                                            <p class="price"><span class="mr-2 price-dc"><?php echo $row["product_prize"]; ?></span><span class="price-sale"><?php
                                            echo $row["product_prize"] - $prize;
                                            ?></span></p>
                                            <p class="price"><span class="mr-2 ">Date</span><?php
                                            echo $row["dates"]?></p>
                                            <p class="price"><span class="mr-2 ">Quantity</span><?php
                                            echo $row["product_quantity"];?>kg</p>
                                        </div>
                                    </div>
                                    <div class="bottom-area d-flex px-3">
                                        <div class="m-auto d-flex" >
                                            <a href="view_product.php?id=<?php echo $row['id'];?>" class="add-to-cart d-flex justify-content-center align-items-center text-center" target="_blank">
                                                <span><i class="ion-ios-menu"></i></span>
                                            </a>
                                            <a href="#" class="buy-now <?= (in_array($row['id'],$products))?'selected-item':'select-item' ?> d-flex justify-content-center align-items-center mx-1" >
                                                <span><i class="ion-ios-cart"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }
                            } else {
                                echo "0 results";
                            }
                        ?>
                    </div>
                </div>
                <div id="fruits" class="container tab-pane fade">
                    <div class="row">
                        <?php
                            $sql = "SELECT * FROM product_description WHERE product_type = 'Jewelry'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $dis = $row['discount'];
                                $product_img = $row['product_img'];
                                $pri = $row['product_prize'];
                                $priz = $dis*$pri;
                                $prize = $priz/100;
                        ?>
                        <div class="col-md-6 col-lg-3 ftco-animate cart-item" data-product="<?= $row['id'] ?>">
                            <div class="product">
                                <a href="#" class="img-prod">
                                  <img class="img-fluid" src="<?php echo 'admin/'.$product_img; ?>" alt="Product Image" height='100px' > 
                                  <span class="status"><?php echo $row["discount"]; ?>%</span>
                                    <div class="overlay"></div>
                                </a>
                                <div class="text py-3 pb-4 px-3 text-center">
                                    <h3><a href="#"><?php echo $row["product_name"]; ?></a></h3>
                                    <div class="d-flex">
                                        <div class="pricing">
                                            <p class="price"><span class="mr-2 price-dc"><?php echo $row["product_prize"]; ?></span><span class="price-sale"><?php
                                            echo $row["product_prize"] - $prize;
                                            ?></span></p>
                                            <p class="price"><span class="mr-2 ">Date</span><?php
                                            echo $row["dates"]?></p>
                                            <p class="price"><span class="mr-2 ">Quantity</span><?php
                                            echo $row["product_quantity"];?>kg</p>
                                        </div>
                                    </div>
                                    <div class="bottom-area d-flex px-3">
                                        <div class="m-auto d-flex" >
                                            <a href="view_product.php?id=<?php echo $row['id'];?>" class="add-to-cart d-flex justify-content-center align-items-center text-center" target="_blank">
                                                <span><i class="ion-ios-menu"></i></span>
                                            </a>
                                            <a href="#" class="buy-now <?= (in_array($row['id'],$products))?'selected-item':'select-item' ?> d-flex justify-content-center align-items-center mx-1" >
                                                <span><i class="ion-ios-cart"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }
                            } else {
                                echo "0 results";
                            }
                        ?>
                    </div>
                </div>
                <div id="juices" class="container tab-pane fade">
                    <div class="row">
                        <?php
                            $sql = "SELECT * FROM product_description WHERE product_type = 'Mackup'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $dis = $row['discount'];
                                $product_img = $row['product_img'];
                                $pri = $row['product_prize'];
                                $priz = $dis*$pri;
                                $prize = $priz/100;
                        ?>
                        <div class="col-md-6 col-lg-3 ftco-animate cart-item" data-product="<?= $row['id'] ?>">
                            <div class="product">
                                <a href="#" class="img-prod">
                                  <img class="img-fluid" src="<?php echo 'admin/'.$product_img; ?>" alt="Product Image" height='100px' > 
                                  <span class="status"><?php echo $row["discount"]; ?>%</span>
                                    <div class="overlay"></div>
                                </a>
                                <div class="text py-3 pb-4 px-3 text-center">
                                    <h3><a href="#"><?php echo $row["product_name"]; ?></a></h3>
                                    <div class="d-flex">
                                        <div class="pricing">
                                            <p class="price"><span class="mr-2 price-dc"><?php echo $row["product_prize"]; ?></span><span class="price-sale"><?php
                                            echo $row["product_prize"] - $prize;
                                            ?></span></p>
                                            <p class="price"><span class="mr-2 ">Date</span><?php
                                            echo $row["dates"]?></p>
                                            <p class="price"><span class="mr-2 ">Quantity</span><?php
                                            echo $row["product_quantity"];?>kg</p>
                                        </div>
                                    </div>
                                    <div class="bottom-area d-flex px-3">
                                        <div class="m-auto d-flex" >
                                            <a href="view_product.php?id=<?php echo $row['id'];?>" class="add-to-cart d-flex justify-content-center align-items-center text-center" target="_blank">
                                                <span><i class="ion-ios-menu"></i></span>
                                            </a>
                                            <a href="#" class="buy-now <?= (in_array($row['id'],$products))?'selected-item':'select-item' ?> d-flex justify-content-center align-items-center mx-1" >
                                                <span><i class="ion-ios-cart"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }
                            } else {
                                echo "0 results";
                            }
                        ?>
                    </div>
                </div>
                <div id="drieds" class="container tab-pane fade">
                    <div class="row">
                        <?php
                            $sql = "SELECT * FROM product_description WHERE product_type = 'Brands'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $dis = $row['discount'];
                                $product_img = $row['product_img'];
                                $pri = $row['product_prize'];
                                $priz = $dis*$pri;
                                $prize = $priz/100;
                        ?>
                        <div class="col-md-6 col-lg-3 ftco-animate cart-item" data-product="<?= $row['id'] ?>">
                            <div class="product">
                                <a href="#" class="img-prod">
                                  <img class="img-fluid" src="<?php echo 'admin/'.$product_img; ?>" alt="Product Image" height='100px' > 
                                  <span class="status"><?php echo $row["discount"]; ?>%</span>
                                    <div class="overlay"></div>
                                </a>
                                <div class="text py-3 pb-4 px-3 text-center">
                                    <h3><a href="#"><?php echo $row["product_name"]; ?></a></h3>
                                    <div class="d-flex">
                                        <div class="pricing">
                                            <p class="price"><span class="mr-2 price-dc"><?php echo $row["product_prize"]; ?></span><span class="price-sale"><?php
                                            echo $row["product_prize"] - $prize;
                                            ?></span></p>
                                            <p class="price"><span class="mr-2 ">Date</span><?php
                                            echo $row["dates"]?></p>
                                            <p class="price"><span class="mr-2 ">Quantity</span><?php
                                            echo $row["product_quantity"];?>kg</p>
                                        </div>
                                    </div>
                                    <div class="bottom-area d-flex px-3">
                                        <div class="m-auto d-flex" >
                                            <a href="view_product.php?id=<?php echo $row['id'];?>" class="add-to-cart d-flex justify-content-center align-items-center text-center" target="_blank">
                                                <span><i class="ion-ios-menu"></i></span>
                                            </a>
                                            <a href="#" class="buy-now <?= (in_array($row['id'],$products))?'selected-item':'select-item' ?> d-flex justify-content-center align-items-center mx-1" >
                                                <span><i class="ion-ios-cart"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }
                            } else {
                                echo "0 results";
                            }
                        ?>
                    </div>
                </div>
            </div>
    	</div>
    </section>

<?php
include 'footer.php';
?>