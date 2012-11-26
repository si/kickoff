<?php
class Calendar extends AppModel {    

	var $name = 'Calendar';
  var $displayField = 'name';

	var $belongsTo = 'Sport';
	var $hasMany = array(
	 'Event',
	 'Subscription',
  );
}
