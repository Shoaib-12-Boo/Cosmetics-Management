<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'cosmetic_management';
$conn = mysqli_connect($host,$user,$pass,$db);
if (!$conn) {
	echo "Check your Connection";
}