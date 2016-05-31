<?php
class LocationsController extends AppController {

    //var $name = 'Events';
    var $components = array('RequestHandler');
    var $scaffold;
  
    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('view', 'export', 'share');
    }

    function beforeRender() {
        parent::beforeRender();
    }
    
    function teams() {
        $teams = $this->Location->Team->find('list');
        $this->set('teams', $teams );        
        
        if(isset($this->data)) {
            var_dump($this->data);
        }
        
        $this->set('locations', $this->Location->find('all') );
    }
}