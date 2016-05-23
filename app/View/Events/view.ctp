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
    <?php
    $start = new DateTime($event['Event']['start'], new DateTimeZone('UTC'));

    if(isset($this->params['named']['timezone'])) {
      $start->setTimezone( new DateTimeZone( str_replace('-', '/', $this->params['named']['timezone'] ) ) );
    }
    echo $start->format('D j\<\s\u\p\>S\<\/\s\u\p\> M Y'); 
    ?>
  </span>
  <span class="time">
    <span class="hour"><?php echo $start->format('g'); ?></span><span class="separator">:</span><span class="minute"><?php echo $start->format('i'); ?></span><span class="ordinal"><?php echo $start->format('a'); ?></span>
    <a href="#timezones" class="timezone"><?php echo $start->format('T'); ?></a>
    <?php echo $this->element('Modules/timezones'); ?>
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

<h2><a href="#broadcast">Watching</a> or <a href="#travel">Going</a>?</h2>

<section id="travel">
  <h3>Travel Options</h3>
<?php if( isset($event['Location']) ) : ?>
    <div id="EventLocationTravel">
        <h2>Travelling?</h2>
        <?php echo $this->element('Modules/map', array('location'=>$event['Location'])); ?>
    </div>

    <div id="EventLocationPub">
        <h2>Pub?</h2>
        <?php echo $this->element('Modules/matchpint', array('location'=>$event['Location'])); ?>
    </div>

<?php endif; ?>
</section>

<section id="broadcast">
  <h3>Broadcast Options</h3>
  <p>This game will be broadcast on the following channels</p>
  <ul>
    <li><a href="#">Sky Sports</a></li>
    <li><a href="#">BT Sports</a></li>
    <li><a href="#">BBC</a></li>
    <li><a href="#">ITV</a></li>
    <li><a href="#">Five</a></li>
    <li><a href="#">BBC 5 Live</a></li>
    <li><a href="#">BBC Local</a></li>
    <li><a href="#">Online</a></li>
  </ul>  
</section>


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