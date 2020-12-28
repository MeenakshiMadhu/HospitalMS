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
        echo "<br><br>New Admin record created successfully. Last inserted ID : ".$lastRecord;

        include 'C:\Users\aarth\Desktop\XAMPP\htdocs\practice\hospitaldbms\create_tables.php';
        $_SESSION['mindex'] = $_SESSION['mindex'] + 1;
        $maction = "Registered ".$u_id." as admin.";

        log_in_manages($conn, $_SESSION['mindex'], $_SESSION["au_id"], $maction);

    }
    else 
    {
        echo "<br><br>Error : ".$sql2Insert."<br>".$conn->error;
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
    <!-- <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        User ID: <input type="text" name="u_id" placeholder="User ID" required>
        <br>
        <button type="submit">Submit Record</button>
    </form> -->

    <h3><a href="../AdminMainPage.php">Back to Admin Mainpage</a></h3>

  
</body>
</html>