<?php
$this->viewVars['title_for_layout'] = 'Event Details';
?>
<h1>Event Details</h1>
<?php
echo $this->Form->create('Event'); 
?>
<fieldset>
  <legend>Basics</legend>
  <?php echo $this->Form->input('summary'); ?>
  <?php 
  echo $this->Form->input('start', array(
    'dateFormat' => 'DMY', 
    'minYear' => date('Y'),
    'maxYear' => (date('Y')+5),
    'interval' => 5,
  ));
  ?>
  <?php
  echo $this->Form->input('end', array(
//    'type'=>'time',
    'dateFormat' => 'DMY', 
    'minYear' => date('Y'),
    'maxYear' => (date('Y')+5),
    'interval' => 5,
  ));
  ?>
  <?php echo $this->Form->input('calendar_id'); ?>
</fieldset>
<fieldset>
  <legend>Extra</legend>
  <?php echo $this->Form->input('location'); ?>
  <?php echo $this->Form->input('description'); ?>
  <?php echo $this->Form->input('home'); ?>
  <?php echo $this->Form->input('away'); ?>
  <?php echo $this->Form->input('group'); ?>
</fieldset>
<?php
  echo $this->Form->submit('Save'); 
echo $this->Form->end(); 
?>