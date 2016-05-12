<?php
$title = 'Kick Off Calendars';
if(isset($event)) $title = $event['Event']['summary'] . ' - ' . $event['Competition']['name'] . ' - ' . $title;
$this->viewVars['title_for_layout'] = $title;
?>
<article typeof="SportsEvent" vocab="http://schema.org/">
<h1 class="summary vs">
  <?php echo $this->Html->teamLink($event['HomeTeam'], array('class'=>null, 'property'=>'performers')); ?>
  <abbr title="versus">v</abbr>
  <?php echo $this->Html->teamLink($event['AwayTeam'], array('class'=>null, 'property'=>'performers')); ?>
</h1>

<time class="dtstart dtstamp">
  <span class="date" property="startDate">
    <?php echo $this->Time->format('D j\<\s\u\p\>S\<\/\s\u\p\> M Y', $event['Event']['start']); ?>
  </span>
  <span class="time">
    <span class="hour"><?php echo $this->Time->format('g', $event['Event']['start']); ?></span><span class="separator">:</span><span class="minute"><?php echo $this->Time->format('i', $event['Event']['start']); ?></span><span class="ordinal"><?php echo $this->Time->format('a', $event['Event']['start']); ?></span>
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

<?php echo $this->element('Ads/google'); ?>

<?php if($event['Event']['location']) : ?>
    
    <div id="EventLocationTravel">
        <h2>Travelling?</h2>
        <?php echo $this->element('Modules/map', array('location'=>$event['Event']['location'])); ?>
    </div>

    <div id="EventLocationPub">
        <h2>Pub?</h2>
        <?php echo $this->element('Modules/matchpint', array('location'=>$event['Event']['location'])); ?>
    </div>

<?php endif; ?>

<div id="EventLocationBroadcast">
    <h2>Staying at home?</h2>
    <p>Broadcasting on <a href="#">BT Sport</a></p>
</div>


<?php if($event['Event']['description']!='') : ?>
    <h2>Event Details</h2>
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
      <td property="superEvent">
        <?php 
          echo $this->Html->competitionLink($event['Competition']); ?> 
      </td>
      <td>
        <small><time><?php echo $this->Time->format('d M y H:i', $event['Event']['updated']); ?></time></small>
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
</article>