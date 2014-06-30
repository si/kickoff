<li>
	<?
	echo $this->Html->image($authuser['UserDetail']['User']['picture']);
  echo $_SESSION['Auth']['User']['username'];
  ?>
  <ul>
    <li><?php echo $this->Html->link('Site Admin', array('controller'=>'admin','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Profile','#'); ?></li>
    <li><?php echo $this->Html->link('Settings','#'); ?></li>
    <li><?php echo $this->Html->link('Sign out',array('controller'=>'users','action'=>'logout')); ?></li>
  </ul>
</li>
