<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo APP_TITLE_LONG; ?></title>
<meta http-equiv="content-language" content="ar">
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow">
<link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">

<?php if( isset($css_files) AND isset($js_files) ): ?>
<?php foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>">
 <?php endforeach; ?>
<?php foreach($js_files as $file): ?>
     <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<?php endif; ?>

<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validity.min.js"></script>

<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.validity.css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/menu.css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" media="screen">

</head>
<body>

<?php require('menu.php'); ?>

<div class="container">
  <div class="page-header">
    <h1><?php echo $htitle; ?></h1>
	<?php if ( isset($hlead) ): ?><p class="lead"><?php echo $hlead;?></p><?php endif;?>
  </div>
