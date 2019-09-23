<?php 
/*This file creates a list of all products in the database and also allows the admin to delete them.*/
    $sql = "SELECT * FROM products";  //select all from items table
    $result = mysqli_query($connection,$sql);  //Run the query 
    $i = 0;

    while($row = mysqli_fetch_array($result)){ //Loops through every result that was returned
    	
    	$i++;
        $itemToDelete = $row['ID'];

    	if($i % 2 == 0){
        	?>
	        <div class="cell_type1">
	            <a class="name_cell" href="item.php?flavor=<?php echo $row['ID']; ?>"><?php echo $row['product'];?></a>

	            <div class="cellcontainer"><?php echo "<div class='cell'> Cost: $" . $row['cost'] . "</div><div class='cell'> Price: $" . $row['price'] . "</div><div class='cell'> Stock: " . $row['stock'] . "</div> <div class='cell'>Size: " . $row['size'] . "</div><div class='cell'>Quantity:" . $row['quantity'] . "</div>";?>
                    
                    <form class="admindelete" action="" method="POST">
                        <input type="submit" name="deleteproduct" value="Remove">
                        <input type="hidden" name="productId" value="<?php echo $itemToDelete; ?>">
                    </form>   
                </div>

	        </div>
        <?php
        }else{
        	?>
	        <div class="cell_type2">
	            <a class="name_cell" href="item.php?flavor=<?php echo $row['ID']; ?>"><?php echo $row['product'];?></a>

	            <div class="cellcontainer"><?php echo "<div class='cell'> Cost: $" . $row['cost'] . "</div><div class='cell'> Price: $" . $row['price'] . "</div><div class='cell'> Stock: " . $row['stock'] . "</div> <div class='cell'>Size: " . $row['size'] . "</div><div class='cell'>Quantity:" . $row['quantity'] . "</div>";?>
                    
                    <form class="admindelete" action="" method="POST">
                        <input type="submit" name="deleteproduct" value="Remove">
                        <input type="hidden" name="productId" value="<?php echo $itemToDelete; ?>">
                    </form>    
                </div>
	        </div>
        <?php 
    	}
    }

        //This is supposed to delete the appropriate item, has some issues as of right now...
    if (isset($_POST['productId'])) {
        
        //echo "<script type='text/javascript'>alert('Hello! I am an alert box!!');</script>";

        $productId = $_POST['productId'];
        $sql = "DELETE FROM products WHERE ID = '$productId'";
        mysqli_query($connection,$sql);

        echo '<script type="text/javascript">window.location = "admin.php"</script>'; //This refreshes the page w/ JS
    }

?>