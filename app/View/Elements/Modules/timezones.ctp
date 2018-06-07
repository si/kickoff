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
//    $timezones[] = $continent;
    foreach ($list as $index=>$name) {
        // Remove continents 
        $display = str_replace($continent . '/', '', $name);
        $display = str_replace(['_', '/'], ' ', $display);
        //$timezone = str_replace('/', '-', $name);
        $timezones[$continent][$name] = $display; 
    }
}

$timezone = (isset($this->params['named']['timezone'])) ? str_replace('-', '/', $this->params['named']['timezone'] ) : '';
//_debug($timezones);

?>

<div id="timezones">
    <a href="#" class="close">&times;</a>

    <?php echo $this->Form->create('UserTimezone', array('url'=>'/users/set_timezone')); ?>
        <h3>Select your timezone</h3>
        <?php echo $this->Form->input('Location', array('options' => $timezones, 'empty' => 'UTC (+00:00)', 'selected' => $timezone ) ); ?>
        <?php echo $this->Form->input('Remember', array( 'type'=>'checkbox', 'label' => 'Remember timezone' ) ); ?>

        <?php echo $this->Form->input('ReturnURL', array('type'=>'hidden', 'value' => $this->params->url ) ); ?>
        <?php echo $this->Form->button('Update' ); ?>
    <?php echo $this->Form->end(); ?>

</div>