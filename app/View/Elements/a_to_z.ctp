<ul class="a-z">
<?php
$alphabet = range('A','Z');
foreach($alphabet as $letter) :
?>
	<li><?php 
		echo $this->Html->link(
			$letter, 
			array(
				'action'=>'index', 
				'letter'=>$letter
			), 
			array(
				'class'=> ((isset($this->params['named']['letter']) && $this->params['named']['letter']==$letter) ? 'active' : '')
			)
		);
	?></li>
<?php
endforeach;
?>
</ul>