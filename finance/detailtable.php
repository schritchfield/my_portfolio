<?php 
//This file creates a table and populates it withn data from the database

include("db_connect.php");
include("calculations.php");
?>
<div class="customgreen2 pt-4">
<div class="container">
<div class="table-responsive">
  <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Groceries</th>
      <th scope="col">Restaurants</th>
      <th scope="col">Gas</th>
      <th scope="col">Clothes</th>
      <th scope="col">Workout</th>
      <th scope="col">Projects</th>
      <th scope="col">Entertainment</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
<?php

if ($month != '00') {   
    $sql = "SELECT * FROM expenditures WHERE m_date = '$month'";
    $result = mysqli_query($connection,$sql);
    $timeUnit = 'month';
}
else{
    $sql = "SELECT * FROM expenditures";
    $result = mysqli_query($connection,$sql);
    $timeUnit = 'year';
}

while ($row = mysqli_fetch_assoc($result)){
    echo '<tr>';
      echo '<td>'.$row['m_date']."/".$row['d_date'].'</td>';
      echo '<td>$'.$row['groceries'].'</td>';
      echo '<td>$'.$row['restaurants'].'</td>';
      echo '<td>$'.$row['gas'].'</td>';
      echo '<td>$'.$row['clothes'].'</td>';
      echo '<td>$'.$row['workout'].'</td>';
      echo '<td>$'.$row['builds'].'</td>';
      echo '<td>$'.$row['entertainment'].'</td>';
      echo '<td>$'.$row['total'].'</td>';
    echo '</tr>';

}
    echo '<tr>';
      echo '<td>Month Total</td>';
      echo '<td>$'.$grocMonthTotal.'</td>';
      echo '<td>$'.$restMonthTotal.'</td>';
      echo '<td>$'.$gasMonthTotal.'</td>';
      echo '<td>$'.$clothesMonthTotal.'</td>';
      echo '<td>$'.$workoutMonthTotal.'</td>';
      echo '<td>$'.$buildMonthTotal.'</td>';
      echo '<td>$'.$entMonthTotal.'</td>';
      echo '<td>$'.$monthtotal.'</td>';
    echo '</tr>';
?>
  </tbody>
</table>
</div>
</div>
</div>