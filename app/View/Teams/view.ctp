<?php
$title = 'Kick Off Calendars';
if(isset($team)) $title = $team['Team']['name'] . ' - ' . $title;
$this->viewVars['title_for_layout'] = $title;
?>

<h1><?php echo $team['Team']['name']; ?> <span class="description">kick off times</span></h1>

<div class="cta">
  <?php echo $this->Html->link('Add to calendar',array('action'=>'export',$team['Team']['id']),array('class'=>'btn btn-large', 'type'=>'text/calendar', 'title'=>'Add kick off times to your calendar')); ?>
</div>

<?php
echo $this->element('Events/event_formats',array('view'=>'view')); 
?>

<?php
echo $this->element('Events/events_grid',array('events'=>$events,'context'=>'upcoming')); 
?>

<?php
echo $this->element('Teams/team_meta'); 
?>

<?php
echo $this->element('Teams/team_secondary_cta'); 
?>
