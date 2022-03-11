<?php
  include 'header.php';
  session_start();
  $products=[];
  if(isset($_SESSION["products"]))
  $products= explode(',',$_SESSION["products"]); 
  include 'navbar.php';
?>
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.png');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Contact us</span></p>
            <h1 class="mb-0 bread">Contact us</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section bg-light">
      <div class="container">
      	<div class="row d-flex mb-5 contact-info">
          <div class="w-100"></div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Address:<br /></span>   GCUF , Punjab, Pakistan</p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Phone:<br /></span> <a href="tel://1234567920">+92 307 5125112</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Email:<br /></span> <a href="mailto:info@yoursite.com">shoaibshafique@gmail.com</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Website<br /></span> <a href="#">COSMETICSMANAGEMENT.com</a></p>
	          </div>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="#" class="bg-white p-5 contact-form" action="" method="post">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name" name="contact_per_name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email" name="contact_per_email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject" name="contact_per_subject">
              </div>
              <div class="form-group">
                <input type="date" class="form-control" placeholder="Subject" name="contact_per_date">
              </div>
              <div class="form-group">
                <textarea id="" cols="30" rows="7" class="form-control" placeholder="Message" name="contact_per_msg" style="resize: none;"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5" name="contact_sent">
              </div>
            </form>
          
          </div>

          <div class="col-md-6 d-flex">
          </div>
        </div>
      </div>
    </section>

<?php
  include 'footer.php';
include ('admin/includes/conn.php');
if (isset($_POST['contact_sent'])) {
  $contact_per_name = $_POST['contact_per_name'];
  $contact_per_email = $_POST['contact_per_email'];
  $contact_per_subject = $_POST['contact_per_subject'];
  $contact_per_msg = $_POST['contact_per_msg'];
  $contact_per_date = $_POST['contact_per_date'];
  // $file_name = $_FILES['product_img']['name'];
  // $target = "assets/";
  // $target = $target . basename($_FILES['product_img']['name']);
  // $ok = 1;
  // if(move_uploaded_file($_FILES['product_img']['tmp_name'], $target))
  // {
    $query = "INSERT INTO contacted_user (contact_per_date,contact_per_name, contact_per_email, contact_per_subject, contact_per_msg) VALUES ('$contact_per_date', '$contact_per_name', '$contact_per_email', '$contact_per_subject', '$contact_per_msg');";
    // echo $query;
    // exit;
    $result = mysqli_query($conn, $query);
    if ($result) {
      // header('location:admin_dashboard.php');
      echo "<script> alert('Your Message Submitted sucesfully'); </script>";
    }else {
      echo "<script> alert('Please Try Again Later'); </script>";
    }
  // }
}
?>