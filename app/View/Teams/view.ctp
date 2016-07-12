<?php
$title = 'Kick Off Calendars';
if(isset($team)) $title = $team['Team']['name'] . ' - ' . $title;
$this->viewVars['title_for_layout'] = $title;
?>

<h1><?php echo $team['Team']['name']; ?></h1>

<div class="cta">
  <?php echo $this->Html->link('Add to Calendar',array('action'=>'export',$team['Team']['id']),array('class'=>'btn btn-large', 'type'=>'text/calendar')); ?>
</div>

<ul class="shortcuts">
  <li><?php echo $this->Html->link('Calendar', '/teams/view/' . $team['Team']['slug']); ?></li>
  <li><?php echo $this->Html->link('Table', '/teams/view/' . $team['Team']['slug'] . '/view:table/end:2017-06-01'); ?></li>
</ul>
<?php
//_debug($events);
if($view == 'table') {
  echo $this->element('Events/events_table',array('events'=>$events, 'team_id'=>$team['Team']['id'])); 
} else {
  echo $this->element('Events/events_grid',array('events'=>$events,'context'=>'upcoming')); 
}
?>

<p class="meta">
  <?php
  if( isset($team['Competition']['id']) ) {
    $competition = $team['Competition'];
  } elseif( count($events) > 0 && isset($events[0]['Competition']) ) {
    $competition = $events[0]['Competition'];
  }
  if(isset($competition)) echo $this->Html->competitionLink($competition);
  ?>
  
  <?php echo $this->Html->locationLink($team['Location']); ?>

  <?php
  // Show Twitter handle if set
  if( isset($team['Team']['twitter']) ) {
    echo $this->Html->link(
      '@' . $team['Team']['twitter'], 
      'https://twitter.com/'.$team['Team']['twitter'],
      array('class'=>'i-twitter')
    );
  }
  ?>
  <?php
  // Show website if set
  if( isset($team['Team']['website']) ) {
    $display = str_replace(array('http://','https://', 'www.', '/'), '', $team['Team']['website']);
    echo $this->Html->link(
      $display, 
      $team['Team']['website'],
      array('class'=>'i-url')
    );
  }
  ?>
</p>
<div class="admin-cta">
  <?php echo $this->Html->adminLink('Add Event',array('controller'=>'events','action'=>'form','home_team_id'=>$team['Team']['id']),array('class'=>'btn')); ?>
  <?php echo $this->Html->adminLink('Edit',array('action'=>'form',$team['Team']['id']),array('class'=>'btn')); ?>
  <?php echo $this->Html->link('Export as JSON',array('action'=>'export',$team['Team']['slug'],'json'),array('class'=>'btn ')); ?>
  <?php echo $this->Html->adminLink('Sync',array('action'=>'import_events',$team['Team']['id']),array('class'=>'btn ')); ?>
  <?php echo $this->Html->adminPostLink( 'Delete',
      array('action' => 'delete', $team['Team']['id']),
      array('confirm' => 'Are you sure?', 'class'=>'btn') );
  ?>
</div>
