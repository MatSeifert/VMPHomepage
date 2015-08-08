<?php
	require_once("galleries/showGallery.php");
?>

<div class="whereAmI">
    <div class="whereAmICircle">
		<i class="fa fa-server"></i>
	</div>
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

	<div class="McMapWrapper">
		<div class="McMapSubtext">
			<div class="McMapCircle">
				<a href="?site=minecraftMap" class="tooltips">
					<i class="fa fa-map"></i>
					<span>Zur Karte</span>
				</a>
			</div>

			<h2>VMP Server Map</h2>

			<span>
				Eine &Uuml;bersichtskarte über unsere komplette Servermap, drehbar und mit Nachtansicht. Die Karte aktualisiert sich täglich!
			</span>
		</div>
	</div>

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
		<li>Das spawnen eines Withers ist bis auf weiteres verboten, da dieser unheimlich viel Schaden anrichten kann, und allein praktisch kaum zu besiegen ist.</li>
	</ol>

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


	<span class="smallHeadline" id="changeDec2014">
		Serverperformance
	</span>
	<ol>
		<li>
			Da wir uns allein über Spenden finanzieren, steht uns natürlich kein gigantischer Root Server mit endloser Leistung zur Verfügung. Um die Serverperformance dennoch
			nicht zu beeinträchtigen, müssen einige Regeln beachtet werden. pielen allein benötigt nicht viel Leistung. Aber alles, was berechnet werden muss zieht an der
			Performance.
		</li>
		<li>
			Fließende Flüssigkeiten (nicht stehende!) können die Performance beeinflussen, wenn sie in großen Mengen autreten. Hüllt eure Gebäude also nicht unbedingt in Wasser,
			und füllt eure Burgmauern besser nicht mit Lava. Wasserfälle von Bergen beeinträchtigen die Performance kaum.</li>
		<li>
			Den größten Leistungsfresser stellen Tierfarmen dar. Bitte züchtet euch nur gerade so viele Tiere, wie ihr benötigt, und teilt euch ggf. mit Spielern rein, die in
			der Nähe wohnen (ein Spieler züchtet Schafe, ein anderer Kühe, usw.).
		</li>
		<li>
			Kommt es durch von Spielern erzeugten bzw. gebauten Elementen zur Beeinträchtigung der Serverperformance, behalten wir uns das Recht vor Tiere und Anlagen zu entfernen,
			die sich negativ auf die Leistung auswirken.
		</li>
	</ol>
	<br>
	<i>Stand: Dezember 2014</i>

	<p>&nbsp;</p>

	<span class="smallHeadline">
		Screenshots
	</span>

	<?php FlickrGallery('https://api.flickr.com/services/feeds/groups_pool.gne?id=2611823@N25&lang=de-de&format=rss_200'); ?>

	<p>&nbsp;<br><br></p>
	<a href="?site=screenshots">
		<div class="button_v2">
			Screenshot Übersicht
		</div> &nbsp;
	</a>
	<p>&nbsp;</p>

	<!-- Javascript for the gallery  -->
	<script>
		$('.bxslider').bxSlider({
		  pagerCustom: '#bx-pager'
		});
	</script>

	<script type="text/javascript">
		;( function( $ ) {
			$( '.swipebox' ).swipebox();
		} )( jQuery );

	</script>
</div>
