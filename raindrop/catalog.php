<?php
/* This is the container page for the main store page. */
    
    include("db_connect.php");
    //session_start();
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

            <p class="shorttext">We offer a huge selection of the latest and greatest flavors! Select by flavor or scroll down to view all products. Our warehouses are constantly being stocked with the newest and freshest sodas from around the world!</p>

        </div>

        <div class="productarea">

        <?php include("itemgrab.php");?>

        </div>

<?php include 'footer.php'; ?>
        
    </body>

</html>