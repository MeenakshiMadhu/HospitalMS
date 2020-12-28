<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cancel Appointment</title>
</head>
<body>

<?php
  include '/Applications/XAMPP/xamppfiles/htdocs/project/db_connection.php';
  $conn = OpenCon();
  echo "Connected Successfully";


$app_id = $_POST['app_id'];

$sql = "SELECT * FROM Appointments WHERE app_id ='$app_id';";

$results = mysqli_query($conn,$sql);
$num=mysqli_num_rows($results);

if(!$num){
    ?>
	<p><a href="cancelappointment.php">Go back</a></p>
	<?php
	die('Appointment ID does not exist. Enter correct ID' . mysqli_error($conn));
}

$sql1 = "DELETE FROM Appointments WHERE app_id ='$app_id';";

$results1 = mysqli_query($conn,$sql1);

if(!$results1){
	die('invalid ID . Enter existing Appointment ID' . mysqli_error($conn));
}
else
   echo '<p> Succesfully cancelled Appointment </p>';
	
mysqli_close($conn);
?>
<p><a href="DoctorMainPage.php">Go back to main page</a></p>
</body>
</html>
