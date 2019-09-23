<?php
/*This is the connection file. It establishes the network connection to the SQL database. */
	
	$username = "be983639";
	$password = "Calypso18!";
	$database = "be983639";
	
	$connection = mysqli_connect("localhost" , "$username" , "$password", "$database") or die(mysql_error());  //(host,username,password,) Connects to mysql server. Throws error if it cannot connect. 
?>