<footer>
    <p class="copyright">&copy; Kick Off Times 2008–<?php echo date('Y'); ?></p>
    <ul>
    <?php 
    if($this->Session->read('Auth.User.id')!='') {
        echo $this->element('Navigation/user_menu');
    } else {
        echo $this->element('Navigation/guest_menu');
    } 
    ?>
    </ul>
</footer>
