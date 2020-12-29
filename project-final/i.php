<?php
	session_start();
?>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="i_style.css">
     <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
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
    <div class="container-login100" style="background-image: url('images/bg-03.jpg');">
	<section class="container" id="container_to_be_aligned">
		<br>
        <br>

		<?php
			if($_SESSION["curr_uname"]) {
				$n = $_SESSION["curr_uid"];
				$char = $n[0];
				if($char == "D"){	
		?>
		<h1 class="display-4" style="color:black;"> Welcome Doctor <?php echo $_SESSION["curr_uname"]; ?> </h1><br>
			<div class="container-login100-form-btn">
				<button class="login100-form-btn">
					<a href="Doctor/DoctorMainPage.php" title="Doctor">GO TO YOUR PAGE </a>
				</button>
			</div>
			<br>
			<div class="container-login100-form-btn">
				<button class="login100-form-btn">
					<a href="logout.php" title="Logout">LOGOUT</a>
				</button>
			</div>
		 
		<?php
				}
				if($char == "P"){

		?>
		<h1 class="display-4" style="color:black;"> Welcome <?php echo $_SESSION["curr_uname"]; ?> </h1><br>
			<div class="container-login100-form-btn">
				<button class="login100-form-btn">
					<a href="Patients/PatientMainPage.php" title="Patient"> GO TO YOUR PAGE  </a>
				</button>
			</div>
			<br>
			<div class="container-login100-form-btn">
				<button class="login100-form-btn">
					<a href="logout.php" title="Logout">LOGOUT</a>
				</button>
			</div>
		
		<?php
				}
				if($char == "A"){

		?>
		<h1 class="display-4" style="color:black;"> Welcome Admin <?php echo $_SESSION["curr_uname"]; ?></h1></br>
		
			<div class="container-login100-form-btn">
				<button class="login100-form-btn">
					<a href="Admin/AdminMainPage.php" title="Admin"> GO TO YOUR PAGE </a>
				</button>
			</div>
		
			<br>
		
			<div class="container-login100-form-btn">
				<button class="login100-form-btn">
					<a href="logout.php" title="Logout">LOGOUT</a>
				</button>
			</div>
		 

		<?php
				}
			}

			else {
				echo '<h1 class="display-4">Please login first .</h1>';
			}
		
		?>
	</section>

</div>
</div>
<!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>
</body>
</html>