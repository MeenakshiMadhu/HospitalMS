<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Patient Record</title>
    <!-- <link rel="stylesheet" type="text/css" href="DBMS-Project/style.css"> -->
    
</head>
<body>
    
<p>Enter details to be updated.</p>
<form method="POST" action="updatec.php">

    <label for="appID">Enter appointment ID of appointment to update:</label>
    <input id="appID" name="app_id" type="text" placeholder="Appointment ID">
    <br>
    <label for="presc">Enter updated prescription details:</label>
    <input id="presc" name="presc" type="text" placeholder="Prescription">

    <input type="submit" value="Submit">
</form>
<br>
<p><a href="doctor_mainpage.php">Go back to main page</a></p>


</body>
</html>