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
            //var_dump($this->data);
            /*
            $teams = array();
            $teams['Team'] = array();
            foreach($this->data['Location'] as $location_id => $location) {
                $teams['Team'][ $location['team_id'] ] = array('location_id'=>$location_id);
            }
            var_dump($teams);
            */
        }
        
        $this->set('locations', $this->Location->find('all') );
    }
}