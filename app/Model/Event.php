<?php
class Event extends AppModel {

  var $name = 'Event';
  var $displayField = 'summary';
  var $order = 'Event.starts ASC';
  var $belongsTo = 'Calendar';

}
