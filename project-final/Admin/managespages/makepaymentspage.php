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
          $message = "Payment recorded";
          //echo "<br><br>New record created successfully. Last inserted ID : ".$lastRecord;
          $_SESSION['mindex'] = $_SESSION['mindex'] + 1;
          $maction = "Payment of Rs.".$amount." by.".$pu_id;
      
          log_in_manages($conn, $_SESSION['mindex'], $_SESSION["au_id"], $maction);
      
        }
        else {
          $message = "ERROR: <br>".$conn->error;
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
    <title>Make Payment</title>
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
              <h2 align="center">Enter Payment Details</h2>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  <div>
                    <?php if(isset($message)) { echo "<div style='color: red; padding-bottom: 20px;'>".$message."</div>"; } ?>
                  </div>
                  <h4 class="card-title">Payment ID</h4>
                  <input class="input100" style="color:black; width: 500px; margin-bottom:15px"  type="text" name="paymentID" placeholder="PYXXX" required> <br>

                  <h4 class="card-title">Amount</h4>
                  <input class="input100" style="color:black; width: 500px; margin-bottom:15px" type="floatval" name="amount" placeholder="XXXXX.XX" pattern="^\d+(.\d{1,2})?$" required> <br>

                  <h4 class="card-title">Patient UserID</h4>
                  <input class="input100" style="color:black; width: 500px; margin-bottom:15px" ttype="text" name="pu_id" placeholder="PXXX" required> <br>
                  
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