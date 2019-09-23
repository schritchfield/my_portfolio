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
  <script src="js/indexjs.js"></script>

  <title>ExpensEZ - Home</title>
</head>
<body class="raleway">

<?php 
    include("db_connect.php");
    include("nav.php");
?>

<div id="mainhead" class="jumbotron mb-0" style="background-image: url(img/banner.jpg);">
  <div class="container">
        <img src="img/logo.png" class="mx-auto img-fluid" alt="logo">
        <hr class="my-4">
        <p>The EZ way to keep track of all your daily expenditures and set goals!</p>
  </div>
</div>

<!-- 3 Circular about images -->
<div class="container">
<section class="text-center my-5">

  <h2 class="h1-responsive font-weight-bold my-5 staat">Track your financial information.</h2>
  <p class="lead grey-text w-responsive mx-auto mb-5 raleway">Get extremely detailed breakdowns of exactly where your money went. Find out how you did compared to other months. Set goals. See your progress, and optimize your budget. The road to financial accountability starts here!</p>

  <div class="row raleway">
    
    <div class="col-md-4" id="analytics">
      <a href="index.php#glance"><img src="img/graphs.png" class="rounded mx-auto d-block" alt="..."></a>
      <h5 class="font-weight-bold my-4 staat">Analytics</h5>
      <p class="grey-text mb-md-0 mb-5">This site uses day by day tracking of expenditures broken down into categories.
      </p>
    </div>

    <div class="col-md-4" id="history">
      <a href="history.php"><img src="img/book.png" class="rounded mx-auto d-block" alt="..."></a>
      <h5 class="font-weight-bold my-4 staat">History</h5>
      <p class="grey-text mb-md-0 mb-5">View trends from previous months here. Data visualizations will show trends from month to month and the percentage of change of each category.
      </p>
    </div>

    <div class="col-md-4 " id="howitworks">
      <a href="#"><img src="img/screen.png" class="rounded mx-auto d-block" alt="..."></a>
      <h5 class="font-weight-bold my-4 staat">How it works</h5>
      <p class="grey-text mb-0">Data is stored in a SQL database. Computations are done using PHP and displayed as graphs with Javascript.
      </p>
    </div>
  </div>
</section>
</div>

<!-- AJAX DATA LOADS IN HERE-->
<div id="glancedata">
</div>

<div class="container fadeout" id="breakdowns">
<section class="text-center my-5">

  <h2 class="h1-responsive font-weight-bold my-5 staat">Detailed breakdowns:</h2>
  <p class="lead grey-text w-responsive mx-auto mb-5">Select a data display type below.</p>

  <div class="row">

    <div class="col-md-6" id="pieIconDiv">
      <img src="img/pie.png" class="img-fluid mx-auto" alt="..." id="piechart">
      <h5 class="font-weight-bold my-4 staat">Pie Chart</h5>
      <p class="grey-text mb-md-0 mb-5">Displays data as a pie chart, broken down by category.</p>
    </div>

    <div class="col-md-6" id="tableIconDiv">
      <img src="img/table.png" class="img-fluid mx-auto" alt="..." id="table">
      <h5 class="font-weight-bold my-4 staat">Table View</h5>
      <p class="grey-text mb-0">Displays data as a table, includes totals, daily expense and percentages.</p>
    </div>
  </div>

</section>
</div>

<div id="pieview">

    <div class="mx-auto">
        <div id="chartContainer"></div>
    </div>

</div>

<!-- TABLE DISPLAY DIV -->
<div id="tableview" class="mt-4">
<?php  include ("table.php"); ?>
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

      
<!-- JQUERY SCRIPT FOR SHOWING AND HIDING DATA AREAS -->
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<div class="piearea" id="piearea">

<?php
    include("piechart.php");
?>

</div>
<!--
        <script>
        //PIE CHART RENDERING SCRIPT
            window.onload = function() {
                CanvasJS.addColorSet("customColorSet1",
                    [   //Custom colors for the chart
                    "#FE4A49",
                    "#2AB7CA",
                    "#FED766",
                    "#FFFF82",
                    "#FF8C42",
                    "#33658A",
                    "#EF476F",
                    "#44BBA4",
                    "#06D6A0",
                    "#26547C"             
                    ]);
             
            var chart = new CanvasJS.Chart("chartContainer", {
                //interactivityEnabled: false, //Toggle mouseover info and clickable sections
                animationEnabled: false,
                colorSet: "customColorSet1",
                height: 800,
                width: 1000,
                legend: {
                  horizontalAlign: "right",
                  verticalAlign: "center"
                },
                subtitles: [{
                    fontFamily: "Helvetica",
                }],
                data: [{
                    //showInLegend: true,
                    type: "pie",
                    yValueFormatString: "#,##0.00\"%\"",
                    //indexLabel: "{label} ({y})",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }],
            });
            chart.render();
            }
        </script>

<?php
    include("footer.php");
    mysqli_close($connection);
?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>             