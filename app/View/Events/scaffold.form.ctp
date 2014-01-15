<?php
$this->viewVars['title_for_layout'] = 'Event Details';
?>
<h1>Event Details</h1>
<?php
echo $this->Form->create('Event'); 
?>
<fieldset>
  <legend>Basics</legend>
  <div class="row">
		<?php echo $this->Form->input('home', array('label'=>'Home Team','div'=>'span-3')); ?>
		<?php echo $this->Form->input('away', array('label'=>'Away Team','div'=>'span-3')); ?>
	  <?php echo $this->Form->input('summary', array('readonly'=>true,'div'=>'span-6')); ?>
  </div>
  <div class="row">
	  <?php echo $this->Form->input('location',array('class'=>'span-12','div'=>'span-12')); ?>
  </div>
  <div class="row">
	  <?php 
	  echo $this->Form->input('start', array(
	    'dateFormat' => 'DMY', 
	    'minYear' => date('Y'),
	    'maxYear' => (date('Y')+5),
	    'interval' => 5,
	  	'label'=>'Starts',
	    'div' => 'span-6',
	  ));
	  ?>
	  <?php
	  echo $this->Form->input('end', array(
	    'dateFormat' => 'DMY', 
	    'minYear' => date('Y'),
	    'maxYear' => (date('Y')+5),
	    'interval' => 5,
	  	'label'=>'Ends',
	    'div' => 'span-6',
	  ));
	  ?>
  </div>
  <?php 
  $default_calendar = (isset($this->request['named']['calendar'])) ?
  	$this->request['named']['calendar'] :
  	'';
  	
  echo $this->Form->input('calendar_id', array('default'=>$default_calendar)); ?>
</fieldset>
<fieldset>
  <legend>Extra</legend>
  <?php echo $this->Form->input('description'); ?>
  <?php echo $this->Form->input('group'); ?>
</fieldset>
<?php
	if(isset($this->data['Event']['id'])) {
		$cancel_link = array('controller'=>'events','action'=>'view',$this->data['Event']['id']);
	} elseif (isset($this->request['named']['calendar'])) {
		$cancel_link = array('controller'=>'calendars','action'=>'view',$this->request['named']['calendar']);
	} else {
		$cancel_link = array('controller'=>'calendars','action'=>'index');
	}
  echo $this->Form->submit('Save',array('class'=>'btn btn-default btn-sm')); 
  echo $this->Html->link('Cancel',$cancel_link,array('class'=>'btn btn-default btn-sm')); 
echo $this->Form->end(); 
?>