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
  
  <div class="well">
    <div class="date input-append">
      <input type="text" name="data[Event][start]" id="EventStart" data-format="dd/MM/yyyy HH:mm PP" value="<?php if(isset($this->data['Event']['start'])) echo $this->Time->format('d/m/Y H:i A',$this->data['Event']['start']); ?>">
      <span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
    </div>
    <div class="date input-append">
      <input type="text" name="data[Event][end]" id="EventEnd" data-format="dd/MM/yyyy HH:mm PP" value="<?php if(isset($this->data['Event']['end'])) echo $this->Time->format('d/m/Y H:i A',$this->data['Event']['end']); ?>">
      <span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
    </div>
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