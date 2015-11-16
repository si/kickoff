<?php
$title = 'Event Details';
if(isset($competition)) $title .= ' - ' . $competition['Competition']['name'] . ' - Kick Off Calendars';
$this->viewVars['title_for_layout'] = $title;
?>
<h1>Event Details</h1>
<?php
echo $this->Form->create('Event'); 
  if(isset($this->data['Event']['id'])) echo $this->Form->input('id',array('type'=>'hidden'));
?>
<fieldset>
  <legend>Basics</legend>

  <div class="row">
		<datalist id="teams">
		<?php foreach($teams as $id=>$name) : ?>
		  <option value="<?php echo $name; ?>">
    <?php endforeach; ?>
		</datalist>
		<?php echo $this->Form->input('home', array('label'=>'First Side','class'=>'span3','div'=>'span3', 'list'=>'teams')); ?>
		<?php echo $this->Form->input('away', array('label'=>'Second Side','class'=>'span3','div'=>'span3', 'list'=>'teams')); ?>
    <?php echo $this->Form->input('summary', array('readonly'=>'readonly', 'class'=>'span6','div'=>'span6')); ?>
  </div>

  <div class="row">
    <div class="span3">
      <label for="EventStart">Starts</label>
      <input type="text" name="data[Event][start]" id="EventStart" data-format="dd/MM/yyyy HH:mm PP" value="<?php if(isset($this->data['Event']['start'])) echo $this->Time->format('d/m/Y h:i A',$this->data['Event']['start']); ?>" class="span3" />
    </div>
    <div class="span3">
      <label for="EventEnds">Ends</label>
      <input type="text" name="data[Event][ends]" id="EventEnds" data-format="dd/MM/yyyy HH:mm PP" class="span3" value="<?php if(isset($this->data['Event']['ends'])) echo $this->Time->format('d/m/Y h:i A',$this->data['Event']['ends']); ?>">
    </div>
	  <?php echo $this->Form->input('location',array('class'=>'span6','div'=>'span6')); ?>
  </div>
</fieldset>


<fieldset>
  <legend>Extra</legend>
  <div class="row">
    <?php 
      $default_competition = (isset($this->request['named']['competition'])) ?
        $this->request['named']['competition'] :
        '';
      echo $this->Form->input('competition_id', array('default'=>$default_competition,'class'=>'span6','div'=>'span6')); 
    ?>
    <?php echo $this->Form->input('description', array('div'=>'span6','class'=>'span6')); ?>
    <?php echo $this->Form->input('group', array('div'=>'span6','class'=>'span6')); ?>
  </div>
</fieldset>
<?php
	if(isset($this->data['Event']['id'])) {
		$cancel_link = array('controller'=>'events','action'=>'view',$this->data['Event']['id']);
	} elseif (isset($this->request['named']['competition'])) {
		$cancel_link = array('controller'=>'competitions','action'=>'view',$this->request['named']['competition']);
	} else {
		$cancel_link = array('controller'=>'competitions','action'=>'index');
	}
	?>
	<div class="btn-group btn-block">
	<?php
  echo $this->Form->submit('Save',array('class'=>'btn btn-primary btn-sm', 'div'=>null)); 
  echo $this->Html->link('Cancel',$cancel_link,array('class'=>'btn btn-default btn-sm', 'div'=>null)); 
  ?>
	</div>
<?php
echo $this->Form->end(); 
?>