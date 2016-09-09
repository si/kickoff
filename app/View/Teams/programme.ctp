<?php
$title = 'Kick Off Calendars';
if(isset($team)) $title = $team['Team']['name'] . ' kick off programme - ' . $title;
$this->viewVars['title_for_layout'] = $title;
?>

<h1><?php echo $team['Team']['name']; ?> <span class="description">kick off programme</span></h1>

<div class="cta">
  <?php echo $this->Html->link('Add to Calendar',array('action'=>'export',$team['Team']['id']),array('class'=>'btn btn-large', 'type'=>'text/calendar')); ?>
</div>

<?php
echo $this->element('Events/event_formats',array('view'=>'programme')); 
?>

<?php
echo $this->element('Events/events_list',array('events'=>$events, 'team_id'=>$team['Team']['id'])); 
?>

<?php
echo $this->element('Teams/team_meta'); 
?>

<?php
echo $this->element('Teams/team_secondary_cta'); 
?>
