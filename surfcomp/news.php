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

    <link href="css/news.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->

    <script src="js/scroll.js" type="text/javascript"></script>
    <script src="js/surf.js" type="text/javascript"></script>

<title>News</title>

	<style>
		
		.container5 {
		  padding: 15px;
		  display: block;
		  margin-left: auto;
		  margin-right: auto;
		  text-align: center;
		}

    .cursive{
      font-family: 'Pacifico', cursive;
    }
    #brandtxt{
      text-decoration: none;
      color: #f7a992;
      font-size: 20pt;
    }
    body{
      font-family: 'Quicksand', sans-serif;
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

<!-- caroseul for news -->

<div class="container">

  <div class="news-carousel">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/surfer6789.jpg" class="d-block w-100" alt="surfer6789">
        <div class="carousel-caption d-none d-md-block">
          <h5>Surfing in the Olympics?</h5>
          <p class="carousel-text">After years of pushing for approval, Surfing will now be an olympic event, debuing in the 2020 Olympics in Tokyo. What physical challanges might arise with this new addition? How are people taking this news? Click here to find out all this and more!</p>
        </div>
      </div>

      <div class="carousel-item">
        <img src="img/surfer99.jpg" class="d-block w-100" alt="surfer99">
        <div class="carousel-caption d-none d-md-block">
          <h5>Storms Turns Around For Another Jab At The Southeast</h5>
          <p class="carousel-text">The nationwide storms that have been occuring for the past week have decided to take a second swing at the southeast after already devistating us 2 days ago. The result is wave surges 10 feet tall. Click here for more information and images of the destruction from the first go around.</p>
        </div>
      </div>

      <div class="carousel-item">
        <img src="img/surfer4455.jpg" class="d-block w-100" alt="surfer4455">
        <div class="carousel-caption d-none d-md-block">
          <h5>School's Out For The Summer!</h5>
          <p class="carousel-text">Locals beware, schools across the country are beginning to end so prepare for tourists to swarm the local becahes that are usually empty. Don't leave personal belongings unattended on the beach because kids like to steal things.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaption" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>

<div class="container">
    <h2 class="breaking">Breaking News</h2>
    <hr class="news-hr">

    <div class="row">
      <div class="col-sm-6">
        <div class="card bg-light border-info">
          <div class="card-body">
            <h5 class="card-title">April 24th, 2019</h5>
            <p class="card-text">Upcoming hurricane Novatnak is stirring up the water in the Atlantic. Surfers are going nuts for the radical swell it's causing. Read more about how you can "surf out" the storm.</p>
            <a href="#" class="btn btn-primary">Keep Reading</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card bg-light border-info">
        <div class="card-body">
          <h5 class="card-title">April 24th, 2019</h5>
          <p class="card-text">Big Kahuna Surfing Championship in Hawaii is coming to a nail-biting finish. See who is currently in first place and who is still in the running for the podium. </p>
          <a href="#" class="btn btn-primary">Keep Reading</a>
        </div>
      </div>
    </div>
  </div>


    <div class="row">
			<div class="col-md-3">
				<div class="card bg-light border-info">
          <img class="card-img-top" src="img/wind-surfing.jpg" alt="Surfer85" style="width:100%">
          <div class="card-body text-center">
            <h5 class="card-title">April 24th, 2019</h5>
						<p class="card-text">Local Competition Brings In Surge of Visitors.</p>
            <div class="button-left">
						        <div class="btn btn-primary">Read More</div>
            </div>
					</div>
    		</div>
			</div>

      <div class="col-md-3">
				<div class="card bg-light border-info">
          <img class="card-img-top" src="img/windsurf.jpg" alt="Surfer85" style="width:100%">
          <div class="card-body text-center">
            <h5 class="card-title">April 24th, 2019</h5>
						<p class="card-text">Young Man Attacked by Shark near the shore.</p>
            <div class="button-left">
						        <div class="btn btn-primary">Read More</div>
            </div>
					</div>
    		</div>
			</div>

      <div class="col-md-3">
				<div class="card bg-light border-info">
          <img class="card-img-top" src="img/surfer-6.jpg" alt="Surfer85" style="width:100%">
          <div class="card-body text-center">
            <h5 class="card-title">April 24th, 2019</h5>
						<p class="card-text">10 Best Pipelines on the West Coast!</p>
            <div class="button-left">
						        <div class="btn btn-primary">Read More</div>
            </div>
					</div>
    		</div>
			</div>
      <div class="col-md-3">
				<div class="card bg-light border-info">
          <img class="card-img-top" src="img/surfers-4.jpg" alt="Surfer85" style="width:100%">
          <div class="card-body text-center">
            <h5 class="card-title">April 23rd, 2019</h5>
						<p class="card-text">Rest In Peace Surf Legend John Doe.</p>
            <div class="button-left">
					     <div class="btn btn-primary">Read More</div>
            </div>
					</div>
    		</div>
			</div>
    </div>

    <div class="row">
			<div class="well well-lg text-center main_well border-danger">
				<h3 class="announcement">Make sure to sign up for our Local Surf Competetion this May 23rd. Don't wait until it's too late!</h3>
			</div>
		</div>

    <br />
    <br />

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
