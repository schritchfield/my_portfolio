<!DOCTYPE html>
<html lang="en">
<!-- this file is the payment screen, final step of placing an order. -->

    <head>
        <title>Raindrop Pop - Payment</title>
        <meta charset="utf-8">
        <meta name="description" content="Store">
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    
    <body>      
    <?php include 'navmenu.php'; 
    	  include 'orders.php';

    $cartstring = $_SESSION['cartstring']; //Transfers the Session var to a regualr var
    $sqlQuery = "SELECT * FROM carts WHERE cart_hash = '$cartstring'"; //Get the items that are assigned to the session of the user
    $cart_result = mysqli_query($connection, $sqlQuery);   
    $count =  mysqli_num_rows($cart_result); //See if there are items in the table
    $total = 0; //sets initial cart total to 0

//=========================================================THIS PART LOOPS THROUGH ALL ITEMS IN CART AND DISPLAYS THEM, + BUTTONS TO EDIT QUANTITY/REMOVE=================================// 
      
    if($count >= 1) { //Only display something IF there is at least 1 item in cart
        while($cart_row = mysqli_fetch_array($cart_result)){ //While there are items in the cart database w/ the matching cart_hash id, print them out in this loop

            $products = $cart_row['products'];
            $sql = "SELECT * FROM products WHERE ID = '$products'"; //select from items table
            $result = mysqli_query($connection,$sql); //Run the query 
            $row = mysqli_fetch_assoc($result);

            $subtotal = $row['price'] * $cart_row['quantities'];
            $total += $subtotal;
		}
	}
	?>

    <div class="cart_container">
    <h1>Payment</h1>

    		<form id="signup" method="post" name="myform" >
				<div class="userInfo">
				<?php
				if (!isset($_SESSION['logged_in'])) { //These only display for guests
				?>
					<input type="text" name="fname" value="" placeholder="First name"><br>
					<input type="text" name="lname" value="" placeholder="Last name"><br>
					<input type="text" name="email" value="" placeholder="Email address"><br>
					<input type="text" name="phone" value="" placeholder="Phone number"><br>
					<input type="text" name="address" value="" placeholder="Street address"><br>
				
				<?php } ?> 
				    <select name="cardtype">
			            <option value="">Select...</option>
			            <option value="mastercard">Mastercard</option>
			            <option value="visa">Visa</option>
			            <option value="discover">Discover</option>
			            <option value="amex">American Express</option>
        			</select>
        			<input type="text" name="fname" value="" placeholder="Name on card"><br>
					<input type="text" name="cardnumber" value="" placeholder="Card number"><br>
					<input type="text" name="cvv" value="" placeholder="Security code"><br>
					<input type="text" name="expiry" value="" placeholder="Expiration date"><br>
				</div>
			</form>

    





  	
    	    <form class="" action="" method="POST">
	            <input type="submit" name="checkout" value="Check Out">
	        </form>
</div>