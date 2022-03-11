<?php
  include 'header.php';
  session_start();
  $products=[];
  if(isset($_SESSION["products"]))
  $products= explode(',',$_SESSION["products"]); 
  include 'navbar.php';
  include ('admin/includes/conn.php');
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM product_description WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
    $dates = $row['dates'];
    $product_name = $row['product_name'];
    $product_prize = $row['product_prize'];
    $product_quantity = $row['product_quantity'];
    $discount = $row['discount'];
    $product_type = $row['product_type'];
    $product_description = $row['product_description'];
    $product_img = $row['product_img'];
  }
?>
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.png');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="shop.php">Product</a></span> <span>Single Product</span></p>
            <h1 class="mb-0 bread"><?php echo $product_name; ?> Detail</h1>
          </div>
        </div>
      </div>
    </div>
    <form method="post" action="" name="cookie_form">
    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="<?php echo 'admin/'.$product_img; ?>" class="image-popup"><img src="<?php echo 'admin/'.$product_img; ?>" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3><?php echo $product_name; ?></h3>
    				<!-- <div class="rating d-flex">
							<p class="text-left mr-4">
								<a href="#" class="mr-2">5.0</a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
							</p>
							<p class="text-left mr-4">
								<a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
							</p>
							<p class="text-left">
								<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
							</p>
						</div> -->
    				<p class="price"><span style="text-decoration: line-through;"><?php echo $product_prize; ?>.00</span>(<?php echo $discount; ?>% off)</p>
            <p class="price" ><span style="color: red"><?php
                $a = $product_prize*$discount;
                $a = $a/100;
                $b = $product_prize - $a;
                echo $b;
            ?></span>Rs</p>
    				<p><?php echo $product_description; ?></p>
						<div class="row mt-4">
							<div class="w-100"></div>
            <form method="post" action="">
	          	<div class="col-md-12">
	          		<p style="color: #000;"><?php echo $product_quantity; ?> kg available</p>
	          	</div>
          	</div>
              <input type="hidden" name="id" value="<?php echo $id; ?>">
            </form>
            <div class="cart-item" data-product="<?= $_GET['id'] ?>">
              <div class="product" style="display: flex;align-items: center;border: 0;">
                <a href="#" style="width: 45%;background: #82ae46;color: white;margin: 0 5%;" class="buy-now <?= (in_array($_GET['id'],$products))?'selected-item':'select-item' ?> d-flex justify-content-center align-items-center mx-1" >
                  <span><i class="ion-ios-cart"></i></span>
                </a>
                <a href="shop.php" style="width: 45%;background: #82ae46;color: white;margin: 0 5%;text-align: center;">Goto Shop</a>
              </div>
            </div>
          	<!-- <p><a href="cart.php" class="btn btn-black py-3 px-5">Add to Cart</a></p> -->
    			</div>
    		</div>
    	</div>
    </section>
  </form>
<?php
// if (isset($_POST['add_to_cart'])) {
//   $_COOKIE['pro_id'][] = $_POST['id'];
// }
// print_r($_COOKIE);
  include 'footer.php';
?>