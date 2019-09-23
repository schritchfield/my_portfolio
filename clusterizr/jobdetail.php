<?php 
include("db_connect.php");

if ($_POST['jobCode'] != 'default'){ 
    
    $jobId = $_POST['jobCode']; //Gets the id of the job from the js file, based on which div is clicked (the divs have id = the job id)
    $sql = "SELECT * FROM jobs WHERE job_id = '$jobId'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
}

else{
    
    $sql = "SELECT * FROM jobs WHERE date_created = (select max(date_created) from jobs)";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
}


$jobTitle = $row['title'];
$compName = $row['company_name'];
$jobDescrip = $row['description'];
$jobQual = $row['skills'];
$jobType = $row['job_type'];
$jobCity = $row['city'];
$jobState = $row['state'];

//var_dump(explode(',', $jobQual));

$skillArray = explode(',', $jobQual);

//print_r($skillArray); //Debug

//Compensation - Validation that makes sure there is data in at least 1 field and sets a message accordingly
if($row['salary_min'] != ''){
    $salMin = $row['salary_min'];
}
else{
    $salMin = '';
}

if($row['salary_max'] != ''){
    $salMax = $row['salary_max'];
}
else{
    $salMax = '';
}

if(($salMin == '')&&($salMax != '')){
    $sal = 'Up to '.$salMax;
}
else if(($salMin != '')&&($salMax == '')){
    $sal = 'Starting at '.$salMin;
}
else if(($salMin != '')&&($salMax != '')){
    $sal = $salMin.' - '.$salMax;
}
else{
    $sal = 'Not Listed';
}

//Date stuff
$datePosted = $row['date_created'];
$datePosted = strtotime($datePosted);
$datePosted = date("F d, Y", $datePosted);

//Selects from the users table where the company is the company in the job posting
$sql_u = "SELECT * FROM users WHERE display_name = '$compName'";
$result_u = mysqli_query($conn,$sql_u);
$row_u = mysqli_fetch_assoc($result_u);

$compAbout = $row_u['about_me']; //Company About text
$compImg = $row_u['profile_pic']; //Company Image

$i = 0; //Counter var for skill loop

echo'    
<div class = "roundedcard shadow innercolumn row"> 
          
          <div class = "col-lg-2">
            <img src="img/userpics/'.$compImg.'" class="img-fluid" alt="..." style="border-radius:50%;">
          </div>

          <div class = "col-lg-6">
            <h4>'.$jobTitle.'</h4>
            <h6>'.$compName.'</h6>
            <h6>'.$jobCity.', '.$jobState.'</h6>
            <p>Job Type: '.$jobType.'</p>
            <p>Compensation: '.$sal.'</p>
          </div>

          <div class = "col-lg-4">
            <button type="submit" class="btn btn-secondary jobsearchbtn">Apply</button>
          </div>

        </div>
        <!--End of Inner Box-->

        <div class="jobsTextBlurb mt-4 mb-4">
          <h5 class="font-weight-bold">About the company</h5>
          <p class="ml-3">'.$compAbout.'</p>
        </div>

        <div class="jobsTextBlurb mt-4 mb-4">
          <h5 class="font-weight-bold">Job Summary</h5>
          <p class="ml-3">'.$jobDescrip.'</p>
        </div>
        
        <div class="jobsTextBlurb mt-4 mb-4">
          <h5 class="font-weight-bold">Qualifications</h5>
          <ul>';
          foreach ($skillArray as $value){
            echo '<li class="ml-3">'.$skillArray[$i].'</li>';
            $i++;
          }
          echo'</ul>
        </div>


        <!--<div class="jobsTextBlurb mt-4 mb-4">
          <p class="ml-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
        </div>-->

        <div class = "row"> 
          
          <div class = "col-lg-3">
            <p class="mt-4 font-weight-bold">'.$compName.'</p>
          </div>
          <div class = "col-lg-5">
            <p class="mt-4 font-weight-bold">'.$datePosted.'</p>
          </div>

          <div class = "col-lg-4">
            <button type="submit" class="btn btn-secondary jobsearchbtn">Apply</button>
</div>';

?>