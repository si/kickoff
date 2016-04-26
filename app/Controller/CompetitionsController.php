<?php
class CompetitionsController extends AppController {

    public $name = 'Competitions';
    public $helpers = array('Time','Form');
    public $components = array('RequestHandler');

    public $scaffold;
  
	function beforeFilter() {
		parent::beforeFilter();
        $this->Auth->allow('index', 'view', 'export','import_events');
	}
	
	function beforeRender() {
        parent::beforeRender();
	}
	
    function index() {
        $settings = array(
            'order' => array('Competition.status DESC')
        );

        if( !$this->Session->read('Auth.User.is_admin') ) $settings['conditions'][] = "Competition.status = 'L'";
        
        $this->set('competitions', $this->Competition->find('all', $settings));
    }
    
	function form($id='') {
	
		if(isset($this->data) && count($this->data)>0) {
			$this->Competition->save($this->data);
			$this->redirect(array('action'=>'view',$this->Competition->id));
		}
	
		if($id!='') {
			$this->data = $this->Competition->findById($id);
		}

		$this->set('sports', $this->Competition->Sport->find('list'));
		$this->set('themes', $this->Competition->Theme->find('list'));
		$this->set('status', array(
            'D' => 'Draft',
            'L' => 'Live',
            'A' => 'Archive',
        ));
  	
	}

	function view($id='') {
		
		// Set query parameters
	    $future_params = array(
	      'conditions' => array(),
	    );

	    // Find calendar details based on ID or slug
	    if(is_numeric($id)) {
		    $competition = $this->Competition->findById($id);
	    } else {
		    $competition = $this->Competition->findBySlug($id);
	    }
	    // Pass through Competition settings
	    $this->set('competition', $competition);
    	$future_params['conditions'][] = 'Event.competition_id = ' . $competition['Competition']['id'];
	
	    // Set month to passed parameter if defined, current month if not
	    if(isset($this->params['named']['month'])) {
	      $start = strtotime($this->params['named']['month']."-01 00:00:00");
	    } else {
	      $start = strtotime(date('Y-m')."-01 00:00:00");
	    } 

	    // Set end date to passed parameter if defined, next month if not
	    if(isset($this->params['named']['end'])) {
	      $end = strtotime($this->params['named']['end']."-01 00:00:00");
	    } else {
	      $end = strtotime('+1 month',$start);
	    } 
	    
	    $future_params['conditions'][] = "Event.start >= '" . date('Y-m-d H:i:s',$start) . "'";
	    $future_params['conditions'][] = "Event.start < '" . date('Y-m-d H:i:s',$end) . "'";

	    $this->set(compact('start','end'));
	    $this->set('future_params', $future_params);
	
	    $events = $this->Competition->Event->find('all',$future_params);
	    $this->set('events', $events);
	
	    $export_data = array();
	
	    if(count($events)>0) {
	      $export_data['calendar'] = array(
	        'id' => $events[0]['Competition']['id'],
	        'name' => $events[0]['Competition']['name'],
	        'description' => $events[0]['Competition']['description'],
	        'theme_id' => $events[0]['Competition']['theme_id'],
	        'created' => $events[0]['Competition']['created'],
	        'url' => 'http://' . $_SERVER['SERVER_NAME'] . '/competitions/view/' . $id,
	        'ics_url' => 'http://' . $_SERVER['SERVER_NAME'] . '/competitions/export/' . $id,
	      );
	      foreach($events as $event) {
	        $export_data['events'][] = array(
	          'event_id' => $event['Event']['id'],
	          'start' => $event['Event']['start'],
	          'end' => $event['Event']['ends'],
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
	          'group' => $event['Event']['grouping'],
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
    $data = $this->Competition->find( 
      'all', 
      array( 
//        'fields' => array('Competition.name','Competition.description','Event.id','Event.start','Event.end','Event.summary','Event.location','Event.created'), 
        'conditions' => array('Competition.id'=>$id),
//        'order' => array("Event.created ASC"), 
      )
    ); 
    // Make the data available to the view (and the resulting CSV file) 
    $this->set(compact('data','format')); 

    // Set calendar reminder to 1 hour
    $this->set('reminder_value',1);
    $this->set('reminder_unit','H');

    // Save subscription to competition and store response
    $subscription = $this->requestAction('/subscriptions/add/competition/' . $id, ['return']);

  }

  function import_events($id='') {
  	// For one-off competitions
  	// Example: http://www.bbc.co.uk/sport/rugby-union/world-cup/fixtures

	$content = '';

	// Get competition details from ID
	$competition = $this->Competition->findById($id);
	$this->set('competition', $competition);

	//_debug($team);

	if(count($competition)>0) {
		//$source = $competition['Competition']['events_import_url'];
		$source = 'http://kickoff.dev/bbc-rwc-2015.html';
		$content .= 'Source: ' . $source . '<br/>';
		$sport_id = $competition['Competition']['sport_id'];
		$competition_id = $id;

		// CURL the source
		if(!function_exists('curl_init')) {
			die('cURL is not installed.');
		}

		$ch = curl_init();
     	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     	curl_setopt($ch, CURLOPT_URL, $source);
     	//curl_setopt($c, CURLOPT_CONNECTTIMEOUT, 2);
     	//curl_setopt($c, CURLOPT_TIMEOUT, 4);
     	//curl_setopt($c, CURLOPT_USERAGENT, "Scraper");
     	//curl_setopt($c, CURLOPT_FOLLOWLOCATION,1);
     	$response = curl_exec($ch);
     	curl_close($ch);

     	// Limit response to content required
		$start = strpos($response, '<div id="rugby-match-list" class="component">');
		$end = strpos($response, '<p class="disclaimer');
		$length = $end - $start;
		$response = substr($response, $start, $length);

		//_debug($response);

		// Parse response as (valid) XML
		$xml = simplexml_load_string($response);

		_debug($xml);
		exit;

		$tables = 0;

		// Loop through tables (months)
		foreach($xml->table as $table) {
			$content .= '<li>' . $table->caption . ', ' . $tables . '<ul>';

			$month = $xml->h2[$tables];

			// Loop through each game
			if(isset($table->tbody->tr) && count($table->tbody->tr)>0) {

				foreach($table->tbody->tr as $row) {

					// Get values from table row
					$remote_id = (string) $row['id'];
					$competition_name = trim((string) $row->td[1]);
					$home_team_name = trim($row->td[2]->p->span[0]->a);
					$away_team_name = trim($row->td[2]->p->span[2]->a);
					$kickoff_date = trim($row->td[3]);
					$kickoff_time = trim($row->td[4]);

					// Find competition as main name
					$conditions = array(
						"Competition.name LIKE '%" . $competition_name . "%'",
					);
					$competition = $this->Team->Competition->find('first', array('conditions'=>$conditions));

					// If not found, create competition
					if(!$competition) {
						$competition_data = array(
							'Competition' => array(
								'name' => $competition_name,
								'sport_id' => $sport_id
							)
						);
						$competition = $this->Team->Competition->save($competition_data);
					}
					// Get competition id
					$competition_id = (isset($competition['Competition'])) ? $competition['Competition']['id'] : $competition['id'];

					// Find home team as main name or alias
					$conditions = array(
						'or' => array(
							'Team.name' => $home_team_name,
							"Team.aliases LIKE '%" . $home_team_name . "%'",
						)
					);
					$home_team = $this->Team->find('first', array('conditions'=>$conditions));

					// If not found, create
					if(!$home_team) {
						$home_team_data = array(
							'Team' => array(
								'name' => $home_team_name,
								'sport_id' => $sport_id
							)
						);
						$home_team = $this->Team->save($home_team_data);
					}
					// Get home team id
					$home_team_id = (isset($home_team['Team'])) ? $home_team['Team']['id'] : $home_team['id'];

					// Find away team as main name or alias
					$conditions = array(
						'or' => array(
							'Team.name' => $away_team_name,
							"Team.aliases LIKE '%" . $away_team_name . "%'",
						)
					);
					$away_team = $this->Team->find('first', array('conditions'=>$conditions));

					// If not found, create
					if(!$away_team) {
						$away_team_data = array(
							'Team' => array(
								'name' => $away_team_name,
								'sport_id' => $sport_id
							)
						);
						$away_team = $this->Team->save($away_team_data);
					}
					//var_dump($away_team); echo '<hr>';
					$away_team_id = (isset($away_team['Team'])) ? $away_team['Team']['id'] : $away_team['id'];

					// Build start field from date and time
					$kickoff_str = substr($kickoff_date, 0, -3) . ' ' . $month . ' ' . $kickoff_time;
					$kickoff = $this->_dateToArray($kickoff_str);

					// Create end field from start field + 110 minutes
					$ends = date_create($kickoff_str);
					$ends = date_add($ends, date_interval_create_from_date_string('110 minutes'));
					$ends = date_format($ends, 'c');
					$ends = $this->_dateToArray($ends);

					// Output scraped data
					$content .= '<li>' . $remote_id . ': ' . $competition_name . ' (' . $competition_id . ') - ' . $home_team_name . ' (' . $home_team_id . ') v ' . $away_team_name . ' (' . $away_team_id . ') - ' . $kickoff_str;

					// Define data structure for saving
					$data = array(
						'Event' => array(
							'start' => $kickoff,
							'end' => $ends,
							'summary' => $home_team['Team']['name'] . ' v ' . $away_team['Team']['name'],
							'home' => $home_team_name,
							'away' => $away_team_name,
							'home_team_id' => $home_team_id,
							'away_team_id' => $away_team_id,
							'group' => $competition_name,
							'remote_id' => $remote_id,
							'competition_id' => $competition_id
						),
					);

					// Check for existing event based on remote ID
					$event = $this->Team->Event->findByRemoteId($remote_id);

					// Set id to record if found
					if(count($event)>0) $data['Event']['id'] = $event['Event']['id'];
					$content .= ', ID: ' . $data['Event']['id'];

					// Save (INSERT or UPDATE) all the data
					$savedResponse = $this->Team->Event->save($data);

					//echo ' (<em>' . var_dump($savedResponse) . '</em>)';

				}	// loop through rows (games)

				$content .= '</ul></li>';

			}	// if any rows

			$tables++;
			//if($tables==1) break;	// Limit to first month

		}	// loop tables

	}	/// end team data

	// Update import updated 
	$this->Team->save( array(
		'id' => $id, 
		'events_import_updated' => $this->_dateToArray('now')
	));

	$this->set('content', $content);

  }

}
