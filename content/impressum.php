<?php
	// Get Debug Info from ini File
	$ini_array = parse_ini_file("global.ini", true);

	if ($ini_array['Debug Properties']['debug'] == 1)
	{
		$beta = "<i>BETA</i>";
	} else $beta = "";
?>

<div class="impressum">
	VERSION <a class="navigationS" href="index.php?site=changelog" alt="changelog">4.3 <?php echo $beta ?></a> <br />
	&copy; 2008 - <?php echo date("Y"); ?> DESIGN &amp; CODE BY <br />
	<img src="images/person.png" alt="Person" /> Matthias Seifert <br />
	<img src="images/disc.png" alt="Disclaimer"> <a class="navigationS" href="?site=disclaimer" alt="Disclaimer">Haftungsausschluss</a> <br>
	<img src="images/person.png" alt="Person" /> <a class="navigationS" href="?site=authority" alt="Authority">Impressum</a>
</div>
