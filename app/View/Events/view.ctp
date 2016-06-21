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
      echo $start->format('D j');
      echo $this->Html->tag('sup', $start->format('S'), array('class'=>'suffix'));
      ?> 
      <?php echo $this->Html->tag('span', $start->format('M'), array('class'=>'month')); ?> 
      <?php echo $this->Html->tag('span', $start->format('Y'), array('class'=>'year')); ?> 
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

  <?php echo $this->element('Modules/map', array('location'=>$event['Location'])); ?>

  <?php if($event['Event']['description']!='') : ?>
    <h2>Event Details</h2>
    <p><?php echo $event['Event']['description']; ?></p>
  <?php endif; ?>

  <p class="meta">

    <?php
    $hashtag = '#' . $event['HomeTeam']['short'] . 'v' . $event['AwayTeam']['short']; 
    echo $this->Html->link($hashtag, 'https://twitter.com/search?q='.urlencode($hashtag), array('class'=>'i-twitter', 'title'=>'Twitter Hashtag')); 
    ?>
    <?php echo $this->Html->competitionLink($event['Competition'], array('property'=>'superEvent')); ?> 
    <time class="i-time" datetime="<?php echo $this->Time->format('c', $event['Event']['updated']); ?>"><?php echo $this->Time->format('d M \'y', $event['Event']['updated']); ?></time>

  </p>

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