<?php
$this->viewVars['title_for_layout'] = 'Competition Settings - Kick Off Calendars';
?>
<h1>Competition Settings</h1>
<?php
echo $this->Form->create('Competition'); 
  if(isset($this->data['Competition']['id'])) echo $this->Form->input('id',array('type'=>'hidden'));
?>
<fieldset>
  <legend>Details</legend>
  <div class="row">
		<?php echo $this->Form->input('name', array('label'=>'Name','div'=>'span4','class'=>'span4')); ?>
		<?php echo $this->Form->input('description', array('label'=>'Description','div'=>'span4','class'=>'span4')); ?>
		<?php echo $this->Form->input('slug', array('label'=>'Slug','div'=>'span4','class'=>'span4')); ?>
  </div>
  <div class="row">
	  <?php echo $this->Form->input('sport_id',array('options'=>$sports,'div'=>'span4','class'=>'span4')); ?>
	  <?php echo $this->Form->input('theme_id',array('options'=>$themes,'empty'=>'-','div'=>'span4','class'=>'span4')); ?>
	  <?php echo $this->Form->input('status',array('options'=>$status,'empty'=>'-','div'=>'span4','class'=>'span4')); ?>
  </div>
</fieldset>
<?php
	if(isset($this->data['Competition']['id'])) {
		$cancel_link = array('controller'=>'competitions','action'=>'view',$this->data['Competition']['id']);
	} else {
		$cancel_link = array('controller'=>'competitions','action'=>'index');
	}
  echo $this->Form->submit('Save',array('class'=>'btn btn-primary btn-large')); 
  echo $this->Html->link('Cancel',$cancel_link,array('class'=>'btn btn-default btn-sm')); 
echo $this->Form->end(); 
?>