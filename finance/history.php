<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Raleway|Staatliches" rel="stylesheet">

    <!-- Bootstrap CSS -->

  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <script src="js/jquery-3.3.1.js"></script>
  <script src="js/histjs.js"></script>


    <title>ExpensEZ</title>
</head>
<body class="raleway">
  <?php 
      include("db_connect.php");
      include("calculations.php"); //Disabled due to bugs, nescessary code place in this page
      //include("calc_prev.php");
      include("nav.php");
  ?>
<!-- JUMBOTRON ============================================================================================== -->
<div class="jumbotron mb-0" style="background-image: url(img/banner.jpg);">
  <div class="container">
        <img src="img/logo.png" class="mx-auto img-fluid" alt="logo">
        <!--<p class="lead">This site contains a breakdown and analysis of my expenditures for each month.</p>-->
        <hr class="my-4">
        <p>View a selected period of time as a line chart to see how your daily expenditures stack up.</p>
  </div>
</div>

<script>
    window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true, //Animation toggle
        theme: "dark1", //theme presets (from canvasJS)
        backgroundColor: "#244b3f", 
     axisY:{ title: "Daily Spending:", 
        prefix: "$", 
        includeZero: false, 
        titleFontColor: "white" }, 
    axisX: { title: <?php echo "'".$monthName."'";?>,
        titleFontColor: "white", 
        prefix: "Day ", 
        interval:
        <?php                   
            if($month == '00'){
                $interval = '14'; //IF the user views the whole year, show weekly markers
            }
            else{
                $interval = '1'; //ELSE show daily markers
            }
            echo $interval.','; ?>
    },
    data: [{
        type:"spline",
        axisYType: "secondary",
        name: "Total",
        showInLegend: true,
        markerSize: 0,
        yValueFormatString: "$###.##",
        dataPoints: [
        <?php
            if($month != '00'){ //If 00 was selected (all year), pull all data
                $sql = "SELECT * FROM expenditures WHERE m_date = '$month'";
                $result = mysqli_query($connection,$sql);            
            }
            else{ //otherwise get the data from the specific date range, using the matching m_date value
                $sql = "SELECT * FROM expenditures";
                $result = mysqli_query($connection,$sql);
            }

            while ($row = mysqli_fetch_assoc($result)){
                echo "{ y: ".($row['total'] - $row['rent'] - $row['phone'])." },"; //This echoes out the nescessary syntax + the values for expenditures, subtracting the monthly bills.
            }
        ?>
        ],
    },
    {
        type: "spline",
        axisYType: "secondary",
        name: "Groceries",
        showInLegend: true,
        markerSize: 0,
        yValueFormatString: "$###.##",
        dataPoints: [
            <?php
                if($month != '00'){ //If 00 was selected (all year), pull all data
                    $sql = "SELECT * FROM expenditures WHERE m_date = '$month'";
                    $result = mysqli_query($connection,$sql);            
                }
                else{ //otherwise get the data from the specific date range, using the matching m_date value
                    $sql = "SELECT * FROM expenditures";
                    $result = mysqli_query($connection,$sql);
                }

                while ($row = mysqli_fetch_assoc($result)){
                    echo "{ y: ".$row['groceries']." },"; //This echoes out the nescessary syntax + the values for expenditures, subtracting the monthly bills.
                }
            ?>
        ],
    },
    {
        type: "spline",
        axisYType: "secondary",
        name: "Restaurants",
        showInLegend: true,
        markerSize: 0,
        yValueFormatString: "$###.##",
        dataPoints: [
            <?php
                if($month != '00'){ //If 00 was selected (all year), pull all data
                    $sql = "SELECT * FROM expenditures WHERE m_date = '$month'";
                    $result = mysqli_query($connection,$sql);            
                }
                else{ //otherwise get the data from the specific date range, using the matching m_date value
                    $sql = "SELECT * FROM expenditures";
                    $result = mysqli_query($connection,$sql);
                }

                while ($row = mysqli_fetch_assoc($result)){
                    echo "{ y: ".$row['restaurants']." },"; //This echoes out the nescessary syntax + the values for expenditures, subtracting the monthly bills.
                }
            ?>
        ],
    },
    {
        type: "spline",
        axisYType: "secondary",
        name: "Gas",
        showInLegend: true,
        markerSize: 0,
        yValueFormatString: "$###.##",
        dataPoints: [
            <?php
                if($month != '00'){ //If 00 was selected (all year), pull all data
                    $sql = "SELECT * FROM expenditures WHERE m_date = '$month'";
                    $result = mysqli_query($connection,$sql);            
                }
                else{ //otherwise get the data from the specific date range, using the matching m_date value
                    $sql = "SELECT * FROM expenditures";
                    $result = mysqli_query($connection,$sql);
                }

                while ($row = mysqli_fetch_assoc($result)){
                    echo "{ y: ".$row['gas']." },"; //This echoes out the nescessary syntax + the values for expenditures, subtracting the monthly bills.
                }
            ?>
        ],
    },
    {
        type: "spline",
        axisYType: "secondary",
        name: "Business",
        showInLegend: true,
        markerSize: 0,
        yValueFormatString: "$###.##",
        dataPoints: [
            <?php
                if($month != '00'){ //If 00 was selected (all year), pull all data
                    $sql = "SELECT * FROM expenditures WHERE m_date = '$month'";
                    $result = mysqli_query($connection,$sql);            
                }
                else{ //otherwise get the data from the specific date range, using the matching m_date value
                    $sql = "SELECT * FROM expenditures";
                    $result = mysqli_query($connection,$sql);
                }

                while ($row = mysqli_fetch_assoc($result)){
                    echo "{ y: ".$row['business']." },"; //This echoes out the nescessary syntax + the values for expenditures, subtracting the monthly bills.
                }
            ?>
        ],
    },
    {
        type: "spline",
        axisYType: "secondary",
        name: "Non-essentials",
        showInLegend: true,
        markerSize: 0,
        yValueFormatString: "$###.##",
        dataPoints: [
            <?php
                if($month != '00'){ //If 00 was selected (all year), pull all data
                    $sql = "SELECT * FROM expenditures WHERE m_date = '$month'";
                    $result = mysqli_query($connection,$sql);            
                }
                else{ //otherwise get the data from the specific date range, using the matching m_date value
                    $sql = "SELECT * FROM expenditures";
                    $result = mysqli_query($connection,$sql);
                }

                while ($row = mysqli_fetch_assoc($result)){
                    echo "{ y: ".($row['workout']+$row['builds']+$row['entertainment'])." },"; //This echoes out the nescessary syntax + the values for expenditures, subtracting the monthly bills.
                }
            ?>
        ]
    },]
    }); 
    chart.render(); 
    }
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"> //load jQuery</script>
      
<!-- LINE CHART ============================================================================================= -->
<div id="chartarea">
<!--THIS AREA STARTS WITH A DEFAULT GRAPH, THEN GETS REPLACED WITH THE AJAX DATA-->

  <div id="glance" class="jumbotron jumbotron-fluid customgreen5 text-light mb-0 staat">
    <div class="container">
      <div class="row">
        <div class="col">
          <img src="img/calendar.png" class="img-fluid" id="calendar" data-toggle="modal" data-target="#exampleModal">
        </div>
        <div class="col-9">
          <h1 class="display-4 staat" id="monthheader">
            <?php
              if (isset($_POST['whatmonth'])) { //Determine whether to say the month, or year
                if($month == '00'){
                  echo "2019, One day at a time:";
                }
                else{
                  echo $monthName.", One day at a time:"; 
                }
              }
              else{
                  echo "2019, One day at a time:"; 
              }
            ?></h1>
            <button type="button" class="btn btn-primary" id="dailybd">Daily Breakdown</button>
        </div>
      </div>
    </div>
  </div>
  <!-- LINE CHART ============================================================================================= -->
  <div class="customgreen5 pb-4">
    <div class="ninetyp">
      <div id="chartContainer" style="height: 400px; width: 100%;"></div>
    </div>
  </div>

</div>

<div id="versus">
</div>

<div id="bdtable">
<?php
    include("detailtable.php");
?>
</div>

<?php
    include("footer.php");
    mysqli_close($connection);
?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>             