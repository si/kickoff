<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {

  	public $helpers = array('Html' => array('className'=>'CustomHtml'),'Form','Time','Session','Number');

	var $components = array(
		'Email',
		'Session',
		'Auth' => array(
			'loginRedirect' => array('controller' => 'users', 'action' => 'view'),
			'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home'),
		),
	);

	function beforeFilter() {
		$this->Email->smtpOptions = array(
			'port'=>'587',
			'timeout'=>'30',
			'host' => 'smtp.sendgrid.net',
			'username'=>'simon.jobling@gmail.com',
			'password'=>'B34tr1c3',
			'client' => 'dev.petrolapp.me'
		);
		$this->Email->from    = 'Petrol <bot@petrolapp.me>';
	}

	public function beforeRender() {
		parent::beforeRender();
		if( isset($this->params['ext']) && in_array($this->params['ext'], array('json', 'ics') )) {
			$this->layout = $this->params['ext'] . '/default';
		}   
	}
}