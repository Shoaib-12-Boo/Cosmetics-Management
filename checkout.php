<?php
	include 'header.php';
	 session_start();
	 if(!isset($_SESSION['id']))      // if there is no valid session
	  {
	      echo '<script type="text/javascript">'; 
	        echo 'alert("Please login to your account  !!!!!")'; 
	        echo '</script>';
	    echo "<script> window.location.href = 'http://localhost/shoaibfyp/signin.php';</script>";
	    exit;
	  }	
	  $products=[];
	  $ids='';
	  if(isset($_SESSION["products"])){
	  $ids=$_SESSION["products"];	
	  $products= explode(',',$_SESSION["products"]);
	}
	include 'navbar.php';
	
?>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
						<form action="finish.php" class="billing-form" method="POST">
							<?php 
							if (isset($_POST['proceed_checkout'])) {
							 if(isset($_POST['items']))
						     {
						     	$items='';
						     	$qy=[];
						     	foreach ($_POST['items']['i'] as $key=>$roc) {
						     		if($items=='')
						     		$items=	$roc;
						     	    else
						     	    $items.=','.$roc;
						     	    $qy[$roc]=	$_POST['items']['q'][$key];
						     		?>
                                <input type="hidden" name="items[itm][]" value="<?= $roc ?>">
                                <input type="hidden" name="items[quenty][]" value="<?= $_POST['items']['q'][$key] ?>">
						     	<?php }
						     }
						     
							}

							 ?>
							<h3 class="mb-4 billing-heading">Billing Details</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
		                <div class="form-group">
		                	<label for="firstname">Name</label>
		                  <input type="text" class="form-control" name="customer_name" placeholder="Enter your name" required />
		                </div>
	             	</div>
	             	<div class="col-md-12">
		                <div class="form-group">
		                	<label for="firstname">Email</label>
		                  <input type="text" class="form-control" name="customer_email" placeholder="Enter your email" required />
		                </div>
	             	</div>
	              <div class="col-md-12">
	                <div class="form-group">
	                	<label for="lastname">Address </label>
	                  <input type="text" name="cust_address" class="form-control" placeholder="Enter your address" required />
	                </div>
                </div>
                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
	                	<label for="towncity">Town / City</label>
	                  <input type="text" class="form-control" placeholder="Enter your city name" name = 'city_town' required />
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="postcodezip">Postcode / ZIP *</label>
	                  <input type="number" class="form-control" placeholder="Postal code" name="post_code" required />
	                </div>
		            </div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Phone</label>
	                  <input type="text" class="form-control" placeholder="Enter your name" name="phone" required />
	                </div>
	              </div>
                <div class="w-100"></div>
	            </div>
					</div>
					<div class="col-xl-5">
	          <div class="row mt-5 pt-3">
	          	<div class="col-md-12 d-flex mb-5">
	          		<div class="cart-detail cart-total p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Cart Total</h3>
	          			 <?php
						    include 'admin/includes/conn.php';
						    $sql = "SELECT * FROM product_description WHERE `id` in ($items)";
						    $result = mysqli_query($conn, $sql);
						    if (mysqli_num_rows($result) > 0) {
						    $total=0;	
						    while($row = mysqli_fetch_assoc($result)) {
						        $dis = $row['discount'];
						        $product_img = $row['product_img'];
						        $pri = $row['product_prize'];
						        $priz = $pri*$dis;
						        $priz=$priz/100;
						        $itemq=$qy[$row['id']];
						        $prize = $pri-$priz;
						        $total+=$prize*$itemq;
						    }
						}        

						     ?>	
		    					<p class="d-flex total-price">
		    						<span>Total</span>
		    						<span>Rs. <?php echo $total ?></span>
		    					</p>
							</div>
	          	</div>
	          	<div class="col-md-12">
	          		<div class="cart-detail p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Payment Method</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label>Cash on Delivery</label>
											</div>
										</div>
									</div>
									<p><input type="submit" class="btn btn-primary py-3 px-4" value="Place an order" name="submit"></p>
								</div>
	          	</div>
	          </form><!-- END -->
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->
<?php
include 'footer.php';
?>