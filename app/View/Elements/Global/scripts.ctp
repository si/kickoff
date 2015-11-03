  <script src="/js/libs/jquery-1.10.2.min.js"></script>
  <script src="/js/libs/bootstrap.min.js"></script>
  <script src="/js/libs/bootstrap-datetimepicker.min.js"></script>
  <script src="/js/libs/oauth.js"></script>
  <script src="/js/app/events.js"></script>
  <script src="/js/app/users.js"></script>

  <?php 
  // Intercom.io integration
  if(isset($this->Session) && $this->Session->read('Auth.User.email') != '') : ?>
  <script id="IntercomSettingsScriptTag">
    window.intercomSettings = {
      // TODO: The current logged in user's email address.
      email: "<?php echo $this->Session->read('Auth.User.email') ?>",
      // TODO: The current logged in user's sign-up date as a Unix timestamp.
      created_at: <?php echo strtotime($this->Session->read('Auth.User.created')) ?>,
      app_id: "krofbee5"
    };
  </script>
  <script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://api.intercom.io/api/js/library.js';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}};})()</script>
  <?php endif; ?>

