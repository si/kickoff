<?php
// It will be called downloaded.pdf
header('Content-Disposition: attachment; filename="'.$data[0]['Calendar']['name'].'.ics"');
?>
BEGIN:VCALENDAR
CALSCALE:GREGORIAN
METHOD:PUBLISH
X-WR-TIMEZONE;VALUE=TEXT:GMT
PRODID:-//kickoffcalendar.com//NONSGML v1.0//EN
X-WR-CALNAME;VALUE=TEXT:<?php echo $data[0]['Calendar']['name']."\r\n"; ?>
X-WR-RELCALID;VALUE=TEXT:<?php echo md5($data[0]['Calendar']['name'])."\r\n"; ?>
VERSION:2.0
<?php foreach($data[0]['Event'] as $event) : ?>
BEGIN:VEVENT
UID:<?php echo md5($data[0]['Calendar']['name'] . $event['id'])."\r\n"; ?>
SUMMARY:<?php echo $event['summary']."\r\n"; ?>
DESCRIPTION:<?php echo ((isset($event['group'])) ? $event['group']."\r\n" : '') . $event['description']."\r\n"; ?>
LOCATION:<?php echo $event['location']."\r\n"; ?>
DTSTART;VALUE=DATE-TIME:<?php echo $this->Time->format('Ymd\THis\Z',$event['start']) . "\r\n"; // 20091103T174500Z ?>
DTSTAMP;VALUE=DATE-TIME:<?php echo $this->Time->format('Ymd\THis\Z',$event['start']) . "\r\n"; ?>
DTEND;VALUE=DATE-TIME:<?php echo $this->Time->format('Ymd\THis\Z',$event['end']) . "\r\n"; ?>
CLASS:PUBLIC
STATUS:FREE
X-MICROSOFT-CDO-BUSYSTATUS:FREE
<?php
/*
ORGANIZER;CN=<?php echo $data[0]['User']['username']; ?>:MAILTO:<?php echo $data[0]['User']['email']."\r\n"; ?>
*/
?>
END:VEVENT
<?php endforeach; ?>
END:VCALENDAR
