<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Display RPatients</title>
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
          			<form action="displayr.php" method="post">
                		<h4 class="card-title">Enter Patient ID to display appointment details</h4>
							<input class="input100" style="color:black; width: 500px; margin-bottom:15px" type="text" type="text" name="pu_id" required> <br>
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



<!-- <!DOCTYPE html>
<html>
<head>
</head>
<body>
	
<form action="displayr.php" method="post" />
<p>Enter Patient ID to display appointment details - </p>
<p>Patient ID: <input type="text" name="pu_id" /></p>

 <input type="submit" value="Submit" />

</form>

</body>
</html> -->