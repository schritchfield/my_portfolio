<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
<?php session_start(); include 'db_connect.php';?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel ="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Clusterizr</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <a class="navbar-brand" href="index.php"><img src="img/Logo.png" alt="Clusterizr Logo" class="navlogo" /></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse navbar-right" id="navbarText">
        <ul class="nav navbar-nav navbar-right">
            
          <li class="nav-item">
            <a class="nav-link" href="jobs.php">Jobs</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="about.php">About Us</a>
          </li>
            
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
            <?php if(!empty($_SESSION['email'])){
              $sql= "SELECT * FROM users WHERE email = '".$_SESSION['email']."'"; 
              $result= mysqli_query ($conn, $sql); 
              while ($row = mysqli_fetch_assoc($result)){
              if($row['access'] == 'company'){
              ?>
          <li class="nav-item">
          <a class="post-job-btn" href="postjobs.php"><button class="btn btn-outline-success postjobbtnnav" type="button" style="margin-left: 16px;">Post a Job</button></a>
         
              <?php }}}else{
              ?>
                <a class="post-job-btn" href="login.php"><button class="btn btn-outline-success postjobbtnnav" type="button" style="margin-left: 16px;">Post a Job</button></a>
              <?php
              } ?>
               </li>  
               <li class="nav-item">
        
          <?php
          if(empty($_SESSION['email'])){
            ?>
            <li class="nav-item"><a class="nav-link" href="login.php">Sign In</a></li>
            <?php
          }else{
            $sql= "SELECT * FROM users WHERE email = '".$_SESSION['email']."'"; 
            $result= mysqli_query ($conn, $sql); 
            while ($row = mysqli_fetch_assoc($result)){
              if($row['access'] == 'company'){
                $display_name=$row['display_name'];
              }
              else{
                $display_name=$row['first_name'] . " " . $row['last_name'];
              }
            }
            ?>
            <li class="nav-item"><a class="nav-link" href="dashboard.php"><?php echo $display_name ?></a></li>
            <li class="nav-item"><a class="nav-link" href="signout.php"><?php echo "Sign Out" ?></a></li>
            <?php
          }
            
          ?>
        
        </li>
        </ul>

      </div>
  </nav>