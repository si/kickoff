<header>

    <?php echo $this->Html->link($this->Html->image('/img/src/icons/ko-white.svg'), array('controller'=>'pages','action'=>'display', 'home'), array('class'=>'logo','escape'=>false)); ?>

    <nav>
        <button>Toggle menu</button>
        <dl>
            <dt><?php echo $this->Html->link('Competitions', array('controller'=>'competitions','action'=>'index')); ?></dt>
            <dd><?php echo $this->Html->link('Premier League', array('controller'=>'competitions','action'=>'view', '20')); ?></dd>
            <dd><?php echo $this->Html->link('Championship', array('controller'=>'competitions','action'=>'view', '1')); ?></dd>
        </dl>
    </nav>

    <?php echo $this->element('Navigation/search'); ?></li>

</header>