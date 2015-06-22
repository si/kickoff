<nav>

  <?php echo $this->Html->link($this->Html->image('/img/svg/kickoff.svg'), array('controller'=>'pages','action'=>'display', 'home'), array('class'=>'logo','escape'=>false)); ?>

  <ul class="discover">
    <li><?php echo $this->Html->link('Sports', array('controller'=>'sports','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Teams', array('controller'=>'teams','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Calendars', array('controller'=>'calendars','action'=>'index')); ?></li>
  </ul>
  
  <ul class="engage">
    <?php 
    if($this->Session->read('Auth.User.id')!='') {
  		echo $this->element('Navigation/user_menu');
    } else {
    	echo $this->element('Navigation/guest_menu');
    } 
    ?>
  </ul>

</nav>
