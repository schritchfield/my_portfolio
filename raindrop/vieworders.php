<!DOCTYPE html>
<html lang="en">
<!-- this file is the container page for the cart code. -->

    <head>
        <title>Raindrop Pop - Cart - Ben Schritchfield</title>
        <meta charset="utf-8">
        <meta name="description" content="Store">
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    
    <body>      
    <?php include 'navmenu.php'; ?>

    <div class="cart_container">
      <h1>Orders</h1>

<?php 
/*This file creates a list of all products in the database and also allows the admin to delete them.*/
    $sql = "SELECT * FROM orders";  //select all from items table
    $result = mysqli_query($connection,$sql);  //Run the query 
    $i = 0;

    while($row = mysqli_fetch_array($result)){ //Loops through every result that was returned

        $orderId = $row['order_id'];

        $sqli = "SELECT * FROM orders WHERE order_id = '$orderId'";  //select all from items table
        $resulti = mysqli_query($connection,$sqli);  //Run the query 

        $i++;
        $itemToDelete = $row['ID'];

        $whatuser = $row['user_id'];
        $whatitem = $row['products'];

        $sql2 = "SELECT * FROM raindrop_users WHERE cart_hash='$whatuser'";    //select from items table
        $result2 = mysqli_query($connection,$sql2);      //Run the query
        $row_user = mysqli_fetch_assoc($result2);

        $sql3 = "SELECT * FROM products WHERE ID='$whatitem'";    //select from items table
        $result3 = mysqli_query($connection,$sql3);      //Run the query
        $row_products = mysqli_fetch_assoc($result3);

            if($i % 2 == 0){
                ?>
                <div class="cell_type1">
                    <p class="name_cell"><?php echo $row['card_name'];?></p>

                    <div class="cellcontainer"><?php echo "<div class='cell'>" . $row_products['product'] . "</div><div class='cell'> Quantity: " . $row['quantities'] . "</div> <div class='cell'>Total: " . $row['total'] . "</div><div class='cell'>Address: " . $row['shipping'] . "</div><div class='cell'>Date:" . $row['order_date'] ."</div>";?>
                        
                        <form class="admindelete" action="" method="POST">
                            <input type="submit" name="deleteproduct" value="Cancel Order">
                            <input type="hidden" name="productId" value="<?php echo $itemToDelete; ?>">
                        </form>   
                    </div>

                </div>
            <?php
            }else{
                ?>
                <div class="cell_type2">
                    <p class="name_cell"><?php echo $row_user['username'];?></p>

                    <div class="cellcontainer"><?php echo "<div class='cell'>" . $row_products['product'] . "</div><div class='cell'> Quantity: " . $row['quantities'] . "</div> <div class='cell'>Total: " . $row['total'] . "</div><div class='cell'>Address: " . $row['shipping'] . "</div><div class='cell'>Date:" . $row['order_date'] ."</div>";?>
                        
                        <form class="admindelete" action="" method="POST">
                            <input type="submit" name="deleteproduct" value="Cancel Order">
                            <input type="hidden" name="productId" value="<?php echo $itemToDelete; ?>">
                        </form>    
                    </div>
                </div>
            <?php 
        } 
    }

    //This is supposed to delete the appropriate item, has some issues as of right now...
    if (isset($_POST['productId'])) {

        $productId = $_POST['productId'];
        $sql = "DELETE FROM orders WHERE ID = '$productId'";
        mysqli_query($connection,$sql);

        echo '<script type="text/javascript">window.location = "vieworders.php"</script>'; //This refreshes the page w/ JS
    }
?>

    <?php include 'footer.php'; ?>

    </body>
</html>