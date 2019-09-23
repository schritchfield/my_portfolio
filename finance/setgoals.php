<?php
//THIS FILE WRITES OR OVERWRITES DATA IN THE SQL DATABASE BASED ON THE USER'S GOAL INFORMATION, PASSED TO IT BY THE AJAX IN GOALSUPDATE.PHP

	include("db_connect.php");

	$avlFunds = $_POST["avlFunds"];

    $monthVal = $_POST["month"];
    $yearVal = '2019';

    $foodInput = $_POST["food"];
    $gasInput = $_POST["gas"];
    $rentInput = $_POST["bills"];
    $businessInput = $_POST["business"];
    $nonessentialInput = $_POST["noness"];

    //This adds all totals so the user doesn't have to do the math
    $totalInput = $avlFunds;

    $sql = "SELECT * FROM expense_goals WHERE mg_date = '$monthVal' AND yg_date = '$yearVal'";
    $result = mysqli_query($connection, $sql);
    
      if (mysqli_num_rows($result) == 1){ //If at least one result

      	$sql = "UPDATE expense_goals SET bills_g = '$rentInput', gas_g = '$gasInput', business_g = '$businessInput', nonessential_g = '$nonessentialInput', food_g = '$foodInput', total_g = '$totalInput' WHERE mg_date = '$monthVal' AND yg_date = '$yearVal'";
          
        mysqli_query($connection, $sql);

        echo '<script type="text/javascript">alert("Updated!");</script>'; 
    
      }else{  //If new day
        
        $sql = "INSERT INTO expense_goals (id, mg_date, yg_date, bills_g, gas_g, business_g, nonessential_g, food_g, total_g) VALUES (NULL, '$monthVal', '$yearVal', '$rentInput', '$gasInput', '$businessInput', '$nonessentialInput', '$foodInput', '$totalInput')"; //prepare to add stats to database table
        mysqli_query($connection, $sql);
        
      }
?>