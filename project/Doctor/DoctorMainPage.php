<?php
  session_start();
  include 'E:/xampp1/htdocs/DBMS-Project/project/db_connection.php';
  $conn = OpenCon();
  //echo "Connected Successfully";

?>

<html>
<head>
  <title>Doctor Main Page</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="doctor_style.css" rel="stylesheet">
</head>
<body>
  <div class="container-login100" style="background-image:url('../images/image1.jpg');">
    <nav id="header" class="navbar">
      <div class="logo" style="margin: 50 0 0 40; font-size: 60px;">Doctor Navigation Menu</div>
    </nav>

    <div class="card-deck" style="margin: 120 20 -100 20;">

      <div class="card">
        <div class="card-body">
          <form action="viewall_patients.php" method="post">
                <h3 class="card-title">View All Patients</h3>
                <input class="btn btn-outline-success btn-sm" type ="submit" value="Go" style="font-size: 20px;">
          </form>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <form action="display_specific_patient.php" method="post">
                <h3 class="card-title">View Specific Patients under you</h3>
                <input class="btn btn-outline-success btn-sm" type ="submit" value="Go" style="font-size: 20px;">
          </form>
        </div>
      </div>
    </div>

    <div class="card-deck" style="margin: 120 20 -100 20;">
      <div class="card">
        <div class="card-body">
          <form action="viewschedule.php" method="post">
                <h3 class="card-title">View Scheduled Appointments</h3>
                <input class="btn btn-outline-success btn-sm" type ="submit" value="Go" style="font-size: 20px;">
          </form>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <form action="display_random_patient.php" method="post">
                <h3 class="card-title">View Patient Details not under you</h3>
                <input class="btn btn-outline-success btn-sm" type ="submit" value="Go" style="font-size: 20px;">
          </form>
        </div>
      </div>
    </div>

    <div class="card-deck" style="margin: 120 20 -100 20;">
      <div class="card">
        <div class="card-body">
          <form action="update_patient_record.php" method="post">
                <h3 class="card-title">Update Patient Prescription</h3>
                <input class="btn btn-outline-success btn-sm" type ="submit" value="Go" style="font-size: 20px;">
          </form>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <form action="rescheduleappointment.php" method="post">
                <h3 class="card-title">Reschedule Appointments</h3>
                <input class="btn btn-outline-success btn-sm" type ="submit" value="Go" style="font-size: 20px;">
          </form>
        </div>
      </div>
    </div>


    <div class="card-deck" style="margin: 120 20 -100 20;">

      <div class="card">
        <div class="card-body">
          <form action="cancelappointment.php" method="post">
                <h3 class="card-title">Cancel Appointments</h3>
                <input class="btn btn-outline-success btn-sm" type ="submit" value="Go" style="font-size: 20px;">
          </form>
        </div>
      </div>
    </div>

    <div class="container-login100-form-btn" style="margin-top: 150;">
      <form action="../i.php" method="post">
        <input class="login100-form-btn button" style="font-size: 20px;" type ="submit" value="Go Back">
      </form>
    </div>
  </div>

</body>
</html>
