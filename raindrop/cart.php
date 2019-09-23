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
      <h1>Shopping Cart</h1>
       	
    <?php

      $cartstring = $_SESSION['cartstring']; //Transfers the Session var to a regualr var

      $sqlQuery = "SELECT * FROM carts WHERE cart_hash = '$cartstring'"; //Get the items that are assigned to the session of the user

      $total = 0; //sets initial cart total to 0

      include 'deleteitem.php';

      $cart_result = mysqli_query($connection, $sqlQuery);   
      $count =  mysqli_num_rows($cart_result); //See if there are items in the table
      
      if($count >= 1) { //Only display something IF there is at least 1 item in cart
          while($cart_row = mysqli_fetch_array($cart_result)){ //While there are items in the cart database w/ the matching cart_hash id, print them out in this loop


              $products = $cart_row['products'];
              $sql = "SELECT * FROM products WHERE ID = '$products'"; //select from items table
              $result = mysqli_query($connection,$sql); //Run the query 
              $row = mysqli_fetch_assoc($result);

              $subtotal = $row['price'] * $cart_row['quantities'];
              $total += $subtotal;
            
              ?>
              <div class="cart_item">
                  <div class="cart_image">
                      <a href="item.php?flavor=<?php echo $cart_row['products']; ?>"><img class="preview" <?php echo "src=img/".$cart_row['products'];?> alt="pic"></a>
                  </div>
                  <div class="cart_center"> 
                      <h2>Item Name</h2>
                        <p>Price per unit: $<?php echo $row['price'];?></p>
                        <p>Size: <?php echo $row['size'];?></p>

                      <form class="plusbtn" action="" method="POST">
                            <input type="submit" name="additem" value="+">
                            <input type="hidden" name="addproduct" value="<?php echo $products; ?>">
                        </form>

                        <form class="minusbtn" action="" method="POST">
                            <input type="submit" name="subitem" value="-">
                            <input type="hidden" name="subproduct" value="<?php echo $products; ?>">
                        </form>

                        <form class="deletebtn" action="" method="POST">
                            <input type="submit" name="deleteitem" value="Remove">
                            <input type="hidden" name="productId" value="<?php echo $products; ?>">
                        </form>
                    </div>
                        
                    <div class="cart_right">
                      <p><?php echo "Quantity:" . " " . $cart_row['quantities'];?></p>
                      <p class="subtotal">Subtotal: $<?php echo $subtotal;?></p>
                    </div>
                </div>
      <?php     
          } //ends while loop
      ?>
      <form class="emptycart" action="" method="POST">
            <input type="submit" name="clearcart" value="Empty Cart">
      </form> 
      <?php
      } //ends IF that checks if there items
      else{ 
          ?><p class="noitems">There are no items in your cart. Visit the store to get started!</p>
          <?php
      }
      ?>

        <div class="total">
            <p>Total: $<?php echo $total;?></p>
        </div>

        <!--<form class="" action="" method="POST">
            <input type="submit" name="checkout" value="Check Out">
        </form>-->
        <?php if($count > 0){
            ?><a href="purchase.php">Check Out</a>
        <?php }
            include 'footer.php'; ?>
    </body>
</html>