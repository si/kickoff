<?php

App::uses('UsersController', 'Users.Controller');

class AppUsersController extends UsersController {

	public $components = array('ExtAuth.ExtAuth', 'Auth', 'Session', 'Cookie', 'Users.RememberMe');
	public $uses = array('SocialProfile', 'UserDetail');

	public function beforeFilter() {
		parent::beforeFilter();

		// required so that User Model is accessed via User and not Users.User
		$this->User = ClassRegistry::init('AppUser');
		$this->modelClass = 'AppUser';
	}

	public function beforeRender() {
		$this->viewVars['model'] = 'User';

		parent::beforeRender();
	}

	protected function _setupAuth() {
		parent::_setupAuth();

		$this->Auth->allow('auth_login', 'auth_callback', 'reset', 'verify', 'logout', 'view', 'reset_password', 'login', 'dummy');

		$this->Auth->authenticate = array(
			'Form' => array(
				'fields' => array(
					'password' => 'password'),
				'userModel' => 'AppUser',
				'scope' => array(
					'AppUser.active' => 1,
					'AppUser.email_verified' => 1)));

		$this->Auth->logoutRedirect = array('plugin' => null, 'controller' => 'pages', 'action' => 'display', 'home');
		$this->Auth->loginAction = array('admin' => false, 'plugin' => null, 'controller' => 'app_users', 'action' => 'login');
		$this->Auth->loginRedirect = array('plugin' => null, 'admin' => false, 'controller' => 'pages', 'action' => 'display', 'home');
	}

	/**
	 * Renders a view from App/View if present. Falls back to Plugin view if not.
	 * Removes the App prefix for convenience.
	 *
	 * @param null $view
	 * @param null $layout
	 *
	 * @return CakeResponse
	 */
	public function render($view = null, $layout = null) {
		if (is_null($view)) {
			$view = $this->action;
		}
		$viewPath = substr(get_class($this), 0, strlen(get_class($this)) - 10);

		if (substr($viewPath, 0, 3) == 'App') {
			$viewPath = substr($viewPath, 3);
		}

		if (!file_exists(APP . 'View' . DS . $viewPath . DS . $view . '.ctp')) {
			$this->viewPath = '..' . DS . 'Plugin' . DS . $viewPath . DS . 'View' . DS . $viewPath;
			// Overrides Plugin view so that the correct model alias is used.
			$this->viewVars['model'] = Inflector::singularize(substr(get_class($this), 0, strlen(get_class($this)) - 10));
		} else {
			$this->viewPath = $viewPath;
		}

		// This still causes plugin views that call plugin elements
		// to fail. The solution in this case was to simply copy the plugins/users
		// elements to app/view/elements/user
		return parent::render($view, $layout);
	}

	/* END OF CALLBACKS/SETUP. START OF AUTH REQUESTS AND CALLBACKS */

	public function auth_login($provider) {
		$result = $this->ExtAuth->login($provider);
		if ($result['success']) {

			$this->redirect($result['redirectURL']);

		} else {
			$this->Session->setFlash($result['message']);
			$this->redirect($this->Auth->loginAction);
		}
	}

	public function auth_callback($provider) {
		$result = $this->ExtAuth->loginCallback($provider);
		if ($result['success']) {

			$this->__successfulExtAuth($result['profile'], $result['accessToken']);

		} else {
			$this->Session->setFlash($result['message']);
			$this->redirect($this->Auth->loginAction);
		}
	}

	private function __successfulExtAuth($incomingProfile, $accessToken) {

		// search for profile
		$this->SocialProfile->recursive = -1;
		$existingProfile = $this->SocialProfile->find('first', array(
			'conditions' => array('oid' => $incomingProfile['oid'])
		));

		if ($existingProfile) {

			// Existing profile? log the associated user in.
			$user = $this->User->find('first', array(
				'conditions' => array('id' => $existingProfile['SocialProfile']['user_id'])
			));

			$this->__doAuthLogin($user);
		} else {

			// New profile.
			if ($this->Auth->loggedIn()) {

				// user logged in already, attach profile to logged in user.

				// create social profile linked to current user
				$incomingProfile['user_id'] = $this->Auth->user('id');
				$this->SocialProfile->save($incomingProfile);
				$this->Session->setFlash('Your ' . $incomingProfile['provider'] . ' account has been linked.');
				$this->redirect($this->Auth->loginRedirect);

			} else {

				// no-one logged in, must be a registration.
				unset($incomingProfile['id']);
				$user = $this->User->register(array('User' => $incomingProfile));

				// create social profile linked to new user
				$incomingProfile['user_id'] = $user['User']['id'];
				$incomingProfile['last_login'] = date('Y-m-d h:i:s');
				$incomingProfile['access_token'] = serialize($accessToken);
				$this->SocialProfile->save($incomingProfile);

				// populate user detail fields that can be extracted
				// from social profile
				$profileData = array_intersect_key(
					$incomingProfile,
					array_flip(array(
						'email',
						'given_name',
						'family_name',
						'picture',
						'gender',
						'locale',
						'birthday',
						'raw'
					))
				);

				$this->User->setupDetail();
				$this->User->UserDetail->saveSection(
					$user['User']['id'],
					array('UserDetail' => $profileData),
					'User'
				);

				// log in
				$this->__doAuthLogin($user);
			}
		}
	}

	private function __doAuthLogin($user) {
		if ($this->Auth->login($user['User'])) {
			$user['last_login'] = date('Y-m-d H:i:s');
			$this->User->save(array('User' => $user));

			$this->Session->setFlash(sprintf(__d('users', '%s you have successfully logged in'), $this->Auth->user('username')));
			$this->redirect($this->Auth->loginRedirect);
		}
	}

	/**
	 * Logged in home page
	 *
	 * @return void
	 */
	public function home() {


	}

	/**
	 * Simple listing of all users
	 *
	 * @return void
	 */
	public function admin_index() {

		//debug($this->Session->read());
		//debug($this->Auth->user());

		$this->paginate = array(
			'limit' => 12,
			'conditions' => array(
				'User.active' => 1,
				'User.email_verified' => 1));
		$this->set('users', $this->paginate('User'));
		$this->render('admin_index');
	}

	public function admin_administrator($user_id = null, $is_admin = false) {
		$user = $this->User->find('first', array('id' => $user_id));

		if ($user) {
			$user['User']['is_admin'] = $is_admin ? 1 : 0;
			if ($this->User->save($user, false)) {
				$this->Session->setFlash('The user "' . $user['User']['username'] . '" has been '
				. ($is_admin ? 'authorized':'revoked') . ' as an Administrator.'
				);
			} else {
				$this->Session->setFlash('Could not update the User');
			}
		} else {
			$this->Session->setFlash('Invalid User ID');
		}

		$this->redirect(array('admin' => true, 'controller' => 'app_users', 'action' => 'index'));
	}
}