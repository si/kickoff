<h1>Calendars</h1>
<?php echo $this->Html->link('New Calendar',array('action'=>'add'),array('class'=>'btn btn-large')); ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>Sport</th>
      <th>Created</th>
      <th>By</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($calendars as $calendar) : ?>
    <tr>
      <td><?php echo $this->Html->link($calendar['Calendar']['name'],array('action'=>'view',$calendar['Calendar']['id'])); ?></td>
      <td><?php echo $calendar['Calendar']['description']; ?></td>
      <td><?php echo $this->Html->link($calendar['Sport']['name'],array('controller'=>'sports','action'=>'view',$calendar['Sport']['id'])); ?></td>
      <td><?php echo $this->Time->niceShort($calendar['Calendar']['created']); ?></td>
      <td><?php echo $this->Html->link($calendar['User']['username'],array('controller'=>'users','action'=>'view',$calendar['User']['id'])); ?></td>
      <td><?php echo $this->Html->link('Subscribe',array('action'=>'export',$calendar['Calendar']['id']),array('download'=>true, 'class'=>'btn')); ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
