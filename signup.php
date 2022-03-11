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
					Regester an Account
				</span>
					<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
						<input class="input100" type="text" name="username" placeholder="username or email" required>
					</div>
					<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
						<input class="input100" type="password" name="pass" placeholder="password" required>
					</div>
					<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter your name">
						<input class="input100" type="text" name="full_name" placeholder="Enter your name" required>
					</div>
					<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter your father's name">
						<input class="input100" type="text" name="father_name" placeholder="Enter your father's name" required>
					</div>
					<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter your father's name">
						<select class="input100" name="gender">
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select>
					</div>
					<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter your father's name">
						<textarea class="input100" name="address" placeholder="Enter your address" required></textarea>
					</div>
					<div class="wrap-input100 validate-input m-b-25">
						<input type="file" class="input100" name="profile_img">
					</div>
					<div class="container-login100-form-btn">
						<input type="submit" name="signup" class="login100-form-btn" value="Sign Up">
					</div>
				</form>
				<div class="text-center">
					<a href="signin.php" class="txt2 hov1">
						Sign In
					</a>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
<?php
include ('admin/includes/conn.php');
if (isset($_POST['signup'])) {
  $username = $_POST['username'];
  $pass = $_POST['pass'];
  $full_name = $_POST['full_name'];
  $father_name = $_POST['father_name'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $file_name = $_FILES['profile_img']['name'];
  $target = "images/userprofile/";
  $target = $target . basename($_FILES['profile_img']['name']);
  $ok = 1;
  if(move_uploaded_file($_FILES['profile_img']['tmp_name'], $target))
  {
    $query = "INSERT INTO regestration (username, pass, full_name, father_name, gender, address, profile_img) VALUES ('$username', '$pass', '$full_name', '$father_name', '$gender', '$address', '$target');";
    $result = mysqli_query($conn, $query);
    if ($result) {
      echo "<script> alert('Submitted sucesfully'); </script>";
      echo "<script> window.location.href = 'http://localhost/shoaibfyp/signin.php';</script>";
    }else {
      echo "<script> alert('Please check you username or password'); </script>";
    }
  }
}
?>