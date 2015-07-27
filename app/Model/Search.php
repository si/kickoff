<?php
class Search extends AppModel {

  var $name = 'Search';
  var $hasMany = array(
  	'Team',
  	'Competition',
  	'Sport'
  );

  public $useTable = false;
  
}