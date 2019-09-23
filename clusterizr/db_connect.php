<?php
  $conn = mysqli_connect("students.cah.ucf.edu", "dig4104c_group08", "Knights125!#", "dig4104c_group08");
  if ($conn-> connect_error){
    die("Connection Failed". $conn-> connect_error);
  }
?>