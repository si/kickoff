<?php
//_debug($events);

if(count($events)==0 && isset($start)) {
  $first_date = $start;
} else {
  $first_date = (isset($events[0])) ? strtotime($events[0]['Event']['start']) : strtotime('now');
}

$first_month = date('M Y', $first_date);
$days_in_month = date('t', $first_date);
$first_day = date('N', strtotime('01 ' . $first_month));

  
if(count($events)>0) {
  $month_events = array();
  foreach($events as $event) {
    if($first_month == date('M Y',strtotime($event['Event']['start']))) {
      $month_events[ date('j', strtotime( $event['Event']['start'] ) ) ][] = $event;
    }
  }
  
}
?>
<div class="calendar">
  <h2><?php echo $first_month; ?></h2>
  <table>
    <thead>
      <tr>
        <th>Mon</th>
        <th>Tue</th>
        <th>Wed</th>
        <th>Thu</th>
        <th>Fri</th>
        <th>Sat</th>
        <th>Sun</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <?php 
        $i = $d = 1;
        if($first_day>1) { 
          echo '<td colspan="' . ($first_day-1) . '" class="">'
            . '' 
            . '</td>';
          $i = $first_day;
        }
        
        while($i <= $days_in_month+($first_day-1)) { 
          
          $td_title = $d . " " . $first_month;
          $td_class = (strtotime($d . " " . $first_month) == strtotime('today')) ? "today" : "";
          $td_class .= (!isset($month_events[$d])) ? ' empty' : '';
          $td_day = date('D', strtotime($td_title));
          
        ?>
        <td title="<?php echo $td_title; ?>" class="<?php echo $td_class; ?>" data-day="<?php echo $td_day; ?>">
        <?php 
            echo '<span class="date">'.$d.'</span>';
            
            if(isset($month_events[$d]) && count($month_events[$d])>0) {
              echo '<ol class="unstyled">';
              foreach($month_events[$d] as $event) {
                echo '<li class="event" data-time="' . $this->Time->format('H:i',$event['Event']['start']) .'">' 
                . $this->Html->link(
                  //$this->Html->tag('span', $this->Time->format('H:i',$event['Event']['start']) . ' UTC', array('class'=>'time'))
                  $this->Html->tag('span', $event['HomeTeam']['name'], array('class'=>'team'))
                  . $this->Html->tag('abbr', 'v', array('class'=>'vs'))
                  . $this->Html->tag('span', $event['AwayTeam']['name'], array('class'=>'team'))
                  //. utf8_encode($event['Event']['summary'])
                  //. $this->Html->tag('span', utf8_encode($event['Event']['location']), array('class'=>'location'))
                  , array('controller'=>'events','action'=>'view',$event['Event']['id'])
                  , array(
                    'title'=>$this->Time->format('d-m-Y H:i',$event['Event']['start']),
                    'escape' => false,
                    )
                  )
                . $this->Html->link(
                  'Download' // '<i class="icon-download icon-white"></i>'
                  , array('controller'=>'events','action'=>'export',$event['Event']['id'])
                  , array('title'=>'Add to your calendar', 'class'=>'download', 'escape'=>false)
                  )
                . $this->Html->link(
                  'Share'   //  '<i class="icon-share icon-white"></i>'
                  , array('controller'=>'events','action'=>'share',$event['Event']['id'])
                  , array('title'=>'Share with friends', 'class'=>'share', 'escape'=>false)
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
            . '</td>'
        
        ?>
      </tr>
    </tbody>
  </table>
  <?php
  // Previous and Next Month links
  echo $this->Html->link(
    date('M Y', strtotime($first_month . ' -1 month'))
    , array(
      'controller' => $this->params['controller'], 
      'action' => $this->params['action'], 
      $this->params['pass'][0],
      'month' => date('Y-m', strtotime($first_month . ' -1 month'))
    )
    , array('class'=>'pagination-previous')
  );

  echo $this->Html->link(
    date('M Y', strtotime($first_month . ' +1 month'))
    , array(
      'controller' => $this->params['controller'], 
      'action' => $this->params['action'], 
      $this->params['pass'][0],
      'month' => date('Y-m', strtotime($first_month . ' +1 month'))
    )
    , array('class'=>'pagination-next')
  );
  ?>
</div>