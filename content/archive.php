<?php
	function ExecuteSqlQuery($year, $month) {
		$monate = array('1'=>"Januar",
		                '2'=>"Februar",
		                '3'=>"M&auml;rz",
		                '4'=>"April",
		                '5'=>"Mai",
		                '6'=>"Juni",
		                '7'=>"Juli",
		                '8'=>"August",
		                '9'=>"September",
		                '10'=>"Oktober",
		                '11'=>"November",
		                '12'=>"Dezember");
		$monateMitNull = array( '1'=>"01",
		                		'2'=>"02",
		                		'3'=>"03",
		                		'4'=>"04",
		                		'5'=>"05",
				                '6'=>"06",
				                '7'=>"07",
				                '8'=>"08",
				                '9'=>"09",
				                '10'=>"10",
				                '11'=>"11",
				                '12'=>"12");

		$database=mysqli_connect("localhost","homepage","yTaYq6Mn*PTY=~%P8oQ,","webseite");					// später die Adresse der DB auf dem Server
		// Check connection
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		echo '<span class="smallHeadline">Alle News vom&nbsp;' . $monate[$month] . '&nbsp' . $year . '&nbsp;werden angezeigt</span><p class="mobileHidden">&nbsp;</p>';

		$result = mysqli_query($database,"SELECT * FROM articles WHERE date LIKE '%$year-$monateMitNull[$month]%' ORDER BY id DESC");

		while($row = mysqli_fetch_array($result)) {
			echo '<div class="SqlNewsBox">';
	  		  	echo '<a href="?site=read&id=' . $row['id'] . '"><img class="SqlNewsThumbnail" src="images/articles/thumbnails/' . $row['game'] . '.jpg" alt="' . $row['game'] . '"></a>';
	  		  	echo '<span class="SqlNewsHeadline"><a href="?site=read&id=' . $row['id'] . '">' . utf8_encode(strtoupper($row['headline'])) . '</a></span>';
	  		  	echo '<span class="SqlNewsDate">' . date("d.m.Y", strtotime($row['date'])) . '&nbsp;-&nbsp;' . substr($row['timestamp'], 0, -3) . '&nbsp;Uhr&nbsp;von&nbsp;' . $row['author'] . '</span>';
	  		  	echo '<a href="?site=read&id=' . $row['id'] . '"><span class="SqlNewsSnippet">' . utf8_encode(substr($row['content'], 0, 250)) . '</span></a>';
	  		  	echo '<div class="SqlNewsReadMore"><span class="hiddenOnMobile"><a href="?site=read&id=' . $row['id'] . '"><img src="images/readMore.png">&nbsp;Artikel lesen</a>&nbsp;&nbsp;' .
	  		  		 '&nbsp;</span><i class="fa fa-comments"></i>&nbsp;<a href="http://vmp-clan.de/?site=read&id=' . $row['id'] . '#disqus_thread"><i class="fa fa-spinner fa-spin"></i></a>&nbsp;&nbsp;' .
	  		  		 '&nbsp;<i class="fa fa-eye"></i>&nbsp;' . $row['articleRead'] . '&nbsp;mal gelesen&nbsp;&nbsp;' .
	  		  		 '</div>';
  		  	echo "</div>";
		}
		mysqli_close($database);
	}

	function ExecuteSqlDefault() {
		$database=mysqli_connect("localhost","homepage","yTaYq6Mn*PTY=~%P8oQ,","webseite");
		// Check connection
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		echo '<span class="smallHeadline">Letzte News:</span><p class="mobileHidden">&nbsp;</p>';

		$result = mysqli_query($database,"SELECT * FROM articles ORDER BY id DESC LIMIT 0, 6");

		while($row = mysqli_fetch_array($result)) {
			echo '<div class="SqlNewsBox">';
	  		  	echo '<a href="?site=read&id=' . $row['id'] . '"><img class="SqlNewsThumbnail" src="images/articles/thumbnails/' . $row['game'] . '.jpg" alt="' . $row['game'] . '"></a>';
	  		  	echo '<span class="SqlNewsHeadline"><a href="?site=read&id=' . $row['id'] . '">' . utf8_encode(strtoupper($row['headline'])) . '</a></span>';
	  		  	echo '<span class="SqlNewsDate">' . date("d.m.Y", strtotime($row['date'])) . '&nbsp;-&nbsp;' . substr($row['timestamp'], 0, -3) . '&nbsp;Uhr&nbsp;von&nbsp;' . $row['author'] . '</span>';
	  		  	echo '<a href="?site=read&id=' . $row['id'] . '"><span class="SqlNewsSnippet">' . utf8_encode(substr($row['content'], 0, 250)) . '</span></a>';
	  		  	echo '<div class="SqlNewsReadMore"><span class="hiddenOnMobile"><a href="?site=read&id=' . $row['id'] . '"><img src="images/readMore.png">&nbsp;Artikel lesen</a>&nbsp;&nbsp;' .
	  		  		 '&nbsp;</span><i class="fa fa-comments"></i>&nbsp;<a href="http://vmp-clan.de/?site=read&id=' . $row['id'] . '#disqus_thread"><i class="fa fa-spinner fa-spin"></i></a>&nbsp;&nbsp;' .
	  		  		 '&nbsp;<i class="fa fa-eye"></i>&nbsp;' . $row['articleRead'] . '&nbsp;mal gelesen&nbsp;&nbsp;' .
	  		  		 '</div>';
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

	function GenerateMenu() {

	$monate = array('1'=>"Januar",
	                '2'=>"Februar",
	                '3'=>"M&auml;rz",
	                '4'=>"April",
	                '5'=>"Mai",
	                '6'=>"Juni",
	                '7'=>"Juli",
	                '8'=>"August",
	                '9'=>"September",
	                '10'=>"Oktober",
	                '11'=>"November",
	                '12'=>"Dezember");

		if(isset($_GET['year']) && !empty($_GET['year']) && isset($_GET['month']) && !empty($_GET['month'])) {
			$defaultYear =  $_GET['year'];
			$defaultMonth = $_GET['month'];
		}
		else {
			$defaultYear = date('Y');
			$defaultMonth = date('j');
		}

		$startYear = 2011;
		$currentYear = date('Y');
		$currentMonth = date('j');

		// Generate Year Dropdown
		echo '<select class="ArchiveYear" id="year" name="year" required="required">';
		echo '<option disabled>JAHR</option>';

		while($startYear <= $currentYear) {
			if ($currentYear == $defaultYear)
			{
				echo '<option value="'. $currentYear . '" selected="selected">' . $currentYear . '</option>';
			} else echo '<option value="'. $currentYear . '">' . $currentYear . '</option>';

			$currentYear--;
		}
		echo '</select>';

		// Generate Month Dropdown
		echo '<select class="ArchiveMonth" id="month" name="month" required="required">';
		echo '<option disabled>MONAT</option>';

		$i = 1;

		while($i < 13) {
			if ($defaultMonth == $i)
			{
				echo '<option value="'. $i . '" selected="selected">' . $monate[$i] . '</option>';
			} else echo '<option value="'. $i . '">' . $monate[$i] . '</option>';

			$i++;
		}
		echo '</select>';

	}
?>

<div class="whereAmI">
    <div class="whereAmICircle">
		<i class="fa fa-inbox"></i>
	</div>
</div>


<div class="PostTitle">
  ARCHIV
</div>
<div class="PostPost">

	<form action="?site=archive" method="GET" accept-charset="ISO-8859-1">
		<select class="hidden" id="site" name="site">
			  <option value="archive"></option>
		</select>

		<?php
			GenerateMenu();
		?>
		<input type="Submit" name="" value="Anzeigen" class="ArchiveSubmit">
	</form>

	<p>&nbsp;</p>

	<?php
		ShowArchive();
	?>
</div>
