<?php
	require("phpmailer/PHPMailerAutoload.php");

	$mail = new PHPMailer;

	//// ABSENDER ////
	$mail->isSMTP();

	$mail->SMTPDebug = 2;
	$mail->Debugoutput = 'html';
	$mail->Host = 'smtp.googlemail.com';
	$mail->Port = 465;
	$mail->SMTPSecure = 'ssl';
	$mail->SMTPAuth = true;
	$mail->Username = "vmp.clan2008";
	// FIXME: Password verschlüsselt aus der Db oder einer Datei ziehen
	$mail->Password = "VMPClan2008.#g00gle";
	$mail->setFrom('vmp.clan2008@gmail.com', 'VMP Clan');

	//// EMPFÄNGER & INHALT////
	$mail->addAddress('matthe.seifert@gmail.com');
	$mail->addAddress('lehmrob@gmail.com');

	$mail->Subject = "Neue Memberanfrage";
	$mail->Body = 	"Neue Memberanfrage von " .
					$_POST['Name'] .
					" (" . $_POST['Nickname'] . ") \n\n" .
					"Steamname: " . $_POST['Steamname'] .
					"\nEmail: " . $_POST['E-Mail'] .
					"\nAlter: " . $_POST['Alter'] .
					"\n\nWarum passt du zu uns?\n" . $_POST['Bemerkungen'];

	//// SENDEN ////
	if (!$mail->send()) {
    	$message = "Beim Senden der Mail ist ein Fehler aufgetreten. Bitte versuche es später erneut. Sollte der Fehler auch weiterhin " .
		"auftreten, wende dich bitte an <a href=\"mailto:vmp.clan2008@gmail.com\">den Webmaster</a> und füge die folgende Fehlermeldung hinzu: <br><br>"
		. $mail->ErrorInfo;
	} else {
    	$message = 'Vielen Dank für deine Anfrage, wir werden uns innerhalb von 24 Stunden mit dir in Verbindung setzen!<br><br>
		<a href="?site=start" alt="Startseite">Zurück zur Startseite</a>';
	}
?>


<div class="whereAmI">
    VIELEN DANK!
</div>

<div class="PostTitle">
  VIELEN DANK!
</div>

<div class="PostPost">
	<?php echo $message ?>
</div>
