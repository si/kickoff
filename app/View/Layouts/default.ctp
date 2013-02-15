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
  <style type="text/css">
    body {
      padding-top: 60px;
      padding-bottom: 40px;
    }
  </style>
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

<body>

  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="brand" href="#">KickOff Calendars</a>
        <div class="nav-collapse collapse">
          <ul class="nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="/calendars/">Calendars</a></li>
            <li><a href="/sports/">Sports</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="nav-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <form class="navbar-form pull-right" action="/users/login/">
            <input class="span2" type="text" name="username" placeholder="Email">
            <input class="span2" type="password" name="password" placeholder="Password">
            <button type="submit" class="btn">Sign in</button>
          </form>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>

  <div class="container">

    <?php echo $content_for_layout; ?>

    <hr>

    <footer>
      <p>&copy; KickOff Calendars 2013</p>
    </footer>

  </div> <!-- /container -->

  <script src="/js/jquery.js"></script>
  <script src="/js/bootstrap-transition.js"></script>
  <script src="/js/bootstrap-alert.js"></script>
  <script src="/js/bootstrap-modal.js"></script>
  <script src="/js/bootstrap-dropdown.js"></script>
  <script src="/js/bootstrap-scrollspy.js"></script>
  <script src="/js/bootstrap-tab.js"></script>
  <script src="/js/bootstrap-tooltip.js"></script>
  <script src="/js/bootstrap-popover.js"></script>
  <script src="/js/bootstrap-button.js"></script>
  <script src="/js/bootstrap-collapse.js"></script>
  <script src="/js/bootstrap-carousel.js"></script>
  <script src="/js/bootstrap-typeahead.js"></script>

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
