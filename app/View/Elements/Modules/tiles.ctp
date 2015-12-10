<ul class="tiles">
  <?php foreach($tiles as $tile) : ?>
  <li>
    <?php 
    if (isset($tile['Theme']) && $tile['Theme']['image'] != '') {
        $image = '/'.$tile['Theme']['image'];
    } else {
        $image = '';
    }

    echo $this->Html->link($tile['Competition']['name'], 
        array(
            'controller'=>'competitions',
            'action'=>'view',
            $tile['Competition']['id']
        ),
        array(
            'style' => 'background-image: url('. $image . ')'
        )
    ); 
    ?>
  </li>
  <?php endforeach; ?>
</ul>
