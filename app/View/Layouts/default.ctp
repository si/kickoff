<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $title_for_layout?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Simon Jobling">

  <link href="/css/bootstrap.css" rel="stylesheet">
  <link href="/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="/css/bootstrap-datetimepicker.min.css" />
  <link href="http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900,400italic,700italic,900italic" rel="stylesheet">

  <link href="/css/kickoff.app.css" rel="stylesheet">

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

  <?php echo $this->element('Navigation/navigation'); ?>
  
  <div class="container">

    <?php echo $content_for_layout; ?>

    <hr>

    <footer>
      <p class="pull-left">&copy; KickOff Calendars 2013</p>
      <p class="pull-right">Another <a href="http://unstyled.com/">unstyled</a> product</p>
    </footer>

  </div> <!-- /container -->

  <script src="/js/libs/jquery-1.10.2.min.js"></script>
  <script src="/js/libs/bootstrap.min.js"></script>
  <script src="/js/libs/bootstrap-datetimepicker.min.js"></script>
  <script src="/js/libs/oauth.js"></script>
  <script src="/js/app/events.js"></script>
  <script src="/js/app/users.js"></script>

  <?php echo $this->element('intercom'); ?>
  
</body>
</html>
