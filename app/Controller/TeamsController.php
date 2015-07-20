<?php
class TeamsController extends AppController {

  var $name = 'Teams';
  var $scaffold;
  
	function beforeFilter() {
		parent::beforeFilter();
        $this->Auth->allow('index', 'view', 'export', 'import_events');
	}
	
	function beforeRender() {
	  parent::beforeRender();
	}

	function view($id='') {
		if($id!='') {
			// Set query parameters
		    $future_params = array(
		      'conditions' => array(),
		    );

		    // Find calendar details based on ID or slug
		    if(is_numeric($id)) {
			    $team = $this->Team->findById($id);
		    	$future_params['conditions']['or'][] = 'Event.home_team_id = ' . $id;
		    	$future_params['conditions']['or'][] = 'Event.away_team_id = ' . $id;
		    } else {
			    $team = $this->Team->findBySlug($id);
		    	$future_params['conditions']['or'][] = 'Event.home_team_id = ' . $team['Team']['id'];
		    	$future_params['conditions']['or'][] = 'Event.away_team_id = ' . $team['Team']['id'];
		    }
		    // Pass through Competition settings
		    $this->set('team', $team);
		
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
		    
		    $future_params['conditions']['and'][] = "Event.start >= '" . date('Y-m-d H:i:s',$start) . "'";
		    $future_params['conditions']['and'][] = "Event.end < '" . date('Y-m-d H:i:s',$end) . "'";

		    $this->set(compact('start','end'));
		    $this->set('future_params', $future_params);
		
		    $events = $this->Team->Event->find('all',$future_params);
		    $this->set('events', $events);
		
		}
	}

	function export($id='',$format='ics') { 

		$this->layout = $format.'/default';
		// Find fields needed without recursing through associated models 
		$data = $this->Team->find('all', 
			array( 
				'conditions' => array(
					'Team.id'=>$id
				),
			)
		);
		// Make the data available to the view (and the resulting CSV file) 
		$this->set(compact('data','format')); 

		// Set calendar reminder to 1 hour
		$this->set('reminder_value',1);
		$this->set('reminder_unit','H');

	}


	function _dateToArray($value) {
		$date = strtotime($value);
		$array = array(
			"year" => date('y', $date),
        	"month" => date('m', $date),
        	"day" => date('d', $date),
        	"hour" => date('H', $date),
		    'min' => date('i', $date),
        	//"meriden" => date('a', $date),
		);
		//_debug($array);
		return $array;
	}
 
	function import_events($id='') {

		$content = '';

		if($id!='') {

			// Get team details from ID
			$team = $this->Team->findById($id);
			$this->set('team', $team);

			//_debug($team);

			if(count($team)>0) {
				$source = $team['Team']['events_import_url'];
				$content .= 'Source: ' . $source . '<br/>';
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
				$start = strpos($response, '<div class="fixtures-table team-fixtures full-table-medium" id="fixtures-data">');
				$end = strpos($response, '<p class="disclaimer">');
				$length = $end - $start;
				$response = substr($response, $start, $length);

				//_debug($response);

				// Parse response as (valid) XML
				$xml = simplexml_load_string($response);

				//_debug($xml);

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
							$competition = trim((string) $row->td[1]);
							$home_team_name = trim($row->td[2]->p->span[0]->a);
							$away_team_name = trim($row->td[2]->p->span[2]->a);
							$kickoff_date = trim($row->td[3]);
							$kickoff_time = trim($row->td[4]);

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
										'sport_id' => 1			// TODO: set this dynamically some how!
									)
								);
								$home_team = $this->Team->save($home_team_data);
							}
							// Set home team id
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
										'sport_id' => 1			// TODO: set this dynamically some how!
									)
								);
								$away_team = $this->Team->save($away_team_data);
								$away_team_id = $away_team['id'];

							} else {
								// Set AWAY team id
								$away_team_id = $away_team['Team']['id'];
							}

							// Build start field from date and time
							$kickoff_str = substr($kickoff_date, 0, -3) . ' ' . $month . ' ' . $kickoff_time;
							$kickoff = $this->_dateToArray($kickoff_str);

							// Create end field from start field + 110 minutes
							$ends = date_create($kickoff_str);
							$ends = date_add($ends, date_interval_create_from_date_string('110 minutes'));
							$ends = date_format($ends, 'c');
							$ends = $this->_dateToArray($ends);

							// Output scraped data
							$content .= '<li>' . $remote_id . ': ' . $competition . ' - ' . $home_team_name . ' (' . $home_team_id . ') v ' . $away_team_name . ' (' . $away_team_id . ') - ' . $kickoff_str;

							// Define data structure for saving
							$data = array(
								'Event' => array(
									'start' => $kickoff,
									'end' => $ends,
									'summary' => $home_team_name . ' v ' . $away_team_name,
									'home' => $home_team_name,
									'away' => $away_team_name,
									'home_team_id' => $home_team_id,
									'away_team_id' => $away_team_id,
									'group' => $competition,
									'remote_id' => $remote_id,
									'competition_id' => 1
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

		} // end ID

		$this->set('content', $content);

	}

}