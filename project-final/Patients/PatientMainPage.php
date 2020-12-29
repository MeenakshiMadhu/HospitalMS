<html>
  <head>
    <title>Patient</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="patient_style.css" rel="stylesheet">
  </head>
  <body>
  <div class="container-login100" style="background-image: url('images/image1.jpg');">
    <nav id="header" class="navbar">
    <div class="logo" style="margin: 100 0 0 40; font-size: 60px;">Patient Navigation Menu</div>
  </nav>
		
  <div class="card-deck" style="margin: 120 20 -100 20;">
    <div class="card">
      <div class="card-body">
        <form action="AppDetailsPatient.php" method="post">
              <h3 class="card-title">Check your medical history</h3>
        <input class="btn btn-outline-success btn-sm" type ="submit" value="Go" style="font-size: 20px;">
        </form>
      </div>
  
    </div>
    <div class="card">
      <div class="card-body">
         <form action="PayDetailsPatient.php" method="post">
              <h3 class="card-title">Check your payments</h3>
        <input class="btn btn-outline-success btn-sm" type ="submit" value="Go" style="font-size: 20px;">
        </form>
      </div>
    </div>
  </div>
  <div class="container-login100-form-btn" style="margin-top: 10;">
      <form action="../i.php" method="post">
      <input class="login100-form-btn button" style="font-size: 20px;" type ="submit" value="Go Back">
    </form>
  </div>
</div>
</body>
</html>
