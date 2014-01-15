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

	function view($id='') {
	
    $calendar = $this->Calendar->findById($id);
    $this->set('calendar',$calendar);
	
    $future_events = $this->Calendar->Event->find('all',array(
      'conditions' => array(
        'calendar_id' => $id,
        'start >= NOW()',
      ),
      'recursive' => 1
    ));
    $this->set('future_events',$future_events);

    $past_events = $this->Calendar->Event->find('all',array(
      'conditions' => array(
        'calendar_id' => $id,
        'start < NOW()',
      ),
      'recursive' => 1
    ));
    $this->set('past_events',$past_events);
	
	}

  function export($id='',$format='ics') { 
  
    $this->layout = 'ics/default';
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
    // Make the data available to the view (and the resulting CSV file) 
    $this->set(compact('data','format')); 
  }
        
}
?>