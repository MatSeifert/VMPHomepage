<?php
	// Überprüfung des Membertokens zur Botsicherheit
	function TokenAuth($AuthCode) {
		$verification;

	   /* +++ SQCURITY TOKEN ZUWEISUNG +++
	   	* PsTcK27EdklNZ2w33nHW = Kakadu
		* Ji4w9LwToOJ829EORD1W = Behemoth
		*/

		if ($AuthCode == "Ji4w9LwToOJ829EORD1W" || $AuthCode == "PsTcK27EdklNZ2w33nHW") {
			$verification = True;
		} 
		else $verification = False;

		return $verification;
	}

	function GetName($AuthToken) {
		switch ($AuthToken){
			case "Ji4w9LwToOJ829EORD1W": return "Behemoth";
			break;

			case "PsTcK27EdklNZ2w33nHW": return "Kakadu";
			break;
		}
	}

	// Token zur Überprüfung aus dem Formular holen und in einer Variablen zwischenspeichern
	$token 	= $_POST['NewsToken'];

	// Überprüfen, ob eine Quelle angegeben wurde, ansonsten NULL
	if (is_null($_POST['NewsSource']))
	{
		$source = NULL;
	}
	else $source = $_POST['NewsSource'];

	// Token authentifizieren und News in die Datenbank schreiben
	if (TokenAuth($token)) {
		$con=mysqli_connect("localhost","news","6F5PHPTGKaPh7Gnf","webseite");
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		// escape variables for security
		$title = mysqli_real_escape_string($con, $_POST['NewsTitle']);
		$content = mysqli_real_escape_string($con, $_POST['NewsContent']);
		$game = mysqli_real_escape_string($con, $_POST['NewsGame']);
		$tags = mysqli_real_escape_string($con, $_POST['NewsTags']);
		$author = GetName($token);

		$sql="INSERT INTO articles (date, timestamp, headline, content, author, tags, game, source)
		VALUES (now(), now(), '$title', '$content', '$author', '$tags', '$game', '$source')";

		if (!mysqli_query($con,$sql)) {
		  die('Error: ' . mysqli_error($con));
		}
		echo 'News wurde gespeichert! <a href="../index.php?site=start">Zur Startseite</a>';

		mysqli_close($con);
	} 

	else echo ('Das Security Token stimmt nicht &uuml;berein! Bitte &uuml;berpr&uuml;fe deine Eingabe! <br> <a href="?site=AddNews">zur&uuml;ck</a>');
?>