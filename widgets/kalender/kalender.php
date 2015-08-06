<?php
	/*	IMPORTANT INFORMATION
			The "repeat" value in the database stores the information, if, or in
			which intervall the event repeats

			0 - Unique Event, no repeat
			1 - Repeat every month
			2 - Repeat every week
			3 - repeat every week (uneven)
			4 - repeat every week (even)
	*/

	// Deprecated, but actually shows the HTML structure
	// echo ("	<p>&nbsp;</p> <div class=\"agendaEntry\">
	// 			<img src=\"images/widgets/kalender/anno2070.png\" alt=\"Anno 2070\" class=\"left\">
	// 			&nbsp; ANNO 2070 <br />
	// 			&nbsp; <span class=\"date\">Mo, $date - 20:15 Uhr</span>
	// 		</div>");

	function PrintEvent($row)
	{
		// Get next date for specific event
		if ($row['repeat'] == 0)
		{
			$date = $row['startdate'];
		}
		elseif ($row['repeat'] == 1)
		{
			$date =
		}

	}

	function ShowEvents() {
		$database=mysqli_connect("localhost","homepage","yTaYq6Mn*PTY=~%P8oQ,","webseite");
		// Check connection
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$result = mysqli_query($database,"SELECT * FROM calendar LIMIT 3");

		while($row = mysqli_fetch_array($result)) {
			PrintEvent($row);
			//echo $row['Id'] . $row['startdate'] . $row['enddate'] . $row['description'] . $row['type'] . $row['game'] . $row['repeat'];
		}
	}

	ShowEvents();
?>
