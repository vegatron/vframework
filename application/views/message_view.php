<?php

if(!isset($alert))
{
	$alert = 'info';//default fallback
}
?>

<div class="row">
	<div class="span3"></div>

	<div class="span6">
		<div class="alert alert-<?php echo $alert;?>">
			<p><?php echo $message ?></p>
		</div>
	</div>
	
	<div class="span3"></div>
</div>