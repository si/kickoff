<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $title_for_layout?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Le styles -->
  <link href="/css/bootstrap.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

  <link href="/css/kickoff.app.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css" />
  <link href="/css/bootstrap-responsive.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="/ico/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="/ico/favicon.png">

</head>

<body class="<?php echo $this->params['controller'] . ' ' . $this->params['action']; ?>">

  <?php echo $this->element('navigation'); ?>
  
  <div class="container">

    <?php echo $content_for_layout; ?>

    <hr>

    <footer>
      <p>&copy; KickOff Calendars 2013</p>
    </footer>

  </div> <!-- /container -->

  <script src="/js/jquery-1.10.2.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/bootstrap-datetimepicker.min.js"></script>
  <script src="/js/events.js"></script>

  <?php 
  // Intercom.io integration
  if(isset($this->Session)) : ?>
  <script id="IntercomSettingsScriptTag">
    window.intercomSettings = {
      // TODO: The current logged in user's email address.
      email: "<?php echo $this->Session->read('Auth.User.email') ?>",
      // TODO: The current logged in user's sign-up date as a Unix timestamp.
      created_at: <?php echo strotime($this->Session->read('Auth.User.created_at')) ?>,
      app_id: "krofbee5"
    };
  </script>
  <script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://api.intercom.io/api/js/library.js';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}};})()</script>
  <?php endif; ?>

</body>
</html>
