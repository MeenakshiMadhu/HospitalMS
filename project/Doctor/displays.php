<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Specific Patient detailst</title>
</head>
<body>

<?php
  include '/Applications/XAMPP/xamppfiles/htdocs/project/db_connection.php';
  $conn = OpenCon();
  echo "Connected Successfully";

$dID = $_SESSION['curr_uid'];
$pID = $_POST['pu_id'];

$sql = "SELECT * FROM appointments WHERE du_id ='$dID' AND pu_id='$pID' ;";

$results = mysqli_query($conn,$sql);
$num=mysqli_num_rows($results);

if(!$num){
  ?>
  <p><a href="DoctorMainPage.php">Go back to main page</a></p>
  <?php
  die('Patient ID does not exist. Enter correct ID' . 
  mysqli_error($conn));
}

while($result = mysqli_fetch_array($results)){
	echo '<p> Appointment ID : ' . $result['app_id'] . '</p>';
	echo '<p> Appointment date/time : ' . $result['appdateTime'] . '</p>';
	echo '<p> Prescription : ' . $result['prescription'] . '</p>';
}
?>

  <p><a href="DoctorMainPage.php">Go back to main page</a></p>
</body>
</html>