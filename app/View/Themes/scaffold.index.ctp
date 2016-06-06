<h1>Themes</h1>

<?php echo $this->Html->link('New theme', array('action'=>'form'), array('class'=>'btn btn-primary')); ?>

<?php if(isset($themes) && count($themes)>0) : ?>
<ul class="tiles">
    <?php foreach($themes as $theme) : ?>
      <?php 
      if($theme['Theme']['primary_colour']!='') {
        $style = 'background-color: ' 
          . ((strpos($theme['Theme']['primary_colour'],',')) ? 
            'rgba('.$theme['Theme']['primary_colour'].',0.8)' 
            : $theme['Theme']['primary_colour']) . ';'; 
      } else {
        $style = 'background-color: rgba(0,0,0,0.3);';
      }
      ?>
    <li class="thumb" style="<?php echo $style; ?>">
      <?php 
        echo $this->Html->link(
          $this->Html->tag('h2',$theme['Theme']['name'])
          . (($theme['Theme']['image']!='') ? $this->Html->image('/'.$theme['Theme']['image']) : '') 
          . $this->Html->tag('var',$theme['Theme']['primary_colour']), 
          array('action'=>'view', $theme['Theme']['id']),
          array(
            'escape' => false,
            //'style' => $style,
          )
        ); ?>
    </li>
    <?php endforeach; ?>
</ul>

		<?php if($this->Paginator->hasPrev()) echo $this->Paginator->prev('Previous'); ?>
		<?php if($this->Paginator->hasNext()) echo $this->Paginator->next('Next'); ?>

<?php endif; ?>

<?php echo $this->Html->link('New theme', array('action'=>'form'), array('class'=>'btn btn-primary')); ?>