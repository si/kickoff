<?php
class CalendarsController extends AppController {

  var $name = 'Calendars';
  var $helpers = array('Time','Form');
  var $components = array('RequestHandler');
  
  var $scaffold;
  
	function beforeFilter() {
		parent::beforeFilter();
	}
	
	function beforeRender() {
	  parent::beforeRender();
	}

  function export($id='') { 
    // Stop Cake from displaying action's execution time 
//    Configure::write('debug',0); 
    // Find fields needed without recursing through associated models 
    $data = $this->Calendar->find( 
      'all', 
      array( 
//        'fields' => array('Calendar.name','Calendar.description','Event.id','Event.start','Event.end','Event.summary','Event.location','Event.created'), 
        'conditions' => array('Calendar.id'=>$id),
//        'order' => array("Event.created ASC"), 
      )
    ); 
    // Define column headers for CSV file, in same array format as the data itself 
    $headers = array( 
      'Calendar'=>array( 
//	      'id' => 'Event.id', 
	      'start' => 'Event.start', 
	      'end' => 'Event.end', 
	      'summary' => 'Event.summary', 
	      'location' => 'Event.location',
	      'created' => 'Event.created',
      ) 
    ); 
    // Add headers to start of data array 
    array_unshift($data,$headers); 
    // Make the data available to the view (and the resulting CSV file) 
    $this->set(compact('data')); 
  }
        
}
?>