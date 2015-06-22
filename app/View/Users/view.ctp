<?php $this->pageTitle = $user['User']['username']; ?>

<h1>
    <img src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( $this->Session->read('Auth.User.email') ) ) ); ?>?s=48" width="48" >
    <?php echo $user['User']['username']; ?>
</h1>

<?php //echo '<textarea class="code">'; var_dump($stats); echo '</textarea>'; ?>

<section id="profile">
    <ul>
      <li><?php echo $this->Html->link('Edit Profile', array('action'=>'edit',$user['User']['id'])); ?></li>
    </ul>
</section>
