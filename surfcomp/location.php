<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/locations.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
    <script src="js/scroll.js" type="text/javascript"></script>
    <script src="js/locationupdate.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

	<title>Location</title>

  <style>
    
    .cursive{
      font-family: 'Pacifico', cursive;
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

      <div class="container">

        <div class="jumbotron" id="jumbodata" style="background-color: #f7a992;">
          <!--JS appends stuff from AJAX call here-->
          <div class="text-center" id="spinner">
            <div class="spinner-border" role="status">
              <span class="sr-only" id="loading"></span>
            </div>
          </div>
        </div>
      

        <div class="text-center" id="surfmap">
          <img src="img/usasurf3.jpg" alt="map" class="img-fluid mb-4" style="width: 100%;">
        </div>


      <div class="row row2">
        <div class="col-sm-4">
          <div class="inner1">
            <h5 class="ml-2">Florida East Coast (Atlantic)</h5>
              <p><a href="#" class="tab beachtitle" id="b0">Miami</a></p>
              <p><a href="#" class="tab beachtitle" id="b1">West Palm Beach</a></p>
              <p><a href="#" class="tab beachtitle" id="b2">Cocoa Beach</a></p>
              <p><a href="#" class="tab beachtitle" id="b3">New Smyrna Beach</a></p>
              <p><a href="#" class="tab beachtitle" id="b4">Jacksonville Beach</a></p>
              <p><a href="#" class="tab beachtitle" id="b5">Daytona Beach</a></p>
              <p><a href="#" class="tab beachtitle" id="b6">Ponce Inlet</a></p>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="inner1">
            <h5 class="ml-2">Florida West Coast (Gulf of Mexico)</h5>
              <p><a href="#" class="tab beachtitle" id="b7">Clearwater</a></p>
              <p><a href="#" class="tab beachtitle" id="b8">Naples</a></p>
              <p><a href="#" class="tab beachtitle" id="b9">Panama City Beach</a></p>
              <p><a href="#" class="tab beachtitle" id="b10">Pensacola</a></p>
              <p><a href="#" class="tab beachtitle" id="b11">Sarasota</a></p>
              <p><a href="#" class="tab beachtitle" id="b12">Siesta Key</a></p>
              <p><a href="#" class="tab beachtitle" id="b13">St. Petersburg</a></p>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="inner1">
            <h5 class="ml-2">California Coast (Coming soon!)</h5>
              <p><a href="#" class="tab">Malibu</a></p>
              <p><a href="#" class="tab">Laguna Beach</a></p>
              <p><a href="#" class="tab">Newport Beach</a></p>
              <p><a href="#" class="tab">Venice City Beach</a></p>
              <p><a href="#" class="tab">Santa Monica</a></p>
          </div>
        </div>
      </div>

      <div class="row row2">
        <div class="col-sm-4">
          <div class="inner1">
            <h5 class="ml-2">Maui, Hawaii (Coming soon!)</h5>
              <p><a href="#" class="tab">Lahaina Beach</a></p>
              <p><a href="#" class="tab">Kaanapali Beach</a></p>
              <p><a href="#" class="tab">Ho’okipa Beach</a></p>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="inner1">
            <h5 class="ml-2">Oahu, Hawaii (Coming soon!)</h5>
              <p><a href="#" class="tab">Waikiki Beach</a></p>
              <p><a href="#" class="tab">North Shore</a></p>
              <p><a href="#" class="tab">Lanikai</a></p>
              <p><a href="#" class="tab">Kailua Beach Park</a></p>
              <p><a href="#" class="tab">Sunset Beach</a></p>
          </div>
        </div>

      </div>
      <br />
      <br />
      <br />
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
