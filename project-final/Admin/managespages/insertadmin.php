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
    // admin
    $sql2Insert = "INSERT INTO Admins (au_id)
                VALUES ('$u_id'
            )";

    if($conn->query($sql2Insert) === TRUE) 
    {
        $lastRecord = $conn->insert_id;
        //echo "<br><br>New Admin record created successfully. Last inserted ID : ".$lastRecord;

        include '/Applications/XAMPP/xamppfiles/htdocs/project/create_tables.php';
        $_SESSION['mindex'] = $_SESSION['mindex'] + 1;
        $maction = "Registered ".$u_id." as admin.";

        log_in_manages($conn, $_SESSION['mindex'], $_SESSION["au_id"], $maction);

    }
    else 
    {
        //echo "<br><br>Error : ".$sql2Insert."<br>".$conn->error;
    }


    CloseCon($conn);
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Admin</title>
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
            <div class="card-body" align="center">
              <h4 class="card-title">Admin Created</h4>
              <form action="../AdminMainPage.php" method="post">
              <input class="login100-form-btn button" style="font-size: 20px;" type ="submit" value="Go Back">
              </form>
            </div>
        </div>
    </div>
</div>
</div>
    <!-- <h1>Enter User Type Details</h1> -->
    <!-- <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        User ID: <input type="text" name="u_id" placeholder="User ID" required>
        <br>
        <button type="submit">Submit Record</button>
    </form> -->

    <!-- <h3><a href="../AdminMainPage.php">Back to Admin Mainpage</a></h3> -->

  
</body>
</html>