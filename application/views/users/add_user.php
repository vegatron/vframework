<script type="text/javascript">
$(function ()
{
$("#formPost").validity(function()
	{
		$("input[name=username]").require().minLength(5).maxLength(50);
		$("input[name=first_name]").require().minLength(2).maxLength(50);
		$("input[name=password]").require().minLength(5).maxLength(50);
	});
});
</script>
<?php
echo validation_errors();
echo form_open('users/save',Array('name'=> 'formPost','id'=> 'formPost', 'class' => 'form-horizontal'));

echo form_fieldset('User data') ;
?>
  <div class="control-group">
    <label class="control-label" for="first_name">First name <sup title="required field.">*</sup></label>
    <div class="controls">
      <?php echo form_input('first_name', set_value('first_name') ); ?>
    </div>
  </div>

    <div class="control-group">
    <label class="control-label" for="last_name">Last name</label>
    <div class="controls">
      <?php echo form_input('last_name', set_value('last_name') ); ?>
    </div>
  </div> 

    <div class="control-group">
    <label class="control-label" for="email">Email</label>
    <div class="controls">
      <?php echo form_input('email', set_value('email') ); ?>
    </div>
  </div>

    <div class="control-group">
    <label class="control-label" for="phone">Phone</label>
    <div class="controls">
      <?php echo form_input('phone', set_value('phone') ); ?>
    </div>
  </div>
<?php
echo form_fieldset_close();


echo form_fieldset('Login data');
?>

    <div class="control-group">
    <label class="control-label" for="username">Username <sup title="required field.">*</sup></label>
    <div class="controls">
      <?php echo form_input('username', set_value('username') ); ?>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="password">New password</label>
    <div class="controls">
      <input type="password" id="password" name="password" placeholder="Password">
    </div>
  </div>
  
<?php

echo form_fieldset_close();

echo form_fieldset('Permissions');
	?>
  <div class="control-group">
    <label class="control-label" for="group_id">Group</label>
    <div class="controls">
			<?php
			foreach($groups as $group)
			{
				$options[$group['id']] = $group['description'];
			}

			echo form_dropdown('group_id', $options, set_value('group_id') );
	?>
	    </div>
  </div>
  <?php

echo form_fieldset_close();
?>

<div class="well" style="padding: 14px 19px;">

<?php
		$attr = Array('name' => 'submit','class' => 'btn btn-primary','value'=>'Save');
		echo form_submit($attr);

		echo '&nbsp;';

		$attr = Array('name' => 'cancel','class' => 'btn' ,'value'=>'Cancel','type'=>'reset','onclick'=>'history.go(-1);return(false);');
		echo form_submit($attr);
		?>
		</div>
		<?php

	echo form_hidden('mode', 'add_user');

echo form_close();




