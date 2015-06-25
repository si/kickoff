<?php
App::uses('HtmlHelper', 'View/Helper');

class CustomHtmlHelper extends HtmlHelper {

	var $helpers = array('Html');

	public function adminLink($text, $path, $args) {
		if( isset($_SESSION['Auth']['User']['is_admin']) && $_SESSION['Auth']['User']['is_admin'] ) {
			return $this->Html->link($text, $path, $args);
		}
	}
}