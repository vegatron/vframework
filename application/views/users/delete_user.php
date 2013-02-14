
<div class="alert alert-message block-message error" style="text-align: center; width: 500px; margin: auto;">

			<p>

<br />
			<?php
				echo $message;
			?>
			<br />

</p>

<form method="post" action="<?php echo base_url() . $action;?>" name="formPost">

	<input type="hidden" name="uid" id="uid" value="<?php echo $id; ?>">
	<input type="hidden" name="mode" value="delete">

</form>

<br />

	<button id="ok" class="btn btn-danger" onclick="document.formPost.submit();">Yes, continue</button> &nbsp; &nbsp;
	<button id="cancel" class="btn"onclick="history.go(-1);"> No, back</button>
</div>


