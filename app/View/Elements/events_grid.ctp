<?php
if($events>0) {
  $first_date = strtotime($events[0]['Event']['start']);
  $first_month = date('M Y', $first_date);
  $days_in_month = date('t', $first_date);
  $first_day = date('N', strtotime('01 ' . $first_month));
  
  $month_events = array();
  foreach($events as $event) {
    if($first_month == date('M Y',strtotime($event['Event']['start']))) $month_events[date('d',strtotime($event['Event']['start']))][] = $event;
  }
  
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
        echo '<td colspan="' . ($first_day-1) . '" class="">'
          . $this->Html->link(date('M Y', strtotime($first_month . ' -1 month')),'#prevMonth', array('style'=>'color:#CCC'))
          . '</td>';
        $i = $first_day;
      }
      
      while($i <= $days_in_month+($first_day-1)) { ?>
      <td>
      <?php 
          echo '<span class="pull-left">'.$d.'</span>';
          
          if(isset($month_events[$d]) && count($month_events[$d])>0) {
            echo '<ol class="unstyled pull-right">';
            foreach($month_events[$d] as $event) {
              echo '<li>' . $this->Html->link(
                $this->Time->format('H:i',$event['Event']['start']) . ' ' . $event['Event']['summary']
                , array('controller'=>'events','action'=>'view',$event['Event']['id'])
              )
              . '</li>';
            }
            echo '</ol>';
          }
      ?>
      </td>
      <?php 
        if( $i % 7 == 0) echo '</tr><tr>';
        $d++; $i++;
      } 
      if($i % 7 > 0) echo '<td colspan="' . ($i % 7) . '">'
          . $this->Html->link(date('M Y', strtotime($first_month . ' +1 month')),'#nextMonth', array('style'=>'color:#CCC'))
          . '</td>'
      
      ?>
    </tr>
  </tbody>
</table>

