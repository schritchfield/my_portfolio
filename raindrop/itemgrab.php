<?php
/* This file pulls all items from the database and siplays them by printing out little item cards with some details. */
    include("db_connect.php");

    $sql = "SELECT * FROM products";         //select from items table
    $result = mysqli_query($connection,$sql);      //Run the query 

?>     
        <div class="wrapper">
<?php 
    while($row = mysqli_fetch_array($result)){ //Loops through every result that was returned
        ?>
        <div class="item">
            <a href="item.php?flavor=<?php echo $row['ID']; ?>"><img class="preview" <?php echo "src=img/".$row['image'];?> alt="pic"></a>
            <p class="name"><?php echo $row['product'];?></p>

            <p class="price"><?php echo "$" . $row['price'];?></p>
            <a class="ctgry" href="category.php?category=<?php echo $row['category']; ?>"><p><?php echo "Category: " . $row['category'] . " " . "Sodas";?></p></a>
                
            <div class="item2">
                <button id="<?php echo $row['ID']; ?>" class="view" onclick="window.location.href='item.php?flavor=<?php echo $row['ID']; ?>'" >View Info</button>
                
                <!--<form action="" method="POST">
                    <input type="submit" name="addtocart" value="Add to cart">
                </form>-->

            </div>
        </div>
        <?php
    }
?>
</div>
