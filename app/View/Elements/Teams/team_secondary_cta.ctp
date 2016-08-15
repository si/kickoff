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
