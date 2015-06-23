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
	<img src="http://c1.staticflickr.com/9/8606/buddyicons/2765499@N22_l.jpg?1417255900" alt="Icon" style="float: left; margin: 9px 10px 0px 5px; width: 50px;">
		CITIES OF ANNO 2070 <br>
		<div class="FlickrSubTitle">Screenshots von gemeinsamen Anno 2070 Partien</div>
</div>

<div class="PostTitle">
	<a href="?site=screenshots">
		<img src="images/backButtonL.png" alt="back" border="0" class="backL">
	</a>
	<img src="http://c1.staticflickr.com/9/8606/buddyicons/2765499@N22_l.jpg?1417255900" alt="Icon" class="ScreenshotsIcon">
		CITIES OF ANNO 2070 <br>
		<div class="FlickrSubTitle">Screenshots von gemeinsamen Anno 2070 Partien</div>
</div>

<div class="ScreenshotContent">
	<?php FlickrGallery('https://api.flickr.com/services/feeds/groups_pool.gne?id=2765499@N22&lang=de-de&format=rss_200'); ?>
	<div class="FlickrSubText">
		Bei Alben, die mehr als 20 Bilder beinhalten, werden nur die 20 letzten Uploads angezeigt.
		<a target="_blank" href="https://www.flickr.com/groups/2765499@N22/">
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
