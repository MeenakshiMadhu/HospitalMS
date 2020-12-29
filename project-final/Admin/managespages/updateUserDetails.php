<?php
	include '/Applications/XAMPP/xamppfiles/htdocs/project/db_connection.php';
    $conn = OpenCon();
	//$search=$_POST['search'];

	if(count($_POST)>0) {
	mysqli_query($conn,"UPDATE users set uname='" . $_POST['uname'] . "', uDOB='" . $_POST['uDOB'] . "', emailID='" . $_POST['emailID'] . "', mobile_no='" . $_POST['mobile_no'] . "' WHERE u_id='" . $_GET['u_id'] . "'");
	$message = "Record Modified Successfully";
	}
	$result = mysqli_query($conn,"SELECT * FROM users WHERE u_id='" . $_GET['u_id'] . "'");
	$row= mysqli_fetch_array($result);
?>
<html>
	<head>
    	<link href="a_style.css" rel="stylesheet">	
		<title>Patient Update</title>
	</head>
<body>
	<div class="limiter">
    <div class="container-login100" style="background-image: url('image1.jpg');">
    	<div class="card-deck" style="margin: -100 20 -100 20;">
    		<div class="card">
    			<h1 style="font-size: 40px;" class="card-title">User Details</h1>
        		<div class="card-body">
				<form name="frmUser" method="post" action="">
					<div>
						<?php if(isset($message)) { echo "<div style='color: red; padding-bottom: 20px;'>".$message."</div>"; } ?>
					</div>
					Patient Name: <br>
					<input class="input100" type="hidden" name="uname" class="txtField" value="<?php echo $row['uname']; ?>">
					<input class="input100" type="text" name="uname"  value="<?php echo $row['uname']; ?>">
					<br>
					Date of Birth: <br>
					<input class="input100" type="Date" name="uDOB" class="txtField" value="<?php echo $row['uDOB']; ?>">
					<br>
					Email ID: <br>
					<input class="input100" type="text" name="emailID" class="txtField" value="<?php echo $row['emailID']; ?>">
					<br>
					Mobile Number: <br>
					<input class="input100" type="text" name="mobile_no" class="txtField" value="<?php echo $row['mobile_no']; ?>">
					<br>
					<input style="margin-top:10;" class="btn btn-outline-success btn-sm" type="submit" name="submit" value="Submit" class="buttom">
				</form>
			</div>
		</div>
	<div class="container-login100-form-btn" style="margin-top: 10;">
    <form action="../AdminMainPage.php" method="post">
      <input class="login100-form-btn button" style="font-size: 20px;" type ="submit" value="Back to Admin Mainpage">
    </form>
	</div>
</div>
</body>
</html>