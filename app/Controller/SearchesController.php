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
			$teams = $this->Search->Team->find('all', array(
				'conditions'=>array(
					'or' => array(
						"lower(Team.name) LIKE lower('%" . $query . "%')",
						"lower(Team.aliases) LIKE lower('%" . $query . "%')"
					)
				)
			));
			$this->set('teams', $teams);

			$competitions = $this->Search->Competition->find('all', array('conditions'=>array("lower(Competition.name) LIKE lower('%" . $query . "%')")));
			$this->set('competitions', $competitions);

			$sports = $this->Search->Sport->find('all', array('conditions'=>array("lower(Sport.name) LIKE lower('%" . $query . "%')")));
			$this->set('sports', $sports);
		}
	}

}
