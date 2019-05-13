<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Informasi Inventory</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Copyright" content="Tim Sistem" />
    <meta name="author" content="Tim Sistem" />
    <meta http-equiv="imagetoolbar" content="no" />
    <meta name="language" content="Indonesia" />
    <meta name="revisit-after" content="7" />
    <meta name="webcrawlers" content="all" />
    <meta name="rating" content="general" />
    <meta name="spiders" content="all" />

    <link rel="stylesheet" href="<?php echo base_url().'/assets/bootstrap/css/bootstrap.min.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'/assets/plugins/datatables/datatables.min.css'?>">

    <link rel="stylesheet" href="<?php echo base_url().'/assets/dist/css/AdminLTE.min.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'/assets/dist/css/skins/_all-skins.min.css'?>">
    <!-- Komponen -->
    <link rel="stylesheet" href="<?php echo base_url().'/assets/plugins/select2/select2.min.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'/assets/plugins/iCheck/all.css'?>">

    <link rel="stylesheet" href="<?php echo base_url().'/assets/font-awesome/css/font-awesome.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'/assets/ionicons/css/ionicons.min.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'/assets/dist/css/datepicker.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'/assets/plugins/colorpicker/bootstrap-colorpicker.min.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'/assets/plugins/iCheck/minimal/minimal.css'?>">
        <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url().'/assets/plugins/jQuery/jQuery-2.1.4.min.js'?>"></script>


</head>
  <body class="hold-transition skin-blue sidebar-mini">



<div class="wrapper">

    <header class="main-header">
         <a href="<?php echo base_url().'dashboard' ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
         <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
               <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo base_url().'/assets/uploads/icons/men.png' ?>" alt='User Image' class="user-image">
                    <span class="hidden-xs">Hello <?php echo ucwords($this->session->userdata('username')) ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header" style="text-align:center">
                            <img src="<?php echo base_url().'/assets/uploads/icons/men.png' ?>" alt='User Image' class="img-circle">  
                              <p style="color:#fff">
                              <?php echo ucwords($this->session->userdata('nm_admin')) ?> <br>
                              <small>Member since <?php echo date("M", strtotime($this->session->userdata('create_on'))) ?>. <?php echo date("Y", strtotime($this->session->userdata('create_on'))) ?></small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="<?php echo base_url();?>./auth/logout" class="btn btn-default btn-flat"><i class="fa fa-power-off"> Log out</i></a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
      </nav>
  </header>
<?php require_once('sidebar.php') ?>