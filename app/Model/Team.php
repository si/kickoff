<?php
class Team extends AppModel {

  var $name = 'Team';

  var $belongsTo = array('Sport','Theme');
  var $hasMany  = array(
    'Event' => array(
      'foreignKey' => 'home_team_id',
      'order' => array('start ASC')
    )
  );
}