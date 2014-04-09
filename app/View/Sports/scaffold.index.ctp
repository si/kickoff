<h1>Sports</h1>

<ul>
  <?php foreach($sports as $sport) : ?>
  <li class="<?php echo $sport['Sport']['slug']; ?>">
    <?php 
      echo $this->Html->link(
        $this->Html->image('/'.$sport['Theme']['image'], 
          array(
            'alt'=>$sport['Sport']['name'],
            'width'=>200
          )
        ) . $sport['Sport']['name']
        , array(
          'action'=>'view',
          $sport['Sport']['id']
        )
        , array(
          'escape'=>false
        )
      ); ?>
  </li>
  <?php endforeach; ?>
</ul>