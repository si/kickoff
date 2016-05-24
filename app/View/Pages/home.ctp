<?php
$this->viewVars['title_for_layout'] = 'Sports events in your calendar - Kick Off';
?>

<h1>Kick off times for all the Premier League and Championship games</h1>

<?php 
echo $this->requestAction(['controller' => 'teams', 'action' => 'by_competition'], ['return']);
?>

<div class="breakout">
  <p>Kick Off Calendars is adopting the “<em>release early, release often</em>” mantra.</p>
  <p>We are working with an active focus group to tailor the experience.</p> 
</div>

<div class="col-2">
  <div class="social col">
    <p>Follow <a href="https://twitter.com/kickoffcal">@kickoffcal on Twitter</a> for updates.</p>
  </div>

  <form class="email col">
    <h3>Prefer email?</h3>
    <label for="email">Sign up to our newsletter for product updates - no spam, we promise!</label>
    <input type="email" name="email" id="email" />
    <button type="submit">Register</button>
  </form>
</div>