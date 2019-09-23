<?php 

include 'header.php'; 
  
$sql = "SELECT * FROM users WHERE email = '".$_SESSION['email']."'"; 
$result = mysqli_query ($conn, $sql); 

//I have absolutely no Idea why I had to do a seperate call to the AJAX here, but If I don't it breaks the mainpart of the page...
$sql2 = "SELECT * FROM users WHERE email = '".$_SESSION['email']."'"; 
$result2 = mysqli_query ($conn, $sql2); 

$row_i = mysqli_fetch_assoc($result2);

//echo "SESSION: ".$_SESSION['email']; DEBUG
  
$myPic = $row_i['profile_pic'];
$myAbout = $row_i['about_me'];
$myLinked = $row_i['linkedin'];
$myTwitter = $row_i['twitter'];
$myFacebook = $row_i['facebook'];
$myInsta = $row_i['instagram'];
$myResume = $row_i['resume'];
$mySite = $row_i['website'];

//This checks to see if there are any missing data fields
if ((($myPic == 'defaultUser.png')||($myAbout == '')||($myLinked == '')||($myTwitter == '')||($myFacebook == '')||($myInsta == '')||($mySite == ''))&&(empty($_GET['profile']))) { 
?>

    <!-- Button trigger modal -->
    <button type="button" id="editModalBtn" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="display: none;">modal</button>

<?php
}
?>
<script src="js/dash.js"></script>

<!--================================================ AUTO EDIT INFO Modal ============================================================== -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>Please update the following information to complete your profile:</h4>

        <form action="updateuser.php" method="post">           
            <div id="postjob1" class="container">

            <?php
                if ($myLinked == '') {
            ?>
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="linkedinurl" class="form-control jobsearchform" placeholder="LinkedIn URL">
                    </div>
                </div>

            <?php
                }
                if ($myTwitter == '') {
            ?>
                            
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="twitterurl" class="form-control jobsearchform" placeholder="Twitter URL">
                    </div>
                </div>
            
            <?php
                }
                if ($myFacebook == '') {
            ?>
                            
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="facebookurl" class="form-control jobsearchform" placeholder="Facebook URL">
                    </div>
                </div>

            <?php
                }
                if ($myInsta == '') {
            ?>

                <div class="form-row">
                    <div class="col">
                        <input type="text" name="instagramurl" class="form-control jobsearchform" placeholder="Instagram URL">
                    </div>
                </div>
            
            <?php
                }
                if ($mySite == '') {
            ?>

                <div class="form-row">
                    <div class="col">
                        <input type="text" name="siteurl" class="form-control jobsearchform" placeholder="My Website URL">
                    </div>
                </div>
            
            <?php 
                }
                if ($myAbout == '') {
            ?>

                <div class="form-row mt-2">
                  <div class="col mb-4">
                          <label for="comment"><h3>Enter Description:</h3></label>
                      <textarea name="aboutme" class="form-control jobDesc" placeholder="About me..."></textarea>
                  </div>
                </div>
            
            <?php 
                }
            ?>
            
            <div class="row">         
                          


                <div class="col-md">
                  <button type="submit" name="submit" class="btn btn-secondary jobsearchbtn post-job-btn">Save</button>
                </div>
            </div>

        </form>
            <?php
                
                if (($myPic == 'defaultUser.png')||($myPic == '')) {
                    
            ?>
               
                <div class="form-row">
                    <div class="col">
                        <form action="upload.php" method="POST" enctype="multipart/form-data">

                            <input class="fileuploadbtn" type="file" name="file" class="mt-4">

                            <button type="submit" name="submit" class="btn btn-secondary jobsearchbtn post-job-btn">Upload</button>
                        
                        </form> 
                    </div>
                </div>

            <?php
                }
            ?>

            </div>
        </form>

      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!--================================================ AUTO EDIT INFO Modal ============================================================== -->
<div class="modal fade" id="editAllModal" tabindex="-1" role="dialog" aria-labelledby="editAllModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editAllModalLabel">Edit User Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="updateuser.php" method="post">           
            <div id="postjob1" class="container">
               
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="linkedinurl" class="form-control jobsearchform" placeholder="LinkedIn URL">
                    </div>
                </div>
                            
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="twitterurl" class="form-control jobsearchform" placeholder="Twitter URL">
                    </div>
                </div>
                       
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="facebookurl" class="form-control jobsearchform" placeholder="Facebook URL">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <input type="text" name="instagramurl" class="form-control jobsearchform" placeholder="Instagram URL">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <input type="text" name="siteurl" class="form-control jobsearchform" placeholder="My Website URL">
                    </div>
                </div>

                <div class="form-row mt-2">
                  <div class="col mt-2">
                          <label for="comment"><h3>Enter Description:</h3></label>
                      <textarea name="aboutme" class="form-control jobDesc" placeholder="About me..."></textarea>
                  </div>
                </div>

            <div class="row">
                

                <div class="col-md">
                  <button type="submit" name="submit" class="btn btn-secondary jobsearchbtn post-job-btn">Save</button>
                </div>
            </div>

        </form>
               
                <div class="form-row">
                    <div class="col">
                        <form action="upload.php" method="POST" enctype="multipart/form-data">

                            <input class="fileuploadbtn" type="file" name="file" class="mt-4">

                            <button type="submit" name="submit" class="btn btn-secondary jobsearchbtn post-job-btn">Upload</button>
                        
                        </form> 
                    </div>
                </div>

            </div>
        </form>

      </div>
    </div>
  </div>
</div>

<?php
//===================================THIS AREA DETERMINES WHICH TYPE OF DASHBOARD SHOWS UP==================================================
    
    $row = mysqli_fetch_assoc($result);


    if ($row['access'] == 'company' && empty($_GET['profile'])){
      //echo "COMPANY - Logged In";
      $compImg = $row['profile_pic'];
      ?>
        <div class="container-big mt-4">
          <div class = "row">
            <div class = "col-lg-2 text-center">
                <div class = "innercolumn roundedcard shadow overflow-hidden" style="height:auto;width:90%;">
                  <div class="col-12 text-center">
                    <img src="img/userpics/<?php echo $compImg;?>" class="img-fluid roundimg" style="border-radius:50%; width: 100px;">
                    <h6><?php echo $row['display_name']; ?></h6>
                    <p class="text-left tinytext overflow-hidden"><?php echo $row['about_me']; ?></p>
                    <hr>
                    <!-- Button trigger modal -->
                    <button style="width: 100%" type="button" id="editModalBtn2" class="btn btn-secondary jobsearchbtn post-job-btn mt-2 mb-2" data-toggle="modal" data-target="#editAllModal">Edit Info</button>
                  </div>
                </div>
            </div>
            <div class = "col-lg-8 mb-4">
                <ul class="nav nav-pills nav-fill nav-tabs">
                  <li class="active fullTab"><a class="nav-link active" data-toggle="tab" href="#home">Newsfeed</a></li>
                  <li class="fullTab"><a class="nav-link" data-toggle="tab" href="#menu1">Job Openings</a></li>
                </ul>

                <div class="tab-content">
                  <div id="home" class="tab-pane fade-in active">
                    <div class = "maindash innercolumn roundedcard shadow">
                      <div class="row" style="width: 90%;margin: 0 auto;">
                        <div class = 'col-lg-9'>
                          <form name="createPost"  action = " " method = "POST">
                              <div class="form-group">
                                <textarea style="height: 100px;" class="form-control jobsearchform" id="postText" name="postText" placeholder="What's Happening at <?php echo $_SESSION['display_name'];?>?"></textarea>
                              </div>
                          </div>
                          <div class = 'col-lg-3'>
                            <input type="submit" value="Post" id="postButton" class ="btn btn-primary jobsearchbtn" name="createPost">
                          </form>
                        </div>
                        </div>
                      <?php
                        $sql_posts= "SELECT * FROM posts WHERE company = '".$_SESSION['display_name']."'"; 
                        $result_posts= mysqli_query ($conn, $sql_posts); 
                        
                        while ($row_posts = mysqli_fetch_assoc($result_posts)){ 
                          echo "
                          <div class = 'roundedcard shadow' style='padding:4%;width:90%;margin:0 auto;margin-bottom:5%;'>
                            <div class = 'row'>
                            <div class = 'col-lg-2'>
                                <img src='img/userpics/".$compImg."' class='img-fluid roundimg' style='border-radius:50%; width: 50px;'>
                              </div>
                              <div class = 'col-lg-7'>
                                <h6>".$_SESSION['display_name']."</h6>
                                <span>".$row_posts['date_created']."</span>
                                <p>".$row_posts['content']."</p>
                              </div>
                              <div class = 'col-lg-3'></div>
                            </div>
                          </div>";
                        }
                        mysqli_close($conn); 
                      ?>
                    </div>
                  </div>
                  <div id="menu1" class="tab-pane fade">
                    <div class = "maindash innercolumn roundedcard shadow">
                        <?php include("getcompjobs.php"); ?>
                        <a class="post-job-btn" href="postjobs.php"><button class="btn btn-outline-success postjobbtnnav" type="button">Post a Job</button></a>
                    </div>
                  </div>
                </div>
                
            </div>
            <div class = "col-lg-2 mb-4">
                <div class = "innercolumn roundedcard shadow" style="height:auto;width:90%;float:right;">
                  <h5>Team</h5>
                </div>
            </div>
          </div>
        </div>
      <?php
    }
    else if ($row['access'] == 'company' && !empty($_GET['profile'])){
      $fixedProfile = str_replace('%20',' ',$_GET['profile']);
      $sql_o= "SELECT * FROM users WHERE display_name = '".$fixedProfile."'"; 
      $result_o= mysqli_query ($conn, $sql_o); 
      while ($row_o = mysqli_fetch_assoc($result_o)){
        if($row_o['access'] == 'company'){
          $compImg = $row_o['profile_pic'];
          //echo "COMPANY - Viewing Company Profile";
          ?>
            <div class="container-big mt-4">
          <div class = "row">
            <div class = "col-lg-2 text-center">
                <div class = "innercolumn roundedcard shadow overflow-hidden " style="height:auto;width:90%;">
                  <div class="col-12 text-center">
                    <img src="img/userpics/<?php echo $compImg;?>" class="img-fluid roundimg" style="border-radius:50%; width: 100px;">
                    <h6><?php echo $row_o['display_name']; ?></h6>
                    <p class="text-left tinytext overflow-hidden"><?php echo $row_o['about_me']; ?></p>
                  </div>
                </div>
            </div>
            <div class = "col-lg-8 mb-4">
                <ul class="nav nav-pills nav-fill nav-tabs">
                  <li class="active fullTab"><a class="nav-link active" data-toggle="tab" href="#home">Newsfeed</a></li>
                  <li class="fullTab"><a class="nav-link" data-toggle="tab" href="#menu1">Job Openings</a></li>
                </ul>

                <div class="tab-content">
                  <div id="home" class="tab-pane fade-in active">
                    <div class = "maindash innercolumn roundedcard shadow">
                    <?php
                        $sql_posts= "SELECT * FROM posts WHERE company = '".$row_o['display_name']."'"; 
                        $result_posts= mysqli_query ($conn, $sql_posts); 
                        if (empty($result_posts)){echo "<h5>No Jobs Postings</h5>";}
                        while ($row_posts = mysqli_fetch_assoc($result_posts)){ 
                          echo "
                          <div class = 'roundedcard shadow' style='padding:4%;width:90%;margin:0 auto;margin-bottom:5%;'>
                            <div class = 'row'>
                            <div class = 'col-lg-2'>
                                <img src='img/userpics/".$compImg."' class='img-fluid roundimg' style='border-radius:50%; width: 50px;'>
                              </div>
                              <div class = 'col-lg-7'>
                                <h6>".$row_o['display_name']."</h6>
                                <span>".$row_posts['date_created']."</span>
                                <p>".$row_posts['content']."</p>
                              </div>
                              <div class = 'col-lg-3'></div>
                            </div>
                          </div>";
                        }
                        
                      ?>
                    </div>
                  </div>
                  <div id="menu1" class="tab-pane fade">
                    <div class = "maindash innercolumn roundedcard shadow">
                        <?php 
                        $sql_jobs = "SELECT * FROM jobs";
                        $result_jobs = mysqli_query($conn,$sql_jobs);
                        $count = 0;
                        $jobLink = '#'; //Replace this w/ link to individual job page
                        $companyLink = '#'; //Replace this w/ link to company page
                        $cityLink = '#';
                    
                    
                    
                    
                        while ($row_jobs = mysqli_fetch_assoc($result_jobs)){ //Loops through every result that was returned
                            
                            $compName = $row_jobs['company_name'];
                            if ($compName == $fixedProfile){
                              $count++;
                              $description = $row_jobs['description'];
                              $shortdesc = substr($description, 0, 200).'...';
                    
                              //First gets the date, then formats it
                              $datePosted = $row_jobs['date_created'];
                              $datePosted = strtotime($datePosted);
                              $datePosted = date("F d, Y", $datePosted);
                    
                              $sql_u = "SELECT * FROM users WHERE display_name = '$compName'";
                              $result_u = mysqli_query($conn,$sql_u);
                              $row_u = mysqli_fetch_assoc($result_u);
                              $compImg = $row_u['profile_pic'];
                    
                              echo'<div class="jobcard row mt-4 shadow pt-4 pb-2 roundedcard" id="'.$row_jobs['job_id'].'">
                                
                                <div class="col-3 text-center">
                                  <img src="img/userpics/'.$compImg.'" class="img-fluid roundimg" style="border-radius:50%; width: 100px;">
                                </div>
                    
                                <div class="col-9">
                                  <h4><a href="'.$jobLink.'">'.$row_jobs['title'].'</a></h4>
                                  <h6 class=""><a href="'.$companyLink.'">'.$row_jobs['company_name'].'</a></h6>
                                  <a href="'.$cityLink.'" class="mt-0 mb-4">'.$row_jobs['city'].', '.$row_jobs['state'].'</a>
                                  <p class="tinytext mt-4">'.$shortdesc.'</p>
                                  <p class="tinytext mt-4">'.$datePosted.'</p>
                                </div>
                    
                              </div>';
                            }
                            
                        }
                        if($count == 0){
                          echo "<h5>No Job Postings</h5>";
                        }
                        ?>
                    </div>
                  </div>
                </div>
                
            </div>
            <div class = "col-lg-2 mb-4">
                <div class = "innercolumn roundedcard shadow" style="height:auto;width:90%;float:right;">
                  <h5>Team</h5>
                </div>
            </div>
          </div>
        </div>
          <?php
        }
        else{
          //echo "COMPANY - Viewing A Seeker Profile";
          $compImg = $row_o['profile_pic'];
          $email = $row_o['email'];
          ?>
            <div class="container-big mt-4">
              <div class = "row">
                <div class = "col-lg-2 mb-4">
                    <div class = "innercolumn roundedcard shadow" style="width:90%;">
                      <img src="img/userpics/<?php echo $compImg?>" class="img-fluid roundimg" style="border-radius:50%; width: 100px;">
                      <h6><?php echo $row_o['first_name'] . " " . $row_o['last_name']; ?></h6>
                      <p class="center"><?php echo $row_o['job_title']; ?></p>
                      <p class="center"><?php echo $row_o['current_employer']; ?></p>
                      <p class="center tinytext overflow-hidden"><?php echo $row_o['email']; ?></p>
                      <?php if($row_o['website'] != NULL){echo "<p class='center'>" . $row_o['website'] . "</p>";}?>
                      <!-- Button trigger modal -->
                      <button style="width: 100%;" type="button" id="editModalBtn2" class="btn btn-secondary jobsearchbtn post-job-btn mt-2 mb-2" data-toggle="modal" data-target="#editAllModal">Edit Info</button>                      
                      <hr>
                      <h6>Skills</h6>
                      <?php
                          $sql_skills= "SELECT * FROM user_skills WHERE user_email = '$email'"; 
                          $result_skills= mysqli_query ($conn, $sql_skills); 
                          while ($row_skills = mysqli_fetch_assoc($result_skills)){ 
                            echo "<div class='skill'>".$row_skills['skill']."</div>";
                          }
                        ?>
                    </div>
                </div>
                <div class = "col-lg-8 mb-4">
                    <div class = "innercolumn roundedcard shadow">
                      <?php
                          $sql_skills= "SELECT * FROM user_skills WHERE user_email = '$email'"; 
                          $result_skills= mysqli_query ($conn, $sql_skills); 
                          while ($row_skills = mysqli_fetch_assoc($result_skills)){ 
                            echo "<div class='skill'>".$row_skills['skill']."</div>";
                          }
                        ?>
                    </div>
                </div>
                <div class = "col-lg-2 mb-4">
                    <div class = "innercolumn roundedcard shadow" style="height:auto;width:90%;float:right;">
                      <h5>Their Network</h5>
                    </div>
                </div>
              </div>
            </div>
          <?php
        }
      }
    }
    else if ($row['access'] == 'seeker' && empty($_GET['profile'])){
      //echo "USER - Logged In";
      $compImg = $row['profile_pic'];
      ?>
        <div class="container-big mt-4">
            <div class = "row">
              <div class = "col-lg-2 mb-4">
                  <div class = "innercolumn roundedcard shadow" style="width:90%;">
                    <div class="col-12 text-center">
                      <img src="img/userpics/<?php echo $compImg?>" class="img-fluid roundimg" style="border-radius:50%; width: 100px;">
                      <h6><?php echo $row['first_name'] . " " . $row['last_name']; ?></h6>
                      <p class="center"><?php echo $row['job_title']; ?></p>
                      <p class="center"><?php echo $row['current_employer']; ?></p>
                      <p class="center tinytext overflow-hidden"><?php echo $row['email']; ?></p>
                      <?php if($row['website'] != NULL){echo "<p class='center'>" . $row['website'] . "</p>";}?>
                      <!-- Button trigger modal -->
                      <button style="width: 100%;" type="button" id="editModalBtn2" class="btn btn-secondary jobsearchbtn post-job-btn mt-2 mb-2" data-toggle="modal" data-target="#editAllModal">Edit Info</button>
                      <hr>
                      <h6>Skills</h6>
                      <?php
                          $sql_skills= "SELECT * FROM user_skills WHERE user_email = '".$_SESSION['email']."'"; 
                          $result_skills= mysqli_query ($conn, $sql_skills); 
                          while ($row_skills = mysqli_fetch_assoc($result_skills)){ 
                            echo "<div class='skill'>i".$row_skills['skill']."</div>";
                          }
                        ?>
                    </div>
                  </div>
              </div>
              <div class = "col-lg-8 mb-4">
                  <ul class="nav nav-pills nav-fill nav-tabs">
                    <li class="active fullTab"><a class="nav-link active" data-toggle="tab" href="#home">Newsfeed</a></li>
                    <li class="fullTab"><a class="nav-link" data-toggle="tab" href="#menu1">My Profile</a></li>
                  </ul>

                  <div class="tab-content">
                    <div id="home" class="tab-pane fade-in active">
                      <div class = "maindash innercolumn roundedcard shadow" style="height:300px;">

                      </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                      <div class = "maindash innercolumn roundedcard shadow" style="height:100%;">
                        <h5>Skills</h5>
                        <?php
                          $sql_skills= "SELECT * FROM user_skills WHERE user_email = '".$_SESSION['email']."'"; 
                          $result_skills= mysqli_query ($conn, $sql_skills); 
                          while ($row_skills = mysqli_fetch_assoc($result_skills)){ 
                            echo "<div class='skill'>".$row_skills['skill']."</div>";
                          }
                        ?>
                      </div>
                    </div>
                  </div>
                  
              </div>
              <div class = "col-lg-2 mb-4">
                  <div class = "innercolumn roundedcard shadow" style="height:auto;width:90%;float:right;">
                    <h5 style = "font-size:1.2vw;">Recommended Contacts</h5>
                    <?php
                          $recUsers = array();
                          $sql_skills= "SELECT * FROM user_skills"; 
                          $result_skills= mysqli_query ($conn, $sql_skills); 
                          while ($row_skills = mysqli_fetch_assoc($result_skills)){ 
                            $sql_common= "SELECT * FROM user_skills WHERE skill = '".$row_skills['skill']."'";
                            $result_common= mysqli_query ($conn, $sql_common); 
                            while ($row_common = mysqli_fetch_assoc($result_common)){ 
                              if(!in_array($row_skills['user_email'], $recUsers) && $row_skills['user_email']!=$_SESSION['email']){
                                array_push($recUsers, $row_skills['user_email']);
                              }
                            }
                          }
                          foreach($recUsers as $value){
                            $sql_recusers= "SELECT * FROM users WHERE email = '$value'"; 
                            $result_recusers= mysqli_query ($conn, $sql_recusers); 
                            while ($row_recusers = mysqli_fetch_assoc($result_recusers)){
                              echo "<a href='https://students.cah.ucf.edu/~dig4104c_group08/clusterizr/dashboard.php?profile=". $row_recusers['display_name'] ."'>";
                              echo "<img src='img/userpics/".$row_recusers['profile_pic']."' class='img-fluid roundimg' style='border-radius:50%; width: 50px;'>";
                              echo "<div>".$row_recusers['first_name']. " " .$row_recusers['last_name']. "</div></a>";
                            }
                          }
                        ?>
                    <hr>
                    <h5 style = "font-size:1.2vw;">Recommended Jobs</h5>
                  </div>
              </div>
            </div>
          </div>
      <?php
    }
    else if ($row['access'] == 'seeker' && !empty($_GET['profile'])){
      //echo "USER - Viewing another profile";
      $fixedProfile = str_replace('%20',' ',$_GET['profile']);
      $sql_o= "SELECT * FROM users WHERE display_name = '".$fixedProfile."'"; 
      $result_o= mysqli_query ($conn, $sql_o); 
      while ($row_o = mysqli_fetch_assoc($result_o)){
        if($row_o['access'] == 'company'){
          $compImg = $row_o['profile_pic'];
          //echo "USER - Viewing Company Profile";
          ?>
            <div class="container-big mt-4">
          <div class = "row">
            <div class = "col-lg-2 text-center">
                <div class = "innercolumn roundedcard shadow overflow-hidden" style="height:auto;width:90%;">
                  <div class="col-12 text-center">
                    <img src="img/userpics/<?php echo $compImg;?>" class="img-fluid roundimg" style="border-radius:50%; width: 100px;">
                    <h6><?php echo $row_o['display_name']; ?></h6>
                    <p class="text-left tinytext overflow-hidden"><?php echo $row_o['about_me']; ?></p>
                    
                  </div>
                </div>
            </div>
            <div class = "col-lg-8 mb-4">
                <ul class="nav nav-pills nav-fill nav-tabs">
                  <li class="active fullTab"><a class="nav-link active" data-toggle="tab" href="#home">Newsfeed</a></li>
                  <li class="fullTab"><a class="nav-link" data-toggle="tab" href="#menu1">Job Openings</a></li>
                </ul>

                <div class="tab-content">
                  <div id="home" class="tab-pane fade-in active">
                    <div class = "maindash innercolumn roundedcard shadow">
                      <?php
                        $sql_posts= "SELECT * FROM posts WHERE company = '".$row_o['display_name']."'"; 
                        $result_posts= mysqli_query ($conn, $sql_posts); 
                        while ($row_posts = mysqli_fetch_assoc($result_posts)){ 
                          echo "
                          <div class = 'roundedcard shadow' style='padding:4%;width:90%;margin:0 auto;margin-bottom:5%;'>
                            <div class = 'row'>
                            <div class = 'col-lg-2'>
                                <img src='img/userpics/".$compImg."' class='img-fluid roundimg' style='border-radius:50%; width: 50px;'>
                              </div>
                              <div class = 'col-lg-7'>
                                <h6 style = 'font-size:5vw;'>".$row_o['display_name']."</h6>
                                <span style = 'font-size:3vw;'>".$row_posts['date_created']."</span>
                                <p style = 'font-size:3vw;'>".$row_posts['content']."</p>
                              </div>
                              <div class = 'col-lg-3'></div>
                            </div>
                          </div>";
                        }
                      ?>
                    </div>
                  </div>
                  <div id="menu1" class="tab-pane fade">
                    <div class = "maindash innercolumn roundedcard shadow">
                        <?php 
                        $sql_jobs = "SELECT * FROM jobs";
                        $result_jobs = mysqli_query($conn,$sql_jobs);
                        $jobLink = '#'; //Replace this w/ link to individual job page
                        $companyLink = '#'; //Replace this w/ link to company page
                        $cityLink = '#';
                        $count = 0;
                    
                    
                        
                        while ($row_jobs = mysqli_fetch_assoc($result_jobs)){ //Loops through every result that was returned
                            
                            $compName = $row_jobs['company_name'];
                            if ($compName == $fixedProfile){
                              $count++;
                              $description = $row_jobs['description'];
                              $shortdesc = substr($description, 0, 200).'...';
                    
                              //First gets the date, then formats it
                              $datePosted = $row_jobs['date_created'];
                              $datePosted = strtotime($datePosted);
                              $datePosted = date("F d, Y", $datePosted);
                    
                              $sql_u = "SELECT * FROM users WHERE display_name = '$compName'";
                              $result_u = mysqli_query($conn,$sql_u);
                              $row_u = mysqli_fetch_assoc($result_u);
                              $compImg = $row_u['profile_pic'];
                    
                              echo'<div class="jobcard row mt-4 shadow pt-4 pb-2 roundedcard" id="'.$row_jobs['job_id'].'">
                                
                                <div class="col-3 text-center">
                                  <img src="img/userpics/'.$compImg.'" class="img-fluid roundimg" style="border-radius:50%; width: 100px;">
                                </div>
                    
                                <div class="col-9">
                                  <h4><a href="'.$jobLink.'">'.$row_jobs['title'].'</a></h4>
                                  <h6 class=""><a href="'.$companyLink.'">'.$row_jobs['company_name'].'</a></h6>
                                  <a href="'.$cityLink.'" class="mt-0 mb-4">'.$row_jobs['city'].', '.$row_jobs['state'].'</a>
                                  <p class="tinytext mt-4">'.$shortdesc.'</p>
                                  <p class="tinytext mt-4">'.$datePosted.'</p>
                                </div>
                    
                              </div>';
                            }
                            
                        }
                        if($count == 0){
                          echo "<h5>No Job Postings</h5>";
                        }
                        ?>
                    </div>
                  </div>
                </div>
                
            </div>
            <div class = "col-lg-2 mb-4">
                <div class = "innercolumn roundedcard shadow" style="height:auto;width:90%;float:right;">
                  <h5>Team</h5>
                </div>
            </div>
          </div>
        </div>
          <?php
        }
        else{
          //echo "USER - Viewing Another Seeker";
          $compImg = $row_o['profile_pic'];
          $email = $row_o['email'];
          $loggedEmail = $_SESSION['email'];
          ?>
            <div class="container-big mt-4">
              <div class = "row">
                <div class = "col-lg-2 text-center">
                    <div class = "innercolumn roundedcard shadow" style="width:90%;">
                      <img src="img/userpics/<?php echo $compImg?>" class="img-fluid roundimg" style="border-radius:50%; width: 100px;">
                      <h6><?php echo $row_o['first_name'] . " " . $row_o['last_name']; ?></h6>
                      <p class="center"><?php echo $row_o['job_title']; ?></p>
                      <p class="center"><?php echo $row_o['current_employer']; ?></p>
                      <p class="center tinytext overflow-hidden"><?php echo $row_o['email']; ?></p>
                      <?php if($row_o['website'] != NULL){echo "<p class='center'>" . $row_o['website'] . "</p>";}?>
                      <hr>
                      <h6>Skills</h6>
                      <?php
                          $sql_skills= "SELECT * FROM user_skills WHERE user_email = '$email'"; 
                          $result_skills= mysqli_query ($conn, $sql_skills); 
                          while ($row_skills = mysqli_fetch_assoc($result_skills)){ 
                            echo "<div class='skill'>".$row_skills['skill']."</div>";
                          }
                          $follows = 0;
                          $sql_fol= "SELECT * FROM follows WHERE user_email = '$loggedEmail'"; 
                          $result_fol= mysqli_query ($conn, $sql_fol); 
                          while ($row_fol = mysqli_fetch_assoc($result_fol)){ 
                            if ($row_fol['followed_displayName'] == $_GET['profile']){
                              $follows = 1;
                            }
                          }
                          if ($follows == 0){
                        ?>
                        <form name="frmLogin"  action = " " method = "POST">
                      <button type="submit" name="connect" class="btn btn-secondary jobsearchbtn post-job-btn mt-2 mb-2">Connect</button>
                    </form>
                          <?php }else{echo "<hr><div>
                            You are connected with this person!
                          </div>";}?>
                    </div>
                </div>
                <div class = "col-lg-8 mb-4">
                    <div class = "innercolumn roundedcard shadow">
                    <h5>Skills</h5>
                      <?php
                          $sql_skills= "SELECT * FROM user_skills WHERE user_email = '$email'"; 
                          $result_skills= mysqli_query ($conn, $sql_skills); 
                          while ($row_skills = mysqli_fetch_assoc($result_skills)){ 
                            echo "<div class='skill'>".$row_skills['skill']."</div>";
                          }
                        ?>
                    </div>
                </div>
                <div class = "col-lg-2 mb-4">
                    <div class = "innercolumn roundedcard shadow" style="height:auto;width:90%;float:right;">
                      <h5>Their Network</h5>
                    </div>
                </div>
              </div>
            </div>
          <?php
        }
      }
    }
    if (isset($_POST['createPost'])) { 
      $content = $_POST['postText']; 
      if (empty($content)){
        echo "<script>alert('Please type a post!');</script>";
      }
      else{
        if ($conn === false) { 
          die( 
              "ERROR: Could not connect. " 
              .mysqli_connect_error() 
          ); 
        }
        else{
          $dn = $_SESSION['display_name'];
          $sql = 
          "INSERT INTO posts (content, company) VALUES ('$content', '$dn')"; 
            if (mysqli_query($conn, $sql)) { 
              echo "<meta http-equiv='refresh' content='0'>";

            } else { 
                echo "<script type='text/javascript'>alert('Unable to post.');</script>";
            } 
        }
  mysqli_close($conn); 
        
      }
    }
    if (isset($_POST['connect'])){
      $user_email = $_SESSION["email"];
      $followed_email = $_GET["profile"];
      $sql = 
          "INSERT INTO follows (followed_displayName, user_email) VALUES ('$followed_email', '$user_email')"; 
            if (mysqli_query($conn, $sql)) { 
              echo "<meta http-equiv='refresh' content='0'>";

            } else { 
                echo "<script type='text/javascript'>alert('Unable to follow.');</script>";
            } 
    }
?>



<?php include 'footer.php'; ?>
