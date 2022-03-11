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
                  <h4 class="card-title ">All User's List</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Password</th>
                        <th>Full Name</th>
                        <th>Father's Name</th>
                        <th>Gender</th>
                        <th>Address</td>
                        <th>Profile Image</th>
                        <th>Delete</th>
                      </thead>
                      <?php
                      $id = 0;
                        include 'includes/conn.php';
                        $sql = "SELECT * FROM regestration ";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                          $id++;
                            ?>
                            <tr>
                              <td><label><?php echo $id;?></label></td>
                              <td><label><?php echo $row["username"];?></label></td>
                              <td><label><?php echo $row["pass"];?></label></td>
                              <td><label><?php echo $row["full_name"];?></label></td>
                              <td><label><?php echo $row["father_name"];?></label></td>
                              <td><label><?php echo $row["gender"];?></label></td>
                              <td><label><?php echo $row["address"];?></label></td>
                              <td><label>
                                <img src="<?php echo  '../' .$row["profile_img"];?>" width='50px' height='50px' />
                              </label></td>
                              <td><label><a href="delet_user.php?id=<?php echo $row['id'];?>" class="btn btn-warning btn-sm" name="delete">Delete</a></label></td>
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