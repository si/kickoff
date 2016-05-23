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
        //echo 'color: ' . $hex . ';';
        if(strpos($hex,'#') > -1) {
        
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

    public function cssThemeBackground($img, $color='0,0,0', $position='') {
        $color = $this->Html->colorHexToDec($color);
        return 'background: linear-gradient(
                        rgba(' . $color['rgb'] . ', 0.93), 
                        rgba(' . $color['rgb'] . ', 1)
                    ), 
                    ' . $position . ' url(/' . $img . ') no-repeat 50% 50%;
                background-size: cover;';
    }

	public function teamLink($team, $args=array()) {

        $path = array('controller'=>'teams','action'=>'view');
        $args = array_merge(
            array(
                'class'=>'team'
            ), $args);
            
        if( $team['slug']!='') {
            $path[] = $team['slug'];
        } else {
            $path[] = $team['id'];
        }
        return $this->Html->link($team['name'], $path, $args);
	}

	public function competitionLink($competition, $args=array()) {

        $path = array('controller'=>'competitions','action'=>'view');
        $args = array_merge(
            array(
                'class'=>'competition'
            ), $args);
            
        if( $competition['slug']!='') {
            $path[] = $competition['slug'];
        } else {
            $path[] = $competition['id'];
        }
        return $this->Html->link($competition['name'], $path, $args);
	}
}