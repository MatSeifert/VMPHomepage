<div class="whereAmI">
    <div class="whereAmICircle">
		<i class="fa fa-newspaper-o"></i>
	</div>
</div>

﻿<div class="PostTitle" style="margin: -10px 0px 0px 20px">
  NEWS VERFASSEN
</div>
<div class="PostPost">
	<p class="mobileHidden">&nbsp;</p>
	<form action="?site=SaveNews" method="post" accept-charset="ISO-8859-1" autocomplete="off">

		<span class="smallHeadline">
			Titel der News
		</span>
		<input type="Text" name="NewsTitle" class="NewsTitle required" id="NewsTitle" required="required">

		<p>&nbsp;</p>

		<span class="smallHeadline">
			Newsinhalt <br>
			<span class="smallInline mAbsolute">(Formatierung per HTML ist erlaubt)</span>
		</span>
		<textarea name="NewsContent" class="NewsContent required" id="NewsContent" required="required" maxlength="5000"></textarea>
		<div id="feedbackC" class="feedback"></div>
		<p>&nbsp;</p>

        <div style="float: left" class="mobileClear">
            <span class="smallHeadline">
                Security Token<span class="mandatory">*</span>
            </span>
            <input type="Password" name="NewsToken" class="NewsAuthor required" id="NewsToken" required="required">

        </div>

		<div style="float: left" class="mobileClear mTop40">
			<span class="smallHeadline">
				Spiel/Kategorie wählen
			</span>
			<select class="NewsGame required" id="NewsGame" name="NewsGame" required="required">
			  <option value="nichtinderliste">Nicht in der Liste</option>
			  <option disabled>&nbsp;&nbsp;&nbsp;SONSTIGE</option>
			  <option value="ineigenersache">In eigener Sache</option>
			  <option value="origin">Origin</option>
			  <option value="steam">Steam</option>
			  <option value="technik">Technik</option>
			  <option disabled>&nbsp;&nbsp;&nbsp;GAMES</option>
			  <option value="anno2070">Anno 2070</option>
			  <option value="anno2205">Anno 2205</option>
			  <option value="annoonline">Anno Online</option>
			  <option value="battlefield3">Battlefield 3</option>
			  <option value="battlefield4">Battlefield 4</option>
			  <option value="battlefieldhardline">Battlefield Hardline</option>
			  <option value="borderlands">Borderlands</option>
			  <option value="borderlands2">Borderlands 2</option>
			  <option value="borderlandsthepresequel">Borderlands the Presequel</option>
        <option value="cod4">Call of Duty 4: Modern Warfare</option>
			  <option value="modernwarfare2">Call of Duty: Modern Warfare 2</option>
			  <option value="modernwarfare3">Call of Duty: Modern Warfare 3</option>
			  <option value="codghosts">Call of Duty: Ghosts</option>
			  <option value="callofdutyadvancedwarfare">Call of Duty: Advanced Warfare</option>>
			  <option value="dayz">DayZ</option>
			  <option value="deadspace">Dead Space</option>
			  <option value="evolve">Evolve</option>
			  <option value="fallout4">Fallout 4</option>
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
			  <option value="simcity">Sim City</option>
			  <option value="starwarstheoldrepublic">StarWars: The Old Republic</option>
			  <option value="thecrew">The Crew</option>
			  <option value="theelderscrollsonline">The Elder Scrolls Online</option>
			  <option value="thedivision">The Divisoin</option>
			  <option value="titanfall">Titanfall</option>
			  <option value="trackmania2canyon">Trackmania² Canyon</option>
			  <option value="warface">Warface</option>
			  <option value="wormsreloaded">Worms: Reloaded</option>
			</select>
		</div>

		<p><br /><br /><br /><br /><br /></p>

		<span class="smallHeadline mTop60">
			Auch posten bei
		</span>
			<!-- Checkbox for Twtter /-->
			<input type="checkbox" value="twitter" class="checkbox" name="twitter" checked/>
			&nbsp;<img src="images/twitter_S.png" alt="Twitter">&nbsp;Twitter

			<!-- Checkbox for Facebook
			<input type="checkbox" value="facebook" class="checkbox" name="twitter" disabled />
			&nbsp;<img src="images/facebook_S.png" alt="Facebook">&nbsp;Facebook /-->

			<!-- Checkbox for Google Plus /-->
			<input type="checkbox" value="googleplus" class="checkbox" name="twitter" disabled />
			&nbsp;<img src="images/gplus_S.png" alt="Google Plus">&nbsp;<span class="disabled">Google+</span>


		<span class="smallHeadline">
			Social Media Snippet <br>
			<div class="smallInline">
				Optionale Angabe. Beschreibe deine News kurz in ein bis zwei Sätzen. Dieses Snippet wird dann mit dem Link zur News
				auf den oben gewählten Social Media Plattformen veröffentlicht. Bleibt das Feld leer, wird der Inhalt der News nach
				110 Zeichen gekürzt und als Social Media Snippet verwendet!
			</div>
		</span>
        <p class="desktopHidden mTop40">&nbsp;</p>
		<textarea name="SocialMediaSnippet" class="NewsContent" id="SocialMediaSnippet" maxlength="110"></textarea>
		<div id="feedbackS" class="feedback"></div>

		<p>&nbsp;</p>
		<span class="smallHeadline">
			Quelle<span class="mandatory">**</span><br>
			<span class="smallInline">(wird nur intern gespeichert)</span>
		</span>
		<input type="Text" name="NewsSource" class="NewsTitle" id="NewsSource">

		<p>&nbsp;</p>
		<span class="smallHeadline">
			Tags <br>
			<div class="smallInline">(bitte tagge deine News, damit sie in der Suche gelistet werden kann. Ein Leerzeichen nach jedem Tag reicht als Seperator)</div>
		</span>
		<input type="Text" name="NewsTags" class="NewsTitle required" id="NewsTags">

		<p>&nbsp;</p>
		<div class="NewsSubmit">
			<input type="Submit" name="" value="Veröffentlichen" class="NewsSubmit">
		</div>

	 	<div class="smallInline">
	 	          <span class="mandatory">*</span>Du musst deinen Nickname nicht mit angeben, er wird anhand deines Security Tokens erkannt. Das Security Token
                   verhindert, dass	fremde User oder Bots News posten können, und dient der Identifizierung. Falls du noch kein Token hast, aber gern News schreiben
                   möchtest, wende bitte dich an einen Admin.<br>
                   <b>Bitte beachte, dass die News in deinem Namen gepostet wird. Damit bist nur du für die veröffentlichten Inhalte verantwortlich!</b><br>
                  <span class="mandatory">**</span>
                   Eine Quellenangabe ist nicht verpflichtend, aber hilfreich, wenn die Informationen von einer anderen Seite stammen!
	 	</div>
	</form>
</div>
