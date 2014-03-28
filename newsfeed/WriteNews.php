<div class="PostTitle">
  NEWS HINZUFÜGEN
</div>
<div class="PostPost">
	<p>&nbsp;</p>
	<form action="SaveNews.php" method="get">
	 
		<span class="smallHeadline">
			Titel der News<span class="mandatory">*</span>
		</span>
		<input type="Text" name="NewsTitle" class="NewsTitle">

		<p>&nbsp;</p>
		
		<span class="smallHeadline">
			Newsinhalt<span class="mandatory">*</span>
		</span>	
		<textarea name="NewsContent" class="NewsContent"></textarea>
		
		<p>&nbsp;</p>

		<div style="float: left">
			<span class="smallHeadline">
				Nickname (Ohne Clantag!)<span class="mandatory">*</span>
			</span>
			<input type="Text" name="NewsTitle" class="NewsAuthor">	

		</div>

		<div style="float: left">
			<span class="smallHeadline">
				Spiel/Kategorie wählen<span class="mandatory">*</span>
			</span>
			<select class="NewsGame">
			  <option value="NotInList">Nicht in der Liste</option>
			  <option disabled>__________________________</option>
			  <option value="VmpClan">In eigener Sache</option>
			  <option disabled>__________________________</option>
			  <option value="Battlefield3">Battlefield 3</option>
			  <option value="Battlefield4">Battlefield 4</option>
			  <option value="Borderlands2">Borderlands 2</option>
			  <option value="CallOfDutyModernWarfare2">Call of Duty: Modern Warfare 2</option>
			  <option value="CallOfDutyModernWarfare3">Call of Duty: Modern Warfare 3</option>
			  <option value="CallOfDutyGhosts">Call of Duty: Ghosts</option>
			  <option value="DayZ">DayZ</option>
			  <option value="DeadSpace">Dead Space</option>
			  <option value="Left4Dead">Left 4 Dead 2</option>
			  <option value="Titanfall">Titanfall</option>
			  <option value="TrackmaniaCanyon">Trackmania² Canyon</option>
			</select>	
		</div>
	
		<p><br /><br /><br /><br /><br /></p>

		<span class="smallHeadline">
			Quelle (wird nur intern gespeichert)
		</span>	
		<input type="Text" name="NewsSource" class="NewsTitle">
		
		<p>&nbsp;</p>

		<div class="NewsSubmit">
			<input type="Submit" name="" value="Veröffentlichen" class="NewsSubmit">
		</div>

		Mit <span class="mandatory">*</span> gekennzeichnete Felder müssen ausgefüllt werden.
	 
	</form>
</div>