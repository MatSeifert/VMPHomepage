<?php
	setlocale(LC_TIME, 'de_DE');

	ini_set('display_errors', '0');
	ini_set("max_execution_time",15 );

	register_shutdown_function('shutdown');

	function shutdown()
	{
		$error = error_get_last();

		if ($error == null) {
			require_once ("content/case.php");
		}

		else {
			$i = 0;
			// continue the static content, and display the error
			echo '<div class="HttpError404Headline"><img src="images/error.png"> Error</div>';
			echo '<span class="smallHeadline">Beim Laden des Inhaltes ist ein Fehler aufgetreten!</span><br><hr><br>';
			foreach ($error as $detail)
			{
				if ($i == 0 || $i > 2)
				{
					$i++;
					continue;
				}

				echo $detail . '<br>';

				$i++;
			}

			echo '<p>&nbsp;</p></div></div>';

			require_once('content/sidebar.php');
		}
	}

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
		<script src="javascript/setIFrameHeight.js" type="text/javascript"></script>	<!-- For the Mobile Version /-->
		<script src="javascript/slideMenu.js" type="text/javascript"></script>			<!-- For the Mobile Version /-->
		<script src="javascript/async.js" type="text/javascript"></script>
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

		<div class="contentWrapper" id="contentWrapper">
			<div class="menue">
				<?php include("content/menue.php") ?>
			</div>

			<div class="content" id="main">
				<?php shutdown(); ?>
			   	<p>&nbsp;</p>
			</div>

			<?php require_once("content/sidebar.php"); ?>
		</div>

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
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			  ga('create', 'UA-46156385-1', 'cssscript.com');
			  ga('send', 'pageview');
		</script>

		<script>
			function sticky_relocate() {
				var window_top = $(window).scrollTop();
				var div_top = $('#sticky-anchor').offset().top;
				if (window_top > div_top) {
					$('#sticky').addClass('stick');
				} else {
					$('#sticky').removeClass('stick');
				}
				}

				$(function () {
				$(window).scroll(sticky_relocate);
				sticky_relocate();
			});
		</script>

		<script>
			var parH = $('.parent').outerHeight(true);
			var areaH = $('.scrollable').outerHeight(true);
			var scrH = parH / (areaH/parH);

			function dragging(){
			var scrPos = $('.scrollbar').position().top;
			$('.scrollable').css({top: -(scrPos*(areaH/parH)-1)});
			}


			$('.scrollbar').height(scrH);
			$('.scrollbar').draggable({
			axis: 'y',
			containment: 'parent',
			drag: function() {
				dragging()
			}

			});
		</script>

		<script>
			$(document).scroll(function () {
			    var y = $(this).scrollTop();
			    if (y > 220) {
			        $('.scrollMenu').fadeIn();
			    } else {
			        $('.scrollMenu').fadeOut();
			    }

			});
		</script>

		<script>
			function mobileOffset() {
				document.getElementById("sticky").scrollLeft = 100
			}
		</script>
	</body>
</html>
