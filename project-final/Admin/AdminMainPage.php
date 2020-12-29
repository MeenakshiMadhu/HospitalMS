<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Admin!</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="admin_style.css" rel="stylesheet">
</head>
<body>  
<div class="container-login100" style="background-image: url('../images/image2.jpg');background-size: cover;">
    
<div><?php
    session_start();

    include '../db_connection.php';
    include '../create_tables.php';
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
    
?></div>>
    <nav id="header" class="navbar" style="margin: 20px;">
    <div class="logo" style="margin: 0 0 20 5; font-size: 60px;">Admin Navigation Menu</div>
    </nav>  

    
    <div class="card-deck" style="margin: 0 20 -100 20;">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Manage Users</h3>
            <a href="managespages/insertnewuser.php" class="btn btn-outline-success btn-sm" style="font-size: 20px;">Register New User</a>
            <a href="managespages/searchusers.php" class="btn btn-outline-success btn-sm" style="font-size: 20px;">Edit User Details</a>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Manage Appointments</h3>
            <a href="managespages/makeappointmentspage.php" class="btn btn-outline-success btn-sm" style="font-size: 20px;">Make Appointments</a>
            <a href="managespages/viewappointments.php" class="btn btn-outline-success btn-sm" style="font-size: 20px;">View Appointments</a>
          </div>
        </div>
    </div>

    <div class="card-deck" style="margin: 120 20 -100 20;">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Manage Payments</h3>
            <a href="managespages/makepaymentspage.php" class="btn btn-outline-success btn-sm" style="font-size: 20px;">Make Payment</a>
            <a href="managespages/viewpaymentspage.php" class="btn btn-outline-success btn-sm" style="font-size: 20px;">View Payment Log</a>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Manage Departments</h3>
            <a href="managespages/createdepartmentspage.php" class="btn btn-outline-success btn-sm" style="font-size: 20px;">Create Department</a>
            <a href="managespages/viewdoctorspage.php" class="btn btn-outline-success btn-sm" style="font-size: 20px;">View Doctors by Department</a>
          </div>
        </div>
    </div>

    <div class="card-deck" style="margin: 120 20 -100 20;">

        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Admin Log</h3>
            <a href="managespages/viewhistory.php" class="btn btn-outline-success btn-sm" style="font-size: 20px;">View Admin Log</a>
          </div>
        </div>
    </div>
    
    <div class="container-login100-form-btn" style="margin-top: 150;">
      <form action="../i.php" method="post">
      <input class="login100-form-btn button" style="font-size: 20px;" type ="submit" value="Go Back">
    </form>
  </div>
</div>
</body>
</html>
