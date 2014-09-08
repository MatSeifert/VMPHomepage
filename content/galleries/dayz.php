<?php
	function FlickrFeed () {
		$xmlfile='https://api.flickr.com/services/feeds/groups_pool.gne?id=2669756@N23&lang=de-de&format=rss_200';
		$xml = simplexml_load_file(rawurlencode($xmlfile));
		$namespaces = $xml->getNamespaces(true);

		foreach ($xml->channel->item as $item) {
			echo '<div class="imageWrapper">';
				echo '<img src="' . $item->children($namespaces['media'])->content->attributes()->url . '" alt="FlickrImage" class="FlickrImage">';
				echo '<div class="ImageInfo"><p class="ImageInfoText"><nobr>';
					echo $item->title . '</nobr><br>';
					echo 'von ' . $item->children($namespaces['media'])->credit;
				echo '</p></div>';
			echo '</div>';
		}
	}
?>

<div class="whereAmI">
    SCREENSHOTS
</div>

<div class="LpSsMobileHeadline">
	<a href="?site=screenshots">
		<img src="images/backButtonL.png" alt="back" border="0" class="backL">
	</a>
	<img src="https://farm8.staticflickr.com/7297/buddyicons/2669756@N23.jpg?1399166119" alt="Icon" style="float: left; margin: 9px 10px 0px 5px;">
		ADVENTURES OF DAYZ <br>
		<div class="FlickrSubTitle">Erinnerungsfotos von gemeinsamen DayZ Streifzügen</div>
</div>

<div class="PostTitle">
	<a href="?site=screenshots">
		<img src="images/backButtonL.png" alt="back" border="0" class="backL">
	</a>
	<img src="images/flickrDayZ.png" alt="Icon" class="ScreenshotsIcon">
		ADVENTURES OF DAYZ <br>
		<div class="FlickrSubTitle">Erinnerungsfotos von gemeinsamen DayZ Streifzügen</div>
</div>

<div class="ScreenshotContent">
	<?php FlickrFeed(); ?>
	<div class="FlickrSubText">
		Bei Alben, die mehr als 20 Bilder beinhalten, werden nur die 20 letzten Uploads angezeigt. 
		<a target="_blank" href="https://www.flickr.com/groups/vmpdayz/">
			Hier das ganze Album auf Flickr ansehen.
		</a>
	</div>
</div>