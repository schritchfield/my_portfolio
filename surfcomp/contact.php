<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/scroll.js" type="text/javascript"></script>
    <!--<script src="js/operations.js"></script>-->
	
  </head>
  
  <body>

<?php
	include("navmenu.php"); //include nav
?>
			
		<!--==Full Width Image==-->
		<img src="img/cell.png" class="img-fluid" alt="Responsive image" width="100%" >
		<!--==<div class="center-w">Contact Jombotron</div>==-->
		<!--==<div class="center-w"><img src="img/sc.png" class="img-fluid" alt="Responsive image" width="100%" ></div>==-->
		<!--==End Full Width Image==-->
			
		<!--==Card Filler==-->
	    <section class="form">
	      <div class="container">
	        <div class="row pl-4 pr-4 pt-4">
	          <div class="col-12 text-left mx-auto content pl-4 pr-4">
	            <h1 class="cursive">Contact Us</h1>
	            <hr />
	          </div>
	        </div>
	        <div class="row pl-4 pr-4">
	          <div class="col-12 text-left mx-auto content">
	            <p>
	              Please Contact us regarding anything you have questions about.
	            </p>
	          </div>
	        </div>
	        <div class="row">
	          <div class="col-12 text-left mx-auto content pl-4 pr-4">
	            <form method="POST">
	              <div class="form-group">
	                <label for="name" class="col-4 col-form-label">Name</label>
	                <div class="col-6">
	                  <input class="form-control" type="text" value=""
	                    placeholder="Jack Daniels" id="name">
	                </div>
					
	                <label for="name" class="col-4 col-form-label">Profile ID</label>
	                <div class="col-6">
	                  <input class="form-control" type="text" value=""
	                    placeholder="Whiskey Swell" id="name">
	                </div>
	                
	                <label for="email" class="col-4 col-form-label">Email</label>
	                <div class="col-6">
	                  <input class="form-control" type="email" value=""
	                    placeholder="jdan.west@gmail.com" id="email">
	                </div>
					
	                <label for="tel" class="col-4 col-form-label">Phone Number</label>
	                <div class="col-6">
	                  <input class="form-control" type="tel" value=""
	                    placeholder="407-555-2019" id="tel">
	                </div>
					
	                <label for="text" class="col-4 col-form-label">Message</label>
	                <div class="col-12">
	                  <textarea class="form-control" rows="5" text="muted"
	                    placeholder="Message/Comments" id="text"></textarea><br />
	                </div>
					
					<br>
	                <div class="col-2">
	                  <button type="button" href="sent.php" value="submit" class="btn btn-success">
						  <a class="nav-link" href="sent.php" style="color:#fcf5e2;">Submit</a>
					  </button>
	                </div>
	              </div>
	            </form>
	          </div>
	        </div>

	        <div class="row pl-4 pr-4">
	          <div class="col-12 text-left mx-auto content ">
	            <h3>Mailing Address</h3>
	            <hr />
	          </div>
	        </div>
	        <div class="row pl-4 pr-4">
	          <div class="col-12 text-left mx-auto content">
	            <p>
	              Florida Surf Comp<br />
	              c/o Adam R. Everything<br />
	              1234 Wett Waves Way<br />
	              St. Petersburg, FL 33705-4620<br />
	            </p>
				<br>
	          </div>
	        </div>
	      </div>
	    </section>		
				<!--==End Card Filler==-->
		
				<!--Footer-->
				<footer class="footer">
					<div class="container5">
						<a href="https://www.facebook.com/"><img src="img/facebook.png" alt="facebook" width="20" height="20" hspace="20"></a>
						<a href="https://www.instagram.com/"><img src="img/instagram.png" alt="instagram" width="20" height="20" hspace="20"></a>
						<a href="https://www.twitter.com/"><img src="img/twitter.png" alt="twitter" width="20" height="20" hspace="20"></a>
					</div>
				</footer>
				<!--End Footer-->
			</body>
		</html>