<ul class="tiles">
  <?php foreach($tiles as $tile) : ?>
  <li style="<?php echo $this->Html->cssThemeBackground($tile['Theme']['image'], $tile['Theme']['primary_colour']); ?>">
    <?php 
    echo $this->Html->link($tile['Competition']['name'], 
        array(
            'controller'=>'competitions',
            'action'=>'view',
            $tile['Competition']['id']
        )
    ); 
    ?>
  </li>
  <?php endforeach; ?>
</ul>
