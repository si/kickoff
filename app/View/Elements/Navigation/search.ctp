<?php echo $this->Form->create(null, array('url'=>'/search', 'idPrefix'=>'Header')); ?>
	<?php echo $this->Form->search('query'); ?>
<?php echo $this->Form->end(); ?>