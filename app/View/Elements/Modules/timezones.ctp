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
?>
<div id="timezones">
    <a href="#" class="close">&times;</a>

    <h3>Select your timezone</h3>

    <div class="continents">
    <?php
    foreach ($timezone_identifiers as $continent=>$list) :
    ?>
    <section id="Timezone<?php echo $continent; ?>" class="continent">
    <h4><?php echo $continent; ?></h4>
    <ul>
        <?php foreach ($list as $index=>$name) :
            // Remove continents 
            $display = str_replace($continent . '/', '', $name);
            $display = str_replace(['_', '/'], ' ', $display);
        ?>
        <li>
        <?php echo $this->Html->link($display, array(
                'controller' => $this->params['controller'], 
                'action' => $this->params['action'], 
                $this->params['pass'][0],
                'timezone' => str_replace('/', '-', $name),
            )); ?></li>
        <?php endforeach; ?>      
    </ul>
    </section>
    <?php
    endforeach;
    ?>
    </div>
</div>