<?php
// It will be called downloaded.pdf
header('Content-Disposition: attachment; filename="'.str_replace(' ','-',$data[0]['Calendar']['name']).'.ics"');
header('Content-type:text/calendar'); 
?>
BEGIN:VCALENDAR
CALSCALE:GREGORIAN
METHOD:PUBLISH
X-WR-TIMEZONE;VALUE=TEXT:GMT
PRODID:-//unstyled.com//NONSGML v1.0//EN
X-WR-CALNAME;VALUE=TEXT:<?php echo $data[0]['Calendar']['name']; ?>
VERSION:2.0
<?php 
foreach($data[0]['Event'] as $event) : 
  echo '
BEGIN:VEVENT
UID:'. md5($data[0]['Calendar']['name'] . $event['id']) . '
SUMMARY:'. echo $event['summary'] . '
DESCRIPTION:' . $domain['Domain']['domain_name'] . ' is due to expire today
LOCATION:' . $event['location'] . '
DTSTART;VALUE=DATETIME:'.$this->Time->format('Ymd\This\Z',$event['start']) . '
DTSTAMP:' . $this->Time->format('Ymd\This\Z',$event['start']) . '
DTEND;VALUE=DATETIME:' . $this->Time->format('Ymd\THis\Z',$event['end']) . '
CLASS:PUBLIC
STATUS:FREE
X-MICROSOFT-CDO-BUSYSTATUS:FREE
END:VEVENT
';

/*
DESCRIPTION: 
$description = '';
if(isset($event['group'])) $description = $event['group'];
if(isset($event['description'])) $description .= "\n".$event['description']."\n";
echo strtr($description,'\n',"\\n") ; 
ORGANIZER;CN=<?php echo $data[0]['User']['username']; ?>:MAILTO:<?php echo $data[0]['User']['email']."\r\n"; ?>
*/

endforeach; ?>
END:VCALENDAR
