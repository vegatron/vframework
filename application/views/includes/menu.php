<div class="navbar navbar-fixed-top">
   <div class="navbar-inner">
     <div class="container">
        <a class="brand" href="<?php echo base_url(); ?>"><?php echo APP_TITLE_SHORT; ?></a>
       <div class="nav-collapse" id="main-menu">
        <ul class="nav" id="main-menu-left">
          <li <?php if ($active_page == 'home') echo 'class="active"'; ?>><a  href="<?php echo base_url('home'); ?>" >Home</a></li>


      <?php /* Begin Users */ ?>
          <li class="dropdown <?php if (($active_page == 'users') OR ($active_page == 'add_user') OR ($active_page == 'my_account') ) echo 'class="active"'; ?>" id="users-menu" >
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Users <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li <?php if ($active_page == 'my_account') echo 'class="active"'; ?>><a href="<?php echo base_url('users/my_account'); ?>">My Account</a></li>
      
      <?php if (is_admin()): ?>
         <li class="divider"></li>
          <li <?php if ($active_page == 'users') echo 'class="active"'; ?>><a href="<?php echo base_url(); ?>users">User management</a></li>
          <li <?php if ($active_page == 'add_user') echo 'class="active"'; ?>><a href="<?php echo base_url(); ?>users/add">Add new user</a></li>
      <?php endif;?>
                  </ul>
          </li>
          <?php /* End Users */ ?>

        </ul>
        <ul class="nav pull-right" id="main-menu-right">
          <li><a href="<?php echo base_url();?>users/my_account" >Welcome <?php echo $user->first_name; ?></a></li>
          <li><a href="<?php echo base_url();?>auth/logout">Logout <i class="icon-off"></i></a></li>
        </ul>
       </div>
     </div>
   </div>
 </div>