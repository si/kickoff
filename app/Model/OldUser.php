<?php

App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {

    public $name = 'User';
    public $displayField = 'username';
    
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Username is required'
            ),
            'alphaNumeric' => array(
              'rule' => 'alphaNumeric',
              'required' => true,
              'message' => 'Letters and numbers only'
            ),
            'unique' => array(
              'rule' => 'isUnique',
              'message' => 'Username has already been taken.'
            ),
        ),
        'password' => array(
          'rule' => array('notEmpty'),
          'message' => 'Password is required'
        ),
        'email_address' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Email is required'
            ),
            'unique' => array(
              'rule' => 'isUnique',
              'message' => 'Email has already been registered'
            ),
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('Admin', 'Member')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );
    

 }
