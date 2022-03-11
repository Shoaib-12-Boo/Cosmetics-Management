<?php
	include 'includes/conn.php';
?>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <link href="assets/css/login.css" rel="stylesheet" />
<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6 admin_login_form">
		<h3> Admin's Login Panel</h3>
		<form method="post" action="">
			<input type="text" name="admin_username" placeholder="Username" required>
			<input type="password" name="admin_password" placeholder="Password" required>
			<input type="submit" name="admin_login" value="Submit" class="admin_login_form_submit">
		</form>
	</div>
	<div class="col-sm-3"></div>
</div>
<?php
session_start();
if(!empty($_POST["admin_login"])) {
	$admin_username = $_POST["admin_username"];
	$admin_password = $_POST["admin_password"];
	$sql = "SELECT * FROM admin WHERE username='" .$admin_username. "' and password = '".$admin_password."'";
	$result = mysqli_query($conn,$sql);
	$row  = mysqli_fetch_array($result);
	$_SESSION['user'] = $_POST['admin_username'];
	$u_name = $row['username'];
	$u_pass = $row['password'];
	if($u_name == $admin_username && $u_pass == $admin_password) {
		header('location:dashboard.php');
	} else {
		header('location:dashboard.php');
		
		// echo "<script> alert('Please check you username or password'); </script>";
	}
}
?>