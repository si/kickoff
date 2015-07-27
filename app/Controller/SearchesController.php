<?php
class SearchesController extends AppController {

	public $name = 'Searches';
  
	function beforeFilter() {
		parent::beforeFilter();
        $this->Auth->allow('index');
	}
	
	function beforeRender() {
	  parent::beforeRender();
	}

	function index($query='') {

		if(isset($this->data) && count($this->data)>0) {
		    $query = $this->data['Search']['query'];
		    $this->redirect(array('action'=>'index', $query));
		}

		$this->set('query', $query);

		if($query!='') {
			$teams = $this->Search->Team->find('all', array('conditions'=>array("Team.name LIKE '%" . $query . "%'")));
			$this->set('teams', $teams);

			$competitions = $this->Search->Competition->find('all', array('conditions'=>array("Competition.name LIKE '%" . $query . "%'")));
			$this->set('competitions', $competitions);

			$sports = $this->Search->Sport->find('all', array('conditions'=>array("Sport.name LIKE '%" . $query . "%'")));
			$this->set('sports', $sports);
		}
	}

}
