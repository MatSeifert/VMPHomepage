<?php

	// Daten aus dem Formular holen und in Variablen zwischenspeichern
	$title 		= $_POST['NewsTitle'];
	$content 	= $_POST['NewsContent'];
	$author 	= $_POST['NewsAuthor'];
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
	$fp = fopen($filepath, 'w'); 
		fputs($fp, '<xml version="1.0" encoding="UTF-8">');
		fputs($fp, '<news>');
		fputs($fp, '<title>' . $title . '</title>'); 
		fputs($fp, '<content>' . $content . '</content>');
		fputs($fp, '<author>' . $author . '</author>');
		fputs($fp, '<game>' . $game . '</game>');
		fputs($fp, '<source>' . $source . '</source>');
		fputs($fp, '<year>' . $year . '</year>');
		fputs($fp, '<month>' . $month . '</month>');
		fputs($fp, '<day>' . $day . '</day>');
		fputs($fp, '<time>' . $time . '</time>');
		fputs($fp, '</news>');
	fclose($fp);

	// Bestätigung, dass News gespeichert wurde
	echo ('News wurde erfolgreich gepostet! <br> <a href="?site=start">Zur Startseite</a>')
?>