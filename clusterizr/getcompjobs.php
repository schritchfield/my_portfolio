<?php
    include("db_connect.php");

    $sql = "SELECT * FROM jobs";
    $result = mysqli_query($conn,$sql);

    $jobLink = '#'; //Replace this w/ link to individual job page
    $companyLink = '#'; //Replace this w/ link to company page
    $cityLink = '#';




    while ($row = mysqli_fetch_assoc($result)){ //Loops through every result that was returned
        
        $compName = $row['company_name'];
        if ($compName == $_SESSION['display_name']){
          $description = $row['description'];
          $shortdesc = substr($description, 0, 200).'...';

          //First gets the date, then formats it
          $datePosted = $row['date_created'];
          $datePosted = strtotime($datePosted);
          $datePosted = date("F d, Y", $datePosted);

          $sql_u = "SELECT * FROM users WHERE display_name = '$compName'";
          $result_u = mysqli_query($conn,$sql_u);
          $row_u = mysqli_fetch_assoc($result_u);
          $compImg = $row_u['profile_pic'];

          echo'<div class="jobcard row mt-4 shadow pt-4 pb-2 roundedcard" id="'.$row['job_id'].'">
            
            <div class="col-3 text-center">
              <img src="img/userpics/'.$compImg.'" class="img-fluid roundimg" style="border-radius:50%; width: 100px;">
            </div>

            <div class="col-9">
              <h4><a href="'.$jobLink.'">'.$row['title'].'</a></h4>
              <h6 class=""><a href="'.$companyLink.'">'.$row['company_name'].'</a></h6>
              <a href="'.$cityLink.'" class="mt-0 mb-4">'.$row['city'].', '.$row['state'].'</a>
              <p class="tinytext mt-4">'.$shortdesc.'</p>
              <p class="tinytext mt-4">'.$datePosted.'</p>
            </div>

          </div>';
        }
        
    }
?>