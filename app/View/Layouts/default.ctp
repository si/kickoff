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
      $color = array(
        'hex' => $theme['primary_colour']
      );
      $color['r16'] = substr($color['hex'], 1, 2);
      $color['g16'] = substr($color['hex'], 3, 2);
      $color['b16'] = substr($color['hex'], 5, 2);

      $color['r10'] = hexdec($color['r16']);
      $color['g10'] = hexdec($color['g16']);
      $color['b10'] = hexdec($color['b16']);

      $color['rgb'] = $color['r10'] . ', ' . $color['g10'] . ', ' . $color['b10'];
    }
    if($theme['image']!='') {
      echo '<style>
              body {
                background: linear-gradient(rgba(' . $color['rgb'] . ', 0.75), rgba(' . $color['rgb'] . ', 0.6)), fixed url(/' . $theme['image'] . ') no-repeat 50% 50%;
                background-size: cover;
              }
            </style>';
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
  <?php
  echo $this->element('Navigation/navigation'); 
  ?>
  <div class="container">
    <?php echo $content_for_layout; ?>
  </div> <!-- /container -->
  <?php echo $this->element('Global/footer'); ?>
  <?php echo $this->element('Global/scripts'); ?>
  <?php //echo $this->element('Global/intercom'); ?>
</body>
</html>
