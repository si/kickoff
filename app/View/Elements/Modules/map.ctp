<?php
if( isset($location) && $location['id'] !== null) :
    //var_dump($location);
    $position = $location['lat'] . ',' . $location['long'];
    $static_map_url = '//maps.googleapis.com/maps/api/staticmap?'
                    . 'center=' . $position 
                    . '&zoom=13'
                    //. '&maptype=roadmap'
                    . '&size=1200x600'
                    //. '&style=element:labels|visibility:off'
                    //. '&style=element:geometry.stroke|visibility:off'
                    //. '&style=feature:landscape|element:geometry|saturation:-100'
                    //. '&style=feature:water|saturation:-100|invert_lightness:true'
                    . '&key=AIzaSyDF79W5Fgg5DWryOVz1WOwbY80cOjOXzaM';
    $name = $location['name'];
?>
<div class="map" style="<?php echo $this->Html->cssThemeBackground($static_map_url, '#000', 'fixed', 0.3, 0.5); ?>">
    <h3 class="location"><?php echo ($name); ?></h3>
    <div class="actions">
        <a href="http://www.google.com/maps/place/<?php echo ($position); ?>" class="btn">Google Maps</a>
        <a href="http://maps.apple.com/?sll=<?php echo ($position); ?>&z=10&t=s" class="btn">Apple Maps</a>
        <input type="text" readonly value="<?php echo ($position); ?>" class="postal-code">
    </div>
</div>
<?php else: ?>
<p class="empty">Map unavailable</p>
<?php endif; ?>