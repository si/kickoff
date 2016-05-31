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
            <td><?php echo $this->Html->link($location['Location']['name'], array('controller'=>'locations', 'action'=>'view', $location['Location']['id'])); ?></td>
            <td>
            <?php
            /*
            echo $this->Form->input('Location.' . $location['Location']['id'] . '.team_id', array(
                'options'=>$teams,
                'empty' => '-'
            ));
            */
             
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
