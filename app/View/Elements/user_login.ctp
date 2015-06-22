<div class="users form">

<?php echo $this->Form->create('User', array('action'=>'login'));?>
    <fieldset>
        <legend>Sign in</legend>
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
    </fieldset>
<?php 
    echo $this->Form->button('Login', array(
      'div'=>'form-group',
      'class' => 'btn',
    ));
    
  echo $this->Form->end();

?>
</div>