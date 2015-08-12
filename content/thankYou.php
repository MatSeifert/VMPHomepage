<?php
	// Config
	$receiver = "vmp.clan2008@gmail.com, matthe.seifert@gmail.com";
	$subject = "Neue Memberanfrage";
	$body = "Neue Memberanfrage von " .
			$_POST['Name'] .
			" (" . $_POST['Nickname'] . ") \n\n" .
			"Steamname: " . $_POST['Steamname'] .
			"\nEmail: " . $_POST['E-Mail'] .
			"\nAlter: " . $_POST['Alter'] .
			"\n\nWarum passt du zu uns?\n" . $_POST['Bemerkungen'];
	$sender = "memberscout@vmp-clan.de";

	$header = 'From: memberscout@vmp-clan.de' . "\r\n" .
		      'Reply-To: memberscout@vmp-clan.de' . "\r\n" .
		      'X-Mailer: PHP/' . phpversion();

	mail($receiver, $subject, $body, $header);

	$message =
		"Vielen Dank für deine Bewerbung! Wir werden uns innerhalb von 24h über Steam oder Email bei dir melden. <br><br>
		<span class=\"smallHeadline\"><a href=\"?site=start\">Hier</a> geht es wieder zur Startseite.</span><br><br>
		Zur Überprüfung siehst Du hier noch einmal die an uns übermittelten Daten:<br><br>
		<div style=\"float: right; padding: 0 0 0 20px; width: 300px\">"
			. $_POST['Name'] . "<br>"
			. $_POST['Nickname'] . "<br>"
			. $_POST['Steamname'] . "<br>"
			. $_POST['E-Mail'] . "<br>"
			. $_POST['Alter'] . "<br>"
			. $_POST['Bemerkungen'] . "<br><br><br>
		</div>
		<div style=\"float: left; width: 150px;\">
			NAME: <br>
			NICKNAME: <br>
			STEAMNAME: <br>
			EMAIL ADRESSE: <br>
			ALTER: <br>
			WARUM PASST DU ZU UNS?
		</div>";
?>


<div class="whereAmI">
    <div class="whereAmICircle">
		<i class="fa fa-thumbs-up"></i>
	</div>
</div>

<div class="PostTitle">
  VIELEN DANK!
</div>

<div class="PostPost">
	<?php echo $message ?>
</div>
