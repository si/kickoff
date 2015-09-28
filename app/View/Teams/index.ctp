<?php
$this->viewVars['title_for_layout'] = 'Teams - Kick Off Calendars';
?>
<h1>Teams</h1>

<?php if(count($teams)>0) : ?>

	<?php echo $this->element('a_to_z'); ?>

	<ul class="tiles">
	  <?php foreach($teams as $team) : ?>
	    <li <?php if($team['Theme']['image']!='') echo 'style="background-image: url('.$team['Theme']['image'].');"'; ?>">
	      <h3><?php echo $this->Html->link($team['Team']['name'],array('action'=>'view',$team['Team']['id'])); ?></h3>
	      <?php echo $this->Html->link('Subscribe',array('action'=>'export',$team['Team']['id']),array('download'=>true, 'class'=>'btn')); ?>
	    </li>
	  <?php endforeach; ?>
	</ul>

	<div class="pull-left">
		<?php if($this->Paginator->hasPrev()) echo $this->Paginator->prev('Previous'); ?>
		<?php if($this->Paginator->hasNext()) echo $this->Paginator->next('Next'); ?>
	</div>

<?php endif; ?>

<div class="pull-right">
<?php echo $this->Html->adminLink('New Team',array('action'=>'form'),array('class'=>'btn btn-large')); ?>
</div>