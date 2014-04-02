<?php
class Sport extends AppModel {

  var $name = 'Sport';
  var $hasMany = 'Calendar';
  
  var $belongsTo = 'Theme';

}