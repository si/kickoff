<!DOCTYPE html>
<html lang="en">
<head>
  <?php echo $this->element('Global/head'); ?>
  <?php
  // Check for any Themes in the data layer
  if((count(array_column($this->viewVars, 'Theme'))>0) || isset($this->request['data']['Theme'])) {
    $theme = (count(array_column($this->viewVars, 'Theme'))>0) ? array_column($this->viewVars, 'Theme')[0] : $this->request['data']['Theme'];
    if($theme['primary_colour']=='') $theme['primary_colour'] = '0,0,0';
    if($theme['image']!='') {
      echo '<style>
              body {
                background: linear-gradient(rgba(' . $theme['primary_colour'] . ', 0.75), rgba(' . $theme['primary_colour'] . ', 0.6)), fixed url(/' . $theme['image'] . ') no-repeat 50% 50%;
                background-size: cover;
              }
            </style>';
    }
  }
  
  ?>
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
