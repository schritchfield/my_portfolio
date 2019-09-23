<?php include 'header.php';?>

		
		<div class = "jumbotron mb-0 jumbo3" > 
        <div class="container-fluid">
            <div id="loginCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
                <div class="carousel-inner" >
                    <div class="carousel-item active" style="margin-top: 60px;">
                        <div class="row">
                            
                            <div class="col-md-7">
                                <div class="logininfo">
                                    <h2 class="loginHeader">Get in touch!</h2>
                                    <span style="margin-left:2%;">Questions? Comments? Concerns? Let us know!</span>
								    <br />
                                </div>
                                <div class="contactSquare">
                                    <form name="contact"  action = " " method = "POST">
                                        <div class="form-group">
                                            <input class="form-control jobsearchform" type="text" id="contactName" name="contactName" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control jobsearchform" type="text" id="contactEmail" name="contactEmail" placeholder="Email Address">
                                        </div>
										<div class="form-group">
                                            <input style="height: 200px;" class="form-control jobsearchform" type="text" id="contactMessage" name="contactMessage" placeholder="Message">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"></div>
                                            <div class="col-md-6">
                                                <input class ="btn btn-primary jobsearchbtn" type="submit" value="Send" id="contactButton" name="Contact">                                           
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
               
                </div>
            </div>
        </div>
		</div>
            <?php 
                if (isset($_POST['login'])){ 
                    $email = $_POST['loginEmail']; 
                    $pw = sha1($_POST['loginPassword']); 
                    $sql= "SELECT * FROM users WHERE email = '".$email."' LIMIT 1"; 
                    $result= mysqli_query ($conn, $sql); 
                    
                    if(empty($email)||empty($pw)){ 
                        echo "</div><center>All fields required to login.</center>"; 
                    } else{ 
                        if (mysqli_num_rows($result) == 1){             
                            $row = mysqli_fetch_row($result); 
                            if($row[0] == $email && $row[1] == $pw){
            ?>
                                <script type="text/javascript"> 
                                    window.location.href = "https://students.cah.ucf.edu/~dig4104c_group08/clusterizr/newsfeed.php"; 
                                </script> 
            <?php
                                $_SESSION['loggedin']=true; 
                                $_SESSION['email']=$email; 
                            }else{  
                            echo "</div><center>Username or password incorrect</center>";  
                            } 
                        }else{ 
                            echo "</div><center>You are not a member yet.</center>"; 
                            exit(); 
                        }     
                    } 
                } 
                if (isset($_POST['createUser'])) { 
                    if ($_POST['registerPassword'] != $_POST[ 
                            'registerConfirmPassword']) { 
                        echo 
                            "</div><center>Passwords do not match.</center>"; 
                    } else { 
                        $fname = ($_POST['registerFName']); 
                        $lname = ($_POST['registerLName']); 
                        $email = ($_POST['registerEmail']); 
                        $pw = sha1($_POST['registerPassword']); 
                        if (empty($fname) || empty( 
                                $lname) || empty( 
                                $email) || empty($pw)) { 
                            echo 
                                "</div><center>All fields required.</center>"; 
                        } else { 
                            if ($conn === false) { 
                                die( 
                                    "ERROR: Could not connect. " 
                                    .mysqli_connect_error() 
                                ); 
                            } 
                            $sql_u = "SELECT * FROM users WHERE email='$email'";
                            $res_u = mysqli_query($conn, $sql_u);
                            if (mysqli_num_rows($res_u) > 0) {
                                echo "</div><center>Sorry... email already in use.</center>"; 	
                            }
                            else{
                                $sql = 
                                    "INSERT INTO users (first_name,last_name,email,password,access) VALUES ('$fname','$lname','$email','$pw','seeker')"; 
                                if (mysqli_query($conn, $sql)) { 
                                    echo 
                                        "</div><center style='color:green!important'>Account created successfully. Login above.</center>"; 
                                } else { 
                                    echo 
                                        "</div><center>Unable to create account with these credentials." .mysqli_error($conn). "</center>"; 
                                } 
                            }
                            mysqli_close($conn); 
                        } 
                    } 
                } 
                if (isset($_POST['createCompany'])) { 
                    if ($_POST['registerPassword'] != $_POST[ 
                            'registerConfirmPassword']) { 
                        echo 
                            "</div><center>Passwords do not match.</center>"; 
                    } else { 
                        $company = ($_POST['registerCompany']); 
                        $email = ($_POST['registerEmail']); 
                        $pw = sha1($_POST['registerPassword']); 
                        if (empty($company) || empty( 
                                $email) || empty($pw)) { 
                            echo 
                                "</div><center>All fields required.</center>"; 
                        } else { 
                            if ($conn === false) { 
                                die( 
                                    "ERROR: Could not connect. " 
                                    .mysqli_connect_error() 
                                ); 
                            } 
                            $sql_u = "SELECT * FROM users WHERE email='$email'";
                            $res_u = mysqli_query($conn, $sql_u);
                            if (mysqli_num_rows($res_u) > 0) {
                                echo "</div><center>Sorry... email already in use.</center>"; 	
                            }
                            else{
                                $sql = 
                                    "INSERT INTO users (display_name,email,password,access) VALUES ('$company','$email','$pw','company')"; 
                                if (mysqli_query($conn, $sql)) { 
                                    echo 
                                        "</div><center style='color:green!important'>Account created successfully. Login above.</center>"; 
                                } else { 
                                    echo 
                                        "</div><center>Unable to create account with these credentials." .mysqli_error($conn). "</center>"; 
                                } 
                            }
                            mysqli_close($conn); 
                        } 
                    } 
                } 
            ?> 
          </div>
        </div>
      </div>
   </body>
   <?php include 'footer.php'?>
</html>