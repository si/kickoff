<?php
class UsersController extends AppController {

  var $name = 'Users';
  var $helpers = array('Time','Form');

  var $scaffold;
  
	function beforeFilter() {
		parent::beforeFilter();
	}
	
	function beforeRender() {
	  parent::beforeRender();
	}
    
}
?>