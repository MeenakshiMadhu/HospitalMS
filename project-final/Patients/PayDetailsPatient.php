<html>
  <head>
    <title>Patient Medical History</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="tables.css" rel="stylesheet">
    <link href="p_style.css" rel="stylesheet">
    <style>
		table{
		border-style:solid;
		border-width:2px;
		border-color:white;
		}
	</style>
  </head>
  <body>
        <div class="container-login100" style="background-image: url('images/image1.jpg');">
    <nav id="header" class="navbar">
    <div class="logo" style="margin: 80 0 0 30; font-size: 60px;">Patient Payment Details</div>
  </nav>
		<div style="margin: 50 0 0 0;">
			<?php
				session_start();
				$u_id=$_SESSION['curr_uid'];
		        $search = $u_id;
				//$search=$_POST['search'];
		        /*if(strlen($search)<1){
		        	die('<p style="color: red; padding: 0 0 10 60;">Please Enter Patient ID<br></p>');
		        }

				echo "<div style='font-size:25px; color:#12A49A; padding-left:60px;'><b>Query: </b>".$search."<br></div>";
				*/

				include '../db_connection.php';
    			$conn = OpenCon();
    			echo "Connected Successfully";

				$sql = "select paymentID as `Payment ID`, amount as `Amount` 
				from payments 
				where pu_id like '%$search%'";

				$result = $conn->query($sql);

				if ($result->num_rows > 0)
				{
					echo "<table class='styled-table'><thead><tr>";
					while($row = $result->fetch_assoc() )
					{
						foreach($row as $cname => $cvalue)
						{
							echo "<th>".$cname."</th>";
						}
						echo "</thead></tr></div>";
						break;
					}
					$result = $conn->query($sql);

					echo "<tbody>";
					while($row = $result->fetch_assoc() )
					{
						echo "<tr>";
						foreach($row as $cname => $cvalue)
						{
	        				echo "<td>".$row[$cname]."</td>";
	    				}
	    				echo "</tr>";
					}
					echo "</tbody></table>";
				} 

				else 
				{
					echo "<div style='padding-left:60px;'>"."0 records<br></div>";
				}

				$conn->close();

			?>
		</div>
		<div class="container-login100-form-btn" style="margin-top: -40;">
      <form action="PatientMainPage.php" method="post">
      <input class="login100-form-btn button" style="font-size: 20px;" type ="submit" value="Go Back">
    </form>
  </div>
   </body>
</html>
