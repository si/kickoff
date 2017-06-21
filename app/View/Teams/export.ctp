<?php
switch($format) {

  case 'json':
    
    unset($data['Team']['events_import_url']);
    unset($data['Team']['created']);
    unset($data['Team']['updated']);
    unset($data['Team']['user_id']);
    unset($data['Team']['sport_id']);
    unset($data['Team']['theme_id']);
    unset($data['Theme']);
    unset($data['Location']['sport_id']);
    unset($data['User']);
    unset($data['Sport']);  

    header('Content-Disposition: attachment; filename="'.$data['Team']['slug'].'.json"');
    
    echo json_encode($data);
    break;
  
  default:  // ICS
  
    header('Content-Disposition: attachment; filename="'.$data['Team']['slug'].'.ics"');

    foreach($data['Event'] as $event) : 
      $data = [];
      $data['uid'] = md5($data['Team']['name'] . $event['id']);
      $data['summary'] = $event['summary'];
      $data['location'] = ( ( trim($event['location']) != '' ) ? $event['location'] : "TBC");
      $data['dtstart'] = $event['start'];
      $data['dtend'] = $event['ends'];
      $data['url'] = $_SERVER['SERVER_PROTOCOL'] . '://' . $_SERVER['SERVER_NAME'] . '/events/view/' . $event['id'];
      $data['description'] = 'Get match day details and directions at ' . $data['url'];
      
      echo $this->Ics->event($data);


    endforeach; 
    ?>
<?php
  break;  // end ICS format
} // end foramt switch
?>