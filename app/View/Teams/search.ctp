<?php
//echo '<textarea cols="200" rows="100">'; var_dump($this->params['ext']);echo '</textarea>'; 
switch($this->params['ext']) {

  case 'json':
    $new = array();
    foreach($teams as $team) {
        unset($team['Event']);
        $new[] = $team['Team'];
    }

    echo json_encode($new);
    break;
  
  default:  // ICS
  
    var_dump($teams);
    break;

}