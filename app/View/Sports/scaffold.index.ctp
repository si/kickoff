<h1>Sports</h1>

<ul>
  <?php foreach($sports as $sport) : ?>
  <li class="<?php echo $sport['Sport']['slug']; ?>">
    <?php echo $this->Html->link($sport['Sport']['name'],array('action'=>'view',$sport['Sport']['id'])); ?>
  </li>
  <?php endforeach; ?>
</ul>