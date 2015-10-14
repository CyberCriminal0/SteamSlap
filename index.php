<?php
require 'steamauth/steamauth.php';
$version = 0.2;
?>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>
Steam Site
</title>
<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="libs/jquery-2.1.4.min.js"/>
<script src="js/bootstrap.min.js"></script>
</head>


<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SteamSlap</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#faq">FAQ</a></li>
            <li><a href="#login">Login</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
		<li>
		<?php
			if(!isset($_SESSION['steamid'])) {
    			   echo steamlogin(); //login button

			}  else {
			    include ('steamauth/userInfo.php'); //To access the $steamprofile array
    			//Protected content
			    logoutbutton(); //Logout Button
			
			}
		?>
		</li>
		</ul>
        </div>
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <h1>Welcome to SteamSlap!</h1>
        <p class="lead">We are currently in development,<br> as of now we are at version: <?php echo $version ?></p>
      </div>

    </div>
</body>
</html>
