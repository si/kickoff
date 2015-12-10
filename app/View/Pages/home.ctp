<?php
$this->viewVars['title_for_layout'] = 'Sports events in your calendar - Kick Off';

?>

<h1>Putting sports events in your hands</h1>

<h2>Search for teams, competitions or sports</h2>
<?php echo $this->element('Navigation/search'); ?>

<div class="row">
  <div class="span4">
    <a href="/sports/view/football" class="i-football">
      <h3>Football</h3>
      <p>
        From the World Cup to the Premiership and local leagues, you will not miss that vital game
      </p>
    </a>
  </div>

  <div class="span4">
    <a href="/sports/view/rugby" class="i-rugby">
      <h3>Rugby</h3>
      <p>
        Local derbies and international leagues - that first scrum is in your calendar
      </p>
    </a>
  </div>

  <div class="span4">
    <a href="/sports/view/formula-1" class="i-formula-1">
    <h3>Formula 1</h3>
    <p>
      Never miss the practice laps, qualifiers or main race – all the times right at your finger tips
    </p>
    </a>
  </div>
</div>

<div class="breakout">
  <p>Kickoff Calendars are currently in development following our initial pilot for World Cup 2014. Keep an eye on <a href="https://twitter.com/kickoffcal">@kickoffcal on Twitter</a> for updates.</p>
</div>

<div class="row">

  <div class="span6 sample">
    <h3>Try it out</h3>
    <p>Download our sample calendar of major sporting events in 2015 including the Rugby World Cup, Super Bowl, FA Cup Final and much more</p>
    <a href="#" class="btn">Add to your calendar</a>
  </div>

  <form class="span6 email row">
    <h3>Prefer email?</h3>
    <label class="span4" for="email">Sign up to our newsletter for updates as we approach for kickoff</label>
    <input type="email" name="email" id="email" class="span4">
    <button type="submit" class="span4">Register</button>
  </form>

</div>
