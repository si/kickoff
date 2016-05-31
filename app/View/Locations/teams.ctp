<h1>Locations to Teams</h1>

<?php //var_dump($teams); ?>

<datalist id="teams">
    <?php foreach($teams as $id => $name) : ?>
    <option data-id="<?php echo $id; ?>" value="<?php echo $name; ?>" />
    <?php endforeach; ?>
</datalist>

<?php echo $this->Form->create('LocationTeams'); ?>
    <?php echo $this->Form->button('Save', array('type'=>'submit')); ?>

<table>
    <tbody>
    <?php foreach($locations as $location) : ?>
        <tr>
            <td><?php echo $location['Location']['name']; ?></td>
            <td>
            <?php
            echo $this->Form->input('Location.' . $location['Location']['id'] . '.team_name', array('list'=>'teams')); 
            foreach($location['Team'] as $team) {
                echo $this->Html->link($team['name'], array('controller'=>'teams', 'action'=>'view', $team['slug']));
            }
            ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php echo $this->Form->end(); ?>
