<?php
    session_start();

    include 'E:/xampp1/htdocs/DBMS-Project/project/db_connection.php';
    include 'E:/xampp1/htdocs/DBMS-Project/project/create_tables.php';
    $conn = OpenCon();
    // echo "Connected Successfully";

    $temp = CreateTables($conn);
    // echo "<br>Tables Created";

    
    
    //$au_id = 'A123';
    $au_id=$_SESSION['curr_uid'];
    $_SESSION["au_id"] = $au_id;
    if (!isset($_SESSION['mindex'])) 
    {
        $_SESSION["mindex"]=0;   
    }
    // echo "mindex = ".$_SESSION["mindex"];


    //get this current admin's name (REMOVE WHEN MERGING WITH THE LOGIN PAGE)
    $adminname = "";
    $sqld = "SELECT uname as uname FROM users, admins WHERE au_id='$au_id' AND au_id = u_id;";
    $result = $conn->query($sqld);
    if($result->num_rows <=0) 
    {
        //echo "<br><hr>No results for doctor department<hr>";
    }
    else
    {
        //print each row
        while($row = $result->fetch_assoc()) {
            //echo "<br><b>Name:</b>                 ".$row["uname"];
            $adminname = $row["uname"];

        }
    }
    echo "<br><h1>Welcome, " . $adminname . "!</h1>";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Admin!</title>
</head>
<body>    
<h3><a href="selectTable.php">Select Table</a></h3>
    <h3><a href="deleteTables.php">Delete All Tables</a></h3>
    
    <h2>Manage Users</h2>
    <a href="managespages/insertnewuser.php">Register New User</a>  <!--works with sessions, logs in manages-->
    <br> 
    <a href="managespages/searchusers.php">Search Users</a>               <!--works, doesn't need sessions-->
    <br>

    <h2>Manage Appointments</h2>
    <a href="managespages\makeappointmentspage.php">Make Appointments</a>       <!--works with sessions-->
    <br>
    <a href="managespages\viewappointments.php">View Appointments</a>       <!--works, doesn't need sessions-->
    <br>

    
    <h2>Manage Payments</h2>
    <a href="managespages\makepaymentspage.php">Make Payment</a>                <!--works, doesn't need sessions, logs in manages-->
    <br>
    <a href="managespages\viewpaymentspage.php">View Payment Log</a>            <!--works, doesn't need sessions -->
    <br>
    
    <h2>Manage Departments</h2>
    <a href="managespages\createdepartmentspage.php">Create Department</a>          <!--works, doesn't need sessions, logs in manages-->
    <br>
    <a href="managespages\viewdoctorspage.php">View Doctors by Department</a>       <!--works, doesn't need sessions --> 
    <br>

    <h3><a href="viewhistory.php">View History of Each Admin</a></h3>

    <form action="../i.php" method="post">
      <input class="button" type ="submit" value="Go Back">
    </form>

</body>
</html>
