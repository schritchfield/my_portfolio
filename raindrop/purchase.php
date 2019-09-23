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
    <?php include 'navmenu.php'; 
    	  include 'deleteitem2.php';
    	  include 'orders.php';
   	?>

    <div class="cart_container">
      <h1>Review your order</h1>
       	
    <?php
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
      	}else{ 
      	?>
      		<p class="noitems">There are no items in your cart. Visit the store to get started!</p>
      	<?php    }	

//=========================================================THIS PART GETS THE SHIPPING INFORMATION FROM THE USERS DB AND ALLOWS EDITING================================================//

    if(isset($_SESSION['logged_in'])){

			$user_sql = "SELECT * FROM raindrop_users WHERE cart_hash = '$cartstring'";
	        $user_result = mysqli_query($connection,$user_sql); //Run the query 
	        $user_row = mysqli_fetch_assoc($user_result);
	        ?>
	        <h3>Your purchase will be shipped to the folowing address:</h3>
	        <p><?php echo $user_row['address'];?></p> 

	        <div class="total">
	            <p>Total: $<?php echo $total;?></p>
	        </div>

	    <button id="edit_info_btn" onclick="document.getElementById('edituser_modal').style.display='block'">Edit shipping info</button>
	    <button id="edit_info_btn" onclick="document.getElementById('checkout_modal').style.display='block'">Check Out</button>
	<?php 
		}else{ 
	?>
		<button id="edit_info_btn" onclick="document.getElementById('checkout_modal').style.display='block'">Check Out</button>
	<?php }
?>    
<!--===================================================THIS IS THE SHIPPING UPDATE MODAL=================================================-->
<?php
        if(isset($_POST['changeshipping'])) {//if not already logged in and form has been submitted
			$whatUser = $_SESSION['logged_in_user'];

			$sql = "SELECT * FROM raindrop_users WHERE username='$whatUser'"; //Check entered credentials against database, using encrypted password
			$result = mysqli_query($connection, $sql); //Execute the sql query and store result in $result
			if (mysqli_num_rows($result) == 1){		//if account exists

				$row = mysqli_fetch_assoc($result);
			
				if($_POST['shipping'] != ''){ 
					$address = $_POST['shipping'];
					$sql = "UPDATE raindrop_users SET address = '$address' WHERE username = '$whatUser'";
					mysqli_query($connection, $sql); //run the query
					
					echo '<script type="text/javascript">window.location = "purchase.php"</script>'; //This refreshes the page w/ JS
				}
			}		
		} 
?>

        <div id="edituser_modal" class="modal">
	  		<form class="loginbox" action="" method="POST">

		  		<div class="edituser_modal">
		  			<h2>Edit personal information</h2>
					<span onclick="document.getElementById('edituser_modal').style.display='none'" class="close" title="Close">&times;</span>
		 		</div> 

			    <div class="container">   
			      <label for="shipping"><b>Shipping Address</b></label>
			      <input type="text" placeholder="Shipping info" name="shipping">

			      <input type="submit" name="changeshipping" value="Save">
			    </div>
		  	</form>
		</div>

		<script>
			// Get the modal
			var modal = document.getElementById('edituser_modal');

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
			    if (event.target == modal) {
			        modal.style.display = "none";
			    }
			}
		</script>
<!--===================================================THIS IS THE CHECKOUT MODAL=====================================================-->
<?php
?>
        <div id="checkout_modal" class="modal">
		  	<form class="loginbox" id="signup" method="post" name="myform" >
				<div class="userInfo">
				<h2>Enter payment information</h2>
				<span onclick="document.getElementById('checkout_modal').style.display='none'" class="close" title="Close">&times;</span>
				<?php
				if (!isset($_SESSION['logged_in'])) { //These only display for guests
				?>
					<input type="text" name="fname" value="" placeholder="First name"><br>
					<input type="text" name="lname" value="" placeholder="Last name"><br>
					<input type="text" name="email" value="" placeholder="Email address"><br>
					<input type="text" name="phone" value="" placeholder="Phone number"><br>
					<input type="text" name="address" value="" placeholder="Street address"><br>
					<input type="text" name="city" value="" placeholder="City"><br>
					<input type="text" name="state" value="" placeholder="State"><br>
				
				<?php } ?> 
				    <select name="cardtype">
			            <option value="">Select...</option>
			            <option value="mastercard">Mastercard</option>
			            <option value="visa">Visa</option>
			            <option value="discover">Discover</option>
			            <option value="amex">American Express</option>
        			</select>
        			<input type="text" name="cardname" value="" placeholder="Name on card"><br>
					<input type="text" name="cardnumber" value="" placeholder="Card number"><br>
					<input type="text" name="cvv" value="" placeholder="Security code"><br>
					<input type="text" name="expiry" value="" placeholder="Expiration date"><br>

					<input type="submit" name="checkout" value="Place Order">
				</div>
			</form>
		</div>

		<script>
			// Get the modal
			var modal = document.getElementById('checkout_modal');

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
			    if (event.target == modal) {
			        modal.style.display = "none";
			    }
			}
		</script>
<!--=====================================================================================================================================-->
        <?php include 'footer.php'; ?>
        
    </body>
</html>