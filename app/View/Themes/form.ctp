<?php
$this->viewVars['title_for_layout'] = 'Theme';
?>
<h1><?php echo (isset($this->data['Theme']['id'])) ? 'Edit' : 'New'; ?> Theme</h1>
<?php
echo $this->Form->create('Theme', array('type' => 'file')); 
  if(isset($this->data['Theme']['id'])) echo $this->Form->input('id',array('type'=>'hidden'));
?>
<fieldset>
  <legend>Details</legend>
  <div class="row">
		<?php 
		echo $this->Form->input('name', 
			array(
				'label'=>'Name',
		    'div'=>'span3',
		    'class'=>'span3'
			)
		); ?>
		<?php 
		echo $this->Form->input('primary_colour', 
		  array(
		    //'type'=>'color',
		    'label'=>'Primary Colour',
		    'placeholder'=>'#RGB or R,G,B',
		    'div'=>'span3',
		    'class'=>'span3'
		  )
		); ?>
		<?php 
		echo $this->Form->input('secondary_colour', 
		  array(
		    //'type'=>'color',
		    'label'=>'Secondary Colour',
		    'placeholder'=>'#RGB or R,G,B',
		    'div'=>'span3',
		    'class'=>'span3'
		  )
		); ?>
		<?php 
		echo $this->Form->input('image', 
		  array(
		    'type'=>'file',
		    'label'=>'Image',
		    'div'=>'span3',
		    'class'=>'span3'
		  )
		); ?>
  </div>
</fieldset>
<?php
	if(isset($this->data['Theme']['id'])) {
		$cancel_link = array('action'=>'view',$this->data['Theme']['id']);
	} else {
		$cancel_link = array('action'=>'index');
	}
  echo $this->Form->submit('Save',array('class'=>'btn btn-primary btn-large')); 
  echo $this->Html->link('Cancel',$cancel_link,array('class'=>'btn btn-default btn-sm')); 
echo $this->Form->end(); 
?>