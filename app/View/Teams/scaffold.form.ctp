<?php
$this->viewVars['title_for_layout'] = 'Team Details - Kick Off Calendars';
?>
<h1>Team Details</h1>
<?php
echo $this->Form->create('Team'); 
  if(isset($this->data['Team']['id'])) echo $this->Form->input('id',array('type'=>'hidden'));
?>
<fieldset>
  <legend>Details</legend>
  <div class="row">
	<?php echo $this->Form->input('name', array('label'=>'Name','div'=>'span4','class'=>'span4')); ?>
	<?php echo $this->Form->input('aliases', array('label'=>'Aliases','placeholder'=>'comma separated', 'div'=>'span4','class'=>'span4')); ?>
	<?php echo $this->Form->input('slug', array('label'=>'Slug','placeholder'=>'URL friendly', 'div'=>'span4','class'=>'span4')); ?>
  </div>
  <div class="row">
	<?php echo $this->Form->input('sport_id', array('label'=>'Sport','div'=>'span6','class'=>'span6')); ?>
	<?php echo $this->Form->input('theme_id', array('label'=>'Theme','div'=>'span6','class'=>'span6','empty'=>'-')); ?>
  </div>	
  <div class="row">
	<?php echo $this->Form->input('events_import_url', array('label'=>'Event Import URL','type'=>'url','div'=>'span8','class'=>'span8')); ?>
	<span class="span4">Last import: <?php echo $this->data['Team']['events_import_updated']; ?></span>
  </div>	
</fieldset>
<?php
	if(isset($this->data['Team']['id'])) {
		$cancel_link = array('controller'=>'teams','action'=>'view',$this->data['Team']['id']);
	} else {
		$cancel_link = array('controller'=>'teams','action'=>'index');
	}
  echo $this->Form->submit('Save',array('class'=>'btn btn-primary btn-large')); 
  echo $this->Html->link('Cancel',$cancel_link,array('class'=>'btn btn-default btn-sm')); 
echo $this->Form->end(); 
?>