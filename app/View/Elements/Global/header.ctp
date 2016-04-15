<header>

    <?php echo $this->Html->link($this->Html->image('/img/src/icons/ko-white.svg'), array('controller'=>'pages','action'=>'display', 'home'), array('class'=>'logo','escape'=>false)); ?>

    <nav>
        <button>Toggle menu</button>
        <ul>
            <li><?php echo $this->Html->link('Premier League', array('controller'=>'competitions','action'=>'index', '20')); ?></li>
            <li><?php echo $this->Html->link('Championship', array('controller'=>'competitions','action'=>'index', '1')); ?></li>
        </ul>
    </nav>

    <?php echo $this->element('Navigation/search'); ?></li>

</header>