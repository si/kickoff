<nav>

  <?php echo $this->Html->link('( KO )', array('controller'=>'pages','action'=>'display', 'home'), array('class'=>'logo')); ?>

  <ul class="discover">
    <li><?php echo $this->Html->link('Sports', array('controller'=>'sports','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Teams', array('controller'=>'teams','action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('Calendars', array('controller'=>'calendars','action'=>'index')); ?></li>
  </ul>
  
  <ul class="engage">
    <li>
      <?php echo $this->Html->link('Sign in', '#', array('id'=>'LoginFacebook')); ?>
      <span id="LoginResult"></span>
      <ul>
        <li><?php echo $this->Html->link('Facebook','#'); ?></li>
        <li><?php echo $this->Html->link('Twitter','#'); ?></li>
        <li><?php echo $this->Html->link('Google+','#'); ?></li>
        <li><?php echo $this->Html->link('Email','#'); ?></li>
      </ul>
    </li>
    <li><?php echo $this->Html->link('Themes', array('controller'=>'themes','action'=>'index')); ?></li>
  </ul>

</nav>
