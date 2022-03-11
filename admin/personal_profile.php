<?php
  include 'header.php';
  include ('includes/conn.php');
  $admin_user_name = $_SESSION['user'];
  $sql = "SELECT * FROM admin WHERE username='" .$admin_user_name."'";
  $result = mysqli_query($conn,$sql);
  $row  = mysqli_fetch_array($result);
  $u_name = $row['username'];
  $u_pass = $row['password'];
  $full_name = $row['full_name'];
  $father_name = $row['father_name'];
  $email = $row['email'];
  $address = $row['address'];
  $admin_image = $row['admin_img'];
?>
  <div class="wrapper ">
    <?php include 'sidebar.php'; ?>
    <div class="main-panel">
      <?php include 'navbar.php'; ?>
      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">
                <img src="<?php echo $admin_image; ?>" width="50px" height="50px">
                <?php echo $full_name; ?>'s Profile</h4>
            </div>
            <div class="card-body">
              <div id="typography">
                <div class="card-title">
                  <h2>Profile Detail</h2>
                </div>
                <div class="row">
                  <form action="" method="post" class="add_product_form" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-4">
                          <label>User Name</label>
                        </div>
                        <div class="col-8">
                          <input type="text" name="username" placeholder="User Name" value="<?php echo $u_name; ?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <label>Password</label>
                        </div>
                        <div class="col-8">
                          <input type="password" name="password" placeholder="Password" value="<?php echo $u_pass; ?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <label>Full Name</label>
                        </div>
                        <div class="col-8">
                          <input type="text" name="full_name" placeholder="Full Name" value="<?php echo $full_name; ?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <label>Father's Name</label>
                        </div>
                        <div class="col-8">
                          <input type="text" name="father_name" placeholder="Father's Name" value="<?php echo $father_name; ?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <label>Email</label>
                        </div>
                        <div class="col-8">
                          <input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <label>Address</label>
                        </div>
                        <div class="col-8">
                          <textarea name="address" placeholder="Address"><?php echo $address; ?></textarea>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <label>Profile Image</label>
                        </div>
                        <div class="col-8">
                          <input type="file" name="profile_img" value="Submit">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <label>Submit Form</label>
                        </div>
                        <div class="col-8">
                          <input type="submit" name="add_profile_submition" value="Update" class="add_product_submition">
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
if (isset($_POST['add_profile_submition'])) {
  $user_pass = $_POST['password'];
  $admin_full_name = $_POST['full_name'];
  $admin_father_name = $_POST['father_name'];
  $admin_email = $_POST['email'];
  $admin_address = $_POST['address'];
  $file_name = $_FILES['profile_img']['name'];
  $target = "assets/";
  $target = $target . basename($_FILES['profile_img']['name']);
  $ok = 1;
  if(move_uploaded_file($_FILES['profile_img']['tmp_name'], $target))
  {
  $query = "UPDATE admin SET password='$user_pass', full_name='$admin_full_name', father_name='$admin_father_name', email='$admin_email',  address='$admin_address',  admin_img='$target' WHERE username='$admin_user_name';";
    // echo $query;
    // exit;
    $result = mysqli_query($conn, $query);
    if ($result) {
      echo '<script type="text/javascript">'; 
      echo 'alert("Submitted Succesfully  !!!!!")'; 
      echo '</script>';
      echo "<script> window.location.href = 'http://localhost/shoaibfyp/admin/personal_profile.php';</script>";
    }else {
      echo "<script> alert('Please try again'); </script>";
    }
  }
}
?>