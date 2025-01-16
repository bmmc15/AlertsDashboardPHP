<form action="./post/addSymbol.php" method="POST">
	<input type="text" name="symbol" placeholder="Add symbol/Instrument...">
	<button type="submit" class="button-primary">Add</button>
</form>

<form action="./post/addIndicator.php" method="POST">
	<input type="text" name="indicator" placeholder="Add Indicator...">
	<button type="submit" class="button-primary">Add</button>
</form>

<div style="display:inline-block; margin-right:5rem;">
	<h2>Symbols</h2>

	<table class="table-settings">
		<tr>
			<th class="blue-cell">Id</th>
			<th colspan=2 style="text-align:left"  class="blue-cell">Symbol</th>
			<!-- <th></th> -->
		</tr>

		<?php
		foreach ($symbols as $key => $value) {
			$symbol = $value->getFields();
			?>
			<tr>
				<td class="blue-cell"><?php echo $symbol['id']; ?></td>
				<td><?php echo $symbol['title']; ?>
				
					<form action="./post/deleteSymbol.php" method="POST" style="display: inline-block;">
						<input type="hidden" name="id" value="<?php echo $symbol['id'];?>">
						<button type="submit" class="button-red">Delete</button>
					</form>
				</td>
			</tr>
			<?php
		}
		?>
	</table>
</div>

<div style="display:inline-block;">
	<h2>Indicators</h2>

	<table class="table-settings">
		<tr>
			<th class="blue-cell">Id</th>
			<th style="text-align:left"  class="blue-cell">Indicator</th>
			<th colspan=7 class="blue-cell">Mute</th>
		</tr>

		<?php
		foreach ($indicators as $key => $value) {
			$ind = $value->getFields();
			?>
			<tr>
				<td class="blue-cell"><?php echo $ind['id']; ?></td>
				<td><?php echo $ind['title']; ?>
				
					<form action="./post/deleteIndicator.php" method="POST" style="display: inline-block;">
						<input type="hidden" name="id" value="<?php echo $ind['id'];?>">
						<button type="submit" class="button-red">Delete</button>
					</form>
				</td>
				<td>
					<form action="./post/muteIndicator.php" method="POST" style="display: inline-block;">
						<input type="hidden" name="id" value="<?php echo $ind['id'];?>">
						<input type="hidden" name="mute" value="all">
						<input type="hidden" name="mute" value="is_muted">

						<label>All</label>
						<input type="checkbox" <?php if($ind['is_muted']) echo 'checked';?> onchange="this.form.submit()" name="is_muted">
					</form>
				</td>
				<td>
					<form action="./post/muteIndicator.php" method="POST" style="display: inline-block;">
						<input type="hidden" name="id" value="<?php echo $ind['id'];?>">
						<input type="hidden" name="mute" value="mute_5">
						<label>5m</label>
						<input type="checkbox" <?php if($ind['mute_5']) echo 'checked';?> onchange="this.form.submit()" name="is_muted">
					</form>
				</td>
				<td>
					<form action="./post/muteIndicator.php" method="POST" style="display: inline-block;">
						<input type="hidden" name="id" value="<?php echo $ind['id'];?>">
						<input type="hidden" name="mute" value="mute_15">
						<label>15m</label>
						<input type="checkbox" <?php if($ind['mute_15']) echo 'checked';?> onchange="this.form.submit()" name="is_muted">
					</form>
				</td>
				<td>
					<form action="./post/muteIndicator.php" method="POST" style="display: inline-block;">
						<input type="hidden" name="id" value="<?php echo $ind['id'];?>">
						<input type="hidden" name="mute" value="mute_60">
						<label>1h</label>
						<input type="checkbox" <?php if($ind['mute_60']) echo 'checked';?> onchange="this.form.submit()" name="is_muted">
					</form>
				</td>
				<td>
					<form action="./post/muteIndicator.php" method="POST" style="display: inline-block;">
						<input type="hidden" name="id" value="<?php echo $ind['id'];?>">
						<input type="hidden" name="mute" value="mute_240">
						<label>4h</label>
						<input type="checkbox" <?php if($ind['mute_240']) echo 'checked';?> onchange="this.form.submit()" name="is_muted">
					</form>
				</td>
				<td>
					<form action="./post/muteIndicator.php" method="POST" style="display: inline-block;">
						<input type="hidden" name="id" value="<?php echo $ind['id'];?>">
						<input type="hidden" name="mute" value="mute_d">
						<label>1D</label>
						<input type="checkbox" <?php if($ind['mute_d']) echo 'checked';?> onchange="this.form.submit()" name="is_muted">
					</form>
				</td>
				<td>
					<form action="./post/muteIndicator.php" method="POST" style="display: inline-block;">
						<input type="hidden" name="id" value="<?php echo $ind['id'];?>">
						<input type="hidden" name="mute" value="mute_w">
						<label>1w</label>
						<input type="checkbox" <?php if($ind['mute_w']) echo 'checked';?> onchange="this.form.submit()" name="is_muted">
					</form>
				</td>
			</tr>
			<?php
		}
		?>
	</table>
</div>

