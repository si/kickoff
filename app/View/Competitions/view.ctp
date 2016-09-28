<?php
$this->viewVars['title_for_layout'] = $competition['Competition']['name'] . ' - Kick Off Calendar';
?>

<h1><?php echo $competition['Competition']['name']; ?> <span class="description">kick off times</span></h1>

<?php if( $competition['Competition']['description']!='') : ?>
<p class="lead"><?php echo $competition['Competition']['description']; ?></p>
<?php endif; ?>
    

<div class="cta">
  <?php echo $this->Html->link('Add to Calendar',array('action'=>'export',$competition['Competition']['id']),array('class'=>'btn btn-large', 'type'=>'text/calendar', 'title'=>'Add kick off times to your calendar'
)); ?>
</div>

<?php echo $this->element('Ads/google'); ?>

<?php echo $this->element('Events/events_grid',array('events'=>$events,'context'=>'upcoming')); ?>
    
<p><small>
  <?php echo $this->Html->link($competition['Sport']['name'],array('controller'=>'sports','action'=>'view',$competition['Sport']['id']), array('class'=>'sport')); ?>
</small></p>

<menu>
  <?php echo $this->Html->adminLink('Add Event',array('controller'=>'events','action'=>'form','competition'=>$competition['Competition']['id']),array('class'=>'btn btn-small')); ?>
  <?php echo $this->Html->link('Export',array('action'=>'export',$competition['Competition']['id'],'json'),array('download'=>true, 'class'=>'btn btn-small')); ?>
  <?php echo $this->Html->adminLink('Edit',array('action'=>'form',$competition['Competition']['id']),array('class'=>'btn btn-small')); ?>
  <?php echo $this->Html->adminPostLink( 'Delete',
      array('action' => 'delete', $competition['Competition']['id']),
      array('confirm' => 'Are you sure?', 'class'=>'btn btn-small') );
  ?>
</menu>