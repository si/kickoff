<?php
$title = 'Event Details';
if(isset($calendar)) $title .= ' - ' . $calendar['Calendar']['name'] . ' - Kick Off Calendars';
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
    <?php echo $this->Form->input('summary', array('class'=>'span6','div'=>'span6')); ?>
  </div>

  <div class="row">
    <div class="span3">
      <label for="EventStart">Starts</label>
      <input type="text" name="data[Event][start]" id="EventStart" data-format="dd/MM/yyyy HH:mm PP" value="<?php if(isset($this->data['Event']['start'])) echo $this->Time->format('d/m/Y h:i A',$this->data['Event']['start']); ?>" class="span3" />
    </div>
    <div class="span3">
      <label for="EventEnd">Ends</label>
      <input type="text" name="data[Event][end]" id="EventEnd" data-format="dd/MM/yyyy HH:mm PP" class="span3" value="<?php if(isset($this->data['Event']['end'])) echo $this->Time->format('d/m/Y h:i A',$this->data['Event']['end']); ?>">
    </div>
	  <?php echo $this->Form->input('location',array('class'=>'span6','div'=>'span6')); ?>
  </div>
</fieldset>


<fieldset>
  <legend>Extra</legend>
  <div class="row">
    <?php echo $this->Form->input('description', array('div'=>'span6','class'=>'span6')); ?>
    <?php echo $this->Form->input('group', array('div'=>'span6','class'=>'span6')); ?>
    <?php 
      $default_calendar = (isset($this->request['named']['calendar'])) ?
        $this->request['named']['calendar'] :
        '';
      echo $this->Form->input('calendar_id', array('default'=>$default_calendar,'class'=>'span6','div'=>'span6')); 
    ?>
  </div>
</fieldset>
<?php
	if(isset($this->data['Event']['id'])) {
		$cancel_link = array('controller'=>'events','action'=>'view',$this->data['Event']['id']);
	} elseif (isset($this->request['named']['calendar'])) {
		$cancel_link = array('controller'=>'calendars','action'=>'view',$this->request['named']['calendar']);
	} else {
		$cancel_link = array('controller'=>'calendars','action'=>'index');
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