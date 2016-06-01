<header>

    <?php echo $this->Html->link($this->Html->image('/img/src/icons/ko-white.svg'), array('controller'=>'pages','action'=>'display', 'home'), array('class'=>'logo','escape'=>false)); ?>

    <?php echo $this->element('Navigation/search'); ?></li>

    <button class="toggle-nav">Toggle navigation</button>
    <nav>
        <?php echo $this->requestAction('teams/by_competition/context:nav', ['return']); ?>
    </nav>
    
    
</header>