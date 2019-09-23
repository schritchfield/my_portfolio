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
  
    <style>
		body {
		  margin: 0;
		  padding: 0;
		  background: url("img/surfpeach.jpg") no-repeat center center/cover;
		  width: 100%;
		  height: 100vh;
		}

		.card {
		  background-color: rgba(255,255,255,0.7);
		  color: black;
		  width: 40%;
		  display: block;
		  margin-left: auto;
		  margin-right: auto;
		}

		.row.justify-content-center {
		  padding-top: 50px;
		}

		.btn {
		  margin-bottom: 20px;
		  background-color: #82a0c2;
		  border-color: #82a0c2;
		  text-align: center;
		}
		
		.btn-primary:hover {
		  background-color: #f7a992;
		  border-color: #f7a992;
		}
		
		.card-header {
		  background-color: #82a0c2;
		  opacity: 0.7;
		}
		
		.footer {
		  position: fixed;
		  bottom: 0;
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
		
		.room {
		padding-top: 10px;
		padding-bottom: 10px;
		}

		.cursive{
	      font-family: 'Pacifico', cursive;
	    }

	    body{
	      font-family: 'Quicksand', sans-serif;
	    }
	</style>
	
	<script type="text/javascript">
  function validateForm()
  {
    var a=document.forms["reg"]["fname"].value;
    var b=document.forms["reg"]["lname"].value;
    var c=document.forms["reg"]["address"].value;
    var d=document.forms["reg"]["username"].value;
    var e=document.forms["reg"]["password"].value;
    if ((a==null || a=="") && (b==null || b=="") && (c==null || c==""))
    {
      alert("All Field must be filled out");
      return false;
    }
    if (a==null || a=="")
    {
      alert("First name must be filled out");
      return false;
    }
    if (b==null || b=="")
    {
      alert("Last name must be filled out");
      return false;
    }
    if (c==null || c=="")
    {
      alert("address must be filled out");
      return false;
    }
    if (d==null || d=="")
    {
      alert("username must be filled out");
      return false;
    }
    if (e==null || e=="")
    {
      alert("password must be filled out");
      return false;
    }
  }
</script>
  
  </head>
  
  
  
  <body> 

<?php
	include("navmenu.php"); //include nav
?>

<br>
<br>
<br>
			
		<div class="containersignup">
			<div class="justify-content-center"  style="padding: 20px;">
				<div class="card">
					<div class="card-header text-center">
						Sign Up
					</div>
					<div class="card-body">
						<form name="loginform" action="" method="post">		
							<div class="form-group text-left" style="opacity: 0.7;">
								<div class="room"><label for="usernamelabel">Username</label></div>
								<input type="text" name="username" class="form-control" style="border-style: none;" id="exampleInputPassword1" placeholder="Username">
							</div>
							<div class="form-group text-left" style="opacity: 0.7;">
								<div class="room"><label for="passwordlabel">Password</label></div>
								<input type="text" name="password" class="form-control" style="border-style: none;" id="exampleInputPassword1" placeholder="Password">
							</div>
							<button type="submit" name="submit" value="login" class="btn btn-primary">Log In</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		
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