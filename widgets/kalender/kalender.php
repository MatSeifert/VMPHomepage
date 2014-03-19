<?php

	/* TODO
	 * XML Datei für Termine entwickeln
	 * Spielename als Variable
	 * Bessere Wartbarkeit des Widgets
	 * Wochennummer mit W, %2 bei Minecraft
	 */

	function Anno2070($date) {
		echo ("	<p>&nbsp;</p> <div class=\"agendaEntry\"> 
					<img src=\"images/widgets/kalender/anno2070.png\" alt=\"Anno 2070\" class=\"left\"> 
					&nbsp; ANNO 2070 <br /> 
					&nbsp; <span class=\"date\">$date - 20:15 Uhr</span>
				</div>");
	}
	
	function Battlefield3($date) {
		echo ("	<p>&nbsp;</p> <div class=\"agendaEntry\"> 
					<img src=\"images/widgets/kalender/battlefield3.png\" alt=\"BF3\" class=\"left\"> 
					&nbsp; BATTLEFIELD 3 <br /> 
					&nbsp; <span class=\"date\">$date - 20:15 Uhr</span>
				</div>");
	}
	
	function Besprechung($date) {
		echo ("	<p>&nbsp;</p> <div class=\"agendaEntry\"> 
					<img src=\"images/widgets/kalender/besprechung.png\" alt=\"besprechung\" class=\"left\"> 
					&nbsp; BESPRECHUNG<br /> 
					&nbsp; <span class=\"date\">$date - 20:15 Uhr</span>
				</div>");		
	}

	function WeeklyAppointment () {

		$wday = date("w");		// Wochentagsbestimmung
			
		switch ($wday) {
			case 0:		// Sunday
				$anno2070Date =  date('d.m.', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1));
				Anno2070($anno2070Date);

				$battlefield3Date = date('d.m.', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 4));
				Battlefield3($battlefield3Date);
				break;
			
			case 1:		// Monday
				$anno2070Date =  "Heute";
				Anno2070($anno2070Date);			
	
				$battlefield3Date = date('d.m.', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 3));
				Battlefield3($battlefield3Date);
				break;
				
			case 2:		// Tuesday
				$battlefield3Date = date('d.m.', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 2));
				Battlefield3($battlefield3Date);
				
				$anno2070Date =  date('d.m.', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 6));
				Anno2070($anno2070Date);
				break;

			case 3:		// Wednesday
				$battlefield3Date = date('d.m.', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1));
				Battlefield3($battlefield3Date);
				
				$anno2070Date =  date('d.m.', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 5));
				Anno2070($anno2070Date);
				break;
				
			case 4:		// Thursday
				$battlefield3Date = "Heute";
				Battlefield3($battlefield3Date);
				
				$anno2070Date =  date('d.m.', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 4));
				Anno2070($anno2070Date);
				break;
				
			case 5:		// Friday
				$anno2070Date =  date('d.m.', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 3));
				Anno2070($anno2070Date);

				$battlefield3Date = date('d.m.', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 6));
				Battlefield3($battlefield3Date);
				break;
				
			case 6:		// Saturday
				$anno2070Date =  date('d.m.', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 2));
				Anno2070($anno2070Date);

				$battlefield3Date = date('d.m.', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 5));
				Battlefield3($battlefield3Date);
				break;
		}
	}

	function MonthlyAppointment() {
	
		$mDay = date("j");
		
		if ($mDay < 8) {
			$wday = date("w");		// Wochentagsbestimmung
			
			switch ($wday) {
				case 0:		// Sunday
					$besprechungDate =  date('d.m.', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1));
					Besprechung($besprechungDate);
					break;
				
				case 1:		// Monday
					$besprechungDate =  "Heute";
					Besprechung($besprechungDate);			
					break;
					
				case 2:		// Tuesday
					$besprechungDate =  date('d.m.', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 6));
					Besprechung($besprechungDate);
					break;

				case 3:		// Wednesday
					$besprechungDate =  date('d.m.', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 5));
					Besprechung($besprechungDate);
					break;
					
				case 4:		// Thursday
					$besprechungDate =  date('d.m.', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 4));
					Besprechung($besprechungDate);
					break;
					
				case 5:		// Friday
					$besprechungDate =  date('d.m.', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 3));
					Besprechung($besprechungDate);
					break;
					
				case 6:		// Saturday
					$besprechungDate =  date('d.m.', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 2));
					Besprechung($besprechungDate);
					break;
			}			
		}
	}
	
	function Display() {
	
		WeeklyAppointment();
		MonthlyAppointment();
	
	}
	
	Display();
?>