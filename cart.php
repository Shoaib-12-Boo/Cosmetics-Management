<?php
session_start();

include 'header.php';

$string = @$_SESSION["products"];
  


include 'admin/includes/conn.php';

$ids = '';
$no_data = '';
if (empty($_SESSION["products"])) { 
  $no_data = "No data found!! Please Add some items to your cart. <a href='shop.php'> Go TO Shop </a>"; 
  $ids = 100000;
}
else{
  $products=[];

  if(isset($_SESSION["products"])){
  
    if ($string[0]  == ',') {
      $ids = substr($_SESSION["products"] , 1);
    }
    else{
      $ids=$_SESSION["products"];         
    }



    $products= explode(',',$_SESSION["products"]);
  }

}

if (!isset($_SESSION['products'])) {
  @$products;
}

?>
<?php 

//   include 'navbar.php';

?>
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.png');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>
    
    <!-- <form action="checkout.php" method="post" accept-charset="utf-8"> -->
    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>Product Image</th>
						        <th>Product name</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
						    <?php 

								$sql = "SELECT * FROM product_description WHERE `id` in (".$ids.")";
								$result = mysqli_query($conn, $sql);

						    if (mysqli_num_rows($result) > 0) {
						    $total=0;	
						    while($row = mysqli_fetch_assoc($result)) {
						        $proid = $row['id'];
						        $dis = $row['discount'];
						        $product_img = $row['product_img'];
                    			$pri = $row['product_prize'];
						        $priz = $pri*$dis;
						        $priz=$priz/100;
						        $total+=$prize = $pri-$priz;
						     ?>	
						      <tr class="text-center delete_from_cart_main" data-pro_ses_id="<?php echo $proid; ?>"  >
						        <td class="product-remove"  ><a href="#"><span class="delete_from_cart ion-ios-close"></span></a>&nbsp;</td>
						        
						        <td class="image-prod"><div class="img" style="background-image:url(admin/<?= $product_img ?>);"></div></td>
						        
						        <td class="product-name">
						        	<h3><?= $row['product_name'] ?></h3>
						        	<p>discount:<?= $dis ?>%</p>
						        </td>
						        
						        <td class="price">RS.<?= $pri ?></td>
						         
						        <td class="quantity" data-price="<?= $prize ?>">
						        	<div class="input-group mb-3">
						        	<input type="hidden" name="items[i][]" value="<?= $row['id'] ?>">	
					             	<input type="number" name="items[q][]" onkeyup="calculate(this,event)" class="quantity form-control input-number" value="1" min="1" max="100">
					          	</div>
					          </td>
						        
						        <td class="total" data-total="<?= $prize ?>">Rs.<?= $prize ?></td>
						      </tr><!-- END TR-->
                              <?php }
                          }else{
                            echo $no_data;
                          } ?>
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
          <div class="col-lg-4 mt-5 cart-wrap ftco-animate"></div>
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<!-- <p class="d-flex">
    						<span>Subtotal</span>
    						<span>$20.60</span>
    					</p>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span>$0.00</span>
    					</p>
    					<p class="d-flex">
    						<span>Discount</span>
    						<span>$3.00</span>
    					</p>
    					<hr> -->
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span class="final-amount">Rs.<?= @$total?></span>
    					</p>
    				</div>
    				<p><input type="submit" class="btn btn-primary py-3 px-4" value="Proceed to Checkout" name="proceed_checkout"></p>
    			</div>
          <div class="col-lg-4 mt-5 cart-wrap ftco-animate"></div>
    		</div>
			</div>
		</section>
    </form>


<?php
  include 'footer.php';
?>