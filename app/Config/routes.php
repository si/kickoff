<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
	Router::connect('/calendars', array('controller' => 'calendars', 'action' => 'index'));
	Router::connect('/calendars/:action/*', array('controller' => 'calendars'));

	Router::connect('/events', array('controller' => 'events', 'action' => 'index'));
	Router::connect('/events/view/*', array('controller' => 'events', 'action' => 'view'));
	Router::connect('/events/form/*', array('controller' => 'events', 'action' => 'form'));
	Router::connect('/events/export/*', array('controller' => 'events', 'action' => 'export'));

	Router::connect('/sports', array('controller' => 'sports', 'action'=>'index'));
	Router::connect('/sports/:action/*', array('controller' => 'sports'));

	Router::connect('/teams', array('controller' => 'teams', 'action'=>'index'));
	Router::connect('/teams/:action/*', array('controller' => 'teams'));

	Router::connect('/themes', array('controller' => 'themes', 'action'=>'index'));
	Router::connect('/themes/:action/*', array('controller' => 'themes'));

  Router::connect('/home', array( 'controller' => 'app_users', 'action' => 'home'));
  Router::connect('/admin', array( 'controller' => 'pages', 'action' => 'display', 'admin'));
  Router::connect('/users', array( 'controller' => 'app_users', 'action' => 'home'));
  Router::connect('/users/index/*', array( 'controller' => 'app_users'));
  Router::connect('/users/:action/*', array( 'controller' => 'app_users'));
  Router::connect('/users/users/:action/*', array( 'controller' => 'app_users'));
  Router::connect('/login', array( 'controller' => 'app_users', 'action' => 'login'));
  Router::connect('/logout', array( 'controller' => 'app_users', 'action' => 'logout'));
  Router::connect('/register', array( 'controller' => 'app_users', 'action' => 'add'));
  Router::connect('/auth_login/*', array( 'controller' => 'app_users', 'action' => 'auth_login'));
  Router::connect('/auth_callback/*', array( 'controller' => 'app_users', 'action' => 'auth_callback'));

//	Router::connect('/*', array('controller' => 'calendars', 'action' => 'view'));


/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes.  See the CakePlugin documentation on 
 * how to customize the loading of plugin routes.
 */
 
	Router::parseExtensions('ics','json');	

	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
