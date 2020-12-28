<?php
  session_start();
  include 'E:/xampp1/htdocs/DBMS-Project/login/db_connection.php';
  $conn = OpenCon();
  echo "Connected Successfully";

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
  <div class="container-login100" style="background-image: url('images/image1.jpg');">

    <nav id="header" class="navbar">
      <div class="logo" style="margin: 100 0 0 40; font-size: 60px;">Doctor Navigation Menu</div>
    </nav>
  
      <!-- <p>Welcome Doctor <?php echo $_SESSION["uname"]; ?>.</p>
      <p>Your ID : <?php echo $_SESSION["u_id"]; ?>. </p>
      <br> -->
    <div class="card-deck" style="margin: 120 20 -100 20;">
      <div class="row">
        <div class="card col-lg-4 mb-4">
          <div class="card-body">
            <form action="viewall_patients.php" method="post">
              <h3 class="card-title">View all patients</h3>
              <input class="btn btn-outline-success btn-sm" type ="submit" value="Go" style="font-size: 20px;">
            </form>
          </div>
        </div>
        <div class="card col-lg-4 mb-4">
          <div class="card-body">
            <form action="viewschedule.php" method="post">
              <h3 class="card-title">View scheduled appointments.</h3>
              <input class="btn btn-outline-success btn-sm" type ="submit" value="Go" style="font-size: 20px;">
            </form>
          </div>
        </div>
        <div class="card col-lg-4 mb-4">
          <div class="card-body">
            <form action="viewall_patients.php" method="post">
              <h3 class="card-title">View all patients</h3>
              <input class="btn btn-outline-success btn-sm" type ="submit" value="Go" style="font-size: 20px;">
            </form>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="card col-lg-4 mb-4">
          <div class="card-body">
            <form action="viewall_patients.php" method="post">
              <h3 class="card-title">View all patients</h3>
              <input class="btn btn-outline-success btn-sm" type ="submit" value="Go" style="font-size: 20px;">
            </form>
          </div>
        </div>
        <div class="card col-lg-4 mb-4">
          <div class="card-body">
            <form action="viewall_patients.php" method="post">
              <h3 class="card-title">View all patients</h3>
              <input class="btn btn-outline-success btn-sm" type ="submit" value="Go" style="font-size: 20px;">
            </form>
          </div>
        </div>
        <div class="card col-lg-4 mb-4">
          <div class="card-body">
            <form action="viewall_patients.php" method="post">
              <h3 class="card-title">View all patients</h3>
              <input class="btn btn-outline-success btn-sm" type ="submit" value="Go" style="font-size: 20px;">
            </form>
          </div>
        </div>
      </div>
      
      

    </div>
      <!-- <!-- <p>Click here to <a href="viewall_patients.php">view all patients.</a></p> -->
      <p>Click here to <a href="viewschedule.php">view scheduled appointments.</a></p>
      <p>Click here to <a href="display_specific_patient.php">view specific patient under you.</a></p>
      <p>Click here to <a href="display_random_patient.php">view other specific patient.</a></p>
      <p>Click here to <a href="update_patient_record.php">update existing patient record.</a></p>
      <p>Click here to <a href="rescheduleappointment.php">reschedule appointment.</a></p>
      <p>Click here to <a href="cancelappointment.php">cancel appointment.</a></p> -->

      Click here to <a href="/DBMS-Project/login/logout.php" title="Logout">Logout.

  </div>
</body>
</html>
