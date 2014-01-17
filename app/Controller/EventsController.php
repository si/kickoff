<?php
class EventsController extends AppController {

  var $name = 'Events';
  var $helpers = array('Time','Form');
  var $components = array('RequestHandler');

  var $scaffold;
  
	function beforeFilter() {
		parent::beforeFilter();
	}
	
	function beforeRender() {
	  parent::beforeRender();
	}
	
	function form($id='') {
	  if(isset($this->data) && count($this->data)>0) {
	    $form_data = $this->data;
  	  $form_data['Event']['start'] = uk_date_to_mysql($this->data['Event']['start']);
  	  $form_data['Event']['end'] = uk_date_to_mysql($this->data['Event']['end']);
  	  $this->Event->save($form_data);
  	  $this->redirect(array('action'=>'view',$this->data['Event']['id']));
	  }
	
  	if($id!='') {
    	$this->data = $this->Event->findById($id);
    	$this->set('calendars', $this->Event->Calendar->find('list'));
  	}
	}

	function export($id='') { 
    // Stop Cake from displaying action's execution time 
//    Configure::write('debug',0); 
    // Find fields needed without recursing through associated models 
    $data = $this->Event->find( 
      'all', 
      array( 
        'fields' => array('Event.id','Event.start','Event.end','Event.summary','Event.location','Event.created'), 
        'conditions' => array('Event.id'=>$id),
      )
    ); 
    // Define column headers for CSV file, in same array format as the data itself 
    $headers = array( 
      'Event'=>array( 
	      'id' => 'ID', 
	      'start' => 'Start', 
	      'end' => 'End', 
	      'summary' => 'Summary', 
	      'location' => 'Location',
	      'created' => 'Created',
      ) 
    ); 
    // Add headers to start of data array 
    array_unshift($data,$headers); 
    // Make the data available to the view (and the resulting CSV file) 
    $this->set(compact('data')); 
  }
    
}
?>