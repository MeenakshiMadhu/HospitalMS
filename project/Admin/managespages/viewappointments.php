 <?php
    // echo "Search records";
    include '/Applications/XAMPP/xamppfiles/htdocs/project/db_connection.php';
    $conn = OpenCon();
    // echo "Connected Successfully";

    $du_id = "";

    if( isset($_POST['du_id']) ) {
        $du_id = $_POST['du_id'];
        
        $sql = "SELECT * FROM Appointments WHERE du_id = '$du_id'";
        $result = $conn->query($sql);

        // printing result
        if($result->num_rows <=0) {
            echo "<br><hr>No results<hr>";
        }
        else {
            //print each row
        	while($row = $result->fetch_assoc()){
                echo "<br><hr><b>Doctor ID:</b>                 ".$row["du_id"]
                    ."<br><b>Appointment ID:</b>          ".$row["app_id"]
                    ."<br><b>Patient ID:</b>          ".$row["pu_id"]
                    ."<br><b>Admin ID:</b>          ".$row["au_id"]
                    ."<br><b>Date and Time:</b>                      ".$row["appdateTime"]
                    ."<br><b>Prescription:</b>          ".$row["prescription"]
                    ."<hr>";
            }
        }

    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Appointment Details</title>
</head>
<body>
    <br>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <!-- use get if you dont mind the value being in url, post hides the passed data from the url -->
            <!-- use REQUEST in the event that you ahve no idea what the data is like, eg if there are many forms in your html code -->
                    <!-- ..., by defaultit contains the contents of GET, POST, and COOKIE as well -->
        Enter Doctor ID:           <input type="text" name="du_id" placeholder="Enter ID"  required>
        <br>
        <button type="submit">Submit</button>
        
    </form>

    <h3><a href="..\adminmainpage.php">Back to Admin Mainpage</a></h3>
</body>
</html>