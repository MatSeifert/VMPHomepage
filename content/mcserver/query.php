<?php

	// Autoloader. Use SPL in a real project.
	foreach(array('Server', 'Stats', 'StatsException') as $file) {
		include sprintf('/MCServerStatus/Minecraft/%s.php', $file);
	}

	// Configuration of the Server
	$servers = array(
		"mc.vmp-clan.de"
	);

?>

<table class="mania2011" cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th class="center">STATUS</th>
			<th class="center">VERSION</th>
			<th>&nbsp;&nbsp;&nbsp;</th>
			<th>NAME</th>
			<th>IP</th>
			<th class="center">SPIELER</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($servers as $server): ?>
			<?php $stats = \Minecraft\Stats::retrieve(new \Minecraft\Server($server)); ?>
			<tr>
				<td class="maniaHoFTop middle center">
					<?php if($stats->is_online): ?>
						<span class="online">ONLINE</span>
					<?php else: ?>
						<span class="offline">OFFLINE</span>
					<?php endif; ?>
				</td>
				
				<td class="maniaHoFTop middle center">
					<?php echo $stats->game_version ?>
				</td>
				
				<td class="maniaHoFTop">&nbsp;</td>

				<td class="maniaHoFTop">
					VMP Minecraft Server <br>
					<span class="grey smallText">
						<?php echo $stats->motd;?>
					</span> 
				</td>

				<td class="maniaHoFTop middle">
					<code><?php echo $server; ?></code>
				</td>

				<td class="maniaHoFTop middle center">
					<?php printf('%u / %u', $stats->online_players, $stats->max_players); ?>
				</td>
			</tr>
			<?php unset($stats); ?>
		<?php endforeach; ?>
	</tbody>
</table>