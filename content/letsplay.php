<?php
	function YoutubeXml () {
		$xmlfile='http://gdata.youtube.com/feeds/api/users/VMPCLanMedia/uploads';
		$xml = simplexml_load_file(rawurlencode($xmlfile));

		$i = 0;		// Abbruchvariable, da sonst zu viele Videos eingebettet werden

		foreach ($xml->entry as $entry) {
			if ($i==6) break;

			$VideoId = substr($entry->id, -11);
			$title = str_replace('#', '~raute~', $entry->title);
			$desc = nl2br(str_replace('#', '~raute~', $entry->content));

			echo '<div class="LPBoxLatestVideo">';
				echo '<div class="cropThumb"><img src="http://img.youtube.com/vi/' . $VideoId . '/0.jpg" alt="Thumbnail" class="thumbnail"></div>';
				echo '<div style="float: left; height: 113px">&nbsp;</div>';
				if (strlen($title) > 48) {
					echo '<div class="LPHeadline"><a href="?site=playVideo&VideoId=' . $VideoId .'&VideoTitle=' . $title . '&VideoDescription=' . $desc . '">' . strtoupper(substr(str_replace('~raute~', '#', $title), 12, 36)) . '...</a></div><br />';					
				}
				else {
					echo '<div class="LPHeadline"><a href="?site=playVideo&VideoId=' . $VideoId .'&VideoTitle=' . $title . '&VideoDescription=' . $desc . '">' . strtoupper(substr(str_replace('~raute~', '#', $title), 12)) . '</a></div><br />';
				}
				echo '<div class="LPContentLatestVideo">' . nl2br(substr($desc, 0, 210)) . '... </div>';
			echo '</div>';

			$i++;
		}
	}
?>

<div class="PostTitle">
  LET'S PLAY
</div>
<div class="PostPost">
	<div class="LPSubHeadline">
		Unsere Projekte
		<p>&nbsp;</p>
	</div>

	<div class="LPBlock">
		<div class="LPBox">
			<img src="images/lpPage_fnv.png" class="LetsPlayThumb" alt="Fallout: New Vegas">
			<span class="LPHeadline">FALLOUT NEW VEGAS</span> <br />
			<span class="LPContent">
				<p>&nbsp;</p>
				<img src="images/play.png">&nbsp;<a href="https://www.youtube.com/watch?v=vsfTCJviyQg&list=PL12CD5FAF96B404D1">Playlist</a> <br />
				<span class="LPDate">Neue Folgen immer:</span> <br>
				Samstag &amp; Sonntag
				<br>
			</span>
		</div>

		<div class="LPBox">
			<img src="images/lpPage_bl.png" class="LetsPlayThumb" alt="Borderlands">
			<span class="LPHeadline">BORDERLANDS</span> <br />
			<span class="LPContent">
				<p>&nbsp;</p>
				<img src="images/play.png">&nbsp;<a href="https://www.youtube.com/watch?v=mL0evO0Y5d0&list=PLMYyvoe65Ysk4YCJKEJ0QRziWfL-cmYPp">Playlist</a> <br />
				<span class="LPDate">Neue Folgen immer:</span> <br>
				Montag &amp; Freitag
				<br>
			</span>
		</div>

		<div class="LPBox">
			<img src="images/lpPage_lanoire.png" class="LetsPlayThumb" alt="L.A. Noire">
			<span class="LPHeadline">L.A. NOIRE</span> <br />
			<span class="LPContent">
				<p>&nbsp;</p>
				<img src="images/play.png">&nbsp;<a href="https://www.youtube.com/watch?v=ZM1halUgcOA&list=PLMYyvoe65Ysn0--WAJj-G8wH-V-zFhk1e">Playlist</a> <br />
				<span class="LPDate">Neue Folgen immer:</span> <br>
				Dienstag &amp; Donnerstag
				<br>
			</span>
		</div>

		<div class="LPBox">
			<img src="images/lpPage_metro2033.png" class="LetsPlayThumb" alt="Metro 2033">
			<span class="LPHeadline">METRO 2033 </span><br />
			<span class="LPContent">
				<p>&nbsp;</p>
				<img src="images/play.png">&nbsp;<a href="https://www.youtube.com/watch?v=I2f_Kz3l65g&list=PLMYyvoe65YslT6qv8FZlaU-zwzq7pTW-9">Playlist</a> <br />
				<span class="LPDate">Let's Play Dauer:</span> <br>
				36 Folgen
				<br>
			</span>
		</div>

		<div class="LPBox">
			<img src="images/lpPage_penOver.png" class="LetsPlayThumb" alt="Penumbra Overture">
			<span class="LPHeadline">PENUMBRA OVETURE</span><br />
			<span class="LPContent">
				<p>&nbsp;</p>
				<img src="images/play.png">&nbsp;<a href="https://www.youtube.com/watch?v=ZiwNW3bA-A0&list=PLMYyvoe65YslO9cftBYDWNkJYLGb7-xiG">Playlist</a> <br />
				<span class="LPDate">Let's Play Dauer:</span> <br>
				28 Folgen
				<br>
			</span>
		</div>

		<div class="LPBox">
			<img src="images/lpPage_penBlaPlag.png" class="LetsPlayThumb" alt="Penumbra Black Plague">
			<span class="LPHeadline">PENUMBRA BLACK PLA...</span><br />
			<span class="LPContent">
				<p>&nbsp;</p>
				<img src="images/play.png">&nbsp;<a href="https://www.youtube.com/watch?v=Yj0k0ZV-AN4&list=PLMYyvoe65YsllXFcevINnWGIUTOTE1mVG">Playlist</a> <br />
				<span class="LPDate">Let's Play Dauer:</span> <br>
				25 Folgen
				<br>
			</span>
		</div>

		<div class="LPBox">
			<img src="images/lpPage_slender.png" class="LetsPlayThumb" alt="Slender">
			<span class="LPHeadline">SLENDER</span><br />
			<span class="LPContent">
				<p>&nbsp;</p>
				<img src="images/play.png">&nbsp;<a href="https://www.youtube.com/watch?v=vIU_XUvDyC8&list=PL7EDB5FDAD8EAD27A">Playlist</a> <br />
				<span class="LPDate">Let's Play Dauer:</span> <br>
				4 Folgen
				<br>
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
		<p>&nbsp;</p>
	</div>

	<div class="LPBlock">
		<?php YoutubeXml(); ?>
	</div>
	<p>&nbsp;</p>
</div>
