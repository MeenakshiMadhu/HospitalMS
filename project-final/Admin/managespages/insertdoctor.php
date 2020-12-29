<?php
    session_start();

    include '/Applications/XAMPP/xamppfiles/htdocs/project/db_connection.php';
    $conn = OpenCon();
    // echo "Connected Successfully";

    include '/Applications/XAMPP/xamppfiles/htdocs/project/create_tables.php';
    //PrintDepartments($conn);

    // obtain values for table User
      // form handling
    $u_id = $_SESSION["u_id"];
    // echo "userid is ".$u_id;
    
    // if( isset($_POST["u_id"])){
    //     $u_id = $_POST["u_id"];
    // }  
    
    $dept_ID = "";
    if( !empty($_POST["dept_ID"]))
    {
        $dept_ID = $_POST["dept_ID"];

        $sql1Insert = "INSERT INTO Doctors (du_id, dept_ID)
                VALUES ('$u_id', '$dept_ID'
            )";

        if($conn->query($sql1Insert) === TRUE) {
            $lastRecord = $conn->insert_id;
            $message="New Doctor record created successfully";
            //echo "<br><br>New Doctor record created successfully. Last inserted ID : ".$lastRecord;
            
            $_SESSION['mindex'] = $_SESSION['mindex'] + 1;
            $maction = "Registered ".$u_id." as doctor.";
            log_in_manages($conn, $_SESSION['mindex'], $_SESSION["au_id"], $maction);

            }
        else {
        //echo "<br><br>Error : ".$sql1Insert."<br>".$conn->error;
        }
    }

    CloseCon($conn);
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Doctor</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="managepages_style.css" rel="stylesheet">
</head>
<body>
    <div class="limiter">
    <div class="container-login100" style="background-image: url('image1.jpg');">
        <div class="card-deck" style="margin: 120 20 -100 20;">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div>
                            <?php if(isset($message)) { echo "<div style='color: green; padding-bottom: 20px;'>".$message."</div>"; } ?>
                        </div>
                        
                        <h4 class="card-title">Enter Department ID</h4>
                            <input class="input100" type="text" name="dept_ID" placeholder="Department ID" required> <br>
                        <input class="btn btn-outline-success btn-sm" type ="submit" value="Go" style="font-size: 20px; margin-top: 10px">
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

    <!-- <h1>Enter Doctor Details</h1> -->
    <!-- <form method="POST" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> -->
        <!-- User ID: <input type="text" name="u_id" placeholder="User ID" required>
        <br>         -->
        <!-- Department ID:    <input type="text" name="dept_ID" placeholder="Department ID" required> -->
        <!-- <br> -->
        <!-- <button type="submit">Submit Record</button> -->
    <!-- </form> -->

    <!-- <h3><a href="../AdminMainPage.php">Back to Admin Mainpage</a></h3> -->

</body>
</html>