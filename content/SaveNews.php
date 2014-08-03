<?php
	function PostOnTwitter($content, $link) {
		// require codebird
		require_once('socialSDK/twitter/src/codebird.php');
		 
		// Codebird initialisieren, und auf Twitter einloggen
		\Codebird\Codebird::setConsumerKey("zAMCKSyNQ3NTq8YuGaXiJneWn", "It9Nc2zGuWtuFztBzcXOzsWgk68KLFmRRRhydmpTq9PCdL5xwG");
		$cb = \Codebird\Codebird::getInstance();
		$cb->setToken("244468649-ZGCSmULXQPiDlc92Fy2IPjAMPMloiROuPNpnFV0n", "bQbB1BucBt5KZlc9ySIzZHF1pVdh2WmguUdFuIE5XerRf");
		 
		// Tweeten der News inklusive Backlink
		$params = array(
		  'status' => substr($content, 0, 100) . " " . $link
		);
		$reply = $cb->statuses_update($params);
	}


	function GetLinkWithID($title) {

		$database=mysqli_connect("localhost","homepage","yTaYq6Mn*PTY=~%P8oQ,","webseite");					// später die Adresse der DB auf dem Server
		// Check connection 																		
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}			

		$result = mysqli_query($database,'SELECT id FROM articles WHERE headline = "' . $title . '"');

		while($row = mysqli_fetch_array($result)) {
		   $link = 'vmp-clan.de/?site=read&id=' . $row['id'];
		}
		mysqli_close($database);

		return $link;
	}

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
		$con=mysqli_connect("localhost","homepage","yTaYq6Mn*PTY=~%P8oQ,","webseite");
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
		$message = 'News wurde gespeichert! <a href="../index.php?site=start">Zur Startseite</a>';

		mysqli_close($con);

		// Define Link to News for SEO-Stuff
		$newsLink = GetLinkWithID($title);

		// Post all the shit on Facebook, Twitter and Google Plus
		//PostOnFacebook($content);
		if ($_POST['twitter'] == 'twitter')
		{
			PostOnTwitter(utf8_encode($content), $newsLink);
			$twitterMessage = "Die News wurde erfolgreich getweetet!";
		} else $twitterMessage = "News wurde nicht getweetet.";
		//PostOnGooglePlus();
	} 

	else $message = ('Das Security Token stimmt nicht &uuml;berein! Bitte &uuml;berpr&uuml;fe deine Eingabe! <br> <a href="?site=AddNews">zur&uuml;ck</a>');
?>

<div class="whereAmI">
    NEWS
</div>

<div class="PostTitle">
  NEWS
</div>

<div class="PostPost">
	<?php 
		echo($message) . '<p>&nbsp;</p>';
		echo($twitterMessage); 

	?>
</div>