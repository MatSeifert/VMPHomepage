<?php
	require("phpmailer/class.phpmailer.php");

	$mail = new PHPMailer();

	//// ABSENDER ////
	$mail->From = "vmp.clan2008@gmail.com";
	$mail->FromName = "VMP Clan";

	$mail->IsSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465; // or 587
	$mail->SMTPAuth = true;
	$mail->Username = "vmp.clan2008";
	$mail->Password = "VMPClan2008.#g00gle";

	//// EMPFÄNGER & INHALT////
	$mail->AddAddress("matthe.seifert@gmail.com");
	$mail->AddAddress("lehmrob@gmail.com");

	$mail->Subject = "Neue Memberanfrage";
	$mail->Body = 	"Neue Memberanfrage von " . 
					$_POST['Name'] . 
					" (" . $_POST['Nickname'] . ") \n\n" .
					"Steamname: " . $_POST['Steamname'] .
					"\nEmail: " . $_POST['E-Mail'] .
					"\nAlter: " . $_POST['Alter'] .
					"\n\nWarum passt er zu uns?\n" . $_POST['Bemerkungen'];

	//// SENDEN UND ÜBERPRÜFEN ////
	if(!$mail->Send()) {
	     // Fehler beim Senden der Mail
		$message = $mail->ErrorInfo . "\n\nBeim Senden deiner Anfrage ist leider ein Fehler aufgetreten. Sollte das Problem auch weiterhin bestehen,
				   registriere dich bitte im Forum des VMP Clans, wir werden die Memberaufnahme dann darüber abwickeln."
	  }
	  else {
	     // Jawoll, die Bude läuft
	     $message = "Vielen Dank für deine Anfrage, wir werden uns innerhalb von 24 Stunden mit dir in Verbindung setzen!<br><br>
					<a href="?site=start" alt="Startseite">Zurück zur Startseite</a>";
	  }	
?>


<div class="whereAmI">
    JOIN US
</div>

<div class="PostTitle">
  JOIN US
</div>

<div class="PostPost">
	<?php echo($message); ?>
</div>