<h1>New Event</h1>
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
    'type'=>'time',
    'interval' => 5,
  ));
  ?>
  <?php echo $this->Form->input('calendar_id'); ?>
</fieldset>
<fieldset>
  <legend>Extra</legend>
  <?php echo $this->Form->input('location'); ?>
  <?php echo $this->Form->input('description'); ?>
</fieldset>
<?php
  echo $this->Form->submit('Save'); 
echo $this->Form->end(); 
?>