<?php
$this->viewVars['title_for_layout'] = 'Kick Off Tools';
?>

<h1>Tools</h1>

<h2>Admin</h2>
<ul>
	<li><?php echo $this->Html->link('Teams', array('controller'=>'teams')); ?></li>
	<li><?php echo $this->Html->link('Themes', array('controller'=>'themes')); ?></li>
	<li><?php echo $this->Html->link('Users', array('controller'=>'users')); ?></li>
</ul>