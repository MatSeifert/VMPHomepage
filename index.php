<?php
	setlocale(LC_TIME, 'de_DE');

	function ImageCount() {					// Zählen der Bilder im angegeben Ordner +++ NAMECONVENTION BEI NEUEN BILDERN BEACHTEN!
		$files = scandir('images/header');
		$count = count($files)-3;			//-2 wegen . und .., und nochmal -1, da rand Funktion bei 0 anfängt

		return $count;
	}
?>

<!DOCTYPE html>

<html>
	<head>
			<!-- Metadaten und WOT Verifizierung /-->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<!-- Seitentitel -->
		<title>VMP Clan - German Multigaming</title>
			<!-- Stylesheet- und Favicon Einbindung /-->
		<meta name="viewport" content="width=400, initial-scale=0.7, maximum-scale=0.7, user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="styles/default_4.css">
		<link rel="shortcut icon" href="images/favicon.png">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,100|Open+Sans:300' rel='stylesheet' type='text/css'>
			<!-- Javascript Dateien für diverse Funktionen /-->
		<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="javascript/parallax.js" type="text/javascript"></script>
		<script src="javascript/charCount.js" type="text/javascript"></script>
		<script src="javascript/smoothScroll.js" type="text/javascript"></script>		
		<script src="javascript/windowHeight.js" type="text/javascript"></script>
		<script src="javascript/setIFrameHeight.js" type="text/javascript"></script>
		<script src="javascript/slideMenu.js" type="text/javascript"></script>
		<script>
			var divHeight = document.getElementById("content").offsetHeight;
		</script>
	</head>

	<body>
	<!-- Mobile Header /-->
		<div class="mobileSektion" id="start">
			<div class="mobileHead" style="text-align: center">

				<click2 class="showRight">
					<img src="images/widgets.png" alt="menu" style="float: right; margin-right: 5px">
				</click2>
				<div id="slideright">
					<iframe 
						onload="javascript:parent.iFrameHeight('sidebar','sidebar');" 
						src="sidebar.php" 
						id="sidebar" name="sidebar"
						frameborder="0" 
						class="wrapper"
						style="height: 1400px; overflow-x: hidden; width: 270px;">
					</iframe>
				</div>


				<click class="show">
					<img src="images/menue.png" alt="menu" style="float: left; margin-left: 0px">
				</click>
				<div id="slidemenu">
					<?php include("content/menue.php") ?>
				</div>

			</div>
		</div>
		<!-- End of mobile Header /-->

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
			
				<?php include("content/menue.php") ?>
			
			</div>

			<div class="content">
				<?php require_once ("content/case.php") ?>
			   	<p>&nbsp;</p>

			</div>

			<div class="right">
				<div class="contentBox">
			   		<span class="RightHeadline">TEAMSPEAK 3</span>
			   		<div class="rightText">
			   			<p>&nbsp;</p>
							<div id="ts3viewer_944104" style="width:; background-color:;"> </div>

							<script type="text/javascript" src="http://static.tsviewer.com/short_expire/js/ts3viewer_loader.js"></script>

							<script type="text/javascript">
							<!--
							var ts3v_url_1 = "http://www.tsviewer.com/ts3viewer.php?ID=944104&text=000000&text_size=11&text_family=1&js=1&text_s_color=a80000&text_s_weight=normal&text_s_style=normal&text_s_variant=small-caps&text_s_decoration=none&text_s_color_h=3f90f2&text_s_weight_h=normal&text_s_style_h=normal&text_s_variant_h=small-caps&text_s_decoration_h=underline&text_i_color=bfbfbf&text_i_weight=normal&text_i_style=normal&text_i_variant=normal&text_i_decoration=none&text_i_color_h=3f90f2&text_i_weight_h=normal&text_i_style_h=normal&text_i_variant_h=normal&text_i_decoration_h=underline&text_c_color=3b3b3b&text_c_weight=normal&text_c_style=normal&text_c_variant=small-caps&text_c_decoration=none&text_c_color_h=3f90f2&text_c_weight_h=normal&text_c_style_h=normal&text_c_variant_h=small-caps&text_c_decoration_h=underline&text_u_color=9e0000&text_u_weight=normal&text_u_style=normal&text_u_variant=small-caps&text_u_decoration=none&text_u_color_h=3f90f2&text_u_weight_h=normal&text_u_style_h=normal&text_u_variant_h=small-caps&text_u_decoration_h=none";
							ts3v_display.init(ts3v_url_1.replace('<img src="http://static.tsviewer.com/images/teamspeak3/standard/16x16_server_pass.png" title="" alt="" align="top">', '<img src="images/disc.png">'), 944104, 100);
							-->
							</script>
					   		<?php
					   			// require_once ("widgets/TSViewer/TSViewer.php")
					   		?>		
				   	</div>
			   	</div>
			   	<p>&nbsp;</p>
			   	<div class="contentBox">
			   		<span class="RightHeadline">TERMINE</span>
			   		<div class="rightText">
				   		<?php
				   			include("widgets/kalender/kalender.php")
				   		?>
				   		<p>&nbsp;</p>
				   	</div>
			   	</div>
			   	<p>&nbsp;</p>
			   	<div class="contentBox">
			   		<span class="RightHeadline">LET'S PLAY</span>
			   		<div class="watchmore">
			   			<a href="?site=letsplay" class="tooltips">
			   				&#187;
			   				<span>Alle Projekte</span>
			   			</a>
			   		</div>
			   		<p>&nbsp;</p>
			   		<div class="rightText">
			   			
						<?php require_once("widgets/letsplay/LetsPlay.html"); ?>

				   	</div>
			   	</div>		
			   	<p>&nbsp;</p>
			   	<div class="contentBox">
			   		<span class="RightHeadline">SOCIAL MEDIA</span>
			   		<p>&nbsp;</p>
			   		<div class="rightText">
			   			
						<?php require_once("widgets/social/media.php"); ?>

				   	</div>
			   	</div>	
			   	<p>&nbsp;</p>
			   	<div class="contentBox" id="PromoBox" style="display: none">
			   		<span class="RightHeadline">VMP MOBIL</span>
			   		<p>&nbsp;</p>
			   		<div class="rightText">
			   			
						Erlebe unsere Seite jetzt auch auf deinem Smartphone! Rufe einfach wie gewohnt www.vmp-clan.de auf!
						<br>
						<div class="mobileScreenWrapper">
							<img src="images/mobileScreen.png" class="mobileScreen">
						</div>
				   	</div>
			   	</div>	
			</div>
		</div>
		<script>
			document.getElementById("slidemenu").style.height = Hoehe - 60 + 'px';
			document.getElementById("mobiSidebar").style.height = Hoehe + 'px';
		</script>

		<script type="text/javascript">
			/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
			var disqus_shortname = 'vmp-clan'; // required: replace example with your forum shortname

			/* * * DON'T EDIT BELOW THIS LINE * * */
			(function () {
			var s = document.createElement('script'); s.async = true;
			s.type = 'text/javascript';
			s.src = 'http://' + disqus_shortname + '.disqus.com/count.js';
			(document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
			}());
		</script>
	</body>
</html>