<html>
  <head>
    <title>Patient Medical History</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="style.css" rel="stylesheet">
    <style>
		table{
		border-style:solid;
		border-width:2px;
		border-color:white;
		}
	</style>
  </head>
  <body>
        <div class="title" style="padding: 25 0 0 25;">
          <i class="fas fa-pencil-alt"></i> 
          <h2>PATIENT MEDICAL HISTORY</h2>
		</div>
		<p style="padding-left: 60px;">
			<?php
				session_start();
				$u_id=$_SESSION['u_id'];
		        $search = $u_id;
				//$search=$_POST['search'];
		        /*if(strlen($search)<1){
		        	die('<p style="color: red; padding: 0 0 10 60;">Please Enter Patient ID<br></p>');
		        }

				echo "<div style='font-size:25px; color:#12A49A; padding-left:60px;'><b>Query: </b>".$search."<br></div>";
				*/

				include '/Applications/XAMPP/xamppfiles/htdocs/project/db_connection.php';
    			$conn = OpenCon();
    			echo "Connected Successfully";

				$sql = "select paymentID as `Payment ID`, amount as `Amount` 
				from payments 
				where pu_id like '%$search%'";

				$result = $conn->query($sql);

				if ($result->num_rows > 0)
				{
					echo "<div style='padding-left:60px;'><table border='1'>
					<tr>";
					while($row = $result->fetch_assoc() )
					{
						foreach($row as $cname => $cvalue)
						{
							echo "<th style='padding:20px; text-align:center;'>".$cname."</th>";
						}
						echo "</tr></div>";
						break;
					}
					$result = $conn->query($sql);
					while($row = $result->fetch_assoc() )
					{
						echo "<div style='padding-left:60px;'><tr>";
						foreach($row as $cname => $cvalue)
						{
	        				echo "<td style='padding-right: 20px;'>".$row[$cname]."</td>";
	    				}
	    				echo "</tr></div>";
					}
				} 

				else 
				{
					echo "<div style='padding-left:60px;'>"."0 records<br></div>";
				}

				$conn->close();

			?>
		</p>

   </body>
</html>
