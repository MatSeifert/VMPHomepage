<?php
	// Falls die Seite lokal aufgerufen wird, wird die lokale Debug Umgebung aktiviert
	define('DEBUG', false);

	function newsfeed() {
		if (DEBUG) {
			$database=mysqli_connect("localhost","news","6F5PHPTGKaPh7Gnf","webseite");
			// Check connection
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
		}
		else {
			$database=mysqli_connect("localhost","homepage","yTaYq6Mn*PTY=~%P8oQ,","webseite");					// später die Adresse der DB auf dem Server
			// Check connection 																		
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}			
		}

		$result = mysqli_query($database,"SELECT * FROM articles ORDER BY id DESC LIMIT 0, 10");

		while($row = mysqli_fetch_array($result)) {
		  echo '<div class="SqlNewsBox">';
		  	echo '<a href="?site=read&id=' . $row['id'] . '"><img class="SqlNewsThumbnail" src="images/articles/thumbnails/' . $row['game'] . '.jpg" alt="' . $row['game'] . '"></a>';
		  	echo '<span class="SqlNewsHeadline"><a href="?site=read&id=' . $row['id'] . '">' . utf8_encode(strtoupper($row['headline'])) . '</a></span>';
		  	echo '<span class="SqlNewsDate">' . date("d.m.Y", strtotime($row['date'])) . '&nbsp;-&nbsp;' . substr($row['timestamp'], 0, -3) . '&nbsp;Uhr&nbsp;von&nbsp;' . $row['author'] . '</span>';
		  	echo '<a href="?site=read&id=' . $row['id'] . '"><span class="SqlNewsSnippet">' . utf8_encode(substr($row['content'], 0, 250)) . '</span></a>';
		  	echo '<div class="SqlNewsReadMore"><span class="hiddenOnMobile"><a href="?site=read&id=' . $row['id'] . '"><img src="images/readMore.png">&nbsp;Artikel lesen</a>&nbsp;&nbsp;&nbsp;' . 
		  		 '&nbsp;</span><img src="images/comments.png">&nbsp;<a href="http://vmp-clan.de/?site=read&id=' . $row['id'] . '#disqus_thread"><img src="images/loadingS.gif"></a>&nbsp;&nbsp;&nbsp;' . 
		  		 '&nbsp;<img src="images/readCounter.png">&nbsp;' . $row['articleRead'] . '&nbsp;mal gelesen&nbsp;&nbsp;' . 
		  		 '</div>';
		  echo "</div>";
		}
		mysqli_close($database);
	}
?>

<div class="whereAmI">
    NEWS
</div>

<div class="PostTitle">
  NEWS
</div>
  <span class="AddNews">
  	<a href="?site=AddNews" class="tooltips">
  		+
  		<span>News schreiben</span>
  	</a>
  </span>
<div class="PostPost">

	<div class="LPBlock">
		<?php newsfeed(); ?>
	</div>
	<p>&nbsp;</p>
</div>
