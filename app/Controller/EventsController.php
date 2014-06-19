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
  	  
  	  // Check home team exists
  	  $home_team = $this->Event->HomeTeam->findByName($this->data['Event']['home']);
  	  // If not, create them
  	  if(empty($home_team)) {
  	    $team_data = array(
	        'name' => $this->data['Event']['home'],
	        'sport_id' => 1,
        );
    	  $home_team = $this->Event->HomeTeam->save($team_data);
    	  // Set the home_team_id
        $form_data['Event']['home_team_id'] = $home_team['HomeTeam']['id'];
  	  } else {
    	  // Set the home_team_id
        $form_data['Event']['home_team_id'] = $home_team['HomeTeam']['id'];
  	  }

  	  // Check away team exists
  	  $away_team = $this->Event->AwayTeam->findByName($this->data['Event']['away']);
  	  // If not, create them
  	  if(empty($away_team)) {
  	    $team_data = array(
	        'name' => $this->data['Event']['away'],
	        'sport_id' => 1,
        );
    	  $away_team = $this->Event->AwayTeam->save($team_data);
    	  // Set the home_team_id
        $form_data['Event']['away_team_id'] = $away_team['AwayTeam']['id'];
  	  } else {
    	  // Set the home_team_id
        $form_data['Event']['away_team_id'] = $away_team['AwayTeam']['id'];
  	  }

  	  $this->Event->save($form_data);
  	  $this->redirect(array('action'=>'view',$this->Event->id));
	  }
	
  	if($id!='') {
    	$this->data = $this->Event->findById($id);
  	}

  	$this->set('calendars', $this->Event->Calendar->find('list'));
  	$this->set('teams', $this->Event->HomeTeam->find('list')); 
  	
	}

	function export($id='',$format='ics') { 

    $this->layout = 'ics/default';

    // Stop Cake from displaying action's execution time 
//    Configure::write('debug',0); 

    // Find fields needed without recursing through associated models 
    $data = $this->Event->find( 
      'all', 
      array( 
        'fields' => array(
          'Event.id',
          'Event.start',
          'Event.end',
          'Event.summary',
          'Event.location',
          'Event.group',
          'Event.description',
          'Event.created'
        ), 
        'conditions' => array('Event.id'=>$id),
      )
    ); 

    // Define column headers for CSV file, in same array format as the data itself 
    $headers = array( 
      'Event' => array( 
	      'id' => 'ID', 
	      'start' => 'Start', 
	      'end' => 'End', 
	      'summary' => 'Summary', 
	      'location' => 'Location',
	      'group' => 'Group',
	      'description' => 'Description',
	      'created' => 'Created',
      ) 
    ); 

    // Add headers to start of data array 
    array_unshift($data,$headers); 

    // Make the data available to the view (and the resulting CSV file) 
    $this->set(compact('data','format')); 

    // Set calendar reminder to 1 hour
    $this->set('reminder_value',1);
    $this->set('reminder_unit','H');
  }
    
}
?>