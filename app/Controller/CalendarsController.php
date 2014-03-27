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
	
	function form($id='') {
	
	  if(isset($this->data) && count($this->data)>0) {
  	  $this->Calendar->save($this->data);
  	  $this->redirect(array('action'=>'view',$this->Calendar->id));
	  }
	
  	if($id!='') {
    	$this->data = $this->Calendar->findById($id);
  	}
  	
  	$this->set('sports', $this->Calendar->Sport->find('list'));
  	
	}

	function view($id='') {
	
    $calendar = $this->Calendar->findById($id);
    $this->set('calendar',$calendar);
	
    $future_params = array(
      'conditions' => array(
        'calendar_id' => $id,
      ),
      'recursive' => 1
    );

    if(isset($this->params['named']['month'])) {
      $start = strtotime($this->params['named']['month']."-01 00:00:00");
      $end = strtotime('+1 month',$start);
      $future_params['conditions'][] = "start >= '" . date('Y-m-d H:i:s',$start) . "'";
      $future_params['conditions'][] = "end < '" . date('Y-m-d H:i:s',$end) . "'";
    } else {
      $start = strtotime(date('Y-m')."-01 00:00:00");
      $future_params['conditions'][] = "start >= '" . date('Y-m-d H:i:s',$start) . "'";
      //$end = strtotime('first day of next month');
    } 
    $this->set('future_params', $future_params);
    $future_events = $this->Calendar->Event->find('all',$future_params);
    $this->set(compact('start','end'));
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