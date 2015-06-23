<?php
$title = 'Sports - Kick Off Calendars';
$this->viewVars['title_for_layout'] = $title;
?>

<h1>Sports</h1>

<?php echo $this->Html->link('New sport', array('action'=>'add'), array('class'=>'btn')); ?>

<ul class="tiled">
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