<?php
$this->viewVars['title_for_layout'] = $calendar['Calendar']['name'] . ' - Kick Off Calendar';
?>
<div class="theme">
  <div class="cover">
    <h1><?php echo $calendar['Calendar']['name']; ?></h1>
    <?php if( $calendar['Calendar']['description']!='') : ?>
    <p class="lead"><?php echo $calendar['Calendar']['description']; ?></p>
    <?php endif; ?>
    
    <p><small>
      Created <?php echo $this->Time->niceShort($calendar['Calendar']['created']); ?> 
      <?php if(isset($calendar['User'])) : ?> 
        by <?php echo $this->Html->link($calendar['User']['username'],array('controller'=>'users','action'=>'view',$calendar['User']['id'])); ?> 
      <?php endif; ?>
      in <?php echo $this->Html->link($calendar['Sport']['name'],array('controller'=>'sports','action'=>'view',$calendar['Sport']['id'])); ?>
    </small></p>
    
    <div class="content">
    
      <div class="clearfix">
      
        <div class="pull-left">
          <?php echo $this->Html->link('Subscribe',array('action'=>'export',$calendar['Calendar']['id']),array('class'=>'btn btn-large')); ?>
          <?php echo $this->Html->adminLink('Add Event',array('controller'=>'events','action'=>'form','calendar'=>$calendar['Calendar']['id']),array('class'=>'btn btn-large')); ?>
        </div>
        
        <div class="pull-right">
          <?php echo $this->Html->adminLink('Edit',array('action'=>'form',$calendar['Calendar']['id']),array('class'=>'btn')); ?>
          <?php echo $this->Html->link('Export',array('action'=>'export',$calendar['Calendar']['id'],'json'),array('download'=>true, 'class'=>'btn ')); ?>
            <?php echo $this->Html->adminPostLink( 'Delete',
                array('action' => 'delete', $calendar['Calendar']['id']),
                array('confirm' => 'Are you sure?', 'class'=>'btn') );
            ?>
        </div>
      
      </div>
    
      <pre class="hidden"><?php var_dump($future_params); ?></pre>
      <?php
        echo $this->element('events_grid',array('events'=>$calendar['Event'],'context'=>'upcoming')); 
      ?>
    
      <?php echo $this->Html->adminLink('Add Event',array('controller'=>'events','action'=>'form','calendar'=>$calendar['Calendar']['id']),array('class'=>'btn btn-large')); ?>
    

    </div>
    
  </div>
  
</div>