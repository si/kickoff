<?php echo $this->Form->create('Search', array('url'=>'/search')); ?>
	<?php 
    echo $this->Form->search('query', 
        array(
            //'autofocus' => 'autofocus',
            'required' => 'required',
            'spellcheck' => 'false',
            'title' => 'Enter a team, competition or sport'
        )
    ); ?>
    <?php echo $this->Form->button('Go!'); ?>
<?php echo $this->Form->end(); ?>