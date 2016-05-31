<h1>Locations to Teams</h1>
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