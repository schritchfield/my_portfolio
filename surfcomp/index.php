<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--<link href="css/style.css" rel="stylesheet">-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/scroll.js" type="text/javascript"></script>
    <script src="js/operations.js"></script>

  <style>
    
    .cursive{
      font-family: 'Pacifico', cursive;
    }

    body{
      font-family: 'Quicksand', sans-serif;
    }

	.navtxt{
	  font-size: 18pt;
	  color: #000 !important;
	  padding-left: 2vw;
	  padding-right: 2vw;
	}

	.navtxt:hover{
	    color: #f7a992 !important;
	}

	.navbg{
	  background-color: #82a0c2;
	  opacity: 0.6;
	}

	#grad1 {
        height: 200px;
        background-color: #b6cfea; /* For browsers that do not support gradients */
        background-image: linear-gradient(#b6cfea, #FFFFFF); /* Standard syntax (must be last) */
    }

    #brandtxt{
      text-decoration: none;
      color: #f7a992;
      font-size: 20pt;
    }

    .footer {
	  width: 100%;
	  height: 50px;
	  line-height: 5px; 
	  background-color: #82a0c2;
	  opacity: 0.7;
	}

	.container5 {
	  padding: 15px;
	  display: block;
	  margin-left: auto;
	  margin-right: auto;
	  text-align: center;
	}

	.center-w {
			  position: absolute;
			  top: 30%;
			  left: 50%;
			  transform: translate(-50%, -50%);
			  font-family: font2;
			  font-size: 100px;
	}

  </style>

  </head>
  
  <body>

<?php
	include("navmenu.php"); //include nav
?>

			
		<!--Full Width Image-->
		<div class="" style="background-image: url(img/panorama.jpg); height: 500px;">
			<!--<img src="img/panorama.jpg" class="img-fluid" alt="Responsive image">-->
			<div class="center-w"><img src="img/sc.png" class="img-fluid" alt="Responsive image" id="logo"></div>
			<!--<div class="div-wrapper"><img src="img/tab2a.png" class="img-fluid" alt="" id="tab2"><img src="img/tab1a.png" class="img-fluid" alt="" id="tab1"></div>-->
			
		</div>


	<div id="grad1" style="height: 100%;" class="pt-4">	
		<!--Card Filler-->
		<div class="container mx-auto">
			<div class="row" id="maincards">

				<!--Cards appear here from JS File with Ajax-->

			</div>
		</div>

		<br>
		<br>
		<br>
		<br>
		<br>

	</div>

		<!--Footer-->
		<footer class="footer" id="footer">
			<div class="container5">
				<a href="https://www.facebook.com/"><img src="img/facebook.png" alt="facebook" width="20" height="20" hspace="20"></a>
				<a href="https://www.instagram.com/"><img src="img/instagram.png" alt="instagram" width="20" height="20" hspace="20"></a>
				<a href="https://www.twitter.com/"><img src="img/twitter.png" alt="twitter" width="20" height="20" hspace="20"></a>
			</div>
		</footer>
		<!--End Footer-->
	</body>
</html>
