<div class="PostTitle">
  NEWS HINZUFÜGEN
</div>
<div class="PostPost">
	<p>&nbsp;</p>
	<form action="news/SaveNews.php" method="post" accept-charset="ISO-8859-1">
	 
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
			  <option value="NotInList">Nicht in der Liste</option>
			  <option disabled>&nbsp;&nbsp;&nbsp;SONSTIGE</option>
			  <option value="VmpClan">In eigener Sache</option>
			  <option value="Origin">Origin</option>
			  <option value="Steam">Steam</option>
			  <option value="Technique">Technik</option>
			  <option disabled>&nbsp;&nbsp;&nbsp;GAMES</option>
			  <option value="Anno2070">Anno 2070</option>
			  <option value="AnnoOnline">Anno Online</option>
			  <option value="Battlefield3">Battlefield 3</option>
			  <option value="Battlefield4">Battlefield 4</option>
			  <option value="Borderlands2">Borderlands 2</option>
			  <option value="CallOfDutyModernWarfare2">Call of Duty: Modern Warfare 2</option>
			  <option value="CallOfDutyModernWarfare3">Call of Duty: Modern Warfare 3</option>
			  <option value="CallOfDutyGhosts">Call of Duty: Ghosts</option>
			  <option value="DayZ">DayZ</option>
			  <option value="DeadSpace">Dead Space</option>
			  <option value="GTAV">GTA V</option>
			  <option value="LeagueOfLegends">League of Legends</option>
			  <option value="Left4Dead">Left 4 Dead 2</option>
			  <option value="MedalOfHonorWarfighter">Medal of Honor: Warfighter</option>
			  <option value="Metro2033">Metro 2033</option>
			  <option value="Minecraft">Minecraft</option>
			  <option value="NeedForSpeedWorld">Need for Speed World</option>
			  <option value="Payday">Payday</option>
			  <option value="Planetside2">PlanetSide 2</option>
			  <option value="Portal">Portal</option>
			  <option value="Portal2">Portal 2</option>
			  <option value="StarwarsTheOldRepublic">StarWars: The Old Republic</option>
			  <option value="Titanfall">Titanfall</option>
			  <option value="TrackmaniaCanyon">Trackmania² Canyon</option>
			  <option value="Warface">Warface</option>
			  <option value="WormsReloaded">Worms: Reloaded</option>
			</select>	
		</div>
	
		<p><br /><br /><br /><br /><br /></p>

		<span class="smallHeadline">
			Quelle (wird nur intern gespeichert)
		</span>	
		<input type="Text" name="NewsSource" class="NewsTitle" id="NewsSource">
		
		<p>&nbsp;</p>

		<div class="NewsSubmit">
			<input type="Submit" name="" value="Veröffentlichen" class="NewsSubmit">
		</div>

		Mit <span class="mandatory">*</span> gekennzeichnete Felder müssen ausgefüllt werden.
	 
	</form>
</div>