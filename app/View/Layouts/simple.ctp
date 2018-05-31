<!DOCTYPE html>
<html lang="en">
<head>
  <?php echo $this->element('Global/head'); ?>
  <?php
  // Check for any Themes in the data layer
  if((count(array_column($this->viewVars, 'Theme'))>0) || isset($this->request['data']['Theme'])) {
    $theme = (count(array_column($this->viewVars, 'Theme'))>0) ? array_column($this->viewVars, 'Theme')[0] : $this->request['data']['Theme'];
    if($theme['primary_colour']=='') {
      $color['rgb'] = '0,0,0';
    } else {
      $color = $this->Html->colorHexToDec($theme['primary_colour']);
    }
    if( $theme['image'] != '' || $color['rgb'] != '' ) {
      echo '<style> body { ' . $this->Html->cssThemeBackground($theme['image'], $color['rgb'], 'fixed') . ' } </style>';
    }
  }

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
  <div class="container">
    <?php echo $content_for_layout; ?>
  </div> <!-- /container -->
  <?php echo $this->element('Global/footer'); ?>
  <?php echo $this->element('Global/scripts'); ?>
</body>
</html>
