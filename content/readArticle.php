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
		else {
			$database=mysqli_connect("localhost","news","6F5PHPTGKaPh7Gnf","webseite");		// später die Adresse der DB auf dem Server
			// Check connection 																		// zum lokelen Testen auf mobilen Geräten trotzdem die jetzige
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}			
		}

		$result = mysqli_query($database,"SELECT * FROM articles WHERE id = ".mysql_real_escape_string($_GET['id']));

		while($row = mysqli_fetch_array($result)) {
		  	echo '<img class="SqlArticleHeadImage" src="images/articles/' . $row['game'] . '.jpg" alt="' . $row['game'] . '">';
		  	echo '<a href="?site=start"><img src="images/backButton.png" alt="Back" border="0" class="SqlArticleBack"></a>';
		  	echo '<span class="SqlArticleHeadline">' . utf8_encode(strtoupper($row['headline'])) . '</span>';
		  	echo '<span class="SqlArticleDate">' . $row['date'] . '&nbsp;' . substr($row['timestamp'], 0, -3) . '&nbsp;Uhr&nbsp;von&nbsp;' . $row['author'] . '</span>';
		  	echo '<span class="SqlArticleContent">' . utf8_encode($row['content']) . '</span>';
		}
		mysqli_close($database);
	}
?>

<div class="whereAmI">
    NEWS
</div>

	<?php ConnectToDatabase(); ?>

