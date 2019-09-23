<?php
/* This file adds the current product to the carts database. If the item was alread in the cart, it increments the quantity. */

    //Cart stuff
    if (isset($_POST['addtocart'])) {

        $sql = "SELECT * FROM carts WHERE cart_hash = '$cartstring' AND products = '$product'"; //Check to see if cart already exists
        $result = mysqli_query($connection, $sql); //store results of query in $result var

        $cart_row = mysqli_fetch_assoc($result);
        
                if (mysqli_num_rows($result) == 1){ //If a cart is in the database
                    
                    $quantity = $cart_row['quantities'];

                    $sql = "UPDATE carts SET quantities = '$quantity'+1 WHERE cart_hash = '$cartstring' AND products = '$product'";
                    mysqli_query($connection, $sql);

                    echo "the item was already in the cart. Quantity updated";

                    //header("Refresh: 0; url=cart.php");
            
                }else{  //If its a new cart

                    $quantity = 1;
                    
                    $sql = "INSERT INTO carts (ID, cart_hash, products, quantities) VALUES (NULL, '$cartstring', '$product', '$quantity')";
                    mysqli_query($connection, $sql);

                    echo "<br>Added a new item to cart!";

                    //header("Refresh: 0; url=cart.php");
                }
    } 
?>