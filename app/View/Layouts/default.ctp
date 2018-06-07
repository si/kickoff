<!DOCTYPE html>
<html lang="en">
<head>
  <?php echo $this->element('Global/head'); ?>
  <?php
  $body_class = $this->params['controller'] . ' ' . $this->params['action'];
  
  foreach($this->params['pass'] as $i => $name) {
    if( is_numeric($name) ) {
      $name = 'int-' . $name;
    }
    $body_class .= ' ' . $name;
  }
  ?>
</head>
<body class="<?php echo $body_class; ?>">
  <?php
  echo $this->element('Global/header'); 
  ?>
  <div class="container">
    <?php echo $content_for_layout; ?>
  </div> <!-- /container -->
  <?php echo $this->element('Global/footer'); ?>
  <?php echo $this->element('Global/scripts'); ?>
  <?php //echo $this->element('Global/intercom'); ?>
</body>
</html>
