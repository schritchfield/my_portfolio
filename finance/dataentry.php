<?php
  include("db_connect.php");

  if(isset($_POST['submit'])){

    //Get the date values form the form dropdowns
    $dayVal = $_POST["data_d_select"];
    $monthVal = $_POST["data_m_select"];
    $yearVal = $_POST["data_y_select"];

    $rentInput = '0'; //These dont change from month to month and aren't really a daily purchase, so I have them hard-coded for now
    $phoneInput = '0';
  
    //This section sets the value to zero for each category if the user didn't enter an amount

    if(!empty($_POST["grocInput"])){
          $grocInput = $_POST["grocInput"];
        }else{
          $grocInput = '0';
        }

    if(!empty($_POST["restInput"])){
          $restInput = $_POST["restInput"];
        }else{
          $restInput = '0';
        }

    if(!empty($_POST["gasInput"])){
          $gasInput = $_POST["gasInput"];
        }else{
          $gasInput = '0';
        }

    if(!empty($_POST["clothesInput"])){
          $clothesInput = $_POST["clothesInput"];
        }else{
          $clothesInput = '0';
        }

    if(!empty($_POST["workoutInput"])){
          $workoutInput = $_POST["workoutInput"];
        }else{
          $workoutInput = '0';
        }

    if(!empty($_POST["buildInput"])){
          $buildInput = $_POST["buildInput"];
        }else{
          $buildInput = '0';
        }

    if(!empty($_POST["businessInput"])){
          $businessInput = $_POST["businessInput"];
        }else{
          $businessInput = '0';
        }

    if(!empty($_POST["entInput"])){
          $entInput = $_POST["entInput"];
        }else{
          $entInput = '0';
        }

    if(!empty($_POST["otherInput"])){
          $otherInput = $_POST["otherInput"];
        }else{
          $otherInput = '0';
        }

    //This adds all totals so the user doesn't have to do the math
    $totalInput = ($grocInput + $restInput + $gasInput + $rentInput + $phoneInput + $clothesInput + $workoutInput + $buildInput + $businessInput + $entInput + $otherInput);

    $sql = "SELECT * FROM expenditures WHERE d_date = '$dayVal' AND m_date = '$monthVal' AND y_date = '$yearVal'"; //Check to see if day already exists
    $result = mysqli_query($connection, $sql); //store results of query in $result var
    
      if (mysqli_num_rows($result) == 1){ //If at least one result
        echo '<script type="text/javascript">alert("There is already data for this day! (Overwrite feature coming soon.)");</script>'; //Warns user there is already data (I will replace this)
        echo '<script type="text/javascript">window.location = "logdata.php"</script>'; //Refresh
    
      }else{  //If new day
        
        $sql = "INSERT INTO expenditures (id, d_date, m_date, y_date, groceries, restaurants, gas, rent, phone, clothes, workout, builds, business, entertainment, other, total) VALUES (NULL, '$dayVal', '$monthVal', '$yearVal', '$grocInput', '$restInput', '$gasInput', '$rentInput', '$phoneInput', '$clothesInput', '$workoutInput', '$buildInput', '$businessInput', '$entInput', '$otherInput', '$totalInput')"; //prepare to add stats to database table
        mysqli_query($connection, $sql); //run the query
        
        echo '<script type="text/javascript">window.location = "index.php"</script>'; //Takes user to home
      }
  }
?>