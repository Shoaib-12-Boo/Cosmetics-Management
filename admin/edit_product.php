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
                <?php
                include ('includes/conn.php');
                  global $conn;
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
            <div class="card-header card-header-primary">
              <h4 class="card-title">
              <img src="<?php echo $product_img; ?>" width="50px" height="50px">
                Edit Product(<?php echo $product_name; ?>) Detail</h4>
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
                          <input type="date" name="dates" placeholder="Product Name" value="<?php echo $row["dates"];?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <label>Product Name</label>
                        </div>
                        <div class="col-8">
                          <input type="text" name="product_name" placeholder="Product Name" value="<?php echo $row["product_name"];?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <label>Product Prize</label>
                        </div>
                        <div class="col-8">
                          <input type="number" name="product_prize" placeholder="Product Prize" value='<?php echo $row["product_prize"];?>'>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <label>Product Quantity</label>
                        </div>
                        <div class="col-8">
                          <input type="text" name="product_quantity" placeholder="Product Quantity" value="<?php echo $row["product_quantity"];?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <label>Discount</label>
                        </div>
                        <div class="col-8">
                          <input type="number" name="discount" placeholder="Discout" value="<?php echo $row["discount"];?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <label>Product Type</label>
                        </div>
                        <div class="col-8">
                          <select name="product_type">
                            <option> <?php echo $row["product_type"];?> </option>
                            <?php 
                              if ($row["product_type"] != 'Lepsticks') {?>
                                <option value="Lepsticks">Lepsticks</option>
                              <?php
                              }
                              if ($row["product_type"] != 'Jewelery') {?>
                            <option value="Jewelery">Jewelery</option>
                            <?php
                              }
                              if ($row["product_type"] != 'Creams&Jels') {?>
                            <option value="Creams&Jels">Creams&Jels</option>
                            <?php
                              }
                              if ($row["product_type"] != 'Shampoo&Lotions') {?>
                            <option value="Shampoo&Lotions">Shampoo&Lotions</option>
                          <?php }?>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <label>Product Discription</label>
                        </div>
                        <div class="col-8">
                          <textarea name="product_description" placeholder="Product Discription"><?php echo $row["product_description"];?></textarea>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <label>Product Image</label>
                        </div>
                        <div class="col-8">
                          <input type="file" name="product_img" value="Submit">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <label>Submit Form</label>
                        </div>
                        <div class="col-8">
                          <input type="submit" name="edit_product_submition" value="Submit" class="add_product_submition">
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
if (isset($_POST['edit_product_submition'])) {
  $product_description = $_POST['product_description'];
  $product_type = $_POST['product_type'];
  $discount = $_POST['discount'];
  $product_quantity = $_POST['product_quantity'];
  $product_prize = $_POST['product_prize'];
  $product_name = $_POST['product_name'];
  $dates = $_POST['dates'];
  $file_name = $_FILES['product_img']['name'];
  $target = "assets/";
  $target = $target . basename($_FILES['product_img']['name']);
  $ok = 1;
  if(move_uploaded_file($_FILES['product_img']['tmp_name'], $target))
  {
    $query = "UPDATE product_description SET dates='$dates', product_name='$product_name', product_prize='$product_prize', product_quantity='$product_quantity',  discount='$discount', product_type='$product_type', product_description='$product_description',  product_img='$target' WHERE id=$id;";
    // echo $query;
    // exit;
    $result = mysqli_query($conn, $query);
    if ($result) {
      // header('location:admin_dashboard.php');
      echo '<script type="text/javascript">'; 
      echo 'alert("Submitted Succesfully  !!!!!")'; 
      echo '</script>';
      echo "<script> window.location.href = 'http://localhost/shoaibfyp/admin/all_products.php';</script>";
    }else {
      echo "<script> alert('Please Try again'); </script>";
    }
  }
}
?>