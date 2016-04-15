<header>

    <?php echo $this->Html->link($this->Html->image('/img/src/icons/ko-white.svg'), array('controller'=>'pages','action'=>'display', 'home'), array('class'=>'logo','escape'=>false)); ?>

    <nav>
        <button>Toggle menu</button>
        <ul>
            <li><?php echo $this->Html->link('Competitions', array('controller'=>'competitions','action'=>'index')); ?></li>
        </ul>
    </nav>

    <?php echo $this->element('Navigation/search'); ?></li>

</header>