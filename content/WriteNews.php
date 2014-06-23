<div class="PostTitle">
  NEWS HINZUFÜGEN
</div>
<div class="PostPost">
	<p>&nbsp;</p>
	<form action="?site=SaveNews" method="post" accept-charset="ISO-8859-1">
	 
		<span class="smallHeadline">
			Titel der News<span class="mandatory">*</span>
		</span>
		<input type="Text" name="NewsTitle" class="NewsTitle" id="NewsTitle" required="required">

		<p>&nbsp;</p>
		
		<span class="smallHeadline">
			Newsinhalt<span class="mandatory">*</span>
		</span>	
		<textarea name="NewsContent" class="NewsContent" id="NewsContent" required="required"></textarea>
		
		<p>&nbsp;</p>

		<div style="float: left">
			<span class="smallHeadline">
				Security Token<span class="mandatory">*</span>
			</span>
			<input type="Text" name="NewsToken" class="NewsAuthor" id="NewsToken" required="required">	

		</div>

		<div style="float: left">
			<span class="smallHeadline">
				Spiel/Kategorie wählen<span class="mandatory">*</span>
			</span>
			<select class="NewsGame" id="NewsGame" name="NewsGame" required="required">
			  <option value="nichtinderliste">Nicht in der Liste</option>
			  <option disabled>&nbsp;&nbsp;&nbsp;SONSTIGE</option>
			  <option value="ineigenersache">In eigener Sache</option>
			  <option value="origin">Origin</option>
			  <option value="steam">Steam</option>
			  <option value="technik">Technik</option>
			  <option disabled>&nbsp;&nbsp;&nbsp;GAMES</option>
			  <option value="anno2070">Anno 2070</option>
			  <option value="annoonline">Anno Online</option>
			  <option value="battlefield3">Battlefield 3</option>
			  <option value="battlefield4">Battlefield 4</option>
			  <option value="battlefieldhardline">Battlefield Hardline</option>
			  <option value="borderlands2">Borderlands 2</option>
			  <option value="borderlandsthepresequel">Borderlands the Presequel</option>
			  <option value="modernwarfare2">Call of Duty: Modern Warfare 2</option>
			  <option value="modernwarfare3">Call of Duty: Modern Warfare 3</option>
			  <option value="codghosts">Call of Duty: Ghosts</option>
			  <option value="dayz">DayZ</option>
			  <option value="deadspace">Dead Space</option>
			  <option value="gta5">GTA V</option>
			  <option value="leagueoflegends">League of Legends</option>
			  <option value="left4dead2">Left 4 Dead 2</option>
			  <option value="medalofhonorwarfighter">Medal of Honor: Warfighter</option>
			  <option value="metro2033">Metro 2033</option>
			  <option value="minecraft">Minecraft</option>
			  <option value="needforspeedworld">Need for Speed World</option>
			  <option value="paydaytheheist">Payday</option>
			  <option value="planetside2">PlanetSide 2</option>
			  <option value="portal">Portal</option>
			  <option value="portal2">Portal 2</option>
			  <option value="starwarstheoldrepublic">StarWars: The Old Republic</option>
			  <option value="titanfall">Titanfall</option>
			  <option value="trackmania2canyon">Trackmania² Canyon</option>
			  <option value="warface">Warface</option>
			  <option value="wormsreloaded">Worms: Reloaded</option>
			</select>	
		</div>
	
		<p><br /><br /><br /><br /><br /></p>

		<span class="smallHeadline">
			Quelle (wird nur intern gespeichert)
		</span>	
		<input type="Text" name="NewsSource" class="NewsTitle" id="NewsSource">
		
		<p>&nbsp;</p>
		<span class="smallHeadline">
			Tags<span class="mandatory">*</span>&nbsp;<span class="smallInline">(bitte tagge deine News, damit sie in der Suche gelistet werden kann)</span>
		</span>	
		<input type="Text" name="NewsTags" class="NewsTitle" id="NewsTags">
		
		<p>&nbsp;</p>
		<div class="NewsSubmit">
			<input type="Submit" name="" value="Veröffentlichen" class="NewsSubmit">
		</div>

		Mit <span class="mandatory">*</span> gekennzeichnete Felder müssen ausgefüllt werden.
	 
	</form>
</div>