<?php
	include 'C:\Users\aarth\Desktop\XAMPP\htdocs\practice\db_connection.php';
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
		<link rel="stylesheet" href="style.css">
		<title>Patient Update</title>
		<style>
			table 
			{
			    font-family: arial, sans-serif;
			    border-collapse: collapse;
			    width: 100%;
			}
			td, th 
			{
			    border: 1px solid #dddddd;
			    text-align: left;
			    padding: 8px;

			}
			tr 
			{
			    background-color: white;
			}
		</style>
	</head>
<body>
	<div class="title" style="padding: 25 0 0 25; margin-bottom: -10px;">
          <i class="fas fa-pencil-alt"></i> 
          <h2>PATIENT UPDATE</h2>
        </div>
	<form name="frmUser" method="post" action="">
		<div>
			<?php if(isset($message)) { echo "<div style='color: red; padding-bottom: 20px;'>".$message."</div>"; } ?>
		</div>
		Patient Name: <br>
		<input type="hidden" name="uname" class="txtField" value="<?php echo $row['uname']; ?>">
		<input type="text" name="uname"  value="<?php echo $row['uname']; ?>">
		<br>
		Date of Birth: <br>
		<input type="text" name="uDOB" class="txtField" value="<?php echo $row['uDOB']; ?>">
		<br>
		Email ID: <br>
		<input type="text" name="emailID" class="txtField" value="<?php echo $row['emailID']; ?>">
		<br>
		Mobile Number: <br>
		<input type="text" name="mobile_no" class="txtField" value="<?php echo $row['mobile_no']; ?>">
		<br>
		<input type="submit" name="submit" value="Submit" class="buttom">

	</form>

	<h3><a href="..\adminmainpage.php">Back to Admin Mainpage</a></h3>
</body>
</html>