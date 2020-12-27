<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updated Records</title>
</head>
<body>

<?php
  include 'E:/xampp1/htdocs/DBMS-Project/login/db_connection.php';
    $conn = OpenCon();
    echo "Connected Successfully";

    $app_id = $_POST['app_id'];
    $presc = $_POST['presc'];

    $sql = "SELECT * FROM appointments WHERE app_id ='$app_id';";

    $results = mysqli_query($conn,$sql);
    $num=mysqli_num_rows($results);

    if(!$num){
	?>
	<p><a href="">Go back</a></p>
	<?php
	die('Appointment ID does not exist. Enter correct ID' . mysqli_error($conn));
    }

    $sql1 = "UPDATE appointments
    SET prescription = '$presc'
    WHERE app_id = '$app_id';";

    $results1 = mysqli_query($conn,$sql1);
    if(!$results1){
        die('invalid' . mysqli_error($conn));
    }
    else
    {   echo '<p> Succesfully updated</p>';
        echo '<p> Updated patient records - </p>'; 
    }
    mysqli_close($conn);

    ?>
    <p><a href="doctor_mainpage.php">Go back to main page</a></p>
</body>
</html>
