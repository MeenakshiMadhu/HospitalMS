<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Schedule</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="tables.css" rel="stylesheet">
    <link href="p_style.css" rel="stylesheet">
  <!-- <style>
        table,
        td {
            background-color: #f2f2f2;
            border: black 1px solid;
            padding: 5px;
            padding-right: 7px;
        }
    </style> -->
    <style>
        .heading {
            display:    block;
        }
    </style>

</head>
<body>

<div class="container-login100" style="background-image: url('../images/image1.jpg');">

<?php
  include '/Applications/XAMPP/xamppfiles/htdocs/project/db_connection.php';
  $conn = OpenCon();
  //echo "Connected Successfully";
  //   echo "<br>";
  $today = new DateTime();
  $today->setTime(0,0);
  $today = $today->format('Y-m-d H:i:s');
  $tomorrow = new DateTime('tomorrow');
  $tomorrow->setTime(0,0);
  $tomorrow = $tomorrow->format('Y-m-d H:i:s');
  // echo $tomorrow;
  
  $dID = $_SESSION['curr_uid'];
  
  $sql = "SELECT A.app_id as 'Appointment ID', 
                A.appdateTime as 'Appointment Date & Time',
                A.pu_id as 'Patient ID', 
                U.uname as 'Patient Name',
                A.prescription as 'Prescription',  
                U.mobile_no as 'Mobile No.'
                FROM Appointments A, Users U 
                WHERE A.du_id ='$dID'AND A.pu_id=U.u_id AND A.appdateTime >='$today' AND A.appdateTime <='$tomorrow' 
                ORDER BY A.appdateTime;";

  
  $sql1 = "SELECT A.app_id as 'Appointment ID', 
             A.appdateTime as 'Appointment Date & Time',
            A.pu_id as 'Patient ID', 
            U.uname as 'Patient Name',
            A.prescription as 'Prescription',  
             U.mobile_no as 'Mobile No.'
            FROM Appointments A, Users U  
            WHERE A.du_id ='$dID'AND A.pu_id=U.u_id AND A.appdateTime >='$today' 
            ORDER BY A.appdateTime;";
  
  $results = mysqli_query($conn,$sql);
  $results1 = mysqli_query($conn,$sql1);
  $num=mysqli_num_rows($results);
  $num1=mysqli_num_rows($results1);

    //  echo "<div style='margin: auto; font-size:30px;'><br>Today's Schedule<br></div>";
?>
    <h2 style="width: 100%; color:black; margin-bottom: 0px; padding-bottom:0px;">TODAY'S SCHEDULE</h2>
<!-- <div>.</div> -->
<!-- <div class="heading">Today's Schedule</div> -->
<?php

    if($num >0)
            {
        
            echo "<table class='styled-table'><thead><tr>";
            while($row = $results->fetch_assoc())
            {
                foreach($row as $cname=>$cvalue)
                {
                    echo "<th>".$cname."</th>";
                }
                echo "</tr></thead>";
                break;
            }
            $results = $conn->query($sql);
            echo "<tbody>";
            while($row = $results->fetch_assoc())
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
            ?>
                <h5 style="width: 100%; color:black; margin-bottom: 0px; padding-bottom:0px;">No appointments for today!</h5>
            <?php
          }

    // echo "<div style='margin: auto; font-size:30px;'>Upcoming Schedule<br></div>";
    // echo "<br>";
    ?>
    <h2 style="width: 100%; color:black; margin-bottom: 0px; padding-bottom:0px;">UPCOMING SCHEDULE</h2>
    <?php

    if($num1 >0)
            {
        
            echo "<table class='styled-table'><thead><tr>";
            while($row1 = $results1->fetch_assoc())
            {
                foreach($row1 as $cname=>$cvalue)
                {
                    echo "<th>".$cname."</th>";
                }
                echo "</tr></thead>";
                break;
            }
            $results1 = $conn->query($sql1);
            echo "<tbody>";
            while($row1 = $results1->fetch_assoc())
            {
                echo "<tr>";
                foreach($row1 as $cname => $cvalue)
                {
                    echo "<td>".$row1[$cname]."</td>";
                }
                echo "</tr>";
            }
            echo "</tbody></table>";
        }
        else {
            ?>
            <h4 style="width: 100%; margin-bottom: 0px; padding-bottom:0px;">No upcoming appointments!</h4>
            <?php
          }

        mysqli_close($conn);
        ?>

  </div>

  <div class="container-login100-form-btn" style="margin-top: -40;">
            <form action="../Doctor/DoctorMainPage.php" method="post">
                <input class="login100-form-btn button" style="font-size: 20px;" type ="submit" value="Go Back">
            </form>
        </div>
</body>
</html>