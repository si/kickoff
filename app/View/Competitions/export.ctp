<?php
$competitionName = $data['Competition']['name'];
$fileName = str_replace(' ','-', $competitionName);

switch($format) {

  case 'json':

    header('Content-Disposition: attachment; filename="'.$fileName.'.json"');
    
    echo json_encode($data);
    break;
  
  default:  // ICS
  
    header('Content-Disposition: attachment; filename="'.$fileName.'.ics"');

    foreach($data['Event'] as $event) : 
      echo "BEGIN:VEVENT\n" 
          . "UID:". md5($competitionName . $event['id']) . "\n"
          . "SUMMARY:".  $event['summary'] . "\n"
          . "LOCATION:" . (
              (trim($event['location']) != '') 
              ? $event['location']
              : 'TBC'
            ) . "\n"
          . "DTSTART;VALUE=DATETIME:".$this->Time->format('Ymd\THis\Z',$event['start']) . "\n"
          . "DTSTAMP:" . $this->Time->format('Ymd\THis\Z',$event['start']) . "\n"
          . "DTEND:" . $this->Time->format('Ymd\THis\Z',$event['ends']) . "\n"
          . "DESCRIPTION:" . (
              ($event['grouping']!='') 
              ? 'Group: ' . $event['grouping']
              : ''
            ) . "\n"
          . "CLASS:PUBLIC\n"
          . "STATUS:FREE\n"
          . "X-MICROSOFT-CDO-BUSYSTATUS:FREE\n";

        if(isset($reminder_value) && isset($reminder_unit)){
          $reminder_date = '-P';
          switch($reminder_unit){
            default: 
            case 'H': 
            case 'M': 
            case 'S': 
              $reminder_date .= 'T' . (int)$reminder_value . $reminder_unit; 
              break;
            case 'D': 
              $reminder_date .= (int)$reminder_value . $reminder_unit; 
              break;
          }

          echo 'BEGIN:VALARM'."\n";
            echo 'ACTION:DISPLAY'."\n";
            echo 'DESCRIPTION:REMINDER'."\n";
            echo 'TRIGGER;RELATED=START:'.$reminder_date."\n";
          echo 'END:VALARM'."\n";
        }

        echo "END:VEVENT\n\n";

    endforeach; 

  break;  // end ICS format

} // end format switch
