<?php
$this->viewVars['title_for_layout'] = 'Sport Details';
?>
<h1>Sport Details</h1>
<?php
echo $this->Form->create('Sport'); 
  if(isset($this->data['Sport']['id'])) echo $this->Form->input('id',array('type'=>'hidden'));
?>
<fieldset>
  <legend>Details</legend>
  <div class="row">
		<?php echo $this->Form->input('name', array('label'=>'Name','div'=>'span4','class'=>'span4')); ?>
		<?php echo $this->Form->input('slug', array('label'=>'Slug','div'=>'span4','class'=>'span4')); ?>
		<?php echo $this->Form->input('theme_id', array('label'=>'Theme','div'=>'span4','class'=>'span4','empty'=>'-')); ?>
  </div>	
</fieldset>
<?php
	if(isset($this->data['Sport']['id'])) {
		$cancel_link = array('controller'=>'sports','action'=>'view',$this->data['Sport']['id']);
	} else {
		$cancel_link = array('controller'=>'sports','action'=>'index');
	}
  echo $this->Form->submit('Save',array('class'=>'btn btn-primary btn-large')); 
  echo $this->Html->link('Cancel',$cancel_link,array('class'=>'btn btn-default btn-sm')); 
echo $this->Form->end(); 
?>