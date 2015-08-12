<?php
	/* Hier wird aus dem gegebenen Snippet oder dem Newsinhalt sowie dem Link zur News
	 * ein Post für die Facebookseite des VMP Clans erstellt und auf der Wall veröffentlicht
	 */
	// function PostOnFacebook($content, $link) {

	// }

	/* Hier passiert die Magie, die die News auch auf Twitter veröffentlicht. Wurde
	 * vom Autor ein Newssnippet eingetragen, wird dieses verwendet, andernfalls
	 * wird einfach der Newsinhalt gekürzt.
	 */
	function PostOnTwitter($content, $link) {
		// require codebird (php Library für die Twitter API)
		require_once('../vendor/jublonet/codebird-php/src/codebird.php');

		// Codebird initialisieren, und auf Twitter einloggen
		\Codebird\Codebird::setConsumerKey("zAMCKSyNQ3NTq8YuGaXiJneWn", "It9Nc2zGuWtuFztBzcXOzsWgk68KLFmRRRhydmpTq9PCdL5xwG");
		$cb = \Codebird\Codebird::getInstance();
		$cb->setToken("244468649-ZGCSmULXQPiDlc92Fy2IPjAMPMloiROuPNpnFV0n", "bQbB1BucBt5KZlc9ySIzZHF1pVdh2WmguUdFuIE5XerRf");

		// Tweeten der News inklusive Backlink
		$params = array(
		  'status' => substr($content, 0, 110) . " " . $link
		);
		$reply = $cb->statuses_update($params);
	}

	/* Hier wird der recht lange Link auf die News auf der Clanseite mithilfe
	 * des Lik Shorteners ow.ly gekürzt. Dadurch bleibt mehr Platz für den
	 * eigentlichen Tweet, und es sieht weniger russisch aus
	 */
	function shortenLink($url) {
		require_once('../vendor/invokemedia/owly-api-php/OwlyApi.php');
		$owly = OwlyApi::factory( array('key' => 's4Zm5Rxkm99z6CWEF9ikm') );

		try {
			$shortenedUrl = $owly->shorten($url);
		} catch(Exception $e) {
			echo 'Fehler beim kürzen des Links (Error in ow.ly API):' . $e->getMessage() . "<br />";
			$url = "";
		}

		return $shortenedUrl;
	}

	/* Direkt nachdem die News gepostet wird brauchen wir die URL, da diese auch aus der ID besteht,
	 * die aber erst hier festgelegt wird (AUTO_INCREMENT Spalte in der DB), wird die News anhand
	 * des Titels identifiziert. Nicht optimal, falls mal eine News einen doppelten Titel hat, hilft
	 * momentan aber alles nix. Funktioniert, also gut is!
	 */
	function GetLinkWithID() {

		$database=mysqli_connect("localhost","homepage","yTaYq6Mn*PTY=~%P8oQ,","webseite");					// später die Adresse der DB auf dem Server
		// Check connection
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$result = mysqli_query($database,'SELECT id FROM articles ORDER BY id DESC LIMIT 1');

		while($row = mysqli_fetch_array($result)) {
		   $link = 'vmp-clan.de/?site=read&id=' . $row['id'];
		}
		mysqli_close($database);

		$shortLink = shortenLink($link);

		return $shortLink;
	}

	/* Zur sicherstellung, dass keine Bots die Seite vollspammen, gibt es ein Sicherheitstoken, anhand
	 * dessen auch gleich identifiziert werden kann, wer die News geschrieben hat. Stimmt das Token nicht
	 * überein, wird die News nicht angenommen.
	 */
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

	/* Wie oben beschrieben wird hier anhand des mitgelieferten Sicherheitstokens bestimmt,
	 * von wem die eingereichte News stammt.
	 */
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
	} else $source = $_POST['NewsSource'];

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

		$sql="INSERT INTO articles (articleRead, date, timestamp, headline, content, author, tags, game, source)
		VALUES (0, now(), now(), '$title', '$content', '$author', '$tags', '$game', '$source')";

		if (!mysqli_query($con,$sql)) {
		  die('Error: ' . mysqli_error($con));
		}
		$message = 'Die News wurde erfolgreich veröffentlicht! <a href="../index.php?site=start">Zur Startseite</a>';

		mysqli_close($con);

		// Define Link and shorten it for SEO-Stuff
		$newsLink = GetLinkWithID();

		// Define the Social Media Snippet (Selfmade or generated)
		if ($_POST['SocialMediaSnippet'] == null)
		{
			$snippet = $content;
		} else $snippet = $_POST['SocialMediaSnippet'];

		// Post all the shit on Facebook, Twitter and Google Plus
		// Post it on Twitter
		if ($_POST['twitter'] == 'twitter')
		{
			PostOnTwitter(utf8_encode($snippet), $newsLink);
			$finalTweet = $snippet . ' <a href="' . $newsLink . '" alt="tweet" target="_blank">' . $newsLink . '</a>';
			$twitterMessage = "Super, dass du die News auch bei Twitter teilst, und uns damit hilfst bekannter zu werden. Dein Tweet wird folgendermaßen aussehen:<br /><br />";
		} else $twitterMessage = "News wurde nicht getweetet.";

		// Post it on Facebook
		// if ($_POST['facebook'] == 'facebook')
		// {
		// 	PostOnFacebook(utf8_encode($snippet), $newsLink);
		// }

		//PostOnGooglePlus();
	}

	else $message = ('Das Security Token stimmt nicht &uuml;berein! Bitte &uuml;berpr&uuml;fe deine Eingabe! <br> Nutze die Zurück Funktion des Browsers, um deine Eingabe zu korrigieren!');
?>

<div class="whereAmI">
    <div class="whereAmICircle">
		<i class="fa fa-newspaper-o"></i>
	</div>
</div>

<div class="PostTitle">
  NEWS
</div>

<div class="PostPost">
	<?php
		echo '<div class="smallHeadline">Vielen Dank</div>';
		echo($message) . '<p>&nbsp;</p>';
		echo '<div class="smallHeadline">Social Media</div>';
		echo($twitterMessage);
		echo '<b>' . (utf8_encode($finalTweet)) . '</b>';
	?>
</div>
