<nav>

  <?php echo $this->Html->link($this->Html->image('/img/src/icons/ko-white.svg'), array('controller'=>'pages','action'=>'display', 'home'), array('class'=>'logo','escape'=>false)); ?>

  <ul class="discover">
    <li><?php echo $this->Html->link('Competitions', array('controller'=>'competitions','action'=>'index')); ?></li>
  </ul>
  
  <ul class="engage">
    <li><?php echo $this->element('Navigation/search'); ?></li>
  </ul>

</nav>
