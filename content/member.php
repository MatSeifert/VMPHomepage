<?php
	// Funktion zum Berechnen des Alters
	
	function alter($jahr, $monat, $tag)
	{
		$alter = (date('Y') - $jahr) - intval(date('md') < sprintf('%02d%02d' , $monat , $tag ));
		
		echo($alter);
	}
	
	function activity($bool)
	{
		if ($bool == 1)
		{
			echo('Aktiv');
		}
		else echo('<span class="inactive">Inaktiv</span>');
	}
	
  // Funktion zum Berechnen der "Dienstzeit"

	function dienstzeit($since)
	{
		$jahre = (date('Y') - $since);
		echo($jahre);
	}
?>


<div class="PostTitle">
  Member
</div>
<br />
<table class="memberlist">
 <tr>
  <th>Land</th>
  <th> <span class="number"> &nbsp; </span> </th>
  <th>Nickname</th>
  <th colspan="2">Rang</th>
  <th> &nbsp; </th>
  <th> <span class="number"> Alter </span> </th>
  <th> <span class="number"> Dienstjahre </span> </th>
 </tr>
<tr>
 <td colspan="8" class="normal">&nbsp;</td>
</tr>
<!-- BEHEMOTH /-->
 <tr>
  <td class="normal"><img src="images/german_small.png" alt="Germany"></td>
  <td class="normal"> <span class="number"> <img src="images/male.png" alt="male"> </span> </td>  
  <td class="normal"><b>[VMP] Behemoth</b></td>
  <td class="normal"><img src="images/memberliste_admin.png" alt="Admin"></td>  
  <td class="normal">Admin</td>
  <td class="normal"><?php activity(1); ?></td>
  <td class="normal"><span class="number"> <?php alter(1991, 3, 14); ?> </span></td>
  <td class="normal"><span class="number"> <?php dienstzeit(2008); ?> </span></td>
 </tr>
<!-- CHIMERA /-->
 <tr>
  <td class="normal"><img src="images/german_small.png" alt="Germany"></td>
  <td class="normal"> <span class="number"> <img src="images/male.png" alt="male"> </span> </td>  
  <td class="normal"><b>[VMP] Chimera</b></td>
  <td class="normal"><img src="images/memberliste_admin.png" alt="Admin"></td>  
  <td class="normal">Admin</td>
  <td class="normal"><?php activity(1); ?></td>
  <td class="normal"> <span class="number"> <?php alter(1989, 7, 10); ?> </span> </td>
  <td class="normal"> <span class="number"> <?php dienstzeit(2010); ?> </span> </td>
 </tr>
<!-- KAKADU /-->
 <tr>
  <td class="bottom"><img src="images/german_small.png" alt="Germany"></td>
  <td class="bottom"> <span class="number"> <img src="images/male.png" alt="male"> </span> </td>  
  <td class="bottom"><b>[VMP] Kakadu</b></td>
  <td class="bottom"><img src="images/memberliste_admin.png" alt="Admin"></td>  
  <td class="bottom">Admin</td>
  <td class="bottom"><?php activity(1); ?></td>
  <td class="bottom"> <span class="number"> <?php alter(1990, 12, 1); ?> </span> </td>
  <td class="bottom"> <span class="number"> <?php dienstzeit(2010); ?> </span> </td>
 </tr>
<!-- BLACK ANGEL /-->
 <tr>
  <td class="bottom"><img src="images/german_small.png" alt="Germany"></td>
  <td class="bottom"> <span class="number"> <img src="images/male.png" alt="male"> </span> </td>  
  <td class="bottom"><b>[VMP] Black Angel</b></td>
  <td class="bottom"><img src="images/memberliste_admin.png" alt="Admin"></td>  
  <td class="bottom">Vizeadmin</td>
  <td class="bottom"><?php activity(1); ?></td>
  <td class="bottom"> <span class="number"> <?php alter(1992, 2, 24); ?> </span> </td>
  <td class="bottom"> <span class="number"> <?php dienstzeit(2010); ?> </span> </td>
 </tr>

<!-- LEVIATHAN /-->
 <tr>
  <td class="normal"><img src="images/german_small.png" alt="Germany"></td>
  <td class="normal"> <span class="number"> <img src="images/male.png" alt="male"> </span> </td>  
  <td class="normal"><b>[VMP] Leviathan</b></td>
  <td class="normal"><img src="images/memberliste_founder.png" alt="Gründer"></td>  
  <td class="normal">Gr&uuml;nder</td>
  <td class="normal"><?php activity(0); ?></td>
  <td class="normal"> <span class="number"> <?php alter(1993, 1, 7); ?> </span> </td>
  <td class="normal"> <span class="number"> <?php dienstzeit(2008); ?> </span> </td>
 </tr>
<!-- VICKY /-->
 <tr>
  <td class="bottom"><img src="images/german_small.png" alt="Germany"></td>
  <td class="bottom"> <span class="number"> <img src="images/female.png" alt="male"> </span> </td>  
  <td class="bottom"><b>[VMP] Vicky</b></td>
  <td class="bottom"><img src="images/memberliste_founder.png" alt="Gründer"></td>  
  <td class="bottom">Gr&uuml;nder</td>
  <td class="bottom"><?php activity(0); ?></td>
  <td class="bottom"> <span class="number"> &nbsp; </span> </td>
  <td class="bottom"> <span class="number"> <?php dienstzeit(2008); ?> </span> </td>
 </tr>
<!-- LANGY /-->
 <tr>
  <td class="normal"><img src="images/german_small.png" alt="Germany"></td>
  <td class="normal"> <span class="number"> <img src="images/male.png" alt="male"> </span> </td>  
  <td class="normal"><b>[VMP] Langy</b></td>
  <td class="normal"><img src="images/memberliste_member.png" alt="Member"></td>  
  <td class="normal">Member</td>
  <td class="normal"><?php activity(0); ?></td>
  <td class="normal"> <span class="number"> <?php alter(1990, 10, 18); ?> </span> </td>
  <td class="normal"> <span class="number"> <?php dienstzeit(2008); ?> </span> </td>
 </tr>
<!-- FALLEN ANGEL /-->
 <tr>
  <td class="normal"><img src="images/german_small.png" alt="Germany"></td>
  <td class="normal"> <span class="number"> <img src="images/male.png" alt="male"> </span> </td>  
  <td class="normal"><b>[VMP] Fallen Angel</b></td>
  <td class="normal"><img src="images/memberliste_member.png" alt="Member"></td>  
  <td class="normal">Member</td>
  <td class="normal"><?php activity(1); ?></td>
  <td class="normal"> <span class="number"> <?php alter(1991, 3, 17); ?> </span> </td>
  <td class="normal"> <span class="number"> <?php dienstzeit(2010); ?> </span> </td>
 </tr>
<!-- DEADMAN /-->
 <tr>
  <td class="normal"><img src="images/german_small.png" alt="Germany"></td>
  <td class="normal"> <span class="number"> <img src="images/male.png" alt="male"> </span> </td>  
  <td class="normal"><b>[VMP] Deadman</b></td>
  <td class="normal"><img src="images/memberliste_member.png" alt="Member"></td>  
  <td class="normal">Member</td>
  <td class="normal"><?php activity(0); ?></td>
  <td class="normal"> <span class="number"> <?php alter(1990, 6, 13); ?> </span> </td>
  <td class="normal"> <span class="number"> <?php dienstzeit(2010); ?> </span> </td>
 </tr>
<!-- RABBIT /-->
 <tr>
  <td class="normal"><img src="images/german_small.png" alt="Germany"></td>
  <td class="normal"> <span class="number"> <img src="images/male.png" alt="male"> </span> </td>  
  <td class="normal"><b>[VMP] Rabbit</b></td>
  <td class="normal"><img src="images/memberliste_member.png" alt="Member"></td>  
  <td class="normal">Member</td>
  <td class="normal"><?php activity(1); ?></td>
  <td class="normal"> <span class="number"> <?php alter(1992, 8, 18); ?> </span> </td>
  <td class="normal"> <span class="number"> <?php dienstzeit(2011); ?> </span> </td>
 </tr>
<!-- DUEBEL /-->
 <tr>
  <td class="normal"><img src="images/german_small.png" alt="Germany"></td>
  <td class="normal"> <span class="number"> <img src="images/male.png" alt="male"> </span> </td>  
  <td class="normal"><b>[VMP] Duebel</b></td>
  <td class="normal"><img src="images/memberliste_member.png" alt="Member"></td>  
  <td class="normal">Member</td>
  <td class="normal"><?php activity(1); ?></td>
  <td class="normal"> <span class="number"> <?php alter(1990, 4, 12); ?> </span> </td>
  <td class="normal"> <span class="number"> <?php dienstzeit(2011); ?> </span> </td>
 </tr>
<!-- LISA /-->
 <tr>
  <td class="normal"><img src="images/german_small.png" alt="Germany"></td>
  <td class="normal"> <span class="number"> <img src="images/female.png" alt="male"> </span> </td>  
  <td class="normal"><b>[VMP] Lisa</b></td>
  <td class="normal"><img src="images/memberliste_member.png" alt="Member"></td>  
  <td class="normal">Member</td>
  <td class="normal"><?php activity(1); ?></td>
  <td class="normal"> <span class="number"> <?php alter(1993, 7, 10); ?> </span> </td>
  <td class="normal"> <span class="number"> <?php dienstzeit(2012); ?> </span> </td>
 </tr>
<!-- PAINTEX /-->
 <tr>
  <td class="normal"><img src="images/german_small.png" alt="Germany"></td>
  <td class="normal"> <span class="number"> <img src="images/male.png" alt="male"> </span> </td>  
  <td class="normal"><b>[VMP] PaiNTeX</b></td>
  <td class="normal"><img src="images/memberliste_member.png" alt="Member"></td>  
  <td class="normal">Member</td>
  <td class="normal"><?php activity(1); ?></td>
  <td class="normal"> <span class="number"> <?php alter(1995, 3, 14); ?> </span> </td>
  <td class="normal"> <span class="number"> <?php dienstzeit(2012); ?> </span> </td>
 </tr>
<!-- HELLBOURNE /-->
 <tr>
  <td class="normal"><img src="images/german_small.png" alt="Germany"></td>
  <td class="normal"> <span class="number"> <img src="images/male.png" alt="male"> </span> </td>  
  <td class="normal"><b>[VMP] Hellbourne</b></td>
  <td class="normal"><img src="images/memberliste_member.png" alt="Member"></td>  
  <td class="normal">Member</td>
  <td class="normal"><?php activity(1); ?></td>
  <td class="normal"> <span class="number"> <?php alter(1991, 7, 30); ?> </span> </td>
  <td class="normal"> <span class="number"> <?php dienstzeit(2012); ?> </span> </td>
 </tr>
<!-- FOU /-->
 <tr>
  <td class="normal"><img src="images/german_small.png" alt="Germany"></td>
  <td class="normal"> <span class="number"> <img src="images/male.png" alt="male"> </span> </td>  
  <td class="normal"><b>[VMP] Fou</b></td>
  <td class="normal"><img src="images/memberliste_member.png" alt="Member"></td>  
  <td class="normal">Member</td>
  <td class="normal"><?php activity(1); ?></td>
  <td class="normal"> <span class="number"> <?php alter(1989, 4, 3); ?> </span> </td>
  <td class="normal"> <span class="number"> <?php dienstzeit(2013); ?> </span> </td>
 </tr>
<!-- PATOYZ /-->
 <tr>
  <td class="normal"><img src="images/german_small.png" alt="Germany"></td>
  <td class="normal"> <span class="number"> <img src="images/male.png" alt="male"> </span> </td>  
  <td class="normal"><b>[VMP] Patoyz</b></td>
  <td class="normal"><img src="images/memberliste_member.png" alt="Member"></td>  
  <td class="normal">Member</td>
  <td class="normal"><?php activity(1); ?></td>
  <td class="normal"> <span class="number"> <?php alter(1993, 1, 21); ?> </span> </td>
  <td class="normal"> <span class="number"> <?php dienstzeit(2013); ?> </span> </td>
 </tr>
<!-- YARRICK21 /-->
 <tr>
  <td class="normal"><img src="images/german_small.png" alt="Germany"></td>
  <td class="normal"> <span class="number"> <img src="images/male.png" alt="male"> </span> </td>  
  <td class="normal"><b>[VMP] Yarrick21</b></td>
  <td class="normal"><img src="images/memberliste_member.png" alt="Member"></td>  
  <td class="normal">Member</td>
  <td class="normal"><?php activity(1); ?></td>
  <td class="normal"> <span class="number"> &nbsp; </span> </td>
  <td class="normal"> <span class="number"> <?php dienstzeit(2013); ?> </span> </td>
 </tr>
<!--  PRINCESS  /-->
 <tr>
  <td class="normal"><img src="images/german_small.png" alt="Germany"></td>
  <td class="normal"> <span class="number"> <img src="images/female.png" alt="female"> </span> </td>  
  <td class="normal"><b>[VMP] Princess</b></td>
  <td class="normal"><img src="images/memberliste_member.png" alt="Member"></td>  
  <td class="normal">Member</td>
  <td class="normal"><?php activity(1); ?></td>
  <td class="normal"> <span class="number"> &nbsp; </span> </td>
  <td class="normal"> <span class="number"> <?php dienstzeit(2013); ?> </span> </td>
 </tr>

</table>
<p>&nbsp;</p>

<!-- LETZTE AKTUALISIERUNG: 12. August 2013-->