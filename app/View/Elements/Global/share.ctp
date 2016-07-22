<?php
/*
Usage:
echo $this->element('Global/share', array(
    'title'=>$this->viewVars['title_for_layout'], 
    'link'=>('https://kickoffcalendars.com' . $this->params->here )
)); 
*/

if(!isset($size)) $size = 56;
$title = urlencode($title);
$link = urlencode($link);
?>
<div class="share-this">
    <a href="https://twitter.com/intent/tweet?text=<?php echo $title; ?>&url=<?php echo $link;?>&via=kickoffcal" target="_blank" title="Share on Twitter" class="share-twitter">
        <img src="/img/src/icons/twitter-black.svg" alt="Twitter">
    </a>

    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $link; ?>" target="_blank" title="Share on Facebook" class="share-facebook">
        <img src="/img/src/icons/facebook-black.svg" alt="Facebook">
    </a>

    <a href="https://plus.google.com/share?url=<?php echo $link; ?>" target="_blank" title="Share on Google" class="share-google">
        <img src="/img/src/icons/google-plus-black.svg" alt="Google+">
    </a>
</div>