<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  	<link href="css/style.css" rel="stylesheet">

  	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="js/scroll.js" type="text/javascript"></script>

  <style>
    
    .cursive{
      font-family: 'Pacifico', cursive;
    }

    body{
      font-family: 'Quicksand', sans-serif;
    }
    
    .headerpic{
    	width: 100%;
    	object-fit: none;
    	max-height: 400px;
    }
  </style>

  </head>
  
  <body>

	<?php
		include("navmenu.php"); //include nav
	?>

	<br>
	<br>
	<br>

<?php
			
if (isset($_SESSION['logged_in_user'])) {     //If logged in, show this

	$username = $_SESSION['logged_in_user'];
	$sql = "SELECT * FROM member WHERE username='$username'"; //Check entered credentials against database, using encrypted password
	$result = mysqli_query($connection, $sql); //Execute the sql query and store result in $result

	$row = mysqli_fetch_assoc($result);
	
	$firstName = $row['fname'];
	$lastName = $row['lname'];
	$email = $row['address'];
	//$picture = $row['picture'];

	if($row['about'] != ''){
		$descrip = $row['about'];
	}
	else{
		$descrip = 'You have not added a description yet.';
	}

	if($row['picture'] != ''){
		$picture = $row['picture'];
	}
	else{
		$picture = 'defaultuser.jpg';
	}

	if($row['background'] != ''){
		$background = $row['background'];
	}
	else{
		$background = 'defaultbg.jpg';
	}

?>
	<!--==Card Filler==-->
	<div class="container">

	  	<img class="headerpic" src="img/userpics/<?php echo $background; ?>"/>
	    <button type="button" id="headerModalBtn" class="btn btn-secondary" data-toggle="modal" data-target="#headerPicModal" style="margin-top: -65px;">Change Background</button>

	  <main>
	    <div class="row">
	      <div class="left col-lg-4">
	        <div class="photo-left">
	          <img class="photo" src="img/userpics/<?php echo $picture; ?>"/>
	          <button type="button" id="profileModalBtn" class="btn mx-auto" data-toggle="modal" data-target="#profilePicModal" style="display: block;">Upload</button>
	          <!--<div class="active"></div>-->
	        </div>
	        <h4 class="name cursive"><?php echo $username; ?></h4>
	        <p class="info"><?php echo $firstName." ".$lastName; ?></p>
	        <!--<p class="info">Wind Surfer</p>-->
	        <p class="info"><?php echo $email; ?></p>
	        <div class="stats row">
	          <div class="stat col-xs-4" style="padding-right: 50px;">
	            <p class="number-stat">0</p>
	            <p class="desc-stat">Followers</p>
	          </div>
	          <div class="stat col-xs-4">
	            <p class="number-stat">0</p>
	            <p class="desc-stat">Following</p>
	          </div>
	          <div class="stat col-xs-4" style="padding-left: 50px;">
	            <p class="number-stat">0</p>
	            <p class="desc-stat">Uploads</p>
	          </div>
	        </div>
	        <p class="desc"><?php echo $descrip; ?></p>
	        <div class="social">
	          <i class="fa fa-facebook-square" aria-hidden="true"></i>
	          <i class="fa fa-twitter-square" aria-hidden="true"></i>
	          <i class="fa fa-pinterest-square" aria-hidden="true"></i>
	          <i class="fa fa-tumblr-square" aria-hidden="true"></i>
	        </div>
			<button type="button" id="editModalBtn" class="btn btn-secondary" data-toggle="modal" data-target="#AboutModal">Edit Info</button>
	      </div>
	      <div class="right col-lg-8">
	        <ul class="nav">
	          <li>Gallery</li>
	          <li>Groups</li>
	          <li>About</li>
	        </ul>
	        <div class="row gallery">
	          <div class="col-md-4">
	             <img src="img/clearwater.jpg"/>
	          </div>
	          <div class="col-md-4">
	            <img src="img/cocoa.jpg"/>
	          </div>
	          <div class="col-md-4">
	             <img src="img/daytona.jpg"/>
	          </div>
	          <div class="col-md-4">
	             <img src="img/miami.jpg"/>
	          </div>
	          <div class="col-md-4">
	            <img src="img/siesta.jpg"/>
	          </div>
	          <div class="col-md-4">
	            <img src="img/ponce.jpg"/>
	          </div>
	        </div>
	      </div>
	  </main>
	</div>

<!--================================================ About Me Modal ============================================================== -->
<div class="modal fade" id="AboutModal" tabindex="-1" role="dialog" aria-labelledby="AboutModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AboutModalLabel">Edit User Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="updateuser.php" method="post">           
                <div class="form-row mt-2">
                  	<div class="col mt-2">
                        <label for="comment"><h3>Write something about yourself:</h3></label>
                      	<textarea name="aboutme" class="form-control" placeholder="About me..."></textarea>
                  	</div>
                </div>

	            <div class="row">
	                <div class="col-md">
	                  <button type="submit" name="submit" class="btn btn-secondary mt-4 mb-4">Save</button>
	                </div>
	            </div>
        </form>

      </div>
    </div>
  </div>
</div>

<!--================================================ Profile Pic Modal ============================================================== -->
<div class="modal fade" id="profilePicModal" tabindex="-1" role="dialog" aria-labelledby="profilePicModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="profilePicModalLabel">Select a profile picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">             
        <div class="form-row">
            <div class="col">
                <form action="upload2.php" method="POST" enctype="multipart/form-data">

                    <input class="fileuploadbtn" type="file" name="profilepic" class="mt-4">

                    <button type="submit" name="submit" class="btn btn-secondary jobsearchbtn post-job-btn">Upload</button>
                </form>
            </div>
        </div>
      </div>

      </div>
    </div>
  </div>
</div>

<!--================================================ Header Pic Modal ============================================================== -->
<div class="modal fade" id="headerPicModal" tabindex="-1" role="dialog" aria-labelledby="headerPicModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="headerPicModalLabel">Select a background picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">             
        <div class="form-row">
            <div class="col">
                <form action="upload.php" method="POST" enctype="multipart/form-data">

                    <input class="fileuploadbtn" type="file" name="bgpic" class="mt-4">

                    <button type="submit" name="submit" class="btn btn-secondary jobsearchbtn post-job-btn">Upload</button>
                </form>
            </div>
        </div>
      </div>

      </div>
    </div>
  </div>
</div>

<?php
	} 			
	else {    //Display default fake profile
?>

	<!--==Card Filler==-->
	<div class="container">
	  <header>
	    <i class="fa fa-bars" aria-hidden="true"></i>
	  </header>
	  <main>
	    <div class="row">
	      <div class="left col-lg-4">
	        <div class="photo-left">
	          <img class="photo" src="img/johndoe.jpg"/>
	          <div class="active"></div>
	        </div>
	        <h4 class="name cursive">John Doe</h4>
	        <p class="info">Wind Surfer</p>
	        <p class="info">johnnydoe.wind@gmail.com</p>
	        <div class="stats row">
	          <div class="stat col-xs-4" style="padding-right: 50px;">
	            <p class="number-stat">3,619</p>
	            <p class="desc-stat">Followers</p>
	          </div>
	          <div class="stat col-xs-4">
	            <p class="number-stat">42</p>
	            <p class="desc-stat">Following</p>
	          </div>
	          <div class="stat col-xs-4" style="padding-left: 50px;">
	            <p class="number-stat">38</p>
	            <p class="desc-stat">Uploads</p>
	          </div>
	        </div>
	        <p class="desc">My name is John Doe.<br>
				I'm a wind surfer from Orlando, FL.<br>
				I take photos of the beaches I've visited.<br>
				I am also a Bayern Munich Football fan.
			</p>
	        <div class="social">
	          <i class="fa fa-facebook-square" aria-hidden="true"></i>
	          <i class="fa fa-twitter-square" aria-hidden="true"></i>
	          <i class="fa fa-pinterest-square" aria-hidden="true"></i>
	          <i class="fa fa-tumblr-square" aria-hidden="true"></i>
	        </div>
	      </div>
	      <div class="right col-lg-8">
	        <ul class="nav">
	          <li>Gallery</li>
	          <li>Groups</li>
	          <li>About</li>
	        </ul>
	        <span class="follow" >Follow</span>
	        <div class="row gallery">
	          <div class="col-md-4">
	             <img src="img/clearwater.jpg"/>
	          </div>
	          <div class="col-md-4">
	            <img src="img/cocoa.jpg"/>
	          </div>
	          <div class="col-md-4">
	             <img src="img/daytona.jpg"/>
	          </div>
	          <div class="col-md-4">
	             <img src="img/miami.jpg"/>
	          </div>
	          <div class="col-md-4">
	            <img src="img/siesta.jpg"/>
	          </div>
	          <div class="col-md-4">
	            <img src="img/ponce.jpg"/>
	          </div>
	        </div>
	      </div>
	  </main>
	</div>

<?php			
	}
?>

	<br><br><br><br><br>
	
		
		<!--Footer-->
		<footer class="footer">
			<div class="container5">
				<a href="https://www.facebook.com/"><img src="img/facebook.png" alt="facebook" width="20" height="20" hspace="20"></a>
				<a href="https://www.instagram.com/"><img src="img/instagram.png" alt="instagram" width="20" height="20" hspace="20"></a>
				<a href="https://www.twitter.com/"><img src="img/twitter.png" alt="twitter" width="20" height="20" hspace="20"></a>
			</div>
		</footer>
		<!--End Footer-->
		</div>
	
</body>
</html>