<?php
switch($format) {

  case 'json':
    
    unset($data['User']);
    unset($data['Sport']);  

    header('Content-Disposition: attachment; filename="'.$data['Team']['slug'].'.json"');
    
    echo json_encode($data);
    break;
  
  default:  // ICS
  
    header('Content-Disposition: attachment; filename="'.$data['Team']['slug'].'.ics"');

    foreach($data['Event'] as $event) : 
      echo "
BEGIN:VEVENT
UID:". md5($data['Team']['name'] . $event['id']) . "
SUMMARY:".  $event['summary'] . "
LOCATION:" . ( ( trim($event['location']) != '' ) ? $event['location'] : "TBC") . "
DTSTART;VALUE=DATETIME:".$this->Time->format('Ymd\THis\Z',$event['start']) . "
DTSTAMP:" . $this->Time->format('Ymd\THis\Z',$event['start']) . "
DTEND:" . $this->Time->format('Ymd\THis\Z',$event['ends']) . "
DESCRIPTION:".  (($event['grouping']!='') ? 'Group: ' . $event['grouping'] . "\n" : '') . "
CLASS:PUBLIC
STATUS:FREE
X-MICROSOFT-CDO-BUSYSTATUS:FREE\n";

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

      echo "END:VEVENT\n";    

    endforeach; 
    ?>
<?php
  break;  // end ICS format
} // end foramt switch
?>