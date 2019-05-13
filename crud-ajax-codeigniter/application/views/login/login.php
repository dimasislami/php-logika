<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Barcode Application</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?php echo base_url().'/assets/bootstrap/css/bootstrap.min.css'?>">
	<link rel="stylesheet" href="<?php echo base_url().'/assets/dist/css/AdminLTE.min.css'?>">
	<link rel="stylesheet" href="<?php echo base_url().'/assets/dist/css/skins/_all-skins.min.css'?>">
	<!-- Komponen -->
	<link rel="stylesheet" href="<?php echo base_url().'/assets/plugins/iCheck/all.css'?>">

	<link rel="stylesheet" href="<?php echo base_url().'/assets/font-awesome/css/font-awesome.min.css'; ?>">
	<link rel="stylesheet" href="<?php echo base_url().'/assets/ionicons/css/ionicons.min.css'?>">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url().'/assets/uploads/icons/gear-1807204_960_720.png' ?>"/>
	<style>
		.login-page, .register-page {
			background: #FFFFFF;
		}
	</style>
</head>
  <body class="hold-transition login-page" style="background-image: url(https://static1.squarespace.com/static/598216bfdb29d60e557c2a88/5982218a914e6b5dc0e90c91/598221fb37c581b9f203702f/1501700603795/Warehouse-background-image_low-res_gradient-750x486.jpg?format=1500w);background-size: cover">
    <div class="login-box" style="margin: 10% auto;">
      <div class="login-panel">
        <center>
          <h1 class="page-header" style="font-size:30px;">Barcode Application</h1>
        </center>
      </div><!-- /.login-logo -->
      <div class="login-box-body" style="background:#f5eaed;">
        <form action="<?php echo site_url('auth/do_login') ?>" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" placeholder="Username">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
                <?php echo $this->session->flashdata('gagal') ?>
           </div><!-- /.col -->
            <div class="col-xs-12">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->

  <!-- jQuery 2.1.4 -->
<script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js') ?>"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js') ?>"></script>
</body>
</html>