<?php include 'header.php'; ?>

<div class="container-big mt-4">
  <div class = "row">
    <div class = "col-lg-3 mb-4">
        <div class = "innercolumn roundedcard shadow" style="height:50vh;">
          <h5>Message Center</h5>
          <?php
            $sql= "SELECT * FROM follows WHERE user_email = '".$_SESSION['email']."'"; 
            $result= mysqli_query ($conn, $sql); 
            while ($row = mysqli_fetch_assoc($result)){
              $sql_u = "SELECT * FROM users WHERE display_name = '".$row['followed_displayName']."'";
              $result_u = mysqli_query($conn,$sql_u);
              $row_u = mysqli_fetch_assoc($result_u);
              if($row_u['access']=='seeker'){
                echo "<div class='messageOption'><h6>" . $row_u['first_name'] . " " . $row_u['last_name'] . "</h6></div>";
              }
            }
          ?>
        </div>
    </div>
    <div class = "col-lg-6 mb-4">
        <div class = "innercolumn roundedcard shadow" style="height:90vh;margin-top:4%!important;">
          
        </div>
    </div>
    <div class = "col-lg-3 mb-4">
        <div class = "innercolumn roundedcard shadow" style="height:50vh;">
          <h5>Professional Correspondence</h5>
        </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>
