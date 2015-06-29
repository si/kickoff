<?php
class Sport extends AppModel {

  var $name = 'Sport';
  var $hasMany = 'Competition';
  
  var $belongsTo = 'Theme';

}