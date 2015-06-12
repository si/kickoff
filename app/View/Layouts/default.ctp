<!DOCTYPE html>
<html lang="en">
<head>
  <?php echo $this->element('Global/head'); ?>
</head>
<body class="<?php echo $this->params['controller'] . ' ' . $this->params['action']; ?>">
  <?php echo $this->element('Navigation/navigation'); ?>
  <div class="container">
    <?php echo $content_for_layout; ?>
  </div> <!-- /container -->
  <?php echo $this->element('Global/footer'); ?>
  <?php echo $this->element('Global/scripts'); ?>
  <?php //echo $this->element('Global/intercom'); ?>
</body>
</html>
