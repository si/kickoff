<?php
$title = 'Sports - Kick Off Calendars';
$this->viewVars['title_for_layout'] = $title;
?>

<h1>Sports</h1>

<ul class="tiles">
  <?php foreach($sports as $sport) : ?>
  <li>
    <?php 
      echo $this->Html->link(
        $this->Html->image('/'.$sport['Theme']['image'], 
          array(
            'alt'=>$sport['Sport']['name'],
            'width'=>200
          )
        )
        , array(
          'action'=>'view',
          $sport['Sport']['id']
        )
        , array(
          'title'=>$sport['Sport']['name'],
          'escape'=>false
        )
      ); ?>
  </li>
  <?php endforeach; ?>
</ul>

<?php echo $this->Html->adminLink('New sport', array('action'=>'add'), array('class'=>'btn')); ?>

