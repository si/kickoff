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

    function add($model, $id) {
        if($model != '' && $id != '') {

            $data = array();

            if($model=='team') {
                $data['team_id'] = $id;
            } elseif($model=='competition') {
                $data['competition_id'] = $id;
            }

            if(count($data) > 0) {
                $saved = $this->Subscription->save(array('Subscription'=>$data));
                $this->set('response', $saved);
            }
        }
    }
}