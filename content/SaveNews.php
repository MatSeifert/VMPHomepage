<?php
	// Funktion zum Posten der News auf Facebook
	function PostOnFacebook($content) {
		 //facebook application configuration
	    $fbconfig['appid' ] = "Write app id here";
	    $fbconfig['secret'] = "Write secrete here";
	    try{
	        include_once ('.\facebook-php-sdk-master\src\facebook.php');
	    }
	    catch(Exception $o){
	        print_r($o);
	    }
	    $facebook = new Facebook(array(
	      'appId'  => $fbconfig['351141688344396'],
	      'secret' => $fbconfig['73d9cbc141d02aebeb5d3e6d544e43d5'],
	      'cookie' => true,
	    ));
	 
	    $user       = $facebook->getUser();
	    $loginUrl   = $facebook->getLoginUrl(
	            array(
	                'scope'         => 'email'
	            )
	    );
	 
	    if ($user) {
	      try {
	        $user_profile = $facebook->api('/me');
	        $user_friends = $facebook->api('/me/friends');
	        $access_token = $facebook->getAccessToken();
	      } catch (FacebookApiException $e) {
	       // d($e);
	        $user = null;
	      }
	    }
	    if (!$user) {
	        echo "<script type='text/javascript'>top.location.href = '$loginUrl';</script>";
	        exit;
	    }
		 
		 $args = array(
		    'message'   => 'My First Fbapplication With PHP script!',
		    'link'      => 'http://www.c-sharpcorner.com/',
		    'caption'   => 'Latest toorials!'
		);
		$post_id = $facebook->api("/me/feed", "post", $args);
		?>		
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

		// Post all the shit on Facebook, Twitter and Google Plus
		PostOnFacebook($content);
		//PostOnTwitter();
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
	<?php echo($message); ?>
</div>