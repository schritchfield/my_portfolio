<?php include 'header.php'; ?><head>
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
    <div class = "col-lg-4 mb-4">

      <!--Filtering stuff-->
      <div class = "row">
          <div class = "col">Location &#9866;</div>
          <div class = "col">Occupation &#9866;</div>
        </div>
      
        <!--Scroller area-->
        <div class = "innercolumn-scroll">
          <div class="fadedScroller_fade">
            
          </div>

        <div id="jobfeed">
          <div id="defaultfeed">
            <div class="jobcard row mt-4 shadow pt-4 pb-2 roundedcard" id="j0000006">
          
				  <div class="col-3 text-center">
					<img src="img/testimonial1.png" class="img-fluid roundimg" style="border-radius:50%; width: 100px;">
				  </div>

				  <div class="col-9">
					<h4>Angela Lopez</h4>
					<h6 class="">UI Engineer</h6>
					<p class="mt-0 mb-4">Mountain View, CA</p>
				  </div>

       		 </div>
			  
			   <div class="jobcard row mt-4 shadow pt-4 pb-2 roundedcard" id="j0000006">
          
				  <div class="col-3 text-center">
					<img src="img/testimonial2.png" class="img-fluid roundimg" style="border-radius:50%; width: 100px;">
				  </div>

				  <div class="col-9">
					<h4>Jeremy Swartz</h4>
					<h6 class="">Java Developer</h6>
					<p class="mt-0 mb-4">Mountain View, CA</p>
				  </div>

       		 </div>
			  
			   <div class="jobcard row mt-4 shadow pt-4 pb-2 roundedcard" id="j0000006">
          
				  <div class="col-3 text-center">
					<img src="img/testimonial3.png" class="img-fluid roundimg" style="border-radius:50%; width: 100px;">
				  </div>

				  <div class="col-9">
					<h4>Patty Beasley</h4>
					<h6 class="">UX Designer</h6>
					<p class="mt-0 mb-4">Seattle, WA</p>
				  </div>

       		 </div>
			  
			  
          </div>
        </div>

      </div>
    </div>
    <!--End of right column-->

    <!--RIGHT Column-->
    <div class = "col-lg-8 mb-4 mt-0"> 
      <!--Big center box-->
      <div class = "roundedcard shadow centralcolumn" id="jobInfo"> 
		
		  <div class="roundedcard shadow innercolumn row"> 
          
          <div class="col-lg-2">
            <img src="img/testimonial1.png" class="img-fluid" alt="..." style="border-radius:50%;">
          </div>

          <div class="col-lg-6">
            <h4>Angela Lopez</h4>
            <h6>UI Engineer</h6>
            <h6>Mountain View, California</h6>
          </div>

          <div class="col-lg-4">
            <button type="submit" class="btn btn-secondary jobsearchbtn">Contact</button>
          </div>

        </div>
		  
		  <div class="jobsTextBlurb mt-4 mb-4">
          <h5 class="font-weight-bold" style="color: #FFD53F;">EXPERIENCE</h5>
         	 <div class="row">
			  	<div class="col-md-2">
				  <img src="img/AAA_logo.png" class="img-fluid" alt="..." style="border-radius:50%;">
				</div>
				 <div class="col-md-10">
				 	<h5>AAA -  American Automobile Association</h5>
					 <p>UX Developer</p>
					 <p class="alert-light">April 2018 - Present</p>
					 <p>Manage development regarding user experience, mobile and web, using React/React Native as well as run user tests and analyses on developed components.</p>
				 </div>
			  </div>
        </div>
		  
		   <div class="jobsTextBlurb mt-4 mb-4">
         	 <div class="row">
			  	<div class="col-md-2">
				  <img src="img/rh_logo.png" class="img-fluid" alt="..." style="border-radius:50%;">
				</div>
				 <div class="col-md-10">
				 	<h5>Robert Half</h5>
					 <p>Web Design Intern</p>
					 <p class="alert-light">January 2018 - April 2018</p>
					 <p>Utilized Angular 2 + and Javascript Fundamentals to implement key features on the Robert Half web interface in a team-based environment.</p>
				 </div>
			  </div>
        </div>		  

		  
		  <div class="row"> 
          
          <div class="col-lg-3">
            <p class="mt-4 font-weight-bold">Angelo Lopez</p>
          </div>
          <div class="col-lg-5">
          
          </div>

          <div class="col-lg-4">
            <button type="submit" class="btn btn-secondary jobsearchbtn">Contact</button>
</div></div>
		  
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