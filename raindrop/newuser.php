<!DOCTYPE html>
<html lang="en">
<!-- This is the user account creation page. There is some javascript that validates the stuff the user is entering. -->
    <head>
        <title>Raindrop Pop - Category - Ben Schritchfield</title>
        <meta charset="utf-8">
        <meta name="description" content="Store">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script src="js/process_form.js"></script>
    </head>
    <body>

        <?php include 'navmenu.php'; ?>

        <h2 id="create_header">Create an account</h2>

		<form id="signup" method="post" name="myform" >
			
			<div class="userInfo">
				<input id="username" type="text" name="username" value="" placeholder="Username" onblur="validateUser()"><div id="checkimg"></div><span class="hints" id="userHint">Username cannot contain special characters.</span><br>
				<input id="password" type="password" name="password" value="" placeholder="Password" onblur="validatePass()"><div id="checkimg2"></div><span class="hints" id="passHint">Password must be at least 8 characters</span><br>
				<input id="verify" type="password" name="verify" value="" placeholder="Verify Password"onblur="validateVerify()"><div id="checkimg3"></div><span class="hints" id="verifyHint">Passwords do not match.</span><br>
				<input id="phonenum" type="text" name="phone" value="" placeholder="Phone number"onblur="validatePhone()"><div id="checkimg4"></div><span class="hints" id="phoneHint">Must be 10 digits and use dashes.</span><br>
				<input id="emailAdr" type="text" name="email" value="" placeholder="Email address" onblur="validateEmail()"><div id="checkimg5"></div><span class="hints" id="emailHint">Must follow the format X@X.XXX.</span><br>
				<input id="address" type="text" name="address" value="" placeholder="Street address" onblur="validateAddress()"><div id="checkimg6"></div><span class="hints" id="addressHint">Address cannot contain special characters.</span><br>

				<a href="#">View terms of service</a>

				<input id="createbtn" type="submit" name="submit" value="Submit">
			</div>
		</form>

    </body>
</html>

<?php
	include("db_connect.php"); //Connects to database

	$cartId = $_SESSION['cartstring'];
	
	if(isset($_POST['submit'])){
		
		$username = $_POST["username"];
		$password = $_POST["password"];
		$phone = $_POST["phone"];
		$email = $_POST["email"];
		$address = $_POST["address"];

		$phash = sha1(sha1($password."salt")."salt");
		$sql = "SELECT * FROM raindrop_users WHERE username='$username' AND password='$phash'"; //Check to see if account already exists
		$result = mysqli_query($connection, $sql); //store results of query in $result var
		
			if (mysqli_num_rows($result) == 1){	//If at least one result
				echo "Account already exists. Please try a new username."; //account already exists
		
			}else{	//If new account
				
				$sql = "INSERT INTO raindrop_users (id, username, password, email, admin, phone, address, cart_hash) VALUES (NULL, '$username', '$phash', '$email', '0', '$phone', '$address', '$cartId')"; //prepare to add stats to database table
				mysqli_query($connection, $sql); //run the query

				$_SESSION['logged_in'] = true;
				$_SESSION['logged_in_user'] = $username;
				$_SESSION['isAdmin'] = 0;

				//echo "Account successfully created. Log in to get started! You will be redirected to the login page in 5 seconds.";
				header("Refresh: 0; url=home.php"); //Takes user to login page in 5 secs
			}
	}

?>