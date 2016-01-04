<?php
class Team extends AppModel {

  var $name = 'Team';
  var $order = array('Team.name ASC');

  var $belongsTo = array('Competition','Sport','Theme');
  var $hasMany  = array(
    'Event' => array(
      'foreignKey' => 'home_team_id',
      'order' => array('start ASC')
    ),
    'Subscription'
  );
}