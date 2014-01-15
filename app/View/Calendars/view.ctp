<h1><?php echo $calendar['Calendar']['name']; ?></h1>
<?php if( $calendar['Calendar']['description']!='') : ?>
<p class="lead"><?php echo $calendar['Calendar']['description']; ?></p>
<?php endif; ?>

<p><small>
  Created on <?php echo $this->Time->niceShort($calendar['Calendar']['created']); ?> 
  by <?php echo $this->Html->link($calendar['User']['username'],array('controller'=>'users','action'=>'view',$calendar['User']['id'])); ?>
  in <?php echo $this->Html->link($calendar['Sport']['name'],array('controller'=>'sports','action'=>'view',$calendar['Sport']['id'])); ?>
</small></p>

<div class="pull-left">
<?php echo $this->Html->link('Subscribe',array('action'=>'export',$calendar['Calendar']['id']),array('class'=>'btn btn-large')); ?>
<?php echo $this->Html->link('Add Event',array('controller'=>'events','action'=>'add','calendar'=>$calendar['Calendar']['id']),array('class'=>'btn btn-large')); ?>
</div>

<div class="pull-right">
<?php echo $this->Html->link('Edit',array('action'=>'edit',$calendar['Calendar']['id']),array('class'=>'btn')); ?>
<?php //echo $this->Html->link('Delete',array('action'=>'delete',$calendar['Calendar']['id']),array('class'=>'btn btn-warning'),'Are you sure you want to delete this calendar?'); ?>
<?php echo $this->Html->link('Export',array('action'=>'export',$calendar['Calendar']['id'],'json'),array('download'=>true, 'class'=>'btn ')); ?>
</div>

<table class="table">
  <caption><?php echo count($future_events); ?> upcoming events</caption>
  <thead>
    <tr>
      <th>Starts</th>
      <th>Summary</th>
      <th>Location</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($future_events as $event) : ?>
    <tr>
      <td>
      <?php 
        $format = 'd M Y H:i';
        if($calendar['Sport']['id']!=1) $format .= ' H:i';
        echo $this->Html->link($this->Time->format($format,$event['Event']['start']), array('controller'=>'events','action'=>'view',$event['Event']['id'])); ?>
      </td>
      <td><?php echo $event['Event']['summary']; ?></td>
      <td><?php echo $event['Event']['location']; ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<table class="table">
  <caption><?php echo count($past_events); ?> previous events</caption>
  <thead>
    <tr>
      <th>Starts</th>
      <th>Summary</th>
      <th>Location</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($past_events as $event) : ?>
    <tr>
      <td>
      <?php 
        $format = 'd M Y';
        if($calendar['Sport']['id']!=1) $format .= ' H:i';
        echo $this->Html->link($this->Time->format($format,$event['Event']['start']), array('controller'=>'events','action'=>'view',$event['Event']['id'])); ?>
      </td>
      <td><?php echo $event['Event']['summary']; ?></td>
      <td><?php echo $event['Event']['location']; ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<?php echo $this->Html->link('Add Event',array('controller'=>'events','action'=>'add','calendar'=>$calendar['Calendar']['id']),array('class'=>'btn btn-large')); ?>
