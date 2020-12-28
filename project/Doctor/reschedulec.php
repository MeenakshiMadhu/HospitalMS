<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reschedule Appointment</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="doctor_style.css" rel="stylesheet">
</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('../images/image1.jpg');">
      <?php
        include '../db_connection.php';
        $conn = OpenCon();
         //echo "Connected Successfully";

        $app_id = $_POST['app_id'];
        $appdateTime = $_POST['appdateTime'];
         
        $sql = "SELECT * FROM appointments WHERE app_id ='$app_id';";
         
        $results = mysqli_query($conn,$sql);
        $num=mysqli_num_rows($results);

        if(!$num){
      ?>
        <div class="card-deck" style="margin: 120 20 -100 20;">
          <div class="card">
            <div class="card-body" align="center">
              <h4 class="card-title">Appointment ID does not exist. Enter correct ID</h4>
              <form action="rescheduleappointment.php" method="post">
                <input class="btn btn-outline-info btn-sm" style="font-size: 20px;" type ="submit" value="Go Back">
              </form>
            </div>
          </div>
        </div>
      <?php
        die('' . mysqli_error($conn));
        }

        $sql1 = "UPDATE appointments SET appdateTime = '$appdateTime' WHERE app_id = '$app_id';";
        
        $results1 = mysqli_query($conn,$sql1);
        if(!$results1){
          die('invalid ID' . mysqli_error($conn));
        }
        else{
      ?>
        <div class="card-deck" style="margin: 120 20 -100 20;">
          <div class="card">
            <div class="card-body" align="center">
              <h4 class="card-title">Succesfully rescheduled appointment!</h4>
              <form action="rescheduleappointment.php" method="post">
                <input class="btn btn-outline-success btn-sm" style="font-size: 20px;" type ="submit" value="Go Back">
              </form>
            </div>
          </div>
        </div>

      <?php
        }
        mysqli_close($conn);
      ?>
    </div>
</div>
<!-- <p><a href="DoctorMainPage.php">Go back to main page</a></p> -->
</body>
</html>
