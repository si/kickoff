<?php
if($events>0) {
  $first_date = strtotime($events[0]['Event']['start']);
  $first_month = date('M Y', $first_date);
  $days_in_month = date('t', $first_date);
  $first_day = date('N', strtotime('01 ' . $first_month));
}
?>
<table class="table">
  <caption><?php echo $first_month; ?></caption>
  <thead>
    <tr>
      <th>Monday</th>
      <th>Tuesday</th>
      <th>Wednesday</th>
      <th>Thursday</th>
      <th>Friday</th>
      <th>Saturday</th>
      <th>Sunday</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php 
      $i = $d = 1;
      if($first_day>1) { 
        echo '<td colspan="' . ($first_day-1) . '"></td>';
        $i = $first_day;
      }
      
      while($i <= $days_in_month+($first_day-1)) { ?>
      <td>
      <?php 
          echo $d;
          if( $i % 7 == 0) echo '</tr><tr>';
//        echo $this->Html->link($this->Time->format($format,$event['Event']['start']), array('controller'=>'events','action'=>'view',$event['Event']['id'])); ?>
      </td>
      <?php $d++; $i++;
      } 
      if($i % 7 > 0) echo '<td colspan="' . ($i % 7) . '"></td>'
      
      ?>
    </tr>
  </tbody>
</table>

<textarea><?php var_dump($events); ?></textarea>

