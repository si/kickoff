<?php
switch($format) {

  case 'json':
    
    unset($data['User']);
    unset($data['Sport']);  

    header('Content-Disposition: attachment; filename="'.str_replace(' ','-',$data[0]['Calendar']['name']).'.json"');
    header('Content-type:text/json'); 
    
    echo json_encode($data);
    break;
  
  default:  // ICS
  
    header('Content-Disposition: attachment; filename="'.str_replace(' ','-',$data[0]['Calendar']['name']).'.ics"');
    header('Content-type:text/calendar'); 

    foreach($data[0]['Event'] as $event) : 
      echo "
BEGIN:VEVENT
UID:". md5($data[0]['Calendar']['name'] . $event['id']) . "
SUMMARY:".  $event['summary'] . "
LOCATION:" . $event['location'] . "
DTSTART;VALUE=DATETIME:".$this->Time->format('Ymd\THis\Z',$event['start']) . "
DTSTAMP:" . $this->Time->format('Ymd\THis\Z',$event['start']) . "
DTEND:" . $this->Time->format('Ymd\THis\Z',$event['end']) . "
DESCRIPTION:".  (($event['group']!='') ? 'Group: ' . $event['group'] . "\r\n" : '') . "
CLASS:PUBLIC
STATUS:FREE
X-MICROSOFT-CDO-BUSYSTATUS:FREE
END:VEVENT
";    

    endforeach; 
    ?>
<?php
  break;  // end ICS format
} // end foramt switch
?>