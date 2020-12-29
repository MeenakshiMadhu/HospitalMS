<?php
    session_start();
    include '/Applications/XAMPP/xamppfiles/htdocs/project/db_connection.php';
    include '/Applications/XAMPP/xamppfiles/htdocs/project/create_tables.php';
    $conn = OpenCon();
    // echo "Connected Successfully";

    // $sql = "CREATE TABLE Appointments (
    //   app_id VARCHAR(30) NOT NULL PRIMARY KEY,
    //   au_id VARCHAR(30) NOT NULL,
    //   pu_id VARCHAR(30) NOT NULL,
    //   du_id VARCHAR(30) NOT NULL,

    //   appdateTime DATETIME NOT NULL,
    //   prescription VARCHAR(30),

    //   CONSTRAINT FOREIGN KEY (au_id) REFERENCES Admins(au_id),
    //   CONSTRAINT FOREIGN KEY (pu_id) REFERENCES Patients(pu_id),
    //   CONSTRAINT FOREIGN KEY (du_id) REFERENCES Doctors(du_id)
    //   )";

    // obtain values for table
      // form handling
      $app_id = "";
      $au_id = $_SESSION["au_id"];
      $pu_id = "";
      $du_id = "";
      
      $appdateTime = "";
      $prescription = "";
      
      
      //assign values to variables
      if ( isset($_POST["app_id"]) ){
        $app_id = $_POST["app_id"];
      }
      // if ( isset($_POST["au_id"]) ){
      //       $au_id = $_POST["au_id"];
      // }
      if ( isset($_POST["pu_id"]) ){
            $pu_id = $_POST["pu_id"];
      }
      if ( isset($_POST["du_id"]) ){
            $du_id = $_POST["du_id"];
      }
      if ( isset($_POST["appdateTime"]) ){
            $appdateTime = $_POST["appdateTime"];
      }
      if ( isset($_POST["prescription"]) ){
            $prescription = $_POST["prescription"];
      }
          
      $prescription = str_replace("'", "''", $prescription);

    if(!empty($_POST["app_id"]))    
    {
      // insert values into table
      $sqlInsert = "INSERT INTO Appointments (app_id, au_id, pu_id, du_id, appdateTime, prescription)
                     VALUES ('$app_id', '$au_id', '$pu_id', '$du_id', '$appdateTime', '$prescription'
                    )";

      if($conn->query($sqlInsert) === TRUE) {
        $lastRecord = $conn->insert_id;
        $message = "New appointment created";
        //echo "<br><br>New record created successfully. Last inserted ID : ".$lastRecord;

        $_SESSION['mindex'] = $_SESSION['mindex'] + 1;
        $maction = "Scheduled appointment ".$app_id.".";

        log_in_manages($conn, $_SESSION['mindex'], $_SESSION["au_id"], $maction);

      }
      else {
        $message = "ERROR: <br>".$conn->error;
        //echo "<br><br>Error : ".$sqlInsert."<br>".$conn->error;
      }
    }
    CloseCon($conn);
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Appointment</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="managepages_style.css" rel="stylesheet">
</head>
<style>
    body {
        animation: fadeInAnimation ease 0.7s;
        animation-iteration-count: 1;
        animation-fill-mode: forwards;
    }

    @keyframes fadeInAnimation {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    section {
        text-align: center;
    }
</style>
<body>
  <div class="limiter">
    <div class="container-login100" style="background-image: url('image1.jpg');">
      <div class="card-deck" style="margin: 120 20 -100 20;">
        <div class="card">
            <div class="card-body">
              <h2 align="center">Enter Appointment Details</h2>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  <div>
                    <?php if(isset($message)) { echo "<div style='color: red; padding-bottom: 20px;'>".$message."</div>"; } ?>
                  </div>
                  <h5 class="card-title">Appointment ID</h5>
                  <input class="input100" style="color:black; width: 500px; margin-bottom:15px"  type="text" name="app_id" placeholder="Appointment ID" required> <br>

                  <h5 class="card-title">Patient UserID</h5>
                  <input class="input100" style="color:black; width: 500px; margin-bottom:15px" type="text" name="pu_id" placeholder="PXXX" required> <br>

                  <h5 class="card-title">Doctor UserID</h5>
                  <input class="input100" style="color:black; width: 500px; margin-bottom:15px" type="text" name="du_id" placeholder="DXXX" required> <br>

                  <h5 class="card-title">Appointment Date/Time:</h5>
                  <input class="input100" style="color:black; width: 500px; margin-bottom:15px" name="appdateTime" placeholder="DateTime" type="datetime-local" required> <br>

                  <h5 class="card-title">Prescription Given:</h5>
                  <input class="input100" style="color:black; width: 500px; margin-bottom:15px" type="text" name="prescription" placeholder="prescription" size=50> <br>
                  
                  
                  <input class="btn btn-outline-success btn-sm" type ="submit" value="Go" style="font-size: 20px; margin-top: 10px; width: 250px; margin-bottom:15px"> <br>

                </form>
            </div>
        </div>
      </div>
      <div class="container-login100-form-btn" style="margin-top:1;">
          <form action="../AdminMainPage.php" method="post">
          <input class="login100-form-btn button" style="font-size: 20px;" type ="submit" value="Go Back">
          </form>
      </div>
    </div>
    
    </div>

</body>
</html>