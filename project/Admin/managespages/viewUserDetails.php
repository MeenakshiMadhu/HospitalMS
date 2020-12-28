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
		<link rel="stylesheet" href="style.css">
		<title>User Details</title>
		<style>
			table 
			{
				margin: 0 30 0 30;
			    border-collapse: collapse;
			    width: 80%;
			}
			td, th 
			{
			    border: 1px solid #000;
			    text-align: left;
			    color: black;
			    padding: 8px;

			}
			tr 
			{
			    background-color: white;
			}
		</style>
	</head>
	<body>
		<div class="title" style="padding: 25 0 0 25;">
          <i class="fas fa-pencil-alt"></i> 
          <h2>USER DETAILS</h2>
        </div>
		<table>
			<tr>
			<td>User ID</td>
			<td>User Name</td>
			<td>Date of Birth</td>
			<td>Email ID</td>
			<td>Mobile Number</td>
			<td>Action</td>
			</tr>

			<tr class="<?php if(isset($classname)) echo $classname;?>">
			<td><?php echo $row["u_id"]; ?></td>
			<td><?php echo $row["uname"]; ?></td>
			<td><?php echo $row["uDOB"]; ?></td>
			<td><?php echo $row["emailID"]; ?></td>
			<td><?php echo $row["mobile_no"]; ?></td>
			<td><a href="updateUserDetails.php?u_id=<?php echo $row["u_id"]; ?>">Update</a></td>
			</tr>
		</table>

		<h3><a href="..\adminmainpage.php">Back to Admin Mainpage</a></h3>
	</body>
</html>