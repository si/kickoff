<?php
class UsersController extends AppController {


  public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('add', 'logout');
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
  
  public function add() {
      if ($this->request->is('post')) {

        $this->User->create();

        if($this->User->save($this->request->data)) {
          $this->Session->setFlash(__('User saved!'));
          
          if ($this->Auth->login()) {
            $this->Session->setFlash(__('You are now registered.'));
            $this->redirect(array('controller'=>'calendars','action' => 'index'));
          } else {
            $this->Session->setFlash(__('User cant login.'));
            
          }
        } else {
            $this->Session->setFlash(__('There were problems registering. Please check your details and try again.'));
        }
      }
  }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash_failure');
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
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
 }
    