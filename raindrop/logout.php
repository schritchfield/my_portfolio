<?php
/*This file logs the user out by unsetting the session. */
	session_start();

	session_unset();
		
	header("Location: home.php");
?>