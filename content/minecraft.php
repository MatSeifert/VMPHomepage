<?php
	function FlickrFeed () {
		$xmlfile='https://api.flickr.com/services/feeds/groups_pool.gne?id=2611823@N25&lang=de-de&format=rss_200';
		$xml = simplexml_load_file(rawurlencode($xmlfile));
		$namespaces = $xml->getNamespaces(true);

		$break = 0;

		foreach ($xml->channel->item as $item) {
			echo '<div class="imageWrapper">';
				echo '<img src="' . $item->children($namespaces['media'])->content->attributes()->url . '" alt="FlickrImage" class="FlickrImage">';
				echo '<div class="ImageInfo"><p class="ImageInfoText"><nobr>';
					echo $item->title . '</nobr><br>';
					echo 'von ' . $item->children($namespaces['media'])->credit;
				echo '</p></div>';
			echo '</div>';

			$break++;

			if($break > 3)
			{
				break;
			}
		}
	}
?>

<div class="whereAmI">
    MINECRAFT
</div>

<div class="PostTitle">
  MINECRAFT
</div>

<div class="PostPost">
	<span class="smallHeadline">
		Serverinformationen
	</span>
	<br>
	<?php
		require_once('mcserver/query.php');
	?>

	<p>&nbsp;</p>

	<span class="smallHeadline">
		Generelle Serverregeln
	</span>
	<ol>
		<li>Jeder Nutzer des Clanservers muss die folgenden Regeln vor dem ersten Spielbeitritt gelesen und akzeptiert haben.</li>
		<li>Änderungen an diesen Regeln behält sich der VMP Clan vor. Über Änderungen wird auf der Homepage informiert.</li>
		<li>Selbstverständlich gibt es auf dem Server, wie auch im Forum diverse Benimm-Grundregeln. Es ist verboten andere zu beleidigen, zu flamen, rassistische, pornographische 
		oder menschenverachtende Inhalte im Chat zu posten, oder durch Bauwerke darzustellen.</li>
		<li>Jeder Bauplatz gehört dem, der ihn zuerst bebaut. zu einem Bauplatz zählt auch das Umland in Sichtweite, um später Platz für weitere Gebäude zu haben.</li>
		<li>Gebäude in Sichtweite anderer Spieler müssen mit dem Betreffenden abgesprochen werden.</li>
		<li>Grundsätzlich ist alles erlaubt, was ohne Cheats gebaut werden kann. Mutwillig in die Landschaft gesetzte Gebäude ohne ersichtlichen Nutzen, sowie Gebäude
		über große Gebiete (z.B. Brücken), die ohne erkennbaren Willen, sie optisch ansprechend zu bauen, errichtet wurden, werden entweder verändert, oder können in
		bestimmten Fällen auch abgerissen werden.</li>
		<li>Das graben von Löchern in tiefe Höhlen, oder bis zur Bedrockebene ist prinzipiell nicht gestattet, da diese immer eine Gefahr für andere Spieler darstellt. Man sieht die
		Löcher oftmals nicht und fällt hinein. Solltet ihr das Bedürfnis verspüren euch direkt nach unten zu graben, dann verschließt das Loch bitte umgehend wieder, oder bringt 
		Leitern an, falls es ein Höhleneingang werden soll.</li>
		<li>Mit TNT muss bewusst und vorsichtig umgegangen werden, besonders bei größeren Sprengungen. Zum einen besteht die Gefahr fremde Gebäude zu beschädigen, zum 
		anderen kann gleichzeitig gezündetes TNT die Server Performance negativ beeinflussen, und sogar zum Absturz führen.</li>
		<li>Wer im Gebiet von anderen Spielern unterwegs ist, und von einem Creeper getroffen wird, muss die entstandenen Schäden umgehend wieder reparieren. Ist das aufgrund
		mangelnder Materialien nicht möglich, muss der geschädigte Spieler informiert werden. Eine Reparatur ist immer zum nächst möglichen Zeitpunkt durchzuführen.</li>
		<li>Das stehlen von Gegenständen aus fremden Kisten, sowie das mutwillige beschädigen anderer Gebäude ist natürlich strengstens verboten!</li>
		<li>Farmen anderer Spieler dürfen, sofern es nicht verboten wird, genutzt werden, wenn geschlachtete Tiere umgehend nachgezüchtet, und geerntete Pflanzen nachgepflanzt
		werden</li>
		<li>Das spawnen eines Withers ist bis auf weiteres verboten, da dieser unheimlich viel Schaden anrichten kann, und allein praktisch kaum zu besiegen ist.</li
>	</ol>

	<span class="smallHeadline">
		Zugang zum Server
	</span>
	<ol>
		<li>Auf dem Server kommt eine Whitelist zum Einsatz, auf der man erst eingetragen werden muss.</li>
		<li>Clanmitglieder werden automatisch hinzugefügt, sofern der Minecraftname einem der Administratoren bekannt ist.</li>
		<li>Gastspieler müssen ihren Minecraftnamen einem bestehenden Clanmitglied mitteilen, der sich dann bei den Admins um den Whitelisteintrag kümmert.</li>
		<li>Dieses Clanmitglied fungiert als so genannter Bürge für den Gastspieler, und kann für dessen Verstöße mit zur Verantwortung gezogen werden.</li>
	</ol>

	<span class="smallHeadline">
		Regeln für Gastspieler
	</span>
	<ol>
		<li>Gastspieler müssen an ihren Gebäuden ein Schild anbringen, auf dem ersichtlich ist, von wem es gebaut wurde. Andernfalls kann es dazu kommen, dass es abgerissen wird.</li>
		<li>Grundsätzlich bietet unser Server Gastspielern die gleichen Möglichkeiten wie Mitgliedern des VMP Clans.</li>
		<li>Um Zugangsberechtigt zum Server zu sein, bedarf es eines bestehenden VMP Mitglieds (ausgenommen Trial Member), der für den Gastspieler bürgt 
		(Vgl. Zugang zum Server, Nr. 4)</li>
		<li>Bei Inaktivität von drei Monaten wird der entsprechende Spieler wieder von der Whitelist entfernt, und unfertige oder im späteren Verlauf störende
		Gebäude können abgerissen werden. Gebäude werden nicht abgerissen, solang der Gast noch aktiv (sprich ein mal in 3 Monaten) am Servergeschehen teilnimmt.</li>
		<li>Gebäude von VMP Mitgliedern werden auch bei Inaktivität nicht abgerissen</li>
		<li>Für Verstöße gegen die Serverregeln wird neben dem Verursacher auch der entsprechende Bürge zur Verantwortung gezogen.</li>
		<li>Bei mehrfachen Verstößen wird ein Spieler wieder von der Whitelist entfernt.</li>
		<li>Sind die Slots des Clanservers belegt, können Gastspieler zugunsten von Clanmitgliedern gekickt werden.</li>
	</ol>	
	<br>
	<i>Stand: Oktober 2014</i>

	<p>&nbsp;</p>

	<span class="smallHeadline">
		Screenshots
	</span>

	<?php FlickrFeed(); ?>

	<p>&nbsp;<br><br></p>

	<span class="MaterialBtn">
		<a href="?site=MinecraftMonuments">MEHR BILDER</a>
	</span> &nbsp; 
	<span class="MaterialBtn">
		<a href="https://www.flickr.com/groups/vmpminecraft/">FLICKRALBUM</a>
	</span>

	<p>&nbsp;</p>
</div>