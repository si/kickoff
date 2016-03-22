<?php
$this->viewVars['title_for_layout'] = 'Competitions - Kick Off Calendars';
?>
<h1>Competitions</h1>

<?php if(count($competitions)==0) : ?>
<p class="empty">No competitions for you to at the moment.</p>
<?php else: ?>
<ul class="tiles">
  <?php foreach($competitions as $competition) : ?>
    <li style="<?php echo $this->Html->cssThemeBackground($competition['Theme']['image'], $competition['Theme']['primary_colour']); ?>" 
        class="<?php echo 'competition--status-' . strtolower($competition['Competition']['status']); ?>">
      <h3>
        <?php echo $this->Html->link(
             $competition['Competition']['name'], 
            array('action'=>'view',$competition['Competition']['id'])
            );
            
        ?>
      </h3>
      <?php echo $this->Html->link('Subscribe',array('action'=>'export',$competition['Competition']['id']),array('download'=>true, 'class'=>'btn')); ?>
      <?php echo $this->Html->link($competition['Sport']['name'],array('controller'=>'sports','action'=>'view',$competition['Sport']['id']), array('class'=>'secondary')); ?>
    </li>
  <?php endforeach; ?>
</ul>
<?php endif; ?>

<?php echo $this->Html->adminLink('New Competition',array('action'=>'form'),array('class'=>'btn btn-large')); ?>

