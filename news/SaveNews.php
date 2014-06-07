<?php
	
	// Überprüfung des Membertokens zur Botsicherheit
	function TokenAuth($AuthCode) {
		$verification;

		if ($AuthCode == "*qSY?lrIE[Bc~Sh$X830" || $AuthCode == "58dt%qx6z^DWb=bv:L',") {
			$verification = True;
		} 
		else $verification = False;

		return $verification;
	}

	function GetName($AuthToken) {
		switch ($AuthToken){
			case "*qSY?lrIE[Bc~Sh$X830": return "Behemoth";
			break;

			case "58dt%qx6z^DWb=bv:L',": return "Kakadu";
			break;
		}
	}

	// Daten aus dem Formular holen und in Variablen zwischenspeichern
	$token 	= $_POST['NewsToken'];

	// Token authentifizieren und News in die Datenbank schreiben
	if (TokenAuth($token)) {
		$con=mysqli_connect("localhost","news","6F5PHPTGKaPh7Gnf","webseite");
		// Check connection
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		// escape variables for security
		$title = mysqli_real_escape_string($con, $_POST['NewsTitle']);
		$content = mysqli_real_escape_string($con, $_POST['NewsContent']);
		$game = mysqli_real_escape_string($con, $_POST['NewsGame']);
		$author = GetName($token);

		$sql="INSERT INTO articles (date, timestamp, headline, content, author, game)
		VALUES (now(), now(), '$title', '$content', '$author', '$game')";

		if (!mysqli_query($con,$sql)) {
		  die('Error: ' . mysqli_error($con));
		}
		echo "1 record added";

		mysqli_close($con);
	} 

	else echo ('Das Security Token stimmt nicht &uuml;berein! Bitte &uuml;berpr&uuml;fe deine Eingabe! <br> <a href="../?site=AddNews">zur&uuml;ck</a>');
?>