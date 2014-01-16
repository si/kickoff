<h1><?php echo $user['User']['first_name']; ?> (@<?php echo $user['User']['username']; ?>)</h1>
<p class="lead">Registered on <?php echo $this->Time->format('D d M Y',$user['User']['created']); ?></p>

<div class="pull-right">
<?php echo $this->Html->link('Edit user', array('action'=>'edit',$user['User']['id']),array('class'=>'btn')); ?>
</div>

<div class="clearfix">
<h2>Calendars</h2>
<dl>
  <?php foreach($user['Calendar'] as $calendar) : ?>
  <dt><?php echo $this->Html->link($calendar['name'],array('controller'=>'calendars','action'=>'view',$calendar['id'])); ?></dt>
  <dd><?php echo $calendar['description']; ?></dd>
  <?php endforeach; ?>
</dl>
</div>