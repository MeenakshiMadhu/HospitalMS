<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cancel Appointment</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="doctor_style.css" rel="stylesheet">
</head>
<body>
  <div class="limiter">
    <div class="container-login100" style="background-image: url('../images/image1.jpg');">
      <?php
        include '/Applications/XAMPP/xamppfiles/htdocs/project/db_connection.php';
        $conn = OpenCon();
         //echo "Connected Successfully";

        $app_id = $_POST['app_id'];

        $sql = "SELECT * FROM Appointments WHERE app_id ='$app_id';";

        $results = mysqli_query($conn,$sql);
        $num=mysqli_num_rows($results);

        if(!$num){
        ?>
        <div class="card-deck" style="margin: 120 20 -100 20;">
        <div class="card">
            <div class="card-body" align="center">
              <h4 class="card-title">Appointment ID does not exist. Enter correct ID</h4>
              <form action="cancelappointment.php" method="post">
              <input class="login100-form-btn button" style="font-size: 20px;" type ="submit" value="Go Back">
              </form>
            </div>
        </div>
        </div>
      <!-- <p><a href="cancelappointment.php">Go back</a></p> -->

      <?php
        die('' . mysqli_error($conn));
        }

        $sql1 = "DELETE FROM Appointments WHERE app_id ='$app_id';";

        $results1 = mysqli_query($conn,$sql1);

        if(!$results1){
          die('Invalid ID . Enter existing Appointment ID' . mysqli_error($conn));
        }
        else
      ?>
      <div class="card-deck" style="margin: 120 20 -100 20;">
        <div class="card" align="center">
            <div class="card-body">
              <h4 class="card-title">Succesfully cancelled Appointment</h4>
              <form action="cancelappointment.php" method="post">
              <input class="login100-form-btn button" style="font-size: 20px;" type ="submit" value="Go Back">
              </form>
            </div>
        </div>
        </div>

      <?php

        // echo '<p> Succesfully cancelled Appointment </p>';
          
        mysqli_close($conn);
      ?>
      <!-- <p><a href="DoctorMainPage.php">Go back to main page</a></p> -->
    </div>
  </div>
</body>
</html>
