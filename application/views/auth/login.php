<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-language" content="ar">
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico"/>

<link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<title><?php echo APP_TITLE_LONG;?></title>
<style type="text/css">
body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  max-width: 300px;
  padding: 19px 29px 29px;
  margin: 0 auto 20px;
  background-color: #fff;
  border: 1px solid #e5e5e5;
  -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
          border-radius: 5px;
  -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
     -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
          box-shadow: 0 1px 2px rgba(0,0,0,.05);
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin input[type="text"],
.form-signin input[type="password"] {
  font-size: 16px;
  height: auto;
  margin-bottom: 15px;
  padding: 7px 9px;
}
</style>
</head>
<body>
<div class="container">

<div style="text-align:center; margin: 20px auto;padding: 0 auto;" >
	
	   <img src="<?php echo base_url(); ?>images/logo.png" alt="" />
	   </div>
	   
<?php if ( isset($message) && strlen($message) >0 ) : ?>
<div id="infoMessage" style="text-align:center; margin: 20px auto;padding: 0 auto;width:310px;" class="alert alert-error"><?php echo $message;?></div>
<?php endif; ?>

<?php
$attributes = array( 'id' => 'login_form', 'name' => 'login_form','class' => 'form-signin', 'role' => 'application');

	echo form_open("auth/login",$attributes); 
	?>

<h2 class="form-signin-heading">Login</h2>

	<?php
	
	$attr = Array('name' => 'identity' , 'class' => 'input-block-level' , 'placeholder' => 'User name');
	echo form_input($attr);

	
	$attr = Array('name' => 'password' , 'class' => 'input-block-level' , 'placeholder' => 'Password', 'type'=>'password');
	echo form_password( $attr);

	?>
 <label class="checkbox">
 <?php
$data = array(
	'name'        => 'remember',
	'id'          => 'remember',
	'value'       => 'remember-me',
	'checked'     => FALSE,
	'type'       => 'checkbox',
	);

echo form_checkbox($data); 
?>

Remember me
</label>
	
<?php
$attr = Array('name' => 'submit','id' => 'submitButton','value'=>'Sign in', 'class' => 'btn btn-large btn-primary');
echo form_submit($attr);?>

<?php echo form_close();?>


</div> <!-- /container -->

<footer class="footer text-center">
  <p>
	<?php echo APP_TITLE_LONG; ?>, &copy; <?php echo AUTHOR_NAME; ?> 2013, All rights reserved.
  </p>
</footer>
</body>
</html>