<h1>Themes</h1>

<?php echo $this->Html->link('New theme', array('action'=>'form'), array('class'=>'btn btn-primary')); ?>

<?php if(isset($themes) && count($themes)>0) : ?>
<ul class="unstyled tiled">
    <?php foreach($themes as $theme) : ?>
    <li class="thumb" 
      <?php 
      if($theme['Theme']['primary_colour']!='') {
        echo 'style="background-color: ' 
          . ((strpos($theme['Theme']['primary_colour'],',')) ? 
            'rgba('.$theme['Theme']['primary_colour'].',0.8)' 
            : $theme['Theme']['primary_colour']) . ';"'; 
      } else {
        echo 'style="background-color: rgba(0,0,0,0.3);"';
      }
      ?>>
      <?php 
        echo $this->Html->link(
          $this->Html->tag('h2',$theme['Theme']['name'])
          . (($theme['Theme']['image']!='') ? $this->Html->image('/'.$theme['Theme']['image']) : '') 
          . $this->Html->tag('var',$theme['Theme']['primary_colour']), 
          array('action'=>'view', $theme['Theme']['id']),
          array(
            'escape' => false,
            'style' => 'color:#FFF',
          )
        ); ?>
    </li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<?php echo $this->Html->link('New theme', array('action'=>'form'), array('class'=>'btn btn-primary')); ?>