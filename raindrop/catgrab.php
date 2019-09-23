<?php
/* This file gets the category that was selected and returns the appropriate items in a grid. Basically, its a filtered version of 'itemgrab.php'. It sits inside the 'category.php' file. */

    include("db_connect.php");
    
    $category = $_GET['category'];

    $sql = "SELECT * FROM products WHERE category='$category'";         //select from items table
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

            <!--<p class="price"><?php if ($row['stock'] > 0) {
                echo "IN STOCK";
            }
                else{
                    echo "SOLD OUT";
                }
                ?>
                </p>-->
                
                <!--<p class="descrip"><?php echo $row['description'];?></p>-->
            <div class="item2">
                <button id="<?php echo $row['ID']; ?>" class="view" onclick="window.location.href='item.php?flavor=<?php echo $row['ID']; ?>'" >View Info</button>
            </div>
        </div>
    <?php
    }
?>
</div>