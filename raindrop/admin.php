<!DOCTYPE html>
<html lang="en">
<!-- this file is the container page for the administrative tools of the site. -->

    <head>
        <title>Raindrop Pop - Administrative - Ben Schritchfield</title>
        <meta charset="utf-8">
        <meta name="description" content="Store">
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    
    <body>
         
        <?php include 'navmenu.php'; ?>

        <?php
			include("db_connect.php");

			$currentUser = $_SESSION['logged_in_user'];

			$sql = "SELECT * FROM raindrop_users WHERE username='$currentUser'";	//select from items table
			$result = mysqli_query($connection,$sql); 	   //Run the query

			$row = mysqli_fetch_assoc($result);

			if ($row['admin'] < 2) {
				header("Location: home.php");
			}
		?>

        <h1 class="pagetitle">Administrative Tools</h1>

        <?php include 'createitem.php'; ?>
        <a href="vieworders.php">View orders</a>

<div class="productlist">
<h2>Warehouse Inventory</h2>
    <?php include 'deleteproduct.php'; ?>
</div>
	
	<?php include 'footer.php'; ?>   
    
    </body>
</html>