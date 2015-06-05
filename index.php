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
			<!-- Viewporteinstellungen für das Responsive Design /-->
		<meta name="viewport" content="width=400, initial-scale=0.7, maximum-scale=0.7, user-scalable=no" />
			<!-- Farbige Statusleiste für Chrom v39+ unter Android 5.0+ /-->
		<meta name="theme-color" content="#C14924">
			<!-- Stylesheet- und Favicon Einbindung /-->
		<link rel="stylesheet" type="text/css" href="styles/default_4.css">
		<link rel="shortcut icon" href="images/favicon.png">
			<!-- Die Schriftart der Seite /-->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,100|Open+Sans:300' rel='stylesheet' type='text/css'>
			<!-- Javascript Dateien für diverse Funktionen /-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="http://jquery-elastic.googlecode.com/svn/trunk/jquery.elastic.source.js" type="text/javascript"></script>
		<script src="javascript/jquery.bxslider.js" type="text/javascript"></script>	<!-- The Image Gallery /-->
		<script src="javascript/parallax.js" type="text/javascript"></script>			<!-- Parallax Effect of the header Image /-->
		<script src="javascript/charCount.js" type="text/javascript"></script>			<!-- Show the left Characters in Textareas /-->
		<script src="javascript/smoothScroll.js" type="text/javascript"></script>		<!-- Smooth scrolling to Anchor Points /-->
		<script src="javascript/windowHeight.js" type="text/javascript"></script>		<!-- For the Mobile Version /-->
		<script src="javascript/setIFrameHeight.js" type="text/javascript"></script>	<!-- For the Mobile Version /-->
		<script src="javascript/slideMenu.js" type="text/javascript"></script>			<!-- For the Mobile Version /-->
		<script src="javascript/async.js" type="text/javascript"></script>
	</head>

	<body>
	<!-- Mobile Header /-->
		<div class="mobileSektion" id="start">
			<div class="mobileHead" style="text-align: center">

				<section class="wrapper">
				  <section class="material-design-hamburger">
				    <button class="material-design-hamburger__icon">
				      <span class="material-design-hamburger__layer"></span>
				    </button>
				  </section>

				  <section class="menu menu--off" id="wrapper">

					<?php include("content/menue.php") ?>

				  </section>
				</section>

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
				<?php include("content/menue.php") ?>
			</div>

			<div class="content" id="main">
				<?php require_once ("content/case.php") ?>
			   	<p>&nbsp;</p>
			</div>

			<div class="right">
				<div class="contentBox">
			   		<span class="RightHeadline">TEAMSPEAK 3</span>
			   		<div class="rightText">
			   			<div data-async-url="widgets/TSViewer/teamspeak.php">
				   			<p>&nbsp;</p>
					   		<?php
					   			require_once ("widgets/TSViewer/teamspeak.php")
					   		?>
						</div>
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
			   	<div class="contentBox mobileHidden" id="mobilePromo">
			   		<span class="RightHeadline">VMP MOBIL</span>
			   		<div class="watchmore">
			   			<a href="?site=mobile" class="tooltips">
			   				&#187;
			   				<span>Mehr erfahren</span>
			   			</a>
			   		</div>
			   		<p>&nbsp;</p>
			   		<div class="rightText">
   						<img src="images/responsive.png" alt="VMP Mobil" class="mobileScreen">
						Auch unterwegs immer auf dem aktuellsten Stand. Mit der mobilen Webseite des VMP Clans kein Problem!
						<p>&nbsp;</p>
				   	</div>
			   	</div>
			</div>
		</div>


		<script>
			document.getElementById("wrapper").style.height = Hoehe - 60 + 'px';
		</script>

		<script>
		// Höhe des Seiteninhalts auslesen, und Mobile Promo nur anzeigen, wenn der Platz da ist
		var contentHeight = document.getElementById('main').offsetHeight;

			if(contentHeight < 1000)
			{
				document.getElementById('mobilePromo').style.display = 'none';
			}

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

		<script>
			(function() {

			  'use strict';

			  document.querySelector('.material-design-hamburger__icon').addEventListener(
			    'click',
			    function() {
			      var child;

			      document.body.classList.toggle('background--blur');
			      this.parentNode.nextElementSibling.classList.toggle('menu--on');

			      child = this.childNodes[1].classList;

			      if (child.contains('material-design-hamburger__icon--to-arrow')) {
			        child.remove('material-design-hamburger__icon--to-arrow');
			        child.add('material-design-hamburger__icon--from-arrow');
			      } else {
			        child.remove('material-design-hamburger__icon--from-arrow');
			        child.add('material-design-hamburger__icon--to-arrow');
			      }

			    });

			})();
		</script>

		<script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			  ga('create', 'UA-46156385-1', 'cssscript.com');
			  ga('send', 'pageview');
		</script>
	</body>
</html>
