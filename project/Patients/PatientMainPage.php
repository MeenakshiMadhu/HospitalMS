<html>
  <head>
    <title>Patient</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="../style.css" rel="stylesheet">
  </head>
  <body>
        <div class="title" style="padding: 25 0 0 25;">
          <i class="fas fa-pencil-alt"></i> 
          <h2>PATIENT</h2>
		</div>
		<form action="AppDetailsPatient.php" method="post">
			Check your appointments.
			<input class="button" type ="submit" value="Search">
    </form>
    <form action="PayDetailsPatient.php" method="post">
      Check your payment history.
      <input class="button" type ="submit" value="Search">
    </form>
    <form action="../i.php" method="post">
      <input class="button" type ="submit" value="Go Back">
    </form>
   </body>
</html>
