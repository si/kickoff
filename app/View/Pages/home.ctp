<?php
$this->viewVars['title_for_layout'] = 'Premier League and Championship kick off times for your calendar';
?>

<h1><?php echo $this->viewVars['title_for_layout']; ?></h1>

<?php 
echo $this->requestAction(['controller' => 'teams', 'action' => 'by_competition'], ['return']);
?>

<div id="intro" class="story">
  <h2>Convenient kick-off times</h2>
  <p>Kick Off Calendars believes the football fixtures data should be available to you, the fans, in more convenient formats.</p>
  <p>You can add kick off dates and times directly to your calendar. Our calendars work on any supported devices; Outlook, Google, iOS, OS X - any application that supports the standard ICS format.</p>
  <p>For added convenience, you can also subscribe to team or competition calendars which automatically update when fixtures change. Handy, eh?</p> 
</div>

<div id="focus" class="story breakout">
  <p>Kick Off Calendars is adopting the “<em>release early, release often</em>” mantra.</p>
  <p>We are working with an active focus group to tailor the experience exactly for digitally connected sports fans.</p> 
</div>

<div class="col-2">

  <div id="social" class="col">
    <h3 class="i-twitter">Get social</h3>
    <p>Follow <a href="https://twitter.com/kickoffcal">@kickoffcal on Twitter</a> for site and calendar updates.</p>
    <a class="btn btn-large" href="https://twitter.com/kickoffcal">Follow @kickoffcal</a>
  </div>

  <form class=" col" action="//unstyled.us1.list-manage.com/subscribe/post?u=cbc5d45d7d3037085e7940047&amp;id=71453efcb5" method="post" id="email" name="mc-embedded-subscribe-form" target="_blank" novalidate>
    <h3 class="i-email">Prefer email?</h3>
    <p>Sign up to our newsletter for product updates - no spam, we promise!</p>
    <input type="email" name="EMAIL" placeholder="your@email" id="mce-EMAIL" />
    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_cbc5d45d7d3037085e7940047_71453efcb5" tabindex="-1" value=""></div>
    <button type="submit">Register</button>
  </form>
  
</div>