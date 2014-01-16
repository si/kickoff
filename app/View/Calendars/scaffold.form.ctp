<?php
$this->viewVars['title_for_layout'] = 'Calendar Details';
?>
<h1>Calendar Details</h1>
<?php
echo $this->Form->create('Calendar'); 
?>
<fieldset>
  <legend>Details</legend>

		<?php echo $this->Form->input('name', array('label'=>'Name')); ?>
		<?php echo $this->Form->input('description', array('label'=>'Description')); ?>
	  <?php echo $this->Form->input('sport'); ?>

</fieldset>
<?php
	if(isset($this->data['Calendar']['id'])) {
		$cancel_link = array('controller'=>'calendars','action'=>'view',$this->data['Calendar']['id']);
	} else {
		$cancel_link = array('controller'=>'calendars','action'=>'index');
	}
  echo $this->Form->submit('Save',array('class'=>'btn btn-default btn-sm')); 
  echo $this->Html->link('Cancel',$cancel_link,array('class'=>'btn btn-default btn-sm')); 
echo $this->Form->end(); 
?>