
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Users</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
  <link href="a_style.css" rel="stylesheet">
  </head>
  <body>     
    <div class="limiter">
      <div class="container-login100" style="background-image: url('image1.jpg');">
        <div class="card-deck" style="margin: -180 20 -200 20;">
          <div class="card">
              <div class="card-body">
            	 <form action="viewUserDetails.php" method="post">
            			<h4 class="card-title">Enter User ID to Search: </h4><input class="input100" type="text" name="search" placeholder="User ID" required> <br>
                    <input class="btn btn-outline-success btn-sm" type ="submit" value="Search" style="font-size: 20px; margin-top: 20px">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  <div class="container-login100-form-btn" style="margin-top: -100;">
    <form action="../AdminMainPage.php" method="post">
      <input class="login100-form-btn button" style="font-size: 20px;" type ="submit" value="Back to Admin Mainpage">
    </form>
  </div>
  </div>
   </body>
</html>
