<?php
class User extends AppModel {

  var $name = 'User';
  var $displayField = 'username';

  var $hasMany = 'Subscription';

}