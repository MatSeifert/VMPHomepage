<?php
	function YoutubeXml () {
		$xmlfile='https://www.youtube.com/feeds/videos.xml?channel_id=UCcWQgwwm9rCj6tx099W31Hg';
		$xml = simplexml_load_file(rawurlencode($xmlfile));

		$i = 0;		// Abbruchvariable, da sonst zu viele Videos eingebettet werden

		foreach ($xml->entry as $entry) {
			if ($i==7) break;

			// XML Namespaces
			$yt = $entry->children('http://www.youtube.com/xml/schemas/2015');
			$media = $entry->children('http://search.yahoo.com/mrss/');

			$VideoId = $yt->videoId;
			$title = str_replace('#', '~raute~', $media->group->title);
			$desc = nl2br(str_replace('&', '~and~', addslashes($media->group->description)));

			echo '<div class="LPBoxLatestVideo">';
				echo '<div class="cropThumb"><img src="http://img.youtube.com/vi/' . $VideoId . '/0.jpg" alt="Thumbnail" class="thumbnail"></div>';
				echo '<div style="float: left; height: 113px">&nbsp;</div>';
				echo '<div class="LPHeadline"><a href="?site=playVideo&VideoId=' . $VideoId .'&VideoTitle=' . $title . '&VideoDescription=' . $desc . '">' . strtoupper(str_replace('~raute~', '#', substr($title, 12))) . '</a></div><br />';
				echo '<div class="LPContentLatestVideo">' . $desc . '... </div>';
			echo '</div>';

			$i++;
		}
	}
?>
<div class="whereAmI">
    <div class="whereAmICircle">
		<i class="fa fa-youtube-play"></i>
	</div>
</div>

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
			<span class="LPHeadline">FALLOUT NEW VEGAS</span>
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
			<span class="LPHeadline">BORDERLANDS</span>
			<span class="LPContent">
				<p>&nbsp;</p>
				<img src="images/play.png">&nbsp;<a href="https://www.youtube.com/watch?v=mL0evO0Y5d0&list=PLMYyvoe65Ysk4YCJKEJ0QRziWfL-cmYPp">Playlist</a> <br />
				<span class="LPDate">Let's Play Dauer:</span> <br>
				97 Folgen
				<br>
			</span>
		</div>

		<div class="LPBox">
			<img src="images/lpPage_bl2.png" class="LetsPlayThumb" alt="Borderlands2">
			<span class="LPHeadline">BORDERLANDS 2</span>
			<span class="LPContent">
				<p>&nbsp;</p>
				<img src="images/play.png">&nbsp;<a href="https://www.youtube.com/watch?v=mL0evO0Y5d0&list=PLMYyvoe65Ysk4YCJKEJ0QRziWfL-cmYPp">Playlist</a> <br />
				<span class="LPDate">Neue Folgen immer:</span> <br>
					Montag
				<br>
			</span>
		</div>

		<div class="LPBox">
			<img src="images/lpPage_bltps.png" class="LetsPlayThumb" alt="BorderlandsThePreSequel">
			<span class="LPHeadline">BL THE PRE-SEQUEL</span>
			<span class="LPContent">
				<p>&nbsp;</p>
				<img src="images/play.png">&nbsp;<a href="https://www.youtube.com/playlist?list=PLMYyvoe65YskB_BGm3HzlLB9f3mhcj1Q_">Playlist</a> <br />
				<span class="LPDate">Neue Folgen immer:</span> <br>
					Dienstag &amp; Freitag
				<br>
			</span>
		</div>

		<div class="LPBox">
			<img src="images/lpPage_deadspace.png" class="LetsPlayThumb" alt="Dead Space">
			<span class="LPHeadline">DEAD SPACE</span>
			<span class="LPContent">
				<p>&nbsp;</p>
				<img src="images/play.png">&nbsp;<a href="https://www.youtube.com/playlist?list=PLMYyvoe65Ysk5gIJBL4GihugmFv0j62Gz">Playlist</a> <br />
				<span class="LPDate">Neue Folgen immer:</span> <br>
					Mittwochs
				<br>
			</span>
		</div>

		<div class="LPBox">
			<img src="images/lpPage_lanoire.png" class="LetsPlayThumb" alt="L.A. Noire">
			<span class="LPHeadline">L.A. NOIRE</span>
			<span class="LPContent">
				<p>&nbsp;</p>
				<img src="images/play.png">&nbsp;<a href="https://www.youtube.com/watch?v=ZM1halUgcOA&list=PLMYyvoe65Ysn0--WAJj-G8wH-V-zFhk1e">Playlist</a> <br />
				<span class="LPDate">Let's Play Dauer:</span> <br>
					107 Folgen
				<br>
			</span>
		</div>

		<div class="LPBox">
			<img src="images/lpPage_metro2033.png" class="LetsPlayThumb" alt="Metro 2033">
			<span class="LPHeadline">METRO 2033 </span>
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
			<span class="LPHeadline">PENUMBRA OVERTURE</span>
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
			<span class="LPHeadline">PENUMBRA BLACK PLAGUE</span>
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
			<span class="LPHeadline">SLENDER</span>
			<span class="LPContent">
				<p>&nbsp;</p>
				<img src="images/play.png">&nbsp;<a href="https://www.youtube.com/watch?v=vIU_XUvDyC8&list=PL7EDB5FDAD8EAD27A">Playlist</a> <br />
				<span class="LPDate">Let's Play Dauer:</span> <br>
				4 Folgen
				<br>
			</span>
		</div>

		<div style="clear: both"></div>

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
