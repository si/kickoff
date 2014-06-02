<?php header('Content-type:text/calendar'); ?>
BEGIN:VCALENDAR
CALSCALE:GREGORIAN
METHOD:PUBLISH
X-WR-TIMEZONE;VALUE=TEXT:GMT
PRODID:-//kickoffcalendars.com//NONSGML v1.0//EN
X-WR-CALNAME;VALUE=TEXT:<?php 
if (isset($data[0]['Calendar']['name'])) echo $data[0]['Calendar']['name'] . ' ';
if (isset($data[1]['Event'])) echo $data[1]['Event']['summary'] . ' - ';
echo "KickOff Calendar\r\n"; ?>
VERSION:2.0
<?php echo $content_for_layout; ?>
END:VCALENDAR