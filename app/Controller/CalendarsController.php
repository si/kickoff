<?php
class CalendarsController extends AppController {

  public $name = 'Calendars';
  public $helpers = array('Time','Form');
  public $components = array('RequestHandler');
  
  public $scaffold;
  
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
  	$this->set('themes', $this->Calendar->Theme->find('list'));
  	
	}

	function view($id='') {
	
    if(is_numeric($id)) {
      $calendar = $this->Calendar->findById($id);
    } else {
      $calendar = $this->Calendar->findByName($id);
    }
    $this->set('calendar', $calendar);
	
    $future_params = array(
      'conditions' => array(
        'calendar_id' => $id,
      ),
      //'recursive' => 1
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
    $this->set(compact('start','end'));
    $this->set('future_params', $future_params);

    $events = $this->Calendar->Event->find('all',$future_params);
    $this->set('events', $events);

    $export_data = array();

    if(count($events)>0) {
      $export_data['calendar'] = array(
        'id' => $events[0]['Calendar']['id'],
        'name' => $events[0]['Calendar']['name'],
        'description' => $events[0]['Calendar']['description'],
        'theme_id' => $events[0]['Calendar']['theme_id'],
        'created' => $events[0]['Calendar']['created'],
        'url' => 'http://' . $_SERVER['SERVER_NAME'] . '/calendars/view/' . $id,
        'ics_url' => 'http://' . $_SERVER['SERVER_NAME'] . '/calendars/export/' . $id,
      );
      foreach($events as $event) {
        $export_data['events'][] = array(
          'event_id' => $event['Event']['id'],
          'start' => $event['Event']['start'],
          'end' => $event['Event']['end'],
          'summary' => utf8_encode($event['Event']['summary']),
          'home_team' => array(
            'id' => $event['HomeTeam']['id'],
            'name' => utf8_encode($event['HomeTeam']['name']),
            'theme_id' => $event['HomeTeam']['theme_id']
          ),
          'away_team' => array(
            'id' => $event['AwayTeam']['id'],
            'name' => utf8_encode($event['AwayTeam']['name']),
            'theme_id' => $event['AwayTeam']['theme_id']
          ),
          'group' => $event['Event']['group'],
          'description' => utf8_encode($event['Event']['description']),
          'all_day' => $event['Event']['all_day'],
          'location' => utf8_encode($event['Event']['location']),
          'created' => $event['Event']['created'],
          'updated' => $event['Event']['updated'],
          'url' => 'http://' . $_SERVER['SERVER_NAME'] . '/events/view/' . $event['Event']['id'],
          'ics_url' => 'http://' . $_SERVER['SERVER_NAME'] . '/events/export/' . $event['Event']['id'],
        );
      }
    }
    
    $this->set('export_data', $export_data);

	
	}

  function export($id='',$format='ics') { 
  
    $this->layout = $format.'/default';
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

    // Set calendar reminder to 1 hour
    $this->set('reminder_value',1);
    $this->set('reminder_unit','H');

  }
        
}
?>