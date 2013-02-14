
<table class="table table-striped table-bordered" >
<thead>
<tr>
	<th scope="col" colspan="2">User data</th>
</tr>
</thead>
<tr>
	<th scope="row" style="width: 200px;">Full ame</th>
	<td>{first_name} {last_name}</td>
</tr>
<tr>
	<th scope="row">Username</th>
	<td>{username}</td>
</tr>
<tr>
	<th scope="row">Phone</th>
	<td>{phone}</td>
</tr>
<tr>
	<th scope="row">Email</th>
	<td>{email}</td>
</tr>
<tr>
	<th scope="row">Group</th>
	<td>{group_description}</td>
</tr>
<tr>
	<th scope="row">date of account creation</th>
	<td><?php echo date('Y-m-d',$created_on); ?></td>
</tr>
<tr>
	<th scope="row">Last login date</th>
	<td><?php echo date('Y-m-d', $last_login); ?></td>
</tr>
<tr>
	<th scope="row">Activation</th>
	<td><?php echo $active_title; ?></td>
</tr>

</table>