<?php
    include 'C:\Users\aarth\Desktop\XAMPP\htdocs\practice\db_connection.php';

    $conn = OpenCon();
    echo "Connected Successfully";

    // $sql = "CREATE TABLE Users (
    //   u_id VARCHAR(30) NOT NULL PRIMARY KEY,
    //   uname VARCHAR(30) NOT NULL,
    //   uDOB DATE,
    //   emailID VARCHAR(30) NOT NULL,
    //   mobile_no CHAR(10)
    //   )";
    

    // obtain values for table
      // form handling
      $u_ID = "";
      $uname = "";
      $uDOB = "";
      $emailID = "";
      $mobile_no = "";
      
      
      //assign values to variables
      if( isset($_POST["u_ID"])){
          $u_ID = $_POST["u_ID"];
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

    if(!empty($_POST["u_ID"]))    
    {
      // insert values into table
      $sqlInsert = "INSERT INTO Users (u_ID, uname, uDOB, emailID, mobile_no)
                     VALUES ('$u_ID', '$uname', '$uDOB', '$emailID', '$mobile_no'
                    )";

      if($conn->query($sqlInsert) === TRUE) {
        $lastRecord = $conn->insert_id;
        echo "<br><br>New record created successfully. Last inserted ID : ".$lastRecord;
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
    <title>Document</title>
</head>
<body>
    <h3><a href="selectTable.php">Select Table</a></h3>
    <h1>Enter Users Details</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <!-- use get if you dont mind the value being in url, post hides the passed data from the url -->
            <!-- use REQUEST in the event that you ahve no idea what the data is like, eg if there are many forms in your html code -->
                    <!-- ..., by defaultit contains the contents of GET, POST, and COOKIE as well -->
        User Name: <input type="text" name="uname" placeholder="Full Name" onkeypress="return (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 65 && event.charCode <= 90) || event.charCode ==32" onpast="return false" required>
        <br>
        User ID: <input type="text" name="u_ID" placeholder="User ID" required>
        <br>
        Date of Birth: <input type="date" name="uDOB" min="1940-01-01" max="2005-01-01" pattern="yyyy" placeholder="DD-MM-YY" required>
        <br>
        Mobile Number: <input type="number" name="mobile_no" placeholder="(no country code)" required>
        <br>
        Email: <input type="email" name="emailID" placeholder="Put email here" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
        <br>

        <button type="submit">Submit Record</button>
    </form>
</body>
</html>