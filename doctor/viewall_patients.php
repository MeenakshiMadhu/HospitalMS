<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All patients</title>
  <style>
        table,
        td {
            background-color: #f2f2f2;
            border: black 1px solid;
            padding: 5px;
            padding-right: 7px;
        }
    </style>
</head>
<body>

<?php
  include 'E:/xampp1/htdocs/DBMS-Project/login/db_connection.php';
  $conn = OpenCon();
  echo "Connected Successfully";

  $dID = $_SESSION['u_id'];

$sql = "SELECT A.app_id, A.pu_id, A.du_id, A.appdateTime, A.prescription, U.uname, U.mobile_no FROM Appointments A, Users U WHERE A.du_id ='$dID'AND A.pu_id=U.u_id;";

$results = mysqli_query($conn,$sql);
$num=mysqli_num_rows($results);

if(!$num){
    ?>
	<p><a href="doctor_mainpage.php">Go back to main page.</a></p>
	<?php
	die('No patients!' . mysqli_error($conn));
}

else
{
    ?>
    <table>
                <thead>
                    <tr>
                        <td>Patient ID</td>
                        <td>Name</td>
                        <td>Mobile Num.</td>
                        <td>Appointment Date & Time</td>
                        <td>Prescription</td>
                    </tr>
                </thead>
                <tbody>
    <?php
    while ($row = mysqli_fetch_array($results)) {
        ?>
                    <tr>
                        <td><?php echo $row['pu_id']; ?> </td>
                        <td><?php echo $row['uname']; ?> </td>
                        <td><?php echo $row['mobile_no']; ?> </td>
                        <td><?php echo $row['appdateTime']; ?> </td>
                        <td><?php echo $row['prescription']; ?> </td>
                    </tr>
    <?php
    }
    ?>
                </tbody>
            </table>
    <?php
}
	
mysqli_close($conn);
?>
<p><a href="doctor_mainpage.php">Go back to main page</a></p>
</body>
</html>