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
		<ul class="unstyled">
		<?php foreach($teams as $team): ?>
			<li>
				<?php echo $this->Html->teamLink($team['Team']); ?>
			</li>
		<?php endforeach; ?>
		</ul>
	<?php endif; ?>
	</div>

	<div class="span4">
	<?php if(!isset($competitions) || count($competitions)==0) : ?>
		<p class="empty">No competitions found</p>
	<?php else: ?>
		<h2>Competitions</h2>
		<ul class="unstyled">
		<?php foreach($competitions as $competition): ?>
			<li><?php echo $this->Html->competitionLink($competition['Competition']); ?></li>
		<?php endforeach; ?>
		</ul>
	<?php endif; ?>
	</div>

	<div class="span4">
	<?php if(!isset($sports) || count($sports)==0) : ?>
		<p class="empty">No sports found</p>
	<?php else: ?>
		<h2>Sports</h2>
		<ul class="unstyled">
		<?php foreach($sports as $sport): ?>
			<li><?php echo $this->Html->link($sport['Sport']['name'], array('controller'=>'sports', 'action'=>'view', $sport['Sport']['id'])); ?></li>
		<?php endforeach; ?>
		</ul>
	<?php endif; ?>
	</div>
	
</div>