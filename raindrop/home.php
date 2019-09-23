<!DOCTYPE html>
<html lang="en">
<!-- Homepage! displays 4 randomly selected 'featured products' via random number generation. Also has category links. (are we keeping these?) -->

    <head>
        <title>Raindrop Pop - Home - Ben Schritchfield</title>
        <meta charset="utf-8">
        <meta name="description" content="Store">
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    
    <body>
         
        <?php include 'navmenu.php'; ?>

        <div class="bigbanner">
            <img src="img/header1.jpg" alt="bubbles">

        </div>
        
        <div class="toparea">

            <div class="section group">
                <div class="col span_4_of_7">
                    <p class="hometext">Raindrop Pop is the leading online retailer for craft soda, root beer, and other bubbly refreshments! The company was founded in 2018 by five soda enthusiasts in Orlando, Florida. The vision was to bring all of the finest flavors from around the world under one roof. Since then we have expanded to an online store that ships worldwide! We offer a dazzling variety of handcrafted carbonated beverages served in bottles of every shape and size. We strive to offer the latest and greatest brands, but never forget the classics. If you’re looking for quality and unique flavor, look no further than Raindrop Pop!</p>
                </div>

                <?php
    
                include("db_connect.php");

                $flavor1 = rand(1,55);
                $flavor2 = rand(1,55);
                $flavor3 = rand(1,55);
                $flavor4 = rand(1,55);
                
                $sql = "SELECT * FROM products WHERE ID = '$flavor1' OR ID = '$flavor2' OR ID = '$flavor3' OR ID = '$flavor4'";  //select from items table
                $cart_result = mysqli_query($connection, $sql); 

                while($row = mysqli_fetch_array($cart_result)){
            
              ?><div class="col span_2_of_7">

                    <h2 class="feature">Featured Product:</h2>

                    <p class="smallname"><?php echo $row['product'] . " " . "-" . " " . "$" .$row['price'];?></p> 

                    <!--<p class="smalldescrip"><?php print $row['description'];?></p>-->

                </div>

                <div class="col span_1_of_7">
                    
                    <a href="item.php?flavor=<?php echo $row['ID']; ?>"><img class="home_item_img" <?php echo "src=img/".$row['image'];?> alt="pic"></a>
                    <button id="<?php echo $row['ID']; ?>" class="addbtn_home" onclick="window.location.href='item.php?flavor=<?php echo $row['ID']; ?>'" >View Info</button>
                </div>
        <?php    
            } //ends while loop
        ?>


            </div>  
        </div>

        <div class="section group">
            
            <div class="col span_1_of_7">
                <div class="grouppic">
                    <a href="category.php?category=Classic"><img src="img/classic_t.jpg" alt="classic">
                    <div class="centered">
                        <p class="cats">Classics</p>
                    </div></a>
                </div>
            </div>

            <div class="col span_1_of_7">
                <div class="grouppic">
                    <a href="category.php?category=Citrus"><img src="img/citrus_t.jpg" alt="citrus">
                    <div class="centered">
                        <p class="cats">Citrus</p>
                    </div></a>
                </div>
            </div>

            <div class="col span_1_of_7">
                <div class="grouppic">
                    <a href="category.php?category=Fruity"><img src="img/fruity_t.jpg" alt="fruity">
                    <div class="centered">
                        <p class="cats">Fruity</p>
                    </div></a>
                </div>
            </div>

            <div class="col span_1_of_7">
                <div class="grouppic">
                    <a href="category.php?category=Cream"><img src="img/cream_t.jpg" alt="cream">
                    <div class="centered">
                        <p class="cats">Cream</p>
                    </div></a>
                </div>
            </div>

            <div class="col span_1_of_7">
                <div class="grouppic">
                    <a href="category.php?category=Root Beer"><img src="img/rootbeer_t.jpg" alt="root beer">
                    <div class="centered">
                        <p class="cats">Root Beer</p>
                    </div></a>
                </div>
            </div>

            <div class="col span_1_of_7">
                <div class="grouppic">
                    <a href="category.php?category=Ginger"><img src="img/ginger_t.jpg" alt="ginger ale">
                    <div class="centered">
                        <p class="cats">Ginger Ale</p>
                    </div></a>
                </div>
            </div>
            
            <div class="col span_1_of_7">
                <div class="grouppic">
                    <a href="category.php?category=Special"><img src="img/special_t.jpg" alt="specialty sodas">
                    <div class="centered">
                        <p class="cats">Specialty</p>
                    </div></a>
                </div>
            </div>

        </div>

<?php include 'footer.php'; ?>
    
    </body>
</html>