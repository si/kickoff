<table class="table">
  <caption><?php echo count($events) . (isset($context) ? ' '.$context : '') ; ?> events</caption>
  <thead>
    <tr>
      <th>Starts</th>
      <th>Summary</th>
      <th>Location</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($events as $event) : ?>
    <tr>
      <td>
      <?php 
        $format = 'D d M Y H:i';
        echo $this->Html->link($this->Time->format($format,$event['Event']['start']), array('controller'=>'events','action'=>'view',$event['Event']['id'])); ?>
      </td>
      <td><?php echo $event['Event']['summary']; ?></td>
      <td><?php echo $event['Event']['location']; ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
