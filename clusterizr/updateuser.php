<?php
include("db_connect.php");
include 'header.php';

$whatUser = $_SESSION['email'];

if(isset($_POST['submit'])){

	if (!empty($_POST["facebookurl"])) {
		if ($_POST["facebookurl"] != '') {
			
			$fbUrl = $_POST["facebookurl"];
			$sql = "UPDATE users SET facebook = '$fbUrl' WHERE email = '$whatUser'";
			mysqli_query($conn,$sql);

		}
	}

	if (!empty($_POST["linkedinurl"])) {
		if ($_POST["linkedinurl"] != '') {
			
			$linkedUrl = $_POST["linkedinurl"];
			$sql = "UPDATE users SET linkedin = '$linkedUrl' WHERE email = '$whatUser'";
			mysqli_query($conn,$sql);

		}
	}

	if (!empty($_POST["instagramurl"])) {
		if ($_POST["instagramurl"] != '') {
			
			$instaUrl = $_POST["instagramurl"];
			$sql = "UPDATE users SET instagram = '$instaUrl' WHERE email = '$whatUser'";
			mysqli_query($conn,$sql);

		}
	}

	if (!empty($_POST["twitterurl"])) {
		if ($_POST["twitterurl"] != '') {
			
			$twitterUrl = $_POST["twitterurl"];
			$sql = "UPDATE users SET twitter = '$twitterUrl' WHERE email = '$whatUser'";
			mysqli_query($conn,$sql);

		}
	}
	
	if (!empty($_POST["siteurl"])) {
		if ($_POST["siteurl"] != '') {
			
			$siteUrl = $_POST["siteurl"];
			$sql = "UPDATE users SET website = '$siteUrl' WHERE email = '$whatUser'";
			mysqli_query($conn,$sql);

		}
	}

	if (!empty($_POST["aboutme"])) {
		if ($_POST["aboutme"] != '') {
			
			$aboutMe = $_POST["aboutme"];
			$sql = "UPDATE users SET about_me = '$aboutMe' WHERE email = '$whatUser'";
			mysqli_query($conn,$sql);

		}
	}

echo'<script type="text/javascript">window.location = "dashboard.php"</script>';

}
else{
	echo '<script type="text/javascript">window.location = "dashboard.php"</script>';
}
?>