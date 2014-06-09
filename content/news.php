<?php
	// Falls die Seite lokal aufgerufen wird, wird die lokale Debug Umgebung aktiviert
	define('DEBUG', true);

	function ConnectToDatabase() {
		if (DEBUG) {
			$database=mysqli_connect("localhost","news","6F5PHPTGKaPh7Gnf","webseite");
			// Check connection
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
		}
		else {
			$database=mysqli_connect("localhost","news","6F5PHPTGKaPh7Gnf","webseite");					// später die Adresse der DB auf dem Server
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
		  	echo '<span class="SqlNewsDate">' . $row['date'] . '&nbsp;' . substr($row['timestamp'], 0, -3) . '&nbsp;Uhr&nbsp;von&nbsp;' . $row['author'] . '</span>';
		  	echo '<a href="?site=read&id=' . $row['id'] . '"><span class="SqlNewsSnippet">' . utf8_encode($row['content']) . '</span></a>';
		  	echo '<span class="SqlNewsReadMore"><a href="?site=read&id=' . $row['id'] . '">mehr lesen ...</a></span>';
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
  <span class="AddNews">
  	<a href="?site=AddNews">News schreiben</a>
  </span>
</div>
<div class="PostPost">

	<div class="LPBlock">
		<?php ConnectToDatabase(); ?>
	</div>
	<p>&nbsp;</p>
</div>
