<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {

  	public $helpers = array('Html','Form','Time');
//	public $components = array('Auth', 'Session');
//	public $uses = array('AppUser');

	public function beforeRender() {
//		$this->set('authuser', $this->AppUser->read(null, $this->Auth->user('id')));
	}

	public function beforeFilter() {
//		$this->Auth->allow('display');
//		$this->Auth->loginRedirect = array('controller'=>'calendars', 'action'=>'index');
	}

}