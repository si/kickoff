<h1><?php echo $theme['Theme']['name']; ?></h1>

<?php 
if(isset($theme['Theme']['primary_colour']) && $theme['Theme']['primary_colour']!='') 
  echo '<figure style="background-color: rgb(' . $theme['Theme']['primary_colour'] . ');">'; ?>

<?php 
if(isset($theme['Theme']['image']) && $theme['Theme']['image']!='') 
  echo $this->Html->image('/'.$theme['Theme']['image']); 
?>

<?php 
if(isset($theme['Theme']['primary_colour']) && $theme['Theme']['primary_colour']!='') {
  $colour = $this->Html->tag('span', $theme['Theme']['primary_colour'], array('class'=>'swatch', 'style'=>'background-color:'.$theme['Theme']['primary_colour']));
  if(isset($theme['Theme']['secondary_colour']) && $theme['Theme']['secondary_colour']!='') {
    $colour .= ' / ' . $this->Html->tag('span', $theme['Theme']['secondary_colour'], array('class'=>'swatch', 'style'=>'background-color:'.$theme['Theme']['secondary_colour']));
  }
  echo $this->Html->tag('figcaption', $colour);
}
echo '</figure>'; ?>


<p><small>Created <?php echo $this->Time->niceShort($theme['Theme']['created']); ?></small></p> 

<?php echo $this->Html->link('Edit', array('action'=>'form', $theme['Theme']['id']), array('class'=>'btn')); ?>
<?php echo $this->Form->postLink( 'Delete',
    array('action' => 'delete', $theme['Theme']['id']),
    array('confirm' => 'Are you sure?', 'class'=>'btn') );
?>

<?php echo $this->Html->link('Back to themes', array('action'=>'index')); ?>