<div id="timezones">
    <a href="#" class="close">&times;</a>
    <h2>Select your timezone</h2>
<?php
$timezone_identifiers = array(
    'Africa' => DateTimeZone::listIdentifiers(DateTimeZone::AFRICA),
    'America' => DateTimeZone::listIdentifiers(DateTimeZone::AMERICA),
    'Antarctica' => DateTimeZone::listIdentifiers(DateTimeZone::ANTARCTICA),
    'Arctic' => DateTimeZone::listIdentifiers(DateTimeZone::ARCTIC),
    'Asia' => DateTimeZone::listIdentifiers(DateTimeZone::ASIA),
    'Europe' => DateTimeZone::listIdentifiers(DateTimeZone::EUROPE),
    'Indian' => DateTimeZone::listIdentifiers(DateTimeZone::INDIAN),
    'Pacific' => DateTimeZone::listIdentifiers(DateTimeZone::PACIFIC),
);

foreach ($timezone_identifiers as $continent=>$list) :
?>
    <h3><?php echo $continent; ?></h3>
    <ul>
        <?php foreach ($list as $index=>$name) : 
            $name = str_replace($continent . '/', '', $name);
        ?>
        <li>
        <?php echo $this->Html->link($name, array(
                'controller' => $this->params['controller'], 
                'action' => $this->params['action'], 
                $this->params['pass'][0],
                'timezone' => $index,
            )); ?></li>
        <?php endforeach; ?>      
    </ul>
<?php
endforeach;
?>
</div>