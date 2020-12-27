
<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Login</title>
</head>
<body>

<?php
	if($_SESSION["uname"]) {
		$n = $_SESSION["u_id"];
		$char = $n[0];
		if($char == "D"){	
?>
	<p> Welcome Doctor <?php echo $_SESSION["uname"]; ?>. </p>
	<p> Click here to <a href="/DBMS-Project/doctor/doctor_mainpage.php" title="Doctor">go to your page. </p>
	<p> Click here to <a href="/DBMS-Project/login/logout.php" title="Logout">Logout. </p>

<?php
		}
		if($char == "P"){

?>
	Welcome Patient <?php echo $_SESSION["uname"]; ?>. Click here to <a href="logout.php" title="Logout">Logout.

<?php
		}
		if($char == "A"){

?>
	Welcome Admin <?php echo $_SESSION["uname"]; ?>. Click here to <a href="logout.php" title="Logout">Logout.

<?php
		}
	}

	else echo "<h1>Please login first .</h1>";
?>
</body>
</html>