<?php
class TeamsController extends AppController {

  var $name = 'Teams';
  var $scaffold;
  
	function beforeFilter() {
		parent::beforeFilter();
        $this->Auth->allow('index', 'view', 'export', 'import_events', 'by_competition');
	}
	
	function beforeRender() {
	  parent::beforeRender();
	}

	function index() {

		$conditions = array();
		if(isset($this->params['named']['letter'])) {
			$conditions[] = array("Team.name LIKE '" . $this->params['named']['letter'] . "%'");
		}

		$this->set('teams', $this->paginate('Team', $conditions));
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
		    $future_params['conditions']['and'][] = "Event.ends < '" . date('Y-m-d H:i:s',$end) . "'";

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

		// Save team subscription if logged in
		if($this->Session->read('Auth.User.id') != '') {

			$conditions = array(
				'Subscription.team_id' => $id,
				'Subscription.user_id' => $this->Session->read('Auth.User.id')
			);

			$data = array(
				'team_id' => $id,
				'user_id' => $this->Session->read('Auth.User.id')
			);

			// Check if any subs exist
			$subs = $this->Team->Subscription->find('first', array(
				'conditions' => $conditions
			));

			// Set sub ID if pre-exists
			if(count($subs) > 0) {
				$data['id'] = $subs['Subscription']['id'];
			}

			// Save
			$this->Team->Subscription->save(array('Subscription' => array($data)));
		}

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

		if($id=='') {
			// Get next empty/oldest import
			$options = array(
				'fields' => array('Team.id'),
				'conditions' => array(
					'events_import_url IS NOT NULL'
				),
				'order' => array(
					'events_import_updated ASC'
				)
			);
			$last_updated = $this->Team->find('first', $options);
			if(count($last_updated)>0) {
				$id = $last_updated['Team']['id'];
			}
		}

		// Get team details from ID
		$team = $this->Team->findById($id);
		$this->set('team', $team);

		//_debug($team);

		if(count($team)>0) {
			$source = $team['Team']['events_import_url'];
			$content .= 'Source: ' . $source . '<br/>';
			$sport_id = $team['Team']['sport_id'];
			$competition_id = $team['Team']['competition_id'];

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

						// Create starts date objects from string
						$starts = date_create($kickoff_str);

						// Set kickoff time to support BST 
						// store as UTC (-1h) between last Sun of Mar to last Sun of Oct
						$bst_start = strtotime('Last Sunday of March');
						$bst_end = strtotime('Last Sunday of October');
						if($starts >= $bst_start && $starts < $bst_end) {
							$starts = date_add($starts, date_interval_create_from_date_string('-1 hour'));
						}
						
						// Set base for end time
						$ends = $starts;
						
						// Convert start date obj to array
						$starts = date_format($starts, 'c');
						$kickoff = $this->_dateToArray($starts);

						// Set end field + 110 minutes (average football game duration)
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

    function by_competition($competition='') {
		$sql = "SELECT DISTINCT 
					`Team`.`id` AS `id`
					, `Team`.`name` AS `name`
					, `Team`.`slug` AS `slug`
					, `Competition`.`id` AS `id`
					, `Competition`.`name` AS `name`
					, `Competition`.`slug` AS `slug`
				FROM `events` AS `Event`
				LEFT JOIN `teams` AS `Team` ON `Event`.`home_team_id` = `Team`.`id`
				LEFT JOIN `competitions` AS `Competition` ON `Event`.`competition_id` = `Competition`.`id`
				WHERE `Competition`.`status` = 'L'
				AND `Event`.`season` = 2015
				ORDER BY `Competition`.`name` DESC, `Team`.`name` ASC";

        $this->set('teams', $this->Team->query($sql));
    }
	
	function slugify($team_id='') {
		$sql = "UPDATE `teams`
				SET `slug` = REPLACE(REPLACE(REPLACE(LOWER(`name`), '&', ''), ' ', '-'), '--', '-')";
		if($team_id!='') $sql .= ' WHERE `teams`.`id` = ' . $team_id;
		$this->set('sql',$sql);
		$this->set('response', $this->Team->query($sql) );
	}

}