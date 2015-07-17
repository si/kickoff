<?php
class TeamsController extends AppController {

  var $name = 'Teams';
  var $scaffold;
  
	function beforeFilter() {
		parent::beforeFilter();
        $this->Auth->allow('index', 'view', 'import_events');
	}
	
	function beforeRender() {
	  parent::beforeRender();
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
		_debug($array);
		return $array;
	}
 
	function import_events($id='') {

		if($id!='') {

			// Get team details from ID
			$team = $this->Team->findById($id);
			$this->set('team', $team);
			//_debug($team);

			if(count($team)>0) {
				$source = $team['Team']['events_import_url'];
				echo 'Source: ' . $source . '<br/>';
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

				_debug($xml);

				$tables = 0;

				// Loop through tables (months)
				foreach($xml->table as $table) {
					echo '<li>' . $table->caption . ', ' . $tables . '<ul>';

					$month = $xml->h2[$tables];

					// Loop through each game
					if(isset($table->tbody->tr) && count($table->tbody->tr)>0) {

						foreach($table->tbody->tr as $row) {

							// Get values from table row
							$remote_id = (string) $row['id'];
							$competition = trim((string) $row->td[1]);
							$home_team = trim($row->td[2]->p->span[0]->a);
							$away_team = trim($row->td[2]->p->span[2]->a);
							$kickoff_date = trim($row->td[3]);
							$kickoff_time = trim($row->td[4]);

							// Build start field from date and time
							$kickoff_str = substr($kickoff_date, 0, -3) . ' ' . $month . ' ' . $kickoff_time;
							$kickoff = $this->_dateToArray($kickoff_str);

							// Create end field from start field + 110 minutes
							$ends = date_create($kickoff_str);
							$ends = date_add($ends, date_interval_create_from_date_string('110 minutes'));
							$ends = date_format($ends, 'c');
							$ends = $this->_dateToArray($ends);

							// Output scraped data
							echo '<li>' . $remote_id . ': ' . $competition . ' - ' . $home_team . ' v ' . $away_team . ' - ' . $kickoff_str;

							// Define data structure for saving
							$data = array(
								'Event' => array(
									'start' => $kickoff,
									'end' => $ends,
									'summary' => $home_team . ' v ' . $away_team,
									'home' => $home_team,
									'away' => $away_team,
									'group' => $competition,
									'remote_id' => $remote_id,
									'competition_id' => 1
								),
								// 'HomeTeam' => array(
								// 	'name' => $home_team,
								// ),
								// 'AwayTeam' => array(
								// 	'name' => $home_team,
								// ),
							);

							// Check for existing event based on remote ID
							$event = $this->Team->Event->findByRemoteId($remote_id);

							// Set id to record if found
							if(count($event)>0) $data['Event']['id'] = $event['Event']['id'];
							echo ', ID: ' . $data['Event']['id'];

							// Save (INSERT or UPDATE) all the data
							$savedResponse = $this->Team->Event->save($data);

							//echo ' (<em>' . var_dump($savedResponse) . '</em>)';

						}	// loop through rows (games)

						echo '</ul></li>';

					}	// if any rows

					$tables++;
					// if($tables==1) break;	// Limit to first month

				}	// loop tables

			}	/// end team data

		}

	}

}