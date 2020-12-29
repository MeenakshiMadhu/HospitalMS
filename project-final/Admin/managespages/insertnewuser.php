<?php
    session_start();

    include '/Applications/XAMPP/xamppfiles/htdocs/project/db_connection.php';
    $conn = OpenCon();
    // echo "Connected Successfully";

    // obtain values for table User
      // form handling
      $u_id = "";
      $uname = "";
      $uDOB = "";
      $emailID = "";
      $mobile_no = "";
      
      
      //assign values to variables
      if( isset($_POST["u_id"])){
          $u_id = $_POST["u_id"];
      }
      if ( isset($_POST["uname"]) ){
          $uname = $_POST["uname"];
      }
      if ( isset($_POST["uDOB"]) ){
          $uDOB = $_POST["uDOB"];
      }
      if ( isset($_POST["emailID"]) ){
          $emailID = $_POST["emailID"];
      }
      if ( isset($_POST["mobile_no"]) ){
          $mobile_no = $_POST["mobile_no"];
      }
        
      $uname = str_replace("'", "''", $uname);

      $_SESSION["u_id"] = $u_id;

    if(!empty($_POST["u_id"]))    
    {
      // insert values into table
      $sqlInsert = "INSERT INTO Users (u_id, uname, uDOB, emailID, mobile_no)
                     VALUES ('$u_id', '$uname', '$uDOB', '$emailID', '$mobile_no'
                    )";

      if($conn->query($sqlInsert) === TRUE) {
        $lastRecord = $conn->insert_id;
        $message = "New User record created successfully";
        //echo "<br><br>New User record created successfully. Last inserted ID : ".$lastRecord;
      }
      else {
        echo "<br><br>Error : ".$sqlInsert."<br>".$conn->error;
      }
    }
    // else
    // {
    //     echo "u_id is empty";
    // }

    CloseCon($conn);
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert New User</title>
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
                <h2 align="center">Enter User Details</h2>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  <div>
                    <?php if(isset($message)) { echo "<div style='color: green; padding-bottom: 20px;'>".$message."</div>"; } ?>
                  </div>
                  <h4 class="card-title">User Name</h4>
                  <input class="input100" style="color:black; width: 500px; margin-bottom:15px" type="text" name="uname" placeholder="Full Name" onkeypress="return (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 65 && event.charCode <= 90) || event.charCode ==32" onpast="return false" required> <br>

                  <h4 class="card-title">User ID</h4>
                  <input class="input100" style="color:black; width: 500px; margin-bottom:15px" type="text" name="u_id" placeholder="User ID" required> <br>

                  <h4 class="card-title">Date of Birth</h4>
                  <input class="input100" style="color:black; width: 500px; margin-bottom:15px" type="date" name="uDOB" min="1940-01-01" max="2005-01-01" pattern="yyyy" placeholder="DD-MM-YY" required> <br>

                  <h4 class="card-title">Email</h4>
                  <input class="input100" style="color:black; width: 500px; margin-bottom:15px" type="email" name="emailID" placeholder="Email Address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required> <br>

                  <h4 class="card-title">Mobile Number</h4>
                  <input class="input100" style="color:black; width: 500px; margin-bottom:15px" type="number" name="mobile_no" placeholder="(no country code)" required> <br>

                  
                  <input class="btn btn-outline-success btn-sm" type ="submit" value="Go" style="font-size: 20px; margin-top: 25px; width: 250px; ; margin-bottom:15px"> <br>

                  <h5 class="card-title" align="left">NOTE: Kindly submit user record BEFORE logging User Type details.</h5><br>
                  <h4>USER TYPE</h4>
                  <h4><a href="insertdoctor.php"> - Doctor </a></h4>
                  <h4><a href="insertpatient.php"> - Patient</a></h4>
                  <h4><a href="insertadmin.php"> - Admin</a></h4>
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