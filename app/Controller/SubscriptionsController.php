<?php
class SubscriptionsController extends AppController {

    var $name = 'Subscriptions';
    var $helpers = array('Time','Form');

    var $scaffold;
  
	function beforeFilter() {
		parent::beforeFilter();
	}
	
	function beforeRender() {
        parent::beforeRender();
	}
    
    function index() {
        $conditions = array(
            'Subscription.user_id' => $this->Session->read('Auth.User.id')
        );
        $this->set('subscriptions', $this->Subscription->find('all', $conditions));
    }
}