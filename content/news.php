<?php
	// Falls die Seite lokal aufgerufen wird, wird die lokale Debug Umgebung aktiviert
	if ($_SERVER['SERVER_NAME'] == 'localhost')
	{
		define('DEBUG', true);
	}
	else define('DEBUG', false);

	function ConnectToDatabase() {
		if (DEBUG) {
			$database=mysqli_connect("localhost","news","6F5PHPTGKaPh7Gnf","webseite");
			// Check connection
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
		}

		$result = mysqli_query($database,"SELECT * FROM articles ORDER BY date DESC LIMIT 0, 10");

		while($row = mysqli_fetch_array($result)) {
		  echo '<div class="SqlNewsBox">';
		  	echo '<a href="?site=read&id=' . $row['id'] . '"><img class="SqlNewsThumbnail" src="images/articles/thumbnails/' . $row['game'] . '.jpg" alt="' . $row['game'] . '"></a>';
		  	echo '<span class="SqlNewsHeadline"><a href="?site=read&id=' . $row['id'] . '">' . utf8_encode(strtoupper($row['headline'])) . '</a></span>';
		  	echo '<span class="SqlNewsDate">' . $row['date'] . '&nbsp;' . substr($row['timestamp'], 0, -3) . '&nbsp;Uhr&nbsp;von&nbsp;' . $row['author'];
		  	echo '<span class="SqlNewsSnippet">' . utf8_encode($row['content']) . '</span>';
		  	echo '<span class="SqlNewsReadMore"><a href="?site=read&id=' . $row['id'] . '">mehr lesen ...</a></span>';
		  echo "</div>";
		}



		mysqli_close($database);

	}
	/*
	function GetNewsFromRss () {
		$newsfeed='http://vmp-clan.tumblr.com/rss';
		$xml = simplexml_load_file(rawurlencode($newsfeed));
		$namespaces = $xml->getNamespaces(true);

		$i = 0;		// Abbruchvariable für die foreach Schleife

		foreach ($xml->channel->item as $item) {
			if ($i==3) break;
			echo '<div class="newsItemWrapper">';
				echo '<span class="smallHeadlineNews">' . strtoupper($item->title) . '</span>';
				echo '<div class="newsFeedContent">' . str_replace('<img', '<img class="newsImage" ',str_replace('<p', '<p class="newsItem" ' ,$item->description)) . '</div>';
			echo "</div>";
			
			$i++;
		}
	} */
?>
<div class="whereAmI">
    NEWS
</div>

<div class="PostTitle">
  NEWS
</div>
<div class="PostPost">

	<div class="LPBlock">
		<?php ConnectToDatabase(); ?>
	</div>
	<p>&nbsp;</p>
</div>
