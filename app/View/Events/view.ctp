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
<p class="lead">
  <?php 
  echo $this->Time->format('D j M Y g:ia', $event['Event']['start']) 
    . '–' 
    . $this->Time->format('g:ia', $event['Event']['ends']); 
  ?><sup><a href="#end_times">1</a></sup>
</p>

<p><?php echo $event['Event']['location']; ?></p>
<p>Group: <?php echo $event['Event']['grouping']; ?></p>
<p><?php echo $event['Event']['description']; ?></p>

<div class="btn-group btn-block">

  <?php echo $this->Html->link('Download'
    , array('action'=>'export', $event['Event']['id'])
    , array('class'=>'btn btn-info btn-sm'));?>

  <?php echo $this->Html->adminLink('Edit'
    , array('action'=>'form', $event['Event']['id'])
    , array('class'=>'btn btn-default btn-sm'));?>

  <?php echo $this->Html->adminPostLink( 'Delete',
      array('action' => 'delete', $event['Event']['id']),
      array('confirm' => 'Are you sure?', 'class'=>'btn btn-sm') );
  ?>

  <?php echo $this->Html->link('Back to Calendar'
    , array('controller'=>'competitions', 'action'=>'view', $event['Competition']['id'])
    , array('class'=>'btn btn-default btn-sm')); ?>

</div>

<p><small>Added to  
  <?php echo $this->Html->link($event['Competition']['name'],array('controller'=>'competitions','action'=>'view',$event['Competition']['id'])); ?> 
  on <?php echo $this->Time->nice($event['Event']['created']); ?>
</small></p>


<dl class="footnotes">
  <dt id="end_times">1</dt>
  <dd>End times are approximations based on average event durations</dd>
</dl>
<?php
//var_dump($event);
?>