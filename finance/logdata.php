<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css?family=Raleway|Staatliches" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <script src="js/jquery-3.3.1.js"></script>

  <title>ExpensEZ</title>
</head>
<body class="raleway">

<?php 
    include("db_connect.php");
    include("calculations.php");
    include("nav.php");
?>

<div id="mainhead" class="jumbotron mb-0" style="background-image: url(img/banner.jpg);">
  <div class="container">
        <img src="img/logo.png" class="mx-auto img-fluid" alt="logo">
        <hr class="my-4">
        <p>Enter your expenses for the day by using the interactive form below.</p>
  </div>
</div>

<!-- THIS AREA HAS THE GRID OF CATEGORY ICONS, CLICKABLE -->
<div class="container mt-4 mb-4 text-center">
  <div class="row mb-4">

    <div class="col-sm mx-auto" id="renticon">
      <img src="img/house_t.png" class="mx-auto img-fluid sm_icon" alt="logo">
      <p>Add Rent and Utilities (Disabled)</p>
    </div>

    <div class="col-sm mx-auto" id="phoneicon">
      <img src="img/phone_t.png" class="mx-auto img-fluid sm_icon" alt="logo">
      <p>Add Phone bill (Disabled)</p>
    </div>

    <div class="col-sm mx-auto" id="gasicon">
      <img src="img/gas_t.png" class="mx-auto img-fluid sm_icon" alt="logo">
      <p>Add a Gas purchase</p>
    </div>

  </div>
  <div class="row mt-4 mb-4">

    <div class="col-sm mx-auto" id="grocicon">
      <img src="img/fork_t.png" class="mx-auto img-fluid sm_icon" alt="logo">
      <p>Add a Grocery purchase</p>
    </div>

    <div class="col-sm mx-auto" id="resticon">
      <img src="img/burger_t.png" class="mx-auto img-fluid sm_icon" alt="logo">
      <p>Add a Restaurant bill</p>
    </div>

    <div class="col-sm mx-auto" id="bizicon">
      <img src="img/tie_t.png" class="mx-auto img-fluid sm_icon" alt="logo">
      <p>Add a Business Expense</p>
    </div>

  </div>
  <div class="row mt-4 mb-4">

    <div class="col-sm mx-auto" id="clothesicon">
      <img src="img/clothes_t.png" class="mx-auto img-fluid sm_icon" alt="logo">
      <p>Add a Clothing purchase / Haircut</p>
    </div>

    <div class="col-sm mx-auto" id="projecticon">
      <img src="img/paint_t.png" class="mx-auto img-fluid sm_icon" alt="logo">
      <p>Add a Personal project expense</p>
    </div>

    <div class="col-sm mx-auto" id="workouticon">
      <img src="img/dumbbell_t.png" class="mx-auto img-fluid sm_icon" alt="logo">
      <p>Add a Gym related purchase</p>
    </div>

  </div>
  <div class="row mt-4 mb-4">

    <div class="col-sm mx-auto" id="enticon">
      <img src="img/game_t.png" class="mx-auto img-fluid sm_icon" alt="logo">
      <p>Add an Entertainment purchase</p>
    </div>

    <div class="col-sm mx-auto" id="othericon">
      <img src="img/qmark_t.png" class="mx-auto img-fluid sm_icon" alt="logo">
      <p>Add a non-categorized expense</p>
    </div>

    <div class="col-sm mx-auto">
      <img src="img/plus_t.png" class="mx-auto img-fluid sm_icon" alt="logo">
      <p>Create a new category (Coming soon!)</p>
    </div>

  </div>
</div>

<!-- EXPENSE ENTRY FORM FIELDS -->
<div class="container">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter you expenses</h5>
        </button>
      </div>
      <div class="modal-body">
            
            <form action="dataentry.php" method="post">

              <div class="form-row">
                <div class="col-7">
                    <select class="custom-select mr-sm-2" id="data_d_select" name="data_d_select">
                    <option selected>Day:</option>
                        <option value="01">1</option>
                        <option value="02">2</option>
                        <option value="03">3</option>
                        <option value="04">4</option>
                        <option value="05">5</option>
                        <option value="06">6</option>
                        <option value="07">7</option>
                        <option value="08">8</option>
                        <option value="09">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                </div>
                <div class="col">
                    <select class="custom-select mr-sm-2" id="data_m_select" name="data_m_select">
                    <option selected>Month:</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                  </select>
                </div>
                <div class="col">
                    <select class="custom-select mr-sm-2" id="data_y_select" name="data_y_select">
                    <option selected>Year:</option>
                        <option value="2019">2019</option>
                  </select>
                </div>
              </div>

              <div class="form-group" id="rest_line">
                <label for="restInput">Ammount spent at Restaraunts Today</label>
                <input type="text" class="form-control" name="restInput" placeholder="Enter $ Spent">
              </div>
              <div class="form-group" id="groc_line">
                <label for="grocInput">Ammount spent on Groceries Today</label>
                <input type="text" class="form-control" name="grocInput" placeholder="Enter $ Spent">
              </div>
              <div class="form-group" id="gas_line">
                <label for="gasInput">Ammount spent on Gas Today</label>
                <input type="text" class="form-control" name="gasInput" placeholder="Enter $ Spent">
              </div>
              <div class="form-group" id="biz_line">
                <label for="businessInput">Ammount spent on Business Today</label>
                <input type="text" class="form-control" name="businessInput" placeholder="Enter $ Spent">
              </div>
              <div class="form-group" id="clothes_line">
                <label for="clothesInput">Ammount spent on Clothes Today</label>
                <input type="text" class="form-control" name="clothesInput" placeholder="Enter $ Spent">
              </div>
              <div class="form-group" id="project_line">
                <label for="buildInput">Ammount spent on Projects Today</label>
                <input type="text" class="form-control" name="buildInput" placeholder="Enter $ Spent">
              </div>
              <div class="form-group" id="workout_line">
                <label for="workoutInput">Ammount spent on Workout stuff Today</label>
                <input type="text" class="form-control" name="workoutInput" placeholder="Enter $ Spent">
              </div>
              <div class="form-group" id="ent_line">
                <label for="entInput">Ammount spent on Entertainment Today</label>
                <input type="text" class="form-control" name="entInput" placeholder="Enter $ Spent">
              </div>
              <div class="form-group" id="other_line">
                <label for="otherInput">Ammount spent on Other items Today</label>
                <input type="text" class="form-control" name="otherInput" placeholder="Enter $ Spent">
              </div>

      </div>
      <div class="modal-footer">
        <input class="btn btn-primary" type="submit" name="submit">
      </form>
      </div>
</div>

<!-- THIS SCRIPT SHOWS AND HIDES THE FORM FIELDS FOR WHICH ITEMS ARE SELECTED -->
        <script>
          $("document").ready(function() {
            $("#gas_line").hide(); //default hide
            $("#groc_line").hide(); //default hide
            $("#rest_line").hide(); //default hide
            $("#biz_line").hide(); //default hide
            $("#clothes_line").hide(); //default hide
            $("#project_line").hide(); //default hide
            $("#workout_line").hide(); //default hide
            $("#ent_line").hide(); //default hide
            $("#other_line").hide(); //default hide

            //Show or hide form field when icon clicked
            $("#gasicon").click(function() {
              $("#gasicon").toggleClass("highlightedIcon");
              $("#gas_line").toggle(500); //show table
            });

            //Show or hide form field when icon clicked
            $("#resticon").click(function() {
              $("#resticon").toggleClass("highlightedIcon");
              $("#rest_line").toggle(500); //show table
            });

            //Show or hide form field when icon clicked
            $("#grocicon").click(function() {
              $("#grocicon").toggleClass("highlightedIcon");
              $("#groc_line").toggle(500); //show table
            });

            //Show or hide form field when icon clicked
            $("#bizicon").click(function() {
              $("#bizicon").toggleClass("highlightedIcon");
              $("#biz_line").toggle(500); //show table
            });

            //Show or hide form field when icon clicked
            $("#clothesicon").click(function() {
              $("#clothesicon").toggleClass("highlightedIcon");
              $("#clothes_line").toggle(500); //show table
            });

            //Show or hide form field when icon clicked
            $("#projecticon").click(function() {
              $("#projecticon").toggleClass("highlightedIcon");
              $("#project_line").toggle(500); //show table
            });

            //Show or hide form field when icon clicked
            $("#workouticon").click(function() {
              $("#workouticon").toggleClass("highlightedIcon");
              $("#workout_line").toggle(500); //show table
            });

            //Show or hide form field when icon clicked
            $("#enticon").click(function() {
              $("#enticon").toggleClass("highlightedIcon");
              $("#ent_line").toggle(500); //show table
            });

            //Show or hide form field when icon clicked
            $("#othericon").click(function() {
              $("#othericon").toggleClass("highlightedIcon");
              $("#other_line").toggle(500); //show table
            });
          });
        </script>

<?php
    include("footer.php");
?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html> 