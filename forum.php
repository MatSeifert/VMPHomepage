<?php
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
			<!-- Viewporteinstellungen für das Responsive Design /-->
		<meta name="viewport" content="width=device-width" />
			<!-- Farbige Statusleiste für Chrom v39+ unter Android 5.0+ /-->
		<meta name="theme-color" content="#C14924">
			<!-- Stylesheet- und Favicon Einbindung /-->
		<link rel="stylesheet" type="text/css" href="styles/default_4.css">
		<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="styles/swipebox.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css">
		<link rel="shortcut icon" href="images/favicon.png">
			<!-- Die Schriftart der Seite /-->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,100|Open+Sans:300' rel='stylesheet' type='text/css'>
			<!-- Javascript Dateien für diverse Funktionen /-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="http://jquery-elastic.googlecode.com/svn/trunk/jquery.elastic.source.js" type="text/javascript"></script>
		<script src="javascript/bootstrap.min.js" type="text/javascript"></script>
		<script src="javascript/jquery.swipebox.min.js" type="text/javascript"></script><!-- The New Image Gallery /-->
		<script src="javascript/jquery.bxslider.js" type="text/javascript"></script>	<!-- The Image Gallery /-->
		<script src="javascript/parallax.js" type="text/javascript"></script>			<!-- Parallax Effect of the header Image /-->
		<script src="javascript/charCount.js" type="text/javascript"></script>			<!-- Show the left Characters in Textareas /-->
		<script src="javascript/smoothScroll.js" type="text/javascript"></script>		<!-- Smooth scrolling to Anchor Points /-->
		<script src="javascript/windowHeight.js" type="text/javascript"></script>		<!-- For the Mobile Version /-->
		<script src="javascript/slideMenu.js" type="text/javascript"></script>			<!-- For the Mobile Version /-->
		<script src="javascript/async.js" type="text/javascript"></script>

		<script>
			function iFrameHeight(n,id)
			{
				var h = 0;
				if ( !document.all )
				{
					h = document.getElementById(id).contentDocument.body.offsetHeight;
					document.getElementById(id).style.height = h + 0 + 'px';
				}
				else if( document.all )
				{
					// Extrawurst für den Internet Explorer
					h = document.frames(n).document.body.scrollHeight;
					document.getElementById(id).style.height = h + 0 + 'px';
				}
			}
		</script>
	</head>

	<body onload="mobileOffset()" name="top">
		<!-- Mobile Header /-->
		<div class="mobileSektion">
			<div class="mobileHead" style="text-align: center">
				<div class="hintergrundbild">
					<img src="images/header/<?php echo rand(0, ImageCount());?>.jpg" alt="Hintergrundbild Start"/>
				</div>
				<div class="mobileOverlay">
				</div>
				<div class="scrollMenu">
					<?php require_once("content/menuMobileScrolled.php") ?>
				</div>
				<div class="mobileMenuHorizontal" id="sticky">
					<?php require_once("content/menuMobile.php") ?>
				</div>
			</div>
		</div>
		<!-- End of mobile Header /-->

		<div class="sektion" id="start">
			<div class="hintergrundbild">
				<img src="images/header/<?php echo rand(0, ImageCount());?>.jpg" alt="Hintergrundbild Start"/>
			</div>
			<div class="text">
				<a href="?site=start">
					<img src="images/logo.png" alt="Logo" class="logo" border="0"/>
				</a>
				<span class="title">VMP CLAN</span> <br />
				<span class="subtitle">GERMAN MULTIGAMING SINCE 2008</span>
			</div>
		</div>

		<div class="contentWrapper">
			<div class="menue">

				<?php include("content/menueForum.php") ?>

			</div>

			<div class="whereAmI">
			    <div class="whereAmICircle">
					<i class="fa fa-comments"></i>
				</div>
			</div>


			<div class="forumContent">

				<iframe onload="javascript:parent.iFrameHeight('forum','forum');" style="margin-top:0px; position: static; width: inherit;"
					id="forum" name="forum"
					src="wbb/index.php"
					scrolling="no"
					frameborder="0"
					class="wrapper">
					<p>Ihr Webbrowser kann leider keine eingebetteten Frames anzeigen:
					Sie k&ouml;nnen jedoch das eingebettete Forum &uuml;ber den folgenden Verweis
					aufrufen: <a href="wbb" target="_forum">Forum</a></p>
				</iframe>

			</div>

			<div class="right">

			</div>
		</div>
	</body>
</html>
