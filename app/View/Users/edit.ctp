<?php
echo $this->Form->create('User');

  //if(isset($this->data['User']['id'])) echo $this->Form->input('id', array('type' => 'hidden'));
?>
<fieldset>
  <legend>Account</legend>
  <div class="input-group">
		<?php
      echo $this->Form->input('username', array(
        'label' => 'Username',
        'type' => 'text',
        'div' => 'col-6',
      ));
    ?>

    <?php
      echo $this->Form->input('email', array(
        'div' => 'col-6',
      ));
    ?>
  </div>
</fieldset>

<fieldset>
  <legend>Postcodes</legend>
  <div class="input-group">
    <?php
      echo $this->Form->input('home_postcode', array(
        'label' => 'Home',
        'div' => 'col-6',
      ));
    ?>
    <?php
      echo $this->Form->input('work_postcode', array(
        'label' => 'Work',
        'div' => 'col-6',
      ));
    ?>
  </div>
</fieldset>

<fieldset>
  <legend>Settings</legend>
  <div class="input-group">
    <?php
      echo $this->Form->input('timezone', array(
        'label' => 'Timezone',
        'div' => 'col-12',
        'options' => timezone_identifiers_list()
      ));
    ?>
  </div>
</fieldset>


<div class="input-group">
  <?php echo $this->Form->button('Save',array('class'=>'btn btn-primary')); ?>
  <?php echo $this->Html->link('Cancel',array('action'=>'view'),array('class'=>'btn')); ?>
</div>

<?php
	echo $this->Form->end();
?>
