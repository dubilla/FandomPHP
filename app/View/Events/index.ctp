<h1>Choose the Matchup from our Top Matchups of the Day</h1>

<ul>
<?php
	foreach ($eventsResult["sports"] as $sport) {
		foreach ($sport["leagues"] as $league) {
			foreach ($league["events"] as $event) {
				if (array_key_exists("competitions", $event)) {
					$game = $event["competitions"][0];
					if (array_key_exists("competitors", $game)) {
						echo '<li><a href="event.php?eventID=' . $event["id"] . '">';
							echo $game["competitors"][0]["team"]["location"] . " " . $game["competitors"][0]["team"]["name"] ;
							echo " vs ";
							echo $game["competitors"][1]["team"]["location"]  . " " . $game["competitors"][1]["team"]["name"] ;
						echo '</li>';
					}
				}
			}
		}
	}
?>
</uL>