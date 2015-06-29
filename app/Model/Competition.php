<?php
class Competition extends AppModel {    

	var $name = 'Competition';
	var $displayField = 'name';

	var $belongsTo = array(
		'Sport',
		'Theme',
	);
	
	var $hasMany = array(
		'Event' => array(
			'className'   => 'Event',
			'order' => 'Event.start ASC',
		),
	);
}
