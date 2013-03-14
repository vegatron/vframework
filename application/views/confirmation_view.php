<div class="row">
	<div class="span3"></div>

	<div class="span6">
		<div class="alert alert-block text-center">

		<p>
			<br>
			<?php echo $message; ?>
			<br>
		</p>
		</div>
		<form method="post" action="<?php echo base_url() . $action;?>" name="formPost">
		<input type="hidden" name="vid" id="vid" value="<?php echo $vid; ?>">
		</form>


		<br />
		<div class="well text-center" style="padding: 14px 19px;">
		<button id="ok" class="btn btn-danger" onclick="document.formPost.submit();">Yes, continue</button>
		<button class="btn" id="cancel" onclick="parent.location='<?php echo $return_url; ?>'">No, back</button>
		</div>
	</div>

	<div class="span3"></div>
</div>