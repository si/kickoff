<?php
$title = 'Location Details';
if(isset($location)) $title .= ' - ' . $location['Location']['name'] . ' - Kick Off Calendars';
$this->viewVars['title_for_layout'] = $title;
?>
<h1>Location Details</h1>
<?php
echo $this->Form->create('Location'); 
  if(isset($this->data['Location']['id'])) echo $this->Form->input('id',array('type'=>'hidden'));
?>
<fieldset>
    <legend>Data</legend>

    <div class="row">
        <?php echo $this->Form->input('name', array('class'=>'span12','div'=>'span12')); ?>
    </div>

    <div class="row">
        <?php echo $this->Form->input('city',array('class'=>'span3','div'=>'span3')); ?>
        <?php echo $this->Form->input('postcode',array('class'=>'span3','div'=>'span3')); ?>
        <?php echo $this->Form->input('lat', array('div'=>'span3','class'=>'span3')); ?>
        <?php echo $this->Form->input('long', array('div'=>'span3','class'=>'span3')); ?>
    </div>
</fieldset>

<fieldset>
    <legend>Preview</legend>
    <div class="row">
        <output class="span12 map">Map Preview</output>
    </div>
</fieldset>
<?php
	if(isset($this->data['Location']['id'])) {
		$cancel_link = array('controller'=>'location','action'=>'view',$this->data['Location']['id']);
	} elseif (isset($this->request['named']['location'])) {
		$cancel_link = array('controller'=>'locataion','action'=>'view',$this->request['named']['locatiaon']);
	} else {
		$cancel_link = array('controller'=>'locations','action'=>'index');
	}
	?>
	<div class="btn-group btn-block">
	<?php
        echo $this->Form->submit('Save', array('class'=>'btn', 'div'=>'')); 
        echo $this->Html->link('Cancel',$cancel_link, array('class'=>'btn', 'div'=>null)); 
    ?>
	</div>
<?php
echo $this->Form->end(); 
?>