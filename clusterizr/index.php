<?php include 'header.php';?>
  
     <div class = "jumbotron mb-0 jumbo1" >  
		 <div class="row">
		 	<div class="col-md-5">
			 	<h2 class = " banner-text headerfont" style="margin-left: 50px; margin-top: 25px;">Connecting UCF Digital Media students to the workplace</h2>
				<p style="margin-top: 20px; margin-left: 50px;">Sign up today and upload your resume! If you don’t have one, check out our resume builder.</p>
			</div>
			<div class="col-md-7">
				<img src="img/landing-meeting.png" alt="Landing Meeting" width="70%" />
			</div>
		 </div>
		 <div class="row homeformrow">
		 	<div class="col-md-12" >
				<h4>Your future awaits</h4> 
				<form action="jobs.php" method="GET">
				  <div class="form-row">
					<div class="col-md-6">
					  <input type="text" name="job" class="form-control jobsearchform" placeholder="What">
					</div>
					<div class="col-md-6">
					  <input type="text" name="location" class="form-control jobsearchform" placeholder="Where">
					</div>
				  </div>
				  <button type="submit" class="btn btn-secondary jobsearchbtn">Search</button>
				</form>
			</div>
			 
		 </div>
        
     </div>
	
	
    <div class = "jumbotron mb-0 jumbo2" > 
	<div style="margin: auto; width: 80%;">
		<h2 class="text-center headerfont">Join a community of innovators…</h2>
		<p class="text-center">Our mission is to give graduating students and alumni the tools they need to apply and secure jobs in the digital media world.</p>
		<div class = "row">
			<div class = "col-md-4">
			  <div class="roundedcard border shadow-sm p-3 mb-5 bg-white rounded" >
				<img style="border-radius: 150px; width: 65% !important; margin-left: 16%;"  src="img/testimonial1.png" class="card-img-top img-fluid" alt="sample-image">
				<div class="card-body">
				  <p class="card-text">“Clusterizr helped me recognize my place in the industry. Jumping from school to work can be scary but you quickly realize you’re not alone. Thank you Clusterizr!”</p>
				</div>
			  </div>
			</div>

			<div class = "col-md-4">
			  <div class="roundedcard border shadow-sm p-3 mb-5 bg-white rounded" >
				<img style="border-radius: 150px; width: 65% !important; margin-left: 16%;"  src="img/testimonial2.png" class="card-img-top img-fluid" alt="sample-image">
				<div class="card-body">
				  <p class="card-text">“I efficiently found a great network here with Clusterizr and it shortened my job search immensely. I am very happy with the outcome of Clusterizr.”</p>
				</div>
			  </div>
			</div>

			<div class = "col-md-4">
			  <div class="roundedcard border shadow-sm p-3 mb-5 bg-white rounded" >
				<img style="border-radius: 150px; width: 65% !important; margin-left: 16%;"  src="img/testimonial3.png" class="card-img-top img-fluid" alt="sample-image">
				<div class="card-body">
				  <p class="card-text">“As a developer, I gained the skills I needed to work but not necessarily connect with the industry. Clusterizr is a great way to connect with companies!”</p>
				</div>
			  </div>
			</div>
			<form action="login.php" method="GET">
				<button type = "submit" class="btn btn-secondary jointeambtn">Join Us</button>
			</form>
		</div>
		 
		
	</div>
	</div>
	
	
	<div class="row" style="margin-top: 55px; padding: 50px;">
		<div class="col-md-6">
			<img style="width: 100%;" src="img/Landing-about.png" alt="sample-image"/>
		</div>
		<div class="col-md-6">
			<h4 class="aboutclusterizr headerfont">Meet Clusterizr</h4>
			<p>Clusterizr is a collaboration project by UCF undergraduates with the goal of launching an exciting new tool to connect UCF web design & development students (& alumni) with each other and with local industry for the purpose of networking, career servicing, and partnership development.</p>
		</div>
	</div>

	<div class = "jumbotron mb-0 jumbo1" >
	<div class="row" style="margin-top: 55px; padding: 50px;">
		<div class="col-md-6">
			<h4 class="headerfont">Land your dream employee</h4>
			<p>For employers looking to hire our UCF students and alumni, sign up and post your job!</p>
				<?php 
				if(!empty($_SESSION['email'])){
              		$sql= "SELECT * FROM users WHERE email = '".$_SESSION['email']."'"; 
              		$result= mysqli_query ($conn, $sql); 
              		while ($row = mysqli_fetch_assoc($result)){
              			if($row['access'] == 'company'){
              				?>
          					<a class="post-job-btn" href="postjobs.php"><button class="btn btn-secondary postjobbtn" type="button" style="margin-left: 16px;">Post a Job</button></a>
         
              	<?php 
              			}
              			else{
              			?>
              				<a class="post-job-btn" href="login.php"><button class="btn btn-secondary postjobbtn" type="button" style="margin-left: 16px;">Post a Job</button></a>
              			<?php
              			}
              		}
          		}
              	else{
              ?>
                <a class="post-job-btn" href="login.php"><button class="btn btn-secondary postjobbtn" type="button" style="margin-left: 16px;">Post a Job</button></a>
              <?php
              } ?>

		</div>
		<div class="col-md-6">
			
			<img style="width: 85%; margin-left: 50px;" src="img/landingpostjob.png" alt="sample-image"/>
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