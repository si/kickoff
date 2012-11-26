<?php
class SubscriptionsController extends AppController {

  var $name = 'Subscriptions';
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