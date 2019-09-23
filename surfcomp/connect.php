<?php
$mysql_hostname = "localhost";
$mysql_user = "dig4503_group13";
$mysql_password = "Knights125!#";
$mysql_database = "dig4503_group13";
$prefix = "";
 
$connection = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysqli_select_db($connection, $mysql_database) or die("Could not select database");
?>