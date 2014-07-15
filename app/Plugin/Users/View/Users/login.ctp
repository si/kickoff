<?php
/**
 * Copyright 2010 - 2013, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2013, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="users index">
	<h2><?php echo __d('users', 'Login'); ?></h2>
	
	<div class="social">
  	<h3>Sign in with your social accounts</h3>
  	<ul class="providers">
  		<li><?php echo $this->Html->link('Twitter', array('controller'=>'auth_login','action'=>'twitter'), array('class'=>'twitter')); ?></li>
  		<li><?php echo $this->Html->link('Facebook', array('controller'=>'auth_login','action'=>'facebook'), array('class'=>'facebook')); ?></li>
  		<li><?php echo $this->Html->link('Google', array('controller'=>'auth_login','action'=>'google'), array('class'=>'google')); ?></li>
  	</ul>
	
	</div>
	
	<div class="email">
  	<h3>&hellip; or your email</h3>
		<?php
			echo $this->Form->create($model, array(
				'action' => 'login',
				'id' => 'LoginForm'));
		?>
	<fieldset>
	  <?php
			echo $this->Form->input('email', array(
				'label' => __d('users', 'Email')));
			echo $this->Form->input('password',  array(
				'label' => __d('users', 'Password')));

			echo '<p>' . $this->Form->input('remember_me', array('type' => 'checkbox', 'label' =>  __d('users', 'Remember Me'))) . '</p>';
			echo $this->Form->hidden('User.return_to', array(
				'value' => $return_to));
			echo $this->Form->button(__d('users','Sign in'));

      echo '<p>' . $this->Html->link(__d('users', 'I forgot my password'), array('action' => 'reset_password')) . '</p>';

			echo $this->Form->end();
		?>
	</fieldset>
	</div>

</div>
<?php // echo $this->element('/Users.Users/sidebar'); ?>