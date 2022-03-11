    <footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Cosmetics Management</h2>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="https://www.linkedin.com/in/shoaib-shafique-9b3525218/"><span class="icon-linkedin"></span></a></li>
                <li class="ftco-animate"><a href="https://www.facebook.com/profile.php?id=100009868776434"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="https://www.instagram.com/shoaib__boo/"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="shop.php" class="py-2 d-block">Shop</a></li>
                <li><a href="about.php" class="py-2 d-block">About</a></li>
                <li><a href="contact.php" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">GCUF, Punjab, Pakistan</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+92 304 9510074</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">kanwal.bilal927@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="js/main.js"></script>
  <script type="text/javascript">


   $(document).ready(function() {
     $('body').on('click', '.delete_from_cart', function(event) {
      event.preventDefault();
      var proid = $(this).closest('.delete_from_cart_main').data("pro_ses_id");
      // var boxcout=$('body').find('.count-cart');
      // var count=boxcout.data('count');
      var $this=$(this); 
      var boxcout=$('body').find('.count-cart');
      var count=boxcout.data('count');

      // alert(count);
// alert(proid);
// return false;
      $.ajax({
        url: 'addTOCart.php',
        type: 'POST',
        dataType: 'json',
        data: {proid: proid ,  action : 'delete_from_sessions'},
      })
      // .done(function(response) {
      //   count =  count-1;
      //   if(response.result=='success')
      //   {  
      //   boxcout.find('.counter').html('['+count+']');
      //   boxcout.data('count',count);
      //   $this.addClass('selected-item');
      //   $this.removeClass('select-item');
      //   }
      // })
      .done(function(response) {
        count = count - 1;
        if(response.result=='success')
        {  
        boxcout.find('.counter').html('['+count+']');
        boxcout.data('count',count);
        $this.addClass('select-item');
        $this.removeClass('selected-item');
        }
      })



      .fail(function() {
        console.log("error");
      })

      .always(function() {
        console.log("complete");
      });

      $(this).closest('.delete_from_cart_main').remove();
     });

     $('body').on('click', '.select-item', function(event) {
       event.preventDefault();

      var $this=$(this); 
      var productid= $(this).closest('.cart-item').data('product');
      var boxcout=$('body').find('.count-cart');
      var count=boxcout.data('count');

           // alert(count);

      $.ajax({
        url: 'addTOCart.php',
        type: 'POST',
        dataType: 'json',
        data: {product: productid},
      })
      .done(function(response) {
        count = count + 1;
        // count++;
        if(response.result=='success')
        {  
        boxcout.find('.counter').html('['+count+']');
        boxcout.data('count',count);
        $this.addClass('selected-item');
        $this.removeClass('select-item');
        }
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      
       /* Act on the event */
     });
   });
   function calculate(el,event) {
    $this=$(el);
    var quentity=$this.val();
    var row=$this.closest('tr');
    var price=row.find('.quantity').data('price');
    var itemprice=parseFloat(quentity*price).toFixed(2);
    var tprice=0;
    row.find('.total').data('total',itemprice);
    row.find('.total').html('Rs.'+itemprice);
    var items=$('.total');
    var spanbox=$('body').find('.total-price');
    $.each(items,function() {
       spanbox.find('.final-amount').html('');
       if(tprice==0)
       tprice=parseFloat($(this).data('total'));
       else{
        var tprice2 = parseFloat($(this).data('total'));
// console.log(tprice1); 
// console.log(tprice2); 
// console.log(tprice); 
        tprice= parseFloat(tprice) + parseFloat(tprice2);
      }
        spanbox.find('.final-amount').html('Rs.'+tprice);
     
    });
    
   

   }
  </script>  
  </body>
</html>