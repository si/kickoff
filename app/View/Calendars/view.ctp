<div class="cover" 
    style="<?php 
    if($calendar['Theme']['primary_colour']!='' || $calendar['Theme']['image']!='') 
      echo 'background: ' 
        . (
            ($calendar['Theme']['primary_colour']!='') 
            ? ' linear-gradient(
              rgba('. $calendar['Theme']['primary_colour'] . ', 0.3), 
              rgba('. $calendar['Theme']['primary_colour'] . ', 0.3)
              ), '
            : '')
        . (
            ($calendar['Theme']['primary_colour']!='') 
            ? ' url(/' . $calendar['Theme']['image'] . ')'
            : ''
          )
        . ';';
      ?>">
  <h1><?php echo $calendar['Calendar']['name']; ?></h1>
  <?php if( $calendar['Calendar']['description']!='') : ?>
  <p class="lead"><?php echo $calendar['Calendar']['description']; ?></p>
  <?php endif; ?>
  
  <p><small>
    Created on <?php echo $this->Time->niceShort($calendar['Calendar']['created']); ?> 
    <?php if(isset($calendar['User'])) : ?> 
      by <?php echo $this->Html->link($calendar['User']['username'],array('controller'=>'users','action'=>'view',$calendar['User']['id'])); ?> 
    <?php endif; ?>
    in <?php echo $this->Html->link($calendar['Sport']['name'],array('controller'=>'sports','action'=>'view',$calendar['Sport']['id'])); ?>
  </small></p>
  
  <div class="clearfix">
  
    <div class="pull-left">
    <?php echo $this->Html->link('Subscribe',array('action'=>'export',$calendar['Calendar']['id']),array('class'=>'btn btn-large')); ?>
    <?php echo $this->Html->link('Add Event',array('controller'=>'events','action'=>'form','calendar'=>$calendar['Calendar']['id']),array('class'=>'btn btn-large')); ?>
    </div>
    
    <div class="pull-right">
    <?php echo $this->Html->link('Edit',array('action'=>'form',$calendar['Calendar']['id']),array('class'=>'btn')); ?>
    <?php //echo $this->Html->link('Delete',array('action'=>'delete',$calendar['Calendar']['id']),array('class'=>'btn btn-warning'),'Are you sure you want to delete this calendar?'); ?>
    <?php echo $this->Html->link('Export',array('action'=>'export',$calendar['Calendar']['id'],'json'),array('download'=>true, 'class'=>'btn ')); ?>
    </div>
  
  </div>
  
</div>

<pre class="hidden"><?php var_dump($future_params); ?></pre>
<?php
  echo $this->element('events_grid',array('events'=>$future_events,'context'=>'upcoming')); 
?>


<?php echo $this->Html->link('Add Event',array('controller'=>'events','action'=>'form','calendar'=>$calendar['Calendar']['id']),array('class'=>'btn btn-large')); ?>
