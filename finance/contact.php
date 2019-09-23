<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Raleway|Staatliches" rel="stylesheet">

    <!-- Bootstrap CSS -->

  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">

    <title>ExpensEZ</title>
</head>
<body class="raleway">

<?php 
    include("db_connect.php");
    include("calculations.php");
    include("nav.php");
?>

<div id="mainhead" class="jumbotron mb-0" style="background-image: url(img/banner.jpg);">
  <div class="container">
        <img src="img/logo.png" class="mx-auto img-fluid" alt="logo">
        <hr class="my-4">
        <p>Please leave a brief message of you have any comments, concerns or suggestions.</p>
  </div>
</div>

<div class="container">

<form class="text-center border border-light p-5">
    <p class="h4 mb-4">Contact us</p>

    <input type="text" id="guestname" class="form-control mb-4" placeholder="Name">

    <input type="email" id="mailaddress" class="form-control mb-4" placeholder="E-mail">

    <label>Subject</label>
    <select class="browser-default custom-select mb-4">
        <option value="" disabled>Choose option</option>
        <option value="1" selected>Feedback</option>
        <option value="2">Bug reports</option>
        <option value="3">Account issues</option>
    </select>

    <div class="form-group">
        <textarea class="form-control rounded-0" id="messagetext" rows="3" placeholder="Message"></textarea>
    </div>
    <input class="btn btn-info btn-block" type="submit" value="Submit">

</form>

</div>

<?php
    include("footer.php");
?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>

<?php

//Wasn't able to really test this much due to server issues. 

if (isset($_POST["guestname"]) && isset($_POST["mailaddress"]) && isset($_POST["messagetext"])) 
{
    $guestname = $_POST["guestname"];
    $mailaddress = $_POST["mailaddress"];
    $messagetext = $_POST["messagetext"];
    
    if (!empty($guestname) && !empty($mailaddress) && !empty($messagetext)) 
    {
    
        $to = "bschritchfield@knights.ucf.edu";
        $subject =  "Message from ExpensEZ";
        $body = $guestname."\n\n".$messagetext;
        $headers = "from: ".$mailaddress;

        mail($to, $subject, $body, $headers);
        echo "Thanks for the comment.";
    } 
    
    else{
        echo "Please fill out all fields.";
        }
}
?>        