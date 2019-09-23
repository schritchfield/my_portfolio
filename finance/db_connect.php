<?php
/*This is the connection file. It establishes the network connection to the SQL database. */

$connection = mysqli_connect ("localhost", "bcsfield_dbuser", "z71^FRS~mWTK", "bcsfield_finance") or die(mysqli_error());

?>