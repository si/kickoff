<h1><?php echo $calendar['Calendar']['name']; ?></h1>
<?php if( $calendar['Calendar']['description']!='') : ?>
<p class="lead"><?php echo $calendar['Calendar']['description']; ?></p>
<?php endif; ?>

<p><small>
  Created on <?php echo $this->Time->niceShort($calendar['Calendar']['created']); ?> 
  <?php if(isset($calendar['User'])) : ?> 
    by <?php echo $this->Html->link($calendar['User']['username'],array('controller'=>'users','action'=>'view',$calendar['User']['id'])); ?> 
  <?php endif; ?>
  in <?php echo $this->Html->link($calendar['Sport']['name'],array('controller'=>'sports','action'=>'view',$calendar['Sport']['id'])); ?>
</small></p>

<div class="clearfix">

<div class="pull-left">
<?php echo $this->Html->link('Subscribe',array('action'=>'export',$calendar['Calendar']['id']),array('class'=>'btn btn-large')); ?>
<?php echo $this->Html->link('Add Event',array('controller'=>'events','action'=>'form','calendar'=>$calendar['Calendar']['id']),array('class'=>'btn btn-large')); ?>
</div>

<div class="pull-right">
<?php echo $this->Html->link('Edit',array('action'=>'edit',$calendar['Calendar']['id']),array('class'=>'btn')); ?>
<?php //echo $this->Html->link('Delete',array('action'=>'delete',$calendar['Calendar']['id']),array('class'=>'btn btn-warning'),'Are you sure you want to delete this calendar?'); ?>
<?php echo $this->Html->link('Export',array('action'=>'export',$calendar['Calendar']['id'],'json'),array('download'=>true, 'class'=>'btn ')); ?>
</div>

</div>

<?php
if(count($future_events)>0) : 
  
  echo $this->element('events_grid',array('events'=>$future_events,'context'=>'upcoming')); 
      
else: ?>
<div class="well">
  <p class="lead">No upcoming events. <?php echo $this->Html->link('Add one!',array('controller'=>'events','action'=>'form','calendar'=>$calendar['Calendar']['id'])); ?></p>
</div>
<?php endif; ?>

<?php 
if(count($past_events)>0) : 
  echo $this->element('events_table',array('events'=>$past_events,'context'=>'previous')); 
endif; 
?>

<?php echo $this->Html->link('Add Event',array('controller'=>'events','action'=>'form','calendar'=>$calendar['Calendar']['id']),array('class'=>'btn btn-large')); ?>
