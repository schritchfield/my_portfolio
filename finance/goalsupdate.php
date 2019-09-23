<?php 
//THIS FILE UPDATES THE GOAL SETTING PORTION OF THE GOALS PAGE.
include("db_connect.php");
include("calculations.php");
?>
<div id="glance" class="jumbotron jumbotron-fluid customgreen1 text-light mb-0 staat">
<div class="container">

  <div class="row">
    <div class="col-3-md">
      <a href="goals.php#goaldata"><img src="img/calendar.png" class="img-fluid" id="calendar" data-toggle="modal" data-target="#exampleModal"></a>
    </div>
    <div class="col-6">
<?php

if($month != '00'){
  echo '<h1 class="display-2">'.$monthName.' Goal:</h1>';
  echo '<h1 class="display-4" id="totalGoalHeader">$ '.$totalGoal.' Total Expenses</h1>';
  echo'
    </div>
    <div class="col-3">
      <br><img src="img/plus_w.png" id="addToTotal"><br><br><img src="img/minus_w.png" id="subFromTotal">
    </div>
  </div>

  </div>
</div>';
}
else{
  echo '<h1 class="display-2">Select Month</h1>';    
}  

if($month != '00'){
?>

<!-- Monthly Goals area -->
<div class="jumbotron jumbotron-fluid customgreen2 text-dark mb-0 staat">
  <div class="container">


        <h1 class="display-4 text-center mb-4" id="totalRemainingFunds">Remaining Funds: $<?php echo $totalGoal; ?></h1>

  <!-- Goals column area -->
        <div class="row">
          
          <div class="col-md text-center">
            <p class="lead raleway">Rent, Utilities, Phone:</p><p class="staat fraction" id="billsFunds">$<?php echo $billGoal; ?></p>
            <img src="img/plus_stb.png" class="mr-2 ml-2" id="addToBills"><img src="img/minus_stb.png" class="mr-2 ml-2" id="subFromBills">
          </div>

          <div class="col-md text-center">
            <p class="lead raleway">Food:</p><p class="staat fraction" id="foodFunds">$<?php echo $foodGoal; ?></p>
            <img src="img/plus_stb.png" class="mr-2 ml-2" id="addToFood"><img src="img/minus_stb.png" class="mr-2 ml-2" id="subFromFood">
          </div>

          <div class="col-md text-center">
            <p class="lead raleway">Gas &amp; Transportation:</p><p class="staat fraction" id="gasFunds">$<?php echo $gasGoal; ?></p>
            <img src="img/plus_stb.png" class="mr-2 ml-2" id="addToGas"><img src="img/minus_stb.png" class="mr-2 ml-2" id="subFromGas">
          </div>

          <div class="col-md text-center">
            <p class="lead raleway">Business &amp; School:</p><p class="staat fraction" id="businessFunds">$<?php echo $businessGoal; ?></p>
            <img src="img/plus_stb.png" class="mr-2 ml-2" id="addToBusiness"><img src="img/minus_stb.png" class="mr-2 ml-2" id="subFromBusiness">
          </div>

          <div class="col-md text-center">
            <p class="lead raleway">Non-Essentials:</p><p class="staat fraction" id="nonessFunds">$<?php echo $nonessentialGoal; ?></p>
            <img src="img/plus_stb.png" class="mr-2 ml-2" id="addToNoness"><img src="img/minus_stb.png" class="mr-2 ml-2" id="subFromNoness">
          </div>
        </div>

    <div class="text-center mt-4">
      <input class="btn btn-secondary btn-lg" type="submit" name="submit" value="Save" id="saveGoals">
    </div>
      <div id="test"></div>

  </div>
</div>
<?php
}
?>
<script>
$("document").ready(function() {
    
      $("#calendar").mouseover(function() {
          $("#calendar").attr('src',"img/calendar_flip.png");
        })

        $("#calendar").mouseout(function() {
          $("#calendar").attr('src',"img/calendar.png");
        })
    
    var thisMonth = <?php echo $month; ?>;
    var monthGoal = <?php echo $totalGoal; ?>; //TOTAL GOAL

    var availableFunds = <?php echo $totalGoal; ?>; //Sets the available funds
    var billsFunds = <?php echo $billGoal; ?>;
    var foodFunds = <?php echo $foodGoal; ?>;
    var gasFunds = <?php echo $gasGoal; ?>;
    var businessFunds = <?php echo $businessGoal; ?>;
    var nonessFunds = <?php echo $nonessentialGoal; ?>;

    availableFunds = availableFunds - billsFunds - foodFunds - gasFunds - businessFunds - nonessFunds;
    $("#totalRemainingFunds").text("Remaining Funds: $" + availableFunds);

//====================================================================TOTAL, ADD/SUB in inc. of $25
    $("#addToTotal").click(function(){
      monthGoal = (monthGoal + 25);
      availableFunds = (availableFunds + 25);
      $("#totalRemainingFunds").text("Remaining Funds: $" + availableFunds);
      $("#totalGoalHeader").text("$" + monthGoal + " Total Expenses");
    });
    
    $("#subFromTotal").click(function(){
      if(availableFunds >= 25){
        monthGoal = (monthGoal - 25);
        availableFunds = (availableFunds - 25);
        $("#totalRemainingFunds").text("Remaining Funds: $" + availableFunds);
        $("#totalGoalHeader").text("$" + monthGoal + " Total Expenses");
      }
    });

//=====================================================================RENT/BILLS, ADD/SUB in inc. of $5
    $("#addToBills").click(function(){
        if(availableFunds >= 5){
          availableFunds = (availableFunds - 5);
          billsFunds = (billsFunds + 5);
          $("#totalRemainingFunds").text("Remaining Funds: $" + availableFunds);
          $("#billsFunds").text("$" + billsFunds);
        }
    });

    $("#subFromBills").click(function(){
        if(billsFunds >= 5){
          availableFunds = (availableFunds + 5);
          billsFunds = (billsFunds - 5);
          $("#totalRemainingFunds").text("Remaining Funds: $" + availableFunds);
          $("#billsFunds").text("$" + billsFunds);
        }
    });

//===========================================================================FOOD, ADD/SUB in inc. of $5
    $("#addToFood").click(function(){
      if(availableFunds >= 5){
        availableFunds = (availableFunds - 5);
        foodFunds = (foodFunds + 5);
        $("#totalRemainingFunds").text("Remaining Funds: $" + availableFunds);
        $("#foodFunds").text("$" + foodFunds);
      }
    });

    $("#subFromFood").click(function(){
      if(foodFunds >= 5){
        availableFunds = (availableFunds + 5);
        foodFunds = (foodFunds - 5);
        $("#totalRemainingFunds").text("Remaining Funds: $" + availableFunds);
        $("#foodFunds").text("$" + foodFunds);
      }
    });

//============================================================================GAS, ADD/SUB in inc. of $5
    $("#addToGas").click(function(){
      if(availableFunds >= 5){
        availableFunds = (availableFunds - 5);
        gasFunds = (gasFunds + 5);
        $("#totalRemainingFunds").text("Remaining Funds: $" + availableFunds);
        $("#gasFunds").text("$" + gasFunds);
      }
    });

    $("#subFromGas").click(function(){
      if(gasFunds >= 5){
        availableFunds = (availableFunds + 5);
        gasFunds = (gasFunds - 5);
        $("#totalRemainingFunds").text("Remaining Funds: $" + availableFunds);
        $("#gasFunds").text("$" + gasFunds);
      }
    });

//============================================================================GAS, ADD/SUB in inc. of $5
    $("#addToBusiness").click(function(){
      if(availableFunds >= 5){
        availableFunds = (availableFunds - 5);
        businessFunds = (businessFunds + 5);
        $("#totalRemainingFunds").text("Remaining Funds: $" + availableFunds);
        $("#businessFunds").text("$" + businessFunds);
      }
    });

    $("#subFromBusiness").click(function(){
      if(businessFunds >= 5){
        availableFunds = (availableFunds + 5);
        businessFunds = (businessFunds - 5);
        $("#totalRemainingFunds").text("Remaining Funds: $" + availableFunds);
        $("#businessFunds").text("$" + businessFunds);
      }
    });

//============================================================================GAS, ADD/SUB in inc. of $5
    $("#addToNoness").click(function(){
      if(availableFunds >= 5){
        availableFunds = (availableFunds - 5);
        nonessFunds = (nonessFunds + 5);
        $("#totalRemainingFunds").text("Remaining Funds: $" + availableFunds);
        $("#nonessFunds").text("$" + nonessFunds);
      }
    });

    $("#subFromNoness").click(function(){
      if(nonessFunds >= 5){
        availableFunds = (availableFunds + 5);
        nonessFunds = (nonessFunds - 5);
        $("#totalRemainingFunds").text("Remaining Funds: $" + availableFunds);
        $("#nonessFunds").text("$" + nonessFunds);
      }
    });

//============================================================================SAVE CURRENT VALUES
          $("#saveGoals").click(function(){
            $.post("setgoals.php", { month: "0"+thisMonth, avlFunds: monthGoal, bills: billsFunds, food: foodFunds, gas: gasFunds, business: businessFunds, noness: nonessFunds}, function(data,status){
              $("#test").html(data);
            });
          });

});
</script>