<?php
	function ExecuteSqlQuery($year, $month) {
		$monate = array('01'=>"Januar",
		                '02'=>"Februar",
		                '03'=>"M&auml;rz",
		                '04'=>"April",
		                '05'=>"Mai",
		                '06'=>"Juni",
		                '07'=>"Juli",
		                '08'=>"August",
		                '09'=>"September",
		                '10'=>"Oktober",
		                '11'=>"November",
		                '12'=>"Dezember");

		$database=mysqli_connect("localhost","homepage","yTaYq6Mn*PTY=~%P8oQ,","webseite");					// später die Adresse der DB auf dem Server
		// Check connection 																		
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}	
		
		echo '<span class="smallHeadline">Alle News vom&nbsp;' . $monate[$month] . '&nbsp' . $year . '&nbsp;werden angezeigt</span><br><br>';

		$result = mysqli_query($database,"SELECT * FROM articles WHERE date LIKE '%$year-$month%' ORDER BY id DESC");

		while($row = mysqli_fetch_array($result)) {
		  echo '<div class="SqlNewsBox">';
		  	echo '<a href="?site=read&id=' . $row['id'] . '&origin=archive&y=' . $year . '&m=' . $month . '"><img class="SqlNewsThumbnail" src="images/articles/thumbnails/' . $row['game'] . '.jpg" alt="' . $row['game'] . '"></a>';
		  	echo '<span class="SqlNewsHeadline"><a href="?site=read&id=' . $row['id'] . '&origin=archive&y=' . $year . '&m=' . $month . '">' . utf8_encode(strtoupper($row['headline'])) . '</a></span>';
		  	echo '<span class="SqlNewsDate">' . date("d.m.Y", strtotime($row['date'])) . '&nbsp;-&nbsp;' . substr($row['timestamp'], 0, -3) . '&nbsp;Uhr&nbsp;von&nbsp;' . $row['author'] . '</span>';
		  	echo '<a href="?site=read&id=' . $row['id'] . '&origin=archive&y=' . $year . '&m=' . $month . '"><span class="SqlNewsSnippet">' . utf8_encode(substr($row['content'], 0, 400)) . '</span></a>';
		  	echo '<span class="SqlNewsReadMore"><a href="?site=read&id=' . $row['id'] . '&origin=archive&y=' . $year . '&m=' . $month . '">mehr lesen ...</a></span>';
		  echo "</div>";
		}
		mysqli_close($database);			
	}

	function ExecuteSqlDefault() {
		$database=mysqli_connect("localhost","homepage","yTaYq6Mn*PTY=~%P8oQ,","webseite");					// später die Adresse der DB auf dem Server
		// Check connection 																		
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}		
		
		echo '<span class="smallHeadline">Letzte News:</span><br><br>';

		$result = mysqli_query($database,"SELECT * FROM articles ORDER BY id DESC LIMIT 0, 6");

		while($row = mysqli_fetch_array($result)) {
		  echo '<div class="SqlNewsBox">';
		  	echo '<a href="?site=read&id=' . $row['id'] . '&origin=archive"><img class="SqlNewsThumbnail" src="images/articles/thumbnails/' . $row['game'] . '.jpg" alt="' . $row['game'] . '"></a>';
		  	echo '<span class="SqlNewsHeadline"><a href="?site=read&id=' . $row['id'] . '&origin=archive">' . utf8_encode(strtoupper($row['headline'])) . '</a></span>';
		  	echo '<span class="SqlNewsDate">' . date("d.m.Y", strtotime($row['date'])) . '&nbsp;-&nbsp;' . substr($row['timestamp'], 0, -3) . '&nbsp;Uhr&nbsp;von&nbsp;' . $row['author'] . '</span>';
		  	echo '<a href="?site=read&id=' . $row['id'] . '&origin=archive"><span class="SqlNewsSnippet">' . utf8_encode(substr($row['content'], 0, 400)) . '</span></a>';
		  	echo '<span class="SqlNewsReadMore"><a href="?site=read&id=' . $row['id'] . '&origin=archive">mehr lesen ...</a></span>';
		  echo "</div>";
		}
		mysqli_close($database);		
	}

	function ShowArchive() {
		if(isset($_GET['year']) && !empty($_GET['year']) && isset($_GET['month']) && !empty($_GET['month'])) {
			$year = $_GET['year'];
			$month = $_GET['month'];

			ExecuteSqlQuery($year, $month);
		}
		else {
			ExecuteSqlDefault(); 
		}
	}
?>

<div class="whereAmI">
    ARCHIV
</div>

<div class="PostTitle">
  ARCHIV
</div>
<div class="PostPost">
 
	<form action="?site=archive" method="GET" accept-charset="ISO-8859-1">
		<select class="hidden" id="site" name="site">
			  <option value="archive"></option>
		</select>

		<select class="ArchiveYear" id="year" name="year" required="required">
			  <option disabled>JAHR</option>
			  <option value="2014">2014</option>
			  <option value="2013">2013</option>
			  <option value="2012">2012</option>
			  <option value="2011">2011</option>
		</select>

		<select class="ArchiveMonth" id="month" name="month" required="required">
			  <option disabled>MONAT</option>
			  <option value="01">Januar</option>
			  <option value="02">Februar</option>
			  <option value="03">März</option>
			  <option value="04">April</option>
			  <option value="05">Mai</option>
			  <option value="06">Juni</option>
			  <option value="07">Juli</option>
			  <option value="08">August</option>
			  <option value="09">September</option>
			  <option value="10">Oktober</option>
			  <option value="11">November</option>
			  <option value="12">Dezember</option>
		</select>

		<input type="Submit" name="" value="Anzeigen" class="ArchiveSubmit">
	</form>

	<p>&nbsp;</p>

	<?php
		ShowArchive();
	?>
</div>
