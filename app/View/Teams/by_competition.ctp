<?php
$previous_comp = ''; 
foreach($teams as $team) : 
    if($team['Competition']['id'] != $previous_comp) :
        echo ($previous_comp != '') ? '</ul></div>' : '';
    ?>
    <div class="group">
    <h3><?php echo $this->Html->competitionLink($team['Competition']); ?></h3>
    <ul class="flex-cols">
    <?php endif;
    $previous_comp = $team['Competition']['id'];
    ?>   
    <li><?php echo $this->Html->teamLink($team['Team']); ?></li>
<?php endforeach; ?>
</ul>
</div>