<?php
    // echo "Search records";
    include '/Applications/XAMPP/xamppfiles/htdocs/project/db_connection.php';
    $conn = OpenCon();
    echo "Connected Successfully";

    $pu_ID = "";

    if( isset($_POST['pu_ID']) ) {
        $pu_ID = $_POST['pu_ID'];
        
        $sql = "SELECT * FROM Payments WHERE pu_ID = '$pu_ID'";
        $result = $conn->query($sql);

        // printing result
        if($result->num_rows <=0) {
            echo "<br><hr>No results<hr>";
        }
        else {
            //print each row
        	$row = $result->fetch_assoc();
            echo "<br><hr><b>Patient ID:</b>                 ".$row["pu_ID"]
                 ."<br><b>Payment ID:</b>          ".$row["paymentID"]
                 ."<br><b>Amount:</b>                      ".$row["amount"]
                 ."<hr>";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Payment Details</title>
</head>
<body>
    <br>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <!-- use get if you dont mind the value being in url, post hides the passed data from the url -->
            <!-- use REQUEST in the event that you ahve no idea what the data is like, eg if there are many forms in your html code -->
                    <!-- ..., by defaultit contains the contents of GET, POST, and COOKIE as well -->
        Enter Patient ID:           <input type="text" name="pu_ID" placeholder="Enter ID"  required>
        <br>
        <button type="submit">Submit</button>
        
    </form>
</body>
</html>