<?php
$this->viewVars['title_for_layout'] = 'Competitions - Kick Off Calendars';
?>
<h1>Competitions</h1>

<ul class="tiles">
  <?php foreach($competitions as $competition) : ?>
    <li style="<?php echo $this->Html->cssThemeBackground($competition['Theme']['image'], $competition['Theme']['primary_colour']); ?>">
      <h3><?php echo $this->Html->link(
      	$competition['Competition']['name'],
      	array('action'=>'view',$competition['Competition']['id'])
      	); ?></h3>
      <?php echo $this->Html->link('Subscribe',array('action'=>'export',$competition['Competition']['id']),array('download'=>true, 'class'=>'btn')); ?>
      <?php echo $this->Html->link($competition['Sport']['name'],array('controller'=>'sports','action'=>'view',$competition['Sport']['id']), array('class'=>'secondary')); ?>
    </li>
  <?php endforeach; ?>
</ul>

<?php echo $this->Html->adminLink('New Competition',array('action'=>'form'),array('class'=>'btn btn-large')); ?>

