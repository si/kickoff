<li>
  <a href="/profile" class="i user" data-gravatar-src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( $this->Session->read('Auth.User.email') ) ) ); ?>?s=24">
    <?php echo $this->Session->read('Auth.User.username'); ?>
  </a>
</li>

<?php if ($this->Session->read('Auth.User.is_admin')) : ?>
<li><?php echo $this->Html->link('Tools', array('controller'=>'tools','action'=>'index')); ?></li>
<?php endif; ?>

<li><?php echo $this->Html->link('Sign Out', array('controller'=>'users','action'=>'logout')); ?></li>


