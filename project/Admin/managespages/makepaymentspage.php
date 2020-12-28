<?php
    session_start();

    include '/Applications/XAMPP/xamppfiles/htdocs/project/db_connection.php';
    include '/Applications/XAMPP/xamppfiles/htdocs/project/create_tables.php';

    $conn = OpenCon();
    // echo "Connected Successfully";

    // obtain values for table
      // form handling
      $paymentID = "";
      $amount = 0;
      $pu_id = "";

      //assign values to variables
      if ( isset($_POST["paymentID"]) ){
          $paymentID = $_POST["paymentID"];
      }
      if ( isset($_POST["amount"]) ){
          $amount = $_POST["amount"];
      }
      if ( isset($_POST["pu_id"]) ){
        $pu_id = $_POST["pu_id"];
      }
      
    if(!empty($_POST["paymentID"]))    
    {
      // insert values into table
        $sqlInsert = "INSERT INTO Payments (paymentID, amount, pu_id)
                      VALUES ('$paymentID', '$amount', '$pu_id'
                      )";

        if($conn->query($sqlInsert) === TRUE) {
          $lastRecord = $conn->insert_id;
          echo "<br><br>New record created successfully. Last inserted ID : ".$lastRecord;
          $_SESSION['mindex'] = $_SESSION['mindex'] + 1;
          $maction = "Payment of Rs.".$amount." by.".$pu_id;
      
          log_in_manages($conn, $_SESSION['mindex'], $_SESSION["au_id"], $maction);
      
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
    <h1>Enter Payment Details</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <!-- use get if you dont mind the value being in url, post hides the passed data from the url -->
            <!-- use REQUEST in the event that you ahve no idea what the data is like, eg if there are many forms in your html code -->
                    <!-- ..., by defaultit contains the contents of GET, POST, and COOKIE as well -->
        Payment ID:    <input type="text" name="paymentID" placeholder="PYXXX" required>
        <br>
        Amount:    <input type="floatval" name="amount" placeholder="XXXXX.XX" pattern="^\d+(.\d{1,2})?$" required>
        <br>
        Patient UserID:    <input type="text" name="pu_id" placeholder="PXXX" required>
        <br>
        <button type="submit">Submit Record</button>
    </form>
    
    <h3><a href="../AdminMainPage.php">Back to Admin Mainpage</a></h3>
</body>
</html>