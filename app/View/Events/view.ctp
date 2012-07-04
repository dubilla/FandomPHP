<?php

	// Get the game - Should probably move all of this into the controller [DBU 7/4/12]
	foreach ($eventResult["sports"] as $sport) {
		foreach ($sport["leagues"] as $league) {
			foreach ($league["events"] as $event) {
				if (array_key_exists("competitions", $event)) {
					$game = $event["competitions"][0];
				}
			}
		}
	}
	
	foreach ($game["competitors"] as $team) {
		if ($team["team"]["homeAway"] == "home") {
			$homeTeam = $team["team"];
		} else {
			$awayTeam = $team["team"];
		}
	}

	// View
	echo '<h2>' . $awayTeam["location"] . ' ' . $awayTeam["name"] . ' at '. $homeTeam["location"] . ' ' . $homeTeam["name"] . '</h2>';
	echo '<p>Who are you rooting for?</p>';
?>