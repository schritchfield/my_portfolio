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
        $prevMonth = '01';
    }
    elseif ($month == '03') {
        $monthName = 'March';
        $prevMonth = '02';
    }
    elseif ($month == '04') {
        $monthName = 'April';
        $prevMonth = '03';
    }
    elseif ($month == '05') {
        $monthName = 'May';
        $prevMonth = '04';
    }
    elseif ($month == '06') {
        $monthName = 'June';
        $prevMonth = '05';
    }
    elseif ($month == '07') {
        $monthName = 'July';
        $prevMonth = '06';
    }
    elseif ($month == '08') {
        $monthName = 'August';
        $prevMonth = '07';
    }
    elseif ($month == '09') {
        $monthName = 'September';
        $prevMonth = '08';
    }
    elseif ($month == '10') {
        $monthName = 'October';
        $prevMonth = '09';
    }
    elseif ($month == '11') {
        $monthName = 'November';
        $prevMonth = '10';
    }
    elseif ($month == '12') {
        $monthName = 'December';
        $prevMonth = '11';
    }
    else{
        $monthName = '2019';
    }

   //========================================================================MONTH GOALS
    $sql_g = "SELECT * FROM expense_goals WHERE mg_date = '$month'";
    $result = mysqli_query($connection,$sql_g);
    
    $row_g = mysqli_fetch_assoc($result);

    $totalGoal = $row_g['total_g'];
    $billGoal = $row_g['bills_g'];
    $foodGoal = $row_g['food_g'];
    $gasGoal = $row_g['gas_g'];
    $businessGoal = $row_g['business_g'];
    $nonessentialGoal = $row_g['nonessential_g'];

   //========================================================================MONTH DATA RECORDS
    if ($month != '00') {   
        $sql = "SELECT * FROM expenditures WHERE m_date = '$month'";
        $result = mysqli_query($connection,$sql);

        $timeUnit = 'month';
        if(($month != '01')){
            $sql_2 = "SELECT * FROM expenditures WHERE m_date = '$prevMonth'";
            $result_2 = mysqli_query($connection,$sql_2);
        }
    }

    else{
        $sql = "SELECT * FROM expenditures";
        $result = mysqli_query($connection,$sql);
        $timeUnit = 'year';
    }

    $monthtotal = 0;
    $rentRate = 450;
    $dayCount = 0;
    $mealsOut = 0;
    $gasPurchases = 0;

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

    $mostExpensiveDay = 0;
    $mostExpensiveDate = 0;

    while ($row = mysqli_fetch_assoc($result)){

        $monthtotal += $row['total'];
        $dayCount++;
        
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

        if($row['restaurants'] != 0){
            $mealsOut++;
        }

        if($row['gas'] != 0){
            $gasPurchases++;
        }

        if($row['total'] > $mostExpensiveDay){
            if(($row['rent'] != 0) && ($row['phone'] != 0)){
                $mostExpensiveDay = $row['total'] - $row['rent'] - $row['phone'];
            }
            else if($row['rent'] != 0){
                $mostExpensiveDay = $row['total'] - $row['rent'];
            }
            else if($row['phone'] != 0){
                $mostExpensiveDay = $row['total'] - $row['phone'];
            }
            else{
                $mostExpensiveDay = $row['total'];
            }
            $mostExpensiveDate = $row['m_date']."/".$row['d_date'];
        }
    }

if($monthtotal != 0){
    if ($mealsOut != 0) {
        $mealsOutAvg = $restMonthTotal/$mealsOut;
    }
    if ($gasPurchases != 0) {
        $gasPurchasesAvg = $gasMonthTotal/$gasPurchases;
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

    $gasAvg = ($gasMonthTotal/$dayCount);
    $foodAvg = (($grocMonthTotal+$restMonthTotal)/$dayCount);
    $dividedRent = ($rentRate*12)/365;
    $phoneAvg = ($phoneMonthTotal*12)/365;
    $grocAvg = ($grocMonthTotal/$dayCount);
    $restAvg = ($restMonthTotal/$dayCount);
    $clothesAvg = ($clothesMonthTotal/$dayCount);
    $workoutAvg = ($workoutMonthTotal/$dayCount);    
    $businessAvg = ($businessMonthTotal/$dayCount);
    $buildAvg = ($buildMonthTotal/$dayCount);
    $entAvg = ($entMonthTotal/$dayCount);
    $otherAvg = ($otherMonthTotal/$dayCount);

    $dailyTotal = (($monthtotal - $rentMonthTotal)/$dayCount) + $dividedRent;
    $dailyRent = number_format($dividedRent, 2, '.', '');
    $dailyGas = number_format($gasAvg, 2, '.', '');
    $dailyFood = number_format($foodAvg, 2, '.', '');
    $dailyGroc = number_format($grocAvg, 2, '.', '');
    $dailyRest = number_format($restAvg, 2, '.', '');
    $dailyClothes = number_format($clothesAvg, 2, '.', '');
    $dailyWorkout = number_format($workoutAvg, 2, '.', '');    
    $dailyPhone = number_format($phoneAvg, 2, '.', '');
    $dailyBusiness = number_format($businessAvg, 2, '.', '');
    $dailyBuild = number_format($buildAvg, 2, '.', '');
    $dailyEnt = number_format($entAvg, 2, '.', '');
    $dailyOther = number_format($otherAvg, 2, '.', '');
    $dailyTotalP = number_format($dailyTotal, 2, '.', '');

    $costOfLiving = "The total daily cost of living: $".$dailyTotalP;
    $costOfFood = "The daily cost of food: $".$dailyFood;
    $costOfGas = "The daily cost of gas: $".$dailyGas;
}
else{
    $costOfLiving = "There is not enough data to determine the daily cost of living.";
    $costOfFood = "There is not enough data to determine the daily cost of food.";
    $costOfGas = "There is not enough data to determine the daily cost of gas.";
}

//==========================================================================================% OF GOAL

if(($monthtotal != 0) && ($month != '00') && ($totalGoal != NULL) && ($totalGoal != '00')){
    if($monthtotal <= $totalGoal){
        $totalReached = $totalGoal - $monthtotal;
        $percentReached = number_format((($totalReached/$totalGoal)*100), 1, '.', '');
        $reachedMsg = "Remaining Funds: $". $totalReached . " &#40;".$percentReached."&#37;&#41;";
    }
    else{
        $totalReached = $monthtotal - $totalGoal;
        $percentReached = number_format((($totalReached/$totalGoal)*100), 1, '.', '');
        $reachedMsg = "Over Budget: $". $totalReached . " &#40;".$percentReached."&#37;&#41;";
    }
}
else{
    $reachedMsg = "Select a month.";
    $totalGoal = 0;
    $totalReached = 0;
    $percentReached = 0;
}

//=======================================================================================PREVIOUS MONTH

if(($month != '00')&&($month != '01')){

    $monthtotal_prev = 0;
    $rentRate_prev = 450;
    $dayCount_prev = 0;
    $mealsOut_prev = 0;
    $gasPurchases_prev = 0;
    $rentMonthTotal_prev = 0;
    $grocMonthTotal_prev = 0;
    $restMonthTotal_prev = 0;
    $gasMonthTotal_prev = 0;
    $phoneMonthTotal_prev = 0;
    $clothesMonthTotal_prev = 0;
    $workoutMonthTotal_prev = 0;
    $buildMonthTotal_prev = 0;
    $businessMonthTotal_prev = 0;
    $entMonthTotal_prev = 0;
    $otherMonthTotal_prev = 0;

    $mostExpensiveDay_prev = 0;
    $mostExpensiveDate_prev = 0;

    while ($row_prev = mysqli_fetch_assoc($result_2)){

        $monthtotal_prev += $row_prev['total'];
        $dayCount_prev++;
        
        $rentMonthTotal_prev += $row_prev['rent'];
        $grocMonthTotal_prev += $row_prev['groceries'];
        $restMonthTotal_prev += $row_prev['restaurants'];
        $gasMonthTotal_prev += $row_prev['gas'];
        $phoneMonthTotal_prev += $row_prev['phone'];
        $clothesMonthTotal_prev += $row_prev['clothes'];
        $workoutMonthTotal_prev += $row_prev['workout'];
        $buildMonthTotal_prev += $row_prev['builds'];
        $businessMonthTotal_prev += $row_prev['business'];
        $entMonthTotal_prev += $row_prev['entertainment'];
        $otherMonthTotal_prev += $row_prev['other'];

        if($row_prev['restaurants'] != 0){
            $mealsOut_prev++;
        }

        if($row_prev['gas'] != 0){
            $gasPurchases_prev++;
        }

        if($row_prev['total'] > $mostExpensiveDay_prev){
            if(($row_prev['rent'] != 0) && ($row_prev['phone'] != 0)){
                $mostExpensiveDay_prev = $row_prev['total'] - $row_prev['rent'] - $row_prev['phone'];
            }
            else if($row_prev['rent'] != 0){
                $mostExpensiveDay_prev = $row_prev['total'] - $row_prev['rent'];
            }
            else if($row_prev['phone'] != 0){
                $mostExpensiveDay_prev = $row_prev['total'] - $row_prev['phone'];
            }
            else{
                $mostExpensiveDay_prev = $row_prev['total'];
            }
            $mostExpensiveDate_prev = $row_prev['m_date']."/".$row_prev['d_date'];
        }
    }

    if($monthtotal_prev != 0){
        if ($mealsOut_prev != 0) {
            $mealsOutAvg_prev = $restMonthTotal_prev/$mealsOut_prev;
        }
        if ($gasPurchases_prev != 0) {
            $gasPurchasesAvg_prev = $gasMonthTotal_prev/$gasPurchases_prev;
        }


        $grocMonthPercent_prev = ($grocMonthTotal_prev/$monthtotal_prev)*100;
        $restMonthPercent_prev = ($restMonthTotal_prev/$monthtotal_prev)*100;
        $gasMonthPercent_prev = ($gasMonthTotal_prev/$monthtotal_prev)*100;
        $rentMonthPercent_prev = ($rentMonthTotal_prev/$monthtotal_prev)*100;
        $phoneMonthPercent_prev = ($phoneMonthTotal_prev/$monthtotal_prev)*100;
        $clothesMonthPercent_prev = ($clothesMonthTotal_prev/$monthtotal_prev)*100;
        $workoutMonthPercent_prev = ($workoutMonthTotal_prev/$monthtotal_prev)*100;
        $buildMonthPercent_prev = ($buildMonthTotal_prev/$monthtotal_prev)*100;
        $businessMonthPercent_prev = ($businessMonthTotal_prev/$monthtotal_prev)*100;
        $entMonthPercent_prev = ($entMonthTotal_prev/$monthtotal_prev)*100;
        $otherMonthPercent_prev = ($otherMonthTotal_prev/$monthtotal_prev)*100;

        $gasAvg_prev = ($gasMonthTotal_prev/$dayCount_prev);
        $foodAvg_prev = (($grocMonthTotal_prev+$restMonthTotal_prev)/$dayCount_prev);
        $dividedRent_prev = ($rentRate_prev*12)/365;
        $phoneAvg_prev = ($phoneMonthTotal_prev*12)/365;
        $grocAvg_prev = ($grocMonthTotal_prev/$dayCount_prev);
        $restAvg_prev = ($restMonthTotal_prev/$dayCount_prev);
        $clothesAvg_prev = ($clothesMonthTotal_prev/$dayCount_prev);
        $workoutAvg_prev = ($workoutMonthTotal_prev/$dayCount_prev);    
        $businessAvg_prev = ($businessMonthTotal_prev/$dayCount_prev);
        $buildAvg_prev = ($buildMonthTotal_prev/$dayCount_prev);
        $entAvg_prev = ($entMonthTotal_prev/$dayCount_prev);
        $otherAvg_prev = ($otherMonthTotal_prev/$dayCount_prev);

        $dailyTotal_prev = (($monthtotal_prev - $rentMonthTotal_prev)/$dayCount_prev) + $dividedRent_prev;
        $dailyRent_prev = number_format($dividedRent_prev, 2, '.', '');
        $dailyGas_prev = number_format($gasAvg_prev, 2, '.', '');
        $dailyFood_prev = number_format($foodAvg_prev, 2, '.', '');
        $dailyGroc_prev = number_format($grocAvg_prev, 2, '.', '');
        $dailyRest_prev = number_format($restAvg_prev, 2, '.', '');
        $dailyClothes_prev = number_format($clothesAvg_prev, 2, '.', '');
        $dailyWorkout_prev = number_format($workoutAvg_prev, 2, '.', '');    
        $dailyPhone_prev = number_format($phoneAvg_prev, 2, '.', '');
        $dailyBusiness_prev = number_format($businessAvg_prev, 2, '.', '');
        $dailyBuild_prev = number_format($buildAvg_prev, 2, '.', '');
        $dailyEnt_prev = number_format($entAvg_prev, 2, '.', '');
        $dailyOther_prev = number_format($otherAvg_prev, 2, '.', '');
        $dailyTotalP_prev = number_format($dailyTotal_prev, 2, '.', '');

        $costOfLiving_prev = "The total daily cost of living: $".$dailyTotalP_prev;
        $costOfFood_prev = "The daily cost of food: $".$dailyFood_prev;
        $costOfGas_prev = "The daily cost of gas: $".$dailyGas_prev;

    }
    //===================================================================CHANGE CALCULATIONS==============
    if(($monthtotal != 0)&&($monthtotal_prev != 0)){
        if($monthtotal > $monthtotal_prev){
            $totalChange = (($monthtotal/$monthtotal_prev)*100)-100;
            $changeWord = 'Up';
        }
        else{
            $totalChange = (($monthtotal_prev/$monthtotal)*100)-100;
            $changeWord = 'Down';
        }
    }
    else{
        $totalChange = 0;
        $changeWord = 'Insufficient data';
    }
    //======================================================================GAS
    if(($gasMonthTotal != 0)&&($gasMonthTotal_prev != 0)){
        if($gasMonthTotal > $gasMonthTotal_prev){
            $gasChange = (($gasMonthTotal/$gasMonthTotal_prev)*100)-100;
            $changeWord_g = 'Up';
        }
        else{
            $gasChange = (($gasMonthTotal_prev/$gasMonthTotal)*100)-100;
            $changeWord_g = 'Down';
        }
    }
    else{
        $gasChange = 0;
        $changeWord_g = 'No data';
    }
    //=====================================================================FOOD
    if((($restMonthTotal != 0)&&($restMonthTotal_prev != 0))||(($grocMonthTotal != 0)&&($grocMonthTotal_prev != 0))){
        if(($restMonthTotal+$grocMonthTotal) > ($restMonthTotal_prev+$grocMonthTotal_prev)){
            $foodChange = ((($restMonthTotal+$grocMonthTotal)/($restMonthTotal_prev+$grocMonthTotal_prev))*100)-100;
            $changeWord_f = 'Up';
        }
        else{
            $foodChange = ((($restMonthTotal_prev+$grocMonthTotal_prev)/($restMonthTotal+$grocMonthTotal))*100)-100;
            $changeWord_f = 'Down';
        }
    }
    else{
        $foodChange = 0;
        $changeWord_f = 'No data';
    }
    //=====================================================================Business
    if(($businessMonthTotal != 0)&&($businessMonthTotal_prev != 0)){    
        if($businessMonthTotal > $businessMonthTotal_prev){
            $businessChange = (($businessMonthTotal/$businessMonthTotal_prev)*100)-100;
            $changeWord_b = 'Up';
        }
        else{
            $businessChange = (($businessMonthTotal_prev/$businessMonthTotal)*100)-100;
            $changeWord_b = 'Down';
        }
    }
    else{
        $businessChange = 0;
        $changeWord_b = 'No data';
    }
    //=====================================================================NONESSENTIAL
    if((($entMonthTotal != 0)&&($entMonthTotal_prev != 0))||(($workoutMonthTotal != 0)&&($workoutMonthTotal_prev != 0))||(($buildMonthTotal != 0)&&($buildMonthTotal_prev != 0))){  
        if(($entMonthTotal+$workoutMonthTotal+$buildMonthTotal) > ($entMonthTotal_prev+$workoutMonthTotal_prev+$buildMonthTotal_prev)){
            $nonessChange = ((($entMonthTotal+$workoutMonthTotal+$buildMonthTotal)/($entMonthTotal_prev+$workoutMonthTotal_prev+$buildMonthTotal_prev))*100)-100;
            $changeWord_n = 'Up';
        }
        else{
            $nonessChange = ((($entMonthTotal_prev+$workoutMonthTotal_prev+$buildMonthTotal_prev)/($entMonthTotal+$workoutMonthTotal+$buildMonthTotal))*100)-100;
            $changeWord_n = 'Down';
        }
    }
}

?>