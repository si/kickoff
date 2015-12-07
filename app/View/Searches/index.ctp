<?php
$title = 'Kick Off Calendars';
if(isset($query)) $title = 'Search for ' . $query . ' - ' . $title;
$this->viewVars['title_for_layout'] = $title;
?>

<h1>Search for <?php echo $query; ?></h1>

<div class="row">
	<div class="span4">
	<?php if(!isset($teams) || count($teams)==0) : ?>
		<p class="empty">No teams found</p>
	<?php else: ?>
		<h2>Teams</h2>
		<ol class="tiles">
		<?php foreach($teams as $team): ?>
			<li <?php if($team['Theme']['image']!='') echo 'style="background-image: url('.$team['Theme']['image'].');"'; ?>">
				<?php echo $this->Html->link($team['Team']['name'], array('controller'=>'teams', 'action'=>'view', $team['Team']['id'])); ?>
			</li>
		<?php endforeach; ?>
		</ol>
	<?php endif; ?>
	</div>

	<div class="span4">
	<?php if(!isset($competitions) || count($competitions)==0) : ?>
		<p class="empty">No competitions found</p>
	<?php else: ?>
		<h2>Competitions</h2>
		<ol class="tiles">
		<?php foreach($competitions as $competition): ?>
			<li><?php echo $this->Html->link($competition['Competition']['name'], array('controller'=>'competitions', 'action'=>'view', $competition['Competition']['id'])); ?></li>
		<?php endforeach; ?>
		</ol>
	<?php endif; ?>
	</div>

	<div class="span4">
	<?php if(!isset($sports) || count($sports)==0) : ?>
		<p class="empty">No sports found</p>
	<?php else: ?>
		<h2>Sports</h2>
		<ol class="tiles">
		<?php foreach($sports as $sport): ?>
			<li><?php echo $this->Html->link($sport['Sport']['name'], array('controller'=>'sports', 'action'=>'view', $sport['Sport']['id'])); ?></li>
		<?php endforeach; ?>
		</ol>
	<?php endif; ?>
	</div>
	
</div>