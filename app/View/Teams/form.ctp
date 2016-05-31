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
		<?php echo $this->Form->input('short', array('label'=>'Initials','div'=>'span2','class'=>'span2')); ?>
		<?php echo $this->Form->input('slug', array('label'=>'Slug','placeholder'=>'URL friendly', 'div'=>'span2','class'=>'span2')); ?>
  </div>
  <div class="row">
		<?php echo $this->Form->input('location_id', array('label'=>'Home Stadium','empty'=>'-','div'=>'span3','class'=>'span3','empty'=>'-', 'after'=>$this->Html->link('New location',array('controller'=>'locations','action'=>'add'), array('class'=>'btn btn-sm')))); ?>
		<?php echo $this->Form->input('competition_id', array('label'=>'Competition','empty'=>'-','div'=>'span3','class'=>'span3')); ?>
		<?php echo $this->Form->input('sport_id', array('label'=>'Sport','empty'=>'-','div'=>'span3','class'=>'span3')); ?>
		<?php echo $this->Form->input('theme_id', array('label'=>'Theme','empty'=>'-','div'=>'span3','class'=>'span3','empty'=>'-')); ?>
  </div>	
  <div class="row">
		<?php echo $this->Form->input('website', array('label'=>'Website','div'=>'span6','class'=>'span6')); ?>
		<?php echo $this->Form->input('twitter', array('label'=>'Twitter','div'=>'span6','class'=>'span6', 'prefix'=>'@')); ?>
  </div>	
  <div class="row">
		<?php echo $this->Form->input('events_import_url', array(
				'label'=>'Event Data Source',
				'type'=>'url',
				'div'=>'span12',
				'class'=>'span12', 
				'after'=>'Last import: ' . ( ( isset($this->data['Team'] ) ) ? $this->Time->format('d M Y H:i', $this->data['Team']['events_import_updated']) : 'N/A' ) )
		); ?>
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