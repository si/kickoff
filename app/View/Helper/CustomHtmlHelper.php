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

        //var_dump($color);
        return $color;

	}

    public function cssThemeBackground($img='', $color='0,0,0', $position='', $gradient_from=0.93, $gradient_to=1) {

        $color = $this->Html->colorHexToDec($color);

        // Reduce opacity if image provided
        if($img != '') {
            $gradient_from = 0.5;
            $gradient_to = 0.8;
        }

        $bg = 'background: linear-gradient(
                        rgba(' . $color['rgb'] . ', ' . $gradient_from . '), 
                        rgba(' . $color['rgb'] . ', ' . $gradient_to . ')
                    )';

        if($img != '') {
            $bg .= ', ' . $position . ' url(/' . $img . ') no-repeat 50% 50%; background-size: cover;';
        }
        return $bg;
    }

	public function teamLink($team, $args=array()) {

        $path = array('controller'=>'teams','action'=>'view');
        $args = array_merge(
            array(
                'class'=>'team',
                'data-short'=>$team['short'],
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

	public function locationLink($location, $args=array()) {

        $path = array('controller'=>'locations','action'=>'view');
        $args = array_merge(
            array(
                'class'=>'location'
            ), $args);
            
        if( isset($location['slug']) && $location['slug']!='') {
            $path[] = $location['slug'];
        } else {
            $path[] = $location['id'];
        }
        return $this->Html->link($location['name'], $path, $args);
	}

}