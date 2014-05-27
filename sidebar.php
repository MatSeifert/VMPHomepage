<!DOCTYPE>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="styles/default_4.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,100|Open+Sans:300' rel='stylesheet' type='text/css'>
	</head>

	<body>
			<p>&nbsp;</p>
			<div class="contentBox">
		   		<span class="NavCategory">TEAMSPEAK 3</span>
		   		<div class="rightText">
		   			<p>&nbsp;</p>
				   	<div id="ts3viewer_944104" > </div>
			 		<script src="http://static.tsviewer.com/short_expire/js/ts3viewer_loader.js"></script>
			 		<script>
			  			
				   			var ts3v_url_1 = "http://www.tsviewer.com/ts3viewer.php?ID=944104&text=000000&text_size=11&text_family=1&js=1&text_s_weight=normal&text_s_style=normal&text_s_variant=normal&text_s_decoration=none&text_s_color_h=525284&text_s_weight_h=bold&text_s_style_h=normal&text_s_variant_h=normal&text_s_decoration_h=underline&text_i_weight=normal&text_i_style=normal&text_i_variant=normal&text_i_decoration=none&text_i_color_h=525284&text_i_weight_h=normal&text_i_style_h=normal&text_i_variant_h=normal&text_i_decoration_h=underline&text_c_weight=normal&text_c_style=normal&text_c_variant=normal&text_c_decoration=none&text_c_color_h=525284&text_c_weight_h=normal&text_c_style_h=normal&text_c_variant_h=normal&text_c_decoration_h=underline&text_u_weight=bold&text_u_style=normal&text_u_variant=normal&text_u_decoration=none&text_u_color_h=525284&text_u_weight_h=bold&text_u_style_h=normal&text_u_variant_h=normal&text_u_decoration_h=none";
				   			ts3v_display.init(ts3v_url_1, 944104, 100);
			  			
			 		</script>
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