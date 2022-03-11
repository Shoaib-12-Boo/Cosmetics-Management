<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Cosmetics Management</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          	<li class="nav-item dropdown">
	              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
	              <div class="dropdown-menu" aria-labelledby="dropdown04">
	              	<a class="dropdown-item" href="shop.php">Shop</a>
	                <a class="dropdown-item" href="cart.php">Cart</a>
	              </div>
	            </li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
	          <li class="nav-item dropdown">
	              <a class="nav-link dropdown-toggle" href="#" id="dropdown06" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
	              <div class="dropdown-menu" aria-labelledby="dropdown06">
	              <?php
					  if(!isset($_SESSION['id']))      // if there is no valid session
					  {?>
	              		<a class="dropdown-item" href="Signin.php">Signin & Signup</a>
					      
					   <?php
					  }else { ?>
					
	              	<a class="dropdown-item" href="sign_out.php">Signout</a><?php
					}?>
	              </div>
	          </li>
	          <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link count-cart" data-count="<?php @$products; echo count(@$products); ?>"><span class="icon-shopping_cart"></span><span class="counter">[<?php @$products; echo count(@$products); ?>]</span></a></li>

	        </ul>
	      </div>
	    </div>
	</nav>
    <!-- END nav -->