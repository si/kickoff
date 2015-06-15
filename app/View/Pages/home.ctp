<h2>Putting sports data in your own hands</h2>

<div class="promo">
  <div class="football">
    <h3><?php echo $this->Html->link('Football', array('controller'=>'sports','action'=>'view',1)); ?></h3>
    <p>
      From the World Cup to the Premiership and local leagues, you will not miss that vital game
    </p>
  </div>

  <div class="rugby">
    <h3><?php echo $this->Html->link('Rugby', array('controller'=>'sports','action'=>'view',2)); ?></h3>
    <p>
      Local derbies and international leagues - that first scrum is in your calendar
    </p>
  </div>

  <div class="formula-1">
    <h3><?php echo $this->Html->link('Formula 1', array('controller'=>'sports','action'=>'view',3)); ?></h3>
    <p>
      Never miss the practice laps, qualifiers or main race – all the times right at your finger tips
    </p>
  </div>
</div>

<div class="breakout">
  <p>Kickoff Calendars are currently in development following our initial pilot for World Cup 2014. Keep an eye on <a href="https://twitter.com/kickoffcal">@kickoffcal on Twitter</a> for updates.</p>
</div>

<div class="promo">

  <form class="email">
    <label for="email">Sign up to our newsletter for updates as we approach for kickoff</label>
    <input type="email" name="email" id="email">
    <button type="submit">Save</button>
  </form>

  <div class="sample">
    <h3>Sports Calendar 2015</h3>
    <p>Download our sample calendar of major sporting events in 2015 including the Rugby World Cup, Super Bowl, FA Cup Final and much more</p>
    <a href="#">Get your calendar (download/subscribe)</a>
  </div>

</div>
