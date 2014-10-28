<!DOCTYPE>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="styles/default_4.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,100|Open+Sans:300' rel='stylesheet' type='text/css'>
	</head>

	<body style="background-color: #8C0000;">
			<p>&nbsp;</p>
			<div class="contentBox">
		   		<span class="NavCategory">TEAMSPEAK 3</span>
		   		<div class="rightText">
		   			<p>&nbsp;</p>
		   			<p>&nbsp;</p>
			   		<?php
			   			require_once ("widgets/TSViewer/teamspeak.php")
			   		?>		
			   	</div>
		   	</div>

		   	<p>&nbsp;</p>

		   	<div class="contentBox">
		   		<span class="NavCategory">TERMINE</span>
		   		<div class="rightText">
			   		<?php
			   			include("widgets/kalender/kalender.php")
			   		?>
			   		<p>&nbsp;</p>
			   	</div>
		   	</div>

		   	<p>&nbsp;</p>

		   	<div class="contentBox">
		   		<span class="NavCategory">LET'S PLAY</span>
		   		<p>&nbsp;</p>
		   		<div class="rightText">
		   			
					<?php require_once("widgets/letsplay/LetsPlay.html"); ?>

			   	</div>
		   	</div>		

		   	<p>&nbsp;</p>

		   	<div class="contentBox">
		   		<span class="NavCategory">SOCIAL MEDIA</span>
		   		<p>&nbsp;</p>
		   		<div class="rightText">
		   			
					<?php require_once("widgets/social/media.php"); ?>

			   	</div>
		   	</div>	
	</body>
</html>