<?php
class Event extends AppModel {

  var $name = 'Event';
  var $displayField = 'summary';
  var $order = 'Event.start ASC';
  var $belongsTo = array(
    'Calendar',
    'User',
  );

}
