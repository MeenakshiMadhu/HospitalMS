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
        echo "<br><br>New record created successfully. Last inserted ID : ".$lastRecord;

        $_SESSION['mindex'] = $_SESSION['mindex'] + 1;
        $maction = "Scheduled appointment ".$app_id.".";

        log_in_manages($conn, $_SESSION['mindex'], $_SESSION["au_id"], $maction);

      }
      else {
        echo "<br><br>Error : ".$sqlInsert."<br>".$conn->error;
      }
    }
    CloseCon($conn);
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Enter Appointment Details</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <!-- use get if you dont mind the value being in url, post hides the passed data from the url -->
            <!-- use REQUEST in the event that you ahve no idea what the data is like, eg if there are many forms in your html code -->
                    <!-- ..., by defaultit contains the contents of GET, POST, and COOKIE as well -->
        Appointment ID:    <input type="text" name="app_id" placeholder="Appointment ID" required>
        <br>
        <!-- Admin UserID:    <input type="text" name="au_id" placeholder="AXXX" required>
        <br> -->
        Patient USerID:    <input type="text" name="pu_id" placeholder="PXXX" required>
        <br>
        Doctor UserID:    <input type="text" name="du_id" placeholder="DXXX" required>
        <br>
        Appointment Date/Time:    <input name="appdateTime" placeholder="DateTime" type="datetime-local" required>
        <br>
        Prescription Given:    <input type="text" name="prescription" placeholder="prescription" size=50>
        <br>
        <button type="submit">Submit Record</button>
    </form>

    <h3><a href="../AdminMainpage.php">Back to Admin Mainpage</a></h3>
</body>
</html>