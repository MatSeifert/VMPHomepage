<?php
	function ImageCount() {					// Zählen der Bilder im angegeben Ordner +++ NAMECONVENTION BEI NEUEN BILDERN BEACHTEN!
		$files = scandir('images/header');
		$count = count($files)-3;			//-2 wegen . und .., und nochmal -1, da rand Funktion bei 0 anfängt

		return $count;
	}
?>

<!DOCTYPE html>

<html lang="de">
	
	<head>
			<!-- Metadaten und WOT Verifizierung /-->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<!-- Seitentitel -->
		<title>VMP Clan - German Multigaming</title>
			<!-- Stylesheet- und Favicon Einbindung /-->
		<link rel="stylesheet" type="text/css" href="styles/default_4.css">
		<link rel="shortcut icon" href="images/favicon.png">

		<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="javascript/parallax.js" type="text/javascript"></script>
	
	</head>

	<body>
		<div class="sektion" id="start">
			<div class="hintergrundbild">
				<img src="images/header/<?php echo rand(0, ImageCount());?>.jpg" alt="Hintergrundbild Start"/>
			</div>
			<div class="text">
				<img src="images/logo.png" alt="Logo" class="logo"/>
				<span class="title">VMP CLAN</span> <br />
				<span class="subtitle">GERMAN MULTIGAMING SINCE 2008</span>				
			</div>
		</div>
		
		<div class="contentWrapper">
			<div class="menue">			
			
				<?php require_once("content/menue.html") ?>
			
			</div>

			<div class="content">

				<?php require_once ("content/case.php") ?>
			   	<p>&nbsp;</p>

			</div>

			<div class="right">
				<div class="contentBox">
			   		<span class="NavCategory">TEAMSPEAK 3</span>
			   		<div class="rightText">
			   			<p>&nbsp;</p>
					   	<div id="ts3viewer_944104" > </div>
				 		<script type="text/javascript" src="http://static.tsviewer.com/short_expire/js/ts3viewer_loader.js"></script>
				 		<script type="text/javascript">
				  			
					   			var ts3v_url_1 = "http://www.tsviewer.com/ts3viewer.php?ID=944104&text=000000&text_size=11&text_family=1&js=1&text_s_weight=normal&text_s_style=normal&text_s_variant=normal&text_s_decoration=none&text_s_color_h=525284&text_s_weight_h=bold&text_s_style_h=normal&text_s_variant_h=normal&text_s_decoration_h=underline&text_i_weight=normal&text_i_style=normal&text_i_variant=normal&text_i_decoration=none&text_i_color_h=525284&text_i_weight_h=normal&text_i_style_h=normal&text_i_variant_h=normal&text_i_decoration_h=underline&text_c_weight=normal&text_c_style=normal&text_c_variant=normal&text_c_decoration=none&text_c_color_h=525284&text_c_weight_h=normal&text_c_style_h=normal&text_c_variant_h=normal&text_c_decoration_h=underline&text_u_weight=bold&text_u_style=normal&text_u_variant=normal&text_u_decoration=none&text_u_color_h=525284&text_u_weight_h=bold&text_u_style_h=normal&text_u_variant_h=normal&text_u_decoration_h=none";
					   			ts3v_display.init(ts3v_url_1, 944104, 100);
				  			
				 		</script> 
					   		<?php
					   			// require_once ("widgets/TSViewer/TSViewer.php")
					   		?>		
				   	</div>
			   	</div>
			   	<p>&nbsp;</p>
			   	<div class="contentBox">
			   		<span class="NavCategory">TERMINE</span>
			   		<div class="rightText">
				   		<?php
				   			require_once("widgets/kalender/kalender.php")
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

			</div>
		</div>

	</body>
</html>