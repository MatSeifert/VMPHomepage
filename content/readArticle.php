<?php
	function ConnectToDatabase() {
		$database=mysqli_connect("localhost","homepage","yTaYq6Mn*PTY=~%P8oQ,","webseite");		// später die Adresse der DB auf dem Server
		// Check connection 																	// zum lokelen Testen auf mobilen Geräten trotzdem die jetzige
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}			

		$id = $_GET['id'];
		if (isset($_GET['origin']) && !empty($_GET['origin']) && isset($_GET['y']) && !empty($_GET['y']) && isset($_GET['m']) && !empty($_GET['m'])) {
			$backlink = $_GET['origin'] . '&year=' . $_GET['y'] . '&month=' . $_GET['m'];
		}
		else $backlink = "start";

		$result = mysqli_query($database,"SELECT * FROM articles WHERE id = $id");

		while($row = mysqli_fetch_array($result)) {
		  	echo '<img class="SqlArticleHeadImage" src="images/articles/' . $row['game'] . '.jpg" alt="' . $row['game'] . '">';
		  	echo '<a href="?site=' . $backlink . '"><img src="images/backButton.png" alt="Back" border="0" class="SqlArticleBack"></a>';
		  	echo '<span class="SqlArticleHeadline">' . utf8_encode(strtoupper($row['headline'])) . '</span>';
		  	echo '<span class="SqlArticleDate">' . date("d.m.Y", strtotime($row['date'])) . '&nbsp;' . substr($row['timestamp'], 0, -3) . '&nbsp;Uhr&nbsp;von&nbsp;' . $row['author'] . '</span>';
		  	echo '<span class="SqlArticleContent">' . utf8_encode($row['content']) . '</span>';
		}

		// Read Counter bei jedem Aufruf der News um eins erhöhen
		mysqli_query($database, "UPDATE articles SET articles.articleRead = articles.articleRead+1 WHERE id = $id");

		// Verbindung schließen
		mysqli_close($database);
	}
?>

<div class="whereAmI">
    NEWS
</div>

	<?php ConnectToDatabase(); ?>

<div class="PostPost">
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
