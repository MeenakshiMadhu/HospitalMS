<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Schedule</title>
  <style>
        table,
        td {
            background-color: #f2f2f2;
            border: black 1px solid;
            padding: 5px;
            padding-right: 7px;
        }
    </style>
    <!-- <link rel="stylesheet" type="text/css" href="DBMS-Project/style.css"> -->
</head>
<body>

<?php
  include 'E:/xampp1/htdocs/DBMS-Project/login/db_connection.php';
  $conn = OpenCon();
  echo "Connected Successfully";
  echo "<br>";

//   $datetime = new DateTime();
//   $timezone = new DateTimeZone('Europe/Bucharest');
//   $datetime->setTimezone($timezone);
//   $datetime->add(new DateInterval('PT3H30M'));
//   $currentdateTime = $datetime->format('Y-m-d H:i:s');
// //   $date = $datetime->format('Y-m-d '."00:00:00");
// //   echo $currentdateTime;
// //   echo $date;

$today = new DateTime();
$today->setTime(0,0);
$today = $today->format('Y-m-d H:i:s');
$tomorrow = new DateTime('tomorrow');
$tomorrow->setTime(0,0);
$tomorrow = $tomorrow->format('Y-m-d H:i:s');
// echo $tomorrow;

$dID = $_SESSION['u_id'];

$sql = "SELECT A.app_id, A.pu_id, A.du_id, A.appdateTime, A.prescription, U.uname, U.mobile_no FROM Appointments A, Users U WHERE A.du_id ='$dID'AND A.pu_id=U.u_id AND A.appdateTime >='$today' AND A.appdateTime <='$tomorrow' ORDER BY A.appdateTime;";

$sql1 = "SELECT A.app_id, A.pu_id, A.du_id, A.appdateTime, A.prescription, U.uname, U.mobile_no FROM Appointments A, Users U WHERE A.du_id ='$dID'AND A.pu_id=U.u_id AND A.appdateTime >='$today' ORDER BY A.appdateTime;";

$results = mysqli_query($conn,$sql);
$results1 = mysqli_query($conn,$sql1);
$num=mysqli_num_rows($results);
$num1=mysqli_num_rows($results1);

?>
<h2>Today's Schedule</h2>

<?php
if($num) {
    ?>
    <table>
                <thead>
                    <tr>
                        <td>Appointment ID</td>
                        <td>Appointment Date & Time</td>
                        <td>Patient ID</td>
                        <td>Patient Name</td>
                        <td>Mobile Num.</td>
                        <td>Prescription</td>
                    </tr>
                </thead>
                <tbody>
    <?php
    while ($row = mysqli_fetch_array($results)) {
        ?>
                    <tr>
                        <td><?php echo $row['app_id']; ?> </td>
                        <td><?php echo $row['appdateTime']; ?> </td>
                        <td><?php echo $row['pu_id']; ?> </td>
                        <td><?php echo $row['uname']; ?> </td>
                        <td><?php echo $row['mobile_no']; ?> </td>
                        <td><?php echo $row['prescription']; ?> </td>
                    </tr>
    <?php
    }
    ?>
                </tbody>
            </table>
    <?php
}
else {
        echo "No appointments for today!<br>";
}

?>
<h2>Upcoming Schedule</h2>
<?php

if($num1){
    ?>
    <table>
                <thead>
                    <tr>
                        <td>Appointment ID</td>
                        <td>Appointment Date & Time</td>
                        <td>Patient ID</td>
                        <td>Patient Name</td>
                        <td>Mobile Num.</td>
                        <td>Prescription</td>
                    </tr>
                </thead>
                <tbody>
    <?php
    while ($row = mysqli_fetch_array($results1)) {
        ?>
                    <tr>
                        <td><?php echo $row['app_id']; ?> </td>
                        <td><?php echo $row['appdateTime']; ?> </td>
                        <td><?php echo $row['pu_id']; ?> </td>
                        <td><?php echo $row['uname']; ?> </td>
                        <td><?php echo $row['mobile_no']; ?> </td>
                        <td><?php echo $row['prescription']; ?> </td>
                    </tr>
    <?php
    }
    ?>
                </tbody>
            </table>
    <?php
}
else {
    echo "No upcoming appointments!<br>";
    ?>
    <p><a href="doctor_mainpage.php">Go back to main page</a></p>
    <?php
    die('' . mysqli_error($conn));
}
	
mysqli_close($conn);
?>
<p><a href="doctor_mainpage.php">Go back to main page</a></p>
</body>
</html>