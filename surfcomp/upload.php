<?php
include("connect.php"); //DB connect file include, this can be changed to the proper name
include("navmenu.php");
	
$whatUser = $_SESSION['logged_in_user'];

if(isset($_POST['submit'])){
	
	if (!empty($_FILES['bgpic']['name'])) {
		
		$file = $_FILES['bgpic']; //Get filename from form 'files' function, creates an array
		$fileName = $_FILES['bgpic']['name']; //Get name in file array
		$fileTmpName = $_FILES['bgpic']['tmp_name']; //Get temporary name in file array (it gets a new name while its uploading)
		$fileSize = $_FILES['bgpic']['size']; //get size in file array
		$fileError = $_FILES['bgpic']['error']; //get error report in array
		$fileType = $_FILES['bgpic']['type']; //get type in array

		$fileExt = explode('.', $fileName); //seperate string into 'filename' and 'extension'
		$FileActualExt = strtolower(end($fileExt)); //remove uppercase from the end of the string

		$validType = array('jpg', 'jpeg', 'png', 'gif'); //Only allow these types
		if (in_array($FileActualExt, $validType)) { //If it is in the array of extension types
			if ($fileError === 0) { //If no error
				if ($fileSize < 10000000) { //Set max filesize here, currently 1mb
					$fileNameNew = uniqid('', true) . "." . $FileActualExt; //append file ext to a randomly generated string
					$fileDestination = 'img/userpics/' . $fileNameNew; //file path
					move_uploaded_file($fileTmpName, $fileDestination); //move uploaded file

				}else{
					echo '<script type="text/javascript">alert("The file was to large. Select a smaller one.");</script>';//image too big alert
				}
			}else{
				echo '<script type="text/javascript">alert("There was a problem with the file. Try a different image.");</script>'; //corrupt file alert
			}
		}else{
			echo '<script type="text/javascript">alert("Not a valid file type. Please use jpg, png of gif.");</script>'; //invalid type alert
			$fileNameNew = ''; //This is here to prevent php from throwing errors
		}


		$sql = "UPDATE member SET background = '$fileNameNew' WHERE username = '$whatUser'"; //Updates filename in the member table
		$result = mysqli_query($connection, $sql);

		//Page Refresh
		echo '<script type="text/javascript">window.location = "profile.php"</script>';
	}
	else{
		echo '<script type="text/javascript">alert("Select a file.");</script>'; //Put code for invalid type code here
		echo '<script type="text/javascript">window.location = "profile.php"</script>';
	}
}
?>