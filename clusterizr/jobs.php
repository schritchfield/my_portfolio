<?php include 'header.php'; ?>
<head><script src="js/jobsupdate.js"></script></head>
<!--============================================================================================-->
<div class="container">
        <form action="" method="POST"> 
          <button class="btn btn-secondary jobsearchbtn" id="searchbtn">Search</button>
          <div class="form-row">
            <div class="col">
              <input type="text" name="job" class="form-control jobsearchform" placeholder="Job title">
            </div>
            <div class="col">
              <input type="text" name="location" class="form-control jobsearchform" placeholder="Location">
            </div>
          </div>
        </form>
</div>

<!--This has 2 colums, contained to 90% width-->
<div class="container-big mt-4">
  <div class = "row">

    <!--LEFT column with job list-->
    <div class = "col-lg-5 mb-4">

      <!--Filtering stuff-->
      <div class = "row">
          <div class = "col">Date Posted &#9866;</div>
          <div class = "col">Job Radius &#9866;</div>
          <div class = "col">Job Type &#9866;</div>
          <div class = "col">Companies &#9866;</div>
        </div>
      
        <!--Scroller area-->
        <div class = "innercolumn-scroll">
          <div class="fadedScroller_fade">
            
          </div>

        <div id="jobfeed">
          <div id="defaultfeed">
            <?php include("getjobs.php"); ?>
          </div>
        </div>

      </div>
    </div>
    <!--End of right column-->

    <!--RIGHT Column-->
    <div class = "col-lg-7 mb-4 mt-0"> 
      <!--Big center box-->
      <div class = "roundedcard shadow centralcolumn" id="jobInfo"> 

      </div>
    
    <div class="fadedScroller_info">
      
    </div>
    <!--End of big center box-->

    </div>
  <!--End of Center Column-->
  
  </div>
</div>



    
  
  
   
<!--============================================================================================-->
  <footer class = " footer p-3 mb-2 bg-light text-dark">
    <div class = "row" id = "footer-row">
      <div class = "col">
        <h3>Company</h3>
        <ul>
          <li>About Us</li>
          <li>Contact Us</li>
          <li>Careers</li>
        </ul>  
      </div>
      
      <div class = "col">
       <h3>Job Seekers</h3>
        <ul>
          <li>Job Search</li>
          <li>Create Account</li>
          <li>Job Seeker Help</li>
        </ul>
      </div>

      <div class = "col">
        <h3>Employers</h3>
        <ul>
          <li>Resume Search</li>
          <li>Register</li>
          <li>Employer Help</li>
        </ul>
      </div>

      <div class = "col">
        <ul>
          <li>Privacy</li>
          <li>Terms</li>
          <li>Clusterizr &copy; All rights</li>
        </ul>
      </div>  
    </div>

  </footer>
  
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!--<script src = "js/jQuery.js"></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>