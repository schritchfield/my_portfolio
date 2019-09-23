<?php include 'header.php';?>

<script src="js/postjobs_update.js"></script>

        <div class="container mx-auto">
                


		 	<div class="col-md-2" >
		 	</div>

		 	<div class="col-md-8 mx-auto" >
		 		<h5 class="post-text push-top">Post a job</h5>
				<h2 class = "text-center banner-text-lg">Find the perfect fit for your business!</h2>
					
				<form action="" method="post">
<!--Job post phase 1-->				  		
				  	<div id="postjob1" class="container">
					  		<div class="form-row">
								<div class="col">
						  			<input type="text" name="jobtitle" class="form-control jobsearchform" placeholder="Job">
								</div>
	                  		</div>
	                  		
	                  		<div class="form-row">
								<div class="col">
						  			<input type="text" name="city" class="form-control jobsearchform" placeholder="City">
								</div>
	                  		</div>

	                  		<div class="form-row">
								<div class="col">
						  			<input type="text" name="state" class="form-control jobsearchform" placeholder="State">
								</div>
	                  		</div>
	                  		
	                  		<div class="row push-btn">
	                      		<div class="col-lg-3 text-center">
	                        		<button  class="btn btn-secondary postjobbtn">Cancel</button>
	                      		</div>
	                      	
	                      		<div class="col-lg-6 text-center">
	               				</div>

	                      		<div class="col-lg-3 text-center">
									<button class="btn btn-secondary postjobbtn" id="next1">Next</button>
	                      		</div>

	                  		</div>
	                </div>
<!--Job post phase 2-->	
	                <div id="postjob2" class="container">
	                	<div class="form-row">
							<div class="col">
					  			<input type="text" name="address" class="form-control jobsearchform" placeholder="Street Address (Optional)">
							</div>
                  		</div>

                  		<div class="form-row">
							<div class="col">
					  			<input type="text" name="jobtype" class="form-control jobsearchform" placeholder="Job Type">
							</div>
                  		</div>

                  		<div class="form-row mb-4">
							<div class="col">
					  			<input type="text" name="salmin" class="form-control jobsearchform" placeholder="Enter Salary Minimum">
					  			<input type="text" name="salmax" class="form-control jobsearchform" placeholder="Enter Salary Maximum">
							</div>
                  		</div>

                  		<div class="row">
                    		
                    		<div class="col">
                        		<!--<div class="dropdown">
                            		<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Number of Hires</button>
                            		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                		<a class="dropdown-item">1</a>
                                		<a class="dropdown-item">2</a>
                                		<a class="dropdown-item">3</a>
                            		</div>
                        		</div>-->
                    		</div>
                    
                    		<div class="col"></div>
                    			<div class="col">
                        			<!--<div class="dropdown show">
                            			<button class="btn btn-secondary dropdown-toggle list-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Urgency of Hires</button>
                            			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                			<a class="dropdown-item">Not so Urgent</a>
                                			<a class="dropdown-item">A Little Urgent</a>
                                			<a class="dropdown-item">Very Urgent</a>
                            			</div>
                            		</div>-->
                        		</div>
                  			</div>

                  			<div class="row push-btn text-center">
		                      
		                      <div class="col-lg-3 text-center">
		                        <button class="btn btn-secondary postjobbtn">Cancel</button>
		                      </div>
		                      
		                      <div class="col-lg-6 text-center">
		                        <button class="btn btn-secondary postjobbtn" id="back1">Back</button>
		                      </div>
		                      
		                      <div class="col-lg-3 text-center">
		                        <button class="btn btn-secondary postjobbtn" id="next2">Next</button>
		                      </div>

                  			</div>
                		</div>
                	
<!--Job post phase 3-->	
                	<div id="postjob3" class="container">
                		<div class="form-row mt-2">
							<div class="col mb-4">
            					<label for="comment"><h3>Enter Description:</h3></label>
					  			<textarea name="jobdescrip" class="form-control jobDesc" placeholder="Enter Job Description..."></textarea>
							</div>
                  		</div>

                  			<div class="row push-btn text-center">
		                      
		                      <div class="col-lg-3 text-center">
		                        <button class="btn btn-secondary postjobbtn">Cancel</button>
		                      </div>
		                      
		                      <div class="col-lg-6 text-center">
		                        <button class="btn btn-secondary postjobbtn" id="back2">Back</button>
		                      </div>
		                      
		                      <div class="col-lg-3 text-center">
		                        <button class="btn btn-secondary postjobbtn" id="next3">Next</button>
		                      </div>

                  			</div>

                  		</div>

<!--Job post phase 4-->				  		
				  	<div id="postjob4" class="container">
				  		<div id="skills">
					  		<div class="form-row">
								<div class="col">
						  			<input type="text" name="skill1" class="form-control jobsearchform" placeholder="Skill or Qualification">
								</div>
	                  		</div>
	                  		
	                  		<div class="form-row">
								<div class="col">
						  			<input type="text" name="skill2" class="form-control jobsearchform" placeholder="Skill or Qualification">
								</div>
	                  		</div>
	                  		
	                  		<div class="form-row">
								<div class="col">
						  			<input type="text" name="skill3" class="form-control jobsearchform" placeholder="Skill or Qualification">
								</div>
	                  		</div>
	                  	</div>

	                  		<div class="form-row">
								<div class="col-lg-12 text-center">
						  			<button  class="btn btn-secondary postjobbtn" id="addskillbtn">Add More Skills</button>
								</div>
	                  		</div>
	                  		
                  			<div class="row push-btn text-center">
		                      
		                      <div class="col-lg-3 text-center">
		                        <button class="btn btn-secondary postjobbtn">Cancel</button>
		                      </div>
		                      
		                      <div class="col-lg-6 text-center">
		                        <button class="btn btn-secondary postjobbtn" id="back3">Back</button>
		                      </div>
		                      
		                      <div class="col-lg-3 text-center">
		                        <button class="btn btn-secondary postjobbtn" id="next4">Next</button>
		                      </div>

                  			</div>
	                </div>
<!--Job post phase 5-->	
                	<div id="postjob5" class="container">
                	    
                	    <div class="form-row">
                        	<div class="col">
                            	
                            	<h3 class="mb-4 mt-2">How would you like to receive applications?</h3>
                            	
                            	<!--<div class="row push-left mb-4">
                                	
                                	<div class="col-3">
                                    	<input class="form-check-input" type="radio" name="contactRadios" id="exampleRadios1" value="option1" checked>
                                    	<label class="form-check-label" for="exampleRadios1">E-mail</label>
                                	</div>

                                	<div class="col-6"></div>
                                	
                                	<div class="col-3">
                                    	<input class="form-check-input" type="radio" name="contactRadios" id="exampleRadios2" value="option2">
                                    	<label class="form-check-label" for="exampleRadios2">In-person</label>
                                	</div>

                            	</div>-->

                        	</div>
                    	</div>

                    	<div class="form-row">
                        	<div class="col mb-4">
                            	<h3>Send applications to:</h3>
                            	<input type="text" name="receiver" class="form-control jobsearchform" placeholder="example@email.com">
                        	</div>
                  		</div>

                  		<div class="form-row">
                        	<div class="col mb-4">
                            	<h3>Job tags:</h3>
                            	<input type="text" name="jobtags" class="form-control jobsearchform" placeholder="Developer, Writer, Coder">
                        	</div>
                  		</div>
                  
                  			<div class="row push-btn text-center">
		                      
		                      <div class="col-lg-3 text-center">
		                        <button class="btn btn-secondary postjobbtn">Cancel</button>
		                      </div>
		                      
		                      <div class="col-lg-6 text-center">
		                        <button class="btn btn-secondary postjobbtn" id="back4">Back</button>
		                      </div>
		                      
		                      <div class="col-lg-3 text-center">
		                        <button class="btn btn-secondary postjobbtn" id="next5">Next</button>
		                      </div>

                  			</div>
              		</div>
<!--Job post phase 6-->	                	
                	<div id="postjob6" class="container">
                		<div class="form-row">
							<div class="col">
		                        
		                        <h3 class="mb-4">About:</h3>
		                        <div class="ml-4" id="aboutDiv"></div>

		                        <h3 class="mb-4">Summary:</h3>
		                        <div class="ml-4" id="summaryDiv"></div>

		                        <h3 class="mb-4">Description:</h3>
		                        <div class="ml-4" id="descDiv"></div>

		                        <h3 class="mb-4">Qualifications:</h3>
		                        <div class="ml-4" id="qualiDiv"></div>

							</div>
                  		</div>

                  		    <div class="row push-btn text-center">
		                      
		                      <div class="col-lg-3 text-center">
		                        <button class="btn btn-secondary postjobbtn">Cancel</button>
		                      </div>
		                      
		                      <div class="col-lg-6 text-center">
		                        <button class="btn btn-secondary postjobbtn" id="back5">Back</button>
		                      </div>
		                      
		                      <div class="col-lg-3 text-center">
		                        <button class="btn btn-secondary postjobbtn" id="postit">Post</button>
		                      </div>

                  			</div>

                	</div>

				</form>

			</div>

			<div class="col-md-2" >
		 	</div>
		</div>


 
<?php 
include 'footer.php';
?>
  
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!--<script src = "js/postjobs_update.js"></script>-->
  <!--<script src = "js/jQuery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
</body>
</html>