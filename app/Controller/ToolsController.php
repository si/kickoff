<?php
class ToolsController extends AppController {

	function beforeFilter() {
		parent::beforeFilter();
//		$this->Auth->allow('index', 'view');
	}

	function beforeRender() {
		parent::beforeRender();
	}

	function index() {

	}
}