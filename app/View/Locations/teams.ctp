<h1>Locations to Teams</h1>

<?php //var_dump($teams); ?>

<datalist id="teams">
    <?php foreach($teams as $id => $name) : ?>
    <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
    <?php endforeach; ?>
</datalist>

<table>
    <tbody>
    <?php foreach($locations as $location) : ?>
        <tr>
            <td><?php echo $location['Location']['name']; ?></td>
            <td><?php var_dump($location['Team']); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>