<?php 

//Updates history 

include("db_connect.php");
include("calculations.php");

if(($month != '00')&&($month != '01')){
echo '
<div class="jumbotron jumbotron-fluid customgreen2 text-dark mb-0 staat">
  <div class="container">
    <div class="row">
      <div class="col-3">
        <img src="img/graphs.png" class="img-fluid" id="clipboard">
      </div>
      <div class="col-9">
        <h1 class="display-4">Vs previous month: ';
          echo $changeWord ." ". number_format($totalChange, 1, '.', '')."%".'</h1>';

echo'
        <div class="row">
          <div class="col"><p class="lead raleway">Gas expenses:</p><p class="staat fraction">'.$changeWord_g ." ". number_format($gasChange, 1, '.', '').'%</p></div>
          <div class="col"><p class="lead raleway">Food expenses:</p><p class="staat fraction">'.$changeWord_f ." ". number_format($foodChange, 1, '.', '').'%</p></div>
          <div class="col"><p class="lead raleway">Business:</p><p class="staat fraction">'.$changeWord_b ." ". number_format($businessChange, 1, '.', '').'%</p></div>
          <div class="col"><p class="lead raleway">Nonessential:</p><p class="staat fraction">'.$changeWord_n ." ". number_format($nonessChange, 1, '.', '').'%</p></div>
</p></div>
        </div>
      </div>
    </div>
  </div>
</div>';
}
else if($month == '00'){
}
else if($month == '01'){
echo'
<div class="jumbotron jumbotron-fluid customgreen2 text-dark mb-0 staat">
  <div class="container">
    <div class="row">
      <div class="col-3">
        <img src="img/graphs.png" class="img-fluid" id="clipboard">
      </div>
      <div class="col-9">
        <h1 class="display-4">Vs previous month: No Data</h1>
      </div>
        </div>
      </div>
    </div>
  </div>
</div>';
}
?>