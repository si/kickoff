<?php $this->pageTitle = $user['User']['username']; ?>

<h1>
    <img src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( $this->Session->read('Auth.User.email') ) ) ); ?>?s=256" width="128" height="128" /><br>
    <?php echo $user['User']['username']; ?>
</h1>

<?php //echo '<textarea class="code">'; var_dump($stats); echo '</textarea>'; ?>

<section id="profile">
    <ul>
      <li><?php echo $this->Html->link('Subscriptions', array('controller'=>'subscriptions', 'action'=>'index')); ?></li>
      <li><?php echo $this->Html->link('Edit Profile', array('action'=>'edit',$user['User']['id'])); ?></li>
      <li><?php echo $this->Html->link('Log out', array('action'=>'logout')); ?></li>
    </ul>
</section>
