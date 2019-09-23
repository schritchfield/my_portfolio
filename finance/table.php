<?php
//include("calculations.php");
//This file is purely for the display of the table breakdown of expenses. I made this a seperate file because it was lengthy and also so it could be re-used on other pages if desired.

    if (isset($_POST['whatmonth'])) {
        $month = $_POST['whatmonth']; //set php variable to the month numerical value
    }
    else{
        $_POST['whatmonth'] = '00';
        $month = '00'; //set a default of 00, which will later be used to denote the whole year
        $monthName = '2019';
    }

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
    }

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

if($monthtotal != 0){ //Only display if there is data, redundant fron the code on the main page.
?>
<!--Table=====================================================================================-->
<div class="container">
<div class="table-responsive">
  <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Type</th>
      <th scope="col">Total Cost</th>
      <th scope="col">Daily Cost</th>
      <th scope="col">% of Expense</th>
      <!--<th scope="col">Goal</th>-->
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Rent &amp; Utilities</th>
      <td><?php echo "$".($rentMonthTotal); ?></td>
      <td><?php echo "$".($dailyRent); ?></td>
      <td><?php echo number_format($rentMonthPercent, 1). "%"; ?></td>
      <!--<td><?php echo "$". $rentMonthTotal; ?></td>-->
    </tr>
    <tr>
      <th scope="row">Cellphone</th>
      <td><?php echo "$".($phoneMonthTotal); ?></td>
      <td><?php echo "$".($dailyPhone); ?></td>
      <td><?php echo number_format($phoneMonthPercent, 1). "%"; ?></td>
    </tr>
    <tr>
      <th scope="row">Groceries</th>
      <td><?php echo "$".($grocMonthTotal); ?></td>
      <td><?php echo "$".($dailyGroc); ?></td>
      <td><?php echo number_format($grocMonthPercent, 1). "%"; ?></td>
    </tr>
    <tr>
      <th scope="row">Restaraunts</th>
      <td><?php echo "$".($restMonthTotal); ?></td>
      <td><?php echo "$".($dailyRest); ?></td>
      <td><?php echo number_format($restMonthPercent, 1). "%"; ?></td>
    </tr>
    <tr>
      <th scope="row">Gas</th>
      <td><?php echo "$".($gasMonthTotal); ?></td>
      <td><?php echo "$".($dailyGas); ?></td>
      <td><?php echo number_format($gasMonthPercent, 1). "%"; ?></td>
    </tr>
    <tr>
      <th scope="row">Clothes, Shoes, Haircuts, etc.</th>
      <td><?php echo "$".($clothesMonthTotal); ?></td>
      <td><?php echo "$".($dailyClothes); ?></td>
      <td><?php echo number_format($clothesMonthPercent, 1). "%"; ?></td>
    </tr>
    <tr>
      <th scope="row">Business Expenses</th>
      <td><?php echo "$".($businessMonthTotal); ?></td>
      <td><?php echo "$".($dailyBusiness); ?></td>
      <td><?php echo number_format($businessMonthPercent, 1). "%"; ?></td>
    </tr>
    <tr>
      <th scope="row">Workout Spplements</th>
      <td><?php echo "$".($workoutMonthTotal); ?></td>
      <td><?php echo "$".($dailyWorkout); ?></td>
      <td><?php echo number_format($workoutMonthPercent, 1). "%"; ?></td>
    </tr>
    <tr>
      <th scope="row">Art &amp; Projects</th>
      <td><?php echo "$".($buildMonthTotal); ?></td>
      <td><?php echo "$".($dailyBuild); ?></td>
      <td><?php echo number_format($buildMonthPercent, 1). "%"; ?></td>
    </tr>
    <tr>
      <th scope="row">Entertainment</th>
      <td><?php echo "$".($entMonthTotal); ?></td>
      <td><?php echo "$".($dailyEnt); ?></td>
      <td><?php echo number_format($entMonthPercent, 1). "%"; ?></td>
    </tr>
    <tr>
      <th scope="row">Other Expenses</th>
      <td><?php echo "$".($otherMonthTotal); ?></td>
      <td><?php echo "$".($dailyOther); ?></td>
      <td><?php echo number_format($otherMonthPercent, 1). "%"; ?></td>
    </tr>
    <tr>
      <th scope="row">Total</th>
      <td><?php echo "$".($monthtotal); ?></td>
      <td><?php echo "$".($dailyTotalP); ?></td>
      <td>100%</td>
    </tr>
  </tbody>
</table>
</div>
</div>

<?php
}
?>