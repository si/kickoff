<?php
$this->viewVars['title_for_layout'] = 'Sports events in your calendar - Kick Off';
?>

<h1>Covering the biggest games from the English&nbsp;FA</h1>

<?php 
echo $this->requestAction(['controller' => 'teams', 'action' => 'by_competition'], ['return']);
?>

<div class="breakout">
  <p>Kick Off Calendars is adopting the “<em>release early, release often</em>” mantra.</p>
  <p>We are working with an active focus group to tailor the experience.</p> 
</div>

<div class="span6">
  <p>Follow <a href="https://twitter.com/kickoffcal">@kickoffcal on Twitter</a> for updates.</p>
</div>

<form class="span6 email row">
  <h3>Prefer email?</h3>
  <label class="span4" for="email">Sign up to our newsletter for product updates - no spam, we promise!</label>
  <input type="email" name="email" id="email" class="span4">
  <button type="submit" class="span4">Register</button>
</form>
