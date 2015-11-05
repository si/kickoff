<?php echo $this->Form->create('Search', array('url'=>'/search')); ?>
	<?php echo $this->Form->search('query'); ?>
    <?php echo $this->Form->button('Go!'); ?>
<?php echo $this->Form->end(); ?>