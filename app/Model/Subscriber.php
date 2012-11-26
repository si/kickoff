<?php
class Subscriber extends AppModel {

  var $name = 'Subscriber';
  var $belongsTo = array(
    'User' => array(
      'className' => 'User',
    ),
    'Calendar' => array(
      'className' => 'Calendar',
    ),
  );    

}