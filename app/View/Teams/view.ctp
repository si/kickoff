<h1><?php echo $team['Team']['name']; ?></h1>
<small><?php echo $this->Html->link($team['Sport']['name'],array('controller'=>'sports','action'=>'view',$team['Sport']['id'])); ?></small>

<div class="pull-left">
  <?php echo $this->Html->link('Subscribe',array('action'=>'export',$team['Team']['id']),array('class'=>'btn btn-large')); ?>
  <?php echo $this->Html->adminLink('Add Event',array('controller'=>'events','action'=>'form','home_team_id'=>$team['Team']['id']),array('class'=>'btn btn-large')); ?>
</div>

<div class="pull-right">
  <?php echo $this->Html->adminLink('Edit',array('action'=>'edit',$team['Team']['id']),array('class'=>'btn')); ?>
  <?php echo $this->Html->link('Export',array('action'=>'export',$team['Team']['id'],'json'),array('download'=>true, 'class'=>'btn ')); ?>
    <?php echo $this->Html->adminPostLink( 'Delete',
        array('action' => 'delete', $team['Team']['id']),
        array('confirm' => 'Are you sure?', 'class'=>'btn') );
    ?>
</div>
<?php
//_debug($events);
echo $this->element('events_grid',array('events'=>$events,'context'=>'upcoming')); 
?>