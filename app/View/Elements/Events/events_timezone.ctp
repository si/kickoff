<?php
if(count($events) > 0) {
  $start = new DateTime($events[0]['Event']['start'], new DateTimeZone('UTC'));
} else {
  $start = new DateTime('now', new DateTimeZone('UTC'));
}

if(isset($this->params['named']['timezone'])) {
  $start->setTimezone( new DateTimeZone( str_replace('-', '/', $this->params['named']['timezone'] ) ) );
}
?>
<a href="#timezones" class="timezone icon-left"><?php echo $start->format('T'); ?></a>
<?php echo $this->element('Modules/timezones'); ?>