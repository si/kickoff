<?php
$title = 'Kick Off Calendars';
if(isset($event)) $title = $event['Event']['summary'] . ' - ' . $title;
$this->viewVars['title_for_layout'] = $title;
?>
<h1 class="summary vs">
  <?php echo $this->Html->link($event['HomeTeam']['name'], array('controller'=>'teams','action'=>'view', $event['HomeTeam']['id'])); ?>
  <abbr title="versus">v</abbr>
  <?php echo $this->Html->link($event['AwayTeam']['name'], array('controller'=>'teams','action'=>'view', $event['AwayTeam']['id'])); ?>
</h1>

<time class="dtstart dtstamp">
  <span class="date">
    <?php echo $this->Time->format('D j\<\s\u\p\>S\<\/\s\u\p\> M Y', $event['Event']['start']); ?>
  </span>
  <span class="time">
    <span class="hour"><?php echo $this->Time->format('g', $event['Event']['start']); ?></span><span class="separator">:</span><span class="minute"><?php echo $this->Time->format('i', $event['Event']['start']); ?></span>
    <span class="ordinal"><?php echo $this->Time->format('a', $event['Event']['start']); ?></span>
    <span class="timezone"><?php echo $this->Time->format('T', $event['Event']['start']); ?></span>
  </span>
</time>

<div class="cta">
  <?php echo $this->Html->link('Add to Calendar'
  , array('action'=>'export', $event['Event']['id'])
  , array(
    'class'=>'btn btn-large',
    'type'=>'text/calendar'
  ));?>
</div>

<?php
$event['Event']['location'] = 'Pride Park';
if($event['Event']['location']) : ?>
<div>
  <h2>Travelling?</h2>
  <?php echo $this->element('Modules/map', array('location'=>$event['Event']['location'])); ?>
</div>
<?php endif; ?>

<?php if($event['Event']['description']!='') : ?>
  <p><?php echo $event['Event']['description']; ?></p>
<?php endif; ?>


<table class="meta">
  <thead>
    <tr>
      <th>Competition</th>
      <th>Last updated</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <?php 
          echo $this->Html->link(
            $event['Competition']['name'],
            array('controller'=>'competitions','action'=>'view',$event['Competition']['slug']),
            array('class'=>'competition')
          ); ?> 
      </td>
      <td class="time">
        <?php echo $this->Time->format('d M y H:i', $event['Event']['updated']); ?>
      </td>
    </tr>
  </tbody>
</table>

<div class="btn-group btn-block">

  <?php echo $this->Html->adminLink('Edit'
    , array('action'=>'form', $event['Event']['id'])
    , array('class'=>'btn btn-default btn-sm'));?>

  <?php echo $this->Html->adminPostLink( 'Delete',
      array('action' => 'delete', $event['Event']['id']),
      array('confirm' => 'Are you sure?', 'class'=>'btn btn-sm') );
  ?>

</div>
