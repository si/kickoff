<?php
/**
 * Created by JetBrains PhpStorm.
 * User: scotty
 * Date: 16/01/2013
 * Time: 23:19
 * To change this template use File | Settings | File Templates.
 */
App::uses('User', 'Users.Model');
App::load('User');

class AppUser extends User {
	public $useTable = 'users';

	public function __construct($id = false, $table = null, $ds = null) {
		parent::__construct();

//		$this->alias = parent::alias;
	}

	public $hasMany = array(
		'UserDetail' => array(
			'className' => 'Users.UserDetail',
			'foreignKey' => 'user_id'
		),
		'SocialProfile' => array(
			'className' => 'SocialProfile',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


	/**
	 * Validation parameters. Email not required to be present or unique
	 * if login is via OAuth. Password not required for OAuth.
	 *
	 * @var array
	 */
	public $validateOAuth = array(
		/*'oid' => array(
			'unique_id' => array(
				'rule'=>array('isUnique', 'oid'),
				'message' => 'You have already registered.'),
		)*/
	);



	/**
	 * Registers a new user
	 *
	 * Options:
	 * - bool emailVerification : Default is true, generates the token for email verification
	 * - bool removeExpiredRegistrations : Default is true, removes expired registrations to do cleanup when no cron is configured for that
	 * - bool returnData : Default is true, if false the method returns true/false the data is always available through $this->User->data
	 *
	 * @param array $postData Post data from controller
	 * @param mixed should be array now but can be boolean for emailVerification because of backward compatibility
	 * @return mixed
	 */
	public function register($userData = array(), $options = array()) {

		if (!isset($userData['User']['oid'])) {
			return parent::register($userData, $options);
		}

		$defaults = array(
			'removeExpiredRegistrations' => true,
			'returnData' => true
		);
		extract(array_merge($defaults, $options));

		$userData = $this->_beforeRegistration($userData, false);

		if ($removeExpiredRegistrations) {
			$this->_removeExpiredRegistrations();
		}

		$this->set($userData);
		$this->validate = $this->validateOAuth;

		if ($this->validates()) {
			$this->create();
			$this->data = $this->save($userData, false);
			$this->data[$this->alias]['id'] = $this->id;
			if ($returnData) {
				return $this->data;
			}
			return true;
		}
		return false;
	}



	/**
	 * Sets some defaults for the UserDetail model
	 *
	 * @return void
	 */
	public function setupDetail() {
		$this->UserDetail->sectionSchema[$this->alias] = array(
			'birthday' => array(
				'type' => 'date',
				'null' => null,
				'default' => null,
				'length' => null
			),
			'given_name' => array(
				'type' => 'string',
				'null' => null,
				'default' => null,
				'length' => null
			),
			'family_name' => array(
				'type' => 'string',
				'null' => null,
				'default' => null,
				'length' => null
			),
			'gender' => array(
				'type' => 'string',
				'null' => null,
				'default' => null,
				'length' => null
			),
			'locale' => array(
				'type' => 'string',
				'null' => null,
				'default' => null,
				'length' => null
			),
			'picture' => array(
				'type' => 'string',
				'null' => null,
				'default' => null,
				'length' => null
			)
		);

		$this->UserDetail->sectionValidation[$this->alias] = array(
			'birthday' => array(
				'validDate' => array(
					'rule' => array('date'), 'allowEmpty' => true, 'message' => __d('users', 'Invalid date'))
			),
			/*'given_name' => array(
				'notEmpty' => array(
					'rule' => array('notEmpty'), 'allowEmpty' => true, 'message' => __d('users', 'cannot be empty'))
			),
			'family_name' => array(
				'notEmpty' => array(
					'rule' => array('notEmpty'), 'allowEmpty' => true, 'message' => __d('users', 'cannot be empty'))
			),
			'gender' => array(
				'notEmpty' => array(
					'rule' => array('notEmpty'), 'allowEmpty' => true, 'message' => __d('users', 'cannot be empty'))
			),
			'locale' => array(
				'notEmpty' => array(
					'rule' => array('notEmpty'), 'allowEmpty' => true, 'message' => __d('users', 'cannot be empty'))
			),
			'picture' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'), 'allowEmpty' => true, 'message' => __d('users', 'Invalid date'))
			)*/
		);
	}

}