<?php
/*This file is the container page for the individual item view. 'select_item.php' is what actually displays the relevant details. */
    include("db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Raindrop Pop - Product Detail - Ben Schritchfield</title>
        <meta charset="utf-8">
        <meta name="description" content="Store">
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    
    <body>
         
        <?php include 'navmenu.php'; ?>

        <div class="productdetail">

            <?php 
            include("select_item.php");
            ?>
            
        </div>

<?php include 'footer.php'; ?>
        
    </body>
</html>