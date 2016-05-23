<?php
class Location extends AppModel {
  var $name = 'Location';
  var $hasMany = 'Event';
}