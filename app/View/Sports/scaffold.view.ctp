<h1><?php echo $sport['Sport']['name']; ?></h1>

<?php 
if(isset($sport['Theme']['image']) && $sport['Theme']['image']!='') 
  echo $this->Html->image('/'.$sport['Theme']['image']); 
?>

<?php 
if(isset($sport['Calendar'])) :
?>
<h2>Calendars</h2>
<?php if(count($sport['Calendar'])>0) : ?>
<ul>
  <?php foreach($sport['Calendar'] as $calendar) : ?>
  <li><?php echo $this->Html->link($calendar['name'], array('controller'=>'calendars','action'=>'view',$calendar['id'])); ?></li>
  <?php endforeach; ?>
</ul>
<?php endif; ?>
<?php endif; ?>

<div class="btn-group">
  <?php echo $this->Html->link('Edit sport', array('action'=>'edit', $sport['Sport']['id']), array('class'=>'btn')); ?>
  <?php echo $this->Form->postLink( 'Delete sport',
      array('action' => 'delete', $sport['Sport']['id']),
      array('confirm' => 'Are you sure?', 'class'=>'btn') );
  ?>
  <?php echo $this->Html->link('Create calendar', array('controller'=>'calendars','action'=>'form'), array('class'=>'btn')); ?>
  <?php echo $this->Html->link('Back to sports', array('action'=>'index'), array('class'=>'btn')); ?>
</div>