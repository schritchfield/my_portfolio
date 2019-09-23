<?php
/* This file selects the item using the GET URL appendation method initiated when a specific item is clicked on. It prints out the name, price, size, etc. from the products database. This file sits inside the 'item.php' file. */
	include("db_connect.php");

   $flavor = $_GET['flavor']; //Determines flavor using the appended URL

	$sql = "SELECT * FROM products WHERE ID='$flavor'";  //This pulls the flavor from products database
	$result = mysqli_query($connection,$sql);  //Run the query 

	$row = mysqli_fetch_assoc($result);

    $product = $row['ID']; //Which product is being added
    $cartstring = $_SESSION['cartstring']; //What user is making the request

?>
		
	<div class="bigitem">
        <p class="bigname"><?php echo $row['product'];?></p>
        <img class="detailpic" <?php echo "src=img/".$row['image'];?> alt="pic">

        <div class="longdescrip">
            <p class=""><?php print $row['description'];?></p>
        </div>

        <p class="spec"><?php echo "Price: $" . $row['price'];?></p>
        <p class="spec"><?php echo "Quantity: " . $row['quantity'];?></p>
        <p class="spec"><?php echo "Size: " . $row['size'];?></p>
        <p class="spec"><a href="category.php?category=<?php echo $row['category']; ?>"><?php echo "Category: " . $row['category'] . " " . "Sodas";?></a></p>

        <p class="spec"><?php if ($row['stock'] > 0) {
            echo "IN STOCK";
        }
            else{
                echo "SOLD OUT";
            }
            
            ?></p>

        <?php include("rating.php"); ?>

        <?php include("rate.php");  ?>

        <form action="" method="POST">
            <input type="submit" name="addtocart" value="Add to cart">
        </form>

        <?php include("displaycomments.php"); ?>
    </div>

    <?php 

        include("addtocart.php"); 
    ?>