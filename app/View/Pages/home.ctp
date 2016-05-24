<?php
$this->viewVars['title_for_layout'] = 'Kick off times for your calendar - Kick Off Calendars';
?>

<h1>Kick off times for all the Premier League and Championship games</h1>

<?php 
echo $this->requestAction(['controller' => 'teams', 'action' => 'by_competition'], ['return']);
?>

<div class="breakout">
  <p>Kick Off Calendars is adopting the “<em>release early, release often</em>” mantra.</p>
  <p>We are working with an active focus group to tailor the experience exactly for digitally connected sports fans.</p> 
</div>

<div class="col-2">
  
  <div class="social col">
    <h3 class="i-twitter">Get social</h3>
    <p>Follow <a href="https://twitter.com/kickoffcal">@kickoffcal on Twitter</a> for updates.</p>
  </div>

  <form class="email col">
    <h3 class="i-email">Prefer email?</h3>
    <label for="email">Sign up to our newsletter for product updates - no spam, we promise!</label>
    <input type="email" name="email" id="email" />
    <button type="submit">Register</button>
  </form>
  
</div>