<?php
if ( $_GET['email'] <> "" )
{
    // und nun die Daten in eine Datei schreiben
    // Datei wird zum Schreiben geöffnet
    $handle = fopen ( "anfragen.txt", "w" );
 
    // schreiben des Inhaltes von email
    fwrite ( $handle, $_GET['email'] );
 
    // Trennzeichen einfügen, damit Auswertung möglich wird
    fwrite ( $handle, "|" );
 
    // schreiben des Inhalts von name
    fwrite ( $handle, $_GET['name'] );
 
    // Datei schließen
    fclose ( $handle );
 
    echo "Danke - Ihre Daten wurden speichert";
 
    // Datei wird nicht weiter ausgeführt
    exit;
}
?>