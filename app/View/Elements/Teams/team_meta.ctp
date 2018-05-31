<p class="meta">
  <?php
  if( isset($team['Competition']['id']) ) {
    $competition = $team['Competition'];
  } elseif( count($events) > 0 && isset($events[0]['Competition']) ) {
    $competition = $events[0]['Competition'];
  }
  if(isset($competition)) echo $this->Html->competitionLink($competition);
  ?>
  
  <?php echo $this->Html->locationLink($team['Location']); ?>

  <?php
  // Show Twitter handle if set
  if( isset($team['Team']['twitter']) ) {
    echo $this->Html->link(
      '@' . $team['Team']['twitter'], 
      'https://twitter.com/'.$team['Team']['twitter'],
      array('class'=>'i-twitter')
    );
  }
  ?>
  <?php
  // Show website if set
  if( isset($team['Team']['website']) ) {
    $display = str_replace(array('http://','https://', 'www.', '/'), '', $team['Team']['website']);
    echo $this->Html->link(
      $display, 
      $team['Team']['website'],
      array('class'=>'i-url')
    );
  }
  ?>
</p>