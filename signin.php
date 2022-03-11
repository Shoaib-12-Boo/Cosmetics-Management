<?php
	include 'header.php';
?>
<style type="text/css">
	.py-1.bg-primary{
		display: none;
	}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Regerter/Login</title>
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" action="" method="post" enctype="multipart/form-data">
				<span class="login100-form-title p-b-37">
					Login to your Account
				</span>
					<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
						<input class="input100" type="text" name="username" placeholder="username or email" required>
					</div>
					<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
						<input class="input100" type="password" name="pass" placeholder="password" required>
					</div>
					<div class="container-login100-form-btn">
						<input type="submit" name="signin" class="login100-form-btn" value="Sign In">
					</div>
				</form>
				<div class="text-center">
					<a href="signup.php" class="txt2 hov1">
						Sign Up
					</a>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
<?php
include ('admin/includes/conn.php');
session_start();
if(!empty($_POST["signin"])) {
	$username = $_POST["username"];
	$password = $_POST["pass"];
	$sql = "SELECT * FROM regestration WHERE username='" .$username. "' and pass = '".$password."'";
	$result = mysqli_query($conn,$sql);
	$row  = mysqli_fetch_array($result);
	$_SESSION['id'] = $row['id'];
	$u_name = $row['username'];
	$u_pass = $row['pass'];
	if($u_name == $username && $u_pass == $password) {
		if(isset($_SESSION["products"])){
		header('location:cart.php');	
		}	
		header('location:index.php');
	} else {
		echo "<script> alert('Please check you username or password'); </script>";
	}
}
?>