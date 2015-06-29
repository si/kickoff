<?php
$this->viewVars['title_for_layout'] = $competition['Competition']['name'] . ' - Kick Off Calendar';
?>
<div class="theme">
  <div class="cover">
    <h1><?php echo $competition['Competition']['name']; ?></h1>
    <?php if( $competition['Competition']['description']!='') : ?>
    <p class="lead"><?php echo $competition['Competition']['description']; ?></p>
    <?php endif; ?>
    
    <p><small>
      Created <?php echo $this->Time->niceShort($competition['Competition']['created']); ?> 
      <?php if(isset($competition['User'])) : ?> 
        by <?php echo $this->Html->link($competition['User']['username'],array('controller'=>'users','action'=>'view',$competition['User']['id'])); ?> 
      <?php endif; ?>
      in <?php echo $this->Html->link($competition['Sport']['name'],array('controller'=>'sports','action'=>'view',$competition['Sport']['id'])); ?>
    </small></p>
    
    <div class="content">
    
      <div class="clearfix">
      
        <div class="pull-left">
          <?php echo $this->Html->link('Subscribe',array('action'=>'export',$competition['Competition']['id']),array('class'=>'btn btn-large')); ?>
          <?php echo $this->Html->adminLink('Add Event',array('controller'=>'events','action'=>'form','competition'=>$competition['Competition']['id']),array('class'=>'btn btn-large')); ?>
        </div>
        
        <div class="pull-right">
          <?php echo $this->Html->adminLink('Edit',array('action'=>'form',$competition['Competition']['id']),array('class'=>'btn')); ?>
          <?php echo $this->Html->link('Export',array('action'=>'export',$competition['Competition']['id'],'json'),array('download'=>true, 'class'=>'btn ')); ?>
            <?php echo $this->Html->adminPostLink( 'Delete',
                array('action' => 'delete', $competition['Competition']['id']),
                array('confirm' => 'Are you sure?', 'class'=>'btn') );
            ?>
        </div>
      
      </div>
    
      <pre class="hidden"><?php var_dump($future_params); ?></pre>
      <?php
        echo $this->element('events_grid',array('events'=>$competition['Event'],'context'=>'upcoming')); 
      ?>
    
      <?php echo $this->Html->adminLink('Add Event',array('controller'=>'events','action'=>'form','calendar'=>$competition['Competition']['id']),array('class'=>'btn btn-large')); ?>
    

    </div>
    
  </div>
  
</div>