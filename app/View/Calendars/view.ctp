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
  <li><?php echo $this->Html->link('Subscribe',array('action'=>'export',$calendar['Calendar']['id']),array('download'=>true)); ?></li>
  <li><?php echo $this->Html->link('Edit',array('action'=>'edit',$calendar['Calendar']['id'])); ?></li>
</ul>

<table>
  <caption><?php echo count($calendar['Event']); ?> events</caption>
  <thead>
    <tr>
      <th>Starts</th>
      <th>Summary</th>
      <th>Location</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($calendar['Event'] as $event) : ?>
    <tr>
      <td>
      <?php 
        $format = 'd M Y';
        if($calendar['Sport']['id']!=1) $format .= ' H:i';
        echo $this->Html->link($this->Time->format($format,$event['start']), array('controller'=>'events','action'=>'view',$event['id'])); ?>
      </td>
      <td><?php echo $event['summary']; ?></td>
      <td><?php echo $event['location']; ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<?php echo $this->Html->link('Add Event',array('controller'=>'events','action'=>'add','calendar_id'=>$calendar['Calendar']['id'])); ?>
