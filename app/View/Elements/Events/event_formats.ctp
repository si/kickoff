<ul class="shortcuts">
  <li><?php echo $this->Html->link('Calendar', '/teams/view/' . $team['Team']['slug'], array('class'=> (($view=='view') ? 'active' : '') ) ); ?></li>
  <li><?php echo $this->Html->link('Programme', '/teams/programme/' . $team['Team']['slug'] . '/end:2017-06-01', array('class'=> (($view=='programme') ? 'active' : '') )); ?></li>
</ul>