<?php
    include '/Applications/XAMPP/xamppfiles/htdocs/project/db_connection.php';
    $conn = OpenCon();
    echo "Connected Successfully";

  
    // sql to create table done in the create_tables.php


    // obtain values for table
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
      if (isset($_POST["emailID"]) ){
          $emailID = $_POST["emailID"];    
      }
      if (isset($_POST["mobile_no"]) ){
          $mobile_no = $_POST["mobile_no"];    
      }
        
    // insert values into table
      $sqlInsert = "INSERT INTO Users (u_id, uname, uDOB, emailID, mobile_no)
                     VALUES ('$u_id', '$uname', '$uDOB', '$emailID',
                        '$mobile_no'
                    )";

      if($conn->query($sqlInsert) === TRUE) {
        $lastRecord = $conn->insert_id;
        echo "<br>New record created successfully. Last inserted ID : ".$lastRecord;
      }
      else {
        echo "<br>Error : ".$sqlInsert."<br>".$conn->error;
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
    <h1>Insert New User Details</h1>
    <br>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <!-- use get if you dont mind the value being in url, post hides the passed data from the url -->
            <!-- use REQUEST in the event that you ahve no idea what the data is like, eg if there are many forms in your html code -->
                    <!-- ..., by defaultit contains the contents of GET, POST, and COOKIE as well -->
        UID:           <input type="text" name="u_id" placeholder="UID" required>
        <br>
        uName:    <input type="text" name="uname" placeholder="Name" required>
        <br>
        Date of Birth:  <input type="date" name="uDOB" min="1940-01-01" max="2005-01-01" pattern="yyyy" placeholder="DD-MM-YY" required>
        <br>
        Mobile Number:  <input type="number" name="mobile_no" placeholder="(no country code)" required>
        <br>
        Email:  <input type="email" name="emailID" placeholder="Put email here" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
        <br>
        <button type="submit">Make an Entry</button>
        
    </form>
</body>
</html>