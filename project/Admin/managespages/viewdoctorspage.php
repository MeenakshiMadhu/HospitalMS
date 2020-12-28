<?php
    // echo "Search records";
    include '/Applications/XAMPP/xamppfiles/htdocs/project/db_connection.php';
    $conn = OpenCon();
    // echo "Connected Successfully";

    include '/Applications/XAMPP/xamppfiles/htdocs/project/create_tables.php';
    PrintDepartments($conn);


    $dept_ID = "";

    if( isset($_POST['dept_ID']) ) {
        $dept_ID = $_POST['dept_ID'];
        
        $sql = "SELECT d.du_id as u_id, e.dept_Name as deptName, u.uname as uname, u.uDOB as DOB, u.emailID as emailID, u.mobile_no as mobileno FROM Doctors d, Users u, Departments e WHERE e.dept_ID = '$dept_ID' AND u_ID = du_ID AND d.dept_ID = e.dept_ID";
        $result = $conn->query($sql);

        // printing result
        if($result->num_rows <=0) {
            echo "<br><hr>No results.<hr>";
        }
        else {
            //print each row
        	while($row = $result->fetch_assoc()){
                echo "<br><hr><b>User ID:</b>                 ".$row["u_id"]
                    ."<br><b>Name:</b>                      ".$row["uname"]
                    ."<br><b>DOB:</b>                      ".$row["DOB"]
                    ."<br><b>Email ID:</b>                  ".$row["emailID"]
                    ."<br><b>Phone No.:</b>                 ".$row["mobileno"]
                    ."<br><b>Department:</b>                 ".$row["deptName"]
                    ."<hr>";
            }
        }

    }
    
    CloseCon($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors List</title>
</head>
<body>
    <br>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <!-- use get if you dont mind the value being in url, post hides the passed data from the url -->
            <!-- use REQUEST in the event that you ahve no idea what the data is like, eg if there are many forms in your html code -->
                    <!-- ..., by defaultit contains the contents of GET, POST, and COOKIE as well -->
        Enter Department ID:           <input type="text" name="dept_ID" placeholder="DPXXX"  required>
        <br>
        <button type="submit">Submit</button>
        
    </form>

    <h3><a href="../AdminMainPage.php">Back to Admin Mainpage</a></h3>
</body>
</html>