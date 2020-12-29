
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors List</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="tables.css" rel="stylesheet">
    <link href="a_style.css" rel="stylesheet">
</head>
<body>
    <div class="container-login100" style="background-image: url('image1.jpg');">
        <nav id="header" class="navbar">
            <div class="logo" style="margin: 80 0 0 30; font-size: 60px;">Doctors by Department</div>
        </nav>    
        <div style="margin: 50 0 0 0;">
        <?php
            // echo "Search records";
                include '/Applications/XAMPP/xamppfiles/htdocs/project/db_connection.php';
                
            $conn = OpenCon();
            // echo "Connected Successfully";

            include '/Applications/XAMPP/xamppfiles/htdocs/project/create_tables.php';
            PrintDepartments($conn);


            $dept_ID = "";

            if( isset($_POST['dept_ID']) ) {
                $dept_ID = $_POST['dept_ID'];
                
                $sql = "SELECT d.du_id as 'Doctor ID', e.dept_Name as Department, u.uname as 'Name', u.uDOB as DOB, u.emailID as 'Email ID', u.mobile_no as 'Phone No.' FROM Doctors d, Users u, Departments e WHERE e.dept_ID = '$dept_ID' AND u_ID = du_ID AND d.dept_ID = e.dept_ID";

                displaytable($conn, $sql);

            }
            
            CloseCon($conn);
        ?>
        
        </div>
        <!-- putting the search bar at bottom -->
		<!-- <div class="container-login100-form-btn" style="margin-top: -40;"> -->

    <!-- formatting search bar -->
    <div class="limiter">
        <div class="container-login100" style="background-image: url('../images/image1.jpg');">
            <div class="card-deck" style="margin: -180 20 -200 20;">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <h4 class="card-title"> Department ID: </h4>
                                <input class="input100" type="text" name="dept_ID" placeholder="DPXXX" required>
                            <br>
                            <button class="btn btn-outline-success btn-sm" style="font-size: 20px; margin-top: 20px" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->
    </div>

            <!-- back to admin page -->
    <div class="container-login100-form-btn" style="margin-top: -100;">
        <form action="..\AdminMainPage.php" method="post">
            <input class="login100-form-btn button" style="font-size: 20px;" type ="submit" value="Back to Admin Mainpage">
        </form>
    </div>
  <!-- </div> -->
  
    <!-- <br>
    <h3><a href="..\AdminMainPage.php">Back to Admin Mainpage</a></h3>
    <br> -->
</body>
</html>
