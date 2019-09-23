<div id="glance" class="jumbotron jumbotron-fluid customgreen1 text-light mb-0 staat">
<div class="card-deck ninetyp mb-40">
  <?php
  if ($rentMonthTotal+$phoneMonthTotal != 0) {
  ?>
  <div class="card customgreen5">
    <img src="img/house_sm.png" class="card-img-top mx-auto img-fluid mt-4" alt="..." style="width: 150px;">
    <div class="card-body">
      <h5 class="card-title">Rent &amp; Monthly Bills: <?php echo number_format(($rentMonthPercent+$phoneMonthPercent),1)."%"; ?></h5>
      <p class="card-text raleway"><?php echo "Rent, utilities, phone &amp other monthly bills: $".($rentMonthTotal+$phoneMonthTotal); ?></p>
    </div>
    <div class="card-footer">
      <small class="text-muted"><?php echo "Cost per day: $".($dailyRent+$dailyPhone); ?></small>
    </div>
  </div>
  <?php
  }
  if ($gasMonthTotal != 0) {
  ?>
  <div class="card customgreen5">
    <img src="img/gas_sm.png" class="card-img-top mx-auto img-fluid mt-4" alt="..." style="width: 150px;">
    <div class="card-body">
      <h5 class="card-title">Gas Purchases: <?php echo number_format($gasMonthPercent,1)."%"; ?></h5>
      <p class="card-text raleway"><?php echo "Total spent on gas this ".$timeUnit.": $".$gasMonthTotal; ?></p>
    </div>
    <div class="card-footer">
      <small class="text-muted"><?php echo "Cost per day: $".$dailyGas; ?></small>
    </div>
  </div>
  <?php
  }
  if ($grocMonthTotal+$restMonthTotal != 0) {
  ?>
  <div class="card customgreen5">
    <img src="img/fork_sm.png" class="card-img-top mx-auto img-fluid mt-4" alt="..." style="width: 150px;">
    <div class="card-body">
      <h5 class="card-title">Food Expenses: <?php echo number_format(($restMonthPercent+$grocMonthPercent),1)."%"; ?></h5>
      <p class="card-text raleway"><?php echo "Total spent on all food this ".$timeUnit.": $".($restMonthTotal+$grocMonthTotal); ?></p>
    </div>
    <div class="card-footer">
      <small class="text-muted"><?php echo "Cost per day: $".($dailyRest+$dailyGroc); ?></small>
    </div>
  </div>
  <?php
  }
  if ($businessMonthTotal != 0) {
  ?>
  <div class="card customgreen5">
    <img src="img/tie_sm.png" class="card-img-top mx-auto img-fluid mt-4" alt="..." style="width: 150px;">
    <div class="card-body">
      <h5 class="card-title">Business Expenses: <?php echo number_format($businessMonthPercent,1)."%"; ?></h5>
      <p class="card-text raleway"><?php echo "Total spent on school and business this ".$timeUnit.": $".$businessMonthTotal; ?></p>
    </div>
    <div class="card-footer">
      <small class="text-muted"><?php echo "Cost per day: $".$dailyBusiness; ?></small>
    </div>
  </div>
  <?php
  }
  if ($buildMonthTotal+$workoutMonthTotal+$entMonthTotal != 0) {
  ?>
  <div class="card customgreen5">
    <img src="img/game_sm.png" class="card-img-top mx-auto img-fluid mt-4" alt="..." style="width: 150px;">
    <div class="card-body">
      <h5 class="card-title">Non-Essentials: <?php echo number_format(($buildMonthPercent+$workoutMonthPercent+$entMonthPercent),1)."%"; ?></h5>
      <p class="card-text raleway"><?php echo "Total spent on non-essential items this ".$timeUnit.": $".($buildMonthTotal+$workoutMonthTotal+$entMonthTotal); ?></p>
    </div>
    <div class="card-footer">
      <small class="text-muted"><?php echo "Cost per day: $".($dailyBuild+$dailyWorkout+$dailyEnt); ?></small>
    </div>
  </div>
<?php } ?>
</div>
</div>