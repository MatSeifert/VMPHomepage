<?php
	$Id = @$_GET["YouTubeVideoId"];
	$title = @$_GET["VideoTitle"]; 
	$desc = @$_GET["VideoDescription"]; 	

	echo '<iframe class="embed" width="600" height="339" src="//www.youtube.com/embed/' . $Id . '?autohide=0&showinfo=0&modestbranding=1" frameborder="0" allowfullscreen></iframe>'
		 . '<br><br><div class="LPHeadline">' . strtoupper($title) . '</div>';

?>