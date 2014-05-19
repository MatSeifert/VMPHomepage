<?php
	function GetNewsFromRss () {
		$newsfeed='http://vmp-clan.tumblr.com/rss';
		$xml = simplexml_load_file(rawurlencode($newsfeed));
		$namespaces = $xml->getNamespaces(true);

		$i = 0;		// Abbruchvariable für die foreach Schleife

		foreach ($xml->channel->item as $item) {
			if ($i==3) break;
			echo '<div class="newsItemWrapper">';
				echo '<span class="smallHeadlineNews">' . strtoupper($item->title) . '</span>';
				echo '<div class="newsFeedContent">' . str_replace('<img', '<img class="newsImage" ',str_replace('<p', '<p class="newsItem" ' ,$item->description)) . '</div>';
			echo "</div>";
			
			$i++;
		}
	}
?>
<div class="whereAmI">
    NEWS
</div>

<div class="PostTitle">
  NEWS
</div>
<div class="PostPost">

	<div class="LPBlock">
		<?php GetNewsFromRss(); ?>
	</div>
	<p>&nbsp;</p>
</div>
