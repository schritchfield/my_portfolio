<?php
/* This file displays the navigation menu. It also contains the login modal, and associated processing code. In that modal it links to the account creation page as well. */
	session_start();

	include("connect.php"); //connect to database
	
	if((isset($_POST['submit'])) && (!isset($_SESSION['logged_in']))) {//if not already logged in and form has been submitted

		$username = $_POST['username'];
		$password = $_POST['password'];
		//$phash = sha1(sha1($password."salt")."salt");
		$sql = "SELECT * FROM member WHERE username='$username' AND password='$password'"; //Check entered credentials against database, using encrypted password
		$result = mysqli_query($connection, $sql); //Execute the sql query and store result in $result
		if (mysqli_num_rows($result) == 1){		//if account exists

			$row = mysqli_fetch_assoc($result);
			
			$_SESSION['logged_in'] = true;
			$_SESSION['logged_in_user'] = $username;

			header("Location: index.php");

		}else{
			echo '<script type="text/javascript">alert("Incorrect Username or Pawwsord.");</script>';
		}
	} 
	else {
		//do nothing
	}

	function debug_to_console( $data ) {
	    $output = $data;
	    if ( is_array( $output ) )
	        $output = implode( ',', $output);

	    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
	}

	debug_to_console( "Test" );
?>

<?php
			
	if (isset($_SESSION['logged_in_user'])) {     //If logged in, show this
?>
	<nav class="navbar navbar-expand-md fixed-top text-dark">
			<a class="navbar-brand cursive" href="index.php" id="brandtxt">SurfComp</a> 
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav1"> 
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="nav1">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link navtxt" href="index.php" style="color:#fcf5e2;">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link navtxt" href="location.php" style="color:#fcf5e2;">Locations</a>
					</li>
					<li class="nav-item">
						<a class="nav-link navtxt" href="news.php" style="color:#fcf5e2;">News</a>
					</li>
					<li class="nav-item">
						<a class="nav-link navtxt" href="profile.php" style="color:#fcf5e2;">Profile</a>
					</li>
					<li class="nav-item">
						<a class="nav-link navtxt" href="contact.php" style="color:#fcf5e2;">Contact</a>
					</li>
					<li class="nav-item">
						<a class="nav-link navtxt" href="logout.php" style="color:#f7a992;">Logout</a>
					</li>
				</ul>
			</div>
    </nav>

<?php
	} 			
	else {    //Display logged out nav here
?>

	<nav class="navbar navbar-expand-md fixed-top text-dark">
			<a class="navbar-brand cursive" href="index.php" id="brandtxt">SurfComp</a> 
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav1"> 
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="nav1">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link navtxt" href="index.php" style="color:#fcf5e2;">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link navtxt" href="location.php" style="color:#fcf5e2;">Locations</a>
					</li>
					<li class="nav-item">
						<a class="nav-link navtxt" href="news.php" style="color:#fcf5e2;">News</a>
					</li>
					<li class="nav-item">
						<a class="nav-link navtxt" href="profile.php" style="color:#fcf5e2;">Profile</a>
					</li>
					<li class="nav-item">
						<a class="nav-link navtxt" href="contact.php" style="color:#fcf5e2;">Contact</a>
					</li>
					<li class="nav-item">
						<a class="nav-link navtxt" href="login.php" style="color:#f7a992;">Log In</a>
					</li>
				</ul>
			</div>
    </nav>

<?php			
	}
?>