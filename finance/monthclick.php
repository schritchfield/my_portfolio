<?php
    //This page does the calculations for the main page graphs and statistics

    //Check if month was selected, otherwise default to January
    if (isset($_POST['whatmonth'])) {
        $month = $_POST['whatmonth']; //set php variable to the month numerical value
    }
    else{
        $_POST['whatmonth'] = '00';
        $month = '00'; //set a default of 00, which will later be used to denote the whole year
        $monthName = '2019';
    }

    //Name Months for use in text elements
    if ($month == '01') {
        $monthName = 'January';
    }
    elseif ($month == '02') {
        $monthName = 'February';
    }
    elseif ($month == '03') {
        $monthName = 'March';
    }
    else{
        $monthName = '2019';
    }

    //========================================================================MONTH DATA RECORDS
    $sql = "SELECT * FROM expenditures WHERE m_date = '$month'";
    $result = mysqli_query($connection,$sql);

    echo '<script>
    window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true, //Animation toggle
        theme: "dark1", //theme presets (from canvasJS)
        backgroundColor: "#183A37", //custom set bg color

        axisY:{ //Controls specific attributes of the Y axis
            title: "Daily Spending:",
            prefix: "$",
            includeZero: false,
            titleFontColor: "white"
        },
        axisX: { //Controls specific attributes of the X axis
            title: <?php echo "'".$monthName."'"; ?>,
            titleFontColor: "white",
            //minimum: 1, //custom start date, may add this back in a feature
            prefix: "Day ",
            interval: <?php //This sets the interval of days that appear on the X axis, depending on # of days shown
                      if (isset($_POST['whatmonth'])) { 
                            $month = $_POST['whatmonth'];
                          
                          if($month == '00'){
                              $interval = '7'; //IF the user views the whole year, show weekly markers
                          }
                          else{
                              $interval = '1'; //ELSE show daily markers
                          }
                      }

            echo $interval; ?> //This actually prints out the interval value so that the plugin can use it
        },
        data: [{ //This is where the data from the SQL database is integrated into the Canvas.JS plugin      
            markerColor: "white",
            lineColor: "#BEEDAA", //custom line color
            type: "spline", //Graph type
            dataPoints: [
            <?php
                if($month != '00'){ //If 00 was selected (all year), pull all data
                  $sql = "SELECT * FROM expenditures WHERE m_date = '$month'";
                  $result = mysqli_query($connection,$sql);            
                }
                else{ //otherwise get the data from the specific date range, using the matching m_date value*/
                  $sql = "SELECT * FROM expenditures";
                  $result = mysqli_query($connection,$sql);
                }

                while ($row = mysqli_fetch_assoc($result)){
                    echo "{ y: ".($row['total'] - $row['rent'] - $row['phone'])." },"; //This echoes out the nescessary syntax + the values for expenditures, subtracting the monthly bills.
                }
            ?>
            ]
        }]
    });
    chart.render();
    }
    </script>";';
?>