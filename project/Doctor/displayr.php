<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Specific Patient detailst</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="tables.css" rel="stylesheet">
    <link href="p_style.css" rel="stylesheet">
</head>
<body>

<div class="container-login100" style="background-image: url('../images/image1.jpg');">
			<nav id="header" class="navbar">
				<div class="logo" style="margin: 80 0 0 30; font-size: 60px;">Specific Patient History</div>
      </nav>
      <div style="margin: 50 0 0 0;">
        <?php
        include 'E:/xampp1/htdocs/DBMS-Project/project/db_connection.php';
        $conn = OpenCon();
        // echo "Connected Successfully";

        $dID = $_SESSION['curr_uid'];
        $pID = $_POST['pu_id'];

        $sql1 = "SELECT U.uname as 'Patient Name' FROM Users U WHERE U.u_id='$pID' ;";
        $results1 = mysqli_query($conn,$sql1);
        $row1 = mysqli_fetch_array($results1);

        $sql = "SELECT 
                A.app_id as 'Appointment ID',
                A.appdateTime as 'Appointment Date and Time', 
                A.du_id as 'Doctor ID',
                /*A.pu_id as 'Patient ID', 
                U.uname as 'Patient Name',*/ 
                U.mobile_no as 'Mobile No.', 
                A.prescription as 'Prescription' 
                FROM Appointments A, Users U 
                WHERE A.pu_id=U.u_id AND A.pu_id='$pID'";

        $results = mysqli_query($conn,$sql);
        $num=mysqli_num_rows($results);
        $row = mysqli_fetch_array($results);

        if($num >0) {
          echo "<div style='margin: auto; font-size:20px;'>"."Patient ID : ".$pID."<br>Patient Name : ".$row1['Patient Name']."</div>";

          echo "<table class='styled-table'><thead><tr>";
					while($row = $results->fetch_assoc() )
					{
						foreach($row as $cname => $cvalue)
						{
							echo "<th>".$cname."</th>";
						}
						echo "</tr></thead>";
						break;
					}
					$results = $conn->query($sql);

					echo "<tbody>";
					while($row = $results->fetch_assoc() )
					{
						echo "<tr>";
						foreach($row as $cname => $cvalue)
						{
	        				echo "<td>".$row[$cname]."</td>";
	    				}
	    				echo "</tr>";
					}
					echo "</tbody></table>";
        }

        else {
          echo "<div style='margin: auto; font-size:30px;'>"."0 records<br></div>";
        }
				$conn->close();
    ?>
    </div>
    <div class="container-login100-form-btn" style="margin-top: -40;">
      		<form action="display_random_patient.php" method="post">
     			<input class="login100-form-btn button" style="font-size: 20px;" type ="submit" value="Go Back">
    		</form>
  		</div>

</body>
</html>
