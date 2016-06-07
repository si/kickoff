<?php 
$title = $location['Location']['name'];
$this->viewVars['title_for_layout'] = $title . ' - Kick Off Calendars';
if(isset($location['Location'])) :
?>
<h1><?php echo $title; ?></h1>

  <?php echo $this->element('Modules/map', array('location'=>$location['Location'])) ?>

<?php endif; ?>

<div class="btn-group">
  <?php echo $this->Html->adminLink('Edit location', array('action'=>'edit', $location['Location']['id']), array('class'=>'btn')); ?>
  <?php echo $this->Html->adminPostLink( 'Delete location',
      array('action' => 'delete', $location['Location']['id']),
      array('confirm' => 'Are you sure?', 'class'=>'btn btn-sm', 'escape' => false) );
  ?>
  <?php echo $this->Html->link('Back to locations', array('action'=>'index'), array('class'=>'btn')); ?>
</div>