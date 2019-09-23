<?php include 'header.php';?>

		
		<div class = "jumbotron mb-0 jumbo3" > 
        <div class="container-fluid">
            <div id="loginCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
                <div class="carousel-inner" >
                    <div class="carousel-item active" style="margin-top: 60px;">
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="logininfo">
                                    <h2 class="loginHeader">Welcome Back!</h2>
                                    <span style="margin-left:2%;">Don't have an account?</span>
								    <br />
                                    <button class ="btn btn-link" type="button" data-target="#loginCarousel" data-slide-to="1">Register as Job Seeker</button>
                                    <button class ="btn btn-link" type="button" data-target="#loginCarousel" data-slide-to="2">Register as Company</button>
                                </div>
                                <div class="loginSquare">
                                    <form name="frmLogin"  action = " " method = "POST">
                                        <div class="form-group">
                                            <input class="form-control jobsearchform" type="text" id="loginEmail" name="loginEmail" placeholder="Email Address">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control jobsearchform" type="password" id="loginPassword" name="loginPassword" placeholder="Password">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"></div>
                                            <div class="col-md-6">
                                                <input class ="btn btn-primary jobsearchbtn" type="submit" value="Go" id="loginButton" name="login">
                                                <button class ="btn btn-link forgotPassLink" type="button" data-target="#loginCarousel" data-slide-to="3">Forgot Password</button>
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="carousel-item" style="margin-top: 60px;">
                        <div class="row">
                            
                            <div class="col-md-6">
                                <h2 class="registerHeader">Look at you being all professional!</h2>
                                <span>Already have an account?</span>
                                <button class ="btn btn-link" type="button" data-target="#loginCarousel" data-slide-to="0">Sign in</button>
                                <div class="regSquare">
                                    <form name="frmRegistration"  action = " " method = "POST">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control jobsearchform" type="text" id="registerEmail" name="registerEmail" placeholder="Email Address">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control jobsearchform" type="text" id="registerFName" name="registerFName" placeholder="First Name">
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control jobsearchform" type="password" type="text" id="registerPassword" name="registerPassword" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control jobsearchform" type="text" id="registerLName" name="registerLName" placeholder="Last Name">
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control jobsearchform" type="password" type="text" id="registerConfirmPassword" name="registerConfirmPassword" placeholder="Confirm Password">
                                                </div>
                                            </div>
                                        </div>                                       
                                        <input type="submit" value="Register" id="registerButton" class ="btn btn-primary jobsearchbtn" name="createUser">
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="carousel-item" style="margin-top: 60px;">
                        <div class="row">
                            
                            <div class="col-md-6">
                                <h2 class="registerHeader">One step closer to finding your perfect match!</h2>
                                <span>Already have an account?</span>
                                <button class ="btn btn-link" type="button" data-target="#loginCarousel" data-slide-to="0">Sign in</button>
                                <div class="loginSquare">
                                    <form name="frmRegistration"  action = " " method = "POST">
                                        <div class="form-group">
                                            <input class="form-control jobsearchform" type="text" id="registerCompany" name="registerCompany" placeholder="Company Name">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control jobsearchform" type="text" id="registerEmail" name="registerEmail" placeholder="Email Address">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control jobsearchform" type="password" type="text" id="registerPassword" name="registerPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control jobsearchform" type="password" type="text" id="registerConfirmPassword" name="registerConfirmPassword" placeholder="Confirm Password">
                                        </div>
                                        <input type="submit" value="Register" id="registerButton" class ="btn btn-primary jobsearchbtn" name="createCompany">
                                    </form>
                                </div>
                            </div>
                 
                        </div>
                    </div>
                    <div class="carousel-item" style="margin-top: 60px;">
                        <div class="row">
                            
                            <div class="col-md-6">
                                <h2 class="resetHeader">Reset Your Password</h2>
                                <p>Oh no, we've got you!</p>
                                <span>I remembered it...</span>
                                <button class ="btn btn-link" type="button" data-target="#loginCarousel" data-slide-to="0">Sign In</button>
								<br />
                                <div class="loginSquare">
                                    <form name="frmLogin"  action = " " method = "POST">
                                        <div class="form-group">
                                            <input class="form-control jobsearchform" type="text" id="resetEmail" name="resetEmail" placeholder="Email Address">
                                        </div>
                                        <input class ="btn btn-primary jobsearchbtn" type="button" value="Send" id="loginButton" name="send"data-target="#loginCarousel" data-slide-to="4">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="margin-top: 60px;">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="resetHeader">Reset Your Password</h2>
								<br />
                                <div class="loginSquare">
                                    <p>Thank you! An email is on its way to save the day.</p>
                                    <p>(follow the magic link)</p>
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
                        echo "<script type='text/javascript'>alert('All fields required to login.');</script>";
                    } else{ 
                        if (mysqli_num_rows($result) == 1){             
                            $row = mysqli_fetch_row($result); 
                            if($row[4] == $email && $row[3] == $pw){
            ?>
                                <script type="text/javascript"> 
                                    window.location.href = "https://students.cah.ucf.edu/~dig4104c_group08/clusterizr/dashboard.php"; 
                                </script> 
            <?php
                                $_SESSION['loggedin']=true; 
                                $_SESSION['email']=$email; 
                                $_SESSION['display_name']=$row[0]; 
                            }else{  
                                echo "<script type='text/javascript'>alert('Email or password incorrect.');</script>";
                            } 
                        }else{ 
                            echo "<script type='text/javascript'>alert('You are not a member yet.');</script>";
                            exit(); 
                        }     
                    } 
                } 
                if (isset($_POST['createUser'])) { 
                    if ($_POST['registerPassword'] != $_POST[ 
                            'registerConfirmPassword']) { 
                                echo "<script type='text/javascript'>alert('Passwords do not match!');</script>";

                    } else { 
                        $fname = ($_POST['registerFName']); 
                        $lname = ($_POST['registerLName']); 
                        $email = ($_POST['registerEmail']); 
                        $pw = sha1($_POST['registerPassword']); 
                        $dn = $_POST['registerFName'] . $_POST['registerLName'] . substr(sha1($_POST['registerEmail']), -6);
                        if (empty($fname) || empty( 
                                $lname) || empty( 
                                $email) || empty($pw)) { 
                                    echo "<script type='text/javascript'>alert('All fields required.');</script>";

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
                                echo "<script type='text/javascript'>alert('This email is already in use.');</script>";
                            }
                            else{
                                $sql = 
                                    "INSERT INTO users (display_name,first_name,last_name,email,password,access) VALUES ('$dn','$fname','$lname','$email','$pw','seeker')"; 
                                if (mysqli_query($conn, $sql)) { 
                                    echo "<script type='text/javascript'>alert('Account created successfully. Please log in.');</script>";
                                } else { 
                                    echo "<script type='text/javascript'>alert('Unable to create an account with these credentials.');</script>";

                                } 
                            }
                            mysqli_close($conn); 
                        } 
                    } 
                } 
                if (isset($_POST['createCompany'])) { 
                    if ($_POST['registerPassword'] != $_POST[ 
                            'registerConfirmPassword']) { 
                                echo "<script type='text/javascript'>alert('Passwords do not match.');</script>";

                    } else { 
                        $company = ($_POST['registerCompany']); 
                        $email = ($_POST['registerEmail']); 
                        $pw = sha1($_POST['registerPassword']); 
                        if (empty($company) || empty( 
                                $email) || empty($pw)) { 
                                    echo "<script type='text/javascript'>alert('All fields required');</script>";

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
                                echo "<script type='text/javascript'>alert('This email is already in use.');</script>";
                            }
                            else{
                                $sql = 
                                    "INSERT INTO users (display_name,email,password,access) VALUES ('$company','$email','$pw','company')"; 
                                if (mysqli_query($conn, $sql)) { 
                                    echo "<script type='text/javascript'>alert('Account created successfully. Please log in.');</script>";

                                } else { 
                                    echo "<script type='text/javascript'>alert('Unable to create an account with these credentials.');</script>";

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