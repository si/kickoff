<h1><?php echo $event['Event']['summary']; ?></h1>
<p class="lead"><?php echo $this->Time->format('D d M Y H:ia', $event['Event']['start']) . ', ' . $event['Event']['location']; ?></p>

<div>
<?php echo $this->Html->link('Edit',array('action'=>'edit',$event['Event']['id']),array('class'=>'btn btn-default btn-sm'));?>
<?php echo $this->Html->link('Delete',array('action'=>'delete',$event['Event']['id']),array('class'=>'btn btn-default btn-sm'),'Are you sure you want to delete this event?');?>
</div>

<?php echo $this->Html->link('Back to calendar',array('controller'=>'calendars','action'=>'view',$event['Calendar']['id'])); ?>
<?php
//var_dump($event);
?>