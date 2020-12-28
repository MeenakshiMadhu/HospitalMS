<?php
    session_start();

    include '/Applications/XAMPP/xamppfiles/htdocs/project/db_connection.php';
    include '/Applications/XAMPP/xamppfiles/htdocs/project/create_tables.php';
    
    $conn = OpenCon();
    // echo "Connected Successfully";

    // obtain values for table User
      // form handling
      $u_id = $_SESSION["u_id"];
    
    // if( isset($_POST["u_id"])){
    //     $u_id = $_POST["u_id"];
    // }  

        // ---------
        //patient
        $pstatus = "";
        if( isset($_POST["pstatus"]) && !empty($_POST["pstatus"]))
        {
            $pstatus = $_POST["pstatus"];

            $sql3Insert = "INSERT INTO Patients (pu_id, pstatus)
                    VALUES ('$u_id', '$pstatus'
                )";

            if($conn->query($sql3Insert) === TRUE) 
            {
                $lastRecord = $conn->insert_id;
                echo "<br><br>New Patient record created successfully. Last inserted ID : ".$lastRecord;

                
                $_SESSION['mindex'] = $_SESSION['mindex'] + 1;
                $maction = "Registered ".$u_id." as patient.";
        
                log_in_manages($conn, $_SESSION['mindex'], $_SESSION["au_id"], $maction);
        
            }
            else 
            {
                echo "<br><br>Error : ".$sql3Insert."<br>".$conn->error;
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
    <h1>Enter User Type Details</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <!-- User ID: <input type="text" name="u_id" placeholder="User ID" required>
        <br> -->
    
        Ongoing Patient: <input type="text" name="pstatus" placeholder="True/False" required>
        <br>

        <button type="submit">Submit Record</button>
    </form>

    <h3><a href="../AdminMainPage.php">Back to Admin Mainpage</a></h3>

</body>>
</html>