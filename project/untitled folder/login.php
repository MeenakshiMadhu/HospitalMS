<?php
	session_start();
	$message="";
	if(count($_POST)>0) {

 		include '/Applications/XAMPP/xamppfiles/htdocs/project/db_connection.php';
    	$conn = OpenCon();
    	echo "Connected Successfully";
		
		$result = mysqli_query($conn,"SELECT * FROM Users WHERE u_id='" . $_POST["u_id"] . "'");
		$row  = mysqli_fetch_array($result);

		if(is_array($row)) {

			$_SESSION["u_id"] = $row['u_id'];
			$_SESSION["uname"] = $row['uname'];
		}
		else {
			echo "<br><hr><b>UID:</b>                 ".$row['u_id'];
			$message = "Invalid Username or Password!";
		}
	}	
	if(isset($_SESSION["u_id"])) {
		header("Location:i.php");
	}
?>
<html>
<head>
<title>User Login</title>
</head>
<body>
<form name="frmUser" method="post" action="" align="center">
<div class="message"><?php if($message!="") { echo $message; } ?></div>
<h3 align="center">Enter Login Details</h3>
 Username:<br>
 <input type="text" name="user_name">
 <br>
 Password:<br>
<input type="password" name="password">
<br><br>
<input type="submit" name="submit" value="Submit">
<input type="reset">
</form>
</body>
</html>