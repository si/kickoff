<?php
switch($format) {

  case 'json':
    
    header('Content-Disposition: attachment; filename="'.str_replace(' ','-',$data[0]['Calendar']['name']).'.json"');
    
    echo json_encode($data);
    break;
  
  default:  // ICS
    
    header('Content-Disposition: attachment; filename="'.str_replace(' ','-',$data[1]['Event']['summary']).'.ics"');

    if($data[1]['Event']) : 
      echo "BEGIN:VEVENT
UID:". md5($data[1]['Event']['id']) . "
SUMMARY:".  $data[1]['Event']['summary'] . "
LOCATION:" . ($data[1]['Event']['location']!='') ? $data[1]['Event']['location'] : 'TBC' . "
DTSTART;VALUE=DATETIME:".$this->Time->format('Ymd\THis\Z',$data[1]['Event']['start']) . "
DTSTAMP:" . $this->Time->format('Ymd\THis\Z',$data[1]['Event']['start']) . "
DTEND:" . $this->Time->format('Ymd\THis\Z',$data[1]['Event']['ends']) . "
DESCRIPTION:(" . $data[1]['Event']['grouping'] . ") " . $data[1]['Event']['description'] . "
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

    endif; 

  break;  // end ICS format
} // end foramt switch
?>