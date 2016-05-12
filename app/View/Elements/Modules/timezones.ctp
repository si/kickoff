    <ul id="timezones">
      <?php
      $timezone_identifiers = DateTimeZone::listIdentifiers();
      foreach ($timezone_identifiers as $index=>$name) :
      ?>
      <li><?php echo $this->Html->link($name, '/calendars/set_timezone/' . $index); ?></li>
      <?php endforeach; ?>      
    </ul>
