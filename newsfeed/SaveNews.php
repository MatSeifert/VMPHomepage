<?php
	
	// Überprüfung des Membertokens zur Botsicherheit
	function TokenAuth($AuthCode) {
		$verification;

		if ($AuthCode == "J5KJU8BL") {
			$verification = True;
		} 
		else $verification = False;

		return $verification;
	}

	function GetName($AuthToken) {
		switch ($AuthToken){
			case "J5KJU8BL": return "Behemoth";
			break;
		}
	}

	// Daten aus dem Formular holen und in Variablen zwischenspeichern
	$title 		= $_POST['NewsTitle'];
	$content 	= $_POST['NewsContent'];
	$token 	= $_POST['NewsToken'];
	$game 		= $_POST['NewsGame'];
	$source 	= $_POST['NewsSource'];

	// Datumsvariablen initialisieren
	$year 		= date('Y');
	$month		= date('m');
	$day		= date('d');
	$longMonth 	= date('M');

	$time 	= date('H:i');

	// Dateipfad- & name festlegen
	$titleFilename = str_replace(' ', '', $title);
	$filepath = 'archiv/' . $year . '/' . $longMonth . '/' . $year . '-' . $month . '-' .  $day . '_' . $titleFilename . '.xml';

	// XML Datei anlegen und speichern
	if (TokenAuth($token)) {
		$fp = fopen($filepath, 'w'); 
			fputs($fp, '<xml version="1.0" encoding="UTF-8">');
			fputs($fp, '<news>');
			fputs($fp, '<title>' . $title . '</title>'); 
			fputs($fp, '<content>' . $content . '</content>');
			fputs($fp, '<author>' . GetName($token) . '</author>');
			fputs($fp, '<game>' . $game . '</game>');
			fputs($fp, '<source>' . $source . '</source>');
			fputs($fp, '<year>' . $year . '</year>');
			fputs($fp, '<month>' . $month . '</month>');
			fputs($fp, '<day>' . $day . '</day>');
			fputs($fp, '<time>' . $time . '</time>');
			fputs($fp, '</news>');
		fclose($fp);

		echo ('News wurde erfolgreich gepostet! <br> <a href="?site=start">Zur Startseite</a>');
	}

	else echo ('Das Security Token stimmt nicht! Bitte &uuml;berpr&uuml;fe deine Eingabe!');
?>