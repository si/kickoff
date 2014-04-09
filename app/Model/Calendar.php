<?php
class Calendar extends AppModel {    

	var $name = 'Calendar';
  var $displayField = 'name';

	var $belongsTo = array(
	  'Sport',
	  'Theme',
//	  'User',
	);
	var $hasMany = array(
	  'Event' => array(
      'className'   => 'Event',
      'order' => 'Event.start ASC',
    ),
//    'Subscription',
  );
}
