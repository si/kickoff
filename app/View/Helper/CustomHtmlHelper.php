<?php
App::uses('HtmlHelper', 'View/Helper');

class CustomHtmlHelper extends HtmlHelper {

	var $helpers = array('Html', 'Form', 'Session');

	public function adminLink($text, $path, $args) {
		if( $this->Session->read('Auth.User.is_admin') ) {
			return $this->Html->link($text, $path, $args);
		}
	}

	public function adminPostLink($text, $path, $args) {
		if( $this->Session->read('Auth.User.is_admin') ) {
			return $this->Form->postLink($text, $path, $args);
		}
	}


}