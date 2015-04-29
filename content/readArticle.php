<?php
	function share() {
		echo '<div class="SqlArticleShare">';
			echo '<div class="SqlArticleShareInnerRight"><img src="images/share.png"> Teile diesen Artikel <br>';
				echo '<div class="ShareOnFacebook"><img src="images/facebook_transparent.png" class="circle"></div>';
				echo '<div class="ShareOnTwitter"><img src="images/twitter_transparent.png" class="circle"></div>';
				echo '<div class="ShareOnGooglePlus"><img src="images/googleplus_transparent.png" class="circle"></div>';
			echo '</div>';
		echo '</div>';
	}

	function GetAlias($game)
	{
		$database=mysqli_connect("localhost","homepage","yTaYq6Mn*PTY=~%P8oQ,","webseite");		// später die Adresse der DB auf dem Server
		// Check connection 																	// zum lokelen Testen auf mobilen Geräten trotzdem die jetzige
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

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

			echo '<span class="SqlArticleGame">' . $gamename . '</span>' .
				 '<span class="SqlArticleDate">' . date("d.m.Y", strtotime($row['date'])) .
				 '&nbsp;-&nbsp;' . substr($row['timestamp'], 0, -3) .
				 '&nbsp;UHR&nbsp;VON&nbsp;' . strtoupper($row['author']) . '</span>';
		  	echo '<img class="SqlArticleHeadImage" src="images/articles/' . $row['game'] . '.jpg" alt="' . $row['game'] . '">';
		  	echo '<a href="?site=' . $backlink . '"><img src="images/backButton.png" alt="Back" border="0" class="SqlArticleBack"></a>';
		  	echo '<span class="SqlArticleHeadline">' . utf8_encode(strtoupper($row['headline'])) . '</span>';
		  	echo '<span class="SqlArticleContent">' . utf8_encode($row['content']) . '</span>';
			share();
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
		else { echo '<span class="smallHeadline">	Mehr zu ' . GetAlias($game) . ':	</span>'; }



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

		$game = "nichtinderliste";	// default

		$database=mysqli_connect("localhost","homepage","yTaYq6Mn*PTY=~%P8oQ,","webseite");
		// Check connection
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		if ($article)
		{
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
    NEWS
</div>

	<?php ConnectToDatabase(true); ?>

<div class="PostPost">

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
	    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
	    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
</div>
