<!--This file makes an item creation modal and provides the code to upload an image, then places the relevant information and image name into the products database.-->
	
	<button id="edit_info_btn" onclick="document.getElementById('edituser_modal').style.display='block'">Add a product</button>

    <div id="edituser_modal" class="modal">

  		<form class="loginbox" action="" method="POST" enctype="multipart/form-data">

	  		<div class="edituser_modal">
	  			<h2>Add an item to the store</h2>
				<span onclick="document.getElementById('edituser_modal').style.display='none'" class="close" title="Close">&times;</span>
	 		</div> 

		    <div class="container">
		      
		      <label for="name"><b>Product Name</b></label>
		      <input type="text" placeholder="Enter a product name" name="name">

		      <label for="description"><b>Product Description</b></label>
		      <input type="text" placeholder="Enter a description" name="description">
		      
		      <label for="category"><b>Category</b></label>
		      <input type="text" placeholder="Enter a category name" name="category">

		      <label for="cost"><b>Cost to Raindrop Pop INC.</b></label>
		      <input type="text" placeholder="Enter the cost to us" name="cost">

		      <label for="price"><b>Price per unit</b></label>
		      <input type="text" placeholder="Enter the price" name="price">

		      <label for="stock"><b>Number of item in stock</b></label>
		      <input type="text" placeholder="Enter a number" name="stock">
		      
		      <label for="size"><b>Size in OZ.</b></label>
		      <input type="text" placeholder="Enter a size" name="size">

		      <label for="quantity"><b>Quantity per order</b></label>
		      <input type="text" placeholder="Enter quantity" name="quantity">

		      Select image to upload:
    		  <input type="file" name="myimage">	      
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

<?php
include("db_connect.php");
	
	if(isset($_POST['submit'])){

		$file = $_FILES['myimage'];

		$fileName = $_FILES['myimage']['name'];
		$fileTmpName = $_FILES['myimage']['tmp_name'];
		$fileSize = $_FILES['myimage']['size'];
		$fileError = $_FILES['myimage']['error'];
		$fileType = $_FILES['myimage']['type'];

		$fileExt = explode('.', $fileName);
		$FileActualExt = strtolower(end($fileExt));

		$allowed = array('jpg', 'jpeg', 'png');
		if (in_array($FileActualExt, $allowed)) {
			if ($fileError === 0) {
				if ($fileSize < 500000) {
					$fileNameNew = uniqid('', true) . "." . $FileActualExt;
					$fileDestination = 'img/' . $fileNameNew;
					move_uploaded_file($fileTmpName, $fileDestination);

					//header("Refresh: 1; url=admin.php");
				}else{
					echo "The file was to large. Select a smaller one.";
				}
			}else{
				echo "There was a problem with the file.";
			}
		}else{
			echo "Not a valid file type. Please use jpg or png.";
		}

		
		$productname = $_POST["name"];
		$description = $_POST["description"];
		$category = $_POST["category"];
		$cost = $_POST["cost"];
		$price = $_POST["price"];
		$stock = $_POST["stock"];
		$size = $_POST["size"];
		$quantity = $_POST["quantity"];

		$image = $fileNameNew;

		$sql2 = "SELECT * FROM products WHERE product='$productname'"; //Check to see if product already exists
		$result = mysqli_query($connection, $sql2); //store results of query in $result var
		
			if (mysqli_num_rows($result) == 1){	//If at least one result
				echo "Item is already in the database."; //if product is already there
		
			}else{	//If new product
				$sql2 = "INSERT INTO products (ID, product, description, category, stock, cost, price, image, size, quantity) VALUES (NULL, '$productname', '$description', '$category', '$cost', '$price', '$stock', '$image', '$size', '$quantity')";  //prepare to add stats to database table
				mysqli_query($connection, $sql2); //run the query
				
			echo '<script type="text/javascript">window.location = "admin.php"</script>'; //This refreshes the page w/ JS
			}
	}
?>