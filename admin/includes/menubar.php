<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($admin['photo'])) ? '../images/'.$admin['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $admin['firstname'].' '.$admin['lastname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">REPORTS</li>
      <li><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      
      <li class="header">MANAGE</li>
      <li><a href="programs.php"><i class="fa fa-print"></i> <span>Programs</span></a></li>
<!--      <li><a href="users.php"><i class="fa fa-users"></i> <span>Users</span></a></li>-->
      <li><a href="gallerys.php"><i class="fa fa-photo"></i> <span>Frames</span></a></li>
      <li><a href="stickers.php"><i class="fa fa-sticky-note"></i> <span>Stickers</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>