<?php
  session_start();
  include 'E:/xampp1/htdocs/DBMS-Project/login/db_connection.php';
  $conn = OpenCon();
  echo "Connected Successfully";

?>

<html>
<head>
<title>Doctor Main Page</title>
</head>
<body>

  <br>Welcome Doctor <?php echo $_SESSION["uname"]; ?>. <br>
  Your ID : <?php echo $_SESSION["u_id"]; ?>. <br><br>

  <p>Click here to <a href="viewall_patients.php">view all patients.</a></p>
  <p>Click here to <a href="viewschedule.php">view scheduled appointments.</a></p>
  <p>Click here to <a href="display_specific_patient.php">view specific patient under you.</a></p>
  <p>Click here to <a href="display_random_patient.php">view other specific patient.</a></p>
  <p>Click here to <a href="update_patient_record.php">update existing patient record.</a></p>
  <p>Click here to <a href="rescheduleappointment.php">reschedule appointment.</a></p>
  <p>Click here to <a href="cancelappointment.php">cancel appointment.</a></p>

  Click here to <a href="/DBMS-Project/login/logout.php" title="Logout">Logout.

</body>
</html>
