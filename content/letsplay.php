<?php 
	function YoutubeXml () {
		$xmlfile='http://gdata.youtube.com/feeds/api/users/VMPCLanMedia/uploads';
		$xml = simplexml_load_file(rawurlencode($xmlfile));


		foreach ($xml->entry as $entry) {
			echo '<div class="LPBoxLatestVideo">';
				echo '<span class="LPHeadline">' . strtoupper(substr($entry->title, 12)) . '</span><br />';
				echo '<span class="LPContent">' . nl2br($entry->content) . '</span>';
			echo '</div>';
		}


	}
?>

<div class="PostTitle">
  LET'S PLAY
</div>
<div class="PostPost">
	<div class="LPSubHeadline">
		Unsere Projekte
	</div>

	<div class="LPBlock">
		<div class="LPBox">
			<img src="images/lpPage_fnv.png" class="LetsPlayThumb" alt="Fallout: New Vegas">
			<span class="LPHeadline">FALLOUT NEW VEGAS</span> <br />
			<span class="LPContent">
				Status: aktiv <br />
				Spieler: Kakadu, Behemoth <br />
			</span>
		</div>

		<div class="LPBox">
			<img src="images/lpPage_bl.png" class="LetsPlayThumb" alt="Borderlands">
			<span class="LPHeadline">BORDERLANDS</span> <br />
			<span class="LPContent">
				Status: aktiv <br />
				Spieler: Kakadu, Fallen Angel, Behemoth <br />
			</span>
		</div>

		<div class="LPBox">
			<img src="images/lpPage_lanoire.png" class="LetsPlayThumb" alt="L.A. Noire">
			<span class="LPHeadline">L.A. NOIRE</span> <br />
			<span class="LPContent">
				Status: aktiv <br />
				Spieler: Kakadu, Behemoth <br />
			</span>
		</div>

		<div class="LPBox">
			<img src="images/lpPage_metro2033.png" class="LetsPlayThumb" alt="Metro 2033">
			<span class="LPHeadline">METRO 2033 </span><br />
			<span class="LPContent">
				Status: beendet (32 Folgen)<br />
				Spieler: Kakadu, Behemoth <br />
			</span>
		</div>

		<div class="LPBox">
			<img src="images/lpPage_penOver.png" class="LetsPlayThumb" alt="Penumbra Overture">
			<span class="LPHeadline">PENUMBRA OVETURE</span><br />
			<span class="LPContent">
				Status: beendet (27 Folgen)<br />
				Spieler: Kakadu, Behemoth <br />
			</span>
		</div>

		<div class="LPBox">
			<img src="images/lpPage_penBlaPlag.png" class="LetsPlayThumb" alt="Penumbra Black Plague">
			<span class="LPHeadline">PENUM. BLACK PLG.</span><br />
			<span class="LPContent">
				Status: beendet (31 Folgen)<br />
				Spieler: Kakadu, Behemoth <br />
			</span>
		</div>

		<div class="LPBox">
			<img src="images/lpPage_slender.png" class="LetsPlayThumb" alt="Slender">
			<span class="LPHeadline">SLENDER</span><br />
			<span class="LPContent">
				Status: beendet (5 Folgen)<br />
				Spieler: Kakadu, Behemoth <br />
			</span>
		</div>

		<div class="LPBoxEmpty">
			&nbsp;
		</div>

		<div class="LPBoxEmpty">
			&nbsp;
		</div>

	</div>

	<p> &nbsp; </p>
	<div class="LPSubHeadline">
		Neuste Videos
	</div>

	<div class="LPBlock">
		<?php YoutubeXml(); ?>
	</div>

</div>
