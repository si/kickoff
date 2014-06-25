<li>
  <?php echo $this->Html->link('Log In', array('controller'=>'users','action'=>'login')); ?>
	<ul>
		<li><?php echo $this->Html->link('Twitter', array('controller'=>'auth_login','action'=>'twitter'), array('class'=>'twitter')); ?></li>
		<li><?php echo $this->Html->link('Facebook', array('controller'=>'auth_login','action'=>'facebook'), array('class'=>'facebook')); ?></li>
		<li><?php echo $this->Html->link('Google', array('controller'=>'auth_login','action'=>'google'), array('class'=>'google')); ?></li>
		<li><?php echo $this->Html->link('Email', array('controller'=>'users','action'=>'login'), array('class'=>'email')); ?></li>
	</ul>
</li>