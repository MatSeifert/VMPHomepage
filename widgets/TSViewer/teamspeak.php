<p>&nbsp;</p>

<?php
	require_once("../../vendor/sebastien/tsstatus/tsstatus.php");
	$tsstatus = new TSStatus("ts.vmp-clan.de", 10011, 1);
	$tsstatus->imagePath = "vendor/sebastien/tsstatus/img/";
	$tsstatus->showNicknameBox = false;
	$tsstatus->showPasswordBox = false;
	$tsstatus->decodeUTF8 = true;
	$tsstatus->timeout = 2;

	echo $tsstatus->render();
?>

<p>&nbsp;</p>
