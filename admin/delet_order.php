<?php
	include ('includes/conn.php');
	global $conn;
	if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$deleteorder = "DELETE FROM checkout_proceed  WHERE id = ".$id;
	$deleteorder1 = "DELETE FROM checkout_product  WHERE chockout_id = ".$id;
    $updateaprove_result = mysqli_query($conn, $deleteorder);
    $updateaprove_result1 = mysqli_query($conn, $deleteorder1);
	if ($updateaprove_result && $updateaprove_result1) {
	echo '<script type="text/javascript">'; 
      echo 'alert("Deleted Succesfully  !!!!!")'; 
      echo '</script>';
      echo "<script> window.location.href = 'http://localhost/shoaibfyp/admin/all_orders.php';</script>";
	}
	else{
		echo '<script type="text/javascript">'; 
      echo 'alert("Please Try again  !!!!!")'; 
      echo '</script>';
      // echo "<script> window.location.href = 'http://localhost/shoaibfyp/admin/all_products.php';</script>";
	}
}
?>