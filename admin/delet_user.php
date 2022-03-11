<?php
	include ('includes/conn.php');
	global $conn;
	if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$result = mysqli_query($conn, "DELETE FROM regestration WHERE id=$id");
	if ($result) {
	echo '<script type="text/javascript">'; 
      echo 'alert("Deleted Succesfully  !!!!!")'; 
      echo '</script>';
      echo "<script> window.location.href = 'http://localhost/shoaibfyp/admin/all_users.php';</script>";
	}
	else{
		echo '<script type="text/javascript">'; 
      echo 'alert("Please Try again  !!!!!")'; 
      echo '</script>';
      echo "<script> window.location.href = 'http://localhost/shoaibfyp/admin/all_users.php';</script>";
	}
}
?>