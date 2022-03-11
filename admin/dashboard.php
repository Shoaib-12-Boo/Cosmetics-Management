<?php
  include 'header.php';
  include 'includes/conn.php';
?>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <div class="wrapper ">
    <?php include 'sidebar.php'; ?>
    <div class="main-panel">
      <?php include 'navbar.php'; ?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-user"></i>
                  </div>
                  <p class="card-category">All Users</p>
                  <h3 class="card-title">
                     <?php
                        $sql = "SELECT * FROM regestration ";
                        $result = mysqli_query($conn, $sql);
                        $i = 0;
                        if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                          $j= ++$i;
                        }
                          echo $j;
                        }else{
                          echo "0";
                        }
                        ?>
                  </h3>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-flag"></i>
                  </div>
                  <p class="card-category">Total Orders</p>
                  <h3 class="card-title">
                    <?php
                        $sql = "SELECT * FROM checkout_proceed ";
                        $result = mysqli_query($conn, $sql);
                        $l = 0;
                        $j = 0;
                        if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                          $j= ++$l;
                        }
                        }
                          echo $j;
                        ?>
                  </h3>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-product-hunt"></i>
                  </div>
                  <p class="card-category">All Products</p>
                  <h3 class="card-title">
                    <?php
                        $sql = "SELECT * FROM product_description ";
                        $result = mysqli_query($conn, $sql);
                        $i = 0;
                        $m = 0;
                        if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                          $m= ++$i;
                        }
                        }
                          echo $m;
                        ?>
                  </h3>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-exclamation"></i>
                  </div>
                  <p class="card-category">Product Types</p>
                  <h3 class="card-title">4</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-balance-scale"></i>
                  </div>
                  <p class="card-category">Total Sale</p>
                  <h3 class="card-title">
                     <?php
                        $sql = "SELECT * FROM checkout_proceed WHERE status = 1";
                        $result = mysqli_query($conn, $sql);
                        $j = 0;
                        $mn = 0;
                        if (mysqli_num_rows($result) >= 0) {
                          while($row = mysqli_fetch_assoc($result)) {
                          //echo ++$mn.'<br />';
                            $j += $row['grand_total'];
                          }
                          echo $j;
                        }
                        ?>
                  </h3>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-bell-slash"></i>
                  </div>
                  <p class="card-category">Pending Orders</p>
                  <h3 class="card-title">
                    <?php
                        $sql = "SELECT * FROM checkout_proceed WHERE status = '0'";
                        $result = mysqli_query($conn, $sql);
                        $n = 0;
                        $m = 0;
                        if (mysqli_num_rows($result) > 0) {
                          while($row = mysqli_fetch_assoc($result)) {
                            $m = ++$n;
                          }
                            echo $m;
                        }else{
                          echo $n;
                        }
                        ?>
                  </h3>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-bell"></i>
                  </div>
                  <p class="card-category">Notifications</p>
                  <h3 class="card-title">
                    <?php
                        $sql = "SELECT * FROM contacted_user";
                        $result = mysqli_query($conn, $sql);
                        $q = 0;
                        $l = 0;
                        if (mysqli_num_rows($result) > 0) {
                          while($row = mysqli_fetch_assoc($result)) {
                            $l = ++$q;
                          }
                        }
                          echo $l;
                        ?>
                  </h3>
                </div>
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