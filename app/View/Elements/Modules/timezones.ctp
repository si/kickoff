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

$timezones = array();

foreach ($timezone_identifiers as $continent=>$list) {
    foreach ($list as $index=>$name) {
        // Remove continents 
        $display = str_replace($continent . '/', '', $name);
        $display = str_replace(['_', '/'], ' ', $display);
        $timezone = str_replace('/', '-', $name);
        $timezones[$timezone] = $display; 
    }
}

_debug($timezones);

?>

<div id="timezones">
    <a href="#" class="close">&times;</a>

    <h3>Select your timezone</h3>

    <?php echo $this->Form->select('TimezoneContinent', array_keys($timezone_identifiers) ); ?>
    <?php echo $this->Form->select('TimezoneName', $timezones ); ?>
    <?php echo $this->Form->input('TimezoneRemember', array( 'type'=>'checkbox', 'label' => 'Remember timezone' ) ); ?>

    <?php echo $this->Form->button('Update' ); ?>

</div>