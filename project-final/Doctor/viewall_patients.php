<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All patients</title>
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
</head>
<body>
    <div class="container-login100" style="background-image: url('../images/image1.jpg');">
        <nav id="header" class="navbar" >
            <div class="logo" style="margin: 80 0 0 30; font-size: 60px;">Patient Details
            </div>
        </nav>
        <div style="margin: 50 0 0 0;">
        <?php
            include '/Applications/XAMPP/xamppfiles/htdocs/project/db_connection.php';
            $conn = OpenCon();
            // echo "Connected Successfully";
            $dID = $_SESSION['curr_uid'];

            $sql = "SELECT A.pu_id as 'Patient ID', U.uname as 'Patient Name', U.mobile_no as 'Mobile No.', A.appdateTime as 'Appointment Date and Time', A.prescription as 'Prescription' FROM Appointments A, Users U WHERE A.du_id ='$dID'AND A.pu_id=U.u_id;";

            $results = mysqli_query($conn,$sql);
            $num=mysqli_num_rows($results);
                        
            if($num >0)
            {
        
            echo "<table class='styled-table'><thead><tr>";
            while($row = $results->fetch_assoc())
            {
                foreach($row as $cname=>$cvalue)
                {
                    echo "<th>".$cname."</th>";
                }
                echo "</thead></tr></div>";
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
            echo "<div style='padding-left:60px;'>"."No patients!<br></div>";
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
