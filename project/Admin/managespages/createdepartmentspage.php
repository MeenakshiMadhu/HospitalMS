<?php
    session_start();

    include '/Applications/XAMPP/xamppfiles/htdocs/project/db_connection.php';
    
    $conn = OpenCon();
    // echo "Connected Successfully";
    
    include '/Applications/XAMPP/xamppfiles/htdocs/project/create_tables.php';
    PrintDepartments($conn);


    // obtain values for table
      // form handling
      $dept_ID = "";
      $dept_Name = "";

      //assign values to variables
      if ( isset($_POST["dept_ID"]) ){
        $dept_ID = $_POST["dept_ID"];
      }
      if ( isset($_POST["dept_Name"]) ){
            $dept_Name = $_POST["dept_Name"];
      }    

      $dept_Name = str_replace("'", "''", $dept_Name);
        
    if(!empty($_POST["dept_ID"]))    
    {
      // insert values into table
      $sqlInsert = "INSERT INTO Departments (dept_ID, dept_Name)
                     VALUES ('$dept_ID', '$dept_Name'
                    )";

      if($conn->query($sqlInsert) === TRUE) {
        $lastRecord = $conn->insert_id;
        echo "<br><br>New record created successfully. Last inserted ID : ".$lastRecord;

        $_SESSION['mindex'] = $_SESSION['mindex'] + 1;
        $maction = "Created department ".$dept_ID.".";

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
    <title>insertDeptRecord</title>
</head>
<body>
    <h1>Enter Department Details</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Department Name:    <input type="text" name="dept_Name" placeholder="Department Name" required>
        <br>
        Department ID:    <input type="text" name="dept_ID" placeholder="Department ID" required>
        <br>

      <button type="submit">Submit Record</button>
    </form>

    <h3><a href="..\adminmainpage.php">Back to Admin Mainpage</a></h3>
</body>
</html>