<?php
class SportsController extends AppController {

  var $name = 'Sports';
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