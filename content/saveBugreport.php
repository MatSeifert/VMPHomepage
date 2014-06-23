<?php

	$con=mysqli_connect("localhost","homepage","yTaYq6Mn*PTY=~%P8oQ,","webseite");
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();

	// escape variables for security
	$title = mysqli_real_escape_string($con, $_POST['NewsTitle']);
	$content = mysqli_real_escape_string($con, $_POST['NewsContent']);
	$game = mysqli_real_escape_string($con, $_POST['NewsGame']);
	$tags = mysqli_real_escape_string($con, $_POST['NewsTags']);
	$author = GetName($token);

	$sql="INSERT INTO bugtracker (date, timestamp, headline, content, author, tags, game, source)
	VALUES (now(), now(), '$title', '$content', '$author', '$tags', '$game', '$source')";

	if (!mysqli_query($con,$sql)) {
	  die('Error: ' . mysqli_error($con));
	}
	echo '<div class="PostPost">Vielen Dank für das Senden des Bgreports! Wir werden uns so schnell wie möglich um die Behebung kümmern. <a href="../index.php?site=start">Zur Startseite</a></div>';

	mysqli_close($con);
?>