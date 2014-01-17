<h1><?php echo $event['Event']['summary']; ?></h1>

<p class="lead"><?php echo $this->Time->format('D d M Y h:ia', $event['Event']['start']) . '–' . $this->Time->format('D d M Y h:ia', $event['Event']['end']); ?></p>
<p><?php echo $event['Event']['location']; ?></p>

<p><?php echo $event['Event']['group']; ?></p>

<p><?php echo $event['Event']['description']; ?></p>



<small class="text-muted">Added to the <?php echo $this->Html->link($event['Calendar']['name'],array('controller'=>'calendars','action'=>'view',$event['Calendar']['id'])); ?> calendar by <?php echo $this->Html->link($event['User']['username'],array('controller'=>'users','action'=>'view',$event['Event']['user_id'])); ?></small>

<div>
<?php echo $this->Html->link('Edit',array('action'=>'edit',$event['Event']['id']),array('class'=>'btn btn-default btn-sm'));?>
<?php echo $this->Html->link('Delete',array('action'=>'delete',$event['Event']['id']),array('class'=>'btn btn-default btn-sm'),'Are you sure you want to delete this event?');?>
</div>

<?php echo $this->Html->link('Back to calendar',array('controller'=>'calendars','action'=>'view',$event['Calendar']['id'])); ?>
<?php
//var_dump($event);
?>