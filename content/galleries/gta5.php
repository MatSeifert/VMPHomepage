<?php
	function FlickrFeedModal () {
		try {
			$xmlfile='https://api.flickr.com/services/feeds/groups_pool.gne?id=2868276@N22&lang=de-de&format=rss_200';
			$xml = simplexml_load_file(rawurlencode($xmlfile));
			$namespaces = $xml->getNamespaces(true);

			$count = 0;

			// The Image Gallery
			echo '<ul class="bxslider">';
				foreach ($xml->channel->item as $item) {
					echo '<li><img src="' . $item->children($namespaces['media'])->content->attributes()->url . '" style="height: 500px; width: 900px;"/></li>';
					echo $item->title;
				}
			echo '</ul>';
			echo '<a href="#" border="0"><div class="bx-zoom" data-dismiss="modal">';
				echo '<img src="images/galleryZoomN.png" alt="Zoom">';
			echo '</div></a>';
		}
		catch (Exception $e)
		{
			echo 'Beim laden der Bilder ist ein Fehler aufgetreten. <br><br><hr><br>';
			echo $e;
		}
	}

	function FlickrFeed () {
		try {
			$xmlfile='https://api.flickr.com/services/feeds/groups_pool.gne?id=2868276@N22&lang=de-de&format=rss_200';
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
				echo '<a href="#" border="0"><div class="bx-zoom" data-toggle="modal" data-target="#largeGallery">';
					echo '<img src="images/galleryZoom.png" alt="Zoom">';
				echo '</div></a>';
				echo '<div id="bx-pager">';
					foreach ($xml->channel->item as $item) {
						echo '<a data-slide-index="' . $count . '" href="" class="bxThumb"><img src="' . $item->children($namespaces['media'])->content->attributes()->url . '" /></a>';

						$count++;
					}
				echo '</div>';
			echo '</div>';
		}
		catch (Exception $e)
		{
			echo 'Beim laden der Bilder ist ein Fehler aufgetreten. <br><br><hr><br>';
			echo $e;
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
	<?php FlickrFeed(); ?>
	<div class="FlickrSubText">
		Bei Alben, die mehr als 20 Bilder beinhalten, werden nur die 20 letzten Uploads angezeigt.
		<a target="_blank" href="https://www.flickr.com/groups/2868276@N22/pool">
			Hier das ganze Album auf Flickr ansehen.
		</a>
	</div>

	<!-- the large Gallery Modal View /-->
	<div id="largeGallery" class="modal fade">
	    <div class="modal-dialog" style="width: 900px; height: 1000px;">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <span class="modal-title">STORIES FROM LOS SANTOS</span>
	            </div>
	            <div class="modal-body">
					<?php FlickrFeedModal(); ?>
	            </div>
	        </div>
	        <!-- /.modal-content -->
	    </div>
	    <!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<script>
	    $('.bxslider').bxSlider({
	      pagerCustom: '#bx-pager'
	    });
	</script>

</div>
