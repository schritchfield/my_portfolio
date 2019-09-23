<?php include "header.php";
$_SESSION = array();
session_destroy();
header("Location: login.php");
echo "<script>alert('You have successfully signed out.')</script>";
die();
?>