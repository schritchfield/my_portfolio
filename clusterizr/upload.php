<?php
include("db_connect.php"); //DB connect file include, this can be changed to the proper name
include 'header.php'; 
	
	$whatUser = $_SESSION['email'];

	if(isset($_POST['submit'])){

		$file = $_FILES['file']; //Get filename from form 'files' function, creates an array

		//print_r($file); //FOR DEBUG ONLY - PRINTS IMAGE INFO

		$fileName = $_FILES['file']['name']; //Get name in file array
		$fileTmpName = $_FILES['file']['tmp_name']; //Get temporary name in file array (it gets a new name while its uploading)
		$fileSize = $_FILES['file']['size']; //get size in file array
		$fileError = $_FILES['file']['error']; //get error report in array
		$fileType = $_FILES['file']['type']; //get type in array

		$fileExt = explode('.', $fileName); //seperate string into 'filename' and 'extension'
		$FileActualExt = strtolower(end($fileExt)); //remove uppercase from the end of the string

		$allowed = array('jpg', 'jpeg', 'png', 'gif'); //Only allow these types
		if (in_array($FileActualExt, $allowed)) { //If it is in the array of extension types
			if ($fileError === 0) { //If no error
				if ($fileSize < 10000000) { //Set max filesize here, currently 1mb
					$fileNameNew = uniqid('', true) . "." . $FileActualExt; //append file ext to a randomly generated string
					$fileDestination = 'img/userpics/' . $fileNameNew; //file path
					move_uploaded_file($fileTmpName, $fileDestination); //move uploaded file

				}else{
					echo '<script type="text/javascript">alert("The file was to large. Select a smaller one.");</script>'; //Put code for image too big code here
				}
			}else{
				echo '<script type="text/javascript">alert("There was a problem with the file. Try a different image.");</script>'; //Put code for corrupt file message here
			}
		}else{
			echo '<script type="text/javascript">alert("Not a valid file type. Please use jpg, png of gif.");</script>'; //Put code for invalid type code here
			$fileNameNew = ''; //This is here to prevent php from throwing errors
		}


		$sql = "UPDATE users SET profile_pic = '$fileNameNew' WHERE email = '$whatUser'"; //Updates filename in the users table
		$result = mysqli_query($conn, $sql);

		//Page Refresh
		echo'<script type="text/javascript">window.location = "dashboard.php"</script>';

	}
?>