<?php
/* This file displays the navigation menu, and prints different ones depending on the user access level. It also contains the login modal, and associated processing code. In that modal it links to the account creation page as well. */
	session_start();

	include("db_connect.php"); //connect to database
	
	if((isset($_POST['submit'])) && (!isset($_SESSION['logged_in']))) {//if not already logged in and form has been submitted

		$username = $_POST['username'];
		$password = $_POST['password'];
		$phash = sha1(sha1($password."salt")."salt");
		$sql = "SELECT * FROM raindrop_users WHERE username='$username' AND password='$phash'"; //Check entered credentials against database, using encrypted password
		$result = mysqli_query($connection, $sql); //Execute the sql query and store result in $result
		if (mysqli_num_rows($result) == 1){		//if account exists

			$row = mysqli_fetch_assoc($result);
			
			$_SESSION['logged_in'] = true;
			$_SESSION['logged_in_user'] = $username;
			$_SESSION['hascart'] = 1;
			$_SESSION['cartstring'] = $row['cart_hash'];

			/*$message = $row['admin'];
			echo "<script type='text/javascript'>alert('$message');</script>";*/ //DEBUG FOR ADMIN STATUS

			if($row['admin'] == 2){
				$_SESSION['isAdmin'] = 2;
			}
			else if($row['admin'] == 1){
				$_SESSION['isAdmin'] = 1;
			}
			else{
				$_SESSION['isAdmin'] = 0;
			}
			
			//echo "You are now logged in " . $_SESSION['logged_in_user'] . ". You will be redirected to the homepage.";
		}else{
			echo "Invalid username and password"; // PUT AN ALERT HERE, DONT ECHO!
		}
	} 
	else {
		//do nothing
	}
	
	//CART SYSTEM===========================================================================


    if(!isset($_SESSION['hascart'])) {

        $_SESSION['cartstring'] = sha1(sha1(rand(1, 9999)."salt")."salt");

        $_SESSION['hascart'] = 1;
    }
    else{
    	//$_SESSION['cartstring'] = 44;
    }


?>

<?php
			
	if (!isset($_SESSION['logged_in_user'])) {     //If not logged in, only show basic nav

		?>
		<nav class="navbar">
		<ul>
		<li class="barlink"><a href="home.php">Home</a></li>
		<li class="barlink"><a href="catalog.php">Store</a></li>
		<li class="barlink"><a href="contact.php">Contact</a></li>
		<button id="loginbutton" onclick="document.getElementById('login_modal').style.display='block'">Login</button>
		<li class="barlink"><a href="cart.php">Shopping Cart</a></li>
		</ul>
		<form action="search.php" method="POST">
        	<input id="search" type="text" name="search" />
        	<input id="searchbtn" type="submit" value="Search" />
    	</form>
		</nav>
	
<?php
	} 
	else {
		if ($_SESSION['isAdmin'] == 2) {    //Only display link to Admin page if user is an admin
			
			?>
			<nav class="navbar">
			<ul>
			<li><a href="home.php">Home</a></li>
			<li><a href="catalog.php">Store</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="cart.php">Shopping Cart</a></li>
			<li><a href="profile.php">My Account</a></li>
			<li><a href="admin.php">Administrative</a></li>
			<li><a href="logout.php">Logout</a></li>
			</ul>
			<form action="search.php" method="POST">
        		<input id="search" type="text" name="search" />
        		<input id="searchbtn" type="submit" value="Search" />
    		</form>
			</nav>	
			<?php
		}
		else if ($_SESSION['isAdmin'] == 1) {    //Only display link to Admin page if user is an admin
			
			?>
			<nav class="navbar">
			<ul>
			<li><a href="home.php">Home</a></li>
			<li><a href="catalog.php">Store</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="cart.php">Shopping Cart</a></li>
			<li><a href="profile.php">My Account</a></li>
			<li><a href="admin.php">Advanced</a></li>
			<li><a href="logout.php">Logout</a></li>
			</ul>
			<form action="search.php" method="POST">
        		<input id="search" type="text" name="search" />
        		<input id="searchbtn" type="submit" value="Search" />
    		</form>
			</nav>	
			<?php
		}

		else {    //Display regular user nav here
			
			?>
			<nav class="navbar">
			<ul>
			<li><a href="home.php">Home</a></li>
			<li><a href="catalog.php">Store</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="cart.php">Shopping Cart</a></li>
			<li><a href="profile.php">My Account</a></li>
			<li><a href="logout.php">Logout</a></li>
			</ul>
			<form action="search.php" method="POST">
        		<input id="search" type="text" name="search" />
        		<input id="searchbtn" type="submit" value="Search" />
    		</form>
			</nav>	
			<?php			
		}
	}
?>

<div id="login_modal" class="modal">

  	<form class="loginbox" action="" method="POST">

  		<div class="modal_header">
  			<h2>Login</h2>
			<span onclick="document.getElementById('login_modal').style.display='none'" class="close" title="Close">&times;</span>
 		</div> 

	    <div class="container">
	      <label for="user"><b>Username</b></label>
	      <input type="text" placeholder="Enter Username" name="username" required>

	      <label for="pass"><b>Password</b></label>
	      <input type="password" placeholder="Enter Password" name="password" required>
	        
	      <!--<button class="logbtn" type="submit">Login</button>-->
	      <input type="submit" name="submit" value="Log In">
	      <label>
	        <input id="rmbr" type="checkbox" checked="checked" name="remember"> Remember me
	      </label>
	      	    <span class="pass">Forgot <a href="#">password?</a></span>
	      	    <span class="pass">Create an <a href="newuser.php">Account</a></span>

	    </div>

	  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('login_modal');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>