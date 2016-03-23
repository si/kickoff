<?php
$title = 'Event Details';
if(isset($competition)) $title .= ' - ' . $competition['Competition']['name'] . ' - Kick Off Calendars';
$this->viewVars['title_for_layout'] = $title;
?>

<h1>Bulk Events</h1>
<?php
echo $this->Form->create('Event'); 
?>

<datalist id="teams">
    <?php foreach($teams as $id=>$name) : ?>
    <option value="<?php echo $name; ?>">
    <?php endforeach; ?>
</datalist>

<fieldset>
    <legend>Shared</legend>
    <div class="row">
        <?php 
        $default_competition = (isset($this->request['named']['calendar'])) ?
        $this->request['named']['calendar'] :
        '';
        echo $this->Form->input('competition_id', array('default'=>$default_competition,'class'=>'span6','div'=>'span6')); 
        ?>
        <?php echo $this->Form->input('group', array('div'=>'span3','class'=>'span3')); ?>
        <?php echo $this->Form->input('description', array('div'=>'span3','class'=>'span3')); ?>
    </div>
</fieldset>

<fieldset>
    <div class="row">
		<?php echo $this->Form->input('home', array('label'=>'First Side','class'=>'span3','div'=>'span3', 'list'=>'teams')); ?>
		<?php echo $this->Form->input('away', array('label'=>'Second Side','class'=>'span3','div'=>'span3', 'list'=>'teams')); ?>
        <div class="span2">
            <label for="EventStart">Starts</label>
            <input type="text" name="data[Event][start]" id="EventStart" data-format="dd/MM/yyyy HH:mm PP" value="<?php if(isset($this->data['Event']['start'])) echo $this->Time->format('d/m/Y h:i A',$this->data['Event']['start']); ?>" class="span2" />
        </div>
        <div class="span2">
            <label for="EventEnds">Ends</label>
            <input type="text" name="data[Event][ends]" id="EventEnds" data-format="dd/MM/yyyy HH:mm PP" class="span2" value="<?php if(isset($this->data['Event']['ends'])) echo $this->Time->format('d/m/Y h:i A',$this->data['Event']['ends']); ?>">
        </div>
        <?php echo $this->Form->input('location',array('class'=>'span6','div'=>'span2')); ?>
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