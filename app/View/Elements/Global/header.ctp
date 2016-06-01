<header>

    <?php echo $this->Html->link($this->Html->image('/img/src/icons/ko-white.svg'), array('controller'=>'pages','action'=>'display', 'home'), array('class'=>'logo','escape'=>false)); ?>

    <?php echo $this->element('Navigation/search'); ?></li>

    <button class="toggle-nav">Toggle navigation</button>
    <nav>
        <dl>
            <dt><?php echo $this->Html->link('Competitions', array('controller'=>'competitions','action'=>'index')); ?></dt>
            <dd><?php echo $this->Html->competitionLink(array('name'=>'Premier League', 'id'=>'20', 'slug'=>'premier-league'), array('class'=>null)); ?></dd>
            <dd><?php echo $this->Html->competitionLink(array('name'=>'Championship', 'id'=>'1', 'slug'=>'championship'), array('class'=>null)); ?></dd>
        </dl>
        <?php echo $this->requestAction('teams/by_competition/context:nav', ['return']); ?>
    </nav>
    
    
</header>