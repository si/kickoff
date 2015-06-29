<?php
class TeamsController extends AppController {

  var $name = 'Teams';
  var $scaffold;
  
	function beforeFilter() {
		parent::beforeFilter();
        $this->Auth->allow('index', 'view');
	}
	
	function beforeRender() {
	  parent::beforeRender();
	}
    
}