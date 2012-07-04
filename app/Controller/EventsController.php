<?php

class EventsController extends AppController {
	public $name = 'Events';
	
	function index() {
		$res = $this->Event->find('all');
		$this->set('eventsResult', $res["Event"]);
	}
	
	function view($id = null) {
		$id = $this->params[0]["id"];
		$league = $this->params[0]["league"];
		// See if we can get find first to work properly [DBU 7/4/12]
		$res = $this->Event->find('all', array('conditions' => array('id' => $id, 'league' => $league)));
		$this->set('eventResult', $res["Event"]);
	}
}