<h1><?php echo $calendar['Calendar']['name']; ?></h1>
<?php if( $calendar['Calendar']['description']!='') : ?>
<p><?php echo $calendar['Calendar']['description']; ?></p>
<?php endif; ?>

<p><small>
  Created on <?php echo $this->Time->niceShort($calendar['Calendar']['created']); ?> 
  by <?php echo $this->Html->link($calendar['User']['username'],array('controller'=>'users','action'=>'view',$calendar['User']['id'])); ?>
  in <?php echo $this->Html->link($calendar['Sport']['name'],array('controller'=>'sports','action'=>'view',$calendar['Sport']['id'])); ?>
</small></p>

<ul>
  <li><?php echo $this->Html->link('Subscribe',array('action'=>'export',$calendar['Calendar']['id']),array('download'=>true, 'class'=>'btn btn-large')); ?></li>
  <li><?php echo $this->Html->link('Edit',array('action'=>'edit',$calendar['Calendar']['id']),array('class'=>'btn')); ?></li>
</ul>

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

<?php echo $this->Html->link('Add Event',array('controller'=>'events','action'=>'add','calendar_id'=>$calendar['Calendar']['id'])); ?>
