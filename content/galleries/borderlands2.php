<?php
	function FlickrFeed () {
		$xmlfile='https://api.flickr.com/services/feeds/groups_pool.gne?id=2766102@N21&lang=de-de&format=rss_200';
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
	<img src="http://c2.staticflickr.com/8/7478/buddyicons/2766102@N21_l.jpg?1417739307" alt="Icon" style="float: left; margin: 9px 10px 0px 5px; width: 50px;">
		BORDERLAND 2 - FUN WITH GUNS <br>
		<div class="FlickrSubTitle">Lustiges und Kurioses von Pandora</div>
</div>

<div class="PostTitle">
	<a href="?site=screenshots">
		<img src="images/backButtonL.png" alt="back" border="0" class="backL">
	</a>
	<img src="http://c2.staticflickr.com/8/7478/buddyicons/2766102@N21_l.jpg?1417739307" alt="Icon" class="ScreenshotsIcon">
		BORDERLAND 2 - FUN WITH GUNS <br>
		<div class="FlickrSubTitle">Lustiges und Kurioses von Pandora</div>
</div>

<div class="ScreenshotContent">
	<?php FlickrFeed(); ?>
	<div class="FlickrSubText">
		Bei Alben, die mehr als 20 Bilder beinhalten, werden nur die 20 letzten Uploads angezeigt.
		<a target="_blank" href="https://www.flickr.com/groups/2766102@N21/">
			Hier das ganze Album auf Flickr ansehen.
		</a>
	</div>

	<script>
		$('.bxslider').bxSlider({
		pagerCustom: '#bx-pager'
		});
	</script>
</div>
