<div class="PostTitle">
  EINEN BUG MELDEN
</div>
<div class="PostPost">
	<p>&nbsp;</p>
	Wie bei vielen Sachen kann man nie zu einhundert Prozent sicher gehen, dass man alle Eventualitäten beim Entwickeln abgedeckt hat. Daher
	haben sich sicher auch auf dieser Homepage noch einige fiese kleine (und hoffentlich keine größeren) Bugs eingeschlichen. Damit diese behoben
	werden können, ist es immens wichtig, dass du den Bug meldest. Vielen Dank daher, dass du dir schnell Zeit nimmst um einen kurzen Bugreport
	einzuschicken!
	<form action="?site=SaveBugreport" method="post" accept-charset="ISO-8859-1">
		
		<span class="smallHeadline">
			Beschreibung des Bugs (maximal 500 Zeichen)<span class="mandatory">*</span>
		</span>	
		<textarea name="BugDesc" class="NewsContent" id="BugDesc" required="required" maxlength="500"></textarea>
		<div id="textarea_feedback"></div>
		<p>&nbsp;</p>

		<div style="float: left">
			<span class="smallHeadline">
				In welchem Browser tritt der Bug auf?<span class="mandatory">*</span>
				<br>
				<span class="smallInline">Bitte achte darauf, immer die aktuellste Version deines Browsers zu nutzen! Das minimiert nicht nur die Bugs, sondern ist auch sicherheitsrelevant!</span>
				<br>
				<br>
			</span>
			<select class="NewsGame" id="BugBrowser" name="BugBrowser" required="required">
			  <option value="firefox">Mozilla Firefox</option>
			  <option value="chrome">Google Chrome</option>
			  <option value="explorer">Internet Explorer</option>
			  <option value="opera">Opera</option>
			  <option value="safari">Apple Safari</option>
			  <option value="other">Anderer Browser</option>
			  <option value="allBrowsers">Bug tritt in jedem Browser auf</option>
			</select>	
		</div>
		
		<p style="clear:both;">&nbsp;</p>
		<div class="NewsSubmit">
			<input type="Submit" name="" value="Bugreport senden" class="NewsSubmit">
		</div>

		Mit <span class="mandatory">*</span> gekennzeichnete Felder müssen ausgefüllt werden.
	 
	</form>
</div>