<p>&nbsp;</p>

<?php 
	require_once("tsstatus.php"); 
	$tsstatus = new TSStatus("ts.vmp-clan.de", 10011, 1); 
	$tsstatus->imagePath = __DIR__ . "/img"; 
	$tsstatus->showNicknameBox = false; 
	$tsstatus->showPasswordBox = false; 
	$tsstatus->decodeUTF8 = true; 
	$tsstatus->timeout = 2;

	echo $tsstatus->render(); 
?>

<p>&nbsp;</p>
