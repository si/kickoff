<?php echo $this->Form->create('Event', array('action' => 'vs', 'type' => 'get', 'inputDefaults' => array(
        'label' => false,
        'div' => false
    ))); ?>
    <fieldset>
        <legend>When Does</legend>
        <?php echo $this->Form->input('TeamA', array('class'=>'team-lookup')); ?>
        <abbr title="versus">vs</abbr>
        <?php echo $this->Form->input('TeamB', array('class'=>'team-lookup')); ?>
        <button type="submit">Kick Off</button>
    </fieldset>
</form>
<?php echo $this->Form->end(); ?>
