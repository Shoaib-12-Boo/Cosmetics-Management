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
                  <h4 class="card-title ">All Messages</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Date</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                      </thead>
                      <?php
                      $id = 0;
                        include 'includes/conn.php';
                        $sql = "SELECT * FROM contacted_user ";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                          $id++;
                            ?>
                            <tr>
                              <td><label><?php echo $id;?></label></td>
                              <td><label><?php echo $row["contact_per_date"];?></label></td>
                              <td><label><?php echo $row["contact_per_name"];?></label></td>
                              <td><label><?php echo $row["contact_per_email"];?></label></td>
                              <td><label><?php echo $row["contact_per_subject"];?></label></td>
                              <td><label><?php echo $row["contact_per_msg"];?></label></td>
                            </tr>
                            <?php
                            }
                        } else {
                            echo "0 results";
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