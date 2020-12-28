<?php
  session_start();
  include 'E:/xampp1/htdocs/DBMS-Project/project/db_connection.php';
    $conn = OpenCon();
    //echo "Connected Successfully";

    $u_id = "";

    if( isset($_POST["u_id"])){
        $u_id = $_POST["u_id"];
        
        $sql = "SELECT * FROM Users WHERE u_id = '$u_id'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);

        // printing result

        if($result->num_rows <=0) {
            echo "<br><hr>No user with this ID.<hr>";
        }
        else {
            echo "<br><hr>Login is successful<hr>";
            echo "<br><hr><b>Name:</b>                 ".$row["uname"]
                    ."<br><b>Mobile No:</b>          ".$row["mobile_no"]
                    ."<br><b>DOB:</b>                      ".$row["uDOB"]
                    ."<br><b>Email:</b>                    ".$row["emailID"]
                    ."<br><b>UID:</b>                    ".$row["u_id"]
                    ."<hr>";
            $_SESSION["curr_uid"] = $row['u_id'];
            $_SESSION["curr_uname"] = $row['uname'];

        }

    }
    if(isset($_SESSION["curr_uid"])) {
    header("Location:i.php");
  }
  
    //CloseCon($conn);
    //    //print each row
        //     $n = $result->num_rows;
        //     $flag = 0;
        //     while($row = $result->fetch_assoc()) {
        //       if(.$row["u_id"] == $u_id) {
        //         $flag == 1;
        //         break;
        //       }
        //     }
        //     if($flag == 0){
        //       echo "<br><hr>No user with this ID.<hr>";
        //     }
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100" style="background-image: url('images/bg-03.jpg');">
      <div class="wrap-login100">
        <form class="login100-form validate-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <!-- <span class="login100-form-logo">
            <i class="zmdi zmdi-landscape"></i>
          </span> -->

          <span class="login100-form-title p-b-34 p-t-27">
            Log in
          </span>
          
            <div class="wrap-input100 validate-input" data-validate = "Enter UID">

              <input class="input100" type="text" name="u_id" placeholder="Enter UID" required>
              <span class="focus-input100" data-placeholder="&#xf207;"></span>
            </div>

            <div class="container-login100-form-btn">
              <button class="login100-form-btn">
                Login
              </button>
            </div>
        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>



    <!-- <h1>Have an account? Login Here</h1>
    <br>

    <form method="POST" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      
        UID:           <input type="text" name="u_id" placeholder="Enter your ID"  required>
        <br>
        <button type="submit">Login</button>
        
    </form> -->
</body>
</html>

