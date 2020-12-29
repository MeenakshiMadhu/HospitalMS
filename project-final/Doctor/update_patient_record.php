<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Patient Record</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  	<link href="doctor_style.css" rel="stylesheet">
</head>

<style>
    body {
        animation: fadeInAnimation ease 0.7s;
        animation-iteration-count: 1;
        animation-fill-mode: forwards;
    }

    @keyframes fadeInAnimation {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    section {
        text-align: center;
    }
</style>

<body>
	<div class="limiter">
    <div class="container-login100" style="background-image: url('../images/image1.jpg');">
    	<div class="card-deck" style="margin: 120 20 -100 20;">
    		<div class="card">
        		<div class="card-body">
        			<form action="updatec.php" method="post">
                		<h4 class="card-title">Enter appointment ID of appointment to update</h4>
						<input class="input100" style="color:black; width: 500px; margin-bottom:15px" id="appID" type="text" name="app_id" placeholder="Enter Appointment ID" required> <br>
						<h4 class="card-title">Enter updated prescription details</h4>
						<input class="input100" style="color:black; width: 500px; margin-bottom:15px" ID="presc" type="text" name="prescription" placeholder="Enter Prescription" required> <br>
                		<input class="btn btn-outline-success btn-sm" type ="submit" value="Go" style="font-size: 20px; margin-top: 10px">
          			</form>
        		</div>
    		</div>
    	</div>
    	<div class="container-login100-form-btn" style="margin-top:1;">
      		<form action="DoctorMainPage.php" method="post">
        	<input class="login100-form-btn button" style="font-size: 20px;" type ="submit" value="Go Back">
      		</form>
    	</div>
    </div>
    
  	</div>

	

</body>
</html>
    
<!-- <p>Enter details to be updated.</p>
<form method="POST" action="updatec.php">

    <label for="appID">Enter appointment ID of appointment to update:</label>
    <input id="appID" name="app_id" type="text" placeholder="Appointment ID">
    <br>
    <label for="presc">Enter updated prescription details:</label>
    <input id="presc" name="prescription" type="text" placeholder="Prescription">

    <input type="submit" value="Submit">
</form>
<br>
<p><a href="DoctorMainPage.php">Go back to main page</a></p>


</body>
</html>
 -->