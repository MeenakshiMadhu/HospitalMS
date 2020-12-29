<?php
    include '/Applications/XAMPP/xamppfiles/htdocs/project/db_connection.php';

    $conn = OpenCon();
    // echo "Connected Successfully";

    
    // drop tables one by one
    $sqlquery = "DROP TABLE Appointments;";
    if($conn->query($sqlquery) === TRUE) 
    {
        // $lastRecord = $conn->insert_id;
        // echo "<br><br>Table Appointments dropped successfully.";
    }
    // else 
    // {
    //     echo "<br><br>Error : ".$sqlquery."<br>".$conn->error;
    // }


    $sqlquery = "DROP TABLE Payments;";
    if($conn->query($sqlquery) === TRUE) 
    {
        // $lastRecord = $conn->insert_id;
        // echo "<br><br>Table Payments dropped successfully.";
    }
    // else 
    // {
    //     echo "<br><br>Error : ".$sqlquery."<br>".$conn->error;
    // }

    $sqlquery = "DROP TABLE Manages;";
    if($conn->query($sqlquery) === TRUE) 
    {
        // $lastRecord = $conn->insert_id;
        // echo "<br><br>Table Manages dropped successfully.";
    }
    // else 
    // {
    //     echo "<br><br>Error : ".$sqlquery."<br>".$conn->error;
    // }

    $sqlquery = "DROP TABLE Patients;";
    if($conn->query($sqlquery) === TRUE) 
    {
        // $lastRecord = $conn->insert_id;
        // echo "<br><br>Table Patients dropped successfully.";
    }
    // else 
    // {
    //     echo "<br><br>Error : ".$sqlquery."<br>".$conn->error;
    // }

    $sqlquery = "DROP TABLE Admins;";
    if($conn->query($sqlquery) === TRUE) 
    {
        // $lastRecord = $conn->insert_id;
        // echo "<br><br>Table Admins dropped successfully.";
    }
    // else 
    // {
    //     echo "<br><br>Error : ".$sqlquery."<br>".$conn->error;
    // }

    $sqlquery = "DROP TABLE Doctors;";
    if($conn->query($sqlquery) === TRUE) 
    {
        // $lastRecord = $conn->insert_id;
        // echo "<br><br>Table Doctors dropped successfully.";
    }
    // else 
    // {
    //     echo "<br><br>Error : ".$sqlquery."<br>".$conn->error;
    // }

    $sqlquery = "DROP TABLE Departments;";
    if($conn->query($sqlquery) === TRUE) 
    {
        // $lastRecord = $conn->insert_id;
        // echo "<br><br>Table Departments dropped successfully.";
    }
    // else 
    // {
    //     echo "<br><br>Error : ".$sqlquery."<br>".$conn->error;
    // }

    $sqlquery = "DROP TABLE Users;";
    if($conn->query($sqlquery) === TRUE) 
    {
        // $lastRecord = $conn->insert_id;
        // echo "<br><br>Table Users dropped successfully.";
    }
    // else 
    // {
    //     echo "<br><br>Error : ".$sqlquery."<br>".$conn->error;
    // }
    
    CloseCon($conn);
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InsertAdminRecord</title>
</head>
<body>
    <h3>
    <a href="AdminMainPage.php">Admin Mainpage</a>
    </h3>
    
    <h3>
    <a href="selectTable.php">Select Table</a>
    </h3>
</body>
</html>