<?php
//THIS FILE PRINTS THE PIE CHART

include("db_connect.php");

    if (isset($_POST['whatmonth'])) {
        $month = $_POST['whatmonth']; //set php variable to the month numerical value
    }
    else{
        $month = '00'; //set a default of 00, which will later be used to denote the whole year
    }

    if($month == '00'){ //If 00 was selected (all year), pull all data
        $sql = "SELECT * FROM expenditures";
        $result = mysqli_query($connection,$sql);      
    }
    else{ //otherwise get the data from the specific date range, using the matching m_date value
        $sql = "SELECT * FROM expenditures WHERE m_date = '$month'";
        $result = mysqli_query($connection,$sql); 
    }

    //Set all expense totals to 0 initially
    $monthtotal = 0;
    $rentMonthTotal = 0;
    $grocMonthTotal = 0;
    $restMonthTotal = 0;
    $gasMonthTotal = 0;
    $phoneMonthTotal = 0;
    $clothesMonthTotal = 0;
    $workoutMonthTotal = 0;
    $buildMonthTotal = 0;
    $businessMonthTotal = 0;
    $entMonthTotal = 0;
    $otherMonthTotal = 0;

    while ($row = mysqli_fetch_assoc($result)){

        $monthtotal += $row['total'];
        
        $rentMonthTotal += $row['rent'];
        $grocMonthTotal += $row['groceries'];
        $restMonthTotal += $row['restaurants'];
        $gasMonthTotal += $row['gas'];
        $phoneMonthTotal += $row['phone'];
        $clothesMonthTotal += $row['clothes'];
        $workoutMonthTotal += $row['workout'];
        $buildMonthTotal += $row['builds'];
        $businessMonthTotal += $row['business'];
        $entMonthTotal += $row['entertainment'];
        $otherMonthTotal += $row['other'];
    }

    $grocMonthPercent = ($grocMonthTotal/$monthtotal)*100;
    $restMonthPercent = ($restMonthTotal/$monthtotal)*100;
    $gasMonthPercent = ($gasMonthTotal/$monthtotal)*100;
    $rentMonthPercent = ($rentMonthTotal/$monthtotal)*100;
    $phoneMonthPercent = ($phoneMonthTotal/$monthtotal)*100;
    $clothesMonthPercent = ($clothesMonthTotal/$monthtotal)*100;
    $workoutMonthPercent = ($workoutMonthTotal/$monthtotal)*100;
    $buildMonthPercent = ($buildMonthTotal/$monthtotal)*100;
    $businessMonthPercent = ($businessMonthTotal/$monthtotal)*100;
    $entMonthPercent = ($entMonthTotal/$monthtotal)*100;
    $otherMonthPercent = ($otherMonthTotal/$monthtotal)*100;

    $dataPoints = array( 
        array("label"=>"Groceries", "y"=>$grocMonthPercent, "legendText"=>"Groceries"),
        array("label"=>"Restaurants", "y"=>$restMonthPercent, "legendText"=>"Restaurants"),
        array("label"=>"Gas", "y"=>$gasMonthPercent, "legendText"=>"Gas Purchases"),
        array("label"=>"Rent & Utilities", "y"=>$rentMonthPercent, "legendText"=>"Rent"),
        array("label"=>"Phone Bill", "y"=>$phoneMonthPercent, "legendText"=>"Phone bill"),
        array("label"=>"Clothes & Shoes", "y"=>$clothesMonthPercent, "legendText"=>"Clothes"),
        array("label"=>"Workout Gear & Supplements", "y"=>$workoutMonthPercent, "legendText"=>"Workout"),
        array("label"=>"Build Projects", "y"=>$buildMonthPercent, "legendText"=>"Projects"),
        array("label"=>"Business Expenses", "y"=>$businessMonthPercent, "legendText"=>"Business"),
        array("label"=>"Entertainment", "y"=>$entMonthPercent, "legendText"=>"Entertainment"),
        array("label"=>"Other", "y"=>$otherMonthPercent, "legendText"=>"Other")
    );

//Echo out code for chart creation JS
echo'
        <script>
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
                    dataPoints:' . json_encode($dataPoints, JSON_NUMERIC_CHECK).'
            }],
            });
            chart.render();
        </script>';
?>