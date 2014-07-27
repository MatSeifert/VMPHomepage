<?php
	// Falls die Seite lokal aufgerufen wird, wird die lokale Debug Umgebung aktiviert
	define('DEBUG', false);

	function ConnectToDatabase() {
		if (DEBUG) {
			$database=mysqli_connect("localhost","news","6F5PHPTGKaPh7Gnf","webseite");
			// Check connection
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
		}
		else {
			$database=mysqli_connect("localhost","homepage","yTaYq6Mn*PTY=~%P8oQ,","webseite");		// später die Adresse der DB auf dem Server
			// Check connection 																	// zum lokelen Testen auf mobilen Geräten trotzdem die jetzige
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}			
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
		mysqli_close($database);
	}
?>

<div class="whereAmI">
    NEWS
</div>

	<?php ConnectToDatabase(); ?>
