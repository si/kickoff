<?php
if( isset($location) && $location['id'] !== null) {
    var_dump($location);
    $position = $location['lat'];
    $name = $location['name'];
?>
<div class="map" style="background-size: cover;background-image: url('//maps.googleapis.com/maps/api/staticmap?center=<?php echo urlencode($position); ?>&amp;size=800x600&amp;style=element:labels|visibility:off&amp;style=element:geometry.stroke|visibility:off&amp;style=feature:landscape|element:geometry|saturation:-100&amp;style=feature:water|saturation:-100|invert_lightness:true&amp;key=AIzaSyBMISecHzJR_Mie1nlsQWpQkv-E6B7ZFno');">
    <?php echo ($name); ?>
    <div class="actions">
        <a href="http://www.google.com/maps/place/<?php echo urlencode($position); ?>" class="btn">Google Maps</a>
        <a href="maps://<?php echo urlencode($position); ?>" class="btn">Apple Maps</a>
    </div>
</div>
<?php
} else {
?>
<p class="empty">Map unavailable</p>
<?php    
}
?>