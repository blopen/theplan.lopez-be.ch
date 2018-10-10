<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>theplan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet"  href="<?=base_url().index_page()?>dist/css/mycss.css" type="text/css" > 
  <link rel="icon" href="<?=base_url()?>favicon.ico" type="image/ico">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url()?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>dist/css/AdminLTE.min.css">
 
  
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?=base_url()?>dist/css/thepaln_lopez_be_ch.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="<?=base_url()?>favicon.ico" type="image/ico" /></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>theplan</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="#"></a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  
                  <!-- end task item -->
                  <li><!-- Task item -->
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url()?>dist/img/IchAug2016.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$firstname." ".$lastname?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url()?>dist/img/IchAug2016.jpg" class="img-circle" alt="User Image">
                <p>
                  <?=$firstname." ".$lastname?>
                  <small>Admin</small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?= base_url() . index_page();?>/Home/logout" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>dist/img/IchAug2016.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$firstname." ".$lastname?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">My Menu</li>
        <li>
          <a href="<?= base_url() . index_page(); ?>Home">
            <i class="fa fa-calendar"></i> <span></span>
            <span class="pull-right-container">
              theplan
            </span>
          </a>
        </li>
        <li class="active treeview">
          <a href="<?= base_url() . index_page(); ?>Profile">
            <i class="fa fa-user"></i> <span>Profile</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url() . index_page(); ?>Profile"><i class="fa fa-circle-o"></i>Edit</a></li>
            <li class="active"><a href="index2.html"><i class="fa fa-circle-o"></i>Upgrade</a></li>
          </ul>
        </li>
        <li class="treeview">
        </li>
        <li class="treeview">
        </li>
        <li class="treeview">
        </li>
        <li class="treeview">
        </li>
        <li class="treeview">
        </li>
        <li class="treeview">
        </li>
        
        <li class="header">function</li>
        <li><a href="<?= base_url() . index_page(); ?>/Home/logout"><i class="fa fa-circle-o text-red"></i> <span>Logout</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
</aside>