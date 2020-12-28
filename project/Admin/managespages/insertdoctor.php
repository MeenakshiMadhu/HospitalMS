<?php
    session_start();

    include '/Applications/XAMPP/xamppfiles/htdocs/project/db_connection.php';
    $conn = OpenCon();
    // echo "Connected Successfully";

    include '/Applications/XAMPP/xamppfiles/htdocs/project/create_tables.php';
    PrintDepartments($conn);

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
            echo "<br><br>New Doctor record created successfully. Last inserted ID : ".$lastRecord;
            
            $_SESSION['mindex'] = $_SESSION['mindex'] + 1;
            $maction = "Registered ".$u_id." as doctor.";
            log_in_manages($conn, $_SESSION['mindex'], $_SESSION["au_id"], $maction);

            }
        else {
        echo "<br><br>Error : ".$sql1Insert."<br>".$conn->error;
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
    <h1>Enter Doctor Details</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <!-- User ID: <input type="text" name="u_id" placeholder="User ID" required>
        <br>         -->
        Department ID:    <input type="text" name="dept_ID" placeholder="Department ID" required>
        <br>
        <button type="submit">Submit Record</button>
    </form>

    <h3><a href="../AdminMainPage.php">Back to Admin Mainpage</a></h3>

</body>
</html>