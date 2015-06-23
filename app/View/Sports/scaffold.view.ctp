<?php 
$title = $sport['Sport']['name'] . ' Calendars';
$this->viewVars['title_for_layout'] = $title . ' - Kick Off Calendars';
if(isset($sport['Calendar'])) :
?>
<h1><?php echo $title; ?></h1>
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
  <?php echo $this->Html->link('Create calendar', array('controller'=>'calendars','action'=>'form', 'sport_id'=>$sport['Sport']['id']), array('class'=>'btn')); ?>
  <?php echo $this->Html->link('Back to sports', array('action'=>'index'), array('class'=>'btn')); ?>
</div>