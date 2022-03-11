<?php
	include ('includes/conn.php');
	global $conn;
	if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$result = mysqli_query($conn, "SELECT * FROM product_description WHERE id=$id");
?>