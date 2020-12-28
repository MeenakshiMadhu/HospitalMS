<?php
	session_start();
?>
<html>
<head>
<title>User Login</title>
</head>
<body>

<?php
	if($_SESSION["curr_uname"]) {
		$n = $_SESSION["curr_uid"];
		$char = $n[0];
		if($char == "D"){	
?>
	<p> Welcome Doctor <?php echo $_SESSION["curr_uname"]; ?>. </p>
	<p> Click here to <a href="Doctor/DoctorMainPage.php" title="Doctor">go to your page. </p>
	<p> Click here to <a href="logout.php" title="Logout">Logout. </p>

<?php
		}
		if($char == "P"){

?>
	<p> Welcome <?php echo $_SESSION["curr_uname"]; ?>. </p>
	<p> Click here to <a href="Patients/PatientMainPage.php" title="Patient"> go to your page. </p>
	<p> Click here to <a href="logout.php" title="Logout"> Logout. </p>

<?php
		}
		if($char == "A"){

?>
	<p> Welcome Admin <?php echo $_SESSION["curr_uname"]; ?>. </p>
	<p> Click here to <a href="Admin/AdminMainPage.php" title="Admin"> go to your page. </p>
	<p> Click here to <a href="logout.php" title="Logout">Logout. </p>

<?php
		}
	}

	else {
		
		echo "<h1>Please login first .</h1>";
	}
		
?>
</body>
</html>