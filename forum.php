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
			<!-- Stylesheet- und Favicon Einbindung /-->
		<meta name="viewport" content="width=400, initial-scale=0.7, maximum-scale=0.7, user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="styles/default_4.css">
		<link rel="shortcut icon" href="images/favicon.png">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,100|Open+Sans:300' rel='stylesheet' type='text/css'>

		<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="javascript/parallax.js" type="text/javascript"></script>

		<script>
			// Auslesen der aktuellen Fensterhöhe, eine Veränderung in Echtzeit ist unnötig
			function Fensterhoehe () {
			  if (window.innerHeight) {
			    return window.innerHeight;
			  } else if (document.body && document.body.offsetHeight) {
			    return document.body.offsetHeight;
			  } else {
			    return 0;
			  }
			}
			// Überwachung initialisieren
			if (!window.Hoehe && window.innerHeight) {
			  Hoehe = Fensterhoehe();
			}
		</script>

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

		<script>			
			$(window).load(function(){
				$('click').on('click',function() {
				    if($('#slidemenu').css('left')=='0px'){
				        $('#slidemenu').animate({left: '-320px'}, 500);        
				    }else{
				        $('#slidemenu').animate({left:0}, 500); 
				    }
				});

				$('click2').on('click',function() {
				    if($('#slideright').css('right')=='0px'){
				        $('#slideright').animate({right: '-300px'}, 500);        
				    }else{
				        $('#slideright').animate({right:0}, 500); 
				    }
				});
			}); 
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
					<?php include("content/menueForum.php") ?>
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
			    FORUM
			</div>

			<div class="forumContent">

				<iframe onload="javascript:parent.iFrameHeight('forum','forum');" style="margin-top:0px; position: static; width: inherit;"
				id="forum" name="forum"
				src="wbb/index.php"
				scrolling="no"
				frameborder="0"
				class="wrapper" height="4400px">
				<p>Ihr Webbrowser kann leider keine eingebetteten Frames anzeigen:
				Sie k&ouml;nnen jedoch das eingebettete Forum &uuml;ber den folgenden Verweis
				aufrufen: <a href="wbb" target="_forum">Forum</a></p>
				</iframe>

			</div>

			<div class="right">

			</div>
		</div>
		<script>
			document.getElementById("mobiMenu").style.height = Hoehe - 60 + 'px';
			document.getElementById("mobiSidebar").style.height = Hoehe + 'px';
		</script>
	</body>
</html>