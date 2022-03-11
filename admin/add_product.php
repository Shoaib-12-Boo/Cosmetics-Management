<?php
  include 'header.php';
?>
  <div class="wrapper ">
    <?php include 'sidebar.php'; ?>
    <div class="main-panel">
      <?php include 'navbar.php'; ?>
      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">New Product</h4>
            </div>
            <div class="card-body">
              <div id="typography">
                <div class="card-title">
                  <h2>Product Details</h2>
                </div>
                <div class="row">
                  <form action="" method="post" class="add_product_form" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-4">
                          <label>Date</label>
                        </div>
                        <div class="col-8">
                          <input type="date" name="dates" placeholder="Product Name">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <label>Product Name</label>
                        </div>
                        <div class="col-8">
                          <input type="text" name="product_name" placeholder="Product Name">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <label>Product Prize</label>
                        </div>
                        <div class="col-8">
                          <input type="number" name="product_prize" placeholder="Product Prize">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <label>Product Quantity</label>
                        </div>
                        <div class="col-8">
                          <input type="number" name="product_quantity" placeholder="Product Quantity">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <label>Discount</label>
                        </div>
                        <div class="col-8">
                          <input type="number" name="discount" placeholder="Discout">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <label>Product Type</label>
                        </div>
                        <div class="col-8">
                          <select name="product_type">
                            <option value="Lepsticks">Lepsticks</option>
                            <option value="Brushes">Brushes</option>
                            <option value="Perfumes">Perfumes</option>
                            <option value="Shampoo&Lotions">Shampoo&Lotions</option>
                            <option value="Makeup">Makeup</option>
                            <option value="Jewelery">Jewelery</option>
                            <option value="Creams&Jels">Creams&Jels</option>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <label>Product Discription</label>
                        </div>
                        <div class="col-8">
                          <textarea name="product_description" placeholder="Product Discription"></textarea>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <label>Product Image</label>
                        </div>
                        <div class="col-8">
                          <input type="file" name="product_img">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <label>Submit Form</label>
                        </div>
                        <div class="col-8">
                          <input type="submit" name="add_product_submition" value="Submit" class="add_product_submition">
                        </div>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php
  include 'footer.php';
include ('includes/conn.php');
if (isset($_POST['add_product_submition'])) {
  $product_description = $_POST['product_description'];
  $product_type = $_POST['product_type'];
  $discount = $_POST['discount'];
  $product_quantity = $_POST['product_quantity'];
  $product_prize = $_POST['product_prize'];
  $product_name = $_POST['product_name'];
  $dates = $_POST['dates'];
  $file_name = $_FILES['product_img']['name'];
  $target = "assets/products/";
  $target = $target . basename($_FILES['product_img']['name']);
  $ok = 1;
  if(move_uploaded_file($_FILES['product_img']['tmp_name'], $target))
  {
    $query = "INSERT INTO product_description (dates, product_name, product_prize, product_quantity, discount, product_type, product_description, product_img) VALUES ('$dates', '$product_name', '$product_prize', '$product_quantity', '$discount', '$product_type', '$product_description', '$target');";
    // echo $query;
    // exit;
    $result = mysqli_query($conn, $query);
    if ($result) {
      // header('location:admin_dashboard.php');
      echo "<script> alert('Submitted sucesfully'); </script>";
    }else {
      echo "<script> alert('Please Try again'); </script>";
    }
  }
}
?>