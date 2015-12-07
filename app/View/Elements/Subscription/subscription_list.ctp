<ul>
<?php
foreach($subscriptions as $sub) :
?>
    <li><?php echo $this->Html->link($sub['Competition']['name'], array('controller'=>'competitions', 'action'=>'view', $sub['Competition']['id'])); ?></li>
<?php
endforeach;
?>