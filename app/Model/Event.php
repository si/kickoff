<?php
class Event extends AppModel {

  var $name = 'Event';
  var $displayField = 'summary';
  var $order = 'Event.start ASC';
  var $belongsTo = array(
    'Competition',
    'Location',
    'HomeTeam' => array(
        'className'    => 'Team',
        'foreignKey'   => 'home_team_id',
    ),
    'AwayTeam' => array(
        'className'    => 'Team',
        'foreignKey'   => 'away_team_id',
    ),
  );

}