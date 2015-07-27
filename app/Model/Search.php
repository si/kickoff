<?php
class Search extends AppModel {

  var $name = 'Search';
  var $hasMany = 'Team';

  public $useTable = false;
  
}