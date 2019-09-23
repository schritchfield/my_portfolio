<?php
include("header.php");
$jobId = uniqid('', true);

//if(isset($_POST['submit'])){ 

    if(!empty($_POST["jobtitle"])){
        $jobTitle = $_POST["jobtitle"];
    }
    else{
        $jobTitle = 'N/A';
    }
    

   
    $compName = $_SESSION['display_name'];
    

    if(!empty($_POST["city"])){
        $city = $_POST["city"];
    }
    else{
        $city = 'N/A';
    }

    if(!empty($_POST["state"])){
        $state = $_POST["state"];
    }
    else{
        $state = 'N/A';
    }

    if(!empty($_POST["address"])){
        $address = $_POST["address"];
    }
    else{
        $address = 'N/A';
    }

    if(!empty($_POST["salmin"])){
        $salMin = $_POST["salmin"];
    }
    else{
        $salMin = 'N/A';
    }

    if(!empty($_POST["salmax"])){
        $salMax = $_POST["salmax"];
    }
    else{
        $salMax = 'N/A';
    }

    if(!empty($_POST["skills"])){
        $skills = $_POST["skills"];
    }
    else{
        $skills = 'N/A';
    }

    if(!empty($_POST["jobdescrip"])){
        $descrip = $_POST["jobdescrip"];
    }
    else{
        $descrip = 'N/A';
    }

    if(!empty($_POST["jobtype"])){
        $jobType = $_POST["jobtype"];
    }
    else{
        $jobType = 'N/A';
    }

    //Radio btn
    //$contactRadios = $_POST["contactRadios"];

    if(!empty($_POST["receiver"])){
        $receiver = $_POST["receiver"];
    }
    else{
        $receiver = 'N/A';
    }

    if(!empty($_POST["jobtags"])){
        $jobTags = $_POST["jobtags"];
    }
    else{
        $jobTags = 'N/A';
    }

    //$sql = "INSERT INTO jobs (title, description, job_type, skills, job_id, company_name, city, state) VALUES ('1', '2', '3', '4', '5', '6', '7', '8')";
    $sql = "INSERT INTO jobs (title, description, job_type, salary_min, salary_max, skills, job_id, company_name, receiver, city, state, address) VALUES ('$jobTitle', '$descrip', '$jobType', '$salMin', '$salMax', '$skills', '$jobId',  '$compName', '$receiver','$city', '$state', '$address')";
    mysqli_query($conn, $sql);  
  
   echo '<script type="text/javascript">window.location = "dashboard.php"</script>'; //Takes user to home
//}
?>