<?php
	session_start();

	$Id = $_GET['VideoId'];
	$title = $_GET['VideoTitle'];
	$desc = str_replace('========================================', '<div class="hr"></div>', $_GET['VideoDescription']);

	echo '<iframe class="embed" width="600" height="339" src="//www.youtube.com/embed/' . $Id . '?autohide=0&showinfo=0&modestbranding=1" frameborder="0" allowfullscreen></iframe>'
		 . '<br><br><div class="back"><a href="?site=letsplay"><img src="images/backButton.png" alt="Back" border="0"></a></div><div class="LPLargeHeadline">' 
		 . strtoupper(str_replace('~raute~', '#',$title)) 
		 . '</div><br><br><div class="LPDescription">' . str_replace('~and~', '&',$desc) . '</div>';
?>
