<?php
	// Funktion zum Berechnen des Alters

	function alter($jahr, $monat, $tag)
	{
		$alter = (date('Y') - $jahr) - intval(date('md') < sprintf('%02d%02d' , $monat , $tag ));

		echo '<td class="normal mobileHidden"><span class="number">' . $alter . '</span></td>';
	}

  // Funktion zum Berechnen der "Dienstzeit"

	function dienstzeit($since) {
		$jahre = (date('Y') - $since);
		if ($jahre == 1) {
			echo '<td class="normal"><span class="number">' . $jahre . ' Jahr</span></td>';
		}
		else if ($jahre == 0){
			echo '<td class="normal"><span class="number">Diesem Jahr</span></td>';
		}
		else echo  '<td class="normal"><span class="number">' . $jahre . ' Jahren</span></td>';
	}

  // Verarbeiten der Daten aus dem XML File

  function member () {
    $xmlfile='xml/member.xml';
    $memberXml = simplexml_load_file($xmlfile);

    echo '<div class="whereAmI">
			    <div class="whereAmICircle">
					<i class="fa fa-users"></i>
				</div>
			</div>';           // Überschrift für mobile Seite

    echo '<div class="PostTitle">MEMBER
            <span class="JoinUs">
              <a href="?site=joinus" class="tooltips">
                +
                <span>Mitglied werden</span>
              </a>
            </span>
          </div>
          <br>
          <p>&nbsp;</p>';
    echo '<table class="memberlist">' .                  // Tabellenkopf
            '<tr>' .
              '<td>LAND</td>' .
              '<td class="mobileHidden"> <span class="number"> &nbsp; </span> </td>' .
              '<td>NICKNAME</td>' .
              '<td>RANG</td>' .
              '<td class="mobileHidden"> &nbsp; </td>' .
              '<td class="mobileHidden"> <span class="number"> ALTER </span> </td>' .
              '<td> <span class="number"> DABEI SEIT ... </span> </td>' .
            '</tr>' .
            '<tr>' .
              '<td colspan="8" class="normal">&nbsp;</td>' .
            '</tr>';
    foreach ($memberXml->member as $member) {
      echo '<tr><td class="normal"><img src="images/flag_' . $member->country . '.png" alt="Germany"></td>';
      echo '<td class="normal mobileHidden"><img src="images/' . $member->sex . '.png" alt="Sex"></td>';
      echo '<td class="normal">' . $member->nickname . '</td>';
      echo '<td class="normal">' . $member->rank . '</td>';

      if ($member->activity['value'] == 'aktiv') {
      	 echo '<td class="normal mobileHidden">Aktiv</td>';
      }
      else echo '<td class="normal mobileHidden"><span class="inactive">inaktiv</span></td>';
      // echo '<td>' . $member->activity['value'] . '</td>';

      if(property_exists($member, 'birthday') && $member->birthday) {
	      $day = $member->birthday['day'];
	      $month = $member->birthday['month'];
	      $year = $member->birthday['year'];
	      alter($year, $month, $day);
  	  }
  	  else echo '<td class="normal mobileHidden">&nbsp;</td>';

        $RecrYr = $member->recruited['in'];
        dienstzeit($RecrYr);
    }

    echo '</tr></table><p>&nbsp;</p>';
  }

  member();
?>

<!-- LETZTE AKTUALISIERUNG: 12. August 2013-->
