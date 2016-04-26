<?php
$previous_comp = ''; 
foreach($teams as $team) : 
    if($team['Competition']['competition_id'] != $previous_comp) :
        echo ($previous_comp != '') ? '</ul></div>' : '';
    ?>
    <div class="group">
    <h3><?php echo $this->Html->link($team['Competition']['competition_name'], array('controller'=>'competitions', 'action'=>'view', $team['Competition']['competition_id'])); ?></h3>
    <ul>
    <?php endif;
    $previous_comp = $team['Competition']['competition_id'];
    ?>   
    <li><?php echo $this->Html->link($team['Team']['team_name'], array('controller'=>'teams','action'=>'view', $team['Team']['team_id'])); ?></li>
<?php endforeach; ?>
</ul>
</div>