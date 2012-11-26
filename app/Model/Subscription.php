<?php
class Subscription extends AppModel {

  var $name = 'Subscription';
  var $belongsTo = array(
    'User' => array(
      'className' => 'User',
    ),
    'Calendar' => array(
      'className' => 'Calendar',
    ),
  );    

}