<table class="table">
  <caption><?php echo count($events) . (isset($context) ? ' '.$context : '') ; ?> events</caption>
  <thead>
    <tr>
      <th>Date</th>
      <th>Time</th>
      <th>Opponent</th>
      <th>Where</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($events as $event) : ?>
    <tr>
      <td>
      <?php 
        $format = 'D d M';
        echo $this->Html->link($this->Time->format($format,$event['Event']['start']), array('controller'=>'competitions','action'=>'view',$event['Event']['competition_id'], 'date'=>$this->Time->format('y-m-d',$event['Event']['start']))); ?>
      </td>
      <td>
      <?php 
        $format = 'H:i';
        echo $this->Html->link($this->Time->format($format,$event['Event']['start']), array('controller'=>'competitions','action'=>'view',$event['Event']['competition_id'], 'date'=>$this->Time->format('y-m-d',$event['Event']['start']))); ?>
      </td>
      <td><?php echo $this->Html->link((($event['HomeTeam']['id']==$team_id) ? $event['AwayTeam']['name'] : $event['HomeTeam']['name']), array('controller'=>'events','action'=>'view',$event['Event']['id'])); ?></td>
      <td><?php echo ($event['HomeTeam']['id']==$team_id) ? 'H' : 'A'; ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
