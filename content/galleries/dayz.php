<?php
	function FlickrFeed () {
		$xmlfile='https://api.flickr.com/services/feeds/groups_pool.gne?id=2669756@N23&lang=de-de&format=rss_200';
		$xml = simplexml_load_file(rawurlencode($xmlfile));
		$namespaces = $xml->getNamespaces(true);

		$count = 0;

		// The Image Gallery
		echo '<div class="galleryWrapper">';
			echo '<ul class="bxslider">';
				foreach ($xml->channel->item as $item) {
					echo '<li><img src="' . $item->children($namespaces['media'])->content->attributes()->url . '" class="w520"/></li>';
					echo $item->title;
				}
			echo '</ul>';
			echo '<div id="bx-pager">';
				foreach ($xml->channel->item as $item) {
					echo '<a data-slide-index="' . $count . '" href="" class="bxThumb"><img src="' . $item->children($namespaces['media'])->content->attributes()->url . '" /></a>';

					$count++;
				}
			echo '</div>';
		echo '</div>';
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

	<script>
		$('.bxslider').bxSlider({
		pagerCustom: '#bx-pager'
		});
	</script>
</div>
