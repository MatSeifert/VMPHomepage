<div class="whereAmI">
    TEAMSPEAK 3
</div>

<div class="PostTitle">
	TEAMSPEAK 3
</div>

<div class="PostPost">
	<?php 
		require_once("ts3server/tsstatus.php"); 
		$tsstatus = new TSStatus("ts.vmp-clan.de", 10011, 1); 
		$tsstatus->imagePath = "content/ts3server/img/"; 
		$tsstatus->showNicknameBox = false; 
		$tsstatus->showPasswordBox = false; 
		$tsstatus->decodeUTF8 = true; 
		$tsstatus->timeout = 2;

		echo $tsstatus->render(); 
	?>
</div>