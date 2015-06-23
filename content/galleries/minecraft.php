<?php
	require_once("showGallery.php");
?>

<div class="whereAmI">
    SCREENSHOTS
</div>

<div class="LpSsMobileHeadline">
	<a href="?site=screenshots">
		<img src="images/backButtonL.png" alt="back" border="0" class="backL">
	</a>
	<img src="https://farm6.staticflickr.com/5137/buddyicons/2611823@N25.jpg?1398633302" alt="Icon" style="float: left; margin: 9px 10px 0px 5px;">
		MINECRAFT MONUMENTE <br>
		<div class="FlickrSubTitle">Alle Bauwerke vom Minecraftserver des VMP Clans.</div>
</div>

<div class="PostTitle">
	<a href="?site=screenshots">
		<img src="images/backButtonL.png" alt="back" border="0" class="backL">
	</a>
	<img src="https://farm6.staticflickr.com/5137/buddyicons/2611823@N25.jpg?1398633302" alt="Icon" class="ScreenshotsIcon">
	MINECRAFT MONUMENTE <br>
	<div class="FlickrSubTitle">
		Alle Bauwerke vom Minecraftserver des VMP Clans.
	</div>
</div>

<div class="ScreenshotContent">
	<?php FlickrGallery('https://api.flickr.com/services/feeds/groups_pool.gne?id=2611823@N25&lang=de-de&format=rss_200'); ?>
	<div class="FlickrSubText">
		Bei Alben, die mehr als 20 Bilder beinhalten, werden nur die 20 letzten Uploads angezeigt.
		<a target="_blank" href="https://www.flickr.com/groups/vmpminecraft/">
			Hier das ganze Album auf Flickr ansehen.
		</a>
	</div>

	<script>
	    $('.bxslider').bxSlider({
	      pagerCustom: '#bx-pager'
	    });
	</script>

	<script type="text/javascript">
		;( function( $ ) {
			$( '.swipebox' ).swipebox();
		} )( jQuery );

	</script>
</div>
