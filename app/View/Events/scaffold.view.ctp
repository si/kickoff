<h1><?php echo $event['Event']['summary']; ?></h1>

<p class="lead">
  <?php 
  echo $this->Time->format('D j M Y g:ia', $event['Event']['start']) 
    . '–' 
    . $this->Time->format('g:ia', $event['Event']['end']); 
  ?>
</p>
<p><?php echo $event['Event']['location']; ?></p>

<p>Group: <?php echo $event['Event']['group']; ?></p>

<p><?php echo $event['Event']['description']; ?></p>



<small class="text-muted">Added to the <?php echo $this->Html->link($event['Calendar']['name'],array('controller'=>'calendars','action'=>'view',$event['Calendar']['id'])); ?> calendar 
on <?php echo $this->Time->nice($event['Event']['created']); ?></small>

<div class="btn-group btn-block">

  <?php echo $this->Html->link('<i class="icon-time"></i> Download'
    , array('action'=>'export', $event['Event']['id'])
    , array('class'=>'btn btn-info btn-sm', 'escape' => false));?>

  <?php echo $this->Html->link('<i class="icon-edit"></i> Edit'
    , array('action'=>'form', $event['Event']['id'])
    , array('class'=>'btn btn-default btn-sm', 'escape' => false));?>

  <?php echo $this->Html->link('<i class="icon-trash"></i> Delete'
    , array('action'=>'delete', $event['Event']['id'])
    , array('class'=>'btn btn-default btn-sm', 'escape' => false)
    , 'Are you sure you want to delete this event?');?>

  <?php echo $this->Html->link('<i class="icon-calendar"></i> Back to Calendar'
    , array('controller'=>'calendars', 'action'=>'view', $event['Calendar']['id'])
    , array('class'=>'btn btn-default btn-sm', 'escape' => false)); ?>

</div>

<?php
//var_dump($event);
?>