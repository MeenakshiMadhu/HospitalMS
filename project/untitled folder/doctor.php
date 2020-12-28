<?php
  session_start();
  include '/Applications/XAMPP/xamppfiles/htdocs/project/db_connection.php';
  $conn = OpenCon();
  echo "Connected Successfully";

?>

<html>
<head>
<title>Doctor Page</title>
</head>
<body>

  Welcome Doctor <?php echo $_SESSION["uname"]; ?>. 
  Your ID : <?php echo $_SESSION["u_id"]; ?>.
  Click here to <a href="logout.php" title="Logout">Logout.

</body>
</html>
