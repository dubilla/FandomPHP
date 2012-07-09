<?php

class Punch extends AppModel {

	public $name = 'Punch';
	public $useDbConfig = 'espn';
	
	public $validate = array(
		'eventID' => array(
			'rule' => 'notEmpty'
		),
		'opponentID' => array(
			'rule' => 'notEmpty'
		)
	);
}