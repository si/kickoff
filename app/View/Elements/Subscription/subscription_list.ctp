<ul>
<?php
foreach($subscriptions as $sub) :
    if( $sub['Competition']['id'] != null ) :
?>
    <li class="competition"><?php echo $this->Html->link($sub['Competition']['name'], array('controller'=>'competitions', 'action'=>'view', $sub['Competition']['id'])); ?></li>
<?php
    endif;
    if( $sub['Team']['id'] != null ) :
?>
    <li class="team"><?php echo $this->Html->link($sub['Team']['name'], array('controller'=>'teams', 'action'=>'view', $sub['Team']['id'])); ?></li>
<?php
    endif;
endforeach;
?>
</ul>