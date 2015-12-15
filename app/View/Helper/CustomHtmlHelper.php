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

	public function colorHexToDec($hex) {
        if(strpos($hex,',') == -1) {
        
        $color = array(
            'hex' => $hex
        );
        $color['r16'] = substr($color['hex'], 1, 2);
        $color['g16'] = substr($color['hex'], 3, 2);
        $color['b16'] = substr($color['hex'], 5, 2);

        $color['r10'] = hexdec($color['r16']);
        $color['g10'] = hexdec($color['g16']);
        $color['b10'] = hexdec($color['b16']);

        $color['rgb'] = $color['r10'] . ', ' . $color['g10'] . ', ' . $color['b10'];
        
        } else {
            $color['rgb'] = $hex;
        }

      return $color;

	}

    public function cssThemeBackground($img, $color='0,0,0') {
        return 'background: linear-gradient(
                        rgba(' . $color . ', 0.75), 
                        rgba(' . $color . ', 0.6)
                    ), 
                    fixed url(/' . $img . ') no-repeat 50% 50%;
                background-size: cover;';
    }

}