<?php
// Months
if(isset($events) && count($events) > 0) :
  $starts = strtotime($events[0]['Event']['start']);
  $ends = strtotime($events[count($events)-1]['Event']['start']);
  //$ends = strtotime('31 May 2017');
  echo 'From ' . date('M Y', $starts) . ' to ' . date('M Y', $ends) . '<br>';
  ?>
<ol class="months date-range">
  <?php 
  $month = $starts; 
  while($month <= $ends) { 
  ?>
  <li>
    <a href="#<?php echo date('Y-m', $month); ?>"><?php echo date('M Y', $month); ?></a>
  </li>
  <?php
    $month = strtotime('+1 month', $month);
  }
  ?>
</ol>

<ol class="dates date-range">
  <?php
  $previous = ''; 
  foreach($events as $event) :
    $starts = strtotime( $event['Event']['start'] );
//    if($previous != $starts) :
  ?>
  <li>
    <a href="#<?php echo date('Y-m-d', $starts); ?>"><?php echo date('D j', $starts); ?></a>
  </li>
  <?php
      $previous = $starts;
//    endif;
  endforeach;
  ?>
</ol>

<?php endif; ?>

