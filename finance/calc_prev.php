<?php
    //contains calcualtions for previous month comparison to selected month
    
    //Initailize variables to 0 for all data
    $monthtotal_prev = 0;
    $rentRate_prev = 450; //Set to 450 by default, will ad ability to change this later
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

    $sql_2 = "SELECT * FROM expenditures WHERE m_date = '$02'";
    $result_2 = mysqli_query($connection,$sql_2);
//=======================================================================================PREVIOUS MONTH

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