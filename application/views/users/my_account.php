<script type="text/javascript">
$(function ()
{
	$('#cpModal').modal({  show: false });
});

function vProcess()
{
	if (  $('#password').val() != $('#password_confirm').val() )
	{
		$('#msg').html('Password and password confirmation dont match');
		$('#msg').show();
		return false;
	}
	else if (  $('#password').val().length < 5  )
	{
		$('#msg').html('Your password should be longer than 5 letters');
		$('#msg').show();
	}
	else if (  $('#password').val().length  > 50 )
	{
		$('#msg').html('Your password should be shorter than 5 letters');
		$('#msg').show();
	}
	else
	{
		$('#chgPassForm').submit();
		return true;
	}
}

function vCancel()
 {
	$('#password').val('');
	$('#password_confirm').val('');
	$('#msg').html('');
	$('#msg').hide();
}
</script>


<div class="btn-group">
  <button class="btn btn-large" id="editButton" onclick="parent.location='<?php echo base_url().'users/edit/'.$user->id; ?>'">Edit profile</button>
  <a href="#cpModal" role="button" class="btn btn-large" data-toggle="modal">change password</a>
</div>

<br />
<br />

<div class="tabbable">
 <ul class="nav nav-tabs">
		<li class="active"><a href="#tab-1"  data-toggle="tab">My profile</a></li>
		<li><a href="#tab-2"  data-toggle="tab">Records</a></li>
	</ul>

<div class="tab-content">
	<div class="tab-pane active" id="tab-1">
		<table class="table table-striped table-bordered" >
		<tr>
			<th scope="row" style="width: 150px;">Full name</th>
			<td><?php echo $user->first_name . ' ' . $user->last_name; ?></td>
		</tr>
		<tr>
			<th scope="row">Username</th>
			<td><?php echo $user->username; ?></td>
		</tr>
		<tr>
			<th scope="row">Email</th>
			<td><?php echo $user->email; ?></td>
		</tr>
		<tr>
			<th scope="row">Phone</th>
			<td><?php echo $user->phone; ?></td>
		</tr>
		<tr>
			<th scope="row">Group</th>
			<td><?php echo $user->group_description; ?></td>
		</tr>

		</table>
	</div>
	 <div class="tab-pane" id="tab-2">
		<table class="table table-striped table-bordered" >
		<tr>
			<th scope="row" style="width: 150px;">Account created on</th>
			<td><?php echo date('Y-m-d',$user->created_on); ?></td>
		</tr>
		<tr>
			<th scope="row">Last login</th>
			<td><?php echo date('Y-m-d', $user->last_login); ?></td>
		</tr>
		<tr>
			<th scope="row">IP address</th>
			<td><?php echo $user->ip_address; ?></td>
		</tr>

		</table>

	</div>

</div>
</div><!-- tabs -->


<div id="cpModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Change password</h3>
  </div>
  
  
<div class="modal-body">

	<div id="msg" class="alert" style="display:none;" ></div>
	
	<form name="chgPassForm" id="chgPassForm" action="<?php echo base_url(); ?>users/change_password" method="post" class="form-vertical" >
<fieldset>
		<label for="password">New password</label>
		<input type="password" name="password" id="password" value="" autocomplete="off">

		<label for="password_confirm">Confirm new password</label>
		<input type="password" name="password_confirm" id="password_confirm" value="" autocomplete="off">

		<input type="hidden" name="user_id" id="user_id" value="<?php echo $user->id; ?>">
	</fieldset>
	</form>
	
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true" onclick='vCancel();'  >Close</button>
    <button class="btn btn-primary" onclick="vProcess();">Save changes</button>
  </div>
</div>

