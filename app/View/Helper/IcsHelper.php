<?php
App::uses('HtmlHelper', 'View/Helper');

class IcsHelper extends HtmlHelper {

	var $helpers = array('Html', 'Form', 'Session');

	public function event($event) {
    $content = "BEGIN:VEVENT \n";
    $content .= "UID:" . $event['uid'] . "\n";
    $content .= "SUMMARY:". $event['summary'] . "\n";
    $content .= "LOCATION:". $event['location'] . "\n";
    $content .= "DTSTAMP:". $this->Time->format('Ymd\THis\Z',$event['start']) . "\n";
    $content .= "DTSTART;VALUE=DATETIME:". $this->Time->format('Ymd\THis\Z',$event['start']) . "\n";
    $content .= "DTEND:". $this->Time->format('Ymd\THis\Z',$event['ends']) . "\n";
    $content .= "DESCRIPTION:". $event['description'] . "\n";
    $content .= "CLASS:PUBLIC\n";
    $content .= "STATUS:FREE\n";
    $content .= "X-MICROSOFT-CDO-BUSYSTATUS:FREE\n";

    /*
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
    */

    $content .= "END:VEVENT\n";    
    return $content;
	}


}