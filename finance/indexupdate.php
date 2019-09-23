<?php 
include("db_connect.php");
include("calculations.php");
?>

<div id="glance" class="jumbotron jumbotron-fluid customgreen1 text-light mb-0 staat">
<div class="container">

  <div class="row">
    <div class="col">
      <img src="img/calendar.png" class="img-fluid" id="calendar" data-toggle="modal" data-target="#exampleModal">
    </div>
    <div class="col-9">
<?php

echo '<h1 class="display-4">'.$monthName.' at a glance'.'</h1>';          
echo '<p class="lead raleway">'.$costOfLiving.'</p>';  
echo '<p class="lead raleway">'.$costOfFood.'</p>';
echo '<p class="lead raleway">'.$costOfGas.'</p>';
echo '<p class="lead raleway">';

if($monthtotal != 0) echo "The most expensive day was: ".$mostExpensiveDate.", you spent $".$mostExpensiveDay." (not including rent or phone bill.)</p>";
?>
    </div>
  </div>

  </div>
</div>

<?php
if($month != '00'){
?>

<!-- Monthly Goals area -->
<div class="jumbotron jumbotron-fluid customgreen2 text-dark mb-0 staat">
  <div class="container">
    <div class="row">
      <div class="col-3">
        <a href="goals.php"><img src="img/clipboard.png" class="img-fluid" id="clipboard"></a>
      </div>
      <div class="col-9">
        <h1 class="display-4">Month Goal: $<?php echo $totalGoal; ?></h1>
        <h3 class="mb-20"><?php echo $reachedMsg; ?></h3>

  <!-- Goals column area -->
        <div class="row">
          <div class="col"><p class="lead raleway">Rent, phone:</p><p class="staat fraction">$<?php echo $rentMonthTotal+$phoneMonthTotal."/".$billGoal; ?></p></div>
          <div class="col"><p class="lead raleway">Food:</p><p class="staat fraction">$<?php echo $restMonthTotal+$grocMonthTotal."/".$foodGoal ?></p></div>
          <div class="col"><p class="lead raleway">Gas:</p><p class="staat fraction">$<?php echo $gasMonthTotal."/".$gasGoal ?></p></div>
          <div class="col"><p class="lead raleway">Business:</p><p class="staat fraction">$<?php echo $businessMonthTotal."/".$businessGoal ?></p></div>
          <div class="col"><p class="lead raleway">Nonessential:</p><p class="staat fraction">$<?php echo $entMonthTotal+$buildMonthTotal+$workoutMonthTotal."/".$nonessentialGoal ?></p></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
}
//Month Cards
if (($monthtotal != 0)&&($month != '00')){
    include ("monthcards.php");
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
    });
</script>