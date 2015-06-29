<?php
class Subscription extends AppModel {

  var $name = 'Subscription';
  var $belongsTo = array(
    'User' => array(
      'className' => 'User',
    ),
    'Competition' => array(
      'className' => 'Competition',
    ),
  );    

}