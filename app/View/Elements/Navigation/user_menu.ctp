<li>
	<?
	echo $this->Html->image($authuser['UserDetail']['User']['picture'], array('class'=>'avatar'));
  echo $this->Html->tag('span',$this->Session->read('Auth.User.username'));
  ?>
  <ul>
  
    <?php if ($this->Session->read('Auth.User.is_admin')) : ?>
    <li><?php echo $this->Html->link('Site Admin', array('controller'=>'admin','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Themes', array('controller'=>'themes','action'=>'index')); ?></li>
    <?php endif; ?>

    <li><?php echo $this->Html->link('Profile','#'); ?></li>
    <li><?php echo $this->Html->link('Settings','#'); ?></li>
    <li><?php echo $this->Html->link('Sign out',array('controller'=>'users','action'=>'logout')); ?></li>
  </ul>
</li>