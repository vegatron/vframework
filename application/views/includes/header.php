<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?php echo APP_TITLE_LONG; ?></title>
<meta http-equiv="content-language" content="ar">
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow" />
<link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />

<?php if( isset($css_files) AND isset($js_files) ): ?>
<?php foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 <?php endforeach; ?>
<?php foreach($js_files as $file): ?>
     <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<?php endif; ?>

<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.9.0.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validity.min.js"></script>

<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.validity.css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/menu.css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" media="screen" />

</head>
<body>
  <!-- Navbar
    ================================================== -->
 <div class="navbar navbar-fixed-top">
   <div class="navbar-inner">
     <div class="container">
       <a class="brand" href="<?php echo base_url(); ?>"><?php echo APP_TITLE_SHORT; ?></a>
       <div class="nav-collapse" id="main-menu">
        <ul class="nav" id="main-menu-left">
          <li <?php if ($active_page == 'home') echo 'class="active"'; ?>><a  href="<?php echo base_url(); ?>home" >Home</a></li>
		  
          <li class="dropdown <?php if (($active_page == 'users') OR ($active_page == 'add_user') OR ($active_page == 'my_account') ) echo 'class="active"'; ?>" id="users-menu">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Users <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li <?php if ($active_page == 'my_account') echo 'class="active"'; ?>><a href="<?php echo base_url(); ?>users/my_account">My Account</a></li>
			
			<?php if ($this->general_model->user_in_group('admin')): ?>
				 <li class="divider"></li>
				  <li <?php if ($active_page == 'users') echo 'class="active"'; ?>><a href="<?php echo base_url(); ?>users">User management</a></li>
				  <li <?php if ($active_page == 'add_user') echo 'class="active"'; ?>><a href="<?php echo base_url(); ?>users/add">Add new user</a></li>
			<?php endif;?>
			
            </ul>
          </li>
        </ul>
        <ul class="nav pull-right" id="main-menu-right">
          <li><a href="<?php echo base_url();?>users/my_account" >Welcome <?php echo $user->first_name; ?></a></li>
          <li><a href="<?php echo base_url();?>auth/logout">Logout <i class="icon-off"></i></a></li>
        </ul>
       </div>
     </div>
   </div>
 </div>

<div class="container">
  <div class="page-header">
    <h1><?php echo $htitle; ?></h1>
	<?php if ( isset($hlead) ): ?><p class="lead"><?php echo $hlead;?></p><?php endif;?>
  </div>
	
