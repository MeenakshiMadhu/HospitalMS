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
        echo "<br><br>New User record created successfully. Last inserted ID : ".$lastRecord;
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
    <title>Document</title>
</head>
<body>
    <h1>Enter Users Details</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        User Name: <input type="text" name="uname" placeholder="Full Name" onkeypress="return (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 65 && event.charCode <= 90) || event.charCode ==32" onpast="return false" required>
        <br>
        User ID: <input type="text" name="u_id" placeholder="User ID" required>
        <br>
        Date of Birth: <input type="date" name="uDOB" min="1940-01-01" max="2005-01-01" pattern="yyyy" placeholder="DD-MM-YY" required>
        <br>
        Mobile Number: <input type="number" name="mobile_no" placeholder="(no country code)" required>
        <br>
        Email: <input type="email" name="emailID" placeholder="Put email here" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
        <br>

        <br>
        <button type="submit">Submit User Record</button>

        <b>NOTE: Kindly submit user record BEFORE logging User Type details.</b>
        <br>
        <h3><a href="insertdoctor.php">User Type - Doctor</a></h3>
        <h3><a href="insertpatient.php">User Type - Patient</a></h3>
        <h3><a href="insertadmin.php">User Type - Admin</a></h3>
    </form>
</body>
</html>