<?php
// app/Controller/UsersController.php

class UsersController extends AppController {

    public $components = array('Cookie');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout', 'set_timezone', 'get_timezone');

        $this->Cookie->name = 'user_id';
        $this->Cookie->time = 3600 * 24 * 90;
        $this->Cookie->path = '/users/preferences';
        $this->Cookie->domain = 'kickoffcalendars.com';
        $this->Cookie->secure = false; // only sent if using secure HTTPS
        $this->Cookie->key = 'qwe1230iasdo-0(*09ausdoijaosiu9021u309jasodj()(_)oijaosijdaoisjd';
        $this->Cookie->httpOnly = true;
        $this->Cookie->type('cipher');
        // f2a1cc9fd86fa0dd8b59df5e20a29470
        // f2a1cc9fd86fa0dd8b59df5e20a29470
    }

    public function login() {
        if ($this->Auth->login()) {
            $this->redirect($this->Auth->redirect());
        } else {
            $this->Session->setFlash(__('Invalid username or password, try again'));
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }


    public function view() {
        $this->User->id = $this->Session->read('Auth.User.id');
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $this->User->id));

    }
    public function add() {
        if ($this->request->is('post')) {
          $this->User->create();
            if ($this->User->save($this->request->data)) {
              if ($this->Auth->login()) {
                $this->Session->setFlash(__('You are now registered.'));
                $this->redirect(array('controller'=>'users','action' => 'view'));
              }
            } else {
                $this->Session->setFlash(__('There were problems registering. Please check your details and try again.'));
            }
        }
    }

    public function edit() {

        if (!empty($this->data)) {
            $data = $this->data;
            $data['User']['id'] = $this->Session->read('Auth.User.id');

            if ($this->User->save($data)) {
                $this->Session->setFlash(__('The user has been saved'), 'flash_success');
                $this->redirect(array('action' => 'view'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash_failure');
            }

        } else {

            $this->data = $this->User->findById($this->Session->read('Auth.User.id'));
            // Remove password from data
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function set_timezone() {
        //var_dump($this->data);
        $destination =  '/';

        $return = explode('/', $this->data['UserTimezone']['ReturnURL']);
        foreach($return as $index => $part) {
            if(strpos($part, 'timezone') === false) {
                $destination .= $part . '/';
            }
        }

        if($this->data['UserTimezone']['Location'] != '') {
            $destination .=  '/timezone:' . str_replace('/','-',$this->data['UserTimezone']['Location']);
        }

        if($this->data['UserTimezone']['Remember'] != '') { 
            $this->Cookie->write('timezone', $this->data['UserTimezone']['Location']);
            var_dump( $this->Cookie->read('timezone') );
        }

        //$this->redirect( $destination );
    }

    public function get_timezone() {

        $timezone = $this->Cookie->read('timezone');
        var_dump($timezone);

    }

}
