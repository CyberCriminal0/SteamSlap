<?php
require 'steamauth/steamauth.php';
$version = 0.2;
require_once('db.php');

?>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>
SteamSlap
</title>
<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="styles.css" rel="stylesheet">
<script src="libs/jquery-2.1.4.min.js"></script>
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
          <a class="navbar-brand" href="/">SteamSlap</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
		<?php
                        if(!isset($_SESSION['steamid'])) {
                        }  else {
                                echo '<li><a href="market.php">Market</a></li>';
                                echo '<li><a href="trade.php">Trade</a></li>';
				//echo '<li><a href="account.php">My Account</a></li>';
				//echo '<li><a href="steamauth/logout.php">Logout</a></li>'; //logout button
                        }
                ?>
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
<div class="container text-right pull-right">
	<h2>Recent Users</h2>
<div>
<div class="row">

<?php
	try{
        $recent = $db->query("SELECT * FROM users ORDER BY id DESC LIMIT 5;");
        } catch (PDOException $e) {

        echo $e->getMessage();
        die();
        }
	while ($row = $recent->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="col-xs-1 col-sm-push-8 col-xs-push-8"><div class = "thumbnail"><div class="column"><img src='.$row['avatar'].' style="height:auto; width:100%;"></img></div></div><div class = "caption"><p style="margin-top: -20px">'.$row['name'].'</p></div></div>';
	}
?>
</div>
</div>
</div>
    </div>
</body>
</html>
