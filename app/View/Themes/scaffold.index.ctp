<h1>Themes</h1>

<?php if(isset($themes) && count($themes)>0) : ?>
<table class="table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Image</th>
      <th>Primary Colour</th>
      <th>Created</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($themes as $theme) : ?>
    <tr>
      <td><?php echo $this->Html->link($theme['Theme']['name'], array('action'=>'view', $theme['Theme']['id'])); ?></td>
      <td><?php echo $this->Html->image('/'.$theme['Theme']['image']); ?></td>
      <td><?php echo $this->Html->tag('var',$theme['Theme']['primary_colour']); ?></td>
      <td><?php echo $this->Time->niceShort($theme['Theme']['created']); ?></td>
      <td><?php echo $this->Html->link('Edit', array('action'=>'form', $theme['Theme']['id'])); ?></td>
    </tr>
    
    <?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>

<?php echo $this->Html->link('New theme', array('action'=>'form'), array('class'=>'btn btn-primary')); ?>