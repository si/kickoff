<?php
$title = 'Kick Off Calendars';
if(isset($team)) $title = 'Next game for ' . $team['Team']['name'] . ' - ' . $title;
$this->viewVars['title_for_layout'] = $title;
?>

<?php
echo $this->element('Events/event_view', array('event'=>$team['Event'][0])); 
?>
