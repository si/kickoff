<?php
class ThemesController extends AppController {

  var $name = 'Themes';
  var $scaffold;
  
	function beforeFilter() {
		parent::beforeFilter();
	}
	
	function beforeRender() {
	  parent::beforeRender();
	}

	function form($id='') {

		if (count($this->data)>0) {

			// create
			if(isset($this->data['Theme']['id']) && $this->data['Theme']['id']=='') {
  			$this->Theme->create();
  		}

			// attempt to save
			if ($this->Theme->saveAll($this->request->data)) {
				$this->Session->setFlash('Your theme has been saved');
        $this->redirect(array('action'=>'view',$this->Theme->id));
			}

		}

  	if($id!='') {
    	$this->data = $this->Theme->findById($id);
  	}
  	
  	$this->set('teams', $this->Theme->Team->find('list'));
  	
	}

}