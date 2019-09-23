<?php
include "connect.php";
include "navmenu.php";

$whatUser = $_SESSION['logged_in_user'];

if(isset($_POST['submit'])){

	if (!empty($_POST["aboutme"])) {
		if ($_POST["aboutme"] != '') {
			
			$aboutMe = $_POST["aboutme"];
			$sql = "UPDATE member SET about = '$aboutMe' WHERE username = '$whatUser'";
			mysqli_query($connection,$sql);

		}
	}

echo'<script type="text/javascript">window.location = "profile.php"</script>';

}
else{
	echo '<script type="text/javascript">window.location = "profile.php"</script>';
}
?>