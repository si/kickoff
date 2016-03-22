<ul>
<?php 
var_dump($teams);
foreach($teams as $team) : ?>
    <li><?php echo $this->Html->link($team['name'], array('controller'=>'teams','action'=>'view', $team['id'])); ?></li>
<?php endforeach; ?>
</ul>