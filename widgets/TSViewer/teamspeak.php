<p>&nbsp;</p>

<?php
	// Get Debug Info from ini File
	$ini_array = parse_ini_file("global.ini", true);

	if ($ini_array['Debug Properties']['debug'] == 1)
	{
		echo "<i>TS Viewer disabled in Debug Mode</i>";
	} else {
		require_once("../../vendor/sebastien/tsstatus/tsstatus.php");
		$tsstatus = new TSStatus("ts.vmp-clan.de", 10011, 1);
		$tsstatus->imagePath = "vendor/sebastien/tsstatus/img/";
		$tsstatus->showNicknameBox = false;
		$tsstatus->showPasswordBox = false;
		$tsstatus->decodeUTF8 = true;
		$tsstatus->timeout = 2;

		echo $tsstatus->render();
	}
?>

<p>&nbsp;</p>
