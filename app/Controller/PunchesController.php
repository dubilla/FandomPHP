<?php

class PunchesController extends AppController {
	public $name = 'Punches';
	public $helpers = array('Fandom');
	
	// Dummy
	function index() {
		$res = $this->Event->find('all');
		$this->set('eventsResult', $res["Event"]);
	}
	// Dummy
	function view($id = null) {
		$id = $this->params[0]["id"];
		$league = $this->params[0]["league"];
		// See if we can get find first to work properly [DBU 7/4/12]
		$res = $this->Event->find('all', array('conditions' => array('id' => $id, 'league' => $league)));
		$this->set('eventResult', $res["Event"]);
	}
	
	function add() {
		if (!empty($this->params[0])) {
			if ($this->Punch->save($this->params[0])) {
				$this->Session->setFlash('Your ticket has been punched.  Go [Team]!');
				$this->redirect(array('action' => 'index'));
			}
		}
	}
}