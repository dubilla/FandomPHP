<?php

class EventsController extends AppController {
	public $name = 'Events';
	
	function index () {
		$res = $this->Event->find('all');
		$this->set('eventsResult', $res["Event"]);
	}
}