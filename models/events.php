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
	public function getLeaguesBySport($sport) {
		return json_decode($this->get('/sports/' . $sport . '/leagues?' . $this->apiKey . '=' . $this->apiValue, null)->__resp->data);
	}
	
	public function getSports() {
		return json_decode($this->get('/sports/events?' . $this->apiKey . '=' . $this->apiValue, null)->__resp->data);
	}
}