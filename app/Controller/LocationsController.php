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
        $this->set('locations', $this->Location->find('all') );
    }
}