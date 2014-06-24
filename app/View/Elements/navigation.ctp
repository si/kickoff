<nav>

  <?php echo $this->Html->link('( KO )', array('controller'=>'pages','action'=>'display', 'home'), array('class'=>'logo')); ?>

  <ul class="discover">
    <li><?php echo $this->Html->link('Sports', array('controller'=>'sports','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Teams', array('controller'=>'teams','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Calendars', array('controller'=>'calendars','action'=>'index')); ?></li>
  </ul>
  
  <ul class="engage">
  <?php 
  if ($this->Session->read('Auth.User')) {
		if ($this->Session->read('Auth.User')['is_admin']) {
			echo $this->element('admin_menu');
		} else {
			echo $this->element('user_menu');
		}
	} else {
		echo $this->element('guest_menu');
	} 
	?>
  
    <li><?php echo $this->Html->link('Themes', array('controller'=>'themes','action'=>'index')); ?></li>
  </ul>

</nav>
