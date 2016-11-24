<?php include("top.html"); ?>

<form action="signup-submit.php" method="post">

<fieldset>
<legend>New user signup:</legend>
<div class="column"><label id="nome"><strong>Name:</strong></label></div>
<input type="text" name="nome" maxlenght="16" size="16"><br>

<div class="column"><label id="sesso"><strong>Gender:</strong></label></div>
<label id="male"><input type="radio" name="sesso" value="M">Male</label>
<label id="female"><input type="radio" name="sesso" value="F">Female</label><br>

<div class="column"><label id="eta"><strong>Age:</strong></label></div>
<input type="text" name="eta" size="6" maxlenght="2"><br>

<div class="column"><label id="personalita"><strong>Personality type:</strong></label></div>
<input type="text" name="personalita" size="6" maxlenght="4"> (<a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">Don't you know your type?</a>)<br>

<div class="column"><label id="os"><strong>Favorite OS:</strong></label></div>
<select name="os">
  <option selected="selected">Linux</option>
  <option>Mac OS X</option>
  <option>Windows</option>
</select><br>

<div class="column"><label id="cerca"><strong>Seeking age:</strong></label></div>
<input type="text" placeholder="min" size="6" maxlenght="2" name="min"> to <input type="text" placeholder="max" size="6" maxlenght="2" name="max"><br>

<div class="column"><input type="submit" value="Sign up!"></div>
</fieldset>
</form>

<?php include("bottom.html"); ?>