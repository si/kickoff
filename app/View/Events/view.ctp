<?php
$title = 'Kick Off Calendars';
if(isset($event)) $title = $event['Event']['summary'] . ' - ' . $title;
$this->viewVars['title_for_layout'] = $title;
?>
<h1 class="summary vs">
  <?php echo $this->Html->link($event['HomeTeam']['name'], array('controller'=>'teams','action'=>'view', $event['HomeTeam']['id'])); ?>
  <abbr title="versus">v</abbr>
  <?php echo $this->Html->link($event['AwayTeam']['name'], array('controller'=>'teams','action'=>'view', $event['AwayTeam']['id'])); ?>
</h1>

<time class="dtstart dtstamp">
  <span class="date">
    <?php echo $this->Time->format('D j\<\s\u\p\>S\<\/\s\u\p\> M Y', $event['Event']['start']); ?>
  </span>
  <span class="time">
    <span class="hour"><?php echo $this->Time->format('g', $event['Event']['start']); ?></span><span class="separator">:</span><span class="minute"><?php echo $this->Time->format('i', $event['Event']['start']); ?></span>
    <span class="ordinal"><?php echo $this->Time->format('a', $event['Event']['start']); ?></span>
    <span class="timezone"><?php echo $this->Time->format('T', $event['Event']['start']); ?></span>
  </span>
</time>

<?php if($event['Event']['description']!='') : ?>
  <p><?php echo $event['Event']['description']; ?></p>
<?php endif; ?>

<div class="cta">
  <?php echo $this->Html->link('Add to Calendar'
  , array('action'=>'export', $event['Event']['id'])
  , array(
    'class'=>'btn btn-large',
    'type'=>'text/calendar'
  ));?>
</div>

<p><small>
  <?php 
    echo $this->Html->link(
      $event['Competition']['name'],
      array('controller'=>'competitions','action'=>'view',$event['Competition']['id']),
      array('class'=>'competition')
    ); ?> 
  <?php if($event['Event']['location']) : ?>
    <p class="location"><?php echo $event['Event']['location']; ?></p>
  <?php endif; ?>
</small></p>


<div class="btn-group btn-block">

  <?php echo $this->Html->adminLink('Edit'
    , array('action'=>'form', $event['Event']['id'])
    , array('class'=>'btn btn-default btn-sm'));?>

  <?php echo $this->Html->adminPostLink( 'Delete',
      array('action' => 'delete', $event['Event']['id']),
      array('confirm' => 'Are you sure?', 'class'=>'btn btn-sm') );
  ?>

</div>

<?php echo $this->Html->link('Back to Calendar'
  , array('controller'=>'competitions', 'action'=>'view', $event['Competition']['id'])
  ); ?>

<?php
//var_dump($event);
?>