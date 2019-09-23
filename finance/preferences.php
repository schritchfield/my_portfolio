<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css?family=Raleway|Staatliches" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <script src="js/jquery-3.3.1.js"></script>
  <script src="js/themes.js"></script>

  <title>ExpensEZ</title>
</head>
<body class="raleway">

<?php 
    include("db_connect.php");
    include("calculations.php");
    include("nav.php");
?>

<div id="mainhead" class="jumbotron mb-0" style="background-image: url(img/banner.jpg);">
  <div class="container">
        <img src="img/logo.png" class="mx-auto img-fluid" alt="logo">
        <hr class="my-4">
        <p>The EZ way to keep track of all your daily expenditures and set goals!</p>
  </div>
</div>

<button type="button" class="btn btn-primary" id="greentheme_btn">Classic Green</button>
<button type="button" class="btn btn-primary" id="techtheme_btn">Hi-Tech</button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>             