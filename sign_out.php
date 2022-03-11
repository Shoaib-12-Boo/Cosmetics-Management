<?php
include('admin/includes/conn.php');
session_start();
unset($_SESSION['user']);
session_destroy();
header('Location:index.php');
?>