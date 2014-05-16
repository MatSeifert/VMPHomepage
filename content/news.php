<?php
	function GetNewsFromRss () {
		$newsfeed='http://vmp-clan.tumblr.com/rss';
		$xml = simplexml_load_file(rawurlencode($newsfeed));
		$namespaces = $xml->getNamespaces(true);

		$i = 0;		// Abbruchvariable für die foreach Schleife

		foreach ($xml->channel->item as $item) {
			if ($i==8) break;
			echo '<div class="newsItemWrapper">';
				echo '<span class="smallHeadlineNews"><nobr>' . strtoupper($item->title) . '</nobr></span>';
				echo '<div class="newsFeedContent">' . str_replace('<img', '<img class="newsImage" ',$item->description) . '</div>';
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
