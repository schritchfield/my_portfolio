<script src="js/histjs.js"></script>

<?php 

/*This page creates a line chart using the CanvasJS framework to visualize data from the SQL database. It integrated via PHP include on another page.*/

include("db_connect.php");
include("calculations.php");

if (isset($_POST['whatmonth'])) { //Determine whether to say the month, or year

echo '
<div id="glance" class="jumbotron jumbotron-fluid customgreen5 text-light mb-0 staat">
<div class="container">

  <div class="row">
    <div class="col">
      <img src="img/calendar.png" class="img-fluid" id="calendar" data-toggle="modal" data-target="#exampleModal">
    </div>
    <div class="col-9">
      <h1 class="display-4 staat" id="monthheader">';

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
echo '</h1>
      <button type="button" class="btn btn-primary" id="dailybd">Daily Breakdown</button>
    </div>
  </div>

  </div>

</div>
</div>';
}

echo '<script>
var chart = new CanvasJS.Chart("chartContainer",{ 
animationEnabled: true, 
theme: "dark1", 
backgroundColor: "#244b3f", 
axisY:{ title: "Daily Spending:", 
prefix: "$", 
includeZero: false, 
titleFontColor: "white" }, 
axisX: { title:'; 

echo "'".$monthName."'"; 
echo ', 
titleFontColor: "white", 
prefix: "Day ", 
interval:';
                          
    if($month == '00'){
        $interval = '14'; //IF the user views the whole year, show weekly markers
    }
    else{
        $interval = '1'; //ELSE show daily markers
    }
echo $interval;
echo '}, 
    data: [{
        type:"spline",
        axisYType: "secondary",
        name: "Total",
        showInLegend: true,
        markerSize: 0,
        yValueFormatString: "$###.##",
        dataPoints: [';

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

echo ']
    },
    {
        type: "spline",
        axisYType: "secondary",
        name: "Groceries",
        showInLegend: true,
        markerSize: 0,
        yValueFormatString: "$###.##",
        dataPoints: [';

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
echo '],
    },
    {
        type: "spline",
        axisYType: "secondary",
        name: "Restaurants",
        showInLegend: true,
        markerSize: 0,
        yValueFormatString: "$###.##",
        dataPoints: [';

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

echo ']
    },
    {
        type: "spline",
        axisYType: "secondary",
        name: "Gas",
        showInLegend: true,
        markerSize: 0,
        yValueFormatString: "$###.##",
        dataPoints: [';

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
echo '],
    },
    {
        type: "spline",
        axisYType: "secondary",
        name: "Business",
        showInLegend: true,
        markerSize: 0,
        yValueFormatString: "$###.##",
        dataPoints: [';

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
echo '],
    },
    {
        type: "spline",
        axisYType: "secondary",
        name: "Non-essentials",
        showInLegend: true,
        markerSize: 0,
        yValueFormatString: "$###.##",
        dataPoints: [';

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
    echo']

    }]
}); 
chart.render(); 
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<div class="customgreen5 pb-4">
  <div class="ninetyp">
    <div id="chartContainer" style="height: 400px; width: 100%;"></div>
  </div>
</div>';
?>