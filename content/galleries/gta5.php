<?php
	require_once("showGallery.php");
?>

<div class="whereAmI">
    <div class="whereAmICircle">
		<i class="fa fa-picture-o"></i>
	</div>
</div>

<div class="LpSsMobileHeadline">
	<a href="?site=screenshots">
		<img src="images/backButtonL.png" alt="back" border="0" class="backL">
	</a>
	<img src="https://farm9.staticflickr.com/8724/buddyicons/2868276@N22_l.jpg?1430296420" alt="Icon" style="float: left; margin: 9px 10px 0px 5px;">
		STORIES FROM LOS SANTOS <br>
		<div class="FlickrSubTitle">Lustiges und kurioses aus unseren GTA Online Sessions</div>
</div>

<div class="PostTitle">
	<a href="?site=screenshots">
		<img src="images/backButtonL.png" alt="back" border="0" class="backL">
	</a>
	<img src="https://farm9.staticflickr.com/8724/buddyicons/2868276@N22_l.jpg?1430296420" alt="Icon" class="ScreenshotsIcon">
	STORIES FROM LOS SANTOS <br>
	<div class="FlickrSubTitle">
		Lustiges und kurioses aus unseren GTA Online Sessions
	</div>
</div>

<div class="ScreenshotContent">
	<?php
		// Display the Gallery
		FlickrGallery('https://api.flickr.com/services/feeds/groups_pool.gne?id=2868276@N22&lang=de-de&format=rss_200');
	?>
	<div class="FlickrSubText">
		Bei Alben, die mehr als 20 Bilder beinhalten, werden nur die 20 letzten Uploads angezeigt.
		<a target="_blank" href="https://www.flickr.com/groups/2868276@N22/pool">
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
