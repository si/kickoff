  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <div class="nav-collapse collapse">
          <ul class="nav">

            <li><?php echo $this->Html->link('Sports', array('controller'=>'sports','action'=>'index')); ?></li>
            <li><?php echo $this->Html->link('Teams', array('controller'=>'teams','action'=>'index')); ?></li>
            <li><?php echo $this->Html->link('Calendars', array('controller'=>'calendars','action'=>'index')); ?></li>
            <li><?php echo $this->Html->link('( KO )', array('controller'=>'pages','action'=>'display', 'home')); ?></li>
            <li><?php echo $this->Html->link('Login with Facebook', '#', array('id'=>'LoginFacebook')); ?></li>
            <li class="dropdown hidden">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span id="LoginResult"></span>
              <b class="caret"></b></a>
              <ul class="dropdown-menu">

                <li class="nav-header">Profile</li>
                <li><a href="#">My Calendars</a></li>
                <li><a href="#">Account</a></li>
                <li><a href="#">Password</a></li>

                <li class="divider"></li>
                <li class="nav-header">Admin</li>
                <li><?php echo $this->Html->link('Themes', array('controller'=>'themes','action'=>'index')); ?></li>

                <li class="divider"></li>
                <li><a href="#">Log out</a></li>
              </ul>
            </li>

          </ul>

        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>
