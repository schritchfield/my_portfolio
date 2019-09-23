<!DOCTYPE html>
<html lang="en">
<!-- This is the container page for the account details/profile page. It displays the personal information that the user has in the raindrop_users database. -->

    <head>
        <title>Raindrop Pop - My Account - Ben Schritchfield</title>
        <meta charset="utf-8">
        <meta name="description" content="Store">
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    
    <body>
         
        <?php 
        	include("db_connect.php");
        	include 'navmenu.php';

			$currentUser = $_SESSION['logged_in_user'];

			$sql = "SELECT * FROM raindrop_users WHERE username='$currentUser'";	//select from items table
			$result = mysqli_query($connection,$sql); 	   //Run the query

			$row = mysqli_fetch_assoc($result);
		?>

        <h1 class="pagetitle">My Account</h1>

        <div class="bigitem">
	        <p class="bigname"><?php echo $row['username'];?></p>

	        <img id="avatar" src="img/avatar.png">

	        <p class="myinfo_text"><?php echo "E-mail:" . " " . $row['email'];?></p>
	        <p class="myinfo_text"><?php echo "Shipping address: " . $row['address'];?></p>
	        <p class="myinfo_text"><?php echo "Phone number: " . $row['phone'];?></p>

	        <p class=""><?php if ($row['admin'] > 0) {
	            echo "ADMINISTRATOR";
	        }
	            ?></p>

        	<button id="edit_info_btn" onclick="document.getElementById('edituser_modal').style.display='block'">Edit info</button>
    	</div>

<?php
	include("db_connect.php");
	
	if(isset($_POST['submit'])) {//if not already logged in and form has been submitted
		$whatUser = $_SESSION['logged_in_user'];
		//$username = $_POST['username'];

		$sql = "SELECT * FROM raindrop_users WHERE username='$whatUser'"; //Check entered credentials against database, using encrypted password
		$result = mysqli_query($connection, $sql); //Execute the sql query and store result in $result
		if (mysqli_num_rows($result) == 1){		//if account exists

			$row = mysqli_fetch_assoc($result);

			if($_POST['email'] != ''){ 
				$email = $_POST['email'];
				$sql = "UPDATE raindrop_users SET email = '$email' WHERE username = '$whatUser'";
				mysqli_query($connection, $sql); //run the query
			}

			if($_POST['phone'] != ''){ 
				$phone = $_POST['phone'];
				$sql = "UPDATE raindrop_users SET phone = '$phone' WHERE username = '$whatUser'";
				mysqli_query($connection, $sql); //run the query

			}	
			
			if($_POST['shipping'] != ''){ 
				$address = $_POST['shipping'];
				$sql = "UPDATE raindrop_users SET address = '$address' WHERE username = '$whatUser'";
				mysqli_query($connection, $sql); //run the query
			}

			/*$message = $row['admin'];
			echo "<script type='text/javascript'>alert('$message');</script>";*/ //DEBUG FOR ADMIN STATUS

			//$_SESSION['logged_in_user'] = $username;

			//$sql = "UPDATE raindrop_users SET /*username = '$username',*/ email = '$email', phone = '$phone', address = '$address' WHERE username = '$whatUser'";
			//mysqli_query($connection, $sql); //run the query

			header("Refresh: 0; url=profile.php"); //Takes user to login page in 5 secs
		}		
	} 
?>

    <div id="edituser_modal" class="modal">

  		<form class="loginbox" action="" method="POST">

	  		<div class="edituser_modal">
	  			<h2>Edit personal information</h2>
				<span onclick="document.getElementById('edituser_modal').style.display='none'" class="close" title="Close">&times;</span>
	 		</div> 

		    <div class="container">
		      <!--<label for="user"><b>Username</b></label>
		      <input type="text" placeholder="Username" name="username">-->
		      
		      <label for="email"><b>Email</b></label>
		      <input type="text" placeholder="Email Address" name="email">

		      <label for="phone"><b>Phone number</b></label>
		      <input type="text" placeholder="Phone number" name="phone">

		      <label for="shipping"><b>Shipping Address</b></label>
		      <input type="text" placeholder="Shipping info" name="shipping">

		      <input type="submit" name="submit" value="Save">
		    </div>

	  	</form>
	</div>

	<script>
		// Get the modal
		var modal = document.getElementById('edituser_modal');

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}
	</script>
	
	<?php include 'footer.php'; ?>   
    
    </body>

</html>