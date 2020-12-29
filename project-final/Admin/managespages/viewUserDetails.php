<?php
include '/Applications/XAMPP/xamppfiles/htdocs/project/db_connection.php';
$conn = OpenCon();

$search=$_POST['search'];
$result = mysqli_query($conn,"SELECT * FROM users WHERE u_id LIKE '%$search%'");
$row = mysqli_fetch_array($result);

if ($result->num_rows <= 0)
	die("User ID does not exist.")

?>

<html>
	<head>
	<link href="tables.css" rel="stylesheet">
    <link href="a_style.css" rel="stylesheet">		
    <title>User Details</title>
	</head>
	<body>
		<div class="container-login100" style="background-image: url('image1.jpg');">
    <nav id="header" class="navbar">
    <div class="logo" style="margin: -50 0 0 -60; font-size: 60px;">User Details</div>
  </nav>
		<div style="margin: -100 0 0 0;">
		<table class="styled-table">
			<thead>
			<tr>
			<td>User ID</td>
			<td>User Name</td>
			<td>Date of Birth</td>
			<td>Email ID</td>
			<td>Mobile Number</td>
			<td>Action</td>
			</tr>
		</thead>
		<tbody>
			<tr class="<?php if(isset($classname)) echo $classname;?>">
			<td><?php echo $row["u_id"]; ?></td>
			<td><?php echo $row["uname"]; ?></td>
			<td><?php echo $row["uDOB"]; ?></td>
			<td><?php echo $row["emailID"]; ?></td>
			<td><?php echo $row["mobile_no"]; ?></td>
			<td ><a class="btn btn-outline-success btn-sm" style="text-decoration: none;" href="updateUserDetails.php?u_id=<?php echo $row["u_id"]; ?>">Update</a></td>
			</tr>
		</tbody>
		</table>
	</div>
	<div class="container-login100-form-btn" style="margin-top: -200;">
    <form action="../AdminMainPage.php" method="post">
      <input class="login100-form-btn button" style="font-size: 20px;" type ="submit" value="Back to Admin Mainpage">
    </form>
  </div>
</div>
	</body>
</html>