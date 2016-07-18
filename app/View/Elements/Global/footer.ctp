<footer>
    <div class="social">
        <?php
        echo $this->element('Global/share', array(
            'title'=>$title_for_layout, 
            'link'=>('https://kickoffcalendars.com' . $this->params->here )
        )); 
        ?>
    </div>
    <p class="copyright">&copy; KickOff Calendars <?php echo date('Y'); ?></p>
</footer>
