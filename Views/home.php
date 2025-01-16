
<div id="timer">Refreshing in 5 seconds...</div>

<script>
    let countdown = 5; // Time in seconds

    const timerElement = document.getElementById('timer');

    // Update countdown every second
    const interval = setInterval(() => {
        countdown--;
        timerElement.textContent = `Refreshing in ${countdown} seconds...`;

        if (countdown === 0) {
            clearInterval(interval);
            location.reload();
        }
    }, 1000);
</script>
<div id="table_container">
	<table>
		<tr>
			<th class="blue-cell">Instrument</th>
			<th class="blue-cell">Timeframe</th>
			<?php 
			foreach ($indicators as $key => $value) {
				$indicator = $value->getFields();
				echo '<th class="blue-cell" tooltip="' . $key . '">' . $indicator['title'] . '</th>';
			}
			?>
			<!-- <th></th> -->
		</tr>
		<?php
		for($i = 0 ; $i < 8; $i++)
		{
			$value = $symbols[$i];
		// foreach ($symbols as $key => $value) {
			$symbol = $value->getFields()['title'];
			foreach ($timeframes as $key => $timeframe) {
				echo '<tr'; 
				if ($key == 0)
					echo ' class="border-top"';
				echo '>';
				if ($key == 0)
					echo '<td class="blue-cell merged" rowspan="6">' . $symbol . '</td>';
				echo '<td class="blue-cell">' . $timeframe . '</td>';

				foreach ($indicators as $key => $value) {
					$indicator = $value->getFields();
					if($indicator['is_muted'] || $indicator['mute_5'] && $timeframe == '5 minute' || $indicator['mute_15'] && $timeframe == '15 minute' || $indicator['mute_60'] && $timeframe == '1 hour' || $indicator['mute_240'] && $timeframe == '4 hour' || $indicator['mute_d'] && $timeframe == '1 day'  || $indicator['mute_w'] && $timeframe == '1 week')
						$c = 0;
					else
						$c = checkAlerts($alerts,$symbol,$timeframe,$indicator['id']);
					if($c > 0)
					{
						echo '<td'; 
						switch ($c){
							case 1:
								echo ' class="green-cell"';
								break;
							case 2:
								echo ' class="red-cell"';
								break;
							case 3:
								echo ' class="darkgreen-cell"';
								break;
							case 4:
								echo ' class="darkred-cell"';
								break;
						}					
						echo '>';
						echo $timeframe;
						echo '</td>';
					}
					else
					{
						echo '<td></td>';

					}
				}
				echo '</tr>';
			}
		}
		?>
	</table>

	<table>
		<tr>
			<th class="blue-cell">Instrument</th>
			<th class="blue-cell">Timeframe</th>
			<?php 
			foreach ($indicators as $key => $value) {
				$indicator = $value->getFields();
				echo '<th class="blue-cell" tooltip="' . $key . '">' . $indicator['title'] . '</th>';
			}
			?>
			<!-- <th></th> -->
		</tr>
		<?php
		for($i = 8 ; $i < 16; $i++)
		{
			if(count($symbols) > $i)
			{
				$value = $symbols[$i];
			
				$symbol = $value->getFields()['title'];
				foreach ($timeframes as $key => $timeframe) {
					echo '<tr'; 
					if ($key == 0)
						echo ' class="border-top"';
					echo '>';
					if ($key == 0)
						echo '<td class="blue-cell merged" rowspan="6">' . $symbol . '</td>';
					echo '<td class="blue-cell">' . $timeframe . '</td>';

					foreach ($indicators as $key => $value) {
						$indicator = $value->getFields();
						if($indicator['is_muted'] || $indicator['mute_5'] && $timeframe == '5 minute' || $indicator['mute_15'] && $timeframe == '15 minute' || $indicator['mute_60'] && $timeframe == '1 hour' || $indicator['mute_240'] && $timeframe == '4 hour' || $indicator['mute_d'] && $timeframe == '1 day'  || $indicator['mute_w'] && $timeframe == '1 week')
							$c = 0;
						else
							$c = checkAlerts($alerts,$symbol,$timeframe,$indicator['id']);
						if($c > 0)
						{
							echo '<td'; 
							switch ($c){
								case 1:
									echo ' class="green-cell"';
									break;
								case 2:
									echo ' class="red-cell"';
									break;
								case 3:
									echo ' class="darkgreen-cell"';
									break;
								case 4:
									echo ' class="darkred-cell"';
									break;
							}					
							echo '>';
							echo $timeframe;
							echo '</td>';
						}
						else
						{
							echo '<td></td>';

						}
					}
					echo '</tr>';
				}
			}
		}
		?>
	</table>

	<table>
		<tr>
			<th class="blue-cell">Instrument</th>
			<th class="blue-cell">Timeframe</th>
			<?php 
			foreach ($indicators as $key => $value) {
				$indicator = $value->getFields();
				echo '<th class="blue-cell" tooltip="' . $key . '">' . $indicator['title'] . '</th>';
			}
			?>
			<!-- <th></th> -->
		</tr>
		<?php
		for($i = 16 ; $i < 24; $i++)
		{
			if(count($symbols) > $i)
			{
				$value = $symbols[$i];
			
				$symbol = $value->getFields()['title'];
				foreach ($timeframes as $key => $timeframe) {
					echo '<tr'; 
					if ($key == 0)
						echo ' class="border-top"';
					echo '>';
					if ($key == 0)
						echo '<td class="blue-cell merged" rowspan="6">' . $symbol . '</td>';
					echo '<td class="blue-cell">' . $timeframe . '</td>';

					foreach ($indicators as $key => $value) {
						$indicator = $value->getFields();
						if($indicator['is_muted'] || $indicator['mute_5'] && $timeframe == '5 minute' || $indicator['mute_15'] && $timeframe == '15 minute' || $indicator['mute_60'] && $timeframe == '1 hour' || $indicator['mute_240'] && $timeframe == '4 hour' || $indicator['mute_d'] && $timeframe == '1 day'  || $indicator['mute_w'] && $timeframe == '1 week')
							$c = 0;
						else
							$c = checkAlerts($alerts,$symbol,$timeframe,$indicator['id']);
						if($c > 0)
						{
							echo '<td'; 
							switch ($c){
								case 1:
									echo ' class="green-cell"';
									break;
								case 2:
									echo ' class="red-cell"';
									break;
								case 3:
									echo ' class="darkgreen-cell"';
									break;
								case 4:
									echo ' class="darkred-cell"';
									break;
							}					
							echo '>';
							echo $timeframe;
							echo '</td>';
						}
						else
						{
							echo '<td></td>';

						}
					}
					echo '</tr>';
				}
			}
		}
		?>
	</table>

	<table>
		<tr>
			<th class="blue-cell">Instrument</th>
			<th class="blue-cell">Timeframe</th>
			<?php 
			foreach ($indicators as $key => $value) {
				$indicator = $value->getFields();
				echo '<th class="blue-cell" tooltip="' . $key . '">' . $indicator['title'] . '</th>';
			}
			?>
			<!-- <th></th> -->
		</tr>
		<?php
		for($i = 24 ; $i < 32; $i++)
		{
			if(count($symbols) > $i)
			{
				$value = $symbols[$i];
			
				$symbol = $value->getFields()['title'];
				foreach ($timeframes as $key => $timeframe) {
					echo '<tr'; 
					if ($key == 0)
						echo ' class="border-top"';
					echo '>';
					if ($key == 0)
						echo '<td class="blue-cell merged" rowspan="6">' . $symbol . '</td>';
					echo '<td class="blue-cell">' . $timeframe . '</td>';

					foreach ($indicators as $key => $value) {
						$indicator = $value->getFields();
						if($indicator['is_muted'] || $indicator['mute_5'] && $timeframe == '5 minute' || $indicator['mute_15'] && $timeframe == '15 minute' || $indicator['mute_60'] && $timeframe == '1 hour' || $indicator['mute_240'] && $timeframe == '4 hour' || $indicator['mute_d'] && $timeframe == '1 day'  || $indicator['mute_w'] && $timeframe == '1 week')
							$c = 0;
						else
							$c = checkAlerts($alerts,$symbol,$timeframe,$indicator['id']);
						if($c > 0)
						{
							echo '<td'; 
							switch ($c){
								case 1:
									echo ' class="green-cell"';
									break;
								case 2:
									echo ' class="red-cell"';
									break;
								case 3:
									echo ' class="darkgreen-cell"';
									break;
								case 4:
									echo ' class="darkred-cell"';
									break;
							}					
							echo '>';
							echo $timeframe;
							echo '</td>';
						}
						else
						{
							echo '<td></td>';

						}
					}
					echo '</tr>';
				}
			}
		}
		?>
	</table>

	<table>
		<tr>
			<th class="blue-cell">Instrument</th>
			<th class="blue-cell">Timeframe</th>
			<?php 
			foreach ($indicators as $key => $value) {
				$indicator = $value->getFields();
				echo '<th class="blue-cell" tooltip="' . $key . '">' . $indicator['title'] . '</th>';
			}
			?>
			<!-- <th></th> -->
		</tr>
		<?php
		for($i = 32 ; $i < 40; $i++)
		{
			if(count($symbols) > $i)
			{
				$value = $symbols[$i];
			
				$symbol = $value->getFields()['title'];
				foreach ($timeframes as $key => $timeframe) {
					echo '<tr'; 
					if ($key == 0)
						echo ' class="border-top"';
					echo '>';
					if ($key == 0)
						echo '<td class="blue-cell merged" rowspan="6">' . $symbol . '</td>';
					echo '<td class="blue-cell">' . $timeframe . '</td>';

					foreach ($indicators as $key => $value) {
						$indicator = $value->getFields();
						if($indicator['is_muted'] || $indicator['mute_5'] && $timeframe == '5 minute' || $indicator['mute_15'] && $timeframe == '15 minute' || $indicator['mute_60'] && $timeframe == '1 hour' || $indicator['mute_240'] && $timeframe == '4 hour' || $indicator['mute_d'] && $timeframe == '1 day'  || $indicator['mute_w'] && $timeframe == '1 week')
							$c = 0;
						else
							$c = checkAlerts($alerts,$symbol,$timeframe,$indicator['id']);
						if($c > 0)
						{
							echo '<td'; 
							switch ($c){
								case 1:
									echo ' class="green-cell"';
									break;
								case 2:
									echo ' class="red-cell"';
									break;
								case 3:
									echo ' class="darkgreen-cell"';
									break;
								case 4:
									echo ' class="darkred-cell"';
									break;
							}					
							echo '>';
							echo $timeframe;
							echo '</td>';
						}
						else
						{
							echo '<td></td>';

						}
					}
					echo '</tr>';
				}
			}
		}
		?>
	</table>
</div>

<h2>Alert History of <?php echo $currentDay; ?></h2>
<?php 

foreach ($alertsHistory as $key => $value) {
	$alert = $value->getFields();
	echo $alert['received_at'] . ' : ' . $alert['payload'] . '<br>';
}