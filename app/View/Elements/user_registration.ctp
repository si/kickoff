
<div class="users form">
<?php echo $this->Form->create('User', array('action' => 'add'));?>
    <fieldset>
        <legend><?php echo __('Your Details'); ?></legend>
        <div class="input-group">
			<?php
	        echo $this->Form->input('username', array(
	          'placeholder'=>'yourname',
	          'div' => 'col-6',
	        ));
	
	        echo $this->Form->input('password', array(
	          'div' => 'col-6',
	        ));
			?>
        </div>
        <div class="input-group">
	        <?php
	        echo $this->Form->input('email', array(
	          'type'=>'email',
	          'placeholder'=>'you@example.com',
	          'div' => 'col-12',
	        ));
	
	        echo $this->Form->input('role', array(
	          'type' => 'hidden',
	          'value' => 'Member',
	        ));
			?>
        </div>
    </fieldset>
  <?php 
    echo $this->Form->button('Register', array(
      'div'=>'input-group',
      'class' => 'btn',
    ));

  echo $this->Form->end();
    
?>
</div>