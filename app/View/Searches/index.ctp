<h1>Search for <?php echo $query; ?></h1>

<?php if(count($teams)==0) : ?>
	<p>No teams found</p>
<?php else: ?>
	<h2>Teams</h2>
	<ul>
	<?php foreach($teams as $team): ?>
		<li><?php echo $this->Html->link($team['Team']['name'], array('controller'=>'teams', 'action'=>'view', $team['Team']['id'])); ?></li>
	<?php endforeach; ?>
	</ul>
<?php endif; ?>