<?php include 'header.php'?>

  <div class="jumbotron mb-0 jumbo5">
    <div class="row">
        <div class="col">
            <h1>Enhance your connection between you<br>and your future team</h1>
            <p>Search for the skills needed to make your team a success!</p>
        </div>
        <div class="col"></div>
        <div class="col">
          <img class="resume-search-img1" src="img/resume-search-people.png">
        </div>
    </div>
    <div class="row">
      <div class="col-9">
        <h1>Your future candidate awaits</h1>
      </div>
      <div class="col-3"></div>
    </div>
    <div class="row">
      <div class="col-6">
        <input type="text" class="form-control jobsearchform" placeholder="Skills, Keywords">
      </div>
      <div class="col-6">
        <input type="text" class="form-control jobsearchform" placeholder="Where">
      </div>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col-6">
        </div>
        <div class="col-3 search-button">
          <button type="submit" class="btn btn-secondary jobsearchbtn" onclick="javascript:document.location='resumeresults.php'">Search</button>
        </div>
    </div>
  </div>
  <hr>
  <div class="skill-landing">
    <div class="row">
        <div class="col-3">
          <img class="resume-search-img2" src="img/resume-search-people2.png">
        </div>
        <div class="col"></div>
        <div class="col-5 skill-matching">
          <h1>Skill Matching Perfection</h1>
          <p>At Clusterizr, our goal is to ease the process of finding the most suitable candidates through efficiency, reliability and adaptability. 
          If there are particular qualities and skills your team needs, discovering those individuals via a simple search will make your hiring process even easier.
          </p>
        </div>
    </div>
  </div>

  <?php include 'footer.php'?>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src = "js/jQuery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>