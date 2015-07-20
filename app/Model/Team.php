<?php
class Team extends AppModel {

  var $name = 'Team';
  var $order = array('Sport.name ASC', 'Team.name ASC');

  var $belongsTo = array('Sport','Theme');
  var $hasMany  = array(
    'Event' => array(
      'foreignKey' => 'home_team_id',
      'order' => array('start ASC')
    )
  );
}