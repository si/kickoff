<footer>
    <p class="copyright">&copy; KickOff Calendars <?php echo date('Y'); ?></p>
    <?php 
    if($this->Session->read('Auth.User.id')!='') {
        echo $this->element('Navigation/user_menu');
    } else {
        echo $this->element('Navigation/guest_menu');
    } 
    ?>
</footer>
