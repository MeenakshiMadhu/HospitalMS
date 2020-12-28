<?php
  session_start();
  include 'E:/xampp1/htdocs/DBMS-Project/login/db_connection.php';
    $conn = OpenCon();
    echo "Connected Successfully";

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
</head>
<body>
    <h1>Have an account? Login Here</h1>
    <br>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <!-- use get if you dont mind the value being in url, post hides the passed data from the url -->
            <!-- use REQUEST in the event that you ahve no idea what the data is like, eg if there are many forms in your html code -->
                    <!-- ..., by defaultit contains the contents of GET, POST, and COOKIE as well -->
        UID:           <input type="text" name="u_id" placeholder="Enter your ID"  required>
        <br>
        <button type="submit">Login</button>
        
    </form>
</body>
</html>

