<?php
	// Funktion zum Berechnen des Alters
	
	function alter($jahr, $monat, $tag)
	{
		$alter = (date('Y') - $jahr) - intval(date('md') < sprintf('%02d%02d' , $monat , $tag ));
		
		echo($alter);
	}
	
	function activity($bool) {
		if ($bool == 1)
		{
			echo('Aktiv');
		}
		else echo('<span class="inactive">Inaktiv</span>');
	}
	
  // Funktion zum Berechnen der "Dienstzeit"

	function dienstzeit($since) {
		$jahre = (date('Y') - $since);
		echo($jahre);
	}

  // Verarbeiten der Daten aus dem XML File

  function member () {
    $xmlfile='xml/member.xml';
    $memberXml = simplexml_load_file($xmlfile);

    // print_r ($memberXml);

    echo '<div class="PostTitle">Member</div><br />';    // Überschrift
    echo '<table class="memberlist">' .                  // Tabellenkopf
            '<thead>' .
              '<th>Land</th>' .
              '<th> <span class="number"> &nbsp; </span> </th>' .
              '<th>Nickname</th>' .
              '<th colspan="2">Rang</th>' .
              '<th> &nbsp; </th>' .
              '<th> <span class="number"> Alter </span> </th>' .
              '<th> <span class="number"> Dienstjahre </span> </th>' .
            '</tr>' .
            '<thead>' .
              '<td colspan="8" class="normal">&nbsp;</td>' .
              '</tr></table>';
    foreach ($memberXml->member as $member) {
      echo '<img src="images/flag_' . $member->country . '.png" alt="Germany">';
      echo $member->sex;
      echo $member->nickname;
      echo $member->rank;
      foreach ($member->activity->attributes() as $name => $att) {
        echo $att;
      }
      foreach ($member->birthday->attributes() as $name => $bday) {
        echo $bday;
      }
    }

  }

  member();
?>

<!-- LETZTE AKTUALISIERUNG: 12. August 2013-->