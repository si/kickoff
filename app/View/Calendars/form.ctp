<?php
$this->viewVars['title_for_layout'] = 'Calendar Details';
?>
<h1>Calendar Details</h1>
<?php
echo $this->Form->create('Calendar'); 
  if(isset($this->data['Calendar']['id'])) echo $this->Form->input('id',array('type'=>'hidden'));
?>
<fieldset>
  <legend>Details</legend>
  <div class="row">
		<?php echo $this->Form->input('name', array('label'=>'Name','div'=>'span12','class'=>'span12')); ?>
  </div>
  <div class="row">
		<?php echo $this->Form->input('description', array('label'=>'Description','div'=>'span4','class'=>'span4')); ?>
	  <?php echo $this->Form->input('sport_id',array('options'=>$sports,'div'=>'span4','class'=>'span4')); ?>
	  <?php echo $this->Form->input('theme_id',array('options'=>$themes,'empty'=>'-','div'=>'span4','class'=>'span4')); ?>
  </div>
</fieldset>
<?php
	if(isset($this->data['Calendar']['id'])) {
		$cancel_link = array('controller'=>'calendars','action'=>'view',$this->data['Calendar']['id']);
	} else {
		$cancel_link = array('controller'=>'calendars','action'=>'index');
	}
  echo $this->Form->submit('Save',array('class'=>'btn btn-primary btn-large')); 
  echo $this->Html->link('Cancel',$cancel_link,array('class'=>'btn btn-default btn-sm')); 
echo $this->Form->end(); 
?>