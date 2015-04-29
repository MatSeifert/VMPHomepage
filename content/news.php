<?php
	// I have no idea, if i still need this, but at this point, I'm too afraid to delete it
	define('DEBUG', false);

	function pagination($page, $rows) {

		if ($rows % 10 == 0)
		{
			$pages = $rows/10;
		}

		// To Display the last page, we need to add 1
		else $pages = (int)($rows/10)+1;

		if ($pages <= 5)
		{
			echo '<div class="center" style="margin: 20px 0px -10px 0px">';

			for ($i = 1; $i <= $pages; $i++)
			{
				if ($i == $page)
				{
					// DON'T remove the space at the beginning. Otherwise a puppy wil die in pain!
					$class = " activePage";
				} else $class = "pagination";

				echo '<a href="?site=start&page=' . $i . '"><span class="' . $class . '">' . $i . '</span></a>';
			}

			echo "</div>";
		} else {
			echo '<div class="center" style="margin: 20px 0px -10px 0px">';

			$showFirst = true;
			$showLast = true;

			// determine start and endpage
			if ($page <= 3)
			{
				$startpage = 1;
				$showFirst = false;
			}
			else $startpage = ($page - 3);

			if ($page >= ($pages -3))
			{
				$endpage = $pages;
				$showLast = false;
			}
			else $endpage = ($page + 3);

			if($showFirst)
			{
				echo '<a href="?site=start&page=1"><span class="pagination">Erste Seite</span></a>';
			}

			for ($i = $startpage; $i <= $endpage; $i++)
			{
				if ($i == $page)
				{
					// DON'T remove the space at the beginning. Otherwise a puppy wil die in pain!
					$class = " activePage";
				} else $class = "pagination";

				echo '<a href="?site=start&page=' . $i . '"><span class="' . $class . '">' . $i . '</span></a>';
			}

			if($showLast)
			{
				echo '<a href="?site=start&page=' . $pages . '"><span class="pagination">Letzte Seite</span></a>';
			}


			echo "</div>";
		}
	}

	function newsfeed() {

		$page = @$_GET["page"];
		if (!isset($page) || empty($page)) $page = 1;

		if ($page == 1)
		{
			$offset = 0;
		}
		else {
			$offset = $page * 10 - 10;
		}


		if (DEBUG) {
			$database=mysqli_connect("localhost","news","6F5PHPTGKaPh7Gnf","webseite");
			// Check connection
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
		}
		else {
			$database=mysqli_connect("localhost","homepage","yTaYq6Mn*PTY=~%P8oQ,","webseite");
			// Check connection
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
		}

		$result = mysqli_query($database,"SELECT * FROM articles ORDER BY id DESC LIMIT 10 OFFSET $offset");

		while($row = mysqli_fetch_array($result)) {
		  echo '<div class="SqlNewsBox">';
		  	echo '<a href="?site=read&id=' . $row['id'] . '"><img class="SqlNewsThumbnail" src="images/articles/thumbnails/' . $row['game'] . '.jpg" alt="' . $row['game'] . '"></a>';
		  	echo '<span class="SqlNewsHeadline"><a href="?site=read&id=' . $row['id'] . '">' . utf8_encode(strtoupper($row['headline'])) . '</a></span>';
		  	echo '<span class="SqlNewsDate">' . date("d.m.Y", strtotime($row['date'])) . '&nbsp;-&nbsp;' . substr($row['timestamp'], 0, -3) . '&nbsp;Uhr&nbsp;von&nbsp;' . $row['author'] . '</span>';
		  	echo '<a href="?site=read&id=' . $row['id'] . '"><span class="SqlNewsSnippet">' . utf8_encode(substr($row['content'], 0, 250)) . '</span></a>';
		  	echo '<div class="SqlNewsReadMore"><span class="hiddenOnMobile"><a href="?site=read&id=' . $row['id'] . '"><img src="images/readMore.png">&nbsp;Artikel lesen</a>&nbsp;&nbsp;' .
		  		 '&nbsp;</span><img src="images/comments.png">&nbsp;<a href="http://vmp-clan.de/?site=read&id=' . $row['id'] . '#disqus_thread"><img src="images/loadingS.gif"></a>&nbsp;&nbsp;' .
		  		 '&nbsp;<img src="images/readCounter.png">&nbsp;' . $row['articleRead'] . '&nbsp;mal gelesen&nbsp;&nbsp;' .
		  		 '</div>';
		  echo "</div>";
		}

		// I can't believe how much time it took for me to find out how to count the rows. Yes, I am that stupid!
		$countArticles = mysqli_query($database, "SELECT COUNT(1) FROM articles");

		$row = mysqli_fetch_array($countArticles);
		$total = $row[0];

		pagination($page, $total);

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
		<?php
			newsfeed();
		?>
	</div>
	<p>&nbsp;</p>
</div>
