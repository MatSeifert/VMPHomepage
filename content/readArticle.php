<?php
	require_once('content/galleries/showGallery.php');
	require_once('helper/dbConnector.php');
	require_once('helper/shortenLink.php');

	function AddAttachments($RawContent, $id) {
		// Check for Galleries
		$galleryString = ArticleGallery($id);

		$result = str_replace("@Gallery", "$galleryString", $RawContent);

		return $result;
 	}

	function GetAdvertisement($alias) {
		$database = connect();

		$result = mysqli_query($database,"SELECT * FROM aliastable WHERE alias = '$alias'");

		while($row = mysqli_fetch_array($result)) {
			return $row['amazon'];
		}
	}

	function share($id, $article) {
		$shortlink = createShortLink("http://www.vmp-clan.de/?site=read&id=" . $id);

		echo '<div class="SqlArticleShare">';
			echo '<div class="SqlArticleShareInnerRight mobileClear"><i class="fa fa-share-alt" aria-hidden="true"></i> Teile diesen Artikel <br>';
				echo '<div class="ShareOnFacebook"' .
					     ' onclick="popupwindow(\'https://www.facebook.com/sharer/sharer.php?u=' . $shortlink . '\', 500, 400)">' .
						'<a href=""><img src="images/facebook_transparent.png" class="circle"></a>' .
						'</div>';
				echo '<div class="ShareOnTwitter"' .
						' onclick="popupwindow(\'https://twitter.com/home?status=' . $shortlink . '\', 500, 400)">' .
						'<a href=""><img src="images/twitter_transparent.png" class="circle"></a>' .
						'</div>';
				echo '<div class="ShareOnGooglePlus"' .
						' onclick="popupwindow(\'https://plus.google.com/share?url=' . $shortlink . '\', 500, 400)">' .
						'<a href=""><img src="images/googleplus_transparent.png" class="circle"></a>' .
						'</div>';
			echo '</div>';

			$ad = GetAdvertisement($article['game']);

			echo '<div class="SqlArticleShareInnerLeft mobileClear"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> Ein bisschen shoppen ... <br>';
				echo '<img src="images/articles/cover/' . $article['game'] . '.jpg" alt="Cover" class="adCoverImage">';
				echo '<div class="adWrapper">';
			        echo $ad;
			    echo '</div>';
			echo '</div>';
		echo '</div>';
	}

	function GetAlias($game)
	{
		$database = connect();

		$result = mysqli_query($database,"SELECT * FROM aliastable WHERE alias = '$game'");

		while($row = mysqli_fetch_array($result)) {
			return $row['realname'];
		}
	}

	function PrintArticle($database)
	{
		$id = $_GET['id'];
		if (isset($_GET['origin']) && !empty($_GET['origin']) && isset($_GET['y']) && !empty($_GET['y']) && isset($_GET['m']) && !empty($_GET['m'])) {
			$backlink = $_GET['origin'] . '&year=' . $_GET['y'] . '&month=' . $_GET['m'];
		}
		else $backlink = "start";

		$result = mysqli_query($database,"SELECT * FROM articles WHERE id = $id");

		while($row = mysqli_fetch_array($result)) {
			$gamename = strtoupper(GetAlias($row['game']));

			// Check for included Stuff like Galleries
			$raw = utf8_encode($row['content']);
			$ContentWithAttachments = AddAttachments($raw, $id);

			// The Desktop Version
			echo '<span class="SqlArticleGame">' . $gamename . '</span>' .
				 '<span class="SqlArticleDate">' . date("d.m.Y", strtotime($row['date'])) .
				 '&nbsp;-&nbsp;' . substr($row['timestamp'], 0, -3) .
				 '&nbsp;UHR&nbsp;VON&nbsp;' . strtoupper($row['author']) . '</span>';
		  	echo '<img class="SqlArticleHeadImage" src="images/articles/' . $row['game'] . '.jpg" alt="' . $row['game'] . '">';
		  	echo '<a href="?site=' . $backlink . '"><i class="fa fa-arrow-left SqlArticleBack" aria-hidden="true"></i> </a>';
		  	echo '<span class="SqlArticleHeadline">' . utf8_encode(strtoupper($row['headline'])) . '</span>';
			// Mobile Exclusive Stuff
			echo '<div class="artileInfoboxMobile">';
				echo '<i class="fa fa-gamepad"></i> ' . $gamename . '<br>';
				echo '<i class="fa fa-calendar"></i> ' . date("d.m.Y", strtotime($row['date'])) .
				'&nbsp;-&nbsp;' . substr($row['timestamp'], 0, -3) .
				'&nbsp;UHR&nbsp;VON&nbsp;' . strtoupper($row['author']);
			echo '</div>';
		  	echo '<span class="SqlArticleContent">' . $ContentWithAttachments . '</span>';
			share($id, $row);
		}

		// Read Counter bei jedem Aufruf der News um eins erhöhen
		mysqli_query($database, "UPDATE articles SET articles.articleRead = articles.articleRead+1 WHERE id = $id");
	}

	function GetNameAndId($database, $type)
	{
		$id = $_GET['id'];

		$result = mysqli_query($database,"SELECT game, id FROM articles WHERE id = $id");

		while($row = mysqli_fetch_array($result)) {
			if ($type)
			{
				return $row['game'];
			}
			else {
				return $row['id'];
			}
		}
	}

	function PrintSimilarArticles($database, $game, $id)
	{
		$result = mysqli_query($database,"SELECT * FROM articles WHERE game = '$game' AND id != $id ORDER BY id DESC LIMIT 0, 3");

		if (mysqli_num_rows($result) == 0)
		{
			// continue
		}
		else { echo '<span class="smallHeadline"><i class="fa fa-share" aria-hidden="true"></i>	Mehr zu ' . GetAlias($game) . ':	</span>'; }

		while($row = mysqli_fetch_array($result)) {
			echo '<div class="similarArticleWrapper">';
			echo '<a href="?site=read&id=' . $row['id'] . '"><img class="SimThumb" src="images/articles/thumbnails/' . $row['game'] . '.jpg" alt="' . $row['game'] . '"></a>';
			echo '<a href="?site=read&id=' . $row['id'] . '" alt="News"><span class="SimHeadline">' . utf8_encode(strtoupper($row['headline'])) . '</span></a>';
			echo '<span class="SimInfo">' . date("d.m.Y", strtotime($row['date'])) .
				 '&nbsp;-&nbsp;' . substr($row['timestamp'], 0, -3) .
				 '&nbsp;Uhr&nbsp;von&nbsp;' . $row['author'] . '</span>';
			echo '</div>';
		}

	}

	function ConnectToDatabase($article) {

		$game = "nichtinderliste";	// fallback

		$database = connect();

		if ($article) {
			$game = PrintArticle($database);
		}
		else {
			$game = GetNameAndId($database, true);
			$id = GetNameAndId($database, false);

			PrintSimilarArticles($database, $game, $id);
		}

		// Verbindung schließen
		mysqli_close($database);
	}
?>

<div class="whereAmI">
    <div class="whereAmICircle">
		<i class="fa fa-newspaper-o"></i>
	</div>
</div>

<?php ConnectToDatabase(true); ?>

<div class="PostPost">
	<script>
		// Social Share Button Popup Window
		function popupwindow(url, w, h) {
			var left = (screen.width/2)-(w/2);
			var top = (screen.height/2)-(h/2);

			window.open(url, "_blank", "scrollbars=no, resizable=no, width=" + w + ", height=" + h + " top=" + top + " left=" + left);

			event.preventDefault();
		}

		// Slideshow for Image Galleries
		$('.bxslider').bxSlider({
		pagerCustom: '#bx-pager'
		});

		// Zoomed Version of Galleries
		;( function( $ ) {
			$( '.swipebox' ).swipebox();
		} )( jQuery );
	</script>

	<?php ConnectToDatabase(false); ?>

	<p>&nbsp;</p>
	<div id="disqus_thread"></div>
	    <script type="text/javascript">
	        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
	        var disqus_shortname = 'vmp-clan'; // required: replace example with your forum shortname

	        /* * * DON'T EDIT BELOW THIS LINE * * */
	        (function() {
	            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
	            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
	            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
	        })();
	    </script>
	    <noscript>Bitte aktiviere Javascript, um die <a href="http://disqus.com/?ref_noscript">Disqus</a> Kommentare zu lesen!</noscript>
	</div>
