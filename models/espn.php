<?php
/*
 *  Class to model Events
 *    API calls which do not require authentication do not require tokens
 * 
 *  Full documentation available on github
 *    http://wiki.github.com/dubilla/espn-php
 * 
 *  @author Dan Ubilla <dan.ubilla@gmail.com>
 */

require_once 'libraries/espn-php/EpiCurl.php';
require_once 'libraries/espn-php/EpiESPN.php';

class Events extends EpiESPN
{
	public $sports = array("mlb", "nba", "nhl", "nfl", "college-football", "mens-college-basketball");
	
	public function getEvent($id) {
		$events = $this->getEventsBySports($this->sports);
		foreach ($events->sports as $sport) {
			foreach ($sport->leagues as $league) {
				foreach ($league->events as $ev) {
					if ($id == $ev->id) {
						$event = $ev;
						break;
					}
				}
			}
		}
		return $event;
	}
	
	public function getLeaguesBySport($sport) {
		return json_decode($this->get('/sports/' . $sport . '/leagues?' . $this->apiKey . '=' . $this->apiValue, null)->__resp->data);
	}
	
	public function getSports() {
		return json_decode($this->get('/sports/events?' . $this->apiKey . '=' . $this->apiValue, null)->__resp->data);
	}
	
	public function getTopEvents() {
		return json_decode($this->get('/sports/events/top?' . $this->apiKey . '=' . $this->apiValue, null)->__resp->data);
	}
	
	public function getEventsBySports($sports) {
		return json_decode($this->get('/sports/events?leagues=' . implode(',', $sports) . '&' . $this->apiKey . '=' . $this->apiValue, null)->__resp->data);
	}
}