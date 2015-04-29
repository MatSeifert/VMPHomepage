<?php
	include (__DIR__ . '/MCServerStatus/Minecraft/Server.php');
	include (__DIR__ . '/MCServerStatus/Minecraft/Stats.php');
	include (__DIR__ . '/MCServerStatus/Minecraft/StatsException.php');

	$server = "mc.vmp-clan.de";
?>

<table class="mania2011" cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th class="center">STATUS</th>
			<th class="center mobileHidden">VERSION</th>
			<th>&nbsp;&nbsp;&nbsp;</th>
			<th>NAME</th>
			<th class="mobileHidden">ADRESSE</th>
			<th class="center">SPIELER</th>
		</tr>
	</thead>
	<tbody>

			<?php
				try {
					$stats = \Minecraft\Stats::retrieve(new \Minecraft\Server($server));
				}
				catch (Exception $e) {
					echo '<div class="ErrorMessage"><img src="images/error_small.png" title="Error">Error: ',  $e->getMessage(), "\n";
					echo '</div>';
				}
			?>
			<tr>
				<td class="maniaHoFTop middle center">
					<?php if($stats->is_online): ?>
						<span class="online">ONLINE</span>
					<?php else: ?>
						<span class="offline">OFFLINE</span>
					<?php endif; ?>
				</td>

				<td class="maniaHoFTop middle center mobileHidden">
					<?php echo $stats->game_version ?>
				</td>

				<td class="maniaHoFTop">&nbsp;</td>

				<td class="maniaHoFTop">
					VMP Minecraft Server <br>
					<span class="grey smallText">
						<?php echo $stats->motd;?>
					</span>
				</td>

				<td class="maniaHoFTop middle mobileHidden">
					<code><?php echo $server; ?></code>
				</td>

				<td class="maniaHoFTop middle center">
					<?php printf('%u / %u', $stats->online_players, $stats->max_players); ?>
				</td>
			</tr>
			<?php unset($stats); ?>

	</tbody>
</table>
