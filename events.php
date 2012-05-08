<?php

session_start();
ob_start();
require_once 'libraries/espn-php/EpiCurl.php';
require_once 'libraries/espn-php/EpiESPN.php';
require_once 'models/events.php';
	$clientId = '3F2UHC2LAAK4PWWSYUCQOHQ1HNOCSRJAOLLLGPZJU0TYY01M';
	$clientSecret = 'BHRPXLVV0G4CEWFYO0ADNFSLG3RY5BY1BBWWK22E3JI2S3KH';
	$code = 'BFVH1JK5404ZUCI4GUTHGPWO3BUIUTEG3V3TKQ0IHVRVGVHS';
	$accessToken = 'FHZ00YAESQ5YW23LXL310YL14IUMCNOPIQQEJMVRZW2J13CM';
	$redirectUri = 'http://localhost/projects/espn/';
	$userId = 'self';
	$espnObj = new EpiESPN($clientId, $clientSecret, $accessToken);
	$espnObjUnAuth = new EpiESPN($clientId, $clientSecret);
	$events = new Events();
	$eventID = $_GET["eventID"];
?>  
<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title></title>
	<meta name="description" content="">
	<meta name="author" content="">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<style></style>

</head>
<body>
	<div id="container">
		<header>

		</header>

		<div id="main" role="main">
			
			<div id="contact-form" class="clearfix">
				<?php
					$event = $events->getEvent($eventID);
					$game = $event->competitions[0];
				?>
			    <h1>
					<?php echo $game->competitors[0]->team->location . " " . $game->competitors[0]->team->name; ?>
					vs.
					<?php echo $game->competitors[1]->team->location . " " . $game->competitors[1]->team->name; ?>
				</h1>

			</div>


		</div>

		<footer>

		</footer>
	</div>
<!--
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script>
		(function(){

				jQuery.getJSON("http://api.espn.com/v1/sports/football/college-football/",
					{
						data: {
							apikey: "ceevkg9k7t9gs4kyufyf9rqr"
						},
						type: "get",
						format: "json",
						success:
							function(json) {
								alert("yay");
								console.log(json);
							},
						error:
							function() {
								alert("boo");
							}
					}
				);
		})();
	</script>
-->
</body>
</html>