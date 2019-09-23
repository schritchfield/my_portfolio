<?php
include("db_connect.php");

$min_length = 2;

if (isset($_POST['internal'])) {
    if ($_POST['internal'] == 'yes') {
        
        //IF the strings don't = nothing
        if ( ($_POST['jobQuery'] != '') && ($_POST['locationQuery'] != '') ) {
            
            $jobQuery = $_POST['jobQuery'];
            $locationQuery = $_POST['locationQuery'];

            //$jobQuery = preg_replace("#[^0-9a-z]#i","",$jobQuery); //Validation stuff
            //$locationQuery = preg_replace("#[^0-9a-z]#i","",$locationQuery); //Validation stuff
            
            $jobQuery = preg_replace('/\+/', ' ', $jobQuery);
            $locationQuery = preg_replace('/\+/', ' ', $locationQuery);

            $sql = "SELECT * FROM jobs WHERE title LIKE '%$jobQuery%' OR description LIKE '%$jobQuery%' OR skills LIKE '%$jobQuery%' OR city LIKE '%$locationQuery%' ORDER BY date_created DESC";
            $result = mysqli_query($conn,$sql);
        }

        //IF only a job was searched
        else if ( ($_POST['jobQuery'] != '') && ($_POST['locationQuery'] == '') ) {
            
            $jobQuery = $_POST['jobQuery'];

            //$jobQuery = preg_replace("#[^0-9a-z]#i","",$jobQuery); //Validation stuff
            $jobQuery = preg_replace('/\+/', ' ', $jobQuery);

            $sql = "SELECT * FROM jobs WHERE title LIKE '%$jobQuery%' OR description LIKE '%$jobQuery%' OR skills LIKE '%$jobQuery%' ORDER BY date_created DESC";
            $result = mysqli_query($conn,$sql);
        }

        //IF only a location was searched
        else if ( ($_POST['jobQuery'] == '') && ($_POST['locationQuery'] != '') ) {
            
            $locationQuery = $_POST['locationQuery'];

            //$locationQuery = preg_replace("#[^0-9a-z]#i","",$locationQuery); //Validation stuff
            //$locationQuery = preg_replace("+"," ",$locationQuery);
            $locationQuery = preg_replace('/\+/', ' ', $locationQuery);

            $sql = "SELECT * FROM jobs WHERE city LIKE '%$locationQuery' OR state LIKE '%$locationQuery' ORDER BY date_created DESC";
            $result = mysqli_query($conn,$sql);
        }
        else{
            echo '<script type="text/javascript">alert("ERROR: both fields were empty");</script>';
        }

    }
}
else{//BIG IF

//IF there is a GET (meaning it came from the homepage)
if ( (!empty($_GET['job'])) || (!empty($_GET['location'])) ) {

    //IF the strings don't = nothing
    if ( ($_GET['job'] != '') && ($_GET['location'] != '') ) {
        
        $jobQuery = $_GET['job'];
        $locationQuery = $_GET['location'];

        //$jobQuery = preg_replace("#[^0-9a-z]#i","",$jobQuery); //Validation stuff
        //$locationQuery = preg_replace("#[^0-9a-z]#i","",$locationQuery); //Validation stuff
        
        $jobQuery = preg_replace('/\+/', ' ', $jobQuery);
        $locationQuery = preg_replace('/\+/', ' ', $locationQuery);

        $sql = "SELECT * FROM jobs WHERE title LIKE '%$jobQuery%' OR description LIKE '%$jobQuery%' OR skills LIKE '%$jobQuery%' OR city LIKE '%$locationQuery%' ORDER BY date_created DESC";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);

        if ($count == 0) { //If nothing was found or the search was not at least 3 characters:
                
            $output = "There were no search results. Please try something else.";
            echo '<p>'.$output.'</p>';
        }
    }

    //IF only a job was searched
    else if ( ($_GET['job'] != '') && ($_GET['location'] == '') ) {
        
        $jobQuery = $_GET['job'];

        //$jobQuery = preg_replace("#[^0-9a-z]#i","",$jobQuery); //Validation stuff
        $jobQuery = preg_replace('/\+/', ' ', $jobQuery);

        $sql = "SELECT * FROM jobs WHERE title LIKE '%$jobQuery%' OR description LIKE '%$jobQuery%' OR skills LIKE '%$jobQuery%' ORDER BY date_created DESC";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);
        
        if ($count == 0) { //If nothing was found or the search was not at least 3 characters:
                
            $output = "There were no search results. Please try something else.";
            echo '<p>'.$output.'</p>';
        }
    }

    //IF only a location was searched
    else if ( ($_GET['job'] == '') && ($_GET['location'] != '') ) {
        
        $locationQuery = $_GET['location'];

        //$locationQuery = preg_replace("#[^0-9a-z]#i","",$locationQuery); //Validation stuff
        //$locationQuery = preg_replace("+"," ",$locationQuery);
        $locationQuery = preg_replace('/\+/', ' ', $locationQuery);

        $sql = "SELECT * FROM jobs WHERE city LIKE '%$locationQuery' OR state LIKE '%$locationQuery' ORDER BY date_created DESC";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);
        
        if ($count == 0) { //If nothing was found or the search was not at least 3 characters:
                
            $output = "There were no search results. Please try something else.";
            echo '<p>'.$output.'</p>';
        }
    }
    else{
        echo '<script type="text/javascript">alert("ERROR: both fields were empty");</script>';
    }
}

//ELSE, meaning the job page is loading from the Jobs link in the navbar or somewhere else w/ no external search
else{
    $sql = "SELECT * FROM jobs ORDER BY date_created DESC";
    $result = mysqli_query($conn,$sql);
}

}//BIG IF

$jobLink = '#'; //Replace this w/ link to individual job page (if we make one)

$i = 1;

while ($row = mysqli_fetch_assoc($result)){ //Loops through every result that was returned
        
        $compName = $row['company_name'];
        $city = $row['city'];

        $companyLink = 'dashboard.php?profile='.$compName; //Takes you to the company profile
        $cityLink = 'jobs.php?job=&location='.$city; //Re-filters by city

        $description = $row['description'];
        $shortdesc = substr($description, 0, 200).'...';

        //First gets the date, then formats it
        $datePosted = $row['date_created'];
        $datePosted = strtotime($datePosted);
        $datePosted = date("F d, Y", $datePosted);

        $sql_u = "SELECT * FROM users WHERE display_name = '$compName'"; //Gets the data for the company so it can be shown
        $result_u = mysqli_query($conn,$sql_u);
        $row_u = mysqli_fetch_assoc($result_u);

        $compImg = $row_u['profile_pic'];

    echo'
    <div id="card'.$i.'">
        <div class="jobcard row mt-4 shadow pt-4 pb-2 roundedcard" id="'.$row['job_id'].'">
          
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

        </div>
    </div>';
        $i++;
}
?>