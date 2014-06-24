<?php
App::uses('AppModel', 'Model');
/**
 * SocialProfile Model
 *
 * @property User $User
 */
class SocialProfile extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'oid';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'AppUser',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}