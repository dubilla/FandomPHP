<?php

session_start();
ob_start();
require_once 'libraries/espn-php/EpiCurl.php';
require_once 'libraries/espn-php/EpiESPN.php';
require_once 'models/events.php';

	$events = new Events();
	$sport = $_REQUEST["sport"];
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

</head>
<body>
	<div id="container">
		<header>

		</header>

		<div id="main" role="main">
			
			<div id="contact-form" class="clearfix">
			    <h1>Choose the League</h1>

				<?php
					$leagues = $events->getLeaguesBySport($sport);
					var_dump($leagues);
				?>
				<ul>
				<?php					
					foreach ($leagues as $league) {
						echo '<li><a href="events.php?">' . $league->name . '</li>';
					}
				?>
				</uL>

			</div>


		</div>

		<footer>

		</footer>
	</div>
</body>
</html>