<?php
class TeamsController extends AppController {

  var $name = 'Teams';
  var $scaffold;
  
	function beforeFilter() {
		parent::beforeFilter();
	}
	
	function beforeRender() {
	  parent::beforeRender();
	}
    
}