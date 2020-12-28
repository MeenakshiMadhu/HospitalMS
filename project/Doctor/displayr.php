<?php
  session_start();
  include '/Applications/XAMPP/xamppfiles/htdocs/project/db_connection.php';
  $conn = OpenCon();
  echo "Connected Successfully";


  $pID = $_POST['pu_id'];

$sql = "SELECT * FROM appointments WHERE pu_id='$pID' ;";

$results = mysqli_query($conn,$sql);
$num=mysqli_num_rows($results);

if(!$num){
  ?>
  <p><a href="DoctorMainPage.php">Go back to main page</a></p>
  <?php
	die('Patient ID does not exist. Enter correct ID' . mysqli_error($conn));
}

while($result = mysqli_fetch_array($results)){
	echo '<p> Appointment ID : ' . $result['app_id'] . '</p>';
	echo '<p> Appointment date/time : ' . $result['appdateTime'] . '</p>';
  echo '<p> Doctor ID : ' . $result['du_id'] . '</p>';
	echo '<p> Prescription : ' . $result['prescription'] . '</p>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Random Patient detailst</title>
</head>
<body>
  <p><a href="DoctorMainPage.php">Go back to main page</a></p>
</body>
</html>