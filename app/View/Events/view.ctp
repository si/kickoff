<?php
$title = 'Kick Off Calendars';
if(isset($event)) $title = $event['Event']['summary'] . ' - ' . $title;
$this->viewVars['title_for_layout'] = $title;
?>
<h1 class="vs">
  <?php echo $this->Html->link($event['HomeTeam']['name'], array('controller'=>'teams','action'=>'view', $event['HomeTeam']['id'])); ?>
  <abbr title="versus">v</abbr>
  <?php echo $this->Html->link($event['AwayTeam']['name'], array('controller'=>'teams','action'=>'view', $event['AwayTeam']['id'])); ?>
</h1>

<time class="dtstart dtstamp">
  <span class="date">
    <?php echo $this->Time->format('D j M Y', $event['Event']['start']); ?>
  </span>
  <span class="time">
    <?php echo $this->Time->format('g:ia', $event['Event']['start']); ?>
  </span>
</time>

<p class="location"><?php echo $event['Event']['location']; ?></p>

<?php if($event['Event']['grouping']!='') : ?>
  <p>Group: <?php echo $event['Event']['grouping']; ?></p>
<?php endif; ?>

<?php if($event['Event']['description']!='') : ?>
  <p><?php echo $event['Event']['description']; ?></p>
<?php endif; ?>

<?php echo $this->Html->link('Download'
  , array('action'=>'export', $event['Event']['id'])
  , array('class'=>'btn btn-large'));?>

<p><small>
  <?php 
    echo $this->Html->link(
      $event['Competition']['name'],
      array('controller'=>'competitions','action'=>'view',$event['Competition']['id']),
      array('class'=>'competition')
    ); ?> 
  <time><?php echo $this->Time->nice($event['Event']['created']); ?></time>
</small></p>


<dl class="footnotes">
  <dt id="end_times">1</dt>
  <dd>End times are approximations based on average event durations</dd>
</dl>

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