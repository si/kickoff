<header>

    <?php echo $this->Html->link($this->Html->image('/img/src/icons/ko-white.svg'), array('controller'=>'pages','action'=>'display', 'home'), array('class'=>'logo','escape'=>false)); ?>

    <?php echo $this->element('Navigation/search'); ?></li>

    <button class="toggle-nav">Toggle navigation</button>
    <nav>
        <div class="slick-nav">
        <?php echo $this->requestAction('teams/by_competition/context:nav', ['return']); ?>
        </div>
        <ul>
			<?php if($this->Session->read('Auth.User.id')=='') : ?>
            <li><?php echo $this->Html->link( 'Log in', array('controller'=>'users', 'action'=>'login')); ?></li>
            <li><?php echo $this->Html->link( 'Register', array('controller'=>'users', 'action'=>'add')); ?></li>
			<?php else : ?>
            <li><?php echo $this->Html->link( $this->Session->read('Auth.User.username'), array('controller'=>'users', 'action'=>'view')); ?></li>
            <li><?php echo $this->Html->link( 'Log out', array('controller'=>'users', 'action'=>'logout')); ?></li>
			<?php endif; ?>
        </ul>
    </nav>
    
    
</header>