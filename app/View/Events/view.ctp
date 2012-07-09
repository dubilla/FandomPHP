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
			<div class="event-mod">
				<div class="opponent">
					<img src="http://a1.espncdn.com/prod/assets/clubhouses/2010/mlb/logos/<?= $awayTeam["abbreviation"]; ?>.png" />
					<!-- Take this form and post to the punch controller appropriately -->
					<form action="post">
					<a href="<?= $this->Fandom->baseURL ?>punches/add?eventID=<?= $event["id"]; ?>&opponentID=<?= $awayTeam["id"]; ?>" class="punch-link"><?= $awayTeam["name"] ?></a>
					</form>
				</div>
				<div class="opponent">
					<img src="http://a1.espncdn.com/prod/assets/clubhouses/2010/mlb/logos/<?= $homeTeam["abbreviation"] ?>.png" />
					<form action="post">
					<a href="<?= $this->Fandom->baseURL ?>punches/add?eventID=<?= $event["id"]; ?>&opponentID=<?= $homeTeam["id"]; ?>" class="punch-link"><?= $homeTeam["name"] ?></a>
					</form>
				</div>
			</div>