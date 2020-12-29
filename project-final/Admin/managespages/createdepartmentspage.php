<?php
    session_start();

    include '/Applications/XAMPP/xamppfiles/htdocs/project/db_connection.php';
    
    $conn = OpenCon();
    // echo "Connected Successfully";
    
    include '/Applications/XAMPP/xamppfiles/htdocs/project/create_tables.php';
    //PrintDepartments($conn);


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
        $message = "New Department created";
        //echo "<br><br>New record created successfully. Last inserted ID : ".$lastRecord;

        $_SESSION['mindex'] = $_SESSION['mindex'] + 1;
        $maction = "Created department ".$dept_ID.".";

        log_in_manages($conn, $_SESSION['mindex'], $_SESSION["au_id"], $maction);

      }
      else {
        //echo "<br><br>Error : ".$sqlInsert."<br>".$conn->error;
      }
    }
    CloseCon($conn);
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Department</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="managepages_style.css" rel="stylesheet">
</head>
<style>
    body {
        animation: fadeInAnimation ease 0.7s;
        animation-iteration-count: 1;
        animation-fill-mode: forwards;
    }

    @keyframes fadeInAnimation {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    section {
        text-align: center;
    }
</style>
<body>
  <div class="limiter">
    <div class="container-login100" style="background-image: url('image1.jpg');">
      <div class="card-deck" style="margin: 120 20 -100 20;">
        <div class="card">
            <div class="card-body">
               <h2 align="center">Enter New Department Details</h2>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  <div>
                    <?php if(isset($message)) { echo "<div style='color: red; padding-bottom: 20px;'>".$message."</div>"; } ?>
                  </div>
                  <h4 class="card-title">Department Name</h4>
                  <input class="input100" style="color:black; 500px; margin-bottom:15px"  type="text" name="dept_Name" placeholder="Department Name" required> <br>

                  <h4 class="card-title">Department ID</h4>
                  <input class="input100" style="color:black; 500px; margin-bottom:15px" type="text" name="dept_ID" placeholder="Department ID" required> <br>
                  
                  <input class="btn btn-outline-success btn-sm" type ="submit" value="Go" style="font-size: 20px; margin-top: 10px; width: 250px; margin-bottom:15px"> <br>

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

    
</body>
</html>