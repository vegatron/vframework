
	<div class="alert alert-message" style="text-align: center; width: 500px; margin: auto;">

			<p>

<br />
			<?php
				echo $message
			?>
<br /><br />
			</p>

<form method="post" action="<?php echo base_url() . $action;?>" name="formPost">
<input type="hidden" name="student_id" id="student_id" value="<?php echo $student_id; ?>">
<input type="hidden" name="mode" value="stop">
</form>


<br />
<div class="btn-group">
<button id="ok" class="btn btn-primary" onclick="document.formPost.submit();">Yes, continue</button>
<button id="cancel" onclick="parent.location='<?php echo $return_url; ?>'">No, back</button>
	</div>
	</div>




