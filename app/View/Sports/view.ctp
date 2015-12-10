<?php 
$title = $sport['Sport']['name'] . ' Competitions';
$this->viewVars['title_for_layout'] = $title . ' - Kick Off Calendars';
if(isset($sport['Competition'])) :
?>
<h1><?php echo $title; ?></h1>

<?php if(count($competitions)>0) : ?>
  <?php echo $this->element('Modules/tiles', array('tiles'=>$competitions)) ?>
<?php endif; ?>
<?php endif; ?>

<div class="btn-group">
  <?php echo $this->Html->adminLink('Create competition', array('controller'=>'competitions','action'=>'form', 'sport_id'=>$sport['Sport']['id']), array('class'=>'btn')); ?>
  <?php echo $this->Html->adminLink('Edit sport', array('action'=>'edit', $sport['Sport']['id']), array('class'=>'btn')); ?>
  <?php echo $this->Html->adminPostLink( 'Delete sport',
      array('action' => 'delete', $sport['Sport']['id']),
      array('confirm' => 'Are you sure?', 'class'=>'btn btn-sm', 'escape' => false) );
  ?>
  <?php echo $this->Html->link('Back to sports', array('action'=>'index'), array('class'=>'btn')); ?>
</div>