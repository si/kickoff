<?php
class EventsController extends AppController {

  var $name = 'Events';
  var $components = array('RequestHandler');

  var $scaffold;
  
	function beforeFilter() {
		parent::beforeFilter();
    $this->Auth->allow('view', 'export', 'share', 'vs');
	}
	
	function beforeRender() {
	  parent::beforeRender();
	}
	
  function view($id='') {
    if($id!='') {
      $event = $this->Event->findById($id);
      $this->set('event', $event);

      if(count($event['Competition'])>0) {
        $this->set('competition', $this->Event->Competition->findById($event['Competition']['id']));
      }
    }
  }

	function form($id='') {
	  if(isset($this->data) && count($this->data)>0) {
	    $form_data = $this->data;
  	  $form_data['Event']['start'] = uk_date_to_mysql($this->data['Event']['start']);
  	  $form_data['Event']['ends'] = uk_date_to_mysql($this->data['Event']['ends']);
  	  
  	  // Check home team exists
      $query = array(
        'conditions' => array('HomeTeam.name'=>$this->data['Event']['home']),
        'order' => array('HomeTeam.created DESC')
      );
  	  $home_team = $this->Event->HomeTeam->find('first', $query);
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
      $query = array(
        'conditions' => array('AwayTeam.name'=>$this->data['Event']['away']),
        'order' => array('AwayTeam.created DESC')
      );
  	  $away_team = $this->Event->AwayTeam->find('first', $query);
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

  	$this->set('competitions', $this->Event->Competition->find('list'));
  	$this->set('locations', $this->Event->Location->find('list')); 

    if(isset($this->params['named']['competition']) || (isset($this->data['Event']) && $this->data['Event']['competition_id']!='')) {
      $competition = isset($this->data['Event']['competition_id']) ? $this->data['Event']['competition_id'] : $this->params['named']['competition'];
      $this->set('competition', $this->Event->Competition->findById($competition));
    }
  	
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
          'Event.ends',
          'Event.summary',
          'Event.location',
          'Event.grouping',
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
	      'ends' => 'Ends', 
	      'summary' => 'Summary', 
	      'location' => 'Location',
	      'grouping' => 'Group',
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
  
  function share($id='') {
    if($id!='') {
      $this->set('event', $this->Event->findById($id));
    }
  }

  function bulk() {
      
  }

	public function vs($team_a = '', $team_b = '') {
		echo '<label>Data <textarea>'; var_dump($this->params->query); echo '</textarea></label>';

    if( isset($this->params->query['TeamA']) && isset($this->params->query['TeamB']) ) {
      echo 'Gotcha!';
  		$events = $this->Event->find('first', array(
        'conditions'=> array(
          'HomeTeam.name' => $this->params->query['TeamA'],
          'AwayTeam.name' => $this->params->query['TeamB'],
        ),
        'order' => array('Event.start ASC')
      ));
  		echo '<label>Events <textarea>'; var_dump($events); echo '</textarea></label>';
    } 

	}
}