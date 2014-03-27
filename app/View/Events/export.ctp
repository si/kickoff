<?php
switch($format) {

  case 'json':
    
    header('Content-Disposition: attachment; filename="'.str_replace(' ','-',$data[0]['Calendar']['name']).'.json"');
    header('Content-type:text/json'); 
    
    echo json_encode($data);
    break;
  
  default:  // ICS
    
    header('Content-Disposition: attachment; filename="'.str_replace(' ','-',$data[1]['Event']['summary']).'.ics"');
    header('Content-type:text/calendar'); 

    if($data[1]['Event']) : 
      echo "
BEGIN:VEVENT
UID:". md5($data[1]['Event']['id']) . "
SUMMARY:".  $data[1]['Event']['summary'] . "
LOCATION:" . $data[1]['Event']['location'] . "
DTSTART;VALUE=DATETIME:".$this->Time->format('Ymd\THis\Z',$data[1]['Event']['start']) . "
DTSTAMP:" . $this->Time->format('Ymd\THis\Z',$data[1]['Event']['start']) . "
DTEND:" . $this->Time->format('Ymd\THis\Z',$data[1]['Event']['end']) . "
DESCRIPTION:(" . $data[1]['Event']['group'] . ") " . $data[1]['Event']['description'] . "
CLASS:PUBLIC
STATUS:FREE
X-MICROSOFT-CDO-BUSYSTATUS:FREE
END:VEVENT
";    

    endif; 

  break;  // end ICS format
} // end foramt switch
?>