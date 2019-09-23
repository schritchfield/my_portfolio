<?php
/* This file searches the database, then loops through all results for the search query, if there were any. Otherwise it tells the user there were no results. */
    include("db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Raindrop Pop - Store - Ben Schritchfield</title>
        <meta charset="utf-8">
        <meta name="description" content="Store">
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    
    <body>
         
        <?php include 'navmenu.php'; ?>

        <div class="bigbanner">
            <img src="img/header3.jpg" alt="bottles">

        </div>

        <div class="toparea">

            <p class="shorttext">Search results container page. I may integrate this into the store page at a later time. if no items are found a message will be provided.</p>

        </div>

        <div class="productarea">

        <?php
		include("db_connect.php");
		
		mysqli_select_db($connection, "products");

		$output = "";

		if (isset($_POST['search'])) {
			$searchq = $_POST['search'];
			$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

			$min_length = 3;
			$query = mysqli_query($connection, "SELECT * FROM products WHERE product LIKE '%$searchq%' OR category LIKE '%$searchq%' OR description LIKE '%$searchq%'") or die ("could not search.");
			$count = mysqli_num_rows($query);
			if ($count == 0 || strlen($searchq) < $min_length) { //If nothing was found or the search was not at least 3 characters:
				$output = "There were no search results. Please try something else.";

				?><p class="searchresult"><?php echo $output;?> </p>
			<?php	
			}

			else{ //IF there ARE results, they get printed out here.
				?><div class="wrapper"><?php

			    while($row = mysqli_fetch_array($query)){
					?><div class="item">
			            <a href="item.php?flavor=<?php echo $row['ID']; ?>"><img class="preview" <?php echo "src=img/".$row['image'];?> alt="pic"></a>
			            <p class="name"><?php echo $row['product'];?></p>

			            <p class="price"><?php echo "$" . $row['price'];?></p>
			            <a class="ctgry" href="category.php?category=<?php echo $row['category']; ?>"><p><?php echo "Category: " . $row['category'] . " " . "Sodas";?></p></a>
			                
			                <!--<p class="descrip"><?php echo $row['description'];?></p>-->
			            <div class="item2">
			                <button id="<?php echo $row['ID']; ?>" class="view" onclick="window.location.href='item.php?flavor=<?php echo $row['ID']; ?>'" >View Info</button>
			            </div>
			        </div>
			        <?php
	    		}
			}
		}
	 	?>
        </div>

		<?php include 'footer.php'; ?>
        
    </body>
</html>