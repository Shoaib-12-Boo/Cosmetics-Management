<?php
  include 'header.php';
?>
  <div class="wrapper ">
    <?php include 'sidebar.php'; ?>
    <div class="main-panel">
      <?php include 'navbar.php'; ?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Products List</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Date</th>
                        <th>Product Name</th>
                        <th>Product Prize</th>
                        <th>Product Quantity</th>
                        <th>Discount</th>
                        <th>Product Type</td>
                        <th>Product Discription</th>
                        <th>Product Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </thead>
                      <?php
                      $id = 0;
                        include 'includes/conn.php';
                        $sql = "SELECT * FROM product_description ";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                          $id++;
                            ?>
                            <tr>
                              <td><label><?php echo $id;?></label></td>
                              <td><label><?php echo $row["dates"];?></label></td>
                              <td><label><?php echo $row["product_name"];?></label></td>
                              <td><label><?php echo $row["product_prize"];?></label></td>
                              <td><label><?php echo $row["product_quantity"];?></label></td>
                              <td><label><?php echo $row["discount"];?></label></td>
                              <td><label><?php echo $row["product_type"];?></label></td>
                              <td><label><?php echo $row["product_description"];?></label></td>
                              <td><label>
                                <img src="<?php echo $row["product_img"];?>" width='50px' height='50px'>
                              </label></td>

                              <td><label><a href="edit_product.php?id=<?php echo $row['id'];?>" class="btn btn-danger" name="edit">Edit</a></label></td>

                              <td><label><a href="delet_product.php?id=<?php echo $row['id'];?>" class="btn btn-warning" name="delete">Delete</a></label></td>
                            </tr>
                            <?php
                            }
                        } else {
                            echo "<tr><th clospan='9'>0 results</th></tr>";
                        }
                        ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php
  include 'footer.php';
?>