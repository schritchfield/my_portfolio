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
  <script src="js/goalsjs.js"></script>

  <title>ExpensEZ - Goals</title>
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
        <p>You can set or revise goals for the month on this page.</p>
  </div>
</div>

<div id="bigspec" class="jumbotron jumbotron-fluid text-dark mb-0 staat">

  <div class="container">
    <div class="row">
      <div class="col-md">
        <h1 class="hugetext"><?php echo '$'.number_format($monthtotal, 0, '.', ''); ?></h1>
        <p class="display-4 mt-0">Total spent this year</p>
      </div>
      <div class="col-md text-center">
        <img src="img/clipboard.png" class="rounded mx-auto d-block pt-2" alt="...">
        <h5 class="display-4 mt-4">Goals</h5>
        <p class="grey-text mb-md-0 mb-5">Set Goals to keep your expenses in check.</p>
      </div>
    </div>
  </div>

</div>

<div id="goaldata">
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <div class="modal-content" id="monthModal">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select a month</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="container">
          <div class="row">
            <div class="col-sm cal_month" id="jan">
              January
            </div>
            <div class="col-sm cal_month" id="feb">
              February
            </div>
            <div class="col-sm cal_month" id="march">
              March
            </div>
            <div class="col-sm cal_month" id="april">
              April
            </div>
          </div>

          <div class="row">
            <div class="col-sm cal_month" id="may">
              May
            </div>
            <div class="col-sm cal_month" id="june">
              June
            </div>
            <div class="col-sm cal_month" id="july">
              July
            </div>
            <div class="col-sm cal_month" id="aug">
              August
            </div>
          </div>

          <div class="row">
            <div class="col-sm cal_month" id="sept">
              September
            </div>
            <div class="col-sm cal_month" id="oct">
              October
            </div>
            <div class="col-sm cal_month" id="nov">
              November
            </div>
            <div class="col-sm cal_month" id="dec">
              December
            </div>
          </div>
          <div class="row">
            <div class="col-sm cal_month text-center" id="year">
            All Year
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
</div>
</div>

<?php
    include("footer.php");
    mysqli_close($connection);
?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>             