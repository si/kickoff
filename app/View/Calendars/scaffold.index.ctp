<?php
$this->viewVars['title_for_layout'] = 'Calendars - Kick Off Calendars';
?>
<h1>Calendars</h1>

<ul class="tiles">
  <?php foreach($calendars as $calendar) : ?>
    <li style="background-image: url(<?php echo $calendar['Theme']['image']; ?>);">
      <h3><?php echo $this->Html->link($calendar['Calendar']['name'],array('action'=>'view',$calendar['Calendar']['id'])); ?></h3>
      <p class="description"><?php echo $calendar['Calendar']['description']; ?></p>
      <?php echo $this->Html->link('Subscribe',array('action'=>'export',$calendar['Calendar']['id']),array('download'=>true, 'class'=>'btn')); ?>
      <?php echo $this->Html->link($calendar['Sport']['name'],array('controller'=>'sports','action'=>'view',$calendar['Sport']['id']), array('class'=>'secondary')); ?>
    </li>
  <?php endforeach; ?>
</ul>

<?php echo $this->Html->adminLink('New Calendar',array('action'=>'form'),array('class'=>'btn btn-large')); ?>

