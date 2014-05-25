<?php

/**
 * Konfiguration 
 *
 * Bitte passen Sie die folgenden Werte an, bevor Sie das Script benutzen!
 * 
 * Das Skript bitte in UTF-8 abspeichern (ohne BOM).
 */
 
// An welche Adresse sollen die Mails gesendet werden?
$zieladresse = 'matthe.seifert@gmail.com';

// Welche Adresse soll als Absender angegeben werden?
// (Manche Hoster lassen diese Angabe vor dem Versenden der Mail ueberschreiben)
$absenderadresse = 'recruitment@vmp-clan.de';

// Welcher Absendername soll verwendet werden?
$absendername = 'VMP Recruitmentservice';

// Welchen Betreff sollen die Mails erhalten?
$betreff = 'Neue Member Anfrage auf www.vmp.clan.de';

// Zu welcher Seite soll als "Danke-Seite" weitergeleitet werden?
// Wichtig: Sie muessen hier eine gueltige HTTP-Adresse angeben!
$urlDankeSeite = '?site=thankyou';

// Welche(s) Zeichen soll(en) zwischen dem Feldnamen und dem angegebenen Wert stehen?
$trenner = ":\t"; // Doppelpunkt + Tabulator

/**
 * Ende Konfiguration
 */

if ($_SERVER['REQUEST_METHOD'] === "POST") {

  $header = array();
  $header[] = "From: ".mb_encode_mimeheader($absendername, "utf-8", "Q")." <".$absenderadresse.">";
  $header[] = "MIME-Version: 1.0";
  $header[] = "Content-type: text/plain; charset=utf-8";
  $header[] = "Content-transfer-encoding: 8bit";
  
    $mailtext = "";

    foreach ($_POST as $name => $wert) {
        if (is_array($wert)) {
        foreach ($wert as $einzelwert) {
          $mailtext .= $name.$trenner.$einzelwert."\n";
            }
        } else {
            $mailtext .= $name.$trenner.$wert."\n";
        }
    }

    mail(
      $zieladresse, 
      mb_encode_mimeheader($betreff, "utf-8", "Q"), 
      $mailtext,
      implode("\n", $header)
    ) or die("Die Mail konnte nicht versendet werden.");
    header("Location: $urlDankeSeite");
    exit;
}

header("Content-type: text/html; charset=utf-8");

?>
<div class="whereAmI">
    JOIN US
</div>

<div class="PostTitle">
  JOIN US
</div>

<div class="PostPost">

    <form action="?site=thankyou" method="post">
        <!-- Formularfelder -->
            <br>
            <input type="text" name="Name" placeholder="Max Mustermann" class="NewsTitle" required/>
            <br><br>
            <span class="tag">[VMP]</span><input type="text" name="Nickname" placeholder="Nickname" class="NewsTitleWithTag" required/>
            <br><br>
            <input type="text" name="E-Mail" placeholder="mailadresse@provider.tld" class="NewsTitle" required/>
            <br><br>
            <input type="number" name="Alter" placeholder="Alter" class="InputAge"/><span class="tag" required>Du musst mindestens 18 Jahre alt sein!</span>
            <br><br>
            <input type="checkbox" name="RegelnGelesen" value="regeln" class="DefaultFormCheckbox" required/>
                <span class="tag">&nbsp;Ich habe die <a href="?site=rules">Clanregeln</a> gelesen</span>
            <br><br>
            <textarea name="Bemerkungen" class="NewsContent" placeholder="Warum passt du zu uns?" required></textarea>
        <!-- Ende der Formularfelder -->

        <!-- Senden und Zurücksetzenbuttons -->
            <div class="NewsSubmit">
                <input type="Submit" name="" value="Anfrage senden" class="NewsSubmit">
                <input type="Reset" name="" value="Formular zurücksetzen" class="NewsSubmit">               
            </div>
        <!-- Ende der Buttons -->
    </form>

</div>