<div id='menu'>
	<?php
	if(isset($_GET['page']) && $_GET['page'] != 'settings' || !isset($_GET['page']))
	{
		?>
		<a class="button-primary" href="./?page=settings">DashBoard Settings</a>
		<?php
	}
	if(isset($_GET['page']) && $_GET['page'] == 'settings')
	{
		?>
		<a class="button-primary" href="./?page=home">Back to DashBoard</a>
		<?php
	}
	?>
</div>